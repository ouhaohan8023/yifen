<?php
namespace frontend\controllers;

use app\models\YiUser;
use common\models\User;
use EasyWeChat\Foundation\Application;
use Yii;
use yii\base\InvalidParamException;
use yii\helpers\Ouhaohan;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
//    index作为入口文件,判断是否授权,若没有授权,授权;若授权,直接跳转
    public function actionIndex()
    {
        $app = Ouhaohan::getEasywechat();
        $oauth = $app->oauth;
        // 未登录
        if (Yii::$app->user->isGuest) {
//            $_SESSION['target_url'] = 'user/profile';
//            return $oauth->redirect();
            // 这里不一定是return，如果你的框架action不是返回内容的话你就得使用
             $oauth->redirect()->send();//跳转到in
        }else{
            return $this->redirect(['home', 'openid' => $_SESSION['openid']]);
//            return $this->render('index');
        }
//        return $this->render('index');
    }
//跳转到个人中心
    public function actionHome($openid){
        $app = Ouhaohan::getEasywechat();
        $oauth = $app->oauth;
        // 获取 OAuth 授权结果用户信息
        $user = $oauth->user();
        $nickname = $user['name'];
        $avatar = $user['avatar'];
        return $this->render('index',['nickname'=>$nickname,'avatar'=>$avatar]);
    }
//未登陆情况下,进行授权登陆
    public function actionIn(){
        $app = Ouhaohan::getEasywechat();
        $oauth = $app->oauth;
// 获取 OAuth 授权结果用户信息
        $user = $oauth->user();
        $user = $user->toArray();
//        var_dump($user);
//        die;
//获得openid
        $openid = $user['id'];
        var_dump($openid);die;
        $name = $user['name'];
        $avatar = $user['avatar'];
        $data = User::find()->where(['username'=>$openid])->one();
        if(isset($data['id'])){//账号存在
            $array =  [
//              ["_csrf-backend"]=>"QWJ2RWRVYWEnTzUxKQcSTBA4PRBdOFgMEQweFScmIAp0UjUWHh4OJA==",
              ["LoginForm"]=> [
                ["username"]=> "ouhaohan",
                ["password"]=> "mushroom1117",
              ]
            ];
            $model = new LoginForm();
            if ($model->load($array) && $model->login()) {
                return $this->goBack();
            }
        }else{
            $array = array([["SignupForm"]=>[
              ["username"]  => 'o-UzxvtTllA4xZZqHdOviwZIajPQ',
              ["email"]  => 'ohh@ohhcms.com',
              ['password'] => '123456',
            ]]);
            var_dump($array);die;

            $model = new SignupForm();
            $model->load($array);
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }
//判断数据库中有无存储
        $query = YiUser::find()->where(['u_openid'=>$openid])->one();
//        var_dump($query);
//        die;
        $_SESSION['openid'] = $openid;
        $_SESSION['name'] = $name;
        if(isset($query['u_id'])){
            //若存在
//            $_SESSION['u_name'] = $query['u_name'];
//            $_SESSION['u_wx_name'] = $query['u_wx_name'];
//            $_SESSION['openid'] = $openid;
//            return $this->render('index');
            return $this->redirect(['home', 'openid' => $openid]);

        }else{

            return $this->render('newindex');
        }
//
//        $_SESSION['openid'] = $openid;
//        return $this->render('index');


    }
//    新用户入口
    public function actionNewindex(){


        return $this->render('newindex');
    }
//    onlyphone入口
    public function actionOnlyphone(){
        return $this->render('onlyphone');
    }
//    onlykd入口
    public function actionOnlykd(){
        return $this->render('onlykd');
    }
//   接收绑定的数据
    public function actionBd(){
        var_dump($_POST);die;
    }
    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}

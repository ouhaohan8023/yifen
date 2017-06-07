<?php
namespace frontend\controllers;

use EasyWeChat\Foundation\Application;
use Yii;
use yii\base\InvalidParamException;
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
    public function actionIndex()
    {
         $options = [
            /**
             * Debug 模式，bool 值：true/false
             *
             * 当值为 false 时，所有的日志都不会记录
             */
          'debug'  => true,
            /**
             * 账号基本信息，请从微信公众平台/开放平台获取
             */
          'app_id'  => 'wx99c791ac5995b5e9',         // AppID
          'secret'  => '3c1c7fad8cd8923bc037994762eff667',     // AppSecret
          'token'   => 'ohhcms',          // Token
          'aes_key' => '',                    // EncodingAESKey，安全模式下请一定要填写！！！
            /**
             * 日志配置
             *
             * level: 日志级别, 可选为：
             *         debug/info/notice/warning/error/critical/alert/emergency
             * permission：日志文件权限(可选)，默认为null（若为null值,monolog会取0644）
             * file：日志文件位置(绝对路径!!!)，要求可写权限
             */
          'log' => [
            'level'      => 'debug',
            'permission' => 0777,
            'file'       => '/tmp/easywechat.log',
          ],
            /**
             * OAuth 配置
             *
             * scopes：公众平台（snsapi_userinfo / snsapi_base），开放平台：snsapi_login
             * callback：OAuth授权完成后的回调页地址
             */
          'oauth' => [
            'scopes'   => ['snsapi_userinfo'],
            'callback' => 'yifen/frontend/web/site/in',
          ],
        ];
        $app = new Application($options);
        $oauth = $app->oauth;
        // 未登录
        if (empty($_SESSION['wechat_user'])) {
            $_SESSION['target_url'] = 'user/profile';
//            return $oauth->redirect();
            // 这里不一定是return，如果你的框架action不是返回内容的话你就得使用
             $oauth->redirect()->send();
        }else{
            $user = $oauth->user();
            var_dump($user->getOriginal());
            die;
        }

        return $this->render('index');
    }

    public function actionIn(){
        //配置参数
        $config = [
          'debug'     => true,
          'app_id'  => 'wx99c791ac5995b5e9',         // AppID
          'secret'  => '3c1c7fad8cd8923bc037994762eff667',     // AppSecret
          'token'   => 'ohhcms',          // Token
          'aes_key' => '',                    // EncodingAESKey，安全模式下请一定要填写！！！
          'log' => [
            'level'      => 'debug',
            'permission' => 0777,
            'file'       => '/tmp/easywechat.log',
          ],
        ];

        $app = new Application($config);
        $oauth = $app->oauth;
// 获取 OAuth 授权结果用户信息
        $user = $oauth->user();
        $user = $user->toArray();
        var_dump($user);
        die;
//获得openid
        $openid = $user['id'];
//通过openid找到user在joomla系统内的id
//这里应该有一张数据表用来记录joomla内用户的id和openid之间的一一对应关系
//当用户第一次使用微信授权登录时，应该提示用户注册或者绑定已有账号，把用户的openid和用户的在joomla的id写入上述的表中
//当用户第二次通过微信授权登录时，直接通过openid在这张表里查询到用户的id，然后生成joomla的会话
//这里把过程省略..假设得出结果user在系统内的id为270（我joomla的管理员id）
        $uid =270;
        $instance = JUser::getInstance();
        $instance->load($uid);
        $session = JFactory::getSession();
//生成会话
        $session->set('user', $instance);
        $targetUrl = 'http://【域名】/joomla/index.php';
// 跳转到joomla首页
        header('location:'. $targetUrl);

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

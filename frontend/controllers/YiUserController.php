<?php

namespace frontend\controllers;

use Yii;
use app\models\YiUser;
use app\models\YiUserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * YiUserController implements the CRUD actions for YiUser model.
 */
class YiUserController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all YiUser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new YiUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single YiUser model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new YiUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $query = YiUser::find()->where(['u_openid'=>Yii::$app->user->identity->username])->one();
        $model = $this->findModel($query['u_id']);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            var_dump(Yii::$app->request->post());die;
            if(!$model->save()) {
                var_dump($model->errors);die;
            }else{
                var_dump($model->u_id);die;
            }
            return $this->redirect(['site/home', 'openid' => $model->u_openid]);
        } else {
//            var_dump(Yii::$app->user->isGuest);die;
//            var_dump(Yii::$app->user->identity->username);die;
//            $model->u_openid = Yii::$app->user->identity->username;
//            $model->u_wx_name = YiUser::find()->where(['u_openid'=>$model->u_openid])->one()['u_wx_name'];
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing YiUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->u_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing YiUser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the YiUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return YiUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = YiUser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

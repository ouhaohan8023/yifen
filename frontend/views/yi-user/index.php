<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\YiUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Yi Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yi-user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Yi User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'u_id',
            'u_openid',
            'u_name',
            'u_wx_name',
            'u_phone',
            // 'u_kd',
            // 'u_time',
            // 'u_last_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

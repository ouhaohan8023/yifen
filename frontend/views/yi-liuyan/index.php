<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\YiLiuyanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Yi Liuyans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yi-liuyan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Yi Liuyan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'l_id',
            'l_user_id',
            'l_txt',
            'l_phone',
            'l_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

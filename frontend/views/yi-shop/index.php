<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\YiShopSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Yi Shops';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yi-shop-index">

    <h1 style="text-align: center"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Yi Shop', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            's_id',
            's_name',
            's_value',
            's_txt',
            's_class',
            // 's_time',
            // 's_last_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

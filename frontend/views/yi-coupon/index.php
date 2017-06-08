<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\YiCouponSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Yi Coupons';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yi-coupon-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Yi Coupon', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'c_id',
            'c_name',
            'c_value',
            'c_txt',
            'c_img',
            // 'c_time_start',
            // 'c_time_end',
            // 'c_time',
            // 'c_last_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

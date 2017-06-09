<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\YiCouponSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '优惠卷';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .row{
        margin-left: 0;
        margin-right: 0;
    }
    .coupon-box a {
        color: #ffffff;
    }
    .coupon-box .coupon {
        /*background-image: url(../web/images/coupon.png);*/
        background-position: -123px 0;
        /*width: 241px;*/
        height: 148px;
        position: relative;
    }
    .cp-bg-color-1 {
        background-color: #F18B8B;
    }
    div {
        display: block;
    }
    .coupon-box {
        float: left;
        padding: 10px;
        font-family: tahoma,arial,'Hiragino Sans GB',SimSun,'\5b8b\4f53',sans-serif;
        font-weight: lighter;
    }
    .coupon-box .coupon-upper {
        position: relative;
        font-size: 14.5px;
        width: 100%;
        height: 148px;
        color: #fff;
    }
    .coupon-box .amount {
        top: 5px;
        left: 9px;
        font-size: 40px;
        font-weight: 400;
    }
    .coupon-box .coupon-upper>a {
        display: block;
        float: left;
        position: absolute;
    }
    .coupon-box .scope {
        top: 30px;
        right: 20px;
        font-weight: 700;
    }
    .coupon-box .lb-use-cond {
        top: 80px;
        left: 9px;
    }
    .coupon-box .use-cond {
        top: 80px;
        left: 74px;
    }
    .coupon-box .lb-valid-date {
        top: 100px;
        left: 9px;
    }
    .coupon-box .valid-date {
        top: 100px;
        left: 74px;
    }
    .coupon-box .lb-shop-name {
        top: 120px;
        left: 9px;
    }
    .coupon-box .shop-name {
        top: 120px;
        left: 74px;
        color: #fff;
        text-decoration: none;
    }
</style>
<div class="yi-coupon-index">

    <h1 style="margin-left: 15px"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>-->
<!--        --><?//= Html::a('Create Yi Coupon', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->
<!--    --><?//= GridView::widget([
//        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//
//            'c_id',
//            'c_name',
//            'c_value',
//            'c_txt',
//            'c_img',
//            // 'c_time_start',
//            // 'c_time_end',
//            // 'c_time',
//            // 'c_last_time',
//
//            ['class' => 'yii\grid\ActionColumn'],
//        ],
//    ]); ?>

    <div class="row">
        <div class="coupon-box col-xs-9" style="padding-right: 0" >
            <div class="coupon cp-bg-color-1" style="padding-left: 0;">
                <div class="coupon-upper">
                    <a class="amount"><span class="price-symbol">￥</span>10</a>
                    <a class="scope">全店通用</a>

                    <div class="row" style="padding-top: 60px;padding-left: 9px">
                        <a>使用条件:</a>
                        <a>满25.00</a>
                    </div>
                    <div class="row" style="padding-top: 0;padding-left: 9px">
                        <a>有效时间:</a>
                        <a>2017.06.04&nbsp;至&nbsp;2017.06.27</a>
                    </div>
                    <div class="row" style="padding-top: 0px;padding-left: 9px">
                        <a>发行店铺:</a>
                        <a>今度烘焙</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-3" id="btn" style="padding-top: 20px;padding-left: 3px">
            <div class="col-xs-12" style="padding: 0"><button type="button" class="btn btn-info btn-lg" style="padding: 8px 8px">查看<ohh id="br"></ohh>详情</button></div>
            <div class="col-xs-12" style="margin-top: 10px;padding: 0"><button id="lingqu" type="button" class="btn btn-success btn-lg" style="padding: 8px 8px;">&nbsp;&nbsp;&nbsp;&nbsp;领取&nbsp;&nbsp;&nbsp;</button>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="coupon-box col-xs-9" style="padding-right: 0" >
            <div class="coupon cp-bg-color-1" style="padding-left: 0;">
                <div class="coupon-upper">
                    <a class="amount"><span class="price-symbol">￥</span>10</a>
                    <a class="scope">全店通用</a>

                    <div class="row" style="padding-top: 60px;padding-left: 9px">
                        <a>使用条件:</a>
                        <a>满25.00</a>
                    </div>
                    <div class="row" style="padding-top: 0;padding-left: 9px">
                        <a>有效时间:</a>
                        <a>2017.06.04&nbsp;至&nbsp;2017.06.27</a>
                    </div>
                    <div class="row" style="padding-top: 0px;padding-left: 9px">
                        <a>发行店铺:</a>
                        <a>今度烘焙</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-3" id="btn" style="padding-top: 20px;padding-left: 3px">
            <div class="col-xs-12" style="padding: 0"><button type="button" class="btn btn-info btn-lg" style="padding: 8px 8px">查看<ohh id="br"></ohh>详情</button></div>
            <div class="col-xs-12" style="margin-top: 10px;padding: 0"><button id="lingqu" type="button" class="btn btn-success btn-lg" style="padding: 8px 8px;">&nbsp;&nbsp;&nbsp;&nbsp;领取&nbsp;&nbsp;&nbsp;</button>
            </div>
        </div>
    </div>

    <?php
    $this->registerJsFile("/yifen/frontend/web/js/coupon-index.js", ["depends" => [\yii\web\JqueryAsset::className()]],\yii\web\View::POS_END);

    ?>


</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\YiCoupon */

$this->title = 'Create Yi Coupon';
$this->params['breadcrumbs'][] = ['label' => 'Yi Coupons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yi-coupon-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

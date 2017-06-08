<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\YiCoupon */

$this->title = 'Update Yi Coupon: ' . $model->c_id;
$this->params['breadcrumbs'][] = ['label' => 'Yi Coupons', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->c_id, 'url' => ['view', 'id' => $model->c_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="yi-coupon-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

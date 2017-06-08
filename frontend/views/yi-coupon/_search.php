<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\YiCouponSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="yi-coupon-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'c_id') ?>

    <?= $form->field($model, 'c_name') ?>

    <?= $form->field($model, 'c_value') ?>

    <?= $form->field($model, 'c_txt') ?>

    <?= $form->field($model, 'c_img') ?>

    <?php // echo $form->field($model, 'c_time_start') ?>

    <?php // echo $form->field($model, 'c_time_end') ?>

    <?php // echo $form->field($model, 'c_time') ?>

    <?php // echo $form->field($model, 'c_last_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

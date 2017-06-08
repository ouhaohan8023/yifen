<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\YiCoupon */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="yi-coupon-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'c_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c_value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c_txt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c_img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c_time_start')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c_time_end')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c_last_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

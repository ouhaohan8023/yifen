<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\YiUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="yi-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'u_openid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_wx_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_phone')->textInput() ?>

    <?= $form->field($model, 'u_kd')->textInput() ?>

    <?= $form->field($model, 'u_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_last_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

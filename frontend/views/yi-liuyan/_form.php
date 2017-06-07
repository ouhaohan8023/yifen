<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\YiLiuyan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="yi-liuyan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'l_user_id')->textInput() ?>

    <?= $form->field($model, 'l_txt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'l_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'l_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

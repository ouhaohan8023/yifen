<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\YiShop */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="yi-shop-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 's_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 's_value')->textInput() ?>

    <?= $form->field($model, 's_txt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 's_class')->textInput() ?>

    <?= $form->field($model, 's_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 's_last_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

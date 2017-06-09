<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\YiShopSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="yi-shop-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 's_id') ?>

    <?= $form->field($model, 's_name') ?>

    <?= $form->field($model, 's_value') ?>

    <?= $form->field($model, 's_txt') ?>

    <?= $form->field($model, 's_class') ?>

    <?php // echo $form->field($model, 's_time') ?>

    <?php // echo $form->field($model, 's_last_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

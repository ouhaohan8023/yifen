<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\YiLiuyanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="yi-liuyan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'l_id') ?>

    <?= $form->field($model, 'l_user_id') ?>

    <?= $form->field($model, 'l_txt') ?>

    <?= $form->field($model, 'l_phone') ?>

    <?= $form->field($model, 'l_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

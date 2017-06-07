<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\YiUserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="yi-user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'u_id') ?>

    <?= $form->field($model, 'u_openid') ?>

    <?= $form->field($model, 'u_name') ?>

    <?= $form->field($model, 'u_wx_name') ?>

    <?= $form->field($model, 'u_phone') ?>

    <?php // echo $form->field($model, 'u_kd') ?>

    <?php // echo $form->field($model, 'u_time') ?>

    <?php // echo $form->field($model, 'u_last_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

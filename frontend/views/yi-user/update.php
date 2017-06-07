<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\YiUser */

$this->title = 'Update Yi User: ' . $model->u_id;
$this->params['breadcrumbs'][] = ['label' => 'Yi Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->u_id, 'url' => ['view', 'id' => $model->u_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="yi-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

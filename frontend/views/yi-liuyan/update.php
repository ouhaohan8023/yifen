<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\YiLiuyan */

$this->title = 'Update Yi Liuyan: ' . $model->l_id;
$this->params['breadcrumbs'][] = ['label' => 'Yi Liuyans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->l_id, 'url' => ['view', 'id' => $model->l_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="yi-liuyan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

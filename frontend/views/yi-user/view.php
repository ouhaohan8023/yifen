<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\YiUser */

$this->title = $model->u_id;
$this->params['breadcrumbs'][] = ['label' => 'Yi Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yi-user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->u_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->u_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'u_id',
            'u_openid',
            'u_name',
            'u_wx_name',
            'u_phone',
            'u_kd',
            'u_time',
            'u_last_time',
        ],
    ]) ?>

</div>

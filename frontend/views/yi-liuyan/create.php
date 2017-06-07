<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\YiLiuyan */

$this->title = 'Create Yi Liuyan';
$this->params['breadcrumbs'][] = ['label' => 'Yi Liuyans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yi-liuyan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

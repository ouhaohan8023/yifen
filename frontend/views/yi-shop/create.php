<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\YiShop */

$this->title = 'Create Yi Shop';
$this->params['breadcrumbs'][] = ['label' => 'Yi Shops', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yi-shop-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

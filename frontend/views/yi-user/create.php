<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\YiUser */

$this->title = 'Create Yi User';
$this->params['breadcrumbs'][] = ['label' => 'Yi Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yi-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

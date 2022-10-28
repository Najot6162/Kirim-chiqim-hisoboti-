<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\OrderProduct $model */

$this->title = 'Zakaz Mahsulotini Ozgartirish: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Zakaz Mahsulotlari', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
?>
<div class="order-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

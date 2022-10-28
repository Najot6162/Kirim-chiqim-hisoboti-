<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\OrderProduct $model */

$this->title = 'Zakazga Mahsulot Qoshish';
$this->params['breadcrumbs'][] = ['label' => 'Zakaz ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

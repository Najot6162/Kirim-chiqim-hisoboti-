<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PurchaseProduct $model */

$this->title = 'Prixod Mahsulot Yaratish';
$this->params['breadcrumbs'][] = ['label' => 'Prixod Mahsulotlari', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchase-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

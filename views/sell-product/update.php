<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SellProduct $model */

$this->title = 'otuv Mahsulotini Ozgartirish: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sotilgan Mahsulotlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sell-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

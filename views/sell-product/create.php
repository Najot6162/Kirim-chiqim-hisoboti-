<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SellProduct $model */

$this->title = 'Sotuv uchun mahsulot qoshish';
$this->params['breadcrumbs'][] = ['label' => 'Sotilgan Tovarlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sell-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

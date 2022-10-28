<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\ServiceCost $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Barcha Zakaz Mahsulotlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="service-cost-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ozgaritish', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Ochirish', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Ushbu zakazni ochirasizmi?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'product_id',
            'amount',
            'cost',
            'nds'
        ],
    ]) ?>

</div>

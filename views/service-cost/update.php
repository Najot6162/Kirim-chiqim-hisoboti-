<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ServiceCost $model */

$this->title = 'Xizmat narxini ozgartirish: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Xizmat Narxlari', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="service-cost-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

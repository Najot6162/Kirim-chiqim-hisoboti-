<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Sell $model */

$this->title = 'Sotuvni Ozgartirish : ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sotuvlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
?>
<div class="sell-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

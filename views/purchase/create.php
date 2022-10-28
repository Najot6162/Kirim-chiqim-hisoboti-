<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Purchase $model */

$this->title = 'Prixod Yaratish';
$this->params['breadcrumbs'][] = ['label' => 'Prixodlar', 'url' => ['index']];
?>
<div class="purchase-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

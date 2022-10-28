<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Sell $model */

$this->title = 'Sotuv Yaratish';
$this->params['breadcrumbs'][] = ['label' => 'Sotuvlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sell-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ServiceCost $model */

$this->title = 'Xizmat narxini yaratish';
$this->params['breadcrumbs'][] = ['label' => 'Xizmat narxlari', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="order-product-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-3">    <?= $form->field($model, 'service')->dropDownList(\app\models\Service::selectList()) ?></div>
        <div class="col-2">    <?= $form->field($model, 'cost')->textInput(['maxlength' => true]) ?></div>
        <div class="col-2">
            <h6> </h6>
            <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>
<br>

<!--<div class="service-cost-create">-->
<!---->
<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
<!---->
<!--    --><?//= $this->render('_form', [
//        'model' => $model,
//    ]) ?>
<!---->
<!--</div>-->

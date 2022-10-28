<?php

use app\models\OrderProduct;
use app\models\ServiceCost;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Order $model */

$this->params['breadcrumbs'][] = ['label' => 'Zakazlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>
<div class="order-product-form">
        <div class="row">
            <div class="col-2">
                <h6> <?= $order_date->order_number ?></h6>
            </div>
            <div class="col-2">
                <h6> Zakaz Vaqti : <?= $order_date->date ?></h6>
            </div>
        </div>

    <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-3">    <?= $form->field($model, 'product_id')->dropDownList(\app\models\Product::selectList()) ?></div>
            <div class="col-2">    <?= $form->field($model, 'amount')->textInput() ?></div>
            <div class="col-2">    <?= $form->field($model, 'cost')->textInput(['maxlength' => true]) ?></div>
            <div class="col-3">    <?= $form->field($model, 'nds')->textInput() ?></div>
            <div class="col-2">
                <h6> </h6>
                <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
</div>
<br>
<div class="order-view">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            [
                'attribute' => 'product_id',
                'value' => 'product.name'
            ],
            'amount',
            'cost',
            'nds',

            [
                'class' => ActionColumn::className(),
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        $t = '/order-product/update';
                        return Html::a(Html::tag('span', 'update', ['class' => "glyphicon glyphicon-pencil"]), Url::to([$t, 'id' => $model->id]), ['class' => 'glyphicon glyphicon-pencil']);
                    },
                ]
            ],
        ],
    ]); ?>
</div>

<br>

<div class="order-product-form">

    <?php $form = ActiveForm::begin(); ?>

    <h4>Xizmat qo'shish</h4>
    <div class="row">
        <div class="col-3">    <?= $form->field($serviceModel, 'service_id')->dropDownList(\app\models\Service::selectList()) ?></div>
        <div class="col-2">    <?= $form->field($serviceModel, 'cost')->textInput(['maxlength' => true]) ?></div>
        <div class="col-2">
            <h6> </h6>
            <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<div class="service-cost-index">

    <h1><?= 'Xarajatlar royhati'?></h1>
    <?= GridView::widget([
        'dataProvider' => $serviceDataProvider,
        'filterModel' => $serviceSearchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'service_id',
                'value' => 'service.name'
            ],
            'cost',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ServiceCost $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>

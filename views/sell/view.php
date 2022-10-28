<?php

use app\models\OrderProduct;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\OrderProduct $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sotuvlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-product-form">



    <div class="row">
        <div class="col-2">
            <h6> <?= $sellDate->number ?></h6>
        </div>
        <div class="col-2">
            <h6> Sotuv Date : <?= $sellDate->date ?></h6>
        </div>
    </div>

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-3">    <?= $form->field($model, 'product_id')->dropDownList(\app\models\PurchaseProduct::selectList()) ?></div>
        <div class="col-2">    <?= $form->field($model, 'amount')->textInput() ?></div>
        <div class="col-2">    <?= $form->field($model, 'price')->textInput() ?></div>
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
            'price',
            [
                'class' => ActionColumn::className(),
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        $t = '/sell-product/update';
                        return Html::a(Html::tag('span', 'update', ['class' => "glyphicon glyphicon-pencil"]), Url::to([$t, 'id' => $model->id]), ['class' => 'glyphicon glyphicon-pencil']);
                    },
                ]
            ],
        ],
    ]); ?>

</div>

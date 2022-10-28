<?php

use app\models\OrderProduct;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\OrderProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Barcha Mahsulotlar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-product-index">

    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p>-->
<!--        --><?//= Html::a('Create Order Product', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'product_id',
                'value' => 'product.name',
                  'filter' => \app\models\Product::selectList(),
            ],
            'amount',
            'cost',
            //'nds',
            [
                'class' => ActionColumn::className(),
                'template' => '{prixod}',
                'buttons' => [
                        'prixod' => function ( $url, $model){
                            return Html::a('prixod qilish',  Url::to(['/order/product', 'id' => $model->id]));
                        }
                ]
            ],


        ],
    ]); ?>


</div>

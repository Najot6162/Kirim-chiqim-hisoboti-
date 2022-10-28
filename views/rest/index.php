<?php

use yii\grid\GridView;
/** @var yii\web\View $this */
/** @var app\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
//print_r(\app\models\Product::selectList()); die();
?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        [
            'attribute' => 'id',
            'label' => 'Mahsulot Nomi',
            'value' => function ($data){
                return $data['name'];
            },
            'filter' => \app\models\Product::selectList(),
//            'filterOptions' => ['prompt' => 'All'],
        ],

        [
            'label' => 'Prixotdagi Mahsulot Soni',
            'value' => function ($data){
                return $data['prixod_count'];
            }
        ],
        [
            'label' => 'Sotilgan Mahsulot Soni',
            'value' => function ($data){
                return $data['sotuvdagi_count'];
            }
        ],
        [
            'label' => 'Qolgan Mahsulot Soni',
            'value' => function ($data){
                return $data['amount'];
            }
        ],

    ],
]); ?>
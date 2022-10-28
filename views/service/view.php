<?php

use app\models\OrderProduct;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Order $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Xizmatlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'service_id',
                'value' => 'service.name'
            ],
            'cost',

            [
                'class' => ActionColumn::className(),
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        $t = '/service-cost/update';
                        return Html::a(Html::tag('span', 'update', ['class' => "glyphicon glyphicon-pencil"]), Url::to([$t, 'id' => $model->id]), ['class' => 'glyphicon glyphicon-pencil']);
                    },
                ]
            ],
        ],
    ]); ?>

</div>

<?php

namespace app\controllers;

use app\models\Product;
use app\models\ProductSearch;
use yii\data\ArrayDataProvider;
use yii\db\Query;
use yii\web\Controller;

class RestController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $searchModel->load(\Yii::$app->request->get());
        $params = [];

        $sql = "
       
select
    p.id,
       p.name,
       prixod.amount as prixod_count,
       rasxod.amount as sotuvdagi_count,
    prixod.amount - rasxod.amount as amount
from purchase_product

left join
    (
        select
            pp.product_id,
            sum(pp.amount) as amount
        from purchase_product pp
        group by pp.product_id
    ) prixod on prixod.product_id = purchase_product.product_id

left join
    (
        select
            sp.product_id,
            sum(sp.amount) as amount
        from sell_product sp
        group by sp.product_id
        ) rasxod on rasxod.product_id = purchase_product.product_id
left join product p on p.id = purchase_product.product_id ";

        if ($searchModel->id) {
            $sql .= ' and product.id = :product_id ';
            $params = array_merge($params, [':product_id' => $searchModel->id]);
        }

        $sql .= "
        group by purchase_product.product_id";

        $data = \Yii::$app->db->createCommand($sql, $params);
        $result = $data->queryAll();

        $dataProvider = new ArrayDataProvider([
            'allModels' => $result,
        ]);

        return $this->render('index', [
            'model' => $result,
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);

    }
}
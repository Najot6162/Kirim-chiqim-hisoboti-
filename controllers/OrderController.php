<?php

namespace app\controllers;

use app\models\Order;
use app\models\OrderProduct;
use app\models\OrderProductSearch;
use app\models\OrderSearch;
use app\models\Purchase;
use app\models\PurchaseProduct;
use app\models\Service;
use app\models\ServiceCost;
use app\models\ServiceCostSearch;
use app\models\ServiceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Order models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Order model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        $model = new OrderProduct();
        $serviceModel = new ServiceCost();
        $searchModel = new OrderProductSearch([
            'order_id' => $id
        ]);
        $order = new Order([
            'id'=>$id
        ]);
        $s_searchModel = new ServiceCostSearch([
            'order_id' => $id
        ]);
        $order_data = Order::findOne($id);
        $dataProvider = $searchModel->search($this->request->queryParams);
        $s_dataProvider = $s_searchModel->search($this->request->queryParams);

        if ($this->request->isPost) {
            //print_r($this->request->post()); die();
            if ($model->load($this->request->post()) && $model->validate()) {
                $model->order_id = $id;
                $model->is_purchase = 1;
                $model->save();
                return $this->redirect(['view', 'id' => $model->order_id]);
            }

            if ($serviceModel->load($this->request->post())) {

                $serviceModel->order_id = $id;
                $serviceModel->save();
//                print_r($model->errors); die();
                return $this->redirect(['view', 'id' => $serviceModel->order_id]);
            }
        }

//        echo '<pre>';
//        print_r($dataProvider->getModels());
//        die();

        return $this->render('view', [
            'searchModel' => $searchModel,
            'serviceSearchModel' => $s_searchModel,
            'dataProvider' => $dataProvider,
            'serviceDataProvider' => $s_dataProvider,
            'model' => $model,
            'serviceModel' => $serviceModel,
            'order'=>$order,
            'order_date'=>$order_data
        ]);
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Order();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $order = Order::find()->count();
                $model->order_number = "Zakaz raqami: ". ($order +1);
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Order model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionProduct($id)
    {
        $searchModel = new OrderProductSearch([
            'is_purchase' => 1
        ]);
        $dataProvider = $searchModel->search($this->request->queryParams);
        if ($id) {
//        $product = OrderProduct::find()->joinWith(['product', 'service', 'service.serviceAll'])->all();
            $product = OrderProduct::findOne(['id' => $id]);
            $product->is_purchase = 2;
            $product->save();

            $orderId = $product['order_id'];
//            print_r($product['order_id']); die();
            $costs = ServiceCost::find()->where(['order_id' => $orderId])->sum('cost');
            $massa = OrderProduct::find()->where(['order_id' => $orderId])->sum('amount');
            if ($product->nds == 2) {
                $product->cost = $product->cost / 1.15;
            }
            $price = $costs / $massa + $product->cost;
            $price = round($price);
            $cost = (string)$price;
            $pr_count = Purchase::find()->count();
            $purchase_number = ($pr_count+1);
            $purchase = new Purchase();
            $purchase->date = date('Y-m-d');
            $purchase->number = (string)$purchase_number;
            $purchase->save();
            $purchaseProduct = new PurchaseProduct();
            $purchaseProduct->product_id = $product->product_id;
            $purchaseProduct->amount = $product->amount;
            $purchaseProduct->price = $cost . " so'm";
            $purchaseProduct->purchase_id = $purchase->id;
            $purchaseProduct->save();
        }
        return $this->render('/order-product/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAllProducts()
    {
        $products = OrderProduct::find()->all();
        return $this->render('product', ['model' => $products]);
    }
}

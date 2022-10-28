<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "purchase_product".
 *
 * @property int $id
 * @property int|null $purchase_id
 * @property int|null $product_id
 * @property int|null $amount
 * @property string|null $price
 */
class PurchaseProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'purchase_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['purchase_id', 'product_id', 'amount'],'required'],
            [['purchase_id', 'product_id', 'amount'], 'integer'],
            [['price'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'purchase_id' => 'Prixod ID',
            'product_id' => 'Mahsulot ID',
            'amount' => 'Soni',
            'price' => 'Narxi',
        ];
    }

    public function getProduct(){
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    public function getPurchase(){
        return $this->hasOne(Purchase::className(), ['id' => 'purchase_id']);
    }

    public static function selectList(){
        $products = self::find()->joinWith('product')->asArray()->all();
        return ArrayHelper::map($products, 'id', 'product.name');
    }
}

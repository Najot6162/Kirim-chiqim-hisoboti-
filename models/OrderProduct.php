<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_product".
 *
 * @property int $id
 * @property int|null $order_id
 * @property int|null $product_id
 * @property int|null $amount
 * @property string|null $cost
 * @property int|null $nds
 */
class OrderProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'amount'], 'required'],
            [['order_id', 'product_id', 'amount', 'nds'], 'integer'],
            [['cost'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Zakaz ID',
            'product_id' => 'Mahsulot',
            'amount' => 'Soni',
            'cost' => 'Narxi',
            'nds' => 'Nds',
        ];
    }

    public function getProduct(){
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
    public function getService(){
        return $this->hasMany(ServiceCost::className(), ['order_id' => 'order_id']);
    }
    public function getOrder(){
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }

}

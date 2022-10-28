<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "sell_product".
 *
 * @property int $id
 * @property int|null $sell_id
 * @property int|null $product_id
 * @property int|null $amount
 */
class SellProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sell_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sell_id', 'product_id', 'amount','price'], 'required'],
            [['sell_id', 'product_id', 'amount','price'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sell_id' => 'Sotilgan Partia ID',
            'product_id' => 'Mahsulot ID',
            'amount' => 'Soni',
            'price'=> 'Narxi'
        ];
    }
    public function getProduct(){
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    public function getSell(){
        return $this->hasOne(Sell::className(), ['id' => 'sell_id']);
    }
}

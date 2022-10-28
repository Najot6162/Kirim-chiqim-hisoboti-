<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service_cost".
 *
 * @property int $id
 * @property int|null $service_id
 * @property int|null $order_id
 * @property string|null $cost
 */
class ServiceCost extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service_cost';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service_id','order_id'], 'integer'],
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
            'service_id' => 'Xizmat ID',
            'cost' => 'Narx',
        ];
    }

    public function getService(){
        return $this->hasOne(Service::className(), ['id' => 'service_id']);
    }
    public function getServiceAll(){
        return $this->hasOne(Service::className(), ['id' => 'service_id']);
    }

}

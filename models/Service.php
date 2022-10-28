<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "service".
 *
 * @property int $id
 * @property string|null $name
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Service Nomi',
        ];
    }


    public static function selectList(){
        $serviceOrder = self::find()->asArray()->all();
        return ArrayHelper::map($serviceOrder, 'id', 'name');
    }


}

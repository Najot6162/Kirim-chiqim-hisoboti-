<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%service_cost}}`.
 */
class m221026_045828_create_service_cost_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%service_cost}}', [
            'id' => $this->primaryKey(),
            'order_id'=>$this->integer(),
            'service_id'=>$this->integer(),
            'cost'=>$this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%service_cost}}');
    }
}

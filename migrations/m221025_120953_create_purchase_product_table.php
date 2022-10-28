<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%purchase_product}}`.
 */
class m221025_120953_create_purchase_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%purchase_product}}', [
            'id' => $this->primaryKey(),
            'purchase_id'=>$this->integer(),
            'product_id'=>$this->integer(),
            'amount'=>$this->integer(),
            'price'=>$this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%purchase_product}}');
    }
}

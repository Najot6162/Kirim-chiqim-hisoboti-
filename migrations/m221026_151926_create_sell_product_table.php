<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sell_product}}`.
 */
class m221026_151926_create_sell_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sell_product}}', [
            'id' => $this->primaryKey(),
            'sell_id'=>$this->integer(),
            'product_id'=>$this->integer(),
            'amount'=>$this->integer(),
            'price'=>$this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sell_product}}');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sell}}`.
 */
class m221026_151912_create_sell_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sell}}', [
            'id' => $this->primaryKey(),
            'date'=>$this->string(),
            'number'=>$this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sell}}');
    }
}

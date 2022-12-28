<?php

use PHPUnit\Framework\Error\Notice;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%shopper}}`.
 */
class m221224_060805_create_shopper_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%shopper}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'passport'=> $this->string()->notNull(),
            'address'=>$this->string()->notNull(),
            'phone'=>$this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%shopper}}');
    }
}

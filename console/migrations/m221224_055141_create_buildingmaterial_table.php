<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%buildingmaterial}}`.
 */
class m221224_055141_create_buildingmaterial_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%buildingmaterial}}', [
            'id' => $this->primaryKey(),
            'name'=> $this->string()->notNull(),
            'amount'=> $this->integer()->notNull(),
            'idwarehouse'=>$this->integer()->notNull(),
            'typematerial'=>$this->string()->notNull(),
            'cost'=>$this->double()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%buildingmaterial}}');
    }
}

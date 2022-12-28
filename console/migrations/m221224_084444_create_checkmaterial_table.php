<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%checkmaterial}}`.
 */
class m221224_084444_create_checkmaterial_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%checkmaterial}}', [
            'id' => $this->primaryKey(),
            'idbuilding' => $this->integer()->notNull(),
            'totalcost' => $this->integer()->notNull(),
            'idcustomer' => $this->integer()->notNull(),
            'amount' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-checkmaterial-idbuilding',
            'checkmaterial',
            'idbuilding',
            'buildingmaterial',
            'id'
        );

        $this->addForeignKey(
            'fk-checkmaterial-idcustomer',
            'checkmaterial',
            'idcustomer',
            'shopper',
            'id'
        );

        $this->addForeignKey(
            'fk-checkmaterial-user_id',
            'checkmaterial',
            'user_id',
            'user',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-checkmaterial-idbuilding',
            'checkmaterial'
        );
        $this->dropForeignKey(
            'fk-checkmaterial-idcustomer',
            'checkmaterial'
        );
        $this->dropForeignKey(
            'fk-checkmaterial-user_id',
            'checkmaterial'
        );
        $this->dropTable('{{%checkmaterial}}');
    }
}

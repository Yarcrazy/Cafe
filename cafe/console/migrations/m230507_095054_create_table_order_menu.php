<?php

use yii\db\Migration;

/**
 * Class m230507_095054_create_table_order_menu
 */
class m230507_095054_create_table_order_menu extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_menu}}', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer()->notNull(),
            'menu_id' => $this->integer()->notNull(),
            'amount' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('fk_order_menu_to_order', 'order_menu', 'order_id', 'order', 'id');
        $this->addForeignKey('fk_order_menu_to_menu', 'order_menu', 'menu_id', 'menu', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order_menu}}');
    }
}

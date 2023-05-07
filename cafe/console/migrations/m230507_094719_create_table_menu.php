<?php

use yii\db\Migration;

/**
 * Class m230507_094719_create_table_menu
 */
class m230507_094719_create_table_menu extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%menu}}', [
            'id' => $this->primaryKey(),
            'dish_id' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('fk_menu_dish', 'menu', 'dish_id', 'dish', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%menu}}');
    }
}

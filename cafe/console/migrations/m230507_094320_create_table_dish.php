<?php

use yii\db\Migration;

/**
 * Class m230507_094320_create_table_dish
 */
class m230507_094320_create_table_dish extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%dish}}', [
            'id' => $this->primaryKey(),
            'cook_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
        ]);
        $this->addForeignKey('fk_dish_cook', 'dish', 'cook_id', 'cook', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%dish}}');
    }
}

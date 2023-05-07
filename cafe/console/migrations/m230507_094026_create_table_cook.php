<?php

use yii\db\Migration;

/**
 * Class m230507_094026_create_table_cook
 */
class m230507_094026_create_table_cook extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cook}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%cook}}');
    }
}

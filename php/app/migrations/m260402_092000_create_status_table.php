<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%status}}`.
 */
class m260402_092000_create_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%status}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull()->unique(),
            'color' =>$this->string(7)->notNull()->defaultValue('#e6e6e6')
        ]);
        $this->batchInsert('status', ['name', 'color'], [
            ['Открыта', '#42b0e3'],
            ['В работе', '#e3ad42'],
            ['Выполнена', '#42e370'],
            ['Закрыта', '#9badb5'],
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%status}}');
    }
}

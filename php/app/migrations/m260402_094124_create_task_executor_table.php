<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%task_executor}}`.
 */
class m260402_094124_create_task_executor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('{{%task_executor}}', [
            'task_id' => $this->integer()->notNull(),
            'executor_id' => $this->integer()->notNull(),
            'PRIMARY KEY (task_id, executor_id)'
        ]);

        $this->addForeignKey(
            'fk_task_executor_task',
            'task_executor',
            'task_id',
            'task',
            'id',
            'CASCADE'
        );


        $this->addForeignKey(
            'fk_task_executor_executor',
            'task_executor',
            'executor_id',
            'executor',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {


        $this->dropForeignKey(
            'fk_task_executor_task',
            'task_executor',
        );
        $this->dropForeignKey(
            'fk_task_executor_executor',
            'task_executor',
        );
        $this->dropTable('{{%task_executor}}');
    }
}

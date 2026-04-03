<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%task}}`.
 */
class m260402_093931_create_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%task}}', [
            'id' => $this->primaryKey(),
            'project_id' => $this->integer()->notNull(),
            'status_id' => $this->integer()->notNull()->defaultValue(1),
            'title' => $this->string(255)->notNull(),
            'description' => $this->text()->null(),
            'priority' => $this->smallInteger()->notNull()->defaultValue(2)->check('priority BETWEEN 1 AND 3'),
            'deadline' => $this->date()->null(),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('NOW()'),
            'create_at' => $this->timestamp()->notNull()->defaultExpression('NOW()')
        ]);

        $this->addForeignKey(
            'fk_task_project',
            'task',
            'project_id',
            'project',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk_task_status',
            'task',
            'status_id',
            'status',
            'id',
            'RESTRICT'
        );

        $this->createIndex('idx_task_project', 'task', 'project_id');
        $this->createIndex('idx_task_status', 'task', 'status_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_task_project', 'task');
        $this->dropForeignKey('fk_task_status', 'task');
        $this->dropTable('{{%task}}');
    }
}

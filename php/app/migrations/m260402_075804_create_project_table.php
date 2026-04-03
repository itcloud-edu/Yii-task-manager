<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%project}}`.
 */
class m260402_075804_create_project_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%project}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->text()->null(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('NOW()')

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%project}}');
    }
}

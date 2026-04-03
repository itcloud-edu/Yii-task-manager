<?php

use yii\db\Migration;

class m260403_120000_add_user_id_to_project_table extends Migration
{
    public function safeUp(): void
    {
        $this->addColumn('project', 'user_id', $this->integer()->null()->after('id'));

        $this->createIndex('idx_project_user_id', 'project', 'user_id');

        $this->addForeignKey(
            'fk_project_user',
            'project',
            'user_id',
            'user',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown(): void
    {
        $this->dropForeignKey('fk_project_user', 'project');
        $this->dropIndex('idx_project_user_id', 'project');
        $this->dropColumn('project', 'user_id');
    }
}

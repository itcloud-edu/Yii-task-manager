<?php

namespace app\models;

use yii\db\ActiveRecord;

class Project extends ActiveRecord {
    public static function tableName(): string
    {
        return 'project';
    }
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max'=>255],
            [['description'], 'safe']
        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'description' => 'Описание',
            'created_at' => 'Создан'
        ];
    }
        public static function getList(): array
    {
        return self::find()
            ->select(['id', 'title'])
            ->indexBy('id')
            ->column();
    }

}

// Project::find()->all()
// Project::findOne(1)
// $project->save()
// $project->delete()


<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\ActiveQuery;

class Project extends ActiveRecord {
    public static function tableName(): string
    {
        return 'project';
    }

    public function rules(): array
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['description'], 'safe'],
            [['user_id'], 'integer'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'description' => 'Описание',
            'user_id' => 'Автор',
            'created_at' => 'Создан',
        ];
    }

    public function getUser(): ActiveQuery
    {
        return $this->belongsTo(User::class, ['id' => 'user_id']);
    }

    public static function getList(): array
    {
        $userId = Yii::$app->user->id;
        return self::find()
            ->select(['id', 'title'])
            ->where(['user_id' => $userId])
            ->indexBy('id')
            ->column();
    }
}

// Project::find()->all()
// Project::findOne(1)
// $project->save()
// $project->delete()


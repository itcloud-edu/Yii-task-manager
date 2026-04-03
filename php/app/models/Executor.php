<?php

namespace app\models;

use yii\db\ActiveRecord;

class Executor extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'executor';
    }

    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            [['name', 'email'], 'string', 'max' => 255],
            [['email'], 'email'],
            [['email'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'email' => 'Email',
        ];
    }
}

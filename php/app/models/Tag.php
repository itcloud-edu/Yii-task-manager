<?php

namespace app\models;

use yii\db\ActiveRecord;

class Tag extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'tag';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
            [['name'], 'unique'],
            [['color'], 'string', 'max' => 7],
            [['color'], 'default', 'value' => '#e6e6e6'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'color' => 'Цвет',
        ];
    }
        public static function getList(): array
    {
        return self::find()
            ->select(['id', 'name'])
            ->indexBy('id')
            ->column();
    }
}

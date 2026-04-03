<?php

namespace app\models;

use yii\db\ActiveRecord;

class Status extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'status';
    }

    public function rules(): array
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
            [['name'], 'unique'],
            [['color'], 'string', 'max' => 7],
            // match — валидатор по регулярному выражению
            [['color'], 'match', 'pattern' => '/^#[0-9a-fA-F]{6}$/'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id'    => 'ID',
            'name'  => 'Название',
            'color' => 'Цвет (HEX)',
        ];
    }

    /**
     * Удобный метод: все статусы в виде [id => name] для выпадающих списков.
     * Html::dropDownList и ActiveForm->field()->dropDownList() принимают именно такой формат.
     */
    public static function getList(): array
    {
        return self::find()
            ->select(['id', 'name'])
            ->indexBy('id')
            ->column();
    }
}

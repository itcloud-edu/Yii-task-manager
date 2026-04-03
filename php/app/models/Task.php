<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Task extends ActiveRecord
{
    /** @var int[] выбранные id тегов из формы (не колонка БД) */
    public $tagIds = [];

    /** @var int[] выбранные id исполнителей из формы (не колонка БД) */
    public $executorIds = [];

    const PRIORITY_LOW = 1;
    const PRIORITY_MEDIUM = 2;
    const PRIORITY_HIGH = 3;


    public static function tableName()
    {
        return 'task';
    }

    public function rules()
    {
        return [
            [['title', 'project_id', 'status_id'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['description'], 'safe'],
            [['project_id', 'status_id'], 'integer'],
            // in — проверяет, что значение входит в список допустимых
            [['priority'], 'in', 'range' => [self::PRIORITY_LOW, self::PRIORITY_MEDIUM, self::PRIORITY_HIGH]],
            [['deadline'], 'date', 'format' => 'php:Y-m-d'],
            // exist — проверяет, что запись с таким id существует в связанной таблице
            [['project_id'], 'exist', 'targetClass' => Project::class, 'targetAttribute' => 'id'],
            [['status_id'], 'exist', 'targetClass' => Status::class, 'targetAttribute' => 'id'],
            [['tagIds', 'executorIds'], 'each', 'rule' => ['integer']],
        ];
    }
    public function attributeLabels(): array
    {
        return [
            'id'          => 'ID',
            'project_id'  => 'Проект',
            'status_id'   => 'Статус',
            'title'       => 'Заголовок',
            'description' => 'Описание',
            'priority'    => 'Приоритет',
            'deadline'    => 'Дедлайн',
            'created_at'  => 'Создана',
            'updated_at'  => 'Обновлена',
            'tagIds'      => 'Теги',
            'executorIds' => 'Исполнители',
        ];
    }

    public static function getPriorityList(): array
    {
        return [
            self::PRIORITY_LOW => 'Низкий',
            self::PRIORITY_MEDIUM => 'Средний',
            self::PRIORITY_HIGH => 'Высокий'
        ];
    }

    public function getProject(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Project::class, ['id' => 'project_id']);
    }

    public function getStatus(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Status::class, ['id' => 'status_id']);
    }

    public function getTags(): \yii\db\ActiveQuery
    {
        return $this->hasMany(Tag::class, ['id' => 'tag_id'])->viaTable('task_tag', ['task_id' => 'id']);
    }

    public function getExecutors(): \yii\db\ActiveQuery
    {
        return $this->hasMany(Executor::class, ['id' => 'executor_id'])->viaTable('task_executor', ['task_id' => 'id']);
    }

    public function saveTags(array $tagIds): void
    {
        Yii::$app->db->createCommand()->delete('task_tag', ['task_id' => $this->id])->execute();

        if (!empty($tagIds)) {
            $rows = array_map(fn($tagId) => [$this->id, $tagId], $tagIds);
            Yii::$app->db->createCommand()->batchInsert('task_tag', ['task_id', 'tag_id'], $rows)->execute();
        }
    }

    public function saveExecutors(array $tagIds): void
    {
        Yii::$app->db->createCommand()->delete('task_executor', ['task_id' => $this->id])->execute();

        if (!empty($tagIds)) {
            $rows = array_map(fn($tagId) => [$this->id, $tagId], $tagIds);
            Yii::$app->db->createCommand()->batchInsert('task_executor', ['task_id', 'executor_id'], $rows)->execute();
        }
    }

    public function beforeSave($insert): bool
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        $this->updated_at = date('Y-m-d H:i:s');
        return true;
    }
}

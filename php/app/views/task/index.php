<?php

/** @var yii\web\View $this */
/** @var app\models\Task[] $tasks */

use app\models\Task;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Задачи';
?>
<div>
    <div class="t3-page-header">
        <h1 class="t3-page-title"><?= Html::encode($this->title) ?></h1>
        <?= Html::a('+ Новая задача', Url::to(['task/create']), ['class' => 't3-btn t3-btn-primary']) ?>
    </div>

    <?php if ($tasks === []): ?>
        <div class="t3-empty">
            Задач пока нет.<br>
            <?= Html::a('Создать первую задачу', ['task/create']) ?>
        </div>
    <?php else: ?>
        <div class="t3-list">
            <?php foreach ($tasks as $task): ?>
                <?php
                $p = (int) $task->priority;
                if ($p === Task::PRIORITY_HIGH) {
                    $dotClass = 'high';
                    $dotTitle = 'Высокий';
                } elseif ($p === Task::PRIORITY_LOW) {
                    $dotClass = 'low';
                    $dotTitle = 'Низкий';
                } else {
                    $dotClass = 'medium';
                    $dotTitle = 'Средний';
                }
                ?>
                <div class="t3-row" onclick="location.href='<?= Url::to(['task/view', 'id' => $task->id]) ?>'">
                    <div class="t3-circle"></div>
                    <div class="t3-row-body">
                        <div class="t3-row-title"><?= Html::encode($task->title) ?></div>
                        <?php if ($task->deadline): ?>
                            <div class="t3-row-meta">
                                <?= Yii::$app->formatter->asDate($task->deadline, 'php:d.m.Y') ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="t3-priority-dot <?= $dotClass ?>" title="<?= $dotTitle ?>"></div>
                    <div class="t3-row-actions">
                        <?= Html::a('Изменить', ['task/update', 'id' => $task->id], ['onclick' => 'event.stopPropagation()']) ?>
                        <?= Html::a('Удалить', ['task/delete', 'id' => $task->id], ['class' => 'danger', 'onclick' => 'event.stopPropagation()']) ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

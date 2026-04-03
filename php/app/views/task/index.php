<?php

/** @var yii\web\View $this */
/** @var app\models\Task[] $tasks */

use app\models\Task;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Задачи';
?>
<div class="crud-index">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
        <h1 class="h5 mb-0"><?= Html::encode($this->title) ?></h1>
        <?= Html::a('Создать задачу', Url::to(['task/create']), ['class' => 'btn btn-primary btn-sm']) ?>
    </div>

    <?php if ($tasks === []): ?>
        <div class="alert alert-light border py-2 px-3 small mb-0">
            Задач пока нет. <?= Html::a('Создать первую', ['task/create'], ['class' => 'alert-link']) ?>.
        </div>
    <?php else: ?>
        <div class="list-group list-group-flush border rounded shadow-sm">
            <?php foreach ($tasks as $task): ?>
                <?php
                $p = (int) $task->priority;
                if ($p === Task::PRIORITY_HIGH) {
                    $priorityClass = 'danger';
                } elseif ($p === Task::PRIORITY_LOW) {
                    $priorityClass = 'secondary';
                } else {
                    $priorityClass = 'primary';
                }
                ?>
                <?= Html::a(
                    '<div class="d-flex w-100 justify-content-between align-items-center gap-2">'
                    . '<div class="min-w-0"><span class="small fw-semibold d-block text-truncate">'
                    . Html::encode($task->title) . '</span>'
                    . '<span class="text-muted" style="font-size:0.75rem;">#' . (int) $task->id . '</span></div>'
                    . '<span class="badge bg-' . $priorityClass . ' flex-shrink-0 align-self-center">'
                    . Html::encode(Task::getPriorityList()[$task->priority] ?? '')
                    . '</span></div>',
                    ['task/view', 'id' => $task->id],
                    ['class' => 'list-group-item list-group-item-action py-2 px-3', 'encode' => false]
                ) ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

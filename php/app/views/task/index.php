<?php

/** @var yii\web\View $this */
/** @var app\models\Task[] $tasks */

use app\models\Task;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Задачи';
?>
<div class="task-index">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
        <h1 class="h2 mb-0"><?= Html::encode($this->title) ?></h1>
        <?= Html::a('Создать задачу', Url::to(['task/create']), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php if ($tasks === []): ?>
        <div class="alert alert-light border text-muted mb-0">
            Задач пока нет. <?= Html::a('Создать первую', ['task/create']) ?>.
        </div>
    <?php else: ?>
        <div class="list-group shadow-sm">
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
                    '<div class="d-flex w-100 justify-content-between align-items-start gap-3">'
                    . '<div><span class="fw-semibold d-block">' . Html::encode($task->title) . '</span>'
                    . '<span class="small text-muted">#' . (int) $task->id . '</span></div>'
                    . '<span class="badge bg-' . $priorityClass . ' flex-shrink-0">'
                    . Html::encode(Task::getPriorityList()[$task->priority] ?? '')
                    . '</span></div>',
                    ['task/view', 'id' => $task->id],
                    ['class' => 'list-group-item list-group-item-action', 'encode' => false]
                ) ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

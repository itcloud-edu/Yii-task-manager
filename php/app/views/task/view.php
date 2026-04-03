<?php

/** @var yii\web\View $this */
/** @var app\models\Task $task */

use app\models\Task;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $task->title;
?>
<div class="task-view">
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><?= Html::a('Задачи', ['task/index']) ?></li>
            <li class="breadcrumb-item active" aria-current="page"><?= Html::encode($task->title) ?></li>
        </ol>
    </nav>

    <div class="d-flex flex-wrap justify-content-between align-items-start gap-2 mb-3">
        <h1 class="h2 mb-0"><?= Html::encode($task->title) ?></h1>
        <div class="btn-group flex-shrink-0">
            <?= Html::a('Изменить', Url::to(['task/update', 'id' => $task->id]), ['class' => 'btn btn-outline-primary btn-sm']) ?>
            <?= Html::a('Удалить', Url::to(['task/delete', 'id' => $task->id]), ['class' => 'btn btn-outline-danger btn-sm']) ?>
        </div>
    </div>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <dl class="row mb-0">
                <dt class="col-sm-3 text-muted">Проект</dt>
                <dd class="col-sm-9">
                    <?php if ($task->project !== null): ?>
                        <?= Html::a(Html::encode($task->project->title), ['project/view', 'id' => $task->project->id]) ?>
                    <?php else: ?>
                        —
                    <?php endif; ?>
                </dd>

                <dt class="col-sm-3 text-muted">Статус</dt>
                <dd class="col-sm-9"><?= $task->status !== null ? Html::encode($task->status->name) : '—' ?></dd>

                <dt class="col-sm-3 text-muted">Приоритет</dt>
                <dd class="col-sm-9"><?= Html::encode(Task::getPriorityList()[$task->priority] ?? '') ?></dd>

                <dt class="col-sm-3 text-muted">Дедлайн</dt>
                <dd class="col-sm-9">
                    <?= $task->deadline
                        ? Yii::$app->formatter->asDate($task->deadline, 'php:d.m.Y')
                        : '—' ?>
                </dd>

                <dt class="col-sm-3 text-muted align-self-start">Описание</dt>
                <dd class="col-sm-9 mb-0">
                    <?php if (trim((string) $task->description) !== ''): ?>
                        <?= nl2br(Html::encode($task->description)) ?>
                    <?php else: ?>
                        <span class="text-muted">Нет описания</span>
                    <?php endif; ?>
                </dd>
            </dl>
        </div>
    </div>

    <?php if ($task->tags !== []): ?>
        <div class="mb-3">
            <div class="text-muted small mb-2">Теги</div>
            <div class="d-flex flex-wrap gap-1">
                <?php foreach ($task->tags as $tag): ?>
                    <span class="badge rounded-pill" style="background-color: <?= Html::encode($tag->color ?: '#6c757d') ?>;">
                        <?= Html::encode($tag->name) ?>
                    </span>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($task->executors !== []): ?>
        <div class="mb-4">
            <div class="text-muted small mb-2">Исполнители</div>
            <ul class="list-unstyled mb-0">
                <?php foreach ($task->executors as $ex): ?>
                    <li><?= Html::encode($ex->name) ?><?php if ($ex->email): ?> <span class="text-muted small"><?= Html::encode($ex->email) ?></span><?php endif; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <p class="mb-0">
        <?= Html::a('К списку задач', Url::to(['task/index']), ['class' => 'btn btn-link ps-0']) ?>
    </p>
</div>

<?php

/** @var yii\web\View $this */
/** @var app\models\Task $task */

use app\models\Task;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $task->title;
?>
<div class="crud-view">
    <nav aria-label="breadcrumb" class="mb-2">
        <ol class="breadcrumb breadcrumb-sm mb-0 small">
            <li class="breadcrumb-item"><?= Html::a('Задачи', ['task/index']) ?></li>
            <li class="breadcrumb-item active" aria-current="page"><?= Html::encode($task->title) ?></li>
        </ol>
    </nav>

    <div class="d-flex flex-wrap justify-content-between align-items-start gap-2 mb-3">
        <h1 class="h5 mb-0 text-break"><?= Html::encode($task->title) ?></h1>
        <div class="btn-group btn-group-sm flex-shrink-0">
            <?= Html::a('Изменить', Url::to(['task/update', 'id' => $task->id]), ['class' => 'btn btn-outline-primary']) ?>
            <?= Html::a('Удалить', Url::to(['task/delete', 'id' => $task->id]), ['class' => 'btn btn-outline-danger']) ?>
        </div>
    </div>

    <div class="card border shadow-sm mb-3">
        <div class="card-body py-2 px-3 small">
            <dl class="row mb-0">
                <dt class="col-sm-3 text-muted">Проект</dt>
                <dd class="col-sm-9 mb-2 mb-sm-0">
                    <?php if ($task->project !== null): ?>
                        <?= Html::a(Html::encode($task->project->title), ['project/view', 'id' => $task->project->id], ['class' => 'small']) ?>
                    <?php else: ?>
                        —
                    <?php endif; ?>
                </dd>

                <dt class="col-sm-3 text-muted">Статус</dt>
                <dd class="col-sm-9 mb-2 mb-sm-0"><?= $task->status !== null ? Html::encode($task->status->name) : '—' ?></dd>

                <dt class="col-sm-3 text-muted">Приоритет</dt>
                <dd class="col-sm-9 mb-2 mb-sm-0"><?= Html::encode(Task::getPriorityList()[$task->priority] ?? '') ?></dd>

                <dt class="col-sm-3 text-muted">Дедлайн</dt>
                <dd class="col-sm-9 mb-2 mb-sm-0">
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
        <div class="mb-2">
            <div class="text-muted small mb-1">Теги</div>
            <div class="d-flex flex-wrap gap-1">
                <?php foreach ($task->tags as $tag): ?>
                    <span class="badge rounded-pill small" style="background-color: <?= Html::encode($tag->color ?: '#6c757d') ?>;">
                        <?= Html::encode($tag->name) ?>
                    </span>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($task->executors !== []): ?>
        <div class="mb-3">
            <div class="text-muted small mb-1">Исполнители</div>
            <ul class="list-unstyled mb-0 small">
                <?php foreach ($task->executors as $ex): ?>
                    <li><?= Html::encode($ex->name) ?><?php if ($ex->email): ?> <span class="text-muted"><?= Html::encode($ex->email) ?></span><?php endif; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <p class="mb-0">
        <?= Html::a('К списку задач', Url::to(['task/index']), ['class' => 'btn btn-link btn-sm ps-0']) ?>
    </p>
</div>

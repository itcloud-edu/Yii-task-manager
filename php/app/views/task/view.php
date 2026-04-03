<?php

/** @var yii\web\View $this */
/** @var app\models\Task $task */

use app\models\Task;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $task->title;

$priorityList = Task::getPriorityList();
$priorityLabel = $priorityList[$task->priority] ?? '—';
?>
<div>
    <div class="t3-breadcrumb">
        <?= Html::a('Задачи', ['task/index']) ?>
        <span class="t3-breadcrumb-sep">›</span>
        <span><?= Html::encode($task->title) ?></span>
    </div>

    <div class="t3-page-header">
        <div></div>
        <div style="display:flex;gap:8px;">
            <?= Html::a('Изменить', Url::to(['task/update', 'id' => $task->id]), ['class' => 't3-btn t3-btn-secondary']) ?>
            <?= Html::a('Удалить', Url::to(['task/delete', 'id' => $task->id]), ['class' => 't3-btn t3-btn-ghost', 'style' => 'color:var(--red)']) ?>
        </div>
    </div>

    <div class="t3-card">
        <div class="t3-card-body">
            <h1 class="t3-detail-title"><?= Html::encode($task->title) ?></h1>

            <div class="t3-meta-list">
                <span class="t3-meta-label">Проект</span>
                <span class="t3-meta-value">
                    <?php if ($task->project !== null): ?>
                        <?= Html::a(Html::encode($task->project->title), ['project/view', 'id' => $task->project->id]) ?>
                    <?php else: ?>
                        <span style="color:var(--text-faint)">—</span>
                    <?php endif; ?>
                </span>

                <span class="t3-meta-label">Статус</span>
                <span class="t3-meta-value"><?= $task->status !== null ? Html::encode($task->status->name) : '<span style="color:var(--text-faint)">—</span>' ?></span>

                <span class="t3-meta-label">Приоритет</span>
                <span class="t3-meta-value"><?= Html::encode($priorityLabel) ?></span>

                <span class="t3-meta-label">Дедлайн</span>
                <span class="t3-meta-value">
                    <?= $task->deadline
                        ? Yii::$app->formatter->asDate($task->deadline, 'php:d.m.Y')
                        : '<span style="color:var(--text-faint)">—</span>' ?>
                </span>

                <?php if (trim((string) $task->description) !== ''): ?>
                    <span class="t3-meta-label" style="padding-top:2px;">Описание</span>
                    <span class="t3-meta-value" style="line-height:1.6;"><?= nl2br(Html::encode($task->description)) ?></span>
                <?php endif; ?>
            </div>

            <?php if (!empty($task->tags)): ?>
                <div class="t3-tags">
                    <?php foreach ($task->tags as $tag): ?>
                        <span class="t3-tag-pill" style="background:<?= Html::encode($tag->color ?: '#d4edda') ?>;"><?= Html::encode($tag->name) ?></span>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($task->executors)): ?>
                <div style="margin-top:16px;">
                    <div style="font-size:12px;font-weight:600;color:var(--text-faint);text-transform:uppercase;letter-spacing:.4px;margin-bottom:6px;">Исполнители</div>
                    <?php foreach ($task->executors as $ex): ?>
                        <div style="font-size:13.5px;color:var(--text-primary);margin-bottom:3px;">
                            <?= Html::encode($ex->name) ?>
                            <?php if ($ex->email): ?>
                                <span style="color:var(--text-muted);margin-left:5px;"><?= Html::encode($ex->email) ?></span>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?= Html::a('← К задачам', Url::to(['task/index']), ['class' => 't3-btn-link']) ?>
</div>

<?php

/** @var yii\web\View $this */
/** @var app\models\Project[] $projects */

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\ButtonAsset;
use app\widgets\ProjectCard;

ButtonAsset::register($this);

$this->title = 'Проекты';
?>
<div class="crud-index">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
        <h1 class="h5 mb-0 button"><?= Html::encode($this->title) ?></h1>
        <?= Html::a('Создать проект', Url::to(['project/create']), ['class' => 'btn btn-primary btn-sm']) ?>
    </div>

    <?php if ($projects === []): ?>
        <div class="alert alert-light border py-2 px-3 small mb-0">
            Проектов пока нет. <?= Html::a('Создать первый', ['project/create'], ['class' => 'alert-link']) ?>.
        </div>
    <?php else: ?>
        <div class="list-group list-group-flush border rounded shadow-sm">
            <?php foreach ($projects as $project): ?>
                <div class="list-group-item py-2 px-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
                    <span class="small fw-medium text-truncate" style="max-width: 100%;"><?= Html::encode($project->title) ?></span>
                    <div class="btn-group btn-group-sm flex-shrink-0" role="group">
                        <?= Html::a('Открыть', Url::to(['project/view', 'id' => $project->id]), ['class' => 'btn btn-outline-primary']) ?>
                        <?= Html::a('Изменить', Url::to(['project/update', 'id' => $project->id]), ['class' => 'btn btn-outline-secondary']) ?>
                        <?= Html::a('Удалить', Url::to(['project/delete', 'id' => $project->id]), ['class' => 'btn btn-outline-danger']) ?>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php foreach ($projects as $project): ?>
                <?= ProjectCard::widget(['project' => $project,]); ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
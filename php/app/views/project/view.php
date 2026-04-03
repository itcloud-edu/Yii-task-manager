<?php

/** @var yii\web\View $this */
/** @var app\models\Project $project */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Проект #' . $project->id;
?>
<div class="crud-view">
    <nav aria-label="breadcrumb" class="mb-2">
        <ol class="breadcrumb breadcrumb-sm mb-0 small">
            <li class="breadcrumb-item"><?= Html::a('Проекты', ['project/index']) ?></li>
            <li class="breadcrumb-item active" aria-current="page"><?= Html::encode($project->title) ?></li>
        </ol>
    </nav>

    <div class="d-flex flex-wrap justify-content-between align-items-start gap-2 mb-3">
        <h1 class="h5 mb-0"><?= Html::encode($project->title) ?></h1>
        <div class="btn-group btn-group-sm flex-shrink-0">
            <?= Html::a('Изменить', Url::to(['project/update', 'id' => $project->id]), ['class' => 'btn btn-outline-primary']) ?>
            <?= Html::a('Удалить', Url::to(['project/delete', 'id' => $project->id]), ['class' => 'btn btn-outline-danger']) ?>
        </div>
    </div>

    <div class="card border shadow-sm mb-3">
        <div class="card-body py-2 px-3 small">
            <?php if (trim((string) $project->description) !== ''): ?>
                <?= nl2br(Html::encode($project->description)) ?>
            <?php else: ?>
                <span class="text-muted">Описание не задано</span>
            <?php endif; ?>
        </div>
    </div>

    <p class="mb-0">
        <?= Html::a('К списку проектов', Url::to(['project/index']), ['class' => 'btn btn-link btn-sm ps-0']) ?>
    </p>
</div>

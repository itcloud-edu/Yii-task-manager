<?php

/** @var yii\web\View $this */
/** @var app\models\Project[] $projects */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Проекты';
?>
<div class="project-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p class="text-muted">Заготовка: список проектов.</p>
    <p><?= Html::a('Создать проект', Url::to(['project/create']), ['class' => 'btn btn-primary']) ?></p>

    <?php foreach ($projects as $project): ?>
        <p class="d-flex align-items-center flex-wrap gap-2">
            <?= Html::encode($project->title) ?>
            <?= Html::a('Перейти в проект', Url::to(['project/view', 'id' => $project->id]), ['class' => 'btn btn-sm btn-outline-primary']) ?>
        </p>
    <?php endforeach; ?>
</div>
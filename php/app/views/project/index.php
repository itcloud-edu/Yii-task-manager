<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Проекты';
?>
<div class="project-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p class="text-muted">Заготовка: список проектов.</p>
    <p><?= Html::a('Создать проект', Url::to(['project/create']), ['class' => 'btn btn-primary']) ?></p>

    <?php foreach ($projects as $project): ?>

        <p><?= $project->title ?></p>

    <?php endforeach; ?>
</div>
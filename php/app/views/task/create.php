<?php

/** @var yii\web\View $this */
/** @var app\models\Task $model */
/** @var array $projects */
/** @var array $statuses */
/** @var array $tags */
/** @var array $executors */

use yii\helpers\Html;

$this->title = 'Создать задачу';
?>
<div class="task-create">
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><?= Html::a('Задачи', ['task/index']) ?></li>
            <li class="breadcrumb-item active" aria-current="page">Создание</li>
        </ol>
    </nav>

    <h1 class="mb-4"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'formAction' => ['task/create'],
        'projects' => $projects,
        'statuses' => $statuses,
        'tags' => $tags,
        'executors' => $executors,
    ]) ?>
</div>

<?php

/** @var yii\web\View $this */
/** @var app\models\Task $model */
/** @var array $projects */
/** @var array $statuses */
/** @var array $tags */
/** @var array $executors */

use yii\helpers\Html;

$this->title = 'Редактирование: ' . $model->title;
?>
<div class="task-update">
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><?= Html::a('Задачи', ['task/index']) ?></li>
            <li class="breadcrumb-item"><?= Html::a(Html::encode($model->title), ['task/view', 'id' => $model->id]) ?></li>
            <li class="breadcrumb-item active" aria-current="page">Редактирование</li>
        </ol>
    </nav>

    <h1 class="mb-4">Редактирование задачи</h1>

    <?= $this->render('_form', [
        'model' => $model,
        'formAction' => ['task/update', 'id' => $model->id],
        'projects' => $projects,
        'statuses' => $statuses,
        'tags' => $tags,
        'executors' => $executors,
    ]) ?>
</div>

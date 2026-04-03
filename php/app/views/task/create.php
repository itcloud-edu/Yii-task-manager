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
<div class="crud-form-page">
    <nav aria-label="breadcrumb" class="mb-2">
        <ol class="breadcrumb breadcrumb-sm mb-0 small">
            <li class="breadcrumb-item"><?= Html::a('Задачи', ['task/index']) ?></li>
            <li class="breadcrumb-item active" aria-current="page">Создание</li>
        </ol>
    </nav>

    <h1 class="h5 mb-3"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'formAction' => ['task/create'],
        'projects' => $projects,
        'statuses' => $statuses,
        'tags' => $tags,
        'executors' => $executors,
    ]) ?>
</div>

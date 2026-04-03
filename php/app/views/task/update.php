<?php

/** @var yii\web\View $this */
/** @var app\models\Task $model */
/** @var array $projects */
/** @var array $statuses */
/** @var array $tags */
/** @var array $executors */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Редактирование: ' . $model->title;
?>
<div class="crud-form-page">
    <nav aria-label="breadcrumb" class="mb-2">
        <ol class="breadcrumb breadcrumb-sm mb-0 small">
            <li class="breadcrumb-item"><?= Html::a('Задачи', ['task/index']) ?></li>
            <li class="breadcrumb-item"><?= Html::a(Html::encode($model->title), ['task/view', 'id' => $model->id]) ?></li>
            <li class="breadcrumb-item active" aria-current="page">Редактирование</li>
        </ol>
    </nav>

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
        <h1 class="h5 mb-0">Редактирование задачи</h1>
        <?= Html::a('Удалить', Url::to(['task/delete', 'id' => $model->id]), ['class' => 'btn btn-outline-danger btn-sm']) ?>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'formAction' => ['task/update', 'id' => $model->id],
        'projects' => $projects,
        'statuses' => $statuses,
        'tags' => $tags,
        'executors' => $executors,
    ]) ?>
</div>

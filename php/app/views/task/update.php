<?php

/** @var yii\web\View $this */
/** @var app\models\Task $model */
/** @var array $projects */
/** @var array $statuses */
/** @var array $tags */
/** @var array $executors */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Редактирование задачи';
?>
<div>
    <div class="t3-breadcrumb">
        <?= Html::a('Задачи', ['task/index']) ?>
        <span class="t3-breadcrumb-sep">›</span>
        <?= Html::a(Html::encode($model->title), ['task/view', 'id' => $model->id]) ?>
        <span class="t3-breadcrumb-sep">›</span>
        <span>Редактирование</span>
    </div>

    <div class="t3-page-header">
        <h1 class="t3-page-title">Редактирование задачи</h1>
        <?= Html::a('Удалить', Url::to(['task/delete', 'id' => $model->id]), ['class' => 't3-btn t3-btn-ghost', 'style' => 'color:var(--red)']) ?>
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

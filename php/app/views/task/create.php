<?php

/** @var yii\web\View $this */
/** @var app\models\Task $model */
/** @var array $projects */
/** @var array $statuses */
/** @var array $tags */
/** @var array $executors */

use yii\helpers\Html;

$this->title = 'Новая задача';
?>
<div>
    <div class="t3-breadcrumb">
        <?= Html::a('Задачи', ['task/index']) ?>
        <span class="t3-breadcrumb-sep">›</span>
        <span>Новая задача</span>
    </div>
    <h1 class="t3-page-title" style="margin-bottom:22px;"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'formAction' => ['task/create'],
        'projects' => $projects,
        'statuses' => $statuses,
        'tags' => $tags,
        'executors' => $executors,
    ]) ?>
</div>

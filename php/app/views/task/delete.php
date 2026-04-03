<?php

/** @var yii\web\View $this */
/** @var app\models\Task $model */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Удаление задачи';
?>
<div class="task-delete">
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><?= Html::a('Задачи', ['task/index']) ?></li>
            <li class="breadcrumb-item"><?= Html::a(Html::encode($model->title), ['task/view', 'id' => $model->id]) ?></li>
            <li class="breadcrumb-item active" aria-current="page">Удаление</li>
        </ol>
    </nav>

    <h1 class="h3 mb-3"><?= Html::encode($this->title) ?></h1>
    <p class="mb-4">
        Удалить задачу <strong><?= Html::encode($model->title) ?></strong>? Это действие нельзя отменить.
    </p>

    <?= Html::beginForm(['task/delete', 'id' => $model->id], 'post', ['class' => 'd-inline']) ?>
        <?= Html::submitButton('Удалить', ['class' => 'btn btn-danger']) ?>
    <?= Html::endForm() ?>

    <?= Html::a('Отмена', Url::to(['task/view', 'id' => $model->id]), ['class' => 'btn btn-secondary ms-2']) ?>
</div>

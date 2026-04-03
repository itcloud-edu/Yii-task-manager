<?php

/** @var yii\web\View $this */
/** @var app\models\Project $model */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Удаление проекта';
?>
<div class="crud-delete">
    <nav aria-label="breadcrumb" class="mb-2">
        <ol class="breadcrumb breadcrumb-sm mb-0 small">
            <li class="breadcrumb-item"><?= Html::a('Проекты', ['project/index']) ?></li>
            <li class="breadcrumb-item"><?= Html::a(Html::encode($model->title), ['project/view', 'id' => $model->id]) ?></li>
            <li class="breadcrumb-item active" aria-current="page">Удаление</li>
        </ol>
    </nav>

    <h1 class="h5 mb-2"><?= Html::encode($this->title) ?></h1>
    <p class="small mb-3">
        Удалить проект <strong><?= Html::encode($model->title) ?></strong>? Связанные задачи будут удалены. Это действие нельзя отменить.
    </p>

    <?= Html::beginForm(['project/delete', 'id' => $model->id], 'post', ['class' => 'd-inline']) ?>
        <?= Html::submitButton('Удалить', ['class' => 'btn btn-danger btn-sm']) ?>
    <?= Html::endForm() ?>

    <?= Html::a('Отмена', Url::to(['project/view', 'id' => $model->id]), ['class' => 'btn btn-secondary btn-sm ms-2']) ?>
</div>

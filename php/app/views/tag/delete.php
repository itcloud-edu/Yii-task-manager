<?php

/** @var yii\web\View $this */
/** @var app\models\Tag $model */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Удаление тега';
?>
<div class="tag-delete">
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><?= Html::a('Теги', ['tag/index']) ?></li>
            <li class="breadcrumb-item"><?= Html::a(Html::encode($model->name), ['tag/update', 'id' => $model->id]) ?></li>
            <li class="breadcrumb-item active" aria-current="page">Удаление</li>
        </ol>
    </nav>

    <h1 class="h3 mb-3"><?= Html::encode($this->title) ?></h1>
    <p class="mb-4">
        Удалить тег <strong><?= Html::encode($model->name) ?></strong>? Связи с задачами будут сняты. Это действие нельзя отменить.
    </p>

    <?= Html::beginForm(['tag/delete', 'id' => $model->id], 'post', ['class' => 'd-inline']) ?>
        <?= Html::submitButton('Удалить', ['class' => 'btn btn-danger']) ?>
    <?= Html::endForm() ?>

    <?= Html::a('Отмена', Url::to(['tag/update', 'id' => $model->id]), ['class' => 'btn btn-secondary ms-2']) ?>
</div>

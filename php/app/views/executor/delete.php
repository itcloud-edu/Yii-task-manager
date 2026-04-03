<?php

/** @var yii\web\View $this */
/** @var app\models\Executor $model */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Удаление исполнителя';
?>
<div class="executor-delete">
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><?= Html::a('Исполнители', ['executor/index']) ?></li>
            <li class="breadcrumb-item"><?= Html::a(Html::encode($model->name), ['executor/update', 'id' => $model->id]) ?></li>
            <li class="breadcrumb-item active" aria-current="page">Удаление</li>
        </ol>
    </nav>

    <h1 class="h3 mb-3"><?= Html::encode($this->title) ?></h1>
    <p class="mb-4">
        Удалить исполнителя <strong><?= Html::encode($model->name) ?></strong>
        <?php if ($model->email): ?>
            (<span class="text-muted"><?= Html::encode($model->email) ?></span>)
        <?php endif; ?>?
        Назначения на задачах будут сняты. Это действие нельзя отменить.
    </p>

    <?= Html::beginForm(['executor/delete', 'id' => $model->id], 'post', ['class' => 'd-inline']) ?>
        <?= Html::submitButton('Удалить', ['class' => 'btn btn-danger']) ?>
    <?= Html::endForm() ?>

    <?= Html::a('Отмена', Url::to(['executor/update', 'id' => $model->id]), ['class' => 'btn btn-secondary ms-2']) ?>
</div>

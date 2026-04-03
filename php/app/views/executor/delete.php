<?php

/** @var yii\web\View $this */
/** @var app\models\Executor $model */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Удаление исполнителя';
?>
<div class="crud-delete">
    <nav aria-label="breadcrumb" class="mb-2">
        <ol class="breadcrumb breadcrumb-sm mb-0 small">
            <li class="breadcrumb-item"><?= Html::a('Исполнители', ['executor/index']) ?></li>
            <li class="breadcrumb-item"><?= Html::a(Html::encode($model->name), ['executor/update', 'id' => $model->id]) ?></li>
            <li class="breadcrumb-item active" aria-current="page">Удаление</li>
        </ol>
    </nav>

    <h1 class="h5 mb-2"><?= Html::encode($this->title) ?></h1>
    <p class="small mb-3">
        Удалить исполнителя <strong><?= Html::encode($model->name) ?></strong>
        <?php if ($model->email): ?>
            (<span class="text-muted"><?= Html::encode($model->email) ?></span>)
        <?php endif; ?>?
        Назначения на задачах будут сняты. Это действие нельзя отменить.
    </p>

    <?= Html::beginForm(['executor/delete', 'id' => $model->id], 'post', ['class' => 'd-inline']) ?>
        <?= Html::submitButton('Удалить', ['class' => 'btn btn-danger btn-sm']) ?>
    <?= Html::endForm() ?>

    <?= Html::a('Отмена', Url::to(['executor/update', 'id' => $model->id]), ['class' => 'btn btn-secondary btn-sm ms-2']) ?>
</div>

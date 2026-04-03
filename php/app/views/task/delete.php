<?php

/** @var yii\web\View $this */
/** @var app\models\Task $model */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Удаление задачи';
?>
<div>
    <div class="t3-breadcrumb">
        <?= Html::a('Задачи', ['task/index']) ?>
        <span class="t3-breadcrumb-sep">›</span>
        <?= Html::a(Html::encode($model->title), ['task/view', 'id' => $model->id]) ?>
        <span class="t3-breadcrumb-sep">›</span>
        <span>Удаление</span>
    </div>

    <div class="t3-confirm">
        <h1 class="t3-confirm-title">Удалить задачу?</h1>
        <p class="t3-confirm-text">
            Задача <strong><?= Html::encode($model->title) ?></strong> будет удалена без возможности восстановления.
        </p>
        <div class="t3-confirm-actions">
            <?= Html::beginForm(['task/delete', 'id' => $model->id], 'post') ?>
                <?= Html::submitButton('Удалить', ['class' => 't3-btn t3-btn-danger']) ?>
            <?= Html::endForm() ?>
            <?= Html::a('Отмена', Url::to(['task/view', 'id' => $model->id]), ['class' => 't3-btn t3-btn-secondary']) ?>
        </div>
    </div>
</div>

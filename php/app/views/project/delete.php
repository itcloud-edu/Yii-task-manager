<?php

/** @var yii\web\View $this */
/** @var app\models\Project $model */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Удаление проекта';
?>
<div>
    <div class="t3-breadcrumb">
        <?= Html::a('Проекты', ['project/index']) ?>
        <span class="t3-breadcrumb-sep">›</span>
        <?= Html::a(Html::encode($model->title), ['project/view', 'id' => $model->id]) ?>
        <span class="t3-breadcrumb-sep">›</span>
        <span>Удаление</span>
    </div>

    <div class="t3-confirm">
        <h1 class="t3-confirm-title">Удалить проект?</h1>
        <p class="t3-confirm-text">
            Проект <strong><?= Html::encode($model->title) ?></strong> и все связанные задачи будут удалены без возможности восстановления.
        </p>
        <div class="t3-confirm-actions">
            <?= Html::beginForm(['project/delete', 'id' => $model->id], 'post') ?>
                <?= Html::submitButton('Удалить', ['class' => 't3-btn t3-btn-danger']) ?>
            <?= Html::endForm() ?>
            <?= Html::a('Отмена', Url::to(['project/view', 'id' => $model->id]), ['class' => 't3-btn t3-btn-secondary']) ?>
        </div>
    </div>
</div>

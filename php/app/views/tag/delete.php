<?php

/** @var yii\web\View $this */
/** @var app\models\Tag $model */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Удаление тега';
?>
<div>
    <div class="t3-breadcrumb">
        <?= Html::a('Теги', ['tag/index']) ?>
        <span class="t3-breadcrumb-sep">›</span>
        <?= Html::a(Html::encode($model->name), ['tag/update', 'id' => $model->id]) ?>
        <span class="t3-breadcrumb-sep">›</span>
        <span>Удаление</span>
    </div>

    <div class="t3-confirm">
        <h1 class="t3-confirm-title">Удалить тег?</h1>
        <p class="t3-confirm-text">
            Тег <strong><?= Html::encode($model->name) ?></strong> будет удалён. Связи с задачами будут сняты.
        </p>
        <div class="t3-confirm-actions">
            <?= Html::beginForm(['tag/delete', 'id' => $model->id], 'post') ?>
                <?= Html::submitButton('Удалить', ['class' => 't3-btn t3-btn-danger']) ?>
            <?= Html::endForm() ?>
            <?= Html::a('Отмена', Url::to(['tag/update', 'id' => $model->id]), ['class' => 't3-btn t3-btn-secondary']) ?>
        </div>
    </div>
</div>

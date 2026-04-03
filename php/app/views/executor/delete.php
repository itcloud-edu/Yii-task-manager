<?php

/** @var yii\web\View $this */
/** @var app\models\Executor $model */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Удаление исполнителя';
?>
<div>
    <div class="t3-breadcrumb">
        <?= Html::a('Исполнители', ['executor/index']) ?>
        <span class="t3-breadcrumb-sep">›</span>
        <?= Html::a(Html::encode($model->name), ['executor/update', 'id' => $model->id]) ?>
        <span class="t3-breadcrumb-sep">›</span>
        <span>Удаление</span>
    </div>

    <div class="t3-confirm">
        <h1 class="t3-confirm-title">Удалить исполнителя?</h1>
        <p class="t3-confirm-text">
            Исполнитель <strong><?= Html::encode($model->name) ?></strong>
            <?php if ($model->email): ?>
                (<?= Html::encode($model->email) ?>)
            <?php endif; ?>
            будет удалён. Назначения на задачах будут сняты.
        </p>
        <div class="t3-confirm-actions">
            <?= Html::beginForm(['executor/delete', 'id' => $model->id], 'post') ?>
                <?= Html::submitButton('Удалить', ['class' => 't3-btn t3-btn-danger']) ?>
            <?= Html::endForm() ?>
            <?= Html::a('Отмена', Url::to(['executor/update', 'id' => $model->id]), ['class' => 't3-btn t3-btn-secondary']) ?>
        </div>
    </div>
</div>

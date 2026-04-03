<?php

/** @var yii\web\View $this */
/** @var app\models\Tag $model */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Редактирование тега';
?>
<div>
    <div class="t3-breadcrumb">
        <?= Html::a('Теги', ['tag/index']) ?>
        <span class="t3-breadcrumb-sep">›</span>
        <span><?= Html::encode($model->name) ?></span>
    </div>

    <div class="t3-page-header">
        <h1 class="t3-page-title">Редактирование тега</h1>
        <?= Html::a('Удалить', Url::to(['tag/delete', 'id' => $model->id]), ['class' => 't3-btn t3-btn-ghost', 'style' => 'color:var(--red)']) ?>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'formAction' => ['tag/update', 'id' => $model->id],
    ]) ?>
</div>

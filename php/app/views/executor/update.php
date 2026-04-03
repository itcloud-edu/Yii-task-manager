<?php

/** @var yii\web\View $this */
/** @var app\models\Executor $model */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Редактирование исполнителя';
?>
<div>
    <div class="t3-breadcrumb">
        <?= Html::a('Исполнители', ['executor/index']) ?>
        <span class="t3-breadcrumb-sep">›</span>
        <span><?= Html::encode($model->name) ?></span>
    </div>

    <div class="t3-page-header">
        <h1 class="t3-page-title">Редактирование исполнителя</h1>
        <?= Html::a('Удалить', Url::to(['executor/delete', 'id' => $model->id]), ['class' => 't3-btn t3-btn-ghost', 'style' => 'color:var(--red)']) ?>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'formAction' => ['executor/update', 'id' => $model->id],
    ]) ?>
</div>

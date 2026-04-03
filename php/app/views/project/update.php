<?php

/** @var yii\web\View $this */
/** @var app\models\Project $model */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Редактирование проекта';
?>
<div>
    <div class="t3-breadcrumb">
        <?= Html::a('Проекты', ['project/index']) ?>
        <span class="t3-breadcrumb-sep">›</span>
        <?= Html::a(Html::encode($model->title), ['project/view', 'id' => $model->id]) ?>
        <span class="t3-breadcrumb-sep">›</span>
        <span>Редактирование</span>
    </div>

    <div class="t3-page-header">
        <h1 class="t3-page-title">Редактирование проекта</h1>
        <?= Html::a('Удалить', Url::to(['project/delete', 'id' => $model->id]), ['class' => 't3-btn t3-btn-ghost', 'style' => 'color:var(--red)']) ?>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'formAction' => ['project/update', 'id' => $model->id],
    ]) ?>
</div>

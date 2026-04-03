<?php

/** @var yii\web\View $this */
/** @var app\models\Project $model */

use yii\helpers\Html;

$this->title = 'Редактирование проекта #' . $model->id;
?>
<div class="crud-form-page">
    <nav aria-label="breadcrumb" class="mb-2">
        <ol class="breadcrumb breadcrumb-sm mb-0 small">
            <li class="breadcrumb-item"><?= Html::a('Проекты', ['project/index']) ?></li>
            <li class="breadcrumb-item"><?= Html::a(Html::encode($model->title), ['project/view', 'id' => $model->id]) ?></li>
            <li class="breadcrumb-item active" aria-current="page">Редактирование</li>
        </ol>
    </nav>
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
        <h1 class="h5 mb-0"><?= Html::encode($this->title) ?></h1>
        <?= Html::a('Удалить', ['project/delete', 'id' => $model->id], ['class' => 'btn btn-outline-danger btn-sm']) ?>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
        'formAction' => ['project/update', 'id' => $model->id],
    ]) ?>
</div>

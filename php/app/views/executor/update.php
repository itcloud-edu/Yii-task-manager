<?php

/** @var yii\web\View $this */
/** @var app\models\Executor $model */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Редактирование исполнителя #' . $model->id;
?>
<div class="crud-form-page">
    <nav aria-label="breadcrumb" class="mb-2">
        <ol class="breadcrumb breadcrumb-sm mb-0 small">
            <li class="breadcrumb-item"><?= Html::a('Исполнители', ['executor/index']) ?></li>
            <li class="breadcrumb-item active" aria-current="page"><?= Html::encode($model->name) ?></li>
        </ol>
    </nav>
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
        <h1 class="h5 mb-0"><?= Html::encode($this->title) ?></h1>
        <?= Html::a('Удалить', Url::to(['executor/delete', 'id' => $model->id]), ['class' => 'btn btn-outline-danger btn-sm']) ?>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
        'formAction' => ['executor/update', 'id' => $model->id],
    ]) ?>
</div>

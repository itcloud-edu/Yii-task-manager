<?php

/** @var yii\web\View $this */
/** @var app\models\Tag $model */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Редактирование тега #' . $model->id;
?>
<div class="tag-update">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
        <h1 class="mb-0"><?= Html::encode($this->title) ?></h1>
        <?= Html::a('Удалить тег', Url::to(['tag/delete', 'id' => $model->id]), ['class' => 'btn btn-sm btn-outline-danger']) ?>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
        'formAction' => ['tag/update', 'id' => $model->id],
    ]) ?>
</div>

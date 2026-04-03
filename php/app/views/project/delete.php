<?php

/** @var yii\web\View $this */
/** @var app\models\Project $model */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Удаление проекта';
?>
<div class="project-delete">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Удалить проект <strong><?= Html::encode($model->title) ?></strong>? Это действие нельзя отменить.</p>
 
    <?= Html::beginForm(['project/delete', 'id' => $model->id], 'post', [
        'class' => 'd-inline',
    ]) ?>
        <?= Html::submitButton('Удалить', ['class' => 'btn btn-danger']) ?>
    <?= Html::endForm() ?>

    <?= Html::a('Отмена', Url::to(['project/view', 'id' => $model->id]), ['class' => 'btn btn-secondary ms-2']) ?>
</div>

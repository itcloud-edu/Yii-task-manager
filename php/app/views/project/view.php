<?php

/** @var yii\web\View $this */
/** @var int $id */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Проект #' . $project->id;
?>
<div class="project-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p class="text-muted">Заготовка: карточка проекта.</p>
    <p><?= $project->title ?></p>
    <p>
        <?= Html::a('Изменить', Url::to(['project/update', 'id' => $project->id]), ['class' => 'btn btn-outline-primary']) ?>
        <?= Html::a('Удалить', Url::to(['project/delete', 'id' => $project->id]), ['class' => 'btn btn-outline-danger']) ?>
        <?= Html::a('К списку', Url::to(['project/index']), ['class' => 'btn btn-link']) ?>
    </p>
</div>
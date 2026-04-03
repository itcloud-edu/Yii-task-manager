<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Новая задача';
?>
<div class="task-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <p class="text-muted">Заготовка: форма создания задачи.</p>
    <p><?= Html::a('К списку задач', Url::to(['task/index']), ['class' => 'btn btn-link']) ?></p>
</div>

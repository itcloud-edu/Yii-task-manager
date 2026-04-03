<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Задачи';
?>
<div class="task-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p class="text-muted">Заготовка: список задач.</p>
    <p><?= Html::a('Создать задачу', Url::to(['task/create']), ['class' => 'btn btn-primary']) ?></p>
</div>

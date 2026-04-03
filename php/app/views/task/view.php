<?php

/** @var yii\web\View $this */
/** @var int $id */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Задача #' . $id;
?>
<div class="task-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p class="text-muted">Заготовка: просмотр задачи.</p>
    <p>
        <?= Html::a('Изменить', Url::to(['task/update', 'id' => $id]), ['class' => 'btn btn-outline-primary']) ?>
        <?= Html::a('Удалить', Url::to(['task/delete', 'id' => $id]), ['class' => 'btn btn-outline-danger']) ?>
    </p>
</div>

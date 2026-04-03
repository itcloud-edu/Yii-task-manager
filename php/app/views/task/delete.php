<?php

/** @var yii\web\View $this */
/** @var int $id */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Удаление задачи #' . $id;
?>
<div class="task-delete">
    <h1><?= Html::encode($this->title) ?></h1>
    <p class="text-muted">Заготовка: подтверждение удаления задачи.</p>
    <p><?= Html::a('Отмена', Url::to(['task/view', 'id' => $id]), ['class' => 'btn btn-secondary']) ?></p>
</div>

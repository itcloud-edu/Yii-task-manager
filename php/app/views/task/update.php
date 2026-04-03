<?php

/** @var yii\web\View $this */
/** @var int $id */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Редактирование задачи #' . $id;
?>
<div class="task-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <p class="text-muted">Заготовка: форма редактирования задачи.</p>
    <p><?= Html::a('К просмотру', Url::to(['task/view', 'id' => $id]), ['class' => 'btn btn-link']) ?></p>
</div>

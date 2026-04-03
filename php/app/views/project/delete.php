<?php

/** @var yii\web\View $this */
/** @var int $id */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Удаление проекта #' . $id;
?>
<div class="project-delete">
    <h1><?= Html::encode($this->title) ?></h1>
    <p class="text-muted">Заготовка: подтверждение удаления проекта.</p>
    <p><?= Html::a('Отмена', Url::to(['project/view', 'id' => $id]), ['class' => 'btn btn-secondary']) ?></p>
</div>

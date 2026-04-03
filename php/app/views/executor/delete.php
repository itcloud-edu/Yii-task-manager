<?php

/** @var yii\web\View $this */
/** @var int $id */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Удаление исполнителя #' . $id;
?>
<div class="executor-delete">
    <h1><?= Html::encode($this->title) ?></h1>
    <p class="text-muted">Заготовка: подтверждение удаления исполнителя.</p>
    <p><?= Html::a('Отмена', Url::to(['executor/update', 'id' => $id]), ['class' => 'btn btn-secondary']) ?></p>
</div>

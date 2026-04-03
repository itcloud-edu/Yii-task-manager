<?php

/** @var yii\web\View $this */
/** @var int $id */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Удаление тега #' . $id;
?>
<div class="tag-delete">
    <h1><?= Html::encode($this->title) ?></h1>
    <p class="text-muted">Заготовка: подтверждение удаления тега.</p>
    <p><?= Html::a('Отмена', Url::to(['tag/update', 'id' => $id]), ['class' => 'btn btn-secondary']) ?></p>
</div>

<?php

/** @var yii\web\View $this */
/** @var app\models\Executor[] $executors */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Исполнители';
?>
<div class="executor-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p><?= Html::a('Добавить исполнителя', Url::to(['executor/create']), ['class' => 'btn btn-primary']) ?></p>

    <?php foreach ($executors as $executor): ?>
        <p>
            <?= Html::encode($executor->name) ?>
            <span class="text-muted"><?= Html::encode($executor->email) ?></span>
            <?= Html::a('Изменить', Url::to(['executor/update', 'id' => $executor->id]), ['class' => 'btn btn-sm btn-outline-primary']) ?>
            <?= Html::a('Удалить', Url::to(['executor/delete', 'id' => $executor->id]), ['class' => 'btn btn-sm btn-outline-danger']) ?>
        </p>
    <?php endforeach; ?>
</div>

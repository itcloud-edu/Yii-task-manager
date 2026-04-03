<?php

/** @var yii\web\View $this */
/** @var app\models\Executor[] $executors */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Исполнители';
?>
<div class="crud-index">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
        <h1 class="h5 mb-0"><?= Html::encode($this->title) ?></h1>
        <?= Html::a('Добавить исполнителя', Url::to(['executor/create']), ['class' => 'btn btn-primary btn-sm']) ?>
    </div>

    <?php if ($executors === []): ?>
        <div class="alert alert-light border py-2 px-3 small mb-0">
            Исполнителей пока нет. <?= Html::a('Добавить', ['executor/create'], ['class' => 'alert-link']) ?>.
        </div>
    <?php else: ?>
        <div class="list-group list-group-flush border rounded shadow-sm">
            <?php foreach ($executors as $executor): ?>
                <div class="list-group-item py-2 px-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
                    <div class="small min-w-0">
                        <span class="fw-medium"><?= Html::encode($executor->name) ?></span>
                        <span class="text-muted ms-1"><?= Html::encode($executor->email) ?></span>
                    </div>
                    <div class="btn-group btn-group-sm flex-shrink-0" role="group">
                        <?= Html::a('Изменить', Url::to(['executor/update', 'id' => $executor->id]), ['class' => 'btn btn-outline-primary']) ?>
                        <?= Html::a('Удалить', Url::to(['executor/delete', 'id' => $executor->id]), ['class' => 'btn btn-outline-danger']) ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

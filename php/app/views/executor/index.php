<?php

/** @var yii\web\View $this */
/** @var app\models\Executor[] $executors */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Исполнители';
?>
<div>
    <div class="t3-page-header">
        <h1 class="t3-page-title"><?= Html::encode($this->title) ?></h1>
        <?= Html::a('+ Добавить', Url::to(['executor/create']), ['class' => 't3-btn t3-btn-primary']) ?>
    </div>

    <?php if ($executors === []): ?>
        <div class="t3-empty">
            Исполнителей пока нет.<br>
            <?= Html::a('Добавить исполнителя', ['executor/create']) ?>
        </div>
    <?php else: ?>
        <div class="t3-list">
            <?php foreach ($executors as $executor): ?>
                <div class="t3-row">
                    <div class="t3-circle" style="border-color:var(--accent);opacity:.4;"></div>
                    <div class="t3-row-body">
                        <div class="t3-row-title"><?= Html::encode($executor->name) ?></div>
                        <?php if ($executor->email): ?>
                            <div class="t3-row-meta"><?= Html::encode($executor->email) ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="t3-row-actions" style="opacity:1;">
                        <?= Html::a('Изменить', ['executor/update', 'id' => $executor->id]) ?>
                        <?= Html::a('Удалить', ['executor/delete', 'id' => $executor->id], ['class' => 'danger']) ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php

/** @var yii\web\View $this */
/** @var app\models\Tag[] $tags */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Теги';
?>
<div>
    <div class="t3-page-header">
        <h1 class="t3-page-title"><?= Html::encode($this->title) ?></h1>
        <?= Html::a('+ Новый тег', Url::to(['tag/create']), ['class' => 't3-btn t3-btn-primary']) ?>
    </div>

    <?php if ($tags === []): ?>
        <div class="t3-empty">
            Тегов пока нет.<br>
            <?= Html::a('Создать первый тег', ['tag/create']) ?>
        </div>
    <?php else: ?>
        <div class="t3-list">
            <?php foreach ($tags as $tag): ?>
                <div class="t3-row">
                    <div class="t3-color-dot" style="background:<?= Html::encode($tag->color ?: '#abadb5') ?>;"></div>
                    <div class="t3-row-body">
                        <div class="t3-row-title"><?= Html::encode($tag->name) ?></div>
                        <?php if ($tag->color): ?>
                            <div class="t3-row-meta"><?= Html::encode($tag->color) ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="t3-row-actions" style="opacity:1;">
                        <?= Html::a('Изменить', ['tag/update', 'id' => $tag->id]) ?>
                        <?= Html::a('Удалить', ['tag/delete', 'id' => $tag->id], ['class' => 'danger']) ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php

/** @var yii\web\View $this */
/** @var app\models\Tag[] $tags */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Теги';
?>
<div class="crud-index">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
        <h1 class="h5 mb-0"><?= Html::encode($this->title) ?></h1>
        <?= Html::a('Создать тег', Url::to(['tag/create']), ['class' => 'btn btn-primary btn-sm']) ?>
    </div>

    <?php if ($tags === []): ?>
        <div class="alert alert-light border py-2 px-3 small mb-0">
            Тегов пока нет. <?= Html::a('Создать первый', ['tag/create'], ['class' => 'alert-link']) ?>.
        </div>
    <?php else: ?>
        <div class="list-group list-group-flush border rounded shadow-sm">
            <?php foreach ($tags as $tag): ?>
                <div class="list-group-item py-2 px-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
                    <div class="d-flex align-items-center gap-2 min-w-0">
                        <span
                            class="rounded border flex-shrink-0"
                            style="width:0.75rem;height:0.75rem;background:<?= Html::encode($tag->color) ?>;"
                            title="<?= Html::encode($tag->color) ?>"
                        ></span>
                        <span class="small text-truncate"><?= Html::encode($tag->name) ?></span>
                    </div>
                    <div class="btn-group btn-group-sm flex-shrink-0" role="group">
                        <?= Html::a('Изменить', Url::to(['tag/update', 'id' => $tag->id]), ['class' => 'btn btn-outline-primary']) ?>
                        <?= Html::a('Удалить', Url::to(['tag/delete', 'id' => $tag->id]), ['class' => 'btn btn-outline-danger']) ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

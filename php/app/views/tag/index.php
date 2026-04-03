<?php

/** @var yii\web\View $this */
/** @var app\models\Tag[] $tags */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Теги';
?>
<div class="tag-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p><?= Html::a('Создать тег', Url::to(['tag/create']), ['class' => 'btn btn-primary']) ?></p>

    <?php foreach ($tags as $tag): ?>
        <p>
            <span style="display:inline-block;width:1rem;height:1rem;border-radius:2px;background:<?= Html::encode($tag->color) ?>;vertical-align:middle;"></span>
            <?= Html::encode($tag->name) ?>
            <?= Html::a('Изменить', Url::to(['tag/update', 'id' => $tag->id]), ['class' => 'btn btn-sm btn-outline-primary']) ?>
            <?= Html::a('Удалить', Url::to(['tag/delete', 'id' => $tag->id]), ['class' => 'btn btn-sm btn-outline-danger']) ?>
        </p>
    <?php endforeach; ?>
</div>

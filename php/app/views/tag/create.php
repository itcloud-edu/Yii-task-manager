<?php

/** @var yii\web\View $this */
/** @var app\models\Tag $model */

use yii\helpers\Html;

$this->title = 'Новый тег';
?>
<div>
    <div class="t3-breadcrumb">
        <?= Html::a('Теги', ['tag/index']) ?>
        <span class="t3-breadcrumb-sep">›</span>
        <span>Новый тег</span>
    </div>
    <h1 class="t3-page-title" style="margin-bottom:22px;"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'formAction' => ['tag/create'],
    ]) ?>
</div>

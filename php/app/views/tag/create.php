<?php

/** @var yii\web\View $this */
/** @var app\models\Tag $model */

use yii\helpers\Html;

$this->title = 'Новый тег';
?>
<div class="tag-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
        'formAction' => ['tag/create'],
    ]) ?>
</div>

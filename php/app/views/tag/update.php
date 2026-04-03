<?php

/** @var yii\web\View $this */
/** @var app\models\Tag $model */

use yii\helpers\Html;

$this->title = 'Редактирование тега #' . $model->id;
?>
<div class="tag-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
        'formAction' => ['tag/update', 'id' => $model->id],
    ]) ?>
</div>

<?php

/** @var yii\web\View $this */
/** @var app\models\Executor $model */

use yii\helpers\Html;

$this->title = 'Редактирование исполнителя #' . $model->id;
?>
<div class="executor-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
        'formAction' => ['executor/update', 'id' => $model->id],
    ]) ?>
</div>

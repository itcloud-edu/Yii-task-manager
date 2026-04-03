<?php

/** @var yii\web\View $this */
/** @var app\models\Executor $model */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Редактирование исполнителя #' . $model->id;
?>
<div class="executor-update">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
        <h1 class="mb-0"><?= Html::encode($this->title) ?></h1>
        <?= Html::a('Удалить', Url::to(['executor/delete', 'id' => $model->id]), ['class' => 'btn btn-sm btn-outline-danger']) ?>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
        'formAction' => ['executor/update', 'id' => $model->id],
    ]) ?>
</div>

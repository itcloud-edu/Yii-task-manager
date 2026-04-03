<?php

/** @var yii\web\View $this */
/** @var int $id */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Редактирование проекта #' . $model->id;
?>
<div class="project-update">
    <h1><?= Html::encode($this->title) ?></h1>
        <?= $this->render('_form', [
        'model' => $model,
        'formAction' => ['project/update', 'id'=>$model->id]
    ]) ?>
</div>

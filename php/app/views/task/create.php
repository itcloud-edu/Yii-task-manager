<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Task;

/** @var app\models\Task $model */
/** @var array $projects */
/** @var array $statuses */
/** @var array $tags */
/** @var array $executors */

$this->title = 'Создать задачу';
?>

<nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><?= Html::a('Проекты', ['project/index']) ?></li>
        <li class="breadcrumb-item active">Создать задачу</li>
    </ol>
</nav>

<h1 class="mb-4">Создать задачу</h1>

<?php $form = ActiveForm::begin(['action' => ['/task/create']]) ?>

<div class="row">
    <div class="col-md-8">

        <?= $form->field($model, 'title')->textInput([
            'maxlength' => true,
            'placeholder' => 'Название задачи',
        ]) ?>

        <?= $form->field($model, 'description')->textarea([
            'rows' => 5,
            'placeholder' => 'Описание задачи',
        ]) ?>



        <?= $form->field($model, 'project_id')->dropDownList(
            $projects,
            ['prompt' => '-- Выберите проект --']
        ) ?>

        <?= $form->field($model, 'status_id')->dropDownList($statuses) ?>

        <?= $form->field($model, 'priority')->dropDownList(
            Task::getPriorityList()
        ) ?>

        <?= $form->field($model, 'deadline')->input('date') ?>

        <?= $form->field($model, 'tagIds')->checkboxList($tags) ?>

        <?= $form->field($model, 'executorIds')->checkboxList($executors) ?>

    </div>
    <div class="card-footer d-flex justify-content-between">
        <?= Html::a('Отмена', ['project/index'], ['class' => 'btn btn-outline-secondary']) ?>
        <?= Html::submitButton('Создать задачу', ['class' => 'btn btn-primary']) ?>
    </div>
</div>


<?php ActiveForm::end() ?>
<?php

/** @var yii\web\View $this */
/** @var app\models\Task $model */
/** @var array $formAction */
/** @var array $projects */
/** @var array $statuses */
/** @var array $tags */
/** @var array $executors */

use app\models\Task;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$formFieldConfig = require Yii::getAlias('@app/views/_formFieldConfig.php');
?>
<?php $form = ActiveForm::begin([
    'action' => $formAction,
    'fieldConfig' => $formFieldConfig,
]); ?>
<div class="card border shadow-sm">
    <div class="card-body py-2 px-3">
        <?= $form->field($model, 'title')->textInput([
            'class' => 'form-control form-control-sm',
            'maxlength' => true,
            'autofocus' => $model->isNewRecord,
            'placeholder' => 'Название задачи',
        ]) ?>

        <?= $form->field($model, 'description')->textarea([
            'class' => 'form-control form-control-sm',
            'rows' => 4,
            'placeholder' => 'Описание задачи',
        ]) ?>

        <?= $form->field($model, 'project_id')->dropDownList($projects, [
            'prompt' => '-- Выберите проект --',
            'class' => 'form-select form-select-sm',
        ]) ?>

        <?= $form->field($model, 'status_id')->dropDownList($statuses, [
            'class' => 'form-select form-select-sm',
        ]) ?>

        <?= $form->field($model, 'priority')->dropDownList(Task::getPriorityList(), [
            'class' => 'form-select form-select-sm',
        ]) ?>

        <?= $form->field($model, 'deadline')->input('date', [
            'class' => 'form-control form-control-sm',
        ]) ?>

        <?= $form->field($model, 'tag_ids', [
            'options' => ['class' => 'mb-2 small'],
        ])->checkboxList($tags, [
            'itemOptions' => ['class' => 'form-check-input'],
            'labelOptions' => ['class' => 'form-check-label'],
        ]) ?>

        <?= $form->field($model, 'executor_ids', [
            'options' => ['class' => 'mb-2 small'],
        ])->checkboxList($executors, [
            'itemOptions' => ['class' => 'form-check-input'],
            'labelOptions' => ['class' => 'form-check-label'],
        ]) ?>
    </div>
    <div class="card-footer bg-transparent py-2 px-3 border-top-0">
        <div class="d-flex flex-wrap justify-content-between gap-2">
            <?= Html::a('Назад', Url::to(['task/index']), ['class' => 'btn btn-outline-secondary btn-sm']) ?>
            <?= Html::submitButton(
                $model->isNewRecord ? 'Создать задачу' : 'Сохранить',
                ['class' => 'btn btn-primary btn-sm']
            ) ?>
        </div>
    </div>
</div>
<?php ActiveForm::end() ?>

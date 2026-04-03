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
<div class="t3-form-card">
    <div class="t3-form-body">
        <?= $form->field($model, 'title')->textInput([
            'class' => 'form-control',
            'maxlength' => true,
            'autofocus' => $model->isNewRecord,
            'placeholder' => 'Название задачи',
        ]) ?>

        <?= $form->field($model, 'description')->textarea([
            'class' => 'form-control',
            'rows' => 4,
            'placeholder' => 'Описание задачи',
        ]) ?>

        <?= $form->field($model, 'project_id')->dropDownList($projects, [
            'prompt' => '— Выберите проект —',
            'class' => 'form-select',
        ]) ?>

        <?= $form->field($model, 'status_id')->dropDownList($statuses, [
            'class' => 'form-select',
        ]) ?>

        <?= $form->field($model, 'priority')->dropDownList(Task::getPriorityList(), [
            'class' => 'form-select',
        ]) ?>

        <?= $form->field($model, 'deadline')->input('date', [
            'class' => 'form-control',
        ]) ?>

        <?= $form->field($model, 'tag_ids', [
            'options' => ['class' => 'mb-2'],
        ])->checkboxList($tags, [
            'itemOptions' => ['class' => 'form-check-input'],
            'labelOptions' => ['class' => 'form-check-label'],
        ]) ?>

        <?= $form->field($model, 'executor_ids', [
            'options' => ['class' => 'mb-2'],
        ])->checkboxList($executors, [
            'itemOptions' => ['class' => 'form-check-input'],
            'labelOptions' => ['class' => 'form-check-label'],
        ]) ?>
    </div>
    <div class="t3-form-footer">
        <?= Html::submitButton(
            $model->isNewRecord ? 'Создать задачу' : 'Сохранить',
            ['class' => 't3-btn t3-btn-primary']
        ) ?>
        <?= Html::a('Отмена', Url::to(['task/index']), ['class' => 't3-btn t3-btn-secondary']) ?>
    </div>
</div>
<?php ActiveForm::end() ?>

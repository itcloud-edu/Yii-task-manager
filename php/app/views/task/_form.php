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

?>
<?php $form = ActiveForm::begin(['action' => $formAction]); ?>
<div class="card shadow-sm border-0">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-8">
                <?= $form->field($model, 'title')->textInput([
                    'maxlength' => true,
                    'autofocus' => $model->isNewRecord,
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

                <?= $form->field($model, 'priority')->dropDownList(Task::getPriorityList()) ?>

                <?= $form->field($model, 'deadline')->input('date') ?>

                <?= $form->field($model, 'tagIds')->checkboxList($tags) ?>

                <?= $form->field($model, 'executorIds')->checkboxList($executors) ?>
            </div>
        </div>
    </div>
    <div class="card-footer bg-transparent border-top-0 d-flex justify-content-between flex-wrap gap-2 pt-0">
        <?= Html::a('Назад', Url::to(['task/index']), ['class' => 'btn btn-outline-secondary']) ?>
        <?= Html::submitButton(
            $model->isNewRecord ? 'Создать задачу' : 'Сохранить',
            ['class' => 'btn btn-primary']
        ) ?>
    </div>
</div>
<?php ActiveForm::end() ?>

<?php

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
            'autofocus' => true,
            'placeholder' => 'Название проекта',
        ]) ?>
        <?= $form->field($model, 'description')->textarea([
            'class' => 'form-control',
            'rows' => 3,
            'placeholder' => 'Описание (необязательно)',
        ]) ?>
    </div>
    <div class="t3-form-footer">
        <?= Html::submitButton($model->isNewRecord ? 'Создать проект' : 'Сохранить', ['class' => 't3-btn t3-btn-primary']) ?>
        <?= Html::a('Отмена', Url::to(['project/index']), ['class' => 't3-btn t3-btn-secondary']) ?>
    </div>
</div>
<?php ActiveForm::end() ?>

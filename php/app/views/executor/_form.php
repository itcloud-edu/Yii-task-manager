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
        <?= $form->field($model, 'name')->textInput([
            'class' => 'form-control',
            'autofocus' => true,
            'placeholder' => 'Имя исполнителя',
        ]) ?>
        <?= $form->field($model, 'email')->textInput([
            'class' => 'form-control',
            'placeholder' => 'email@example.com',
        ]) ?>
    </div>
    <div class="t3-form-footer">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => 't3-btn t3-btn-primary']) ?>
        <?= Html::a('Отмена', Url::to(['executor/index']), ['class' => 't3-btn t3-btn-secondary']) ?>
    </div>
</div>
<?php ActiveForm::end() ?>

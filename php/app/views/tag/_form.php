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
            'placeholder' => 'Название тега',
        ]) ?>
        <?= $form->field($model, 'color')->textInput([
            'class' => 'form-control',
            'placeholder' => '#e6e6e6',
        ]) ?>
    </div>
    <div class="t3-form-footer">
        <?= Html::submitButton($model->isNewRecord ? 'Создать тег' : 'Сохранить', ['class' => 't3-btn t3-btn-primary']) ?>
        <?= Html::a('Отмена', Url::to(['tag/index']), ['class' => 't3-btn t3-btn-secondary']) ?>
    </div>
</div>
<?php ActiveForm::end() ?>

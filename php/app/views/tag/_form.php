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
<div class="card border shadow-sm">
    <div class="card-body py-2 px-3">
        <?= $form->field($model, 'name')->textInput([
            'class' => 'form-control form-control-sm',
            'autofocus' => true,
            'placeholder' => 'Название тега',
        ]) ?>
        <?= $form->field($model, 'color')->textInput([
            'class' => 'form-control form-control-sm',
            'placeholder' => '#e6e6e6',
        ]) ?>
    </div>
    <div class="card-footer bg-transparent py-2 px-3 border-top-0">
        <div class="d-flex flex-wrap gap-2">
            <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => 'btn btn-primary btn-sm']) ?>
            <?= Html::a('Назад', Url::to(['tag/index']), ['class' => 'btn btn-outline-secondary btn-sm']) ?>
        </div>
    </div>
</div>
<?php ActiveForm::end() ?>

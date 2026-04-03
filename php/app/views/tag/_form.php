<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap5\ActiveForm;

?>
<?php $form = ActiveForm::begin(['action' => $formAction]); ?>
    <?= $form->field($model, 'name')->textInput([
        'autofocus' => true,
        'placeholder' => 'Название тега',
    ]) ?>
    <?= $form->field($model, 'color')->textInput([
        'placeholder' => '#e6e6e6',
    ]) ?>
    <div class="mt-3">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Cохранить', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Назад', Url::to(['tag/index']), ['class' => 'btn btn-link']) ?>
    </div>
<?php ActiveForm::end() ?>

<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap5\ActiveForm;

?>
<?php $form = ActiveForm::begin(['action' => $formAction]); ?>
    <?= $form->field($model, 'name')->textInput([
        'autofocus' => true,
        'placeholder' => 'Имя исполнителя',
    ]) ?>
    <?= $form->field($model, 'email')->textInput([
        'placeholder' => 'email@example.com',
    ]) ?>
    <div class="mt-3">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Cохранить', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Назад', Url::to(['executor/index']), ['class' => 'btn btn-link']) ?>
    </div>
<?php ActiveForm::end() ?>

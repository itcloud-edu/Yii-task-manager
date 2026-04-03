<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap5\ActiveForm;

?>
<?php $form = ActiveForm::begin(['action' => $formAction]); ?>
    <?= $form->field($model, 'title')->textInput([
        'autofocus' => true,
        'placeholder' => 'Название проекта'
    ]) ?>
    <?= $form->field($model, 'description')->textarea([
        'rows' => 4,
        'placeholder' => 'Описание (необязательно)'
    ]) ?>
    <div class="mt-3">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Cохранить', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Назад', Url::to(['project/index']), ['class' => 'btn btn-link']) ?>
    </div>
    <?php ActiveForm::end() ?>
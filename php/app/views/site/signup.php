<?php

use app\widgets\Alert;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

/**
 * @var yii\web\View    $this
 * @var app\models\SignupForm $model
 */

$this->title = 'Регистрация';
?>
<div class="t3-auth-wrap">
    <div class="t3-auth-card">
        <div class="t3-auth-logo"><?= Html::encode(Yii::$app->name) ?></div>
        <div class="t3-auth-sub">Создайте аккаунт, чтобы начать</div>
        <?= Alert::widget() ?>

        <?php $form = ActiveForm::begin(['id' => 'signup-form']); ?>

        <?= $form->field($model, 'username')->textInput([
            'autofocus' => true,
            'placeholder' => 'Минимум 2 символа',
            'class' => 'form-control',
        ])->label('Логин') ?>

        <?= $form->field($model, 'email')->input('email', [
            'placeholder' => 'example@domain.com',
            'class' => 'form-control',
        ])->label('Email') ?>

        <?= $form->field($model, 'password')->passwordInput([
            'placeholder' => 'Минимум 8 символов',
            'class' => 'form-control',
        ])->label('Пароль') ?>

        <div style="margin-top:20px;">
            <?= Html::submitButton('Зарегистрироваться', ['class' => 't3-btn t3-btn-primary', 'style' => 'width:100%;justify-content:center;']) ?>
        </div>

        <?php ActiveForm::end(); ?>

        <div class="t3-auth-footer">
            Уже есть аккаунт? <?= Html::a('Войти', ['/site/login']) ?>
        </div>
    </div>
</div>

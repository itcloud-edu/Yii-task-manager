<?php

use app\widgets\Alert;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

/**
 * @var yii\web\View       $this
 * @var app\models\LoginForm $model
 */

$this->title = 'Вход';
?>
<div class="t3-auth-wrap">
    <div class="t3-auth-card">
        <div class="t3-auth-logo"><?= Html::encode(Yii::$app->name) ?></div>
        <div class="t3-auth-sub">Войдите, чтобы продолжить</div>
        <?= Alert::widget() ?>

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form->field($model, 'username')->textInput([
            'autofocus' => true,
            'placeholder' => 'Логин',
            'class' => 'form-control',
        ])->label('Логин') ?>

        <?= $form->field($model, 'password')->passwordInput([
            'placeholder' => 'Пароль',
            'class' => 'form-control',
        ])->label('Пароль') ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'label' => 'Запомнить меня',
        ])->label(false) ?>

        <div style="margin-top:20px;">
            <?= Html::submitButton('Войти', ['class' => 't3-btn t3-btn-primary', 'style' => 'width:100%;justify-content:center;']) ?>
        </div>

        <?php ActiveForm::end(); ?>

        <div class="t3-auth-footer">
            Нет аккаунта? <?= Html::a('Зарегистрироваться', ['/site/signup']) ?>
        </div>
    </div>
</div>

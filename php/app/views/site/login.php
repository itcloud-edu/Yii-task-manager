<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

/**
 * @var yii\web\View       $this
 * @var app\models\LoginForm $model
 */

$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Введите логин и пароль:</p>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'rememberMe')->checkbox() ?>

            <div class="mt-3">
                <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>

                <?php
                // Ссылка на регистрацию — если аккаунта ещё нет
                ?>
                <?= Html::a('Нет аккаунта? Зарегистрироваться', ['/site/signup'], ['class' => 'btn btn-link']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
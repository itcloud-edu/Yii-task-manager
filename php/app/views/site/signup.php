<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

/**
 * @var yii\web\View    $this
 * @var app\models\SignupForm $model
 */

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Заполните форму для создания аккаунта:</p>

    <div class="row">
        <div class="col-lg-5">

            <?php
            // ActiveForm::begin() открывает тег <form> с CSRF-токеном внутри.
            // Все поля — между begin() и end().
            $form = ActiveForm::begin(['id' => 'signup-form']);
            ?>

            <?php
            // $form->field($model, 'username') генерирует:
            //   — метку из attributeLabels() → "Логин"
            //   — <input type="text"> с текущим значением
            //   — блок ошибки валидации
            //   — JS-валидацию по rules() (без перезагрузки страницы)
            ?>
            <?= $form->field($model, 'username')->textInput([
                'autofocus'   => true,
                'placeholder' => 'Минимум 2 символа',
            ]) ?>

            <?= $form->field($model, 'email')->input('email', [
                'placeholder' => 'example@domain.com',
            ]) ?>

            <?php
            // passwordInput() → <input type="password">
            // Символы скрыты точками, браузер предлагает сохранить пароль.
            ?>
            <?= $form->field($model, 'password')->passwordInput([
                'placeholder' => 'Минимум 8 символов',
            ]) ?>

            <div class="mt-3">
                <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary']) ?>

                <?php
                // Ссылка на страницу входа — если аккаунт уже есть
                ?>
                <?= Html::a('Уже есть аккаунт? Войти', ['/site/login'], ['class' => 'btn btn-link']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>

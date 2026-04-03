<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm — модель формы входа.
 *
 * Это НЕ ActiveRecord (не связана с таблицей напрямую).
 * Наследуется от yii\base\Model — базовый класс для форм и DTO.
 * Задача: принять данные формы, провалидировать и выполнить вход.
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    // Кеш объекта User. false = "ещё не запрашивали", null = "не найден".
    private $_user = false;

    public function rules(): array
    {
        return [
            [['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],

            // Кастомный валидатор — метод validatePassword() этого же класса.
            // Вызывается только если предыдущие правила прошли без ошибок.
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Inline-валидатор пароля.
     * Сначала проверяем существование пользователя, потом — правильность пароля.
     * Одно сообщение для обоих случаев: злоумышленник не узнает, что именно неверно.
     */
    public function validatePassword($attribute, $params): void
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            // $user->validatePassword() вызывает Yii::$app->security->validatePassword()
            // Этот метод теперь работает с bcrypt-хешем из БД (не с открытым паролем).
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Неверный логин или пароль.');
            }
        }
    }

    /**
     * login() — выполнить вход.
     * Вызывается из контроллера: $model->login().
     */
    public function login(): bool
    {
        if ($this->validate()) {
            // 3600 * 24 * 30 = 30 дней. 0 = только до закрытия браузера.
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        return false;
    }

    /**
     * getUser() — ленивая загрузка пользователя по логину.
     *
     * ЧТО ИЗМЕНИЛОСЬ по сравнению с шаблоном:
     * Раньше: User::findByUsername() искал в статическом массиве $users.
     * Теперь: User::findByUsername() делает SELECT в таблице user в PostgreSQL.
     * Сигнатура метода та же — логика формы не меняется.
     */
    public function getUser(): ?User
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}

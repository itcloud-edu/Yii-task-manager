<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * SignupForm — модель формы регистрации.
 *
 * Наследуется от Model (не ActiveRecord).
 * Не хранит данные в таблице напрямую — её задача:
 *   1. Принять username, email, password из формы.
 *   2. Провалидировать их.
 *   3. Создать объект User, сохранить в БД и вернуть.
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;

    public function rules(): array
    {
        return [
            // Все три поля обязательны
            [['username', 'email', 'password'], 'required'],

            // Фильтр trim: убирает пробелы в начале и конце строки перед валидацией.
            // Это делается до остальных проверок — порядок правил важен.
            [['username', 'email', 'password'], 'trim'],

            // Ограничения длины username
            ['username', 'string', 'min' => 2, 'max' => 255],

            // 'unique' — специальный валидатор Yii: делает SELECT COUNT(*) в таблице
            // и возвращает ошибку если запись с таким значением уже есть.
            // targetClass = класс модели → знает имя таблицы.
            // targetAttribute = колонка для поиска.
            ['username', 'unique',
                'targetClass'     => User::class,
                'targetAttribute' => 'username',
                'message'         => 'Этот логин уже занят.',
            ],

            // email должен быть в правильном формате (содержать @, домен и т.д.)
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique',
                'targetClass'     => User::class,
                'targetAttribute' => 'email',
                'message'         => 'Этот email уже зарегистрирован.',
            ],

            // Минимальная длина пароля — 8 символов
            ['password', 'string', 'min' => 8],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'username' => 'Логин',
            'email'    => 'Email',
            'password' => 'Пароль',
        ];
    }

    /**
     * signup() — зарегистрировать пользователя.
     *
     * Вызывается из контроллера после успешной валидации формы.
     *
     * @return User|null Объект User при успехе, null при ошибке сохранения.
     */
    public function signup(): ?User
    {
        // Проверяем валидность формы перед созданием пользователя
        if (!$this->validate()) {
            return null;
        }

        // Создаём новый объект User (не связан с БД, isNewRecord = true)
        $user = new User();

        // Заполняем поля напрямую (не через load() — пароль нельзя присваивать напрямую)
        $user->username = $this->username;
        $user->email    = $this->email;

        // setPassword() не присваивает строку пароля, а генерирует bcrypt-хеш.
        // После этого $user->password_hash = '$2y$13$...' (длинная строка из 60 символов)
        $user->setPassword($this->password);

        // generateAuthKey() создаёт случайную строку для remember-me cookie.
        // Нужно вызвать ДО save(), потому что auth_key NOT NULL в схеме.
        $user->generateAuthKey();

        // save() запускает validate() и выполняет INSERT INTO user ...
        // Если save() вернул false — что-то пошло не так на уровне БД.
        // false означает ошибку сохранения (например, нарушение уникального индекса на уровне БД,
        // хотя мы уже проверили это в rules()).
        return $user->save(false) ? $user : null;
    }
}

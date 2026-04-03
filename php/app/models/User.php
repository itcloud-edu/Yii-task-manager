<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * Модель пользователя.
 *
 * Наследует ActiveRecord — значит, объект класса соответствует строке таблицы user в БД.
 * Реализует IdentityInterface — это обязательный контракт для любой модели пользователя в Yii2.
 *
 * @property int    $id
 * @property string $username
 * @property string $email
 * @property string $password_hash
 * @property string $auth_key
 * @property int    $status
 * @property int    $created_at
 * @property int    $updated_at
 */
class User extends ActiveRecord implements IdentityInterface
{
    // Константы статусов — читабельные имена вместо магических чисел.
    // Использование: User::STATUS_ACTIVE вместо 10 прямо в коде.
    const STATUS_DELETED  = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE   = 10;

    /**
     * tableName() — возвращает имя таблицы в БД.
     * ActiveRecord по умолчанию ищет таблицу по имени класса в lowercase,
     * но лучше указать явно.
     */
    public static function tableName(): string
    {
        return 'user';
    }

    /**
     * behaviors() — подключаемые поведения (behaviors).
     *
     * TimestampBehavior автоматически заполняет created_at и updated_at
     * текущим Unix-временем (time()) при создании и обновлении записи.
     * Нам не нужно вручную писать $model->created_at = time() перед save().
     */
    public function behaviors(): array
    {
        return [
            \yii\behaviors\TimestampBehavior::class,
        ];
    }

    /**
     * rules() — правила валидации.
     * Yii проверяет их при $model->validate() или $model->save().
     */
    public function rules(): array
    {
        return [
            // status должен быть в списке допустимых значений
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],

            // username и email обязательны
            [['username', 'email'], 'required'],

            // Уникальность в таблице — Yii выполнит SELECT COUNT(*) перед save()
            // targetClass — в какой таблице искать. По умолчанию — таблица этой модели.
            ['username', 'unique', 'targetClass' => self::class, 'message' => 'Этот логин уже занят.'],
            ['email',    'unique', 'targetClass' => self::class, 'message' => 'Этот email уже зарегистрирован.'],

            // Ограничения длины
            ['username', 'string', 'min' => 2, 'max' => 255],

            // email — встроенный валидатор, проверяет формат адреса
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
        ];
    }

    /**
     * attributeLabels() — человекочитаемые названия полей.
     * Отображаются в формах (ActiveForm) и виджетах (GridView, DetailView).
     */
    public function attributeLabels(): array
    {
        return [
            'id'           => 'ID',
            'username'     => 'Логин',
            'email'        => 'Email',
            'status'       => 'Статус',
            'created_at'   => 'Зарегистрирован',
            'updated_at'   => 'Обновлён',
        ];
    }

    // =========================================================================
    // Реализация IdentityInterface
    // Эти четыре метода Yii вызывает самостоятельно, нам не нужно их вызывать вручную.
    // =========================================================================

    /**
     * findIdentity() — найти пользователя по id.
     *
     * Вызывается Yii при каждом запросе: фреймворк читает id из сессии
     * и через этот метод загружает объект User из БД.
     *
     * {@inheritdoc}
     */
    public static function findIdentity($id): ?self
    {
        // Ищем только активных пользователей — удалённые/заблокированные не войдут,
        // даже если их id есть в сессии.
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * findIdentityByAccessToken() — найти пользователя по Bearer-токену.
     *
     * Используется для API-аутентификации (заголовок Authorization: Bearer <token>).
     * В этом проекте не реализуем, но интерфейс требует метод.
     *
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null): ?self
    {
        // throw new NotSupportedException() — лучший вариант если API не нужен.
        // Возвращаем null чтобы не ломать приложение.
        return null;
    }

    /**
     * getId() — возвращает уникальный идентификатор пользователя.
     * Yii сохраняет именно это значение в сессию.
     *
     * {@inheritdoc}
     */
    public function getId(): int
    {
        return $this->getPrimaryKey();
    }

    /**
     * getAuthKey() — возвращает ключ для remember-me cookie.
     * Yii сохраняет его в зашифрованном cookie при enableAutoLogin = true.
     *
     * {@inheritdoc}
     */
    public function getAuthKey(): string
    {
        return $this->auth_key;
    }

    /**
     * validateAuthKey() — проверяет, совпадает ли ключ из cookie с ключом в БД.
     * Это защита: если злоумышленник подделал cookie — ключи не совпадут, автовход не произойдёт.
     *
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey): bool
    {
        return $this->getAuthKey() === $authKey;
    }

    // =========================================================================
    // Вспомогательные методы
    // =========================================================================

    /**
     * findByUsername() — найти пользователя по логину.
     * Вызывается из LoginForm при попытке входа.
     */
    public static function findByUsername(string $username): ?self
    {
        // strcasecmp в старой реализации делал нечувствительный к регистру поиск.
        // В PostgreSQL ILIKE делает то же самое на уровне БД.
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * validatePassword() — проверить пароль пользователя.
     *
     * Yii::$app->security->validatePassword() — правильный способ проверки пароля.
     * Он сравнивает введённый пароль с хешем из БД используя password_verify() под капотом.
     * Нельзя сравнить напрямую: password_hash('secret') !== password_hash('secret')
     * (каждый вызов даёт разный хеш из-за соли).
     */
    public function validatePassword(string $password): bool
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * setPassword() — сохранить новый пароль в виде хеша.
     *
     * Вызывается при регистрации и смене пароля.
     * generatePasswordHash() использует bcrypt — медленный алгоритм,
     * специально предназначенный для паролей (перебор занимает годы).
     */
    public function setPassword(string $password): void
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * generateAuthKey() — сгенерировать случайный ключ для remember-me cookie.
     *
     * generateRandomString() создаёт криптографически стойкую случайную строку.
     * Вызывается один раз при регистрации, потом auth_key не меняется
     * (если не нужно инвалидировать все сессии пользователя).
     */
    public function generateAuthKey(): void
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
}

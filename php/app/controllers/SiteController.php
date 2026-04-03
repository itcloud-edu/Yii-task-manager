<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\SignupForm;  // ← новый импорт
// use app\models\ContactForm;

class SiteController extends Controller
{
    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                // 'only' — список actions, к которым применяется этот фильтр.
                // Actions НЕ из этого списка доступны всем без проверки.
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow'   => true,
                        // '@' — залогиненный пользователь (аутентифицированный)
                        // '?' — гость (не залогиненный)
                        'roles'   => ['@'],
                    ],
                ],
            ],

            'verbs' => [
                'class'   => VerbFilter::class,
                'actions' => [
                    // logout доступен только через POST — защита от CSRF через GET-ссылки
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions(): array
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class'           => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex(): string
    {
        return $this->render('index');
    }

    /**
     * Страница входа.
     * Если пользователь уже залогинен — редирект на главную.
     */
    public function actionLogin(): Response|string
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', ['model' => $model]);
    }

    /**
     * Страница регистрации.
     *
     * Логика:
     * 1. Если пользователь уже залогинен — незачем регистрироваться, редиректим.
     * 2. GET-запрос → показываем пустую форму.
     * 3. POST-запрос → заполняем SignupForm из POST-данных.
     * 4. Вызываем signup() — создаём пользователя в БД.
     * 5. При успехе — сразу логиним и редиректим на главную.
     * 6. При ошибке — показываем форму с ошибками валидации.
     */
    public function actionSignup(): Response|string
    {
        // Залогиненному незачем снова регистрироваться
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post())) {
            // signup() сам вызывает validate() внутри.
            // Если форма прошла валидацию и пользователь создан — $user не null.
            $user = $model->signup();

            if ($user !== null) {
                // Сразу логиним нового пользователя — не нужно идти на страницу входа.
                // 0 = сессия без remember-me (до закрытия браузера).
                if (Yii::$app->user->login($user, 0)) {
                    // goHome() редиректит на homeUrl (обычно '/')
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', ['model' => $model]);
    }

    /**
     * Выход. Только POST (см. VerbFilter).
     */
    public function actionLogout(): Response
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    // public function actionContact(): Response|string
    // {
    //     $model = new ContactForm();
    //     if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
    //         Yii::$app->session->setFlash('contactFormSubmitted');
    //         return $this->refresh();
    //     }
    //     return $this->render('contact', ['model' => $model]);
    // }

    // public function actionAbout(): string
    // {
    //     return $this->render('about');
    // }
}

<?php

namespace app\widgets;

use yii\base\InvalidConfigException;
use yii\base\Widget;
use app\models\Project;

/**
 * ProjectCard — виджет карточки проекта.
 *
 * Генерирует Bootstrap-карточку (card) для одного проекта.
 * Используется в списке проектов и в любом другом месте, где нужна карточка.
 *
 * Простой синтаксис:
 *   echo ProjectCard::widget(['project' => $project]);
 *
 * С параметрами:
 *   echo ProjectCard::widget([
 *       'project'     => $project,
 *       'showActions' => false,  // скрыть кнопки edit/delete
 *   ]);
 */
class ProjectCard extends Widget
{
    /**
     * $project — объект проекта для отображения.
     * Обязательное свойство: если не передать — init() выбросит исключение.
     *
     * @var Project
     */
    public $project;

    /**
     * $showActions — показывать ли кнопки "Изменить" и "Удалить".
     * По умолчанию true — кнопки видны.
     * Передайте false чтобы показать карточку в режиме только для чтения.
     *
     * @var bool
     */
    public $showActions = true;

    /**
     * $descriptionLength — максимальное число символов описания в превью.
     * Длинное описание обрезается и добавляется многоточие.
     *
     * @var int
     */
    public $descriptionLength = 150;

    /**
     * init() — инициализация виджета.
     *
     * Вызывается автоматически до run(). Здесь проверяем обязательные свойства.
     * Если $project не передан — лучше упасть с понятной ошибкой, чем молча
     * сгенерировать неправильный HTML или PHP Notice.
     *
     * InvalidConfigException — стандартное исключение Yii для неверной конфигурации виджета.
     *
     * {@inheritdoc}
     */
    public function init(): void
    {
        parent::init();

        if (!$this->project instanceof Project) {
            throw new InvalidConfigException(
                'Свойство ProjectCard::$project обязательно и должно быть объектом Project.'
            );
        }
    }

    /**
     * run() — основной метод виджета, генерирует HTML.
     *
     * Вызывает render() для шаблона — точно так же, как контроллер вызывает render() для view.
     * Yii ищет шаблон в папке рядом с классом виджета: widgets/views/project-card.php.
     *
     * Переменные, переданные во второй аргумент render(), доступны в шаблоне.
     *
     * {@inheritdoc}
     */
    public function run(): string
    {
        // $this->render() — рендер шаблона виджета.
        // Yii ищет файл: widgets/views/project-card.php
        // (имя папки и файла — по соглашению Yii, можно переопределить через $viewPath)
        return $this->render('project-card', [
            // Передаём в шаблон объект проекта
            'project' => $this->project,

            // Передаём флаг видимости кнопок
            'showActions' => $this->showActions,

            // Передаём обрезанное описание
            'shortDescription' => $this->getShortDescription(),
        ]);
    }

    /**
     * getShortDescription() — возвращает описание проекта, обрезанное до $descriptionLength.
     *
     * mb_substr() — многобайтовый substr, корректно работает с кириллицей.
     * Если описание короче лимита — возвращает как есть.
     * Если длиннее — обрезает и добавляет '...'.
     *
     * private — вспомогательный метод только для этого класса.
     */
    private function getShortDescription(): string
    {
        $desc = $this->project->description ?? '';

        if (mb_strlen($desc) <= $this->descriptionLength) {
            return $desc;
        }

        return mb_substr($desc, 0, $this->descriptionLength) . '...';
    }
}

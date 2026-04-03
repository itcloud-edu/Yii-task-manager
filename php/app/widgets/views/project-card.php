<?php

use yii\helpers\Html;
use yii\helpers\Url;

/**
 * Шаблон карточки проекта.
 *
 * Переменные, доступные в этом файле (переданы из ProjectCard::run()):
 * @var yii\web\View       $this             Объект View (доступен в любом шаблоне Yii)
 * @var app\models\Project $project          Объект проекта
 * @var bool               $showActions      Показывать ли кнопки edit/delete
 * @var string             $shortDescription Обрезанное описание
 */
?>

<div class="card mb-3">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-start">

            <div>
                <h5 class="card-title mb-1">
                    <?php
                    // Html::a() — ссылка на страницу проекта.
                    // Html::encode() — защита от XSS: экранирует < > & " в названии.
                    ?>
                    <?= Html::a(
                        Html::encode($project->title),
                        ['project/view', 'id' => $project->id],
                        ['class' => 'text-decoration-none']
                    ) ?>
                </h5>

                <?php if ($shortDescription): ?>
                    <p class="card-text text-muted small mb-1">
                        <?= Html::encode($shortDescription) ?>
                    </p>
                <?php endif ?>

                <small class="text-muted">
                    <?php
                    // created_at — строка TIMESTAMP из PostgreSQL.
                    // strtotime() конвертирует в Unix timestamp, date() форматирует.
                    ?>
                    Создан: <?= date('d.m.Y', strtotime($project->created_at)) ?>
                </small>
            </div>

            <?php if ($showActions): ?>
                <div class="d-flex gap-2 ms-3">
                    <?= Html::a(
                        'Изменить',
                        ['project/update', 'id' => $project->id],
                        ['class' => 'btn btn-sm btn-outline-secondary']
                    ) ?>

                    <?= Html::a('Удалить', ['project/delete', 'id' => $project->id], [
                        'class'        => 'btn btn-sm btn-outline-danger',
                        // data-method="post" — Yii JS превращает ссылку в POST-форму.
                        // Без этого удаление было бы GET-запросом — небезопасно.
                        'data-method'  => 'post',
                        // Диалог подтверждения перед удалением
                        'data-confirm' => 'Удалить проект "' . Html::encode($project->title) . '"?',
                    ]) ?>
                </div>
            <?php endif ?>

        </div>
    </div>
</div>
<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Html;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);

$currentRoute = Yii::$app->controller->id;
$isGuest = Yii::$app->user->isGuest;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>

<?php if ($isGuest): ?>
    <?php
    // For auth pages, inject flash alerts inside the auth card via view params, not here.
    // The content (login/signup view) is rendered as a full-screen centered card.
    ?>
    <?= $content ?>
<?php else: ?>

<button class="t3-hamburger" id="t3-hamburger" aria-label="Меню">
    <span></span><span></span><span></span>
</button>
<div class="t3-overlay" id="t3-overlay"></div>

<div class="t3-layout">
    <aside class="t3-sidebar" id="t3-sidebar">
        <div class="t3-sidebar-header">
            <?= Html::encode(Yii::$app->name) ?>
        </div>

        <ul class="t3-nav">
            <li>
                <a href="<?= Yii::$app->urlManager->createUrl(['/site/index']) ?>"
                   class="t3-nav-item <?= $currentRoute === 'site' ? 'active' : '' ?>">
                    <svg viewBox="0 0 16 16" fill="currentColor"><path d="M8 1.5l6 5.5V14a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-3H6v3a.5.5 0 0 1-.5.5h-3A.5.5 0 0 1 2 14V7L8 1.5z"/></svg>
                    Главная
                </a>
            </li>
            <li class="t3-nav-section">Планирование</li>
            <li>
                <a href="<?= Yii::$app->urlManager->createUrl(['/project/index']) ?>"
                   class="t3-nav-item <?= $currentRoute === 'project' ? 'active' : '' ?>">
                    <svg viewBox="0 0 16 16" fill="currentColor"><path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm-8 8A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm8 0A1.5 1.5 0 0 1 10.5 9h3A1.5 1.5 0 0 1 15 10.5v3A1.5 1.5 0 0 1 13.5 15h-3A1.5 1.5 0 0 1 9 13.5v-3z"/></svg>
                    Проекты
                </a>
            </li>
            <li>
                <a href="<?= Yii::$app->urlManager->createUrl(['/task/index']) ?>"
                   class="t3-nav-item <?= $currentRoute === 'task' ? 'active' : '' ?>">
                    <svg viewBox="0 0 16 16" fill="currentColor"><path d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zm-1 12H3V3h10v10zM4.5 8a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5z"/></svg>
                    Задачи
                </a>
            </li>
            <li class="t3-nav-section">Справочники</li>
            <li>
                <a href="<?= Yii::$app->urlManager->createUrl(['/tag/index']) ?>"
                   class="t3-nav-item <?= $currentRoute === 'tag' ? 'active' : '' ?>">
                    <svg viewBox="0 0 16 16" fill="currentColor"><path d="M2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2zm3.5 4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/></svg>
                    Теги
                </a>
            </li>
            <li>
                <a href="<?= Yii::$app->urlManager->createUrl(['/executor/index']) ?>"
                   class="t3-nav-item <?= $currentRoute === 'executor' ? 'active' : '' ?>">
                    <svg viewBox="0 0 16 16" fill="currentColor"><path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg>
                    Исполнители
                </a>
            </li>
        </ul>

        <div class="t3-sidebar-footer">
            <?php if (!$isGuest): ?>
                <div class="t3-nav-item" style="cursor:default; margin-bottom:2px;">
                    <svg viewBox="0 0 16 16" fill="currentColor" style="width:16px;height:16px;flex-shrink:0;opacity:.6;"><path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg>
                    <span style="font-size:13px;color:var(--text-muted);overflow:hidden;text-overflow:ellipsis;white-space:nowrap;"><?= Html::encode(Yii::$app->user->identity->username) ?></span>
                </div>
                <?= Html::beginForm(['/site/logout']) ?>
                <button type="submit" class="t3-logout-btn">
                    <svg viewBox="0 0 16 16" fill="currentColor" style="width:16px;height:16px;flex-shrink:0;opacity:.6;"><path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/><path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/></svg>
                    Выйти
                </button>
                <?= Html::endForm() ?>
            <?php endif; ?>
        </div>
    </aside>

    <main class="t3-main">
        <div class="t3-content">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>
</div>

<?php endif; ?>

<?php $this->registerJs(<<<'JS'
var btn = document.getElementById('t3-hamburger');
var sidebar = document.getElementById('t3-sidebar');
var overlay = document.getElementById('t3-overlay');
if (btn && sidebar && overlay) {
    btn.addEventListener('click', function() {
        sidebar.classList.toggle('open');
        overlay.classList.toggle('open');
    });
    overlay.addEventListener('click', function() {
        sidebar.classList.remove('open');
        overlay.classList.remove('open');
    });
}
JS); ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

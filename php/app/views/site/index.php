<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Главная';
?>
<div>
    <div class="t3-page-header">
        <h1 class="t3-page-title">Добро пожаловать</h1>
    </div>

    <p style="color:var(--text-muted);font-size:15px;margin-bottom:28px;line-height:1.6;">
        Управляйте своими проектами и задачами.
    </p>

    <div style="display:flex;flex-direction:column;gap:10px;max-width:320px;">
        <?= Html::a('Мои проекты', ['/project/index'], ['class' => 't3-btn t3-btn-primary']) ?>
        <?= Html::a('Все задачи', ['/task/index'], ['class' => 't3-btn t3-btn-secondary']) ?>
    </div>
</div>

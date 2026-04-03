<?php

/** @var yii\web\View $this */
/** @var app\models\Project $project */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $project->title;
?>
<div>
    <div class="t3-breadcrumb">
        <?= Html::a('Проекты', ['project/index']) ?>
        <span class="t3-breadcrumb-sep">›</span>
        <span><?= Html::encode($project->title) ?></span>
    </div>

    <div class="t3-page-header">
        <div></div>
        <div style="display:flex;gap:8px;">
            <?= Html::a('Изменить', Url::to(['project/update', 'id' => $project->id]), ['class' => 't3-btn t3-btn-secondary']) ?>
            <?= Html::a('Удалить', Url::to(['project/delete', 'id' => $project->id]), ['class' => 't3-btn t3-btn-ghost', 'style' => 'color:var(--red)']) ?>
        </div>
    </div>

    <div class="t3-card">
        <div class="t3-card-body">
            <h1 class="t3-detail-title"><?= Html::encode($project->title) ?></h1>
            <?php if (trim((string) $project->description) !== ''): ?>
                <p style="color:var(--text-muted);font-size:14px;line-height:1.6;margin:0;">
                    <?= nl2br(Html::encode($project->description)) ?>
                </p>
            <?php else: ?>
                <p style="color:var(--text-faint);font-size:14px;margin:0;">Описание не задано</p>
            <?php endif; ?>
        </div>
    </div>

    <?= Html::a('← К проектам', Url::to(['project/index']), ['class' => 't3-btn-link']) ?>
</div>

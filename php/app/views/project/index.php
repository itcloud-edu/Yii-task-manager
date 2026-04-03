<?php

/** @var yii\web\View $this */
/** @var app\models\Project[] $projects */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Проекты';
?>
<div>
    <div class="t3-page-header">
        <h1 class="t3-page-title"><?= Html::encode($this->title) ?></h1>
        <?= Html::a('+ Новый проект', Url::to(['project/create']), ['class' => 't3-btn t3-btn-primary']) ?>
    </div>

    <?php if ($projects === []): ?>
        <div class="t3-empty">
            Проектов пока нет.<br>
            <?= Html::a('Создать первый проект', ['project/create']) ?>
        </div>
    <?php else: ?>
        <div class="t3-list">
            <?php foreach ($projects as $project): ?>
                <div class="t3-row" onclick="location.href='<?= Url::to(['project/view', 'id' => $project->id]) ?>'">
                    <div class="t3-row-body">
                        <div class="t3-row-title"><?= Html::encode($project->title) ?></div>
                        <?php if (trim((string) $project->description) !== ''): ?>
                            <div class="t3-row-meta" style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;max-width:100%;">
                                <?= Html::encode(mb_strimwidth(strip_tags($project->description), 0, 80, '…')) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="t3-row-actions">
                        <?= Html::a('Изменить', ['project/update', 'id' => $project->id], ['onclick' => 'event.stopPropagation()']) ?>
                        <?= Html::a('Удалить', ['project/delete', 'id' => $project->id], ['class' => 'danger', 'onclick' => 'event.stopPropagation()']) ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

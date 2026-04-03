<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Новый проект';
?>
<div>
    <div class="t3-breadcrumb">
        <?= Html::a('Проекты', ['project/index']) ?>
        <span class="t3-breadcrumb-sep">›</span>
        <span>Новый проект</span>
    </div>
    <h1 class="t3-page-title" style="margin-bottom:22px;"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'formAction' => ['project/create'],
    ]) ?>
</div>

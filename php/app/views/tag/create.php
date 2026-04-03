<?php

/** @var yii\web\View $this */
/** @var app\models\Tag $model */

use yii\helpers\Html;

$this->title = 'Новый тег';
$this->registerJsFile('@web/js/script.js');
$this->registerCss('.breadcrumb {font-size:60px}');
?>
<div class="crud-form-page">
    <nav aria-label="breadcrumb" class="mb-2">
        <ol class="breadcrumb breadcrumb-sm mb-0 small">
            <li class="breadcrumb-item"><?= Html::a('Теги', ['tag/index']) ?></li>
            <li class="breadcrumb-item active" aria-current="page">Создание</li>
        </ol>
    </nav>
    <h1 class="h5 mb-3"><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
        'formAction' => ['tag/create'],
    ]) ?>
</div>
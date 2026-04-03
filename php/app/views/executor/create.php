<?php

/** @var yii\web\View $this */
/** @var app\models\Executor $model */

use yii\helpers\Html;

$this->title = 'Новый исполнитель';
?>
<div>
    <div class="t3-breadcrumb">
        <?= Html::a('Исполнители', ['executor/index']) ?>
        <span class="t3-breadcrumb-sep">›</span>
        <span>Новый исполнитель</span>
    </div>
    <h1 class="t3-page-title" style="margin-bottom:22px;"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'formAction' => ['executor/create'],
    ]) ?>
</div>

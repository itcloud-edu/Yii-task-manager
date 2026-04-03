<?php

namespace app\controllers;

use yii\web\Controller;

class TaskController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate()
    {
        return $this->render('create');
    }

    public function actionView($id)
    {
        return $this->render('view', ['id' => (int) $id]);
    }

    public function actionUpdate($id)
    {
        return $this->render('update', ['id' => (int) $id]);
    }

    public function actionDelete($id)
    {
        return $this->render('delete', ['id' => (int) $id]);
    }
}

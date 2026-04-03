<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Project;
use Yii;
use yii\web\NotFoundHttpException;

class ProjectController extends Controller
{
    public function actionIndex()
    {
        $projects = Project::find()->orderBy(['created_at' => SORT_DESC])->all();
        return $this->render('index', ['projects' => $projects]);
    }

    public function actionView($id)
    {
        $project = $this->findProject($id);
        return $this->render('view', ['project' => $project]);
    }

    public function actionCreate()
    {
        $model = new Project();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', ['Проект создан', 'Урра!']);
            return $this->redirect(['project/view', 'id' => $model->id]);
        }

        return $this->render('create', ['model' =>  $model]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findProject($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['project/view', 'id' => $model->id]);
        }

        return $this->render('update', ['model' =>  $model]);
    }

    public function actionDelete($id)
    {
        $model = $this->findProject($id);

        if (Yii::$app->request->isPost) {
            $model->delete();
            return $this->redirect(['project/index']);
        }

        return $this->render('delete', ['model' => $model]);
    }

    private function findProject($id)
    {
        $project = Project::findOne($id);
        if ($project === null) {
            throw new NotFoundHttpException('Проект не найден');
        }
        return $project;
    }
}

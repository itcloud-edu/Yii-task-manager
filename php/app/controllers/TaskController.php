<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Task;
use app\models\Project;
use app\models\Status;
use app\models\Tag;
use app\models\Executor;

class TaskController extends Controller
{
    public function actionIndex()
    {
        $tasks = Task::find()->orderBy(['id' => SORT_DESC])->all();
        return $this->render('index', ['tasks' => $tasks]);
    }

    public function actionCreate()
    {
        $model = new Task();
        $model->status_id = 1;
        $model->priority = Task::PRIORITY_MEDIUM;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->saveTags(is_array($model->tagIds) ? $model->tagIds : []);
            $model->saveExecutors(is_array($model->executorIds) ? $model->executorIds : []);
            return $this->redirect(['task/index']);
        }

        return $this->render('create', [
            'model' => $model,
            'projects' => Project::getList(),
            'statuses' => Status::getList(),
            'tags' => Tag::getList(),
            'executors' => Executor::getList(),
        ]);
    }

    public function actionView($id)
    {

        $task = $this->findTask($id);

        $task = Task::find()->where(['id' => $id])->with(['project', 'status', 'tag', 'executor'])->one();

        return $this->render('index', ['task' => $task]);
    }

    public function actionUpdate($id)
    {
        return $this->render('update', ['id' => (int) $id]);
    }

    public function actionDelete($id)
    {
        return $this->render('delete', ['id' => (int) $id]);
    }

    private function findTask($id)
    {
        $task = Task::findOne($id);
        if ($task === null) {
            throw new NotFoundHttpException('Задача не найдена');
        }
        return $task;
    }
}

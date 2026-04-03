<?php

namespace app\controllers;

use Yii;
use yii\helpers\ArrayHelper;
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
            $model->saveTags(is_array($model->tag_ids) ? $model->tag_ids : []);
            $model->saveExecutors(is_array($model->executor_ids) ? $model->executor_ids : []);
            return $this->redirect(['task/view', 'id' => $model->id]);
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
        $task = Task::find()
            ->where(['id' => $id])
            ->with(['project', 'status', 'tags', 'executors'])
            ->one();
        if ($task === null) {
            throw new NotFoundHttpException('Задача не найдена');
        }

        return $this->render('view', ['task' => $task]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findTask($id);
        $model->tag_ids = ArrayHelper::getColumn($model->tags, 'id');
        $model->executor_ids = ArrayHelper::getColumn($model->executors, 'id');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->saveTags(is_array($model->tag_ids) ? $model->tag_ids : []);
            $model->saveExecutors(is_array($model->executor_ids) ? $model->executor_ids : []);
            return $this->redirect(['task/view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'projects' => Project::getList(),
            'statuses' => Status::getList(),
            'tags' => Tag::getList(),
            'executors' => Executor::getList(),
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findTask($id);

        if (Yii::$app->request->isPost) {
            $model->delete();
            return $this->redirect(['task/index']);
        }

        return $this->render('delete', ['model' => $model]);
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

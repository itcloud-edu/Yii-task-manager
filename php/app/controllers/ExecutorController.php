<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Executor;
use Yii;
use yii\web\NotFoundHttpException;

class ExecutorController extends Controller
{
    public function actionIndex()
    {
        $executors = Executor::find()->orderBy(['id' => SORT_DESC])->all();
        return $this->render('index', ['executors' => $executors]);
    }

    public function actionCreate()
    {
        $model = new Executor();

        if($model->load(Yii::$app->request->post()) && $model->save()){

            return $this->redirect(['executor/index']);
        }
    
        return $this->render('create', ['model' =>  $model ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findExecutor($id);

        if($model->load(Yii::$app->request->post()) && $model->save()){

            return $this->redirect(['executor/index']);
        }
    
        return $this->render('update', ['model' =>  $model ]);
    
    
    }

    public function actionDelete($id)
    {
        return $this->render('delete', ['id' => (int) $id]);
    }

    private function findExecutor($id)
    {
        $executor = Executor::findOne($id);
        if ($executor === null) {
            throw new NotFoundHttpException('Исполнитель не найден');
        }
        return $executor;
    }
}

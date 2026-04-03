<?php

namespace app\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;
use app\models\Tag;
use Yii;
use yii\web\NotFoundHttpException;

class TagController extends Controller
{
    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $tags = Tag::find()->orderBy(['id' => SORT_DESC])->all();
        return $this->render('index', ['tags' => $tags]);
    }

    public function actionCreate()
    {
        $model = new Tag();

        if($model->load(Yii::$app->request->post()) && $model->save()){

            return $this->redirect(['tag/index']);
        }
    
        return $this->render('create', ['model' =>  $model ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findTag($id);

        if($model->load(Yii::$app->request->post()) && $model->save()){

            return $this->redirect(['tag/index']);
        }
    
        return $this->render('update', ['model' =>  $model ]);
    
    
    }

    public function actionDelete($id)
    {
        $model = $this->findTag($id);

        if (Yii::$app->request->isPost) {
            $model->delete();
            return $this->redirect(['tag/index']);
        }

        return $this->render('delete', ['model' => $model]);
    }

    private function findTag($id)
    {
        $tag = Tag::findOne($id);
        if ($tag === null) {
            throw new NotFoundHttpException('Тег не найден');
        }
        return $tag;
    }
}

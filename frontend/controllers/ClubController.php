<?php

namespace frontend\controllers;

use frontend\models\ClubSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use frontend\models\Club;
use Yii;
use DateTime;


class ClubController extends Controller
{

    public function actionIndex()
    {
        $searchModel = new ClubSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index',[
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionView($id)
    {
        $model = Club::findOne($id);
        return $this->render('view',['model' => $model]);
    }

    public function actionAdd()
    {
        $model = new Club();

        if($model->load(Yii::$app->request->post()))
        {
            $model->user_create = Yii::$app->user->id;
            $model->save();
            return $this->redirect(['index']);
        }
        return $this->render('create',['model' => $model]);
    }

    public function actionUpdate($id)
    {
        $model = Club::findOne($id);

        if($model->load(Yii::$app->request->post()))
        {
            $date = new DateTime();
            $model->date_update = $date->format('Y-m-d H:i:s');
            $model->user_update = Yii::$app->user->id;
            $model->save();
            return $this->redirect(['view','id' => $model->id]);
        }
        return $this->render('update',['model' => $model]);
    }

    public function actionDelete($id)
    {
        $model = Club::findOne($id);
        if($model){
            $date = new DateTime();
            $model->date_delete = $date->format('Y-m-d H:i:s');
            $model->user_delete = Yii::$app->user->id;
            $model->save();
        }
        return $this->redirect(['index']);
    }

}
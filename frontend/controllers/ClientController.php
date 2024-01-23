<?php

namespace frontend\controllers;
use frontend\models\Client;
use frontend\models\ClientSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii;
use DateTime;

class ClientController extends Controller{

    public function actionIndex()
    {
        $searchModel = new ClientSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index',[
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            ]);
    }

    public function actionView($id)
    {
        $model = Client::findOne($id);
        return $this->render('view',['model' => $model]);
    }

    public function actionUpdate($id)
    {
        $model = Client::findOne($id);

        if($model->load(Yii::$app->request->post()))
        {
            $date = new DateTime();
            $model->date_update = $date->format('Y-m-d H:i:s');
            $model->user_update = Yii::$app->user->id;
            $model->access_club = implode(",", $_POST['Client']['access_club']);
            $model->save();
            return $this->redirect(['view','id' => $model->id]);
        }
        return $this->render('update',['model' => $model]);
    }

    public function actionCreate()
    {
        $model = new Client();
        if($model->load(Yii::$app->request->post()))
        {
            /*echo "<pre>";
            echo print_r($_POST,1);
            echo "</pre>";
            die;*/
            $model->user_create = Yii::$app->user->id;
            $model->access_club = implode(",", $_POST['Client']['access_club']);
            $model->save();
            return $this->redirect(['index']);
        }
        return $this->render('create',['model' => $model]);
    }

    public function actionDelete($id)
    {
        $model = Client::findOne($id);
        if($model){
            $date = new DateTime();
            $model->date_delete = $date->format('Y-m-d H:i:s');
            $model->user_delete = Yii::$app->user->id;
            $model->save();
        }
        return $this->redirect(['index']);
    }

}

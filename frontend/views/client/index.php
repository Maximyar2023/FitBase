<?php
/* @var $searchModel \frontend\models\ClientSearch */
/* @var $dataProvider \yii\data\ActiveDataProvider */
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
use frontend\models\Client;
use yii\helpers\ArrayHelper;
use kartik\daterange\DateRangePicker;
use kartik\date\DatePicker;



echo Html::a('Добавить клиента',["create"],['class'=>'btn btn-success']);

Pjax::begin();
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,

    'columns' => [
       // ['class' => 'yii\grid\SerialColumn'],
        //'id',
        'fio',
        [
            'attribute'=>'type_people',
            'filter' => Html::activeRadioList($searchModel, 'type_people',[
                'м' => 'Мужчина',
                'ж' => 'Женщина',
            ]),
        ],
        //'birthday',
        ['attribute'=>'birthday','filter'=> DateRangePicker::widget([
            'model'=>$searchModel,
            'attribute' => 'birthday',
            'name'=>'date_range_3',
            'convertFormat'=>true,
            'pluginOptions'=>[
                'timePicker'=>true,
                'timePickerIncrement'=>500000,
                'locale'=>['format'=>'Y-m-d']
            ]
        ])],
        'date_create',
        'access_club',
        //'user_create',
        //['attribute' => 'user_create','value' => function($model){return $model->userName ;}],
        //'date_update',
        //'user_update',
        //['attribute' => 'user_update','value' => function($model){return $model->userUpdateName ;}],
        //'date_delete',
        //'user_delete',
        //['attribute' => 'user_delete','value' => function($model){return $model->userDeleteName ;}],
        ['class' => 'yii\grid\ActionColumn','header'=>'Кнопки действия'],
    ],

]);
Pjax::end();

/*
echo DatePicker::widget([
    'type' => DatePicker::TYPE_RANGE,
    'name' => 'dp_addon_3a',
    'value' => date('Y-m-d'),
    'name2' => 'dp_addon_3b',
    'value2' => date('Y-m-d'),
    'pluginOptions' => [
        'autoclose' => true,
        'format' => 'yyyy-mm-dd'
    ]
]);*/






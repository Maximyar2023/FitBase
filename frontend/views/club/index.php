<?php
/* @var $dataProvider \yii\data\ActiveDataProvider */

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

$this->title = "Список клубов";
?>

<h2>Список клубов:</h2>

<?php
echo Html::a('Добавить клуб',["add"],['class'=>'btn btn-success']);

Pjax::begin();
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
         //['class' => 'yii\grid\SerialColumn'],
        'name',
        'address',
        'date_create',
        [
            'attribute'=>'isactive',
            'value' => function(){return '';},
            'filter' => Html::activeCheckbox($searchModel, 'isactive'),
        ],
        //'date_delete',
        ['class' => 'yii\grid\ActionColumn'],
    ],
]);
Pjax::end();
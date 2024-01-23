<?php
/* @var $model \frontend\models\Club */
use yii\widgets\DetailView;
?>
    <h2>Карточка клуба</h2>
<?php
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'name',
        'address',
        'date_create',
        ['attribute' => 'user_create','value' => function($model){return $model->userName ;}],
        'date_update',
        ['attribute' => 'user_update','value' => function($model){return $model->userUpdateName ;}],
        'date_delete',
        ['attribute' => 'user_delete','value' => function($model){return $model->userDeleteName ;}],
    ],
]);
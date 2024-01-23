<?php
use yii\widgets\DetailView;
?>
<h2>Карточка клиента</h2>
<?php
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'fio',
        'type_people',

        'birthday',
        'access_club',

        'date_create',
        //'user_create',
        ['attribute' => 'user_create','value' => function($model){return $model->userName ;}],

        'date_update',
        'user_update',

        'date_delete',
        'user_delete',
    ],
]);

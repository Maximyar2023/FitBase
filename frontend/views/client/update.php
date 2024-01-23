<?php
/* @var $this \yii\web\View*/
/* @var $model \frontend\models\Client*/

$this->title = 'Обновление клиента';
$buttonName = 'Сохранить';
?>

<?= $this->render('_form',['model' => $model,'buttonName' => $buttonName]) ?>
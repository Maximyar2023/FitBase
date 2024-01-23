<?php
/* @var $this \yii\web\View*/
/* @var $model \frontend\models\Client*/

$this->title = 'Создание нового клиента';
$buttonName = 'Создать';
?>

<?= $this->render('_form',['model' => $model,'buttonName' => $buttonName]) ?>
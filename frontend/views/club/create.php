<?php
/* @var $this \yii\web\View*/
/* @var $model \frontend\models\Club*/

$this->title = 'Создание клуба';
$buttonName = 'Создать';
?>

<?= $this->render('_form',['model' => $model,'buttonName' => $buttonName]) ?>
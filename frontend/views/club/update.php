<?php
/* @var $this \yii\web\View*/
/* @var $model \frontend\models\Club*/

$this->title = 'Редактирование клуба';
$buttonName = 'Сохранить';
?>

<?= $this->render('_form',['model' => $model,'buttonName' => $buttonName]) ?>

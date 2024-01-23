<?php
/* @var $model \frontend\models\Club */

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$name = isset($model->name) ? $model->name : '';
?>

    <h2> <?= $this->title.' : '.$name ?> </h2>

<?php
$form = ActiveForm::begin(['layout' => 'horizontal']) ?>
<?= $form->field($model,'name')->textInput() ?>
<?= $form->field($model,'address')->textarea() ?>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton("$buttonName",['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>
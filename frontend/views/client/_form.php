<?php
/* @var $model \frontend\models\Client */

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;

$name = isset($model->name) ? $model->name : '';
?>

    <h2> <?= $this->title.' : '.$name ?> </h2>

<?php
$form = ActiveForm::begin(['layout' => 'horizontal']) ?>

<?= $form->field($model,'fio')->textInput() ?>
<?= $form->field($model,'type_people')->radioList([
    'м' => 'Мужчина',
    'ж' => 'Женщина',
]); ?>
<?= $form->field($model,'birthday')->widget(DatePicker::class,[
    'name' => 'dp_1',
    'type' => DatePicker::TYPE_INPUT,
    'value' => '23-Feb-1982',
    'pluginOptions' => [
        'autoclose' => true,
        'format' => 'yyyy-mm-dd'
    ]
]) ?>

<?= $form->field($model,'access_club')->dropDownList(ArrayHelper::map(\frontend\models\Club::find()->where(['date_delete' => null])->asArray()->all(), 'id', 'name'), ['multiple' => 'multiple']) ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton("$buttonName",['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>


<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model backend\models\Promotions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="promotions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'promotion_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'discription')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'start_date')->widget(DatePicker::classname(), [
       
    'language' => 'en',
    'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]       
    ]) 
    ?>
    

    <?= $form->field($model, 'end_date')->widget(DatePicker::classname(), [
    
    'language' => 'en',
    'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]       
    ]) ?>

   <?= $form->field($model, 'emirates_id')->dropDownList(ArrayHelper::map(\backend\models\Emirates::find()->all(), 'id', 'name'),
            [
                'prompt'=>'Select Emirates',
                'onChange'=>'
                    $.post( "index.php?r=stores/list&id='.'"+$(this).val(),function( data ){
                    $( "select#promotions-store_id" ).html( data );
                });'
            ]); ?>

    <?= $form->field($model, 'store_id')->dropDownList(ArrayHelper::map(\backend\models\Stores::find()->all(), 'id', 'name'),['prompt'=>'select store']) ?>

    <?= $form->field($model, 'letter')->fileInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

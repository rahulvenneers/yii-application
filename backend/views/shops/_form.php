<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Shops */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shops-form">

    <?php $form = ActiveForm::begin(); ?>
    
     <?= $form->field($model, 'brand_id')->dropDownList(ArrayHelper::map(\backend\models\Brands::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'emirates_id')->dropDownList(ArrayHelper::map(\backend\models\Emirates::find()->all(), 'id', 'name'),
            [
                'prompt'=>'Select Emirates',
                'onChange'=>'
                    $.post( "index.php?r=stores/list&id='.'"+$(this).val(),function( data ){
                    $( "select#shops-store_id" ).html( data );
                });'
            ]); ?>

    <?= $form->field($model, 'store_id')->dropDownList(ArrayHelper::map(\backend\models\Stores::find()->all(), 'id', 'name'),['prompt'=>'select store']) ?>

   <?= $form->field($model, 'contact_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email_id')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

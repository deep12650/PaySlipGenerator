<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\EmployeeProfile;
use kartik\date\DatePicker;
use kartik\money\MaskMoney;

/* @var $this yii\web\View */
/* @var $model frontend\models\EmployeePay */
/* @var $form yii\widgets\ActiveForm */

//print_r($employee);
//die();
?>

<div class="employee-pay-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php if(isset($_GET['id'])){ ?>
    <?= $form->field($model, 'employeeId')->dropDownList($employee, ['readonly'=>'readonly'])->label('Employee') ?>

    <?php }else{ ?>

    <?= $form->field($model, 'employeeId')->dropDownList($employee,['prompt'=>'Select Employee..']) ?>
    
    <?php } ?>

    <?= $form->field($model, 'payStartDate')->widget(DatePicker::classname(), [
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]) ?>

    <?= $form->field($model, 'grossAnnualIncome')->widget(MaskMoney::classname(), [
        'pluginOptions' => [
            'prefix' => '$ ',
            'allowNegative' => false
        ]
    ]) ?>

    <?= $form->field($model, 'super')->textInput(['maxlength' => true])->label('Super (%)') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

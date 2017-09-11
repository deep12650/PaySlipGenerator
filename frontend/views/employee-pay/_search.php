<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\EmployeePaySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-pay-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'payId') ?>

    <?= $form->field($model, 'employeeId') ?>

    <?= $form->field($model, 'payPeriodMonth') ?>

    <?= $form->field($model, 'payStartDate') ?>

    <?= $form->field($model, 'payEndDate') ?>

    <?php // echo $form->field($model, 'incomeTaxRate') ?>

    <?php // echo $form->field($model, 'grossAnnualIncome') ?>

    <?php // echo $form->field($model, 'grossIncome') ?>

    <?php // echo $form->field($model, 'super') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

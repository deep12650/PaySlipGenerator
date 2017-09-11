<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\IncomeTaxSlab */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="income-tax-slab-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'minimumCap')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maximumCap')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'incomeTaxRate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'applyRateValue')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

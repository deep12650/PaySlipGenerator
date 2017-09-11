<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CsvImportSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="csv-import-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'csvId') ?>

    <?= $form->field($model, 'csvFileName') ?>

    <?= $form->field($model, 'totalRecords') ?>

    <?= $form->field($model, 'processRecords') ?>

    <?= $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model frontend\models\CsvImport */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="csv-import-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($upload, 'file')->widget(FileInput::classname(), [
        'pluginOptions' => [
            'showPreview' => false,
            'showCaption' => true,
            'showRemove' => true,
            'showUpload' => false
        ]
    ]); ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Upload' : 'Upload', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\CsvImport */

$this->title = 'Create Csv Import';
$this->params['breadcrumbs'][] = ['label' => 'Csv Imports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- 
        ================================================== 
            Global Page Section Start
        ================================================== -->
        <section class="global-page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">
                            <h2>Bulk Import</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="/">
                                        <i class="ion-ios-home"></i>
                                        Home
                                    </a>
                                </li>
                                <li class="active">CSV Upload</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>   
        </section><!--/#Page header-->
         <section id="service-page" class="pages service-page">
            <div class="container">
                <div class="row">
                    <div class="csv-import-create">
                        <?= $this->render('_form', [
                            'model' => $model,
                            'upload'=>$upload
                        ]) ?>

                    </div>
            </div>
        </div>
</section>
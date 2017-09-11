<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CsvImportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Csv Imports';
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
                            <h2>Uploaded CSV</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="/">
                                        <i class="ion-ios-home"></i>
                                        Home
                                    </a>
                                </li>
                                <li class="active"> CSV</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>   
        </section><!--/#Page header-->
         <section id="service-page" class="pages service-page">
            <div class="container">
                <div class="row">
<div class="csv-import-index">

    <p>
        <?= Html::a('Upload Csv', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'csvFileName',
            'totalRecords',
            'processRecords',
            'status',
            'timestamp',
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
                </div>
            </div>
         </section>

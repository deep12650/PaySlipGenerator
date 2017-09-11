<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\EmployeePaySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employee Pays';
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
                            <h2>Payslips</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="/">
                                        <i class="ion-ios-home"></i>
                                        Home
                                    </a>
                                </li>
                                <li class="active">Payslip</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>   
        </section><!--/#Page header-->
         <section id="service-page" class="pages service-page">
            <div class="container">
                <div class="row">
                    <div class="employee-pay-index">
                    <p>
                        <?= Html::a('Generate Payslip', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>
                    <?php    $gridColumns = [
                                 'employeeId',
                            [
                                'attribute'=> 'Employee Name',
                                'value'=> function ($model) {
                                            return $model->employee->firstName.' '.$model->employee->lastName;
                                          }
                            ],
                            [
                                'attribute'=> 'payPeriodMonth',
                                'value'=> function ($model) {
                                            return date('F', strtotime($model->payStartDate));
                                          }
                            ],
                            'grossIncome',
                            [
                                'attribute'=> 'incomeTax',
                                'value'=> function ($model) {
                                            return round(($model->incomeTaxFixedRate + ($model->grossAnnualIncome - ($model->minimumCap - 1)) * $model->incomeTaxRate) / 12);
                                          }
                            ],
                            [
                                'attribute'=> 'netIncome',
                                'value'=> function ($model) {
                                            return round($model->grossIncome - $incomeCal);
                                          }
                            ],
                            [
                                'attribute'=> 'super',
                                'value'=> function ($model) {
                                            return round($model->grossIncome * ($model->super/100));
                                          }
                            ],
                    ]; ?>
                    <?= ExportMenu::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => $gridColumns
                    ]); ?>
                    <?=  \kartik\grid\GridView::widget([
                            'dataProvider' => $dataProvider,
                           // 'filterModel' => $searchModel,
                            'columns' => $gridColumns
                    ]); ?>
                </div>
            </div>
        </div>
</section>
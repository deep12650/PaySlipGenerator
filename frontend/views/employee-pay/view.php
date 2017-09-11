<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\EmployeePay */

$this->title = $model->payId;
$this->params['breadcrumbs'][] = ['label' => 'Employee Pays', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$incomeCal = round(($model->incomeTaxFixedRate + ($model->grossAnnualIncome - ($model->minimumCap - 1)) * $model->incomeTaxRate) / 12);
$netIncome = round($model->grossIncome - $incomeCal);
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
                            <h2>Employee Payslip</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="/">
                                        <i class="ion-ios-home"></i>
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="/employee-pay/index">
                                        Payslips
                                    </a>
                                </li>
                                <li class="active">Employee Payslip</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>   
        </section><!--/#Page header-->
         <section id="service-page" class="pages service-page">
            <div class="container">
                <div class="row">
<div class="employee-pay-view">

    <h1 class="text-center"><?= Html::encode('Payslip for '. date('F', strtotime($model->payStartDate))) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'payId',
            'employeeId',
            [
                'attribute' => 'Name',
                'value' => $model->employee->firstName.' '.$model->employee->lastName
                
            ],
            [
                'attribute' => 'payPeriod',
                'value' => date('F', strtotime($model->payStartDate))
                
            ],
            [
                'attribute' => 'grossIncome',
                'value' => round($model->grossIncome)
                
            ],
            [
                'attribute' => 'incomeTax',
                'value' => $incomeCal
            ],
            [
                'attribute' => 'NetIncome',
                'value' => $netIncome
            ],
            [
                'attribute' => 'Super',
                'value' => round($model->grossIncome * ($model->super/100))
            ],
        ],
    ]) ?>

</div>
</div>
</div>
</section>

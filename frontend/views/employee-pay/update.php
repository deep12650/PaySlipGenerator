<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\EmployeePay */

$this->title = 'Update Employee Pay: ' . $model->payId;
$this->params['breadcrumbs'][] = ['label' => 'Employee Pays', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->payId, 'url' => ['view', 'id' => $model->payId]];
$this->params['breadcrumbs'][] = 'Update';
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
                            <h2>Payslip Update</h2>
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
                                <li class="active">Update</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>   
        </section><!--/#Page header-->
         <section id="service-page" class="pages service-page">
            <div class="container">
                <div class="row">
<div class="employee-pay-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
</section>

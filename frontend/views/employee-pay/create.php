<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\EmployeePay */

$this->title = 'Create Employee Pay';
$this->params['breadcrumbs'][] = ['label' => 'Employee Pays', 'url' => ['index']];
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
                            <h2>Generate Payslip</h2>
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
                                <li class="active">Generate Payslip</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>   
        </section><!--/#Page header-->
         <section id="service-page" class="pages service-page">
            <div class="container">
                <div class="row">
                <h2 class="section-heading text-center">Generate Payslip <?= isset($_GET['id']) ? ': '.$_GET['id']: ''; ?></h2>
<div class="employee-pay-create">

    <?= $this->render('_form', [
        'model' => $model,
        'employee' =>$employee
    ]) ?>

</div>
</div>
</div>
</section>

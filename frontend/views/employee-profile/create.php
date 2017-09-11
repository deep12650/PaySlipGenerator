<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\EmployeeProfile */

$this->title = 'Create Employee Profile';
$this->params['breadcrumbs'][] = ['label' => 'Employee Profiles', 'url' => ['index']];
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
                            <h2>Employee Registration</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="/">
                                        <i class="ion-ios-home"></i>
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="/employee-profile/index">
                                        Employee
                                    </a>
                                </li>
                                <li class="active">New Employee</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>   
        </section><!--/#Page header-->
         <section id="service-page" class="pages service-page">
            <div class="container">
                <div class="row">
<div class="employee-profile-create">

    <?= $this->render('_form', [
        'model' => $model,
        'employee' => $employee
    ]) ?>

</div>
</div>
</div>
</section>

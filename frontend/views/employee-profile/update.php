<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\EmployeeProfile */

$this->title = 'Update Employee Profile: ' . $model->employeeId;
$this->params['breadcrumbs'][] = ['label' => 'Employee Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->employeeId, 'url' => ['view', 'id' => $model->employeeId]];
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
                            <h2>Employee Update</h2>
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
<div class="employee-profile-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
</section>

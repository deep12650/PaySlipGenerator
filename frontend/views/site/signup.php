<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
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
                            <h2><?= Html::encode($this->title) ?></h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="/">
                                        <i class="ion-ios-home"></i>
                                        Home
                                    </a>
                                </li>
                                <li class="active"><?= Html::encode($this->title) ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>   
        </section><!--/#Page header-->
         <section id="service-page" class="pages service-page">
            <div class="container">
                <div class="row">
                        <div class="site-signup center_div">
                            

                            <p>Please fill out the following fields to signup:</p>

                            <div class="row">
                                <div class="col-lg-12">
                                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                                        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                                        <?= $form->field($model, 'email') ?>

                                        <?= $form->field($model, 'password')->passwordInput() ?>

                                        <div class="form-group">
                                            <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                                        </div>

                                    <?php ActiveForm::end(); ?>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
         </section>

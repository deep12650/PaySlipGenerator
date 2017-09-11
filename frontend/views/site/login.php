<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
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
                            <h2>Sign In</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="/">
                                        <i class="ion-ios-home"></i>
                                        Home
                                    </a>
                                </li>
                                <li class="active">Login</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>   
        </section><!--/#Page header-->
         <section id="service-page" class="pages service-page">
            <div class="container">
                <div class="row">
                    <div class="site-login center_div">
                        <h1><?= Html::encode($this->title) ?></h1>

                        <p>Please fill out the following fields to login:</p>

                        <div class="row">
                            <div class="col-lg-12">
                                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                                    <?= $form->field($model, 'password')->passwordInput() ?>

                                    <?= $form->field($model, 'rememberMe')->checkbox() ?>

                                    <div style="color:#999;margin:1em 0">
                                        If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                                    </div>

                                    <div class="form-group">
                                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                                    </div>

                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </section>
        

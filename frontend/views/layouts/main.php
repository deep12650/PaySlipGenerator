<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <script src="https://use.fontawesome.com/ce98b328bf.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
 <!--
        ==================================================
        Header Section Start
        ================================================== -->
        <header id="top-bar" class="navbar-fixed-top animated-header">
            <div class="container">
                <div class="navbar-header">
                    <!-- responsive nav button -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <!-- /responsive nav button -->
                    
                    <!-- logo -->
                    <div class="navbar-brand">
                        <a href="/" >
                            <img src="../img/myob_logo.png" title="MYOB Developer Logo" alt="MYOB Payslip" />
                        </a>
                    </div>
                    <!-- /logo -->
                </div>
                <!-- main menu -->
                <nav class="collapse navbar-collapse navbar-right" role="navigation">
                    <div class="main-menu">
                        <ul class="nav navbar-nav navbar-right">
                            <?php if(Yii::$app->user->isGuest) { ?>
                                <li><a href="/site/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                                <li><a href="/site/signup"><span class="glyphicon glyphicon-record"></span> Registration</a></li>
                            <?php }else { ?>
                                <li><a href="/employee-profile/">Add Employee</a></li>
                                <li><a href="/employee-pay/">Generate Payslip</a></li>
                                <li><a href="/csv-import/">Bulk Import</a></li>
                                <li><a href="/site/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </nav>
                <!-- /main nav -->
            </div>
        </header>
<?= Alert::widget() ?>
<?= $content ?>
 <!--
==================================================
Footer Section Start
================================================== -->
<footer id="footer">
    <div class="container">
        <div class="col-md-8">
            <p class="copyright">Copyright: <span>2017</span> . Design and Developed by <a href="https://deepswaroopsachan.com">Deep Swaroop Sachan</a></p>
        </div>
        <div class="col-md-4">
            <!-- Social Media -->
            <ul class="social">
                <li>
                    <a href="https://www.facebook.com/MYOB" class="Facebook">
                        <i class="ion-social-facebook"></i>
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/MYOB" class="Twitter">
                        <i class="ion-social-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="http://www.linkedin.com/company/myob" class="Linkedin">
                        <i class="ion-social-linkedin"></i>
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/myobteam/" class="Google Plus">
                        <i class="ion-social-instagram"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer> <!-- /#footer -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

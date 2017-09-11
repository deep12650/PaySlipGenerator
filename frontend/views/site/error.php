<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
 <section class="moduler wrapper_404">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <h1 class="wow fadeInUp animated cd-headline slide" data-wow-delay=".4s" ><?= Html::encode($this->title) ?></h1>
                            <h2 class="wow fadeInUp animated" data-wow-delay=".6s"><?= nl2br(Html::encode($message)) ?></h2>
                            <p class="wow fadeInUp animated" data-wow-delay=".9s">The page you are looking for was moved, removed, renamed or might never existed.</p>
                            <a href="/" class="btn btn-dafault btn-home wow fadeInUp animated" data-wow-delay="1.1s">Go Home</a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
 <!--
            ==================================================
            Call To Action Section Start
            ================================================== -->
            <section id="call-to-action">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="block">
                                <h2 class="title wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">SO WHAT YOU THINK ?</h1>
                                <p class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration="500ms">Lets join us. We will do something great.</p>
                                <a href="/site/contact" class="btn btn-default btn-contact wow fadeInDown" data-wow-delay=".7s" data-wow-duration="500ms">Contact With Me</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>

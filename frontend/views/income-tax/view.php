<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\IncomeTaxSlab */

$this->title = $model->incomeTaxSlabId;
$this->params['breadcrumbs'][] = ['label' => 'Income Tax Slabs', 'url' => ['index']];
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
<div class="income-tax-slab-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->incomeTaxSlabId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->incomeTaxSlabId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'incomeTaxSlabId',
            'minimumCap',
            'maximumCap',
            'incomeTaxRate',
            'applyRateValue',
        ],
    ]) ?>

</div>
</div>
</div>
</section>

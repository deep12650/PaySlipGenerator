<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\IncomeTaxSlab */

$this->title = 'Create Income Tax Slab';
$this->params['breadcrumbs'][] = ['label' => 'Income Tax Slabs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="income-tax-slab-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

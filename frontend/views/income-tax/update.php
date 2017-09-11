<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\IncomeTaxSlab */

$this->title = 'Update Income Tax Slab: ' . $model->incomeTaxSlabId;
$this->params['breadcrumbs'][] = ['label' => 'Income Tax Slabs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->incomeTaxSlabId, 'url' => ['view', 'id' => $model->incomeTaxSlabId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section class="features bg-secondary" id="features">
      <div class="container">
<div class="income-tax-slab-index">
<div class="income-tax-slab-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
</section>
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Income Tax Slabs';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="features bg-secondary" id="features">
      <div class="container">
<div class="income-tax-slab-index">

    <h1><?= Html::encode($this->title) ?></h1>

   <!--  <p>
        <?= Html::a('Create Income Tax Slab', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'incomeTaxSlabId',
            'minimumCap',
            'maximumCap',
            'incomeTaxRate',
            'applyRateValue',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>
</div>
</section>

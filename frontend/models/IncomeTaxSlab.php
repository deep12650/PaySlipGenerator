<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "income_tax_slab".
 *
 * @property integer $incomeTaxSlabId
 * @property string $minimumCap
 * @property string $maximumCap
 * @property string $incomeTaxRate
 * @property string $applyRateValue
 */
class IncomeTaxSlab extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'income_tax_slab';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['minimumCap', 'maximumCap', 'incomeTaxRate', 'applyRateValue'], 'required'],
            [['minimumCap', 'maximumCap', 'incomeTaxRate', 'applyRateValue'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'incomeTaxSlabId' => 'Income Tax Slab ID',
            'minimumCap' => 'Minimum Cap',
            'maximumCap' => 'Maximum Cap',
            'incomeTaxRate' => 'Income Tax Rate',
            'applyRateValue' => 'Applied Rate Value',
        ];
    }
}

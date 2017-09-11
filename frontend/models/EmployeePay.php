<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "employee_pay".
 *
 * @property integer $payId
 * @property string $employeeId
 * @property integer $payPeriodMonth
 * @property string $payStartDate
 * @property string $payEndDate
 * @property string $minimumCap
 * @property string $maximumCap
 * @property string $applyValueRate
 * @property string $incomeTaxFixedRate
 * @property string $incomeTaxRate
 * @property string $grossAnnualIncome
 * @property string $grossIncome
 * @property string $super
 * @property integer $status
 *
 * @property EmployeeProfile $employee
 */
class EmployeePay extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee_pay';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employeeId', 'payPeriodMonth', 'payStartDate', 'payEndDate', 'minimumCap', 'maximumCap', 'applyValueRate', 'incomeTaxFixedRate', 'incomeTaxRate', 'grossAnnualIncome', 'grossIncome', 'super', 'status'], 'required'],
            [['payPeriodMonth', 'status'], 'integer'],
            [['payStartDate', 'payEndDate'], 'safe'],
            [['minimumCap', 'maximumCap', 'applyValueRate', 'incomeTaxFixedRate', 'incomeTaxRate', 'grossAnnualIncome', 'grossIncome', 'super'], 'number'],
            [['employeeId'], 'string', 'max' => 10],
            [['employeeId'], 'exist', 'skipOnError' => true, 'targetClass' => EmployeeProfile::className(), 'targetAttribute' => ['employeeId' => 'employeeId']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'payId' => 'Pay ID',
            'employeeId' => 'Employee ID',
            'payPeriodMonth' => 'Pay Period Month',
            'payStartDate' => 'Pay Start Date',
            'payEndDate' => 'Pay End Date',
            'minimumCap' => 'Minimum Cap',
            'maximumCap' => 'Maximum Cap',
            'applyValueRate' => 'Apply Value Rate',
            'incomeTaxFixedRate' => 'Income Tax Fixed Rate',
            'incomeTaxRate' => 'Income Tax Rate',
            'grossAnnualIncome' => 'Gross Annual Income',
            'grossIncome' => 'Gross Income',
            'super' => 'Super',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(EmployeeProfile::className(), ['employeeId' => 'employeeId']);
    }
}

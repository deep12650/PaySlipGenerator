<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "employee_profile".
 *
 * @property string $employeeId
 * @property string $firstName
 * @property string $lastName
 *
 * @property EmployeePay[] $employeePays
 */
class EmployeeProfile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee_profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employeeId', 'firstName', 'lastName'], 'required'],
            [['employeeId'], 'string', 'max' => 10],
            [['firstName', 'lastName'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'employeeId' => 'Employee ID',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeePays()
    {
        return $this->hasMany(EmployeePay::className(), ['employeeId' => 'employeeId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getFullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}

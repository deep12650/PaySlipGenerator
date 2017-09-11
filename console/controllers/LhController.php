<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace console\controllers;
ini_set('memory_limit', '-1');
set_time_limit(43200);

use Yii;
use yii\console\Controller;
use yii\console\Exception;

class LhController extends Controller {
    
    public $id;
    
    public function options()
    {
        return ['id'];
    }

    public function actionIndex() {
        
        $model = \frontend\models\CsvImport::findOne(['csvId'=>$this->id]);
        $inputFile =\Yii::getAlias('@frontend').'/web'.$model->csvFileName;
            try{
                $inputFileType = \PHPExcel_IOFactory::identify($inputFile);
                $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFile);
            } catch (Exception $e) {
                die('Error');
            }
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
            $i = 0;
            for($row=1; $row <= $highestRow; $row++)
            {
                $rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row,NULL,TRUE,FALSE);
                if($row==0)
                {
                    continue;
                }
                if(empty($rowData[0][0])){
                    break;
                }
                $explode = explode('-',$rowData[0][5]);
                $payStartDate = date('Y-m-d', strtotime($explode[0]));
                $month = date('m', strtotime($payStartDate));
                $endDate = date("Y-m-t", strtotime($payStartDate));
                $incomeTaxSlabs = \frontend\models\IncomeTaxSlab::find()->all();
                $monthlySalary = $rowData[0][3] /12;
                if(is_float($monthlySalary)) {
                    $monthlySalary = round($monthlySalary);
                }
                foreach($incomeTaxSlabs as $key=>$value){
                    if(($value->minimumCap<= $rowData[0][3] && $value->maximumCap >= $rowData[0][3])|| $value->maximumCap == 0){
                        $incomeTaxRate = ($value->incomeTaxRate)/100;
                        $applyValueRate = $value->applyRateValue;
                        $minimumCap = $value->minimumCap;
                        $maximumCap = $value->maximumCap;
                        $incomeTaxFixedRate = $value->incomeTaxFixedRate;
                        break;
                    }
                }
                $employee = \frontend\models\EmployeeProfile::findOne(['employeeId'=>$rowData[0][0]]);
                if(!$employee){
                    $employee = new \frontend\models\EmployeeProfile();
                    $employee->employeeId = $rowData[0][0];
                    $employee->firstName = $rowData[0][1];
                    $employee->lastName = $rowData[0][2];
                    $employee->save();
                }
                $import = new \frontend\models\EmployeePay();
                $import->employeeId = $rowData[0][0];
                $import->payPeriodMonth = $month;
                $import->payStartDate = $payStartDate;
                $import->payEndDate = $endDate;
                $import->minimumCap = $minimumCap;
                $import->maximumCap = $maximumCap;
                $import->applyValueRate = $applyValueRate;
                $import->incomeTaxFixedRate = $incomeTaxFixedRate;
                $import->incomeTaxRate = $incomeTaxRate;
                $import->grossAnnualIncome = $rowData[0][3];
                $import->grossIncome = $monthlySalary;
                $import->super = preg_replace('/[^\p{L}\p{N}\s]/u', '', $rowData[0][4]);
                $import->status = 0;
                if($import->save()){
                    if($model->totalRecords == $row){
                        $model->processRecords = $row;
                        $model->status = 1;
                        $model->save(false);
                    }
                    $i++;
                    
                }else{
                    $model->processRecords = $i;
                    $model->save(false);
                }
            }

    }
}
<?php

namespace frontend\controllers;

use Yii;
use frontend\models\EmployeePay;
use frontend\models\EmployeePaySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use frontend\models\EmployeeProfile;

/**
 * EmployeePayController implements the CRUD actions for EmployeePay model.
 */
class EmployeePayController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all EmployeePay models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmployeePaySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EmployeePay model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = EmployeePay::find()->joinWith('employee')->where(['payId'=>$id])->one();
        return $this->render('view', [
            'model' => $model
        ]);
    }

    /**
     * Creates a new EmployeePay model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EmployeePay();

        if(isset($_GET['id'])){
            $employee = EmployeeProfile::find()->where(['employeeId'=>$_GET['id']])->all();
        }else{
            $employee = EmployeeProfile::find()->all();
        }
        $employeeMap = ArrayHelper::map($employee, 'employeeId', function ($employee, $defaultValue) {
            return $employee->getFullName();
        });
        
        if (\Yii::$app->request->post()) {
            $request = \Yii::$app->request->post('EmployeePay');
            $month = date('m', strtotime($request['payStartDate']));
            $endDate = date("Y-m-t", strtotime($request['payStartDate']));
            $incomeTaxSlabs = \frontend\models\IncomeTaxSlab::find()->all();
            $monthlySalary = $request['grossAnnualIncome'] /12;
            if(is_float($monthlySalary)) {
                $monthlySalary = round($monthlySalary);
            }
            foreach($incomeTaxSlabs as $key=>$value){
                if(($value->minimumCap<= $request['grossAnnualIncome'] && $value->maximumCap >= $request['grossAnnualIncome'])|| $value->maximumCap == 0){
                    $incomeTaxRate = ($value->incomeTaxRate)/100;
                    $applyValueRate = $value->applyRateValue;
                    $minimumCap = $value->minimumCap;
                    $maximumCap = $value->maximumCap;
                    $incomeTaxFixedRate = $value->incomeTaxFixedRate;
                    break;
                }
            }
            $model->employeeId = $request['employeeId'];
            $model->payPeriodMonth = $month;
            $model->payStartDate = $request['payStartDate'];
            $model->payEndDate = $endDate;
            $model->minimumCap = $minimumCap;
            $model->maximumCap = $maximumCap;
            $model->applyValueRate = $applyValueRate;
            $model->incomeTaxFixedRate = $incomeTaxFixedRate;
            $model->incomeTaxRate = $incomeTaxRate;
            $model->grossAnnualIncome = $request['grossAnnualIncome'];
            $model->grossIncome = $monthlySalary;
            $model->super = $request['super'];
            $model->status = 0;
            if($model->save()){
                \Yii::$app->session->setFlash('success', "Payslip has been generated");
                return $this->redirect(['view', 'id' => $model->payId]);
            }else{
                \Yii::$app->session->setFlash('error', "Something went wrong");
                return $this->redirect(Yii::$app->request->referrer);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'employee'=>$employeeMap
            ]);
        }
    }

    /**
     * Updates an existing EmployeePay model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->payId]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EmployeePay model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    

    /**
     * Finds the EmployeePay model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EmployeePay the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EmployeePay::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

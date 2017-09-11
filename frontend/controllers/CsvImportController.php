<?php

namespace frontend\controllers;

use Yii;
use frontend\models\CsvImport;
use frontend\models\CsvImportSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CsvImportController implements the CRUD actions for CsvImport model.
 */
class CsvImportController extends Controller
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
     * Lists all CsvImport models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CsvImportSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CsvImport model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CsvImport model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CsvImport();
        $upload = new \frontend\models\UploadForm();

        if (\Yii::$app->request->post()) {
            $upload->file = \yii\web\UploadedFile::getInstanceByName('UploadForm[file]');
            if($result=$upload->uploadmedia()){
                $path = '/Applications/MAMP/htdocs/myob/yii';
                $cmd = 'php '.$path.' lh --id='.$result;
                $this->execInBackground($cmd);
                \Yii::$app->session->setFlash('success', "Your request has been processed");
                return $this->redirect(Yii::$app->request->referrer);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'upload' => $upload
            ]);
        }
    }

    /**
     * Updates an existing CsvImport model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->csvId]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Execute background process.
     * if execution process will completed, You can check in reports sections.
     * @param integer $id
     * @return mixed
     */
    
    function execInBackground($cmd) { 
        if (substr(php_uname(), 0, 7) == "Windows"){ 
            pclose(popen("start /B ". $cmd, "r"));  
        } else { 
            exec($cmd . " > /dev/null &");   
        } 
    } 
    

    /**
     * Deletes an existing CsvImport model.
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
     * Finds the CsvImport model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CsvImport the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CsvImport::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

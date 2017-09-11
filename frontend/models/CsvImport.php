<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "csv_import".
 *
 * @property integer $csvId
 * @property string $csvFileName
 * @property integer $totalRecords
 * @property integer $processRecords
 * @property integer $status
 * @property string $timestamp
 */
class CsvImport extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'csv_import';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['csvFileName', 'totalRecords', 'status'], 'required'],
            [['totalRecords', 'processRecords', 'status'], 'integer'],
            [['timestamp'], 'safe'],
            [['csvFileName'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'csvId' => 'Csv ID',
            'csvFileName' => 'Csv File Name',
            'totalRecords' => 'Total Records',
            'processRecords' => 'Process Records',
            'status' => 'Status',
            'timestamp' => 'Timestamp',
        ];
    }
}

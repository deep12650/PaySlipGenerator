<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $file;

    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'csv'],
        ];
    }
    
    public function uploadmedia()
    {
            $filename = md5(time()).".".$this->file->extension;
            if($this->file->saveAs('uploads/csv/'.$filename)){
                $fp = file('uploads/csv/'.$filename);
                $file = new CsvImport();
                $file->csvFileName ='/uploads/csv/'.$filename;
                $file->totalRecords = count($fp);
                $file->status = 0;
                $data = $file->save(false) ? $file->csvId : null;
                return $data;
            }else{
             return false;  
            }
    }
}
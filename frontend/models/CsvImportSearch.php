<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\CsvImport;

/**
 * CsvImportSearch represents the model behind the search form about `frontend\models\CsvImport`.
 */
class CsvImportSearch extends CsvImport
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['csvId', 'totalRecords', 'processRecords', 'status'], 'integer'],
            [['csvFileName'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = CsvImport::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'csvId' => $this->csvId,
            'totalRecords' => $this->totalRecords,
            'processRecords' => $this->processRecords,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'csvFileName', $this->csvFileName]);

        return $dataProvider;
    }
}

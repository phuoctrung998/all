<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Mkt;

/**
 * MktSearch represents the model behind the search form of `common\models\Mkt`.
 */
class MktSearch extends Mkt
{
    /**
     * {@inheritdoc}
     */
	public $begin_time;
	public $end_time; 
    public function rules()
    {
        return [
            [['id', 'member_id', 'action'], 'integer'],
            [['source', 'username', 'created_time', 'end_time', 'begin_time'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Mkt::find();

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
            'id' 				=> $this->id,
            'member_id' 		=> $this->member_id,
            'created_time' 		=> $this->created_time,
            'action' 			=> $this->action,
        ]);

        $query->andFilterWhere(['like', 'source', $this->source])
				->andFilterWhere(['like', 'username', $this->username]);

        return $dataProvider;
    }
}

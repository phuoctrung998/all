<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MinigameVongxoayPoint;

/**
 * MinigameVongxoayPointSearch represents the model behind the search form of `common\models\MinigameVongxoayPoint`.
 */
class MinigameVongxoayPointSearch extends MinigameVongxoayPoint
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'member_id', 'member_point'], 'integer'],
            [['flag', 'update_time'], 'safe'],
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
        $query = MinigameVongxoayPoint::find();

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
            'id' => $this->id,
            'member_id' => $this->member_id,
            'member_point' => $this->member_point,
            'update_time' => $this->update_time,
        ]);

        $query->andFilterWhere(['like', 'flag', $this->flag]);

        return $dataProvider;
    }
}

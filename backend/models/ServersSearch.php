<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Servers;

/**
 * ServersSearch represents the model behind the search form of `common\models\Servers`.
 */
class ServersSearch extends Servers
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['server_id', 'server_status', 'server_hot', 'server_promotion', 'server_is_timer'], 'integer'],
            [['server_index', 'server_name', 'server_slug', 'server_linklogingame', 'server_linkpayment', 'server_link1', 'server_link2', 'server_link3', 'server_timer', 'server_label'], 'safe'],
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
        $query = Servers::find();

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
            'server_id' => $this->server_id,
            'server_status' => $this->server_status,
            'server_hot' => $this->server_hot,
            'server_promotion' => $this->server_promotion,
            'server_is_timer' => $this->server_is_timer,
            'server_timer' => $this->server_timer,
        ]);

        $query->andFilterWhere(['like', 'server_index', $this->server_index])
            ->andFilterWhere(['like', 'server_name', $this->server_name])
            ->andFilterWhere(['like', 'server_slug', $this->server_slug])
            ->andFilterWhere(['like', 'server_linklogingame', $this->server_linklogingame])
            ->andFilterWhere(['like', 'server_linkpayment', $this->server_linkpayment])
            ->andFilterWhere(['like', 'server_link1', $this->server_link1])
            ->andFilterWhere(['like', 'server_link2', $this->server_link2])
            ->andFilterWhere(['like', 'server_link3', $this->server_link3])
            ->andFilterWhere(['like', 'server_label', $this->server_label]);

        return $dataProvider;
    }
}

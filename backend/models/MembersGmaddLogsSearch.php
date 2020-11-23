<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MembersGmaddLogs;

/**
 * MembersGmaddLogsSearch represents the model behind the search form of `common\models\MembersGmaddLogs`.
 */
class MembersGmaddLogsSearch extends MembersGmaddLogs
{
    /**
     * {@inheritdoc}
     */
	
    public function rules()
    {
        return [
            [['id', 'member_gold', 'server_index'], 'integer'],
            [['member_username', 'description', 'create_time'], 'safe'],
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
        $query = MembersGmaddLogs::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort'	=> ['defaultOrder' =>['id' => SORT_DESC]]
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
            'member_gold' => $this->member_gold,
            'server_index' => $this->server_index,
            'create_time' => $this->create_time,
        ]);

        $query->andFilterWhere(['like', 'member_username', $this->member_username])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}

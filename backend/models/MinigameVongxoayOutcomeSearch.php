<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MinigameVongxoayOutcome;

/**
 * MinigameVongxoayOutcomeSearch represents the model behind the search form of `common\models\MinigameVongxoayOutcome`.
 */
class MinigameVongxoayOutcomeSearch extends MinigameVongxoayOutcome
{
    
	public $member_username;
	/**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'member_id', 'flag_win', 'reward_id', 'point'], 'integer'],
            [['create_time','member_username'], 'safe'],
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
        $query = MinigameVongxoayOutcome::find();
		$query->joinWith('members');
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
            'flag_win' => $this->flag_win,
            'reward_id' => $this->reward_id,
            'point' => $this->point,
            'create_time' => $this->create_time,
        ]);
		
		$query->andFilterWhere(['like', 'members.member_username', trim($this->member_username)]);
		$query->joinWith(['members'=>function ($query) {
			$query->where('members.member_username LIKE "%' . $this->member_username . '%" ');
		}]); 

        return $dataProvider;
    }
}

<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MembersWalletLogs;

/**
 * MembersWalletLogsSearch represents the model behind the search form of `common\models\MembersWalletLogs`.
 */
class MembersWalletLogsSearch extends MembersWalletLogs
{
    /**
     * {@inheritdoc}
     */
	public $member_username;
	
    public function rules()
    {
        return [
            [['id', 'member_id', 'trans_id', 'xu', 'status', 'type', 'is_gm'], 'integer'],
            [['desc', 'gm_description', 'create_time','member_username'], 'safe'],
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
        $query = MembersWalletLogs::find();
		$query->joinWith('members');
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
            'member_id' => $this->member_id,
            'trans_id' => $this->trans_id,
            'xu' => $this->xu,
            'status' => $this->status,
            'type' => $this->type,
            'is_gm' => $this->is_gm,
            'create_time' => $this->create_time,
        ]);
		
        $query->andFilterWhere(['like', 'desc', $this->desc])
            ->andFilterWhere(['like', 'gm_description', $this->gm_description])
			->andFilterWhere(['like', 'members.member_username', trim($this->member_username)]);
		
		$query->joinWith(['members'=>function ($query) {
			$query->where('members.member_username LIKE "%' . $this->member_username . '%" ');
		}]);
        return $dataProvider;
    }
}

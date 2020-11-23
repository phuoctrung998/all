<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Transaction;

/**
 * TransactionSearch represents the model behind the search form of `common\models\Transaction`.
 */
class TransactionSearch extends Transaction
{
	
	public $member_username;
	public $begin_time;
	public $end_time;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['trans_id', 'member_id', 'trans_money', 'trans_moneyreal', 'trans_status', 'trans_compensation', 'trans_loainap'], 'integer'],
            [['server_id', 'trans_type', 'trans_code', 'trans_serial', 'trans_time', 'trans_desc', 'trans_compensation_time', 'trans_partner', 'trans_devices','member_username','begin_time','end_time'], 'safe'],
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
        $query = Transaction::find();
		$query->joinWith('members');
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort'	=> ['defaultOrder' =>['trans_id' => SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
			
        }
		
        // grid filtering conditions
        $query->andFilterWhere([
            'trans_id' 			=> $this->trans_id,
            'member_id' 		=> $this->member_id,
            'trans_money' 		=> $this->trans_money,
            'trans_moneyreal' 	=> $this->trans_moneyreal,
            'trans_time' 		=> $this->trans_time,
            'trans_status' 				=> $this->trans_status,
            'trans_compensation' 		=> $this->trans_compensation,
            'trans_compensation_time' 	=> $this->trans_compensation_time,
            'trans_loainap' 			=> $this->trans_loainap,
        ]);

        $query->andFilterWhere(['like', 'server_id', $this->server_id])
            ->andFilterWhere(['like', 'trans_type', $this->trans_type])
            ->andFilterWhere(['like', 'trans_code', $this->trans_code])
            ->andFilterWhere(['like', 'trans_serial', $this->trans_serial])
            ->andFilterWhere(['like', 'trans_desc', $this->trans_desc])
            ->andFilterWhere(['like', 'trans_partner', $this->trans_partner])
            ->andFilterWhere(['like', 'trans_devices', $this->trans_devices])
			->andFilterWhere(['like', 'members.member_username', trim($this->member_username)]);
		
		if(!empty($this->begin_time)){
			$query->andFilterWhere(['between', 'DATE(trans_time)', $this->begin_time, $this->end_time]);
		}	
		
		$query->joinWith(['members'=>function ($query) {
			$query->where('members.member_username LIKE "%' . $this->member_username . '%" ');
		}]);
		
		//echo $query->createCommand()->getRawSql();
        return $dataProvider;
    }
}

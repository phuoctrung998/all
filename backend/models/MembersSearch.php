<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Members;

/**
 * MembersSearch represents the model behind the search form of `common\models\Members`.
 */
class MembersSearch extends Members
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_id', 'member_authentication', 'member_block', 'member_getgiftcode', 'member_xu', 'member_is_gift', 'member_2usd', 'member_ogames_id'], 'integer'],
            [['member_code', 'member_username', 'member_password', 'member_fullname', 'member_email', 'member_phone', 'member_birthday', 'member_registerday', 'member_codeauthencation', 'member_description', 'member_ip', 'member_coderesetpass', 'member_giftcode', 'member_logintime', 'member_loginserverslug', 'member_gift', 'member_facebook_url'], 'safe'],
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
        $query = Members::find();

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
            'member_id' => $this->member_id,
            'member_birthday' => $this->member_birthday,
            'member_registerday' => $this->member_registerday,
            'member_authentication' => $this->member_authentication,
            'member_block' => $this->member_block,
            'member_getgiftcode' => $this->member_getgiftcode,
            'member_logintime' => $this->member_logintime,
            'member_xu' => $this->member_xu,
            'member_is_gift' => $this->member_is_gift,
            'member_2usd' => $this->member_2usd,
            'member_ogames_id' => $this->member_ogames_id,
        ]);

        $query->andFilterWhere(['like', 'member_code', $this->member_code])
            ->andFilterWhere(['like', 'member_username', $this->member_username])
            ->andFilterWhere(['like', 'member_password', $this->member_password])
            ->andFilterWhere(['like', 'member_fullname', $this->member_fullname])
            ->andFilterWhere(['like', 'member_email', $this->member_email])
            ->andFilterWhere(['like', 'member_phone', $this->member_phone])
            ->andFilterWhere(['like', 'member_codeauthencation', $this->member_codeauthencation])
            ->andFilterWhere(['like', 'member_description', $this->member_description])
            ->andFilterWhere(['like', 'member_ip', $this->member_ip])
            ->andFilterWhere(['like', 'member_coderesetpass', $this->member_coderesetpass])
            ->andFilterWhere(['like', 'member_giftcode', $this->member_giftcode])
            ->andFilterWhere(['like', 'member_loginserverslug', $this->member_loginserverslug])
            ->andFilterWhere(['like', 'member_gift', $this->member_gift])
            ->andFilterWhere(['like', 'member_facebook_url', $this->member_facebook_url]);

        return $dataProvider;
    }
}

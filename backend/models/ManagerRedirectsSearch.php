<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ManagerRedirects;

/**
 * ManagerRedirectsSearch represents the model behind the search form of `common\models\ManagerRedirects`.
 */
class ManagerRedirectsSearch extends ManagerRedirects
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'teaser_login_flag_newserver', 'teaser_login_flag_playnearserver', 'teaser_login_flag_customurl', 'teaser_register_flag_newserver', 'teaser_register_flag_customurl', 'homepage_flag_login_newserver', 'homepage_flag_login_playnearserver', 'homepage_login_flag_customurl', 'homepage_register_flag_newserver', 'homepage_register_flag_customurl'], 'integer'],
            [['teaser_login_customurl', 'teaser_register_customurl', 'homepage_login_customurl', 'homepage_register_customurl'], 'safe'],
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
        $query = ManagerRedirects::find();

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
            'teaser_login_flag_newserver' => $this->teaser_login_flag_newserver,
            'teaser_login_flag_playnearserver' => $this->teaser_login_flag_playnearserver,
            'teaser_login_flag_customurl' => $this->teaser_login_flag_customurl,
            'teaser_register_flag_newserver' => $this->teaser_register_flag_newserver,
            'teaser_register_flag_customurl' => $this->teaser_register_flag_customurl,
            'homepage_flag_login_newserver' => $this->homepage_flag_login_newserver,
            'homepage_flag_login_playnearserver' => $this->homepage_flag_login_playnearserver,
            'homepage_login_flag_customurl' => $this->homepage_login_flag_customurl,
            'homepage_register_flag_newserver' => $this->homepage_register_flag_newserver,
            'homepage_register_flag_customurl' => $this->homepage_register_flag_customurl,
        ]);

        $query->andFilterWhere(['like', 'teaser_login_customurl', $this->teaser_login_customurl])
            ->andFilterWhere(['like', 'teaser_register_customurl', $this->teaser_register_customurl])
            ->andFilterWhere(['like', 'homepage_login_customurl', $this->homepage_login_customurl])
            ->andFilterWhere(['like', 'homepage_register_customurl', $this->homepage_register_customurl]);

        return $dataProvider;
    }
}

<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Posts;

/**
 * PostsSearch represents the model behind the search form of `common\models\Posts`.
 */
class PostsSearch extends Posts
{
    /**
     * {@inheritdoc}
     */
	public $cat_name;
	
    public function rules()
    {
        return [
            [['post_id', 'post_related_id', 'is_timer'], 'integer'],
            [[
				'post_title', 
				'post_featured_image', 
				'post_author', 
				'post_content', 
				'post_datetime', 
				'post_slug', 
				'post_options', 
				'post_metakey', 
				'post_metadesc', 
				'cat_name', 
				'timer'], 'safe'],
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
		
        $query = Posts::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort'	=> ['defaultOrder' =>['post_id' => SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'post_id' => $this->post_id,
            'post_datetime' => $this->post_datetime,
            'post_options' => $this->post_options,
            'is_timer' => $this->is_timer,
            'timer' => $this->timer,
        ]);

        $query->andFilterWhere(['like', 'post_title', $this->post_title])
            ->andFilterWhere(['like', 'post_featured_image', $this->post_featured_image])
            ->andFilterWhere(['like', 'post_author', $this->post_author])
            ->andFilterWhere(['like', 'post_content', $this->post_content])
            ->andFilterWhere(['like', 'post_slug', $this->post_slug])
            ->andFilterWhere(['like', 'post_metakey', $this->post_metakey])
            ->andFilterWhere(['like', 'post_metadesc', $this->post_metadesc]);
		
		$query->joinWith(['categories'=>function ($query) {
			$query->where('categories.cat_name LIKE "%' . $this->cat_name . '%" ');
		}]);
		//echo $query->createCommand()->getRawSql();exit;
        return $dataProvider;
    }
}

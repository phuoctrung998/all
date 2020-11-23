<?php 
namespace frontend\controllers;

use Yii;
use yii\base\Model;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use frontend\models\NewsModel;
use common\models\Posts;
class NewsController extends Controller
{
	
	public function actionIndex()
	{
		
		return $this->render('index',[
			
		]);
	}
	
	public function actionCategory()
	{
		$model 				= new NewsModel();	
		$model->cate_slug 	= Yii::$app->request->get('slug');
		$result 			= $model->getCategoryBySlug();
		if(empty($result)){
			return $this->goHome();
		}
		
		/** DataProvider **/
		$pageSize 	= 12;
		$query 		= Posts::find()->where('post_cat_id = :post_cat_id',[
			'post_cat_id' => $result->cat_id
		]);
		
		$dataProvider = new ActiveDataProvider([
			'query'			=> $query,
			'pagination' 	=> [
				  'defaultPageSize' => $pageSize,
			 ],
			'sort'	=> ['defaultOrder' =>['post_id' => SORT_DESC]]
		]);
		/** End DataProvider **/
		$pages 				= new Pagination(['totalCount' => Posts::find()->where('post_cat_id = :post_cat_id',[
			'post_cat_id' => $result->cat_id
		])->count()]);
		$pages->defaultPageSize 	= $pageSize;
		
		
		return $this->render('category',[
			'dataProvider' 	=> $dataProvider,
			'pages'			=> $pages,
			'model'			=> $result
		]);
	}
	
	public function actionDetail(){
		
		$model 				= new NewsModel();	
		$model->post_slug 	= Yii::$app->request->get('slug');
		$result 			= $model->getPostBySlug();
		if(empty($result)){
			return $this->goHome();
		}
		$relatedPosts		= $model->getRelatedPosts($result->post_id);
		
		
		return $this->render('detail',[
			'model' 		=> $result,
			'relatedPosts'	=> $relatedPosts
		]);
	}
}
?>
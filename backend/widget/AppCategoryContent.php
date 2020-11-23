<?php 
namespace backend\widget;

use yii\base\Widget;
use Yii;
use common\models\AppsCategoryContents;
use common\models\Languages;
class AppCategoryContent extends Widget
{
	public $mode;
	public $cate_id;
	public function run()
	{
		$view 		= 'app-category-content';
		$dataRender = array();
		
		$languages 		= Languages::find()->all();
		$model  		= new AppsCategoryContents();
		$modelLanguages = new Languages();
		return $this->render($view,[
			'languages' 		=> $languages,
			'model'				=> $model,
			'modelLanguages'	=> $modelLanguages,
			'mode'				=> $this->mode,
			'cate_id'			=> $this->cate_id	
		]);
	}
}

?>
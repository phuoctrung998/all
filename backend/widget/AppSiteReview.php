<?php 
namespace backend\widget;

use yii\base\Widget;
use Yii;
use common\models\Apps;
use common\models\Languages;
class AppSiteReview extends Widget
{
	public $mode;
	public $app_id;
	public function run()
	{
		$view 		= 'app-site-review';
		$dataRender = array();
		
		$languages 		= Languages::find()->all();
		$modelApp  		= new Apps();
		$modelLanguages = new Languages();
		return $this->render($view,[
			'languages' 		=> $languages,
			'modelApp'			=> $modelApp,
			'modelLanguages'	=> $modelLanguages,
			'mode'				=> $this->mode,
			'app_id'			=> $this->app_id	
		]);
	}
}

?>
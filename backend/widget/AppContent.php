<?php 
namespace backend\widget;

use yii\base\Widget;
use Yii;
use common\models\Apps;
use common\models\Languages;
class AppContent extends Widget
{
	public $mode;
	public $app_id;
	public function run()
	{
		$view 		= 'app-content';
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
<?php 
namespace backend\widget;

use yii\base\Widget;
use Yii;
use common\models\Apps;
use common\models\Languages;
use common\models\AppsHeaderBottom;
class AppHeaderBottomContent extends Widget
{
	public $mode;
	public $apps_header_bottom_id;
	public function run()
	{
		$view 		= 'app-header-bottom-content';
		$dataRender = array();
		
		$languages 					= Languages::find()->all();
		$modelAppHeaderBottom  		= new AppsHeaderBottom();
		$modelLanguages = new Languages();
		return $this->render($view,[
			'languages' 		=> $languages,
			'modelApp'			=> $modelAppHeaderBottom,
			'modelLanguages'	=> $modelLanguages,
			'mode'				=> $this->mode,
			'apps_header_bottom_id'			=> $this->apps_header_bottom_id	
		]);
	}
}

?>
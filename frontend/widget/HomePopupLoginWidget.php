<?php 
namespace frontend\widget;

use yii\base\Widget;
use Yii;
use frontend\models\MinigameModel;
class HomePopupLoginWidget extends Widget
{
	public $member_id;
	public function run()
	{
		$view 			= 'home-popup-login';
		return $this->render($view,[
		
		]);
	}
}

?>
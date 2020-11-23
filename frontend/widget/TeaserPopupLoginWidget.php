<?php 
namespace frontend\widget;

use yii\base\Widget;
use Yii;
use frontend\models\MinigameModel;
class TeaserPopupLoginWidget extends Widget
{
	public $member_id;
	public function run()
	{
		$view 			= 'teaser-popup-login';
		return $this->render($view,[
		
		]);
	}
}

?>
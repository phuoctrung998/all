<?php 
namespace frontend\widget;

use yii\base\Widget;
use Yii;
use frontend\models\MinigameModel;
class TrieuHoiAnhHungWidget extends Widget
{
	public $member_id;
	public function run()
	{
		$view 			= 'trieuhoianhhung';
		$dataRender 	= array();
		$minigameModel 	= new MinigameModel();
		$num_luotchoi 	= 0;
		if(!empty($this->member_id)){
			$num_luotchoi = $minigameModel->countLuotTrieuHoiConLai($this->member_id);
		}
		
		return $this->render($view,[
			'num_luotchoi' => $num_luotchoi
		]);
	}
}

?>
<?php 
namespace frontend\widget;

use yii\base\Widget;
use Yii;
use frontend\models\MinigameVongXoayModel;
class MinigameVongXoayWidget extends Widget
{
	public $member_id;
	public function run()
	{
		$view 			= 'minigame-vongxoay';
		$dataRender 	= array();
		$minigameModel 		= new MinigameVongXoayModel();
		$num_luotchoi 	= 0;
		$member_point   = 0;
		if(!empty($this->member_id)){
			
			$num_luotchoi = $minigameModel->countLuotChoi($this->member_id);
			$result_member_point 	= $minigameModel->getDiemByMemberId($this->member_id);
			$member_point 			= $result_member_point;
		}
		
		return $this->render($view,[
			'num_luotchoi' => $num_luotchoi,
			'member_point' => $member_point
		]);
	}
}

?>
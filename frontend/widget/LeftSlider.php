<?php 
namespace frontend\widget;

use yii\base\Widget;
use Yii;
use frontend\models\NewsModel;
class LeftSlider extends Widget
{
	public function run()
	{
		$view = 'left-slider';
		$newsModel 	= new NewsModel();
		$results 	= $newsModel->getNewsByCategoryId(185);
		
		return $this->render($view,[
			'results' => $results,
		]);
	}
}

?>
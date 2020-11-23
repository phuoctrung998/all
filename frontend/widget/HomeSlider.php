<?php 
namespace frontend\widget;

use yii\base\Widget;
use Yii;
use frontend\models\NewsModel;
class HomeSlider extends Widget
{
	public function run()
	{
		$view = 'home-slider';
		$newsModel 	= new NewsModel();
		$results 	= $newsModel->getNewsByCategoryId(162);
		return $this->render($view,[
			'results' => $results,
		]);
	}
}

?>
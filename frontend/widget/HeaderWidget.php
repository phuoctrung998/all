<?php
namespace frontend\widget;

use yii\base\Widget;
use yii\helpers\Html;
use frontend\models\NewsModel;

class HeaderWidget extends Widget
{
    public function run()
	{
		$view = 'home-header';
		return $this->render($view,[
		
            ]);
    }
}

?>
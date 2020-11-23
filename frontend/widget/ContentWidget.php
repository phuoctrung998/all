<?php
namespace frontend\widget;

use yii\base\Widget;
use yii\helpers\Html;


class ContentWidget extends Widget
{
    public function run()
	{
		$view = 'home-content';
		return $this->render($view,[
		
            ]);
    }
}

?>
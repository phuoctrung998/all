<?php
namespace frontend\widget;

use yii\base\Widget;
use yii\helpers\Html;


class FooterWidget extends Widget
{
    public function run()
	{
		$view = 'home-footer';
		return $this->render($view,[
		
            ]);
    }
}

?>
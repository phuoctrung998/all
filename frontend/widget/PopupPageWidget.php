<?php
namespace frontend\widget;

use yii\base\Widget;
use yii\helpers\Html;


class PopupPageWidget extends Widget
{
    public function run()
	{
		$view = 'popup-page';
		return $this->render($view,[
		
            ]);
    }
}

?>
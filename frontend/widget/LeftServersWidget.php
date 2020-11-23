<?php 
namespace frontend\widget;
use yii\base\Widget;
use frontend\models\ServerModel;


class LeftServersWidget extends Widget
{
    public $view	 	= "left-servers";
    public function run()
    {
		$model 			= new ServerModel();
		$list_servers	= $model->getAllServersOrderByDesc();
		return $this->render($this->view,[
			'list_servers' => $list_servers
		]);
    }
    
}
?>
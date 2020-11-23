<?php 
namespace frontend\widget;
use yii\base\Widget;
use frontend\models\ServerModel;


class ListServersWidget extends Widget
{
    public $view	 	= "list-servers";
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
<?php 
namespace frontend\widget;
use yii\base\Widget;
use frontend\models\ServerModel;


class NewsHomeWidget extends Widget
{
    public $view	 	= "news-home";
    public function run()
    {
		$model 			= new ServerModel();
		$list_servers	= $model->getAllServers();
		return $this->render($this->view,[
			'list_servers' => $list_servers
		]);
    }
    
}
?>
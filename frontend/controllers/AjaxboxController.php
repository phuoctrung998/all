<?php 
namespace frontend\controllers;

use Yii;
use yii\base\Model;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use frontend\models\NewsModel;
use common\models\Posts;
class AjaxboxController extends Controller
{
	
	public function actionBoxSlider()
	{
		return $this->renderAjax('box-slider', [
			
		]);
	}
}
?>
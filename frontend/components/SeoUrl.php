<?php
namespace frontend\components;

use Yii;
use yii\web\UrlRuleInterface;
use common\models\UrlSlug;

class SeoUrl implements UrlRuleInterface
{
    /**
     * Parses the given request and returns the corresponding route and parameters.
     * @param \yii\web\UrlManager $manager the URL manager
     * @param \yii\web\Request $request the request component
     * @return array|boolean the parsing result. The route and the parameters are returned as an array.
     * If false, it means this rule cannot be used to parse this path info.
     */
    public function parseRequest($manager, $request)
    {
        
        $pathInfo = $request->getPathInfo();
        $parameters = $pathInfo;
        //parameters in the URL (category, subcategory, state, city, page)
        $params = [];
        $route = "";
        if($parameters !=='')
        {
            $modelUrlSlug = new UrlSlug();
            $dataSlug = $modelUrlSlug::find()->where("slug = :slug",["slug" =>$parameters])->one();
            if(count($dataSlug)>0)
            {
                if($dataSlug->params_id !="" && $dataSlug->params_id > 0)
                {
					$params['id'] = $dataSlug->params_id;
                }
                $route= $dataSlug->params_route;
            }
            else // URL NOT IN SLUG DATA XU LY CHUYEN VE 301
            {
				$pathInfoArray  = explode("/",$parameters);
				$pathInfoEnd    = end($pathInfoArray);
				$inPathInfoEnd  = explode("-",$pathInfoEnd);
				$idInfo         =  end($inPathInfoEnd);
			    $dataParameters = explode("/",$parameters); 
                if(count($dataParameters)>1)
                {
                    $route = $dataParameters[0].'/'.$dataParameters[1]; //route = module/action
                }
                
				//URL SEO WEBSITE CU
				$arrayParamsOld = array(
                    'tin-moi-nhat' => 'news/list',
                    'the-loai' => 'link/catalog',
                    'chi-tiet-tin' => 'news/detail'
                );
				
                
                $modelUrlSlug = new UrlSlug();
                $dataSlug = $modelUrlSlug::find()
                    ->where("params_route = :params_route",["params_route" =>$route]);
                if(isset($dataParameters[2]))
                {
                    $dataSlug->andWhere('params_id = :params_id',['params_id' => $dataParameters[2] ]);
                }
                
				/*
                $resultDataSlug = $dataSlug->one();
                if(count($resultDataSlug) > 0) // xu ly url google nhan co dang : https://taichua.com/link/detail/417
                {
                    $routeUrl = $route;
					$url = Yii::$app->urlManager->createUrl([$routeUrl,'id' => $dataParameters[2]]);
                    Yii::$app->response->redirect($url, 301);
					Yii::$app->end();
                }
                */
				//var_dump($pathInfoArray);exit;
				if(array_key_exists($pathInfoArray[0],$arrayParamsOld))
				{
					$routeUrl = $arrayParamsOld[$pathInfoArray[0]];
					$url = Yii::$app->urlManager->createUrl([$routeUrl,'id' => $idInfo]);
					Yii::$app->response->redirect($url, 301);
					Yii::$app->end();
				}
				elseif(count($pathInfoArray) == 1)
				{
					$routeUrl = "link/detail";
					$url = Yii::$app->urlManager->createUrl([$routeUrl,'id' => $idInfo]);
					Yii::$app->response->redirect($url, 301);
					Yii::$app->end();
				}
					
				//END URL SEO WEBSITE CU
                
                if(isset($dataParameters[2]))
                {
                    $params['id'] = $dataParameters[2];
                }
                
                
            }
           
        }
        else
        {
            $route = 'site/index';
        }
        return [$route, $params];
    }

    /**
     * Creates a URL according to the given route and parameters.
     * @param \yii\web\UrlManager $manager the URL manager
     * @param string $route the route. It should not have slashes at the beginning or the end.
     * @param array $params the parameters
     * @return string|boolean the created URL, or false if this rule cannot be used for creating this URL.
     */
    public function createUrl($manager, $route, $params)
    {
        if(isset($route))
        {   
            $params_id= "";
            $strParamId = "";
            if(array_key_exists('id',$params))
            {
                $params_id= $params['id'];
                $strParamId = "/".$params_id;
            }
            
            $modelSlug = new UrlSlug();
            if($params_id != "")
            {
                $dataSlug = $modelSlug::find()->where("params_id = :params_id AND params_route = :params_route",[
                ":params_id"=>$params_id,
                ":params_route" => $route
                ])->one();
            }
            else
            {
                $dataSlug = $modelSlug::find()->where(" params_route = :params_route",[
                ":params_route" => $route,
                ])->one();
            }
            
			
            //Begin URL in DB
            if(count($dataSlug) > 0 )
            {
                if(count($params)>0)
                {
                    $strParams = $this->generateStrParams($params);
                    //URL Has PARAMS
                    $url = $dataSlug->slug.$strParams;
                }
                else
                {
                    //URL Non Params
                    $url = $dataSlug->slug;
                }
            }
            else
            {
                $strParams = $this->generateStrParams($params);
                if($strParams != "")
                {
                    $url = $route.$strParamId.$strParams;
                }
                else
                {
                    $url = $route.$strParamId;
                }
            }
        }
        
        //If a parameter is defined and not empty - add it to the URL
        return $url;
    }
    public function generateStrParams($params)
    {
        //$params = array()
        $strParams  = "";
        $query = "";
        $i = 0;
        foreach($params  as $key => $value)
        {
            if($key != "id")
            {
                if($i==0)
                {
                    $strParams = "?".$key.'='.$value;
                }
                else
                {
                    $strParams = '&'.$key.'='.$value;
                }
                $query .= $strParams;
                $i++;
            }
        }
        return $query;
                    
    }
	
	public function redirectBaLeMot($routeUrl,$idInfo)
	{
		$url = Yii::$app->urlManager->createUrl([$routeUrl,'id' => $idInfo]);
		Yii::$app->response->redirect($url, 301);
		Yii::$app->end(); 
	}
}
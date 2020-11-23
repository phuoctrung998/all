<?php 
namespace common\models\extmodels;
use Yii;
use common\models\TblProducts;
use common\models\TblProductsCategories;
class ExtProducts extends TblProducts
{
    public function getProductsByArrayIdCate($arrayIdCate)
    {
        $dataProducts = TblProducts::find()->where(['IN','id_products_categories',$arrayIdCate])->all();
        return $dataProducts;
    }
    
    public function getArrayIdSubcateById($idCate,$extendParentId = true)
    {
        /*
            return array id child of category
            if not child return idCate
        */
        $arrayIdCate =  array();
        $dataChild = TblProductsCategories::find()
            ->select('id')
            ->where('parent = :parent',[':parent'=>$idCate])->all();
        
        if(count($dataChild)>0)
        {
            foreach($dataChild as $data)
            {
                $arrayIdCate[] = $data->id;
            }
        }
        if($extendParentId == true)
        {
            $arrayIdCate[] = $idCate;
        }
        
        return $arrayIdCate;
    }
    
    //lay id cate goc
    public function getIdRootCate($id)
    {
        $dataCate = TblProductsCategories::findOne($id);  
        if(count($dataCate)>0)
        {
            if($dataCate->parent==0)
            {
                return $dataCate->id;
            }
            else
            {
                $dataCateRoot = TblProductsCategories::find()->where('id = :id',[':id'=>$dataCate->parent])->one();
                
                if(count($dataCateRoot)>0)
                {
                    if($dataCateRoot->parent == 0)
                    {
                        return $dataCateRoot->id;
                    }
                }
            }
        } 
    }
    
    public function getSubcateById($idCate)
    {
        $dataChild = TblProductsCategories::find()
            ->where('parent = :parent',[':parent'=>$idCate])->all();  
        return $dataChild;     
    }
    
}

?>
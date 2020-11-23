<?php 
namespace frontend\components;
use Yii;
class Cart 
{
    static function addCart($pid,$productInfo,$q=1)
    {
        $session = Yii::$app->session;
        $cart = $session['cart'];
		
		if(empty($cart)) // chua co sp nao
        {
            $cart[$pid] = array(
				'pro_id'		=> $productInfo->id,
				'pro_name'		=> $productInfo->title,
				'price'			=> $productInfo->price,
				'price_cost'	=> $productInfo->price_cost,
				'amount'		=> 1,
			);
        }
        else
        {
           if(array_key_exists($pid,$cart))
			{
				$cart[$pid] = array(
					'pro_id'		=> $productInfo->id,
					'pro_name'		=> $productInfo->title,
					'price'			=> $productInfo->price,
					'price_cost'	=> $productInfo->price_cost,
					'amount'		=> $cart[$pid]["amount"]+1,
				);
			}
			else
			{
				$cart[$pid] = array(
					'pro_id'		=> $productInfo->id,
					'pro_name'		=> $productInfo->title,
					'price'			=> $productInfo->price,
					'price_cost'	=> $productInfo->price_cost,
					'amount'		=> 1,
				);
			}
        }
		
        
        $session['cart'] = $cart;
    }
    
    static function updateCart($pid,$productInfo,$q)
    {
		$session = Yii::$app->session;
        $cart = $session['cart'];
        if(array_key_exists($pid,$cart))
        {
            $cart[$pid] = array(
					'pro_id'		=> $productInfo->id,
					'pro_name'		=> $productInfo->title,
					'price'			=> $productInfo->price,
					'price_cost'	=> $productInfo->price_cost,
					'amount'		=> $q,
			);
        }
        $session['cart'] = $cart;
    }
    
    static function deleteCartItem($pid)
    {
		$session = Yii::$app->session;
        $cart = $session['cart'];
        if(array_key_exists($pid,$cart))
        {
            unset($cart[$pid]);
        }
        $session['cart'] = $cart;
    }
	
	static function removeCart()
	{
		$session = Yii::$app->session;
		unset($session['cart']);
	}
    
}
?>
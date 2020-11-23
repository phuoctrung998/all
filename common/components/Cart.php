<?php 
namespace common\components;
use Yii;
class Cart 
{
    static function addCart($pid,$q=1)
    {
        $session = Yii::$app->session;
        $cart = $session['cart'];
        if(empty($cart))
        {
            $cart[$pid] = $q;
        }
        else
        {
            if(array_key_exists($pid,$cart))
            {
                $cart[$pid] = ($cart[$pid]+$q);
            }
            else
            {
                $cart[$pid] = $q;
            }
        }
        $session['cart'] = $cart;
    }
    
    static function updateCart($pid,$q)
    {
        $cart = $session['cart'];
        if(array_key_exists($pid,$cart))
        {
            $cart[$pid] = $q;
        }
        $session['cart'] = $cart;
    }
    
    static function deleteCartItem($pid)
    {
        $cart = $session['cart'];
        if(array_key_exists($pid,$cart))
        {
            unset($cart[$pid]);
        }
        $session['cart'] = $cart;
    }
    
}
?>
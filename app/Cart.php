<?php

namespace App;

use Session;

class Cart
{
    public $product_id = 0; 
    public $product_name = 0;
    public $product_price = 0;
    public $product_img = 0;
    function addCart($id, $arrData)
    {
        foreach ($arrData as $key => $value) {
        $product_id = $value['id_product'];
        $product_name = $value['product_name'];
        $product_price = $value['product_price'];
        $product_img = $value['product_img'];
        }
        if (empty(Session::has('cart'))) {
            $cart[$id] = array(
                'product_id' => $id,
                'product_name' => $product_name,
                'product_price' => $product_price,
                'product_img' => $product_img,
                'amount' => 1,
            );
        }else{
            $cart = Session::get('cart');
            if (array_key_exists($id, $cart)) {
                $cart[$id] = array(
                'product_id' => $id,
                'product_name' => $product_name,
                'product_price' => $product_price,
                'product_img' => $product_img,
                'amount' => $cart[$id]['amount']+1,
                );
            }else{
                $cart[$id] = array(
                    'product_id' => $id,
                    'product_name' => $product_name,
                    'product_price' => $product_price,
                    'product_img' => $product_img,
                    'amount' => 1,
                );
            }
        }
    Session::put('cart', $cart);
    }
    public function destroyCart($id)
    {
        if (!empty(Session::get('cart'))) {
            $cart = Session::get('cart');
            unset($cart[$id]);
            Session::put('cart', $cart);

        }
    }
}


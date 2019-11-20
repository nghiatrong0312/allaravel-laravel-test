<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product_sale;

class MainController extends Controller
{
    public function index()
    {
    	date_default_timezone_set('Asia/Ho_Chi_Minh');
    	// strtotime() chuyen doi timestamp sang string
    	$current_time   = strtotime(date("Y-m-d H:i:s")).'<br>';
		$name_product   = new Product_sale();
        $product        = json_decode($name_product->joinProduct(), true);
		$expiry_time 	= 0;
		$product_name	= '';
		$product_price  = '';
		$price_discount = '';
		$product_img	= '';
		$block_discount = 'block';
		$block_done		= 'none';
		foreach ($product as $key => $value) {
			$time_die 		= strtotime($value['time']);
		    $expiry_time 	= $value['time'];
		    $product_name	= $value['product_name'];
		    $product_price	= $value['product_price'];
		    $product_img	= $value['product_img'];
		    $price_discount = $product_price*(100 - $value['discount'])/100;
		    $product_id		= $value['product_id'];
		
		}
		if ($time_die <= $current_time) {
			$block_discount = 'none';
			$block_done	 	= 'block';
		}
    	return view('main', [
    		'expiry_time' 		=> $expiry_time,
    		'product_name' 		=> $product_name,
    		'product_price' 	=> $product_price,
    		'product_img' 		=> $product_img,
    		'price_discount' 	=> $price_discount,
    		'block_discount'	=> $block_discount,
    		'block_done'		=> $block_done,
    		'product_id'		=> $product_id,
    	]);
    }
}

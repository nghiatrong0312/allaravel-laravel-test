<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\Product_sale;
use App\Size;
use App\Color;
use App\Categories;
use App\Products;

class ProductSaleController extends Controller
{
    public function detail()
    {
    	date_default_timezone_set('Asia/Ho_Chi_Minh');
    	// strtotime() chuyen doi timestamp sang string
    	$current_time   	= strtotime(date("Y-m-d H:i:s")).'<br>';
		$name_product   	= new Product_sale();
        $product        	= json_decode($name_product->joinProduct(), true);
		$expiry_time 		= 0;
		$product_name		= '';
		$product_price  	= '';
		$price_discount 	= '';
		$product_img		= '';
		$categories_name	= '';
		$block_discount 	= 'block';
		$block_done			= 'none';
		foreach ($product as $key => $value) {
			$time_die 		= strtotime($value['time']);
		    $product_name	= $value['product_name'];
		    $product_price	= $value['product_price'];
		    $product_img	= $value['product_img'];
		    $price_discount = $product_price*(100 - $value['discount'])/100;
		    $product_id		= $value['product_id'];
		    $categires_id	= $value['categories_id'];
		}
		if ($time_die <= $current_time) {
			$block_discount = 'none';
			$block_done	 	= 'block';
			$price_discount = $product_price;
		}
		$size_data 			= Size::where(['id_product' => $product_id])->get();
		$color_data 		= Color::where(['id_product' => $product_id])->get();
		$categories_data	= Categories::where(['id_categories' => $categires_id])
											->get();
		foreach ($categories_data as $key => $categories_datas) {
			$categories_name = $categories_datas['categories_name'];
		}
    	return view('productsale/detail',[
    		'product_name' 		=> $product_name,
    		'product_price' 	=> $product_price,
    		'product_img' 		=> $product_img,
    		'price_discount' 	=> $price_discount,
    		'block_discount'	=> $block_discount,
    		'block_done'		=> $block_done,
    		'product_id'		=> $product_id,
    		'color_data'		=> $color_data,
    		'size_data'			=> $size_data,
    		'categories_name'	=> $categories_name,

    	]);
    }
    public function addcart()
    {
    	if (isset($_POST['product_id'])) {
    		$id 			= $_POST['product_id'];
    		$product_price 	= $_POST['product_price']*$_POST['product_quantity'];
    		$product_data = Products::where(['id_product' => $id])->get();
    		foreach ($product_data as $key => $value) {
    			$product_img = $value['product_img'];
    		}
    		if (empty(Session::has('cart'))) {
            $cart[$id] = array(
                'product_id' => $id,
                'product_name' => $_POST['product_name'],
                'product_price' => $product_price,
                'product_img' => $product_img,
                'amount' => $_POST['product_quantity'],
            	);
        	}else{
	            $cart = Session::get('cart');
	            if (array_key_exists($id, $cart)) {
	                $cart[$id] = array(
	                'product_id' => $id,
	                'product_name' => $_POST['product_name'],
	                'product_price' => $product_price,
	                'product_img' => $product_img,
	                'amount' => $cart[$id]['amount']+$_POST['product_quantity'],
	                );
	            }else{
                $cart[$id] = array(
                    'product_id' => $id,
                    'product_name' => $_POST['product_name'],
                    'product_price' => $product_price,
                    'product_img' => $product_img,
                    'amount' => $_POST['product_quantity'],
                );
           		}
    		}
    		Session::put('cart', $cart);
    	}
    }
    public function getquantity()
    {
    	$total_quantity = 0;
        if (!empty(Session::get('cart'))) {
            $price = Session::get('cart');
            foreach ($price as $key => $prices) {   
                $total_quantity += $prices['amount'];
            }
        }
        echo $total_quantity;
    }
}

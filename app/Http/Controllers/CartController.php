<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Products;
use App\Cart;
use App\Order;
use Session;


class CartController extends Controller
{
	public function viewdetail()
    {

        if (!empty(Session::get('cart'))) {
            $order = Order::cursor();
            $infocart = Session::get('cart');
            return view('cart/viewdetail', ['infocart' => $infocart, 'order' => $order]);
        }else {
            return view('cart/index');
        }

    }
    public function getquantity()
    {
        $id = $_GET['id'];
        $total = $_GET['total_amount'];
        $quantity =$_GET['quantity_pro'];

        $product_id = 0; 
        $product_name = 0;
        $product_img = 0;
        $sub = 0;
        $product = Products::where(['id_product' => $id])->get();
        foreach ($product as $key => $value) {
        $product_id = $value['id_product'];
        $product_name = $value['product_name'];
        $product_price = $_GET['price'];
        $product_img = $value['product_img'];
        }
        $cart = Session::get('cart');
        if (array_key_exists($id, $cart)) {
            $cart[$id] = array(
            'product_id' => $id,
            'product_name' => $product_name,
            'product_price' => $product_price,
            'product_img' => $product_img,
            'amount' => $quantity,
            'total_price' => $total,

            );
        }
        Session::put('cart', $cart);
    }

    public function index(Request $request, $id)
    {
    	$product = Products::where(['id_product' => $id])->get();
    	$cart = new Cart();
    	$cart->addCart($id, $product);

    	return redirect('cart/viewdetail');
    }

    public function view()
    {
        $total = 1;
        if (!empty(Session::get('cart'))) {
            
            $infocart = Session::get('cart');
            foreach ($infocart as $key => $value) {
               $total += $value['amount'];
            }
            
        }
        echo $total;
    }

    public function setquantity()
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
    public function setotalbill()
    {
        $total_price = 0;
        if (!empty(Session::get('cart'))) {
            $price = Session::get('cart');

            foreach ($price as $key => $prices) {   
                $total_price += $prices['total_price'];
            }
            
        }
        echo $total_price;
    }

    public function destroy($id)
    {
        $cart = new Cart();
        $cart->destroyCart($id);
        return redirect('cart/viewdetail');
    }
}

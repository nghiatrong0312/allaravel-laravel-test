<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Session;
use App\Order_Product;
use App\Products;
use App\Order;
use App\Gift_code;
use App\User;

class OrderController extends Controller
{
    public function view()
    {
        if (Auth::check()) {
           $user        = Auth::user();
           $id_customer = $user['id'];
        }
        $order = Order::where(['id_customer' => $id_customer])
                            ->orderBy('id', 'desc')
                            ->get();

        return view('cart/order', ['order' => $order]);
    }

	public function index($id) 
	{	

		$order            = Order_Product::where(['order_id' => $id])->get();
        $status_product   = Order::where(['id' => $id])->get();
		return view('cart/orderdetail', [
			'order' => $order,
            'status_product' => $status_product,
		]);
	}
    public function checkout_view()
    {
        if (!Auth::check()) {
            Session::flash('warning', 'Vui Long Dang Nhap');
            return redirect('/login');
        }elseif (Auth::check()) {
            $user = Auth::user();
            if ($user['permission'] != 2) {
                Auth::logout();
                Session::flash('warning', 'Vui Long Dang Nhap');
                return redirect('/login');
            }
        }
        $gift_code = '';
        $status    = '';
        if (!empty($_GET['gift_code'])) {
            $gift_code      = $_GET['gift_code'];
            $gift_code_data = Gift_code::where(['code' => $gift_code])->get();
            $discount       = 0;
            foreach ($gift_code_data as $key => $value) {
                if ($value['status'] = 1) {
                    $discount = $value['discount'];
                }
            }
           
        }
        elseif (empty($_GET['gift_code'])) {
            $discount = 0;
        }

        if (Auth::check()) {
            $user = Auth::user();
        }
        if (!empty(Session::get('cart'))) {
            $cart_data = Session::get('cart');
        }
        $order_data = Order::cursor();
        $id_order = 0;
        foreach ($order_data as $key => $orders) {
            if (empty($orders['id'])) {
              $id_order = 1;
            }else {
              $id_order = $orders['id'];
            }
        }
        return view('cart/checkout', [
            'cart_data' => $cart_data,
            'user'      => $user,
            'discount'  => $discount,
            'order_data'=> $order_data,
            'id_order'  => $id_order,
            'gift_code' => $gift_code,
        ]);
    }

    public function store(Request $request)
    {
    	if (!Auth::check()) {
    		Session::flash('warning', 'Vui Long Dang Nhap');
    		return redirect('/login');
    	}elseif (Auth::check()) {
    		$user = Auth::user();
    		if ($user['permission'] != 2) {
    			Auth::logout();
    			Session::flash('warning', 'Vui Long Dang Nhap');
    			return redirect('/login');
    		}
            $rules = [
            'address'       => 'required|string|max:255',
            'city'          => 'required|string|max:255',
            'phonenumber'   => 'required|string|max:255',
            ];
            $messages = [
                'address.required'      => 'firstname là trường bắt buộc',
                'address.max'           => 'Họ và tên không quá 255 ký tự',
                'city.required'         => 'lastname là trường bắt buộc',
                'city.max'              => 'Họ và tên không quá 255 ký tự',
                'phonenumber.required'  => 'lastname là trường bắt buộc',
                'phonenumber.max'       => 'Họ và tên không quá 255 ký tự',
                
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
                Session::flash('note_checkout', 'Vui Lòng Nhập Đầy Đủ Thông Tin!');
                return redirect('/cart/checkout')->withErrors($validator)->withInput();
            }
            else {

                User::where(['id' => $user['id']])->update([
                    'address'       => $request->input('address'),
                    'city'          => $request->input('city'),
                    'numberphone'   => $request->input('phonenumber'),
                ]);

                if ($request->input('id_product') != null) {
                    if (!empty(Session::get('cart'))) {
                        $cart = Session::get('cart');
                        foreach ($cart as $key => $value) {
                        date_default_timezone_set('Asia/Ho_Chi_Minh'); 
                        $order_products                 = new Order_Product();
                        $order_products->id_product     = $value['product_id'];
                        $order_products->id_customer    = $request->input('id_customer');
                        $order_products->quantity       = $value['amount'];
                        $order_products->status         = 1;
                        $order_products->order_id       = $request->input('order_id');
                        $order_products->save();

                        }
                    Session::forget('cart');
                    }
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $discount_data = 0;
                    $gift_code     = '';
                    if (!empty($request->input('discount'))) {
                        $discount_data = $request->input('discount');
                        $gift_code = $request->input('gift_code');
                        Gift_code::where(['code' => $gift_code])->update([
                            'status' => 2,
                            'time_delete' => $request->input('time_delete'),
                        ]);
                    }
                    $order = new Order();
                    $order->id                = $request->input('order_id');
                    $order->id_customer       = $request->input('id_customer');
                    $order->total_quantity    = $request->input('total_amount');
                    $order->total_price       = $request->input('total_price');
                    $order->discount_percent  = $discount_data;
                    $order->time              = date('H:i:s, d-m-Y');
                    $order->status            = 1;
                    $order->save();

                    Session::flash('success', 'Ban Da Dat Hang Thanh Cong');
                    return redirect('cart/order');
                }
            }

    	}
    	
    }

    public function destroy($id)
    {
    	// Library::where(['id_product' => $id])->delete();
    }
}

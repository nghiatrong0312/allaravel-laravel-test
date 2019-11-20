<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Order;
use App\Order_Product;
use App\User;
use App\Products;


class StatusProductController extends Controller
{
    public function index()
    {
    	$id_customer_waiting_confimation = 0;
        $quantity_waiting_confimation = 0;
    	$waiting_confimation = Order::where(['status' => 1])
                                ->orderBy('id', 'desc')
                                ->get();
        $quantity_waiting_confimation = count($waiting_confimation);
    	

        $id_customer_waiting_delivery = 0;
        $quantity_waiting_delivery = 0;
        $waiting_delivery = Order::where(['status' => 2])
                                ->orderBy('id', 'desc')
                                ->get();
        $quantity_waiting_delivery = count($waiting_delivery);
        


        $id_customer_delivered = 0;
        $quantity_delivered = 0;
        $delivered = Order::where(['status' => 3])
                                ->orderBy('id', 'desc')
                                ->get();
        $quantity_delivered = count($delivered);

    	return view('backend/statusproduct/index', [
    		'waiting_confimation'             => $waiting_confimation,
            'quantity_waiting_confimation'    => $quantity_waiting_confimation,
            'waiting_delivery'                => $waiting_delivery,
            'quantity_waiting_delivery'       => $quantity_waiting_delivery,
            'delivered'                       => $delivered,
            'quantity_delivered'              => $quantity_delivered,

    	]);
    	
    }

    public function viewdetail($id, $id_customer)
    {
        $order_product = Order_Product::where(['order_id' => $id])->get();
        $customer = User::where(['id' => $id_customer])->get();
        return view('backend/statusproduct/viewdetail', [
            'order_product' => $order_product,
            'customer' => $customer,
        ]);
    }

    public function update(Request $request, $id)
    {
        
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        Order::where(['id' => $id])->update([
            'status' => 2,
            'time' => date('H:i:s, d-m-Y'),
        ]);

        Order_Product::where(['order_id' => $id])->update([
            'status' => 2,
        ]);
        return redirect('/admin/statusproduct');
    }

    public function delivered(Request $request, $id)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        Order::where(['id' => $id])->update([
            'status' => 3,
            'time' => date('H:i:s, d-m-Y'),
        ]);

        Order_Product::where(['order_id' => $id])->update([
            'status' => 3,
        ]);

        return redirect('/admin/statusproduct');
    }
    public function sold(Request $request, $id)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        Order::where(['id' => $id])->update([
            'status' => 4,
            'time' => date('H:i:s, d-m-Y'),
        ]);

        Order_Product::where(['order_id' => $id])->update([
            'status' => 4,
        ]);

        return redirect('/admin/statusproduct');
    }
}

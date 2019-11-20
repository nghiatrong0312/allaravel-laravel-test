<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Product_sale;
use App\Products;

class ProductSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name_product       = new Product_sale();
        $product            = json_decode($name_product->joinProduct(), true);
        $product_name_data  = '';
        $product_img_data   = '';
        foreach ($product as $key => $products) {
            $product_name_data = $products['product_name'];
            $product_img_data  = $products['product_img'];
        }
        $product_data       = Products::cursor();
        $product_sale_data  = Product_sale::cursor();
        return view('backend/setting/productsale/index', [
            'product_sale_data' => $product_sale_data,
            'product_data'      => $product_data,
            'product_name_data' => $product_name_data,
            'product_img_data'  => $product_img_data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $warning        = '';
        $expiry_time    = 0;
        $current_time   = date("Y-m-d H:i:s");        
        if (!$_POST['product_name']) {
            $warning = '"Please Choose Your Product"';
        }elseif (!$_POST['discount']) {
            $warning = '"Please Enter Discount Percent"';
        }elseif (!$_POST['expiry_time']) {
            $warning = '"Please Enter Expiry Time"';
        }elseif (!$_POST['quantity']) {
            $warning = '"Please Enter Quantity"';
        }elseif (isset($_POST['expiry_time'])) {
            $expiry_time    = '+'.$_POST['expiry_time'].' '. 'Hours';
            $time_delete    = date('Y-m-d H:i:s',strtotime($expiry_time,strtotime($current_time))); 
            Product_sale::where(['id' => $id])->update([
                'product_id'    =>   $_POST['product_name'],
                'discount'      =>   $_POST['discount'],
                'time'          =>   $time_delete,
                'quantity'      =>   $_POST['quantity'],
            ]);
            $warning = '"Update Success"';
        }
        echo json_encode($warning);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

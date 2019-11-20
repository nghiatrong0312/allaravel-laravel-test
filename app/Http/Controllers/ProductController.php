<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Products;

class ProductController extends Controller
{
    public function index()
    {
    	return view('product/index');
    }

    public function getproduct($id)
    {	
		$product = Products::where(['id_product' => $id])->get();

		return view('product/getproduct', [
		'product' => $product,
		]);
    }	
}

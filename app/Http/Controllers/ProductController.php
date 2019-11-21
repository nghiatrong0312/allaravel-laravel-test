<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Products;
use App\Library;
use App\Size;
use App\Color;

class ProductController extends Controller
{
    public function index($id)
    {
        $product        = Products::where(['id_product' => $id])->get();
        $library_data   = Library::where(['id_product' => $id])->get();
        $size_data      = Size::where(['id_product' => $id])->get();
        $color_data     = Color::where(['id_product' => $id])->get();
    	return view('product/index', [
            'product'       => $product,
            'library_data'  => $library_data,
            'size_data'     => $size_data,
            'color_data'    => $color_data,

        ]);
    }

    public function getproduct($id)
    {	
		$product = Products::where(['id_product' => $id])->get();

		return view('product/getproduct', [
		'product' => $product,
		]);
    }	
}

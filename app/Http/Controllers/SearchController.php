<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Categories;

class SearchController extends Controller
{
    public function search(Request $request) 
    {
    	$product = Products::where('product_name','like','%'.$request->search.'%')->orWhere('product_price', $request->search)->orWhere('brand_product','like','%'.$request->search.'%')->get();
    	$categories = Categories::where('categories_name', $request->search)->get();
    	$count_product = 0;
    	$count_product = count($product)+count($categories);
    	return view('product/search', [
    		'count_product' => $count_product,
    		'product' => $product,
    		'categories' => $categories,
    	]); 
    }
}

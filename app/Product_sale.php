<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product_sale extends Model
{
    protected $table = 'product_sale';
    public $timestamps = false;

    public function joinProduct()
    {
    	$product = DB::table('product_sale')
    				->join('product', 'product_sale.product_id', '=', 'product.id_product')
    				->get();
    	return $product;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories_product';

    public function product()
    {
    	return $this->hasMany('App\Products', 'categories_id');
    }
}

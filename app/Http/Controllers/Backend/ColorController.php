<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Color;
class ColorController extends Controller
{
    public function destroy ($id, $id_pro)
    {
    	Color::where(['id' => $id])->delete();
    	return redirect('admin/product/editview/'.$id_pro);
    }
}

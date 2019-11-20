<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Blog_Categories;

class BlogCategoriesController extends Controller
{
    public function index()
    {
    	$blog_categories = Blog_Categories::cursor();
    	return view('backend/blog/categories', ['blog_category' => $blog_categories]);
    }

    public function store(Request $request)
    {
    	if (isset($_POST['name_categories'])) {
    		date_default_timezone_set('Asia/Ho_Chi_Minh');
    		$blog_categories = new Blog_Categories();
    		$blog_categories->categories = $request->input('name_categories');
    		$blog_categories->time = date('H:i:s, d-m-Y');
    		$blog_categories->save();

    		return redirect('admin/blogcategories/view');
    	}
    }

    public function destroy($id)
    {
    	Blog_Categories::where(['id' => $id])->delete();
    	
    	return redirect('admin/blogcategories/view');
    }
}

<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Categories;

class CategoriesController extends Controller
{
    public function index()
    {
        
    	$categories = Categories::cursor();
    	return view('/backend/categories/index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('/backend/categories/create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name_categories' => 'required',
        ];
        $messages = [
            'name_categories.required' => 'Vui long them thong tin',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect('/admin/categories/create')->withErrors($validator)->withInput();
        }else {
            $categories = new Categories();
            $categories->categories_name = $request->input('name_categories');
            $categories->save();
            return redirect('/admin/categories');
        }
    }

    public function view($id)
    {
        $categories = Categories::where(['id_categories' => $id])->cursor();
        return view('/backend/categories/view', ['categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        Categories::where(['id_categories' => $id])->update([
                'categories_name' => $request->input('name_categories'),
        ]);
        return redirect('/admin/categories');
    	
    }

    public function delete($id)
    {
        Categories::where('id_categories', $id)->delete();
         return redirect('/admin/categories');
    }
}

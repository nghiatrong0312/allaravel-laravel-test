<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use App\Categories_block;
use App\Incentives;

class HomeFrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend/setting/home/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewcategoriesblock()
    {
        $incentives_data = Incentives::orderBy('id', 'desc')->take(1)->get();
        $categories_block_data = Categories_block::cursor();
        return view('backend/setting/home/categories_block/index', [
            'categories_block_data' => $categories_block_data,
            'incentives_data' => $incentives_data,
        ]);
    }

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
    public function update_categories(Request $request, $id)
    {
        $categories_block_data = Categories_block::where(['id' => $id])->get();
        $categories_background = '';
        foreach ($categories_block_data as $key => $value) {
            $categories_background = $value['background'];
        }
        date_default_timezone_set('Asia/Ho_Chi_Minh');  
        if (!empty($_POST['background'])) {
            Storage::delete('upload/'.$categories_background);
            
            Categories_block::where(['id' => $id])->update([
                'background'        => substr($_POST['background'], 12),
                'categories_name'   => $_POST['name'],
                'link'              => $_POST['link'],
                'updated_at'        => date('d-m,Y'),
            ]);
        } else{
            Categories_block::where(['id' => $id])->update([
            'categories_name'   => $_POST['name'],
            'link'              => $_POST['link'],
            'updated_at'        => date('d-m,Y'),
            'background'        => $categories_background,
            ]);
        }
        
        

    }
    public function update_background(Request $request)
    {
        if ($request->hasFile('categories_background')) {
            Storage::put('upload/'.$request->file('categories_background')->getClientOriginalName(), file_get_contents($request->file('categories_background')));
            return redirect('/admin/setting/home/categories_block');
        }
        return redirect('/admin/setting/home/categories_block');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_incentives(Request $request, $id)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh'); 
        Incentives::where(['id' => $id])->update([
            'tittle'        => $_POST['categories_name'],
            'content'       => $_POST['categories_link'],
            'link'          => $_POST['incentives_link'],
            'updated_at'    => date('d-m,Y'),
        ]);
    }

    public function destroy($id)
    {
        //
    }
}

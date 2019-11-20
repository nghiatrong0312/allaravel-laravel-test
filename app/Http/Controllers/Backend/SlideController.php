<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use App\Slide;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide_data = Slide::cursor();
        return view('backend/setting/slide/index', ['slide_data' => $slide_data]);
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
        if (!empty($request->file('slide_img'))) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $slide_img = $request->file('slide_img');
            Storage::put('upload/'.$slide_img->getClientOriginalName(), file_get_contents($slide_img));
            $slide = new Slide();
            $slide->tittle = $request->input('slide_tittle');
            $slide->content = $request->input('slide_content');
            $slide->link = $request->input('slide_link');
            $slide->img = $slide_img->getClientOriginalName();
            $slide->created_at = date('d-m,Y');
            $slide->save();

            return redirect('admin/setting/slide');
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide_data = Slide::where(['id' => $id])->get();
        foreach ($slide_data as $key => $slide_datas) {
            $img = $slide_datas['img'];
        }
        Slide::where(['id' => $id])->delete();
        Storage::delete('upload/'.$img);

        return redirect('admin/setting/slide');
    }
}

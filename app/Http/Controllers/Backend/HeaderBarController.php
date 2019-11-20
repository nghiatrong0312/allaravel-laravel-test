<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Header_bar;

class HeaderBarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header_data = Header_bar::cursor();
        return view('backend/setting/header/index', ['header_data' => $header_data]);
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
        if (!empty($request->input('header_tittle'))) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $header_data = new Header_bar();
            $header_data->tittle        = $request->input('header_tittle');
            $header_data->email         = $request->input('header_email');
            $header_data->color         = $request->input('header_color');
            $header_data->created_at    = date('d-m,Y');
            $header_data->save();

            return redirect('/admin/setting/header');
        }
        return redirect('/admin/setting/header');
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
        Header_bar::where('id', $id)->delete();
        return redirect('/admin/setting/header');
    }
}

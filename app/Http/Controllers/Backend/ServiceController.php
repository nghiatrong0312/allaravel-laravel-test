<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use Session;
use App\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $id)
    {
        $rules = [
            'service_tittle'     => 'required',
            'service_icon'       => 'required',
            'service_content'    => 'required',
        ];

        $messeges = [
            'service_tittle.required'     => 'Please Input Introduction Shop',
            'service_icon.required'       => 'Please Input Introduction Shop',
            'service_content.required'    => 'Please Input Introduction Shop',
        ];

        $validator = Validator::make($request->all(), $rules, $messeges);
        if ($validator->fails()) {
            Session::flash('note_service', 'Fail To Upload');
            return redirect('/admin/setting/about/view/'.$id)->withErrors($validator)->withInput();
        }
        if (!empty($request->input('service_tittle'))) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $service                =   new Service;
            $service->content       =   $request->input('service_content');
            $service->id_about      =   $id;
            $service->tittle        =   $request->input('service_tittle');
            $service->icon          =   $request->input('service_icon');
            $service->created_at    =   date('d-m,Y');
            $service->save();

            return redirect('/admin/setting/about/view/'.$id);
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
        Service::where(['id' => $id])->update([
            'tittle' => $_POST['service_tittle'],
            'content' => $_POST['service_content'],
            'icon' => $_POST['service_icon'],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

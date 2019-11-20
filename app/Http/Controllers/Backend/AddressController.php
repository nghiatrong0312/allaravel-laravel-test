<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use App\Address;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $address_data = Address::cursor();
        return view('backend/address/index', ['address_data' => $address_data]);
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
        if (!empty($request->input('phone_number'))) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $logo = $request->file('logo');
            Storage::put('upload/'.$logo->getClientOriginalName(), file_get_contents($logo));
            $address = new Address();
            $address->phone = $request->input('phone_number');
            $address->email = $request->input('email');
            $address->Address = $request->input('address');
            $address->maps = $request->input('maps_link');
            $address->logo = $logo->getClientOriginalName();
            $address->created_at = date('d-m,Y');
            $address->save();

            return redirect('/admin/address');
        }
        return redirect('/admin/address');
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
        Address::where(['id' => $id])->delete();
        return redirect('/admin/address');
    }
}

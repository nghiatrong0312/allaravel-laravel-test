<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Session;
use App\Gift_code;

class GiftCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quantity_unused_gift_code = 0;
        $unused_gift_code = Gift_code::where(['status' => 0])
                                ->orderBy('id', 'desc')
                                ->get();
        $quantity_unused_gift_code = count($unused_gift_code);

        $quantity_gift_code_gave = 0;
        $gift_code_gave = Gift_code::where(['status' => 1])
                                ->orderBy('id', 'desc')
                                ->get();
        $quantity_gift_code_gave = count($gift_code_gave);

        $quantity_gift_code_used = 0;
        $gift_code_used = Gift_code::where(['status' => 2])
                                ->orderBy('id', 'desc')
                                ->get();
        $quantity_gift_code_used = count($gift_code_used);

        return view('backend/giftcode/index', [
            'quantity_unused_gift_code' =>   $quantity_unused_gift_code,
            'unused_gift_code'          =>   $unused_gift_code,
            'quantity_gift_code_gave'   =>   $quantity_gift_code_gave,
            'gift_code_gave'            =>   $gift_code_gave,
            'quantity_gift_code_used'   =>   $quantity_gift_code_used,
            'gift_code_used'            =>   $gift_code_used,
        ]);
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
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $rules = [
            'giftcode' => 'required|string|max:5',
            ];
            $messages = [
                'giftcode.required'  => '"Please Enter Gift Code"',
                'giftcode.max'       => '"Please Enter Up To 5 Characters"',   
            ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect('admin/giftcode')->withErrors($validator)->withInput();
        }
        if (!empty($request->input('giftcode'))) {
            $giftcode_data = Gift_code::cursor();
            foreach ($giftcode_data as $key => $value) {
                if ($request->input('giftcode') == $value['code']) {
                    Session::Flash('note_create_gift', 'Sorry, The Gift Code Is Already');
                    return redirect('admin/giftcode');
                }
            }
        }
        if (!empty($request->input('giftcode'))) {
            $giftcode               = new Gift_code();
            $giftcode->code         = $request->input('giftcode');
            $giftcode->discount     = $request->input('discount');
            $giftcode->status       = 0;
            $giftcode->created_at   = date('H:i:s m-d-Y');
            $giftcode->time_delete  = $request->input('time_delete');
            $giftcode->save();

            Session::Flash('note_gift', 'Success Created');
            return redirect('admin/giftcode');
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
        if (!empty($id)) {
            Gift_code::where(['id' => $id])->update([
                'status' => 1,
            ]);
            Session::Flash('note_gift_update', 'Success Updated' );
            return redirect('admin/giftcode');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $current_time   = date("Y-m-d H:i:s");
        $time_delete = Gift_code::where(['status' => 2])->get();
        foreach ($time_delete as $key => $value) {
            if ($value['time_delete'] <=  $current_time) {
                $expiry = $value['time_delete'];
                Gift_code::where(['time_delete' => $expiry])->delete();
                echo "Gift Code Expiry Was Delete";
            }
        }
    }
}

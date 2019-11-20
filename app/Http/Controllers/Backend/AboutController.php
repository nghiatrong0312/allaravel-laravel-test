<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Session;

use App\About;
use App\Service;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about_data = About::cursor();
        return view('/backend/setting/about/index', ['about_data' => $about_data]);
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
        $rules = [
            'about_content'     => 'required',
            'about_media'       => 'required',
            'about_banner'      => 'required',
            'about_background'  => 'required',
        ];

        $messeges = [
            'about_content.required'    => 'Please Input Introduction Shop',
            'about_media.required'      => 'Please Input Introduction Shop',
            'about_banner.required'     => 'Please Input Introduction Shop',
            'about_background.required' => 'Please Input Introduction Shop',
        ];

        $validator = Validator::make($request->all(), $rules, $messeges);
        if ($validator->fails()) {
            Session::flash('note_about', 'Fail To Upload');
            return redirect('/admin/setting/about')->withErrors($validator)->withInput();
        }
        if (!empty($request->input('about_content'))) {
            $banner_img     = $request->file('about_banner');
            $background_img = $request->file('about_background');

            Storage::put('upload/'.$banner_img->getClientOriginalName(), file_get_contents($banner_img));
            Storage::put('upload/'.$background_img->getClientOriginalName(), file_get_contents($background_img));

            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $about_get                  =   new About();
            $about_get->introduction    =   $request->input('about_content');
            $about_get->media           =   $request->input('about_media');
            $about_get->banner          =   $banner_img->getClientOriginalName();
            $about_get->background      =   $background_img->getClientOriginalName();
            $about_get->created_at      =   date('d-m,Y');
            $about_get->save();


            return redirect('/admin/setting/about');
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
        $about_data     = About::where(['id' => $id])->get();
        $service_data   = Service::where(['id_about' => $id])->get();
        return view('/backend/setting/about/view', [
            'about_data'    => $about_data,
            'service_data'  => $service_data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        echo $request->file('about_banner')->getClientOriginalName();
        die();
        $about_data             = About::where(['id' => $id])->get();
        $about_data_banner      = '';
        $about_data_background  = '';
        foreach ($about_data as $key => $about_datas) {
            $about_data_banner      = $about_datas['banner'];
            $about_data_background  = $about_datas['background'];
        }
        if ($request->hasFile('about_banner')) {
            Storage::delete('upload/'.$about_data_banner);
            Storage::put('upload/'.$request->file('about_banner')->getClientOriginalName(), file_get_contents($request->file('about_banner')));
            About::where(['id' => $id])->update([
                'banner' => $request->file('about_banner')->getClientOriginalName(),
            ]);
        }
        elseif ($request->hasFile('about_background')) {
            Storage::delete('upload/'.$about_data_background);
            Storage::put('upload/'.$request->file('about_background')->getClientOriginalName(), file_get_contents($request->file('about_background')));
            About::where(['id' => $id])->update([
                'background' => $request->file('about_background')->getClientOriginalName(),
            ]);
        }
        if ($request->hasFile('about_background') and $request->hasFile('about_banner')) {
            Storage::delete('upload/'.$about_data_background);
            Storage::put('upload/'.$request->file('about_background')->getClientOriginalName(), file_get_contents($request->file('about_background')));
            Storage::delete('upload/'.$about_data_banner);
            Storage::put('upload/'.$request->file('about_banner')->getClientOriginalName(), file_get_contents($request->file('about_banner')));
            About::where(['id' => $id])->update([
                'background'    => $request->file('about_background')->getClientOriginalName(),
                'banner'        => $request->file('about_banner')->getClientOriginalName(),
            ]);
        }
        About::where(['id' => $id])->update([
                'media'        => $request->input('about_link'),
                'introduction' => $request->input('about_introduction'),
            ]); 

        return redirect('/admin/setting/about/view/2');
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

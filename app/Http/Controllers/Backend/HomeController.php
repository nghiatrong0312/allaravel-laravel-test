<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Session;

class HomeController extends Controller
{
    public function index()
    {
    	if (!Auth::check()) {
            return view('backend/login/index');
        }
        elseif (Auth::check()) {
            $user = Auth::user();
            if ($user['permission'] == 2) {
                    Auth::logout();
                    Session::flash('level', 'You are not Admin');
                    return view('backend/login/index');
                }
            return view('/backend/home');
        } 
    }
         
}

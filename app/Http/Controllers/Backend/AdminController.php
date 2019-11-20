<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

class AdminController extends Controller
{
    public function index()
    {
    	return view('backend/admin/index');
    }

    public function viewall()
    {
    	$info = User::where(['permission' => 1])->get();
    	
    	
    	return view('backend/admin/viewall', ['info' => $info]);
    }
}

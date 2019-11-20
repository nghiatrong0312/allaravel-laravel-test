<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Session;
use App\Reply;

class ReplyController extends Controller
{

    public function view($id) {
        
        die();
    }
    public function store(Request $request, $id)
    {
    	if (!Auth::check()) {
    		Session::flash('comment_warning', 'Vui Long Dang Nhap Truoc');

    		return view('login');
    	}
    	elseif (Auth::check()) {
    		$user = Auth::user();
    	 	$rules = [
    	 		'reply' => 'required',
    	 	];

    	 	$messeges = [
    	 		'reply.required' => 'Vui Long De Lai Binh Luan Cua Ban',
    	 	];

    	 	$validator = Validator::make($request->all(), $rules, $messeges);
	        if ($validator->fails()) {
	            return redirect('blogs/'. $id)->withErrors($validator)->withInput();
	        }
	        if (isset($_POST['reply'])) {

	            date_default_timezone_set('Asia/Ho_Chi_Minh');
	            $reply = new Reply();
	            $reply->user_id = $user['id'];
	            $reply->post_id = $request->input('post_id');
	            $reply->comment_id = $request->input('comment_id');
	            $reply->content = $request->input('reply');
	            $reply->time = date('H:i:s, d-m-Y');
	            $reply->save();

	            return redirect('blogs/'. $id);
	        }
    	}
    }
}

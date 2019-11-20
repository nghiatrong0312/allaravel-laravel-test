<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FeedbackController extends Controller
{
    public function index()
    {
    	return view('/');
    }

    public function savefeedback()
    {
        Mail::send('mailfb', array('email'=>$_POST['customer_email']), function($message){
	        $message->to('tuyenho0701@gmail.com', 'Visitor')->subject('Visitor Feedback!');
	    });
        Session::flash('flash_message', 'Send message successfully!');

        return redirect('/');
    }

}

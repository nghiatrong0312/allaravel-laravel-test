<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Address;
use App\Categories;
use App\Social_network;

class WelcomeController extends Controller
{
    public function index()
    {
    	$address_data 		= Address::cursor();
    	$categories_data 	= Categories::cursor();
    	$social_data 		= Social_network::cursor();
    	return view('/home', [
    		'address_data' 		=> $address_data,
    		'categories_data' 	=> $categories_data,
    		'social_data'		=> $social_data,
    	]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Address;
use App\Social_network;

class ContactController extends Controller
{
	public function index()
	{
		$network_data = Social_network::cursor();
	    $address_data = Address::cursor();
	    return view('contact', [
	    	'address_data' => $address_data,
	    	'network_data' => $network_data,
	    ]);
    }
}

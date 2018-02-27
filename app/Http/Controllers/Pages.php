<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pages extends Controller
{

    public function index(Request $request){
  		return view('index')->with('request',$request);
  	}

}

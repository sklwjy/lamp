<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FriendController extends Controller
{
      public function test()
	   {
	   	// return 11;
	   	return view('home.focusonyou');
	   }
	   

	   public function test1()
	   {
	   	// return 11;
	   	  	return view('home.friend');
	   }
}

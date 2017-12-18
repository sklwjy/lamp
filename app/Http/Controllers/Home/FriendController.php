<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FriendController extends Controller
{
      public function test()
	   {
	   	// return 11;
	   	//查询条件
	   	
	   	return view('home.focusonyou');


	   	// $request->all();
// dd(111);
//        return 222;
//         $link =Link::orderBy('link_id','asc')
//             ->where(function($query) use($request){
//                 //检测关键字
//                 $linkname = $request->input('keywords');
//                 //$email = $request->input('keywords2');
//                 //如果用户名不为空
// //                dd($linkname);
//                 if(!empty($linkname)) {
//                     $query->where('link_name','like','%'.$linkname.'%');
//                 }

//             })
//             ->paginate($request->input('num', 3));
//         return view('admin.link.list',['link'=>$link, 'request'=> $request]);

	   }
	   

	   public function test1()
	   {
	   	// return 11;
	   	  	return view('home.friend');
	   }
}

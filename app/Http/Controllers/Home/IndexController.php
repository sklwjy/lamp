<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Model\home\Advertising;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $advertising = Advertising::get();
//        dd($advertising);
        return view('home/first/first', compact('advertising'));
    }
}

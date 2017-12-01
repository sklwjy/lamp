<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::orderBy('admin_id', 'asc')->get();
        dd($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //给页面返回页面
    public function articleadd()
    {
        return view('admin/article-add');
    }

    public function articlelist()
    {
        return view('admin/article-list');
    } 

    public function adminrole()
    { 
        // return 111;
        return view('admin/admin-role');
    }

     public function productbrand()
    { 
        // return 111;
        return view('admin/product-brand');
    }

     public function productcategory()
    { 
        // return 111;
        return view('admin/product-category');
    }

     public function productlist()
    { 
        // return 111;
        return view('admin/product-list');
    }  

    public function productcategoryadd()
    { 
        // return 111;
        return view('admin/product-category-add');
    }
    
}

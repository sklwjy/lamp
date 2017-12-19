<?php

namespace App\Http\Controllers\Home;

use App\Model\admin\Users;
use App\Model\home\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\home\Userinfo;
use DB;


class AccountController extends Controller
{
    /**
     * 处理客户端传过来的图片
     */

    public function file(Request $request)
    {
        //dd(11);

       // 获取客户端传过来的文件
        $file = $request->file('userinfo_file');
     // $file = $request->all();
     // dd($file);

        if($file->isValid()){
          //  dd($file);
            //        获取文件上传对象的后缀名
            $ext = $file->getClientOriginalExtension();


            //生成一个唯一的文件名，保证所有的文件不重名
            $newfile = time().rand(1000,9999).uniqid().'.'.$ext;


            //设置上传文件的目录
            $dirpath = public_path().'/uploads/';




            //将文件移动到本地服务器的指定的位置，并以新文件名命名
//            $file->move(移动到的目录, 新文件名);
            $file->move($dirpath, $newfile);



            //将文件移动到七牛云，并以新文件名命名
            //\Storage::disk('qiniu')->writeStream('uploads/'.$newfile, fopen($file->getRealPath(), 'r'));


            //将文件移动到阿里OSS
            //OSS::upload($newfile,$file->getRealPath());


            //将上传的图片名称返回到前台，目的是前台显示图片
            return $newfile;

            


        }

    }



    public function edit()
    {
       // return 11;
       // $user_id = session('users')['user_id'];
        $user = session('users');

       // dd($user['user_id']);
        $userinfo = Users::with('userinfo')->where('user_id',$user['user_id'])->first();//user和userinfo的内容

        return view('home/account',compact('userinfo'));
    }


    public function  update(Request $request)
    {
        $input = $request->except('_token','sec','button');
        //var_dump($input);
       // dd($input);
       //dd($input['userinfo_file']);

        $user_id = $input['user_id'];
        //        1. 通过id找到要修改那个用户
        $user = Userinfo::where('user_id', $user_id)->first();
        // dd($user);
       
        if($user){
            $data['userinfo_address'] = $input['a'].$input['b'];
            if(isset($input['c'])) {
                $data['userinfo_address'] = $input['a'].$input['b'].$input['c'];
            }
            $data['userinfo_relaname'] = $input['userinfo_relaname'];
            $data['userinfo_email'] = $input['userinfo_email'];
            $data['userinfo_web'] = $input['userinfo_web'];
            $data['userinfo_intro'] = $input['userinfo_intro'];
            $data['userinfo_sex'] = $input['userinfo_sex'];
            $data['userinfo_file'] = $input['art_thumb'];
            $data['user_id'] = $user_id;
           // dd($data);
            $userinfo = Userinfo::where('user_id', $user_id)->first();
            $res = $userinfo->update($data);
            if($res){
                return redirect('home/account');
            }else{
                return redirect('home/account/');
            }

          }else{
              $data['userinfo_address'] = $input['a'].$input['b'];
              if(isset($input['c'])) {
                  $data['userinfo_address'] = $input['a'].$input['b'].$input['c'];
              }
              $data['userinfo_relaname'] = $input['userinfo_relaname'];
              $data['userinfo_email'] = $input['userinfo_email'];
              $data['userinfo_web'] = $input['userinfo_web'];
              $data['userinfo_intro'] = $input['userinfo_intro'];
              $data['userinfo_sex'] = $input['userinfo_sex'];
              $data['userinfo_file'] = $input['art_thumb'];
              $data['user_id'] = $user_id;

               $res = Userinfo::create($data); 

               if($res){
                return redirect('home/account');
                }else{
                    return redirect('home/account/');
                }
          } 

        
       //dd($res);
//        $user ->

        //dd($input);
//        $input['birthday'] = $input['year'].'-'.$input['month'].'-'.$input['day'];
//        dd($input);

    }

    public function accounts(Request $request)
    {
        $name = $request->except('_token');
        // dd($name);

          $user = session('users');
       //$user = session('users')['user_id'];
        // $id = $request -> input('id');
       // return $userinfo = Users::with('userinfo')->where('user_id',$user['user_id'])->first();
        // $userinfo = Users::where('user_id',$user['user_id'])->first();//user和userinfo的内容
       $res = Userinfo::where('user_id',$user['user_id'])-> update(['userinfo_realname'=>$name['n1']]);//userinfo的内容
       // dd($id);
       //return $id;
     //   $name = $request ->input('userinfo_name');
     // return   $request->input('n1');
        // $res = \DB::table('userinfo') -> where('user_id',$user['userinfo']) -> update(['userinfo_realname'=>$name]);
       // dd($res);
         if($res){
            return 1;
         }else{
            return 0;
         }
    }

   // $user = session('users');
   //     // dd($user['user_id']);
   //      $userinfo = Users::with('userinfo')->where('user_id',$user['user_id'])->first();//user和userinfo的内容
   //      
   

   //        $userinfo = Users::with('userinfo')->where('user_id',$user)->first();
       // return $userinfo;
      // return $userinfo['userinfo']['userinfo_id'];

////    public function account()
////    {
////        dd(11);
////    }
//    /**
//     * Display a listing of the resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function index()
//    {
//       //dd(11);
//        $user = session('users');
////        dd($user['user_id']);
//
//
////        $userinfo = Users::find(46) -> userinfo;
////        dd($userinfo);
////
//        $userinfo = Users::with('userinfo')->where('user_id',$user['user_id'])->first();//user和userinfo的内容
//        //$userinfo = Userinfo::where('user_id',$user['user_id'])->first();//userinfo的内容
////        dd($userinfo);
////        dd($userinfo->userinfo['userinfo_email'] );
////        dd($userinfo->userinfo['user_email'] );//$user -> user_email
//        return view('home/account',compact('userinfo'));
//
//    }
//
//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function create()
//    {
//       // return view('home/account');
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function store(Request $request)
//    {
//        /*
//         * 修改个人信息
//         */
//        //接收用户提交的所有数据
//
//
//    }
//
//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function show($id)
//    {
//        //
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function edit($id)
//    {
////        1. 根据传过来的ID获取要修改的用户记录
//        //$value = $request->session()->get('key');
////        dd(11);
////        $uid = session('users')['user_id'];
//        $uid = session('users')['user_id'];
////        dd($uid);
//        $userinfo = Users::with('userinfo')->where('user_id',$uid['user_id'])->first();//user和userinfo的内容
////        $userinfo = Userinfo::where('user_id',$uid['user_id'])->first();//userinfo的内容
//       // dd($userinfo);
//      //  return view('home/account',compact('userinfo'));
//       // dd($uid);
//        //$user = Users::find($userinfo_id);
//        //dd($user);
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, $id)
//    {
//      //  return 11;
//        dd(11);
//      //  1. 根据传过来的ID获取要修改的用户记录
//        //$value = $request->session()->get('key');
////        dd(11);
////        $uid = session('users')['user_id'];
//        $uid = session('users')['user_id'];
//        dd($uid);
//        $userinfo = Users::with('userinfo')->where('user_id',$uid['user_id'])->first();//user和userinfo的内容
////        $userinfo = Userinfo::where('user_id',$uid['user_id'])->first();//userinfo的内容
//        //dd($userinfo);
//      //  return view('home/account',compact('userinfo'));
//       // dd($uid);
//        //$user = Users::find($userinfo_id);
//        //dd($user);
//       // dd(11);
//       // dd(11);
//       // $input = $request ->except('_token');
//
//        // dd($input);
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        //
//    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Model\admin\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    /**
     *  同步网站配置内容
     */
    public function PutFile()
    {

        //  1 将网站配置表中的内容写入到config文件中
        $conf = Config::pluck('conf_content','conf_name')->all();
//        dd($conf);

        //  2 创建网站配置文件，写入数据
        //配置文件的文件名
        $filename = config_path().'\webconfig.php';
        //  数据库中查到的数据是数组形式，变成字符串形式
        $context ="<?php return \n".var_export($conf,true).';';
        //   dd($con);
        //return $filename;

        file_put_contents($filename,$context);
    }

    /**
     * 批量修改网站配置
     */
    public function ContentChange(Request $request)
    {
        $input =  $request -> all();
        // dd($input);
 //  根据conf_id数组获 取要修改的网站配置记录，然后从conf_content的同下标中取出此网站配置记录要修改成的值
       foreach($input['conf_id'] as $k=> $v)
       {
           // 找到一条要修改的记录
            $conf = Config::find($v);
            // 跟改网站配置内容
            $conf->update(['conf_content'=>$input['conf_content'][$k]]);
       }
        $this -> PutFile();
       return redirect('admin/config');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  网站配置数据
        $config = Config::get();
        foreach($config as $k=> $v)
        {
//            根据当前网站这条记录的field_type字段来决定,conf_content的形式
            switch($v->field_type){
                case 'input':
                    $v->conf_contents = '<input class="lg" type="text" name="conf_content[]" value="'.htmlspecialchars($v->conf_content).'">';
                    break;
                case 'textarea':
                    $v->conf_contents = '<textarea id="" cols="30" rows="10" name="conf_content[]">'.htmlspecialchars($v->conf_content).'</textarea>';
                    break;
                case 'radio':
//
//                    <input type="radio" name="field_type" value="1" >开启　
//                    <input type="radio" name="field_type" value="0" >关闭
//                    $arr
////                    [
////                        0 -> '1|开启',
////                        1 -> '0|关闭'
////                    ]
//                        $item = [
//                            0 =>  1;
//                            1 => 开启;
//                        ];
                    $str = '';
                    $arr = explode(',',$v->field_value);
//                    dd($arr);
                    foreach ($arr as $m=>$n)
                    {
                        $item = explode('|',$n);
                        // dd($item);
                        //如果当前网站配置记录的conf_content的值 == 单选按钮的值，应该给单选按钮添加checked属性
                        if($item[0] == $v->conf_content){
                            $str.= '<input type="radio" checked name="conf_content[]" value="'.$item[0].'" >'.$item[1];
                        }else{
                            $str.= '<input type="radio"  name="conf_content[]" value="'.$item[0].'" >'.$item[1];
                        }
                    }
                    $v->conf_contents = $str;
                    break;
            }
        }
//    dd($config);
        return view('admin/config/list',compact('config'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/config/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('_token');
//        dd($input);
//
        $res = Config::create($input);
        if($res){
            $this->PutFile();
            return redirect('admin/config');
        }else{
            return back();
        }

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
        // 获取要修改的网站配置纪录
        $config = Config::find($id);
//        dd($config);
        switch ($config->field_type){
            case 'input':
                $config->conf_contents = '<input class="lg" type="text" name="conf_content[]" value="' . htmlspecialchars($config->conf_content) . '">';
                break;
            case 'textarea':
                $config->conf_contents = '<textarea id="" cols="30" rows="10" name="conf_content[]">' . htmlspecialchars($config->conf_content) . '</textarea>';
                break;
            case 'radio':
                $str = '';
                $arr = explode(',', $config->field_value);
                foreach ($arr as $m => $n) {
                    $item = explode('|', $n);
                    //如果当前网站配置记录的conf_content的值 == 单选按钮的值，应该给单选按钮添加checked属性
                    if ($item[0] == $config->conf_content) {
                        $str .= '<input type="radio" checked name="conf_content[]" value="' . $item[0] . '" >' . $item[1];
                    } else {
                        $str .= '<input type="radio"  name="conf_content[]" value="' . $item[0] . '" >' . $item[1];
                    }

                }
                $config->conf_contents = $str;
        }
//        dd($config);
        //  返回修改页面 带回修改纪录;
        return view('admin/config/edit',compact('config'));
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
        // 1,获取用户
       $config = Config::find($id);

        $input = $request->except('_token','_method');
//        $input['conf_content'] = serialize($input['conf_content']);
        $str='';
        foreach($input['conf_content'] as $v){
            $str = $v;
        }
        $input['conf_content']= $str;
//        dd($input);
        // 3. 使用模型的update进行更新
        $res = $config-> update($input);
        if($res){
            return redirect('admin/config');
        }else{
            return redirect('admin/config/'.$config->conf_id.'/edit');
        }
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
//        return $id;
        $res = Config::find($id)->delete();

//        dd($res);
        $data = [];
        if($res){
            $data['error'] = 0;
            $data['msg'] ="删除成功";
        }else{
            $data['error'] = 1;
            $data['msg'] ="删除失败";
        }

//        return  json_encode($data);

        return $data;;
    }
}

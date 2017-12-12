<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    public $table = 'news';
    public $primaryKey = 'news_id';
    public $fillable = ['news_name', 'news_title', 'news_content', 'news_classify', 'news_pid', 'news_time', 'news_picture'];
    public $guarded = [];
    public $timestamps = false;


    public  function tree()
    {
        $news = $this->get();
        //对分类数据进行格式化（排序、缩进）
        return $this->getTree($news,0);
    }


    public function getTree($new, $pid)
    {
        //存放最终结果的数组
        $arr = [];
        foreach($new as $k=>$v){
            //如果是当前遍历的类是一级类
            if($v->news_pid == $pid){
                //复制当前分类的名称给news_names字段
                $v->news_names = $v->news_name;
                $arr[] = $v;

                //找当前一级类下的二级类
                foreach ($new as $m=>$n) {
                    //如果一个分类的pid == $v这个类的id,那这个类就是$v的子类
                    if($n->news_pid == $v->news_id){
                        $n->news_names = '|-------'.$n->news_name;
                        $arr[] = $n;
                    }
                }
            }
        }
        return $arr;
    }
}

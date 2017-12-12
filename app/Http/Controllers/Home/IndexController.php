<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Model\home\Navs;
use App\Model\home\News;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
	// 首页
    public function index()
    {
    	// 左边栏 $navs
    	$navs = Navs::get();
    	// dd($navs);
    	
    	// 新闻内容
    	$news = News::orderBy('news_time', 'desc')->get();
    	// dd($news);
    	

        return view('home/first/first', compact('navs','news'));
    }

    // 列表页
    public function list()
    {
    	// 获取传过来的 news_id
    	$news_id = $_GET['news_id'];
    	// dd($news_id);
    	
    	// 根据news_id查出这个分类下的所有新闻
    	$news = News::where('news_pid', $news_id)->orderBy('news_time', 'desc')->get();
    	// dd($news);
    	
    	// 拿到导航数据
    	$navs = Navs::get();

    	return view('home/first/list', compact('news', 'navs'));
    }

    // 新闻的具体信息
    public function info()
    {
    	return 111;
    }

    
}

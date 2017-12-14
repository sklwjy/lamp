<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Model\home\Navs;
use App\Model\home\News;
use App\Model\home\Advertising;
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


    	 $advertising = Advertising::get();
//       dd($advertising);

    	$order = News::orderBy('news_view', 'desc')->take(4)->get();

        return view('home/first/first', compact('navs','news','advertising', 'order'));
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

    	$order = News::orderBy('news_view', 'desc')->take(4)->get();

    	return view('home/first/list', compact('news', 'navs', 'order'));

    }

    // 新闻的具体信息
    public function info()
    {
    	// 获取传过来的id
    	$id = $_GET['id'];

    	$navs = Navs::get();

    	// 通过id查出数据
    	$news = News::where('news_id', $id)->first();
    	// dd($news->news_view);

    	// 让浏览次数加一,再存入数据库
    	$news_view = ++$news->news_view;
    	// dd($news_view);
    	$news->news_view = $news_view;
    	$news->save();
    	// dd($news);
    	
    	// 通过点击次数进行排序
    	$order = News::orderBy('news_view', 'desc')->take(4)->get();
    	// dd($order);

    	return view('home/first/show', compact('news', 'navs', 'order'));
    	
    }

    // 瀑布流
    public function pbl()
    {
        return 111;
    }

    
}

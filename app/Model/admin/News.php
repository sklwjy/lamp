<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    public $table = 'news';
    public $primaryKey = 'news_id';
    public $guarded = ['news_name', 'news_title', 'news_content', 'news_classify', 'news_time'];
    public $timestamps = false;
}

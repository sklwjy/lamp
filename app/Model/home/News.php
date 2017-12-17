<?php

namespace App\Model\home;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public $table = 'news';
    public $primaryKey = 'news_id';
    public $guarded = [];
    public $timestamps = false;
}

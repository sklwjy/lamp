<?php

namespace App\Model\home;

use Illuminate\Database\Eloquent\Model;

class Message.php extends Model
{
    // 这个是微博模块
    public $table = 'messages';
    public $primaryKey = 'messages_id';
    public $guarded = [];
    public $timestamps = false;
}

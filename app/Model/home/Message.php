<?php

namespace App\Model\home;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    // 这个是微博模块
    public $table = 'messages';
    public $primaryKey = 'messages_id';
    public $fillable = ['user_id','messages_time','messages_content','messages_picture'];
    public $guarded = [];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\Model\home\Users', 'user_id', 'user_id');
    }
}

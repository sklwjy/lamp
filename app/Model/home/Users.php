<?php

namespace App\Model\home;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    public $table = 'user';
    public $primaryKey = 'user_id';
    public $fillable = ['user_name', 'user_time', 'user_password', 'user_phone', 'user_email', 'user_status'];
    public $guarded = [];
    public $timestamps = false;
}

<?php

namespace App\Model\home;

use Illuminate\Database\Eloquent\Model;

class Userinfo extends Model
{
    public $table = 'userinfo';
    public $primaryKey = 'userinfo_id';
    public $guarded = [];
    public $timestamps = false;
}

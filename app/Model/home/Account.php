<?php

namespace App\Model\home;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public $table = 'userinfo';
    public $primaryKey = 'userinfo_id';
    public $guarded = [];
    public $timestamps = false;
}

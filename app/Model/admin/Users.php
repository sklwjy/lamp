<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    public $table = 'user';
    public $primaryKey = 'user_id';
    public $guarded = [];
    public $timestamps = false;
}

<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $table = 'admin';
    public $primaryKey = 'admin_id';
    public $guarded = [];
    public $timestamps = false;

}

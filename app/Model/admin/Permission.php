<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $table = 'permissions';
    public $primaryKey = 'id';
    public $guarded = [];
    public $timestamps = false;
}

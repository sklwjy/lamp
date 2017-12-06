<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $table = 'admin';
    public $primaryKey = 'admin_id';
    public $guarded = [];
    public $timestamps = false;

    public function role()
    {
    	return $this->belongsToMany('App\Model\admin\Role','admin_role','admin_id','role_id');
    }

}



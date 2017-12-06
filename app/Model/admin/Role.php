<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    
    public $table = 'roles';
    public $primaryKey = 'id';
    public $guarded = [];
    public $timestamps = false;

    /**
     * 通过角色模型查找关联的用户模型
     */
    public function admin()
    {
    	return $this->belongsToMany(User::class,'admin_role','role_id','admin_id');
    }

    /**
     * 通过角色模型查找关联的权限模型
     */
    public function permission()
    {
    	return $this->belongsToMany(Permission::class,'role_permission','role_id','permission_id');
    }
}

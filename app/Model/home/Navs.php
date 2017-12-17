<?php

namespace App\Model\home;

use Illuminate\Database\Eloquent\Model;

class Navs extends Model
{
    public $table = 'navs';
    public $primaryKey = 'nav_id';
    public $guarded = [];
    public $timestamps = false;
}

<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    public $table = 'link';
    public $primaryKey = 'link_id';
    public $guarded = [];
    public $timestamps = false;
}

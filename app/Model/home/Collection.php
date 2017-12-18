<?php

namespace App\Model\home;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    public $table = 'collections';
    public $primaryKey = 'collections_id';
    public $guarded = [];
    public $timestamps = false;
}

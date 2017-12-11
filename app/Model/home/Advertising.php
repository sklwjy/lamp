<?php

namespace App\Model\home;

use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    public $table = 'advertising';
    public $primaryKey = 'advertising_id';
    public $guarded = [];
    public $timestamps = false;
}

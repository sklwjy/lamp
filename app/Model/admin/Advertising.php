<?php

namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    public $table = 'advertising';
    public $primaryKey = 'advertising_id';
    public $fillable = [];
    public $guarded = [];
    public $timestamps = false;
}

<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/19
 * Time: 9:16
 */

namespace App\SMS;


class M3Result
{
    public $status;
    public $message;

    public function toJson()
    {
        return json_encode($this,JSON_UNESCAPED_UNICODE);
    }

}
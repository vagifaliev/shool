<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 18.06.2021
 * Time: 16:48
 */

namespace App\Lib\Helpers;


class DwgSendSmsStatusObject
{
    private $port;
    private $number;
    private $time;
    private $status;
    private $count;
    private $succ_count;
    private $ref_id;
    private $imsi;
    private $user_id;

    public function __construct($arr)
    {
        foreach ($arr as $key => $item) {
            $this->$key = $item;
        }
    }

    public function __get($name)
    {
        if (isset($this->$name)) {
            return $this->$name;
        } else
            dump('No method exist');
    }
}
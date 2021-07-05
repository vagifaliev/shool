<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 14.04.2021
 * Time: 16:11
 */

namespace App\Lib;


class DwgQueryObject
{
    protected $port;
    protected $user_id;
    protected $number;
    protected $time;
    protected $status;
    protected $count;
    protected $succ_count;
    protected $ref_id;
    protected $imsi;

    public function __construct($array)
    {
        if (is_array($array)) {
            foreach ($array as $key => $item) {
                $this->$key = $item;
            }
        } else {
            dump('Not Array');
        }
    }
}
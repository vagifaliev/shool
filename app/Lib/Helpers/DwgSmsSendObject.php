<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 15.04.2021
 * Time: 18:49
 */

namespace App\Lib\Helpers;


class DwgSmsSendObject
{
    protected $error_code;
    protected $sn;
    protected $sms_in_queue;
    protected $task_id;

    public function __construct($array = null)
    {
        if (is_array($array)) {
//            dump($array);
            foreach ($array as $key => $item) {
                $this->$key = $item;
            }
        }
    }

    public function action($dwg)
    {
//        dd($dwg);
        $smsStatusSend = $dwg->send_sms()[0];
        return new $this($smsStatusSend['smsStatusSend']);
    }

    public function __get($name)
    {
        if (isset($this->$name)) {
            return $this->$name;
        } else
            dump('No method exist');
    }
}
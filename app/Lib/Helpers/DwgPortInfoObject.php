<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 15.04.2021
 * Time: 18:13
 */

namespace App\Lib\Helpers;


class DwgPortInfoObject
{
    protected $port;
    protected $type;
    protected $imei;
    protected $imsi;
    protected $iccid;
    protected $smsc;
    protected $number;
    protected $reg;
    protected $slot;
    protected $callstate;
    protected $signal;
    protected $gprs;
    protected $remain_credit;
    protected $remain_monthly_credit;
    protected $remain_daily_credit;
    protected $remain_daily_call_time;
    protected $remain_hourly_call_time;
    protected $remain_daily_connected;
    protected $ip;

    public function __construct($dwgObj = null, $array = null){
        if (!is_null($array)) {
            foreach ($array as $key => $item) {
                $this->$key = $item;
            }
            $this->ip = $dwgObj->dwgUrl;
        }
    }

    public function action($dwgObj) {
        $item = $this->checkEmptyObj($dwgObj);
//        dd($item);
        if ($item)
            return new $this($dwgObj, $item);
        else
            return false;
    }

    private function checkEmptyObj($dwgObj) {
        $items = $dwgObj->portInfo()[0]['info'][0];
        if ($items['reg'] == 'NO_SIM')
            return false;
        elseif ($items['reg'] == 'POWER_OFF')
            return false;
        else
            return $items;
    }

    public function __get($name)
    {
//        dump($name);
        if (isset($this->$name)) {
            return $this->$name;
        } else
            dump('No method exist object DwgPortInfoObject');
    }
}
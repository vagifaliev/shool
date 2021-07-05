<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 13.04.2021
 * Time: 21:12
 */

namespace App\Lib;


use Carbon\Carbon;

class Dwg
{
    protected $port = 'all';
    protected $ussdCommand = '*106#';
    protected $number;
    protected $imei;
    protected $imsi;
    protected $imsiSendSms;
    protected $reg;
    //login password dwg
    protected $dwgUsername;
    protected $dwgPassword;
    //ipaddress dwg
    protected  $arrDwgUrl;
    protected $dwgUrl;
//    protected $simParam;
    //parametrs imei, imsi... default
    protected $info_type;
    //text sms and ussd
    protected $text;
    protected $textUssdRecive;
    //number to sms and ussd
    protected $item;
    //path to ussd getport ...
    protected $postPathUssdSend;
    protected $getPathPortInfo;
    protected $getPathUssdRecive;
    protected $getPathSmsRecive;
    protected $postUrlSendSms;
    protected $getPathSmsQueryResult;
    protected $reciveStatus;
    protected $user_id;
    protected $time_after;
    protected $time_before;
    protected $encoding;
    protected $action;
    protected $result;


    protected function socket_send($data)
    {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        $host = "192.168.1.137";
        $port = 3030;

        // create socket
        $socket = socket_create(AF_INET, SOCK_DGRAM, getprotobyname('udp')) or die("Could not create socket\n");

        // connect to server
        $result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");
        if ($result === true) {
            echo 'connected';
        }
        dump($data);

        $length = strlen($data);

        while (true) {
            $sent = socket_write($socket, $data, $length);

            if ($sent === false) {
                break;
            }

            // Was the entire msg sent?
            if ($sent < $length) {
                // If not, handle the leftover data.
                $data = substr($data, $sent);
                $length -= $sent;
            } else {
                break;
            }
        }

        dump(socket_read($socket, 8192));
    }

    protected function post_data($data, $get_path)
    {
        $curl = curl_init('http://' . $this->dwgUrl . $get_path);
//        dump($data);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type:application/json"));
        curl_setopt($curl, CURLOPT_USERPWD,"$this->dwgUsername:$this->dwgPassword");
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
//        dd($curl);
        //not verify ssl certificate
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_VERBOSE, true);
        $json_response = curl_exec($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $curl_error = curl_error($curl);
        curl_close($curl);

        return array($status, $json_response);
    }

    protected function get_data($array, $get_path)
    {
        $collect = collect($array);
        $param = $collect->map(function ($item, $key){
            return "$key=$item";
        })->implode('&');
//        dd($array);
//        $curl = curl_init('http://' . $this->dwgUrl . $get_path . '?' . $param);
//        $curl = curl_init('http://' . $this->dwgUrl . $get_path . '?' . 'port=1&info_type=imei,imsi,iccid,smsc,type,number,reg,slot,callstate,signal,gprs,remain_credit,remain_monthly_credit,remain_daily_credit:,remain_daily_calltime,remain_hourly_calltime,remain_daily_connect');
        $curl = curl_init('http://' . $this->dwgUrl . $get_path);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
//        dd($curl);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_USERPWD, "$this->dwgUsername:$this->dwgPassword");
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($curl, CURLOPT_POSTFIELDS, "port=" . $this->port . '&' . 'info_type=' . $param);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $param);
        $json_response = curl_exec($curl);
//        dd($json_response);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        return array($status, $json_response);
    }

    protected function send_sms_data()
    {
        $data = array
        (
            "text" => "#param#",
            "param" => array
            (
                array(
                    "number" => $this->item,
                    "text_param" => array($this->text),
                    "user_id" => $this->user_id,
                ),
            ),
        );
        if ($this->port != NULL || $this->port == 0) {
            $data["port"] = array($this->port);
        }

        if ($this->encoding != NULL) {
            $data["encoding"] = $this->encoding;
        }
        return $data;
    }

    protected function send_ussd_data()
    {
        $data = array
        (
            "command" => "send",
            "text" => $this->ussdCommand,
            "port" => [$this->port]
        );

        return $data;
    }

    protected function query_sms_result_data()
    {
        $data = array();
        if ($this->item != NULL) {
            $data["number"] = array($this->item);
        }
        if ($this->port != NULL) {
            $data["port"] = $this->port;
        }
        if ($this->time_after != NULL) {
            $data["time_after"] = $this->time_after;
        }
        if ($this->time_before != NULL) {
            $data["time_before"] = $this->time_before;
        }
        if ($this->user_id != NULL) {
            $data["user_id"] = $this->user_id;
        }

        return $data;
    }

    protected function query_sms_delivery_status_data($number, $port, $time_after, $time_before)
    {
        $data = array();
        if ($number != NULL) {
            $data["number"] = array($number);
        }
        if ($port != NULL) {
            $data["port"] = array($port);
        }
        if ($time_after != NULL) {
            $data["time_after"] = $time_after;
        }
        if ($time_before != NULL) {
            $data["time_before"] = $time_before;
        }
        return $data;
    }

    protected function getPortInfo() {
        //Formirovanie stroki zaprosa portov v dwg
        $data = [
            'port' => $this->port,
            'info_type' => $this->info_type
        ];
//        dd($param);
        [$status, $result] = $this->get_data($data, $this->getPathPortInfo);
        $this->action = 'portInfo';
        $this->result = json_decode(trim($result), true);
//        dd($this->result);
        return [$this->result];

    }

    protected function ussd_send() {
        $data_ussd = $this->send_ussd_data();
        $path = $this->postPathUssdSend;
//        dd($data_ussd);
        [$status, $result] = $this->post_data($data_ussd, $path);
//        dd($status);
        $this->action = 'ussdSend';
        $this->result = json_decode(trim($result), true);

        return $this->result;
    }

    protected function ussd_recive(){
        $arr = ['port' => $this->port];
        $path = $this->getPathUssdRecive;
//        $result = trim($this->get_data($arr, $path)[1]);
        [$status, $result] = $this->get_data($arr, $path);
        $this->action = 'recivieUssd';
        $this->result = json_decode(trim($result), true);
//        dd($this->result);

        return $this->result;
    }

    protected function sms_recive($flag = 'all', $incoming_sms_id = 0) {
        $arr = [
            'flag' => $flag,
//            'port' => 12,
            'port' => $this->port,
            'incoming_sms_id' => $incoming_sms_id
            ];
        $path = $this->getPathSmsRecive;
        [$status, $result] = $this->get_data($arr, $path);
//        dd($result);
        $this->action = 'recivie';
        $this->result = json_decode(trim($result), true);
        return $this->result;
    }

    protected function query_sms() {
        $data = $this->query_sms_result_data();
        $path = $this->getPathSmsQueryResult;
        [$status, $result] = $this->post_data($data, $path);
        $this->action = 'query';
        $this->result = json_decode(trim($result), true);

        return $this->result;
    }

    protected function sms_send() { //Install parametrs number, ip, port, sms_id
        $data = $this->send_sms_data();
        $path = $this->postUrlSendSms;
        [$status, $result] = $this->post_data($data, $path);
//        dd($result);
        $this->action = 'smsSend';
        $this->result = ['error_code' => $status, ['smsStatusSend' => json_decode(trim($result), true)]];
//        dd($this->result);
        return $this->result;
    }

    protected function cdr() {
        $data = [
            'port' => [$this->port],
            'time_after' => Carbon::now('Asia/Almaty')->toDateTimeString()
        ];
//        dd(Carbon::now()->toDateTimeString());
        $path = env('URL_GET_CDR');
        [$status, $result] = $this->post_data($data, $path);
        $this->action = 'cdr';
        $this->result = json_decode(trim($result), true);
//        dd($result);
        return $this->result;
    }

    public static function dateTimeCompare($obj) {
        return Carbon::parse($obj->timestamp);
    }

    public static function lifeTimeBalans($obj = null) {
        if ($obj != null) {
            $hours = 4;
            $realDate = new Carbon();
            if ($obj != null) {
                $previousDate = self::dateTimeCompare($obj);

                return ($realDate->timestamp - $previousDate->timestamp) / 60 / 60 > $hours;
            }
        }

        return null;
    }

    public function __call($method, $param) {
        switch ($method) {
            case 'portInfo':
                return $this->getPortInfo();
            case 'send_sms':
                return $this->sms_send();
            case 'ussd_send':
                return $this->ussd_send();
            case 'ussd_recive':
                return $this->ussd_recive();
            case 'sms_recive':
                return $this->sms_recive(...$param);
            case 'query_sms':
                return $this->query_sms();
            case 'cdr':
                return $this->cdr();
            case 'xml':
                return $this->socket_send($param[0]);
            default:
                dump('Метод не определен!');
        }

    }

    public function __get($name) {
        if (isset($this->$name)) {
            return $this->$name;
        } else
            dump('No method exist');
//        switch ($name) {
//            case 'port':
//                dump('port :' . $this->port);
//                break;
//            case 'imei':
//                dump('imei: ' . $this->imei);
//                break;
//            case 'imsi':
//                dump('imsi: ' . $this->imsi);
//                break;
//            case 'status':
//                dump('status' . $this->reciveStatus);
//                break;
//            case 'item':
//                dump('smsNumber: ' . $this->item);
//                break;
//            case 'text':
//                dump('smsText: ' . $this->text);
//                break;
//            case 'user_id':
//                dump('user_id: ' . $this->user_id);
//                break;
//            default:
//                dump('Свойство класса не определено!: ' . $name);
//        }
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __construct()
    {
        $this->dwgUsername = env('DWG_USERNAME');
        $this->dwgPassword = env('DWG_PASSWORD');
        $this->arrDwgUrl = explode(',', env('DWG'));
        $this->info_type = 'imei,imsi,iccid,smsc,type,number,reg,slot,callstate,signal,gprs,remain_credit,remain_monthly_credit,remain_daily_credit:,remain_daily_calltime,remain_hourly_calltime,remain_daily_connect';
        $this->getPathPortInfo = env('URL_GET_PORT_INFO');
        $this->postPathUssdSend = env('URL_SEND_USSD');
        $this->postUrlSendSms = env('URL_SEND_SMS');
        $this->getPathUssdRecive = env('URL_RECIVE_USSD');
        $this->getPathSmsRecive = env('URL_INCOMING_SMS');
        $this->getPathSmsQueryResult = env('URL_QUERY_SMS_RESULT');
        $this->imsiSendSms = env('IMSI_SEND_SMS');
    }

}
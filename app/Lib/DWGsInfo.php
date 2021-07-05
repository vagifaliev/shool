<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 18.06.2021
 * Time: 13:14
 */

namespace App\Lib;

use App\Lib\Helpers\DwgPortInfoObject;
use App\Lib\Helpers\DwgRecivieSmsObject;
use App\Lib\Helpers\DwgSmsSendObject;
use App\Lib\Helpers\DwgUssdSendObject;
use App\Lib\Helpers\ObjArrDwgRecivieSmsObject;

class DWGsInfo
{
    private $arrIpDwgsPorts;
    private $dwg;
    private $lib;

    public function __construct()
    {
        $this->dwg = new Dwg();
        $this->lib = new Lib();
    }

    public function findImsi($imsi) {
        $this->arrIpDwgsPorts = $this->lib->dwgInfoReturn($this->dwg, new DwgPortInfoObject());
        $arr = $this->arrIpDwgsPorts;
//        dump($arr);
        foreach ($arr as $items){
            foreach ($items as $item) {
                if ($item instanceof DwgPortInfoObject && $item->imsi == $imsi) {
                    return $item;
                }
            }
        }
        return false;
    }

    public function sendSms($obj, $arrayParam) { //Install parametrs number, text, sms_id, ip, port
        $dwg = $this->dwg;
        $dwg->item = $arrayParam['number'];
        $dwg->text = $arrayParam['text'];
        $dwg->user_id = $arrayParam['user_id'];
        $dwg->dwgUrl = $obj->ip;
        $dwg->port = $obj->port;
        $objDwgSmsSend = new DwgSmsSendObject();

        return $this->lib->smsSend($dwg, $objDwgSmsSend);
    }

    public function arrObjectsDwgRecivieSms($ipaddress) {
        $objArrDwgRecivieSmsObject = new ObjArrDwgRecivieSmsObject();
        $stat = true;
        $countSendRequestDwg = 0;
        while($stat) {
            $arrObjDwgRecivieSmsObjects = $this->dwgIpArrPortInfoBalans($ipaddress);
            sleep(10);
//            dump($arrObjDwgRecivieSmsObjects);
            if($objArrDwgRecivieSmsObject->whileTimestampLifeTime($arrObjDwgRecivieSmsObjects) == true) {
//                dump($objArrDwgRecivieSmsObject->whileTimestampLifeTime($arrObjDwgRecivieSmsObjects));
//                dump('Cicle end');
                $stat = false;
            }
            else {
                $countSendRequestDwg++;
                $stat = true;
            }

//            dump($arrObjDwgRecivieSmsObjects);

            if ($countSendRequestDwg == 4) {
                dump('Error: Count Send Request DWG - 4 ');
                $stat = false;
            }

//            dump('value $tr: ' . $stat);
        }

        $objArrDwgRecivieSmsObject->addArrObjRecivieSms($arrObjDwgRecivieSmsObjects);

        return $objArrDwgRecivieSmsObject;
    }


    public function dwgIpArrPortInfoBalans($ipaddress) {
        $arraysDwgPorts = $this->dwgPortInfos($ipaddress);
//        dump('------------------');
//        dump($arraysDwgPorts);
//        dump('-----------------');
        foreach ($arraysDwgPorts as $obj) {
//            dump($dwgPort);
            $dwgPortInfoObj[] = $this->balansSimCards($obj);
//            dd($dwgPortInfoObj);
        }

        foreach ($dwgPortInfoObj as $portBalansInfo) {
            if ($this->lifeTimeBalans($portBalansInfo) || is_a($portBalansInfo, 'App\Lib\Helpers\DwgPortInfoObject')) {
                dump('port: ' . $portBalansInfo->port . ' Send Ussd *106#');
                dump($this->sendUssdSimBalans($portBalansInfo));
            }
        }

        return $dwgPortInfoObj;
    }

    public function balansSimCards($dwgPort) {
//        dd($dwgPort);
        $arrObj = $this->lib->simPaid($this->dwg, new DwgRecivieSmsObject(), $dwgPort->ip, $dwgPort->port);
//        if ($arrObj[0]->port == 6)
//        dump('==============');
//        dump($arrObj);
//        dump('=================');
        if ($arrObj['paid'] == null)
            return  $this->dwgPortInfos($this->dwg->dwgUrl, $this->dwg->port);

        if ($arrObj['paid'] != null)
            return $arrObj['paid'];
//        dd($arrObj);

        if (is_array($arrObj)) {
            return array_map(function ($input) {
                if (isset($input['paid']))
                    return $input['paid'];
                else
                    return null;
            }, $arrObj);
        }
//        dd($temp);
        return false;
    }



    public function sendUssdSimBalans($obj) {
        $this->lib->ussdSendStatus($this->dwg, new DwgUssdSendObject(), $obj->ip, $obj->port);
    }

    public function dwgPortInfos($ipaddress = null, $port = null) {
        return $this->lib->dwgInfoReturn($this->dwg, new DwgPortInfoObject(), $ipaddress, $port);
    }

    public function lifeTimeBalans($obj) {
        return $this->dwg->lifeTimeBalans($obj);
    }

    public function pingCheck($ipaddress) {
        $agent = "Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $ipaddress);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_exec($ch);

        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($httpcode >= 200 && $httpcode < 300)
            return true;
        else
            return false;
    }

    public function __get($name)
    {
        if (isset($this->$name)) {
            return $this->$name;
        } else
            dump('No method exist');
    }
}
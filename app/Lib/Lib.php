<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 09.06.2021
 * Time: 13:13
 */

namespace App\Lib;

use App\Lib\SmsExtractText;
use App\Lib\Helpers\DwgPortInfoObject;
use App\Lib\Helpers\DwgRecivieSmsObject;
use App\Lib\Helpers\DwgUssdSendObject;
use App\Lib\Helpers\DwgSmsSendObject;

class Lib extends Dwg
{
    public function dwgInfoReturn($objDwg, $obj, $ip = null, $port = null) {
        if (($ip == null && $port == null)){

            return $this->cicleDwgs($objDwg, $obj);
        }

        if (is_null($port)) {
            $objDwg->dwgUrl = $ip;
            $arr = [
                'countSimSlot' => $this->countSim($objDwg)
            ];
//            dump('countSimSlot : ' . $arr['countSimSlot']);
//            dump('dwg Port status : ' . $objDwg->port);
            return $this->ciclePortDwgs($arr, $objDwg, $obj);
        }

        $objDwg->dwgUrl = $ip;
        $objDwg->port = $port;

        return $obj->action($objDwg);
    }

    public function ussdSendStatus($objDwg, $obj, $ip = null, $port = null) {
        if (($ip == null && $port == null)) {

            return $this->cicleDwgs($objDwg, $obj);
        }

        $objDwg->dwgUrl = $ip;
        $objDwg->port = $port;

        return $obj->action($objDwg);

    }

    public function simPaid($objDwg, $obj, $ip = null, $port = null) {
        if (($ip == null && $port == null)) {
            return $this->cicleDwgs($objDwg, $obj);
        }

        if (is_null($port)) {
            $objDwg->dwgUrl = $ip;
            $arr = [
                'countSimSlot' => $this->countSim($objDwg)
            ];
//            dd($countSimSlot);
            return $this->ciclePortDwgs($arr, $objDwg, $obj);
        }

        $objDwg->dwgUrl = $ip;
        $objDwg->port = $port;
        return $obj->action($objDwg);
    }

    public function cdrInfo($objDwg, $obj, $ip = null, $port = null) {
        if (($ip == null && $port == null)) {
            return $this->cicleDwgs($objDwg, $obj);
        }

        $objDwg->dwgUrl = $ip;
        $objDwg->port = $port;

        return $obj->action($objDwg);
    }

    public function smsSend($dwg, $obj) {
        return $obj->action($dwg);
    }

    private function cicleDwgs($dwgObj, $obj) {
        $arrDwgUrlList = $dwgObj->arrDwgUrl;
        $returnObjects = [];
        for ($i = 0; $i < count($arrDwgUrlList); $i++) {
            $dwgObj->dwgUrl = $arrDwgUrlList[$i];
//            $countSimSlot = count($dwgObj->portInfo()[0]['info']);
            $countSimSlot = $this->countSim($dwgObj);
//            dump($countSimSlot);
            if ($obj instanceof DwgPortInfoObject) {
                $arr = [
                    'countSimSlot' => $countSimSlot
                ];
//                dd($arr);
                $returnObjects[$dwgObj->dwgUrl] = $this->ciclePortDwgs($arr, $dwgObj, $obj);
            }

            if ($obj instanceof DwgUssdSendObject) {
                $arr = [
                    'countSimSlot' => $countSimSlot
                ];
                $returnObjects[$dwgObj->dwgUrl] = $this->ciclePortDwgs($arr, $dwgObj, $obj);
            }

            if ($obj instanceof DwgRecivieSmsObject) {
                $arr = [
                    'countSimSlot' => $countSimSlot
                ];
//
                $returnObjects[$dwgObj->dwgUrl] = $this->ciclePortDwgs($arr, $dwgObj, $obj);
            }

            if ($obj instanceof DwgCdrObject) {
                $arr = [
                    'countSimSlot' => $countSimSlot
                ];
//
                $returnObjects[$dwgObj->dwgUrl] = $this->ciclePortDwgs($arr, $dwgObj, $obj);
            }
        }
        return $returnObjects;
    }

    private function ciclePortDwgs($arr, $dwgObj, $obj) {
        $array = [];
        for ($i = 0; $i < $arr['countSimSlot']; $i++) {
            $dwgObj->port = $i;
            $objInfo = $obj->action($dwgObj);
            if ($objInfo)
                $array[] = $objInfo;
        }
        $dwgObj->port = 'all'; //Сбрасывает значения на дефолт
//        dd($array);
        return $array;
    }

    private function countSim($dwgObj) {
//        dump('func DwgClass portInfo ---');
//        dump($dwgObj);
//        dump($dwgObj->portInfo());
        $dwgObj->port = 'all'; //Reset value

        return count($dwgObj->portInfo()[0]['info']);
    }
}
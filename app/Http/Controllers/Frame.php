<?php

namespace App\Http\Controllers;

use App\Lib\DwgCdrObject;
use App\Lib\DwgPortInfoObject;
use App\Lib\DwgRecivieSmsObject;
use App\Lib\DWGsInfo;
use App\Lib\SMS;
use App\Lib\DwgUssdSendObject;
use Carbon\Carbon;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use App\Lib\PamiClient;
use App\Lib\Dwg;
use App\Lib\Lib;
use Symfony\Component\VarDumper\Cloner\Data;
use App\Lib\Helpers\ObjArrDwgRecivieSmsObject;

class Frame extends Controller
{
    public function frame0() {
        return view('site/frame0');
    }

    public function frame1() {
        return view('site/frame1');
    }

    private function pamiCreateObj($command) {
        $pami = new PamiClient();

        return $pami->open($command);
    }

    public function status() {

        $objPami = $this->pamiCreateObj('iax2 show peers');
        $status = $objPami->status;
//        dd($status);

//        $dwgInfo = new DWGsInfo();
//        $dwgPortInfoObj = $dwgInfo->findImsi('4010156791633119');
//        dd($dwgPortInfoObj);
//        $ussdSendInfo = $lib->ussdSendStatus($dwg, new DwgUssdSendObject(), '192.168.1.9', 8);
//        dd($ussdSendInfo);
//        $ussdSendStatus = $lib->ussdSendStatus($dwg);
//        $simPaid = $lib->simPaid($dwg, new DwgRecivieSmsObject());
//        dd($simPaid);
//        $cdr = $lib->cdrInfo($dwg, new DwgCdrObject());
//        dd($cdr);
//        $smsSend = new SMS($dwgPortInfoObj);
//        $smsSend->sendSms('+77757757775', 'Привет с номера +77717366624');
//        $smsSend ->smsSendStatus();
//        dd($smsSend->statusDeliveredObj->status);
//        return view('site/status', ['status' => $status, 'dwgInfo' => $dwgInfo]);
        return view('site/status', ['status' => $status]);
    }

    public function frame2() {
        return view('site/frame2');
    }

    public function fetch() {
        $objPami = $this->pamiCreateObj('iax2 show peers');

//        return view('site/status', ['status' => null, 'fetchiax' => $objPami->fetchIax]);

        return response(['status' => null, 'fetchiax' => $objPami->fetchIax]);
    }

    public function balansSim(Request $request,$id1 = 192, $id2 = 168, $subId = 1, $id3)
    {
        $ipaddress = $id1 . '.' . $id2 . '.' . $subId . '.' . $id3;
//        dd($ipaddress);
        $dwgInfo = new DWGsInfo();

        $obj = $dwgInfo->arrObjectsDwgRecivieSms($ipaddress);
        dd($obj);
    }

    public function sendSms(Request $request) {
        session_start();
        $params = $request->all();
        $arrParams = [];
        if (isset($params)){
            foreach ($params as $key => $param) {
                $arrParams[$key] = $param;
            }
        }
//        dd($arrParams);
        $dwgInfo = new DWGsInfo();
        $imsiSendSms = $dwgInfo->dwg->imsiSendSms;
        if (isset($_SESSION['imsiObj'])) {
            $obj = $_SESSION['imsiObj'];
            $objPortDwg = $dwgInfo->dwgPortInfos($obj->ip, $obj->port);
            if ($objPortDwg->imsi != $dwgInfo->dwg->imsiSendSms) {
                $obj = $dwgInfo->findImsi($imsiSendSms);
                if (is_object($obj))
                    $_SESSION['imsiObj'] = $obj;
                else
                    $_SESSION['imsiObj'] = false;
            }
        }
        else {
            $obj = $dwgInfo->findImsi($imsiSendSms);
            if (is_object($obj))
                $_SESSION['imsiObj'] = $obj;
            else
                $_SESSION['imsiObj'] = false;
        }
//        dd($dwgInfo->balansSimCards($obj));
        if (isset($_SESSION['imsiObj']))
            $status = $dwgInfo->sendSms($_SESSION['imsiObj'], $arrParams);
        else
            $status = false;

        return response(['status' => $status ? $status->error_code : false]);
    }

    public function statusSms(Request $request) {
        $params = $request->all();

        return response(['status' => $params ? $params->error_code : false]);
    }

    public function upload() {
        return view('site/upload');
    }
}

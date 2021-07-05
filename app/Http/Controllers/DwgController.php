<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Page;
use App\Lib\Dwg;
use App\imsiTable;
use App\balansTable;
use App\portTable;
use App\smsTable;
use App\Lib\IncomingContent;
use App\Lib\PamiClient;

class DwgController extends Controller
{
    public function execute()
    {
        $astr = new PamiClient();
        $obj = $astr->open('iax2 show peers');
//        dd($obj->status);
        return view('site/index');
    }
//        //xml construct
//        $xml = new \DOMDocument('1.0', 'utf-8');
//        $xml_simsrv = $xml->createElement('simsrv');
//        $xml_simsrv->setAttribute('version', '1.0');
//        $xml_simsrv->setAttribute('msg_type', 'request');
//        $header = $xml->createElement('header');
//        $xml_simsrv->appendChild($header);
//        $param1 = $xml->createElement('param');
//        $param1->setAttribute('name', 'SN');
//        $param1->setAttribute('value', '3');
//        $param2 = $xml->createElement('param');
//        $param2->setAttribute('name', 'Domain');
//        $param2->setAttribute('value', 'pctel');
//        $param3 = $xml->createElement('param');
//        $param3->setAttribute('name', 'User');
//        $param3->setAttribute('value', 'admin');
//        $param4 = $xml->createElement('param');
//        $param4->setAttribute('name', 'Cmd');
//        $param4->setAttribute('value', 'Heartbeat');
//        $param5 = $xml->createElement('param');
//        $param5->setAttribute('name', 'Retries');
//        $param5->setAttribute('value', '0');
//        $param6 = $xml->createElement('param');
//        $param6->setAttribute('name', 'Timeout');
//        $param6->setAttribute('value', '5000');
//        $param7 = $xml->createElement('param');
//        $param7->setAttribute('name', 'Timestamp');
//        $param7->setAttribute('value', '1617792195');
//        $param8 = $xml->createElement('param');
//        $param8->setAttribute('name', 'Authinfo');
//        $param8->setAttribute('value', MD5('request3pcteladminHeartbeat16177921953rptn30t'));
//        $body = $xml->createElement('Heartbeat');
//        $xml_simsrv->appendChild($body);
//        $header->appendChild($param1);
//        $header->appendChild($param2);
//        $header->appendChild($param3);
//        $header->appendChild($param4);
//        $header->appendChild($param5);
//        $header->appendChild($param6);
//        $header->appendChild($param7);
//        $header->appendChild($param8);
//        $xml->appendChild($xml_simsrv);
//

//
//
//
//        $saveXml = $xml->saveXML();
//
//        $dwg = new Page([
//            'imei' => '55555555',
//            'imsi' => '55555555',
//            'number' => '55555555'
//        ]);
//        $dwg = new Dwg();
//        $imsi = new imsiSave(
//            [
//                'imsi' => 333333333333333,
//                'imei' => 333333333333333,
//                'number' => 456546456
//            ]);
//        $imsi->save();
//        $imsi = imsiTable::where('imsi', 111111111111111)->first();
////        dd(time());
//        $inPort = new portTable([
//            'port' => 7,
//            'time_recivie' => Carbon::now()
//        ]);
////        dd($inPort);
//        dump($imsi->ports()->save($inPort));



////        $dwg->port = 2;
//        $dwg->item = '87757757775';
//        $dwg->text = 'Hohoho';
////            $dwg->save();
////            $dwg->imsi;
////            $dwg->imei;
////            $dwg->item;
////            $dwg->reg;
//            $dwg->user_id = 5;
////            $dwg->cdr();
////            dd($dwg->result);
////          $dwg->ussd_send();
////            $dwg->ussd_recive();
//            $dwg->portInfo();
////            $dwg->sms_recive('all');
////            $dwg->query_sms();
////            $dwg->sms_send();
//            $obj = new IncomingContent($dwg);
//            dd($obj);
//            foreach ($obj->smsIncomingObject as $sms) {
//                dump($sms->text);
 //       return view('site.index');
 //           }
//            phpinfo();
////        $dwg->xml($saveXml);
////
//    }


}

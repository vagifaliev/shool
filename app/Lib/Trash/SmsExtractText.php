<?php
///**
// * Created by PhpStorm.
// * User: Admin
// * Date: 11.06.2021
// * Time: 10:27
// */
//
//namespace App\Lib;
//
//
//class SmsExtractText
//{
//    private $arrText;
//    private $arrSmsPaidInfo;
//
//    public function __construct($arr)
//    {
//        $this->arrText = $arr;
////        dump($arr);
//        foreach ($this->arrText['sms'] as $smsInfo) {
//            if (is_array($smsInfo) && !is_null($smsInfo['imsi'])) {
//                $this->arrSmsPaidInfo[$smsInfo['imsi']] = $this->smsRead($smsInfo);
////                dd($this->arrSmsPaidInfo);
//            }
//        }
////        dd($this->arrSmsPaidInfo);
//        $this->arrSmsPaidInfo['status'] = $this->arrText['error_code'];
//        $this->arrSmsPaidInfo['read'] = $this->arrText['read'];
//        $this->arrSmsPaidInfo['unread'] = $this->arrText['unread'];
////        dd($this->arrSmsPaidInfo);
//    }
//
//    private function smsRead($smsInfo) {
//        $textReplace = preg_replace('/\s+/', '', $smsInfo['text']);
////        dd($this->arrText);
////        dump($this->textReplace);
//        preg_match_all('/(?<=минут:).*(?=мин)/', $textReplace, $mathes);
//        $minute = $mathes[0][0];
////        dd($this->minute);
//        preg_match_all('/\d+(?=SMS$)/', $textReplace, $mathes);
//        $smsCountBalans = $mathes[0][0];
////        dd($this->smsCountBalans);
//        preg_match_all('/(?<=:).*(?=тг.Л)/', $textReplace, $mathes);
//        $balansNoSale = $mathes[0][0];
////        dd($this->balansNoSale);
//        preg_match_all('/(?<=Лимит:).*(?=тг.Д)/', $textReplace, $mathes);
//        $limitBalans = $mathes[0][0];
////        dd($this->limitBalans);
//        preg_match_all('/(?<=кредита:).*(?=тг.О)/', $textReplace, $mathes);
//        $permitPaid = $mathes[0][0];
////        dd($this->permitPaid);
//        $imsi = $smsInfo['imsi'];
//        $timestamp = $smsInfo['timestamp'];
//        $port = $smsInfo['port'];
//        $number = $smsInfo['number'];
//        $incoming_sms_id = $smsInfo['incoming_sms_id'];
//
//        return [
//            'imsi' => $imsi,
//            'timestamp' => $timestamp,
//            'minute' => $minute,
//            'smsCount' => $smsCountBalans,
//            'limitBalans' => $limitBalans,
//            'balansNoSale' => $balansNoSale,
//            'permitPaid' => $permitPaid,
//            'number' => $number,
//            'port' => $port
//            ];
//    }
//
//    public function __get($name)
//    {
//        return $this->$name;
//    }
//}

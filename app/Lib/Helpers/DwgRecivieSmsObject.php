<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 14.04.2021
 * Time: 13:47
 */

namespace App\Lib\Helpers;


use Carbon\Carbon;
use function PHPSTORM_META\type;
use App\Lib\Dwg;

class DwgRecivieSmsObject
{
    protected $incoming_sms_id;
    protected $port;
    protected $number;
    protected $smsc;
    protected $timestamp;
    protected $text;
    protected $imsi;
    protected $minute;
    protected $smsCount;
    protected $limitBalans;
    protected $balansNoSale;
    protected $permitPaid;


    public function __construct($arr = null)
    {
        if (!is_null($arr)) {
//            dd($arr);
            foreach ($arr as $key => $item) {
                if ($key == 'text') {
                    if ($this->toBelongPaidSms($item)) {
                        foreach ($this->paidInfo($item) as $k => $infoInsert)
                            $this->$k = $infoInsert;
                    }
                }
                $this->$key = $item;
            }

        }
//        dd($this);
    }

    public function action($dwgObj)
    {
        $claim = true;
        $arr = $this->smsArrayReciveDwg($dwgObj);
//        dd($arr);
        while($claim){
            $arrObj[] = $arr;
            if (count($arr) > 10)
                $arr = $this->smsArrayReciveDwg($dwgObj, $arr[count($arr) - 1]->incoming_sms_id);
            else
                $claim = false;
        }
//        dd($arrObj);
        $allArraySmsPort = collect($arrObj)->collapse()->all();
        $objPaid = $this->paidCreateObj($allArraySmsPort);
//       dd($objPaid);
        $allArraySmsPort['paid'] = $objPaid;
//       dd($arrObj);

        return $allArraySmsPort;
    }

    private function smsArrayReciveDwg($dwgObj, $incoming_sms_id = 0){
        $arrayObjSmsRecive = $dwgObj->sms_recive('all', $incoming_sms_id)['sms'];
        $arrObj = [];
//        dd($arrayObjSmsRecive);
        foreach ($arrayObjSmsRecive as $sms) {
            $sms['ip'] = $dwgObj->dwgUrl;
//           dd($sms);
            $arrObj[] = new $this($sms);
        }
//        dd($arrObj);

        return $arrObj;
    }

    private function paidInfo($text) {
        $textReplace = preg_replace('/\s+/', '', $text);
//                      dd($this->arrText);
//                      dump($this->textReplace);
        preg_match_all('/(?<=минут:).*(?=мин)/', $textReplace, $mathes);
        if(isset($mathes[0][0])) {
//            dd($mathes);
            $minute = $mathes[0][0];
        }
        else {
            preg_match_all('/(?<=минут:).*(?=сек,)/', $textReplace, $mathes);
//            dd($mathes[0][0] == '0');
            if ($mathes[0][0] == '0') {
//                dd($mathes);
                $minute = $mathes[0][0];
            }
            else {
                dump($mathes);
                dump('preg_match_all return error - minute!');
            }
        }
//                      dd($this->minute);
        preg_match_all('/\d+(?=SMS$)/', $textReplace, $mathes);
        $smsCountBalans = $mathes[0][0];
//                      dd($this->smsCountBalans);
        preg_match_all('/(?<=:).*(?=тг.Л)/', $textReplace, $mathes);
        if (isset($mathes[0][0])) {
            $balansNoSale = $mathes[0][0];
        } else {
            preg_match_all('/(?<=:).*(?=тг.В)/', $textReplace, $mathes);
//            dd($mathes);
            if ($mathes[0][0]) {
//                dd($mathes);
                $balansNoSale = $mathes[0][0];
            }
            else {
                dump($mathes);
                dd('preg_match_all return error - balansNoSale!');
            }
        }
//                      dd($this->balansNoSale);
        preg_match_all('/(?<=Лимит:).*(?=тг.Д)/', $textReplace, $mathes);
        $limitBalans = $mathes[0][0];
//                      dd($this->limitBalans);
        preg_match_all('/(?<=кредита:).*(?=тг.)/', $textReplace, $mathes);
//        dump($mathes);
        if (isset($mathes[0][0])) {
            $permitPaid = $mathes[0][0];
        } else {
            $permitPaid = null;
            dump('preg_match_all return error - permitPaid!');
            dump($mathes);
        }
//                      dd($this->permitPaid);
        return [
            'minute' => $minute,
            'smsCount' => $smsCountBalans,
            'limitBalans' => $limitBalans,
            'balansNoSale' => $balansNoSale,
            'permitPaid' => $permitPaid
            ];
    }

    private function paidCreateObj($array) {
        $paidObj = array_reduce($array, function ($carry, $item) {
//            dd($carry);
            if (is_object($item) && $item->minute != null) {
                if (!is_null($carry)) {
                    $timeCarry = Dwg::dateTimeCompare($carry);
//                dd($timeCarry);
                    $timeItem = Dwg::dateTimeCompare($item);

                    return $timeCarry->timestamp < $timeItem->timestamp ? $item : $carry;

                } else

                   return $item;

            } else

                return $carry;

        });

//        if ($paidObj && $this->toBelongPaidSms($paidObj->text))
//            dd($paidObj);
            return $paidObj;
    }

    private function toBelongPaidSms($smsText){
        return preg_match_all('/(?<=сумма)\s+кредита(?=:)/', $smsText, $mathes);
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        } else
            dump('No method exist');
    }
}
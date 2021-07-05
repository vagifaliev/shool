<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 08.06.2021
 * Time: 13:12
 */

namespace App\Lib\Helpers;


class PamiCommandSend
{
    private $oldArrAttrib;
    private $status = [];
    private $fetchIax = [];

    public function __construct($arrAttrib)
    {
        $this->oldArrAttrib = $arrAttrib;
        $getStatus = $arrAttrib->getRawContent();
        preg_match_all('/.*((\d+\.){3}\d+)(?=\s+\().*/', $getStatus, $mathes);
//        dd($mathes[0]);
        $this->newArrAttrib($mathes[0]);
    }

    private function newArrAttrib($arrays) {
        foreach ($arrays as $arr) {
            $patern1 = '/\s(?=ms)/';
            $patern2 = '/\/\w+(?=\s+)/';
            $arrReplace = preg_replace($patern1, '', $arr);
            $arrReplace = preg_replace($patern2, '', $arrReplace);
//            dd($arrReplace);
            $expArr = explode(' ', $arrReplace);
//            dd($expArr);
            $arrFilter = array_values(array_filter($expArr, function ($arr) {
                if ($arr)
                    return $arr;
            }));
            count($arrFilter) == 8 ? ([$name, $ipaddress,,,$port,,$status, $timeReg] = $arrFilter) : ([$name, $ipaddress,,,$port,,$status] = $arrFilter);
            preg_match_all('/\d+/', $timeReg, $timeR);
//            dd($maths[0][0]);
            $this->status[$name] =
                [
                    'name' => $name,
                    'ipaddress' => $ipaddress,
                    'port' => $port,
                    'status' => $status,
                    'timeReg' => $status == 'UNREACHABLE' ? null : $timeReg,
                ];
//          dd($this->infoStatus);

            $this->fetchIax[$name] = ($status == 'UNREACHABLE' ? null : $timeR[0][0]);
        }
    }

    public function __get($name)
    {
        return $this->$name;
    }


}
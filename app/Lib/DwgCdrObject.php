<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 15.04.2021
 * Time: 12:00
 */

namespace App\Lib;


class DwgCdrObject
{
    protected $port;
    protected $number;
    protected $start_date;
    protected $answer_date;
    protected $duration;
    protected $source_number;
    protected $destination_number;
    protected $direction;
    protected $ip;
    protected $codec;
    protected $hangup;
    protected $gsm_code;
    protected $bcch;

    public function __construct($arr = null)
    {
        if (!is_null($arr)) {
//            dd($arr);
            foreach ($arr as $key => $item) {
                $this->$key = $item;
            }

        }
//        dump($this);
    }

    public function action($dwgObj)
    {
        $arrayObjCdrRecive = $dwgObj->cdr()['cdr'];
        $arrObj = [];
        if (!empty($arrayObjCdrRecive)) {
//            dd($arrayObjCdrRecive);
            foreach ($arrayObjCdrRecive as $cdr) {
//                dd($cdr);
                if (is_array($cdr)) {
                    $arrObj[] = new $this($cdr);
                }
            }
//            dd($arrObj);
            return $arrObj;
        }
    }

    public function __get($name)
    {
        if (isset($this->$name)) {
            return $this->$name;
        } else
            dump('No method exist');
    }
}
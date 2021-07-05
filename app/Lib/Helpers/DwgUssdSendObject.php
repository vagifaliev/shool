<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 15.04.2021
 * Time: 18:35
 */

namespace App\Lib\Helpers;


class DwgUssdSendObject
{
    protected $port;
    protected $status;

    public function __construct($dwgObj = null)
    {
        if (!is_null($dwgObj)) {
            $arrUssd = $dwgObj->ussd_send()['result:'][0];
//            dd($arrUssd);
            foreach ($arrUssd as $key => $item) {
                $this->$key = $item;
            }
        }
    }

    public function action($dwgObj) {
        return new $this($dwgObj);
    }

    public function __get($name)
    {
        if (isset($this->$name)) {
            return $this->$name;
        } else
            dump('No method exist');
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 18.06.2021
 * Time: 14:29
 */

namespace App\Lib;


use App\Lib\Helpers\DwgPortInfoObject;
use App\Lib\Helpers\DwgSendSmsStatusObject;
use App\Lib\Helpers\DwgSmsSendObject;

class SMS
{
    private $dwg;
    private $statusSendToPort;
    private $querySmsResult;
    private $statusDeliveredObj;

    public function __construct($obj)
    {
        if ($obj instanceof DwgPortInfoObject) {
            $dwg = new Dwg();
            $dwg->dwgUrl = $obj->ip;
            $dwg->port = $obj->port;
            $this->dwg = $dwg;
        }
    }

    public function sendSms($number, $smsText) {
        $this->dwg->text = $smsText;
        $this->dwg->item = $number;
        $this->dwg->user_id = random_int(100, 100000);
        $this->statusSendToPort = $this->dwg->sms_send();
    }

    public function smsSendStatus() {
        $this->querySmsResult = $this->dwg->query_sms();
        $arrResult = $this->querySmsResult['result'];
        if (!empty($arrResult)) {
            foreach ($arrResult as $item) {
                if (!empty($item) && !empty($item['user_id'])) {
                    if ($item['user_id'] == $this->dwg->user_id)
                        $this->statusDeliveredObj = new DwgSendSmsStatusObject($item);
                }
            }
        }
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        } else
            dump('No method exist');
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25.06.2021
 * Time: 11:38
 */

namespace App\Lib\Helpers;


use App\Lib\Dwg;

class ObjArrDwgRecivieSmsObject
{
    private $arrObjDwgRecivieSmsObjects;

    public function __construct()
    {
    }

    public function whileTimestampLifeTime($arrObjRecivieSms)
    {
        foreach ($arrObjRecivieSms as $obj) {
            if (is_a($obj, 'App\Lib\Helpers\DwgRecivieSmsObject') && Dwg::lifeTimeBalans($obj)) {
                dump('lifetime no actuale');
                return false;
            }
            elseif (is_a($obj, 'App\Lib\Helpers\DwgPortInfoObject')) {
                dump('No obj DwgRecivieSmsObject');
                return false;
            }
            else
                continue;
        }
        dump('Balans actuale');
        return true;
    }

    public function addArrObjRecivieSms($arrObjDwgRecivieSmsObjects) {
        foreach ($arrObjDwgRecivieSmsObjects as $obj) {
            $this->arrObjDwgRecivieSmsObjects[] = $obj;
        }
        return $this;
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 15.04.2021
 * Time: 13:44
 */

namespace App\Lib;


class DwgRecivieUssdObject
{
    protected $port;
    protected $text;

    public function __construct($array)
    {
        if (is_array($array)) {
            foreach ($array as $key => $item) {
                if ($key != 'text') {
                    $this->$key = $item;
                } else {
//                    dd($item);
                    if ($item) {
                        $this->$key = $item;
                        preg_match('/(?<=минут: )\d+(?= мин)*/', $item, $math);
                        if (count($math) == 1)
                            $this->paidBalans = $math[0];
                        else
                            $this->paidBalans = null;
                        preg_match('/(?<=: )\d+(?= SMS)/', $item, $math);
                        if (count($math) == 1)
                            $this->paidSms = $math[0];
                        else
                            $this->paidSms = null;
//                    dd($test);
                    }
                }

            }
        } else {
            dump('Not Array');
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
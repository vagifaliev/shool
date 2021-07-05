<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class imsiTable extends Model
{
    protected $table = 'imsiTables';

    protected $fillable = ['imsi', 'imei', 'number'];

    public function ports() {
        return $this->hasMany('App\portTable', 'imsi_id', 'id');
    }

    public function sms() {
        return $this->hasMany('App\smsTable', 'imsi_id');
    }

    public function balans() {
        return $this->hasMany('App\balansTable', 'imsi_id');
    }

}

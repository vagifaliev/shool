<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class smsTable extends Model
{
    protected $fillable = ['imsi_id', 'text', 'statusInOut', 'numberSendSms', 'time_recivie'];

    public function imsi() {
        return $this->belongsTo('App\imsiTable');
    }
}

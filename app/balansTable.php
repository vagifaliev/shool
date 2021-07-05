<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class balansTable extends Model
{
    protected $fillable = ['imsi_id', 'coin', 'time_recivie'];

    public function imsi() {
        return $this->belongsTo('App\imsiTable');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class portTable extends Model
{
    protected $table = 'portTables';
    protected $fillable = ['imsi_id', 'port', 'time_recivie'];

    public function imsi() {
        return $this->belongsTo('App\imsiTable');
    }
}

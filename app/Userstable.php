<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userstable extends Model
{
    protected $fillable = ['name', 'middlename', 'lastname', 'number'];
}

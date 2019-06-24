<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    //
    protected $connection = 'attendance';
    protected $primaryKey = 'race_id';

}

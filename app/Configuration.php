<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    //
 	protected $connection = 'attendance';
 	protected $primaryKey = 'id';
    protected $table = 'system_config';
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
 	protected $connection = 'attendance';
    protected $primaryKey = 'event_id';
    protected $table = 'events';

    public function attendance()
    {
    	return $this->hasMany('App\Attendance','event_id','event_id');
    }

}

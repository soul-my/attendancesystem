<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    //
  	protected $connection = 'attendance';
    protected $primaryKey = 'attendance_id';
    protected $table = 'attendances';

    public function parents()
    {
    	return $this->hasMany('App\StudentParent','parent_id','parent_id');
    }
}

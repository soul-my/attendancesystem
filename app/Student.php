<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $connection = 'attendance';
    protected $primaryKey = 'student_id';

    public function class(){
    	return $this->hasOne('App\Classroom','class_id','class_id');
    }

    public function parents(){
    	return $this->hasOne('App\StudentParent','parent_id','parent_id');
    }
}

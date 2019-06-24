<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $connection = 'attendance';
    protected $primaryKey = 'form_id';
    protected $table = 'forms';


    public function classrooms()
    {
    	return $this->hasMany('App\Classroom', 'form_id', 'form_id');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    //
    protected $connection = 'attendance';
    protected $primaryKey = 'class_id';
    protected $table = 'classrooms';


    
}

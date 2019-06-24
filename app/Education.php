<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    //
    protected $connection = 'attendance';
    protected $primaryKey = 'education_id';
    protected $table = 'educations';
}

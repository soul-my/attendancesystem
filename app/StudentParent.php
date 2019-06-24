<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentParent extends Model
{
    //
    protected $connection = 'attendance';
    protected $table = 'parents';
    protected $primaryKey = 'parent_id';


    //Dad's data
    public function race()
    {
    	return $this->hasOne('App\Race','race_id', 'race_id');
    }

    public function religion()
    {
    	return $this->hasOne('App\Religion', 'religion_id','religion_id');
    }

    public function education()
    {
    	return $this->hasOne('App\Education', 'education_id','education_id');
    }

    public function income()
    {
        return $this->hasOne('App\Income', 'income_id', 'income_id');
    }
    //end of Dad's data

    //mom's data
    public function mom_race()
    {
        return $this->hasOne('App\Race','race_id', 'mother_race_id');
    }

    public function mom_religion()
    {
        return $this->hasOne('App\Religion', 'religion_id','mother_religion_id');
    }

    public function mom_education()
    {
        return $this->hasOne('App\Education', 'education_id','mother_education_id');
    }

    public function mom_income()
    {
        return $this->hasOne('App\Income', 'income_id', 'mother_income_id');
    }
    //end of mom's data

    public function children()
    {
        return $this->hasMany('App\Student', 'parent_id', 'parent_id');
    }
}
    
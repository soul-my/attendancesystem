<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    //
 	protected $connection = 'attendance';
    protected $primaryKey = 'income_id';
    protected $table = 'incomes';
}

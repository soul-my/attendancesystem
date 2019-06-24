<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditTrail extends Model
{
    //
    protected $connection = 'attendance';
    protected $primaryKey = 'id';
    protected $table = 'audit_trail';
}

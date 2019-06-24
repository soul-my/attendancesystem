<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditTrailUserLog extends Model
{
    //
    protected $connection = 'attendance';
    protected $primaryKey = 'id';
    protected $table = 'audit_trail_users_log';
}

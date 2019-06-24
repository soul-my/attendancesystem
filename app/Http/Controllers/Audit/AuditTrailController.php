<?php

namespace App\Http\Controllers\Audit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\AuditTrail as Audit;
use App\AuditTrailUserLog as AuditUser;


class AuditTrailController extends Controller
{
    public static function login(Request $request,$timestamp,$event_type = 'login')
    {
        //
        $record = new AuditUser;
        $record->event_type = $event_type;
        $record->request = $request;
        $record->timestamp = $timestamp;

        $record->save();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function created($event_type = 'not defined',$user, $old, $new, $timestamp)
    {
        //
        $record = new Audit;
        $record->event_type = $event_type;
        $record->user_data = $user;
        $record->old_data = $old;
        $record->new_data = $new;
        $record->timestamp = $timestamp;

        $record->save();
    }

    public static function updated($event_type = 'not defined',$user, $old, $new, $timestamp)
    {
        //
        $record = new Audit;
        $record->event_type = $event_type;
        $record->user_data = $user;
        $record->old_data = $old;
        $record->new_data = $new;
        $record->timestamp = $timestamp;

        $record->save();
    }

    public static function deleted()
    {
        //
    }



}

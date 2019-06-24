<?php

namespace App\Http\Controllers\PDF;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\StudentParent as StudentParent;
use Yajra\Datatables\Datatables;
use App\Race as Race;
use App\Religion as Religion;
use App\Education as Education;
use App\Income as Income;
use App\Event as Event;
use App\Attendance as Attendance;
use App\Classroom as Classroom;

use DB;
use Validator;
use PDF;

class PDFController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function generate_attendance()
    {
        $event_id = Input::get('event');
        $type = Input::get('type');

        if ($event_id == null) {
            echo "Sila masukkan info program";
        }else{
            $event = Event::find($event_id);

            if ($event != null && $type == null || $event != null && $type == 'all') 
            {
                
                //dd($event->attendance);
                $attendees = array();
                foreach($event->attendance as $attendee)
                {
                    array_push($attendees, $attendee->parent_id);
                }

                //dd($attendees);

                $parents = array();
                $counter = 1;
                foreach($attendees as $attendee)
                {
                    $parentinfo = StudentParent::find($attendee);

                    array_push($parents, [
                        'index'=> $counter, 
                        'info'=> $parentinfo,
                    ]);
                    $counter++;
                }

                $data = [
                    'event' => $event,
                    'records' => $parents,
                ];

                

                $pdf = PDF::loadView('components.pdf.attendance', $data);
                return $pdf->stream();
            
            }else{
                echo "program tidak dijumpai";
            }

            
        }
        
        
    }
}

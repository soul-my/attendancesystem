<?php

namespace App\Http\Controllers\Attendance;

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


use Auth;
use DB;
use Validator;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
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
        $event_id = Input::get('event');

        if ($event_id == null) {
            $event_list = Event::orderBy('date','asc')->get();

            return view('admin.attendance.create', [
                'event_id' => $event_id,
                'event_list' => $event_list,
            ]);
        }

        return view('admin.attendance.create', [
            'event_id' => $event_id,
        ]);
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
        $parent_id = StudentParent::where('ic_number','=',$request->ic_number)->first()->parent_id;
        $event_id = $request->event_id;

        $attendance = new Attendance;
        $attendance->event_id = $event_id;
        $attendance->parent_id = $parent_id;

        $attendance->save();

        if(Auth::User()->access_level == 3){
            return redirect()->route('admin.attendance.create',['modal'=>'show']);
        }

        return redirect()->route('admin.events.show', ['event' => $event_id]);
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
    public function delete(Request $request)
    {
        //
        $record = Attendance::find($request->attendance_id);

        if ($record->delete()) {
            return response()->json(['status'=>'success','message'=>'Maklumat telah dihapuskan']);
        }else{
            return response()->json(['status'=>'failed','message'=>'Maklumat tidak dapat dihapuskan']);
        }
    }

    public function datatable_event_view()
    {
        $event_id = Input::get('event');
        $attendances = Attendance::where('event_id','=', $event_id);
        return Datatables::of($attendances)
            ->addColumn('parents', function ($attendance) {

                $parents = StudentParent::find($attendance->parent_id);
                return $parents->name;

            })
            ->addColumn('children', function ($attendance) {

                $parents = StudentParent::find($attendance->parent_id);
                $children = $parents->children;
                $names = "";

                foreach($children as $child)
                {
                    $names .= $child->name.'<br/>';
                }

                return $names;

            })
            ->addColumn('btn_edit_delete', function ($attendance) {
                return '
                        <div class="row pl-4">
                            <button class="delete-button btn btn-sm btn-rounded btn-outline-danger waves-effect " type="button" data-toggle="modal" data-target="#warning-modal" onclick=delete_data("'.$attendance->attendance_id.'")><i class="fa fa-times fa-3x" aria-hidden="true"></i></button>
                        </div>
                     ';

            })
            ->rawColumns(['parents','children','btn_edit_delete'])
            ->make(true);

    } 
}

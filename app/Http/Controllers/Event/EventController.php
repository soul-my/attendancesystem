<?php

namespace App\Http\Controllers\Event;

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

use Auth;
use DB;
use Validator;

class EventController extends Controller
{

    public function __construct(){
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

        if (Auth::User()->access_level == 3) {
            return redirect()->route('admin.index');
        }
        return view('admin.events.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (Auth::User()->access_level == 3) {
            return redirect()->route('admin.index');
        }
        return view('admin.events.create');
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
        //dd($request);
        $event = new Event;

        $event->event_name = $request->name;
        $event->event_description = $request->description;
        $event->date = $request->prefix__date__suffix;
        $event->save();

        return redirect()->route('admin.events.show', ['events' =>$event->event_id]);

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
        if (Auth::User()->access_level == 3) {
            return redirect()->route('admin.index');
        }

        $record = Event::find($id);

        return view('admin.events.view', ['record' => $record]);

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
        if (Auth::User()->access_level == 3) {
            return redirect()->route('admin.index');
        }
        
        $record = Event::find($id);
        return view('admin.events.edit', ['record' => $record]);
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
        $record = Event::find($id);

        $record->event_name = $request->name;
        $record->event_description = $request->description;
        $record->date = $request->prefix__date__suffix;
        $record->save();

        return redirect()->route('admin.events.show',['event'=>$record->event_id]);
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
        $record = Event::find($request->event_id);
        
        if ($record->delete()) {
            return response()->json(['status'=>'success','message'=>'Maklumat telah dihapuskan']);
        }else{
            return response()->json(['status'=>'failed','message'=>'Maklumat tidak dapat dihapuskan']);
        }
    }

    public function datatable_index()
    {
        $events = Event::query();
        return Datatables::of($events)
            ->addColumn('btn_edit_delete', function ($event) {
                return '
                        <div class="row pl-4">
                            <a href="'.route('admin.events.show',['event_id' => $event->event_id]).'">
                            <button class="edit-button btn btn-sm btn-rounded btn-outline-primary waves-effect " type="button" id="edit-button"><i class="fa fa-pencil-square-o fa-3x" aria-hidden="true"></i></button>
                            </a>
                            <button class="delete-button btn btn-sm btn-rounded btn-outline-danger waves-effect " type="button" data-toggle="modal" data-target="#warning-modal" onclick=delete_data("'.$event->event_id.'")><i class="fa fa-times fa-3x" aria-hidden="true"></i></button>
                        </div>
                     ';

            })
            ->rawColumns(['btn_edit_delete'])
            ->make(true);
    }
}

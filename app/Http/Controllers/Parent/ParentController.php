<?php

namespace App\Http\Controllers\Parent;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use Yajra\Datatables\Datatables;
use App\Http\Controllers\Audit\AuditTrailController as Auditor;
use App\StudentParent as StudentParent;
use App\Race as Race;
use App\Religion as Religion;
use App\Education as Education;
use App\Income as Income;
use App\Student as Student;

use Auth;
use DB;
use Validator;
use Response;



class ParentController extends Controller
{

    public function __construct() {
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
        return view('admin.parents.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $races = Race::all();
        $religions = Religion::all();
        $educations = Education::all();
        $incomes = Income::all();

        return view('admin.parents.create', [
            'races' => $races,
            'religions' => $religions,
            'educations' => $educations,
            'incomes' => $incomes,

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

        $validate = Validator::make($request->all(), [

            'icnumber' => 'required|unique:attendance.parents,ic_number',
            'phoneNo' => 'required|unique:attendance.parents,phone_number',
            'email' => 'required|unique:attendance.parents,email',

        ]);

        if ($validate->fails()) {

            return redirect()->back()->withInput($request->all())->withErrors($validate->errors());
        }

        //
        $parent_info = new StudentParent;
        $parent_info->name = $request->name;
        $parent_info->ic_number = $request->icnumber;
        $parent_info->address = $request->address;
        $parent_info->phone_number = $request->phoneNo;
        $parent_info->email = $request->email;
        $parent_info->profession = $request->profession;
        $parent_info->race_id = $request->race;
        $parent_info->religion_id = $request->religion;
        $parent_info->education_id = $request->education;
        $parent_info->income_id = $request->income;

        //mother info
        $parent_info->mother_name = $request->mother_name;
        $parent_info->mother_icnumber = $request->mother_icnumber;
        $parent_info->mother_phone_number = $request->mother_phoneNo;
        $parent_info->mother_email = $request->mother_email;
        $parent_info->mother_profession = $request->mother_profession;
        $parent_info->mother_race_id = $request->mother_race;
        $parent_info->mother_religion_id = $request->mother_religion;
        $parent_info->mother_education_id = $request->mother_education;
        $parent_info->mother_income_id = $request->mother_income;

        $parent_info->save();

        $timestamp = Carbon::now()->toDateTimeString();
        $audit = Auditor::created('create',Auth::User(),'-',$parent_info,$timestamp);

        return redirect()->route('admin.parent.show', ['parent'=>$parent_info->parent_id]);
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
        $record = StudentParent::where('parent_id',$id)->first();
        return view('admin.parents.view', [
            'record' => $record
        ]);
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
        $record = StudentParent::find($id);
        $races = Race::all();
        $religions = Religion::all();
        $educations = Education::all();
        $incomes = Income::all();

        return view('admin.parents.edit',[
            'record'=>$record,
            'races' => $races,
            'religions' => $religions,
            'educations' => $educations,
            'incomes' => $incomes,
        ]);
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
        $parent_info = StudentParent::find($id);

        $oldData = $parent_info;

        $parent_info->name = $request->name;
        $parent_info->ic_number = $request->icnumber;
        $parent_info->address = $request->address;
        $parent_info->phone_number = $request->phoneNo;
        $parent_info->email = $request->email;
        $parent_info->profession = $request->profession;
        $parent_info->race_id = $request->race;
        $parent_info->religion_id = $request->religion;
        $parent_info->education_id = $request->education;
        $parent_info->income_id = $request->income;

        //mother info
        $parent_info->mother_name = $request->mother_name;
        $parent_info->mother_icnumber = $request->mother_icnumber;
        $parent_info->mother_phone_number = $request->mother_phoneNo;
        $parent_info->mother_email = $request->mother_email;
        $parent_info->mother_profession = $request->mother_profession;
        $parent_info->mother_race_id = $request->mother_race;
        $parent_info->mother_religion_id = $request->mother_religion;
        $parent_info->mother_education_id = $request->mother_education;
        $parent_info->mother_income_id = $request->mother_income;

        $parent_info->save();

        $timestamp = Carbon::now()->toDateTimeString();
        $audit = Auditor::created('update',Auth::User(),$oldData,$parent_info,$timestamp);

        return redirect()->route('admin.parent.show',['parent' => $parent_info->parent_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $record = StudentParent::find($request->parent_id);
        $children = Student::where('parent_id','=',$request->parent_id)->delete();
        if ($record->delete()) {
            return response()->json(['status'=>'success','message'=>'Maklumat telah dihapuskan']);
        }else{
            return response()->json(['status'=>'failed','message'=>'Maklumat tidak dapat dihapuskan']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  None
     * @return \Illuminate\Http\Response
     */
    public function datatable()
    {
        // $parent_id = Input::get('parent');
        // $studentParent = StudentParent::where('parent_id',$parent_id);
        $studentParent = StudentParent::query();
        return Datatables::of($studentParent)
            ->addColumn('btn_edit_delete', function ($studentParent) {
                return '
                        <div class="row">
                            <a href="parent/'.$studentParent->parent_id.'">
                            <button class="edit-button btn btn-sm btn-rounded btn-outline-primary waves-effect " type="button" id="edit-button"><i class="fa fa-pencil-square-o fa-3x" aria-hidden="true"></i></button>
                            </a>
                            <button class="delete-button btn btn-sm btn-rounded btn-outline-danger waves-effect " type="button" id="' . $studentParent->parent_id . '" data-toggle="modal" data-target="#warning-modal" onclick=delete_data("'.$studentParent->parent_id.'")><i class="fa fa-times fa-3x" aria-hidden="true"></i></button>
                        </div>
                     ';

            })
            ->rawColumns(['btn_edit_delete'])
            ->make(true);
    }


    public function validate_ic()
    {
        $icNo = Input::get('ic');

        if ($icNo == null) {
            return response()->json(['status'=>'error','message'=>'sila masukkan no ic']);
        }else{

            $record = StudentParent::where('ic_number', '=', $icNo)->get();
            if ($record->count() > 0) {
                return response()->json(['status' => 'berjaya','message' => $record]);
            }else{
                return response()->json(['status' => 'error', 'message'=>'no ic tiada dalam pangkalan data']);
            }

        }

    }
}

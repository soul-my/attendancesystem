<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Race as Race;
use App\Religion as Religion;
use App\Education as Education;
use App\Income as Income;
use DB;
use Validator;
use Illuminate\Support\Facades\Input;
use App\StudentParent as StudentParent;
use App\Student as Student;
use App\Form as Form;
use App\Classroom as Classroom;

class StudentController extends Controller
{

    public function __construct() {
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
        return view('admin.students.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $classrooms = Classroom::all();

        $parent_id = Input::get('parent');
        return view('admin.students.create',[
            'parent_id' => $parent_id,
            'classrooms' => $classrooms,
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
        $record = new Student;
        $record->name = $request->name;
        $record->ic_number = $request->icnumber;
        $record->phone_number = $request->phoneNo;
        $record->class_id = $request->classroom;

        if (isset($request->parent_id)) {
            $record->parent_id = $request->parent_id;
        }else{
            $parent_record = StudentParent::where('ic_number',$request->parent_ic)->first();

            if ($parent_record != null) {
                $record->parent_id = $parent_record->parent_id;
            }
        }

        $record->save();
        return redirect()->route('admin.parent.show',['parent' => $record->parent_id]);
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
        $record = Student::find($id);

        return view('admin.students.view', [
            'record'=>$record,

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
        $record = Student::find($id);
        $classrooms = Classroom::all();
        $parent_id = $record->parent_id;

        return view('admin.students.edit',['record'=>$record,'classrooms' => $classrooms,'parent_id'=>$parent_id]);
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
        $record = Student::find($id);
        $record->name = $request->name;
        $record->ic_number = $request->icnumber;
        $record->phone_number = $request->phoneNo;
        $record->class_id = $request->classroom;
        $record->parent_id = $request->parent_id;

        $record->save();

        return redirect()->route('admin.student.show',['student'=>$record->student_id]);
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
    public function delete(Request $request)
    {   
        $record = Student::find($request->student_id);
        
        if ($record->delete()) {
            return response()->json(['status'=>'success','message'=>'Maklumat telah dihapuskan']);
        }else{
            return response()->json(['status'=>'failed','message'=>'Maklumat tidak dapat dihapuskan']);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function datatable()
    {
        $parent_id = Input::get('parent');
        $students = Student::where('parent_id',$parent_id);

        return Datatables::of($students)
            ->addColumn('classroom', function ($studentParent) {
                $classroom = Classroom::find($studentParent->class_id);

                return $classroom->form.' '.$classroom->name;
            })
            ->addColumn('btn_edit_delete', function ($studentParent) {
                return '
                        <div class="row">
                            <a href="'.route('admin.student.show',['student'=>$studentParent->student_id]).'">
                            <button class="edit-button btn btn-sm btn-rounded btn-outline-primary waves-effect " type="button" id="edit-button"><i class="fa fa-pencil-square-o fa-3x" aria-hidden="true"></i></button>
                            </a>
                            <button class="delete-button btn btn-sm btn-rounded btn-outline-danger waves-effect " type="button" data-toggle="modal" data-target="#warning-modal" onclick=delete_data("'.$studentParent->student_id.'")><i class="fa fa-times fa-3x" aria-hidden="true"></i></button>
                        </div>
                     ';

            })
            ->rawColumns(['btn_edit_delete','classroom'])
            ->make(true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function datatable_index()
    {
        $students = Student::query();
        return Datatables::of($students)
            ->addColumn('parent', function ($studentParent) {
                $parent = StudentParent::find($studentParent->parent_id);

                return $parent->name;
            })
            ->addColumn('classroom', function ($studentParent) {
                $classroom = Classroom::find($studentParent->class_id);

                return $classroom->form.' '.$classroom->name;
            })
            ->addColumn('btn_edit_delete', function ($studentParent) {
                return '
                        <div class="row">
                            <a href="'.route('admin.student.show',['student'=>$studentParent->student_id]).'">
                            <button class="edit-button btn btn-sm btn-rounded btn-outline-primary waves-effect " type="button" id="edit-button"><i class="fa fa-pencil-square-o fa-3x" aria-hidden="true"></i></button>
                            </a>
                            <button class="delete-button btn btn-sm btn-rounded btn-outline-danger waves-effect " type="button" data-toggle="modal" data-target="#warning-modal" onclick=delete_data("'.$studentParent->student_id.'")><i class="fa fa-times fa-3x" aria-hidden="true"></i></button>
                        </div>
                     ';

            })
            ->rawColumns(['btn_edit_delete','classroom','parent'])
            ->make(true);
    }

}   

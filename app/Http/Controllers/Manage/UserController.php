<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Yajra\Datatables\Datatables;

use App\Admin as User;

use Auth;
use Validator;
use Hash;

class UserController extends Controller
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
        return view('admin.manage.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.manage.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate input

        $validate = Validator::make($request->all(), [

            'name' => 'required|string',
            'email' => 'required|unique:attendance.admins,email',
            'password' => 'required|string|min:6|',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validate->errors());
        }

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->password);
        $user->access_level = $request->input('acc_type');
        $user->save();

        return view('admin.manage.users.index',[
                'modal'=>'components.modals.info',
                'title'=>'Berjaya!',
                'body' =>'Anda telah berjaya menambah pengguna',
        ]);
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
        $record = User::find($id);
        return view('admin.manage.users.view', ['record'=>$record]);
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
        $record = User::find($id);
        return view('admin.manage.users.edit', ['record' => $record]);

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

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->access_level = $request->acc_type;
        $user->save();

        return redirect()->route('admin.manage.users.show', ['user'=>$user->id]);
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
        $record = User::find($request->user_id);
        if ($record->delete()) {
            return response()->json(['status'=>'success','message'=>'Maklumat telah dihapuskan']);
        }else{
            return response()->json(['status'=>'failed','message'=>'Maklumat tidak dapat dihapuskan']);
        }
    }


    public function datatable_index()
    {
        if(Auth::User()->access_level == 1){
            $users = User::all();
        }else{
            $users = User::where('access_level' ,'!=', 1);
        }
        
        return Datatables::of($users)
            ->addColumn('type', function ($user) {
                
                if ($user->access_level == 1) {
                    return 'Superadmin';
                }else if ($user->access_level == 2) {
                    return 'Admin';
                }else {
                    return 'Pengguna';
                }
                        
            })
            ->addColumn('btn_edit_delete', function ($user) {
                return '
                        <div class="row">
                            <a href="'.route('admin.manage.users.show',['student'=>$user->id]).'">
                            <button class="edit-button btn btn-sm btn-rounded btn-outline-primary waves-effect" type="button" id="edit-button"><i class="fa fa-pencil-square-o fa-3x" aria-hidden="true"></i></button>
                            </a>
                            <button class="delete-button btn btn-sm btn-rounded btn-outline-danger waves-effect " type="button" data-toggle="modal" data-target="#warning-modal" onclick=delete_data("'.$user->id.'")><i class="fa fa-times fa-3x" aria-hidden="true"></i></button>
                        </div>
                     ';

            })
            ->rawColumns(['btn_edit_delete'])
            ->make(true);
    }
}

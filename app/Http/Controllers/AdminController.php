<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\StudentParent as StudentParent;
use App\Configuration as Configuration;
use Yajra\Datatables\Datatables;
use App\Race as Race;
use App\Religion as Religion;
use App\Education as Education;
use App\Income as Income;
use App\Event as Event;
use App\Student as Student;
use App\Admin as User;

use Auth;
use DB;
use Validator;




class AdminController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {

		return $this->middleware('auth:admin');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		return redirect()->route('admin.dashboard');
	}


	public function dashboard() {
		//total events
		$events = Event::all()->count();
		$students = Student::all()->count();
		$parents = StudentParent::all()->count();
		$users = User::all()->count();
		$configs = Configuration::first();

		return view('admin.dashboard',[
			'events'=>$events,
			'students'=>$students,
			'parents' => $parents,
			'users' => $users,
			'configs' => $configs,
		]);

	}
}

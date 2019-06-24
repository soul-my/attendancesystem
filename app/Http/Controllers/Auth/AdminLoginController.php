<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use Illuminate\Foundation\Auth\RedirectsUsers;
// use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;

use App\Http\Controllers\Audit\AuditTrailController as Auditor;
use Carbon\Carbon;

class AdminLoginController extends Controller {

	use AuthenticatesUsers;

	protected $redirectTo = '/admin';
	//, RedirectsUsers, ThrottlesLogins;

	//
	public function __construct() {
		$this->middleware('guest:admin');
	}

	public function showLoginForm() {
		return view('auth.admin-login');
	}

	public function dologin(Request $request) {
		$current_time = Carbon::now()->toDateTimeString();

		$this->validate($request,
		[
			'email' => 'required|email',
			'password' => 'required|min:10',
		]);

		if ($this->hasTooManyLoginAttempts($request)) {
			$this->fireLockoutEvent($request);

			return $this->sendLockoutResponse($request);
		}

		if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
			
			Auditor::login($request,$current_time,'logged');
			return $this->sendLoginResponse($request);
		}

		Auditor::login($request,$current_time,'login_attempt');

		// If the login attempt was unsuccessful we will increment the number of attempts
		// to login and redirect the user back to the login form. Of course, when this
		// user surpasses their maximum number of attempts they will get locked out.
		$this->incrementLoginAttempts($request);

		

		return $this->sendFailedLoginResponse($request);

		// if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

		// 	return redirect()->intended(route('admin.index'));
		// }

		// return redirect()->back()->withInput($request->only('email', 'remember'));
	}

	public function logout() {

	}
}

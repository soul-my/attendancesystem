<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
	return redirect()->route('admin.dashboard');
});

Route::get('/serverinfo', function () {
	phpinfo();
});

Route::get("/datatable-test", "TestController@getTableData")->name("datatable.test");

Route::prefix('staff')->group(function () {
	//login
	Auth::routes();
});

Route::prefix('admin')->name('admin.')->group(function () {

	//index route
	Route::get('/', 'AdminController@index')->name('index');

	//login page
	Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name("login");

	//route for login admin
	Route::post('dologin', 'Auth\AdminLoginController@dologin')->name('dologin');

	//dashboard
	Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');

	//parents routes
	Route::prefix('parent')->group(function(){
		Route::post('/delete','Parent\ParentController@delete')->name('parent.delete');
		Route::get('/list', 'Parent\ParentController@index')->name('parent.index');
		Route::get('/datatable', 'Parent\ParentController@datatable')->name('parent.datatable');
		Route::get('/validate_ic','Parent\ParentController@validate_ic')->name('parent.validate_ic');

	});
	Route::resource("parent", "Parent\ParentController");

	//student routes
	Route::prefix('student')->group(function(){
		Route::get('/datatable', 'Student\StudentController@datatable')->name('student.datatable');
		Route::get('/datatable-index', 'Student\StudentController@datatable_index')->name('student.datatable.index');

		Route::post('/delete','Student\StudentController@delete')->name('student.delete');
	});
	Route::resource("student","Student\StudentController");


	//events routes
	Route::prefix('events')->group(function(){
		Route::get('/datatable-index', 'Event\EventController@datatable_index')->name('event.datatable.index');

		Route::post('/delete', 'Event\EventController@delete')->name('event.delete');
	});
	Route::resource("events","Event\EventController");

	//attendance routes
	Route::prefix('attendance')->group(function(){


		Route::get('/datatable-event-view', 'Attendance\AttendanceController@datatable_event_view')->name('attendance.datatable.event-view');

		Route::post('/delete', 'Attendance\AttendanceController@delete')->name('attendee.delete');
	});
	Route::resource("attendance","Attendance\AttendanceController");

	//report routes
	Route::prefix('report')->group(function(){

		Route::get('all', 'Report\ReportController@generate_all')->name('report.all.generate');
		Route::get('byclass', 'Report\ReportController@generate_byclass')->name('report.byclass.generate');
		Route::post('generate','Report\ReportController@generate')->name('report.genarate');
	});
	Route::resource('report', 'Report\ReportController');


	//pdf routes
	Route::prefix('pdf')->group(function(){

		Route::get('attendance', 'PDF\PDFController@generate_attendance')->name('pdf.attendance.generate');
	});


	//manage routes
	Route::prefix('manage')->name('manage.')->group(function(){

		//manage users routes
		Route::get('users/datatable-index','Manage\UserController@datatable_index')->name('users.datatable-index');
		Route::post('users/delete', 'Manage\UserController@delete')->name('user.delete');
		Route::post('user/update', 'Manage\UserController@update2')->name('user.update2');
		Route::resource('users', 'Manage\UserController');


		//manage site setting routes
		Route::get('configuration','Manage\ConfigurationController@index')->name('configuration.index');
		
		Route::resource('configuration', 'Manage\ConfigurationController');


	});

});

Route::get('/login', function () {
	return redirect()->route('login');
});

Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

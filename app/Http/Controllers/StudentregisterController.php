<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailer;
use Session;
use Response;
use DB;
use Hash;
use Auth;
use User;

class StudentregisterController extends Controller
{
	public function __construct()
	{
		date_default_timezone_set("Asia/Kolkata");
	}
	/*public function __construct(){
		$this->middleware('auth');
		$this->middleware('role');
	}*/
	/* student register controllers */
	public function student_register_step_one(Request $request)
	{
		if ($request->setep_one == 'setep_one') {
			$userInComp = DB::table('users')->where('email', '')->get();
			if ($userInComp) {
				foreach ($userInComp as $user) {
					DB::table('users')->where('id', $user->id)->delete();
				}
			}
			$studentRegisterOne = app('App\User')->insertGetId([
				'name' => $request->name,
				'users_role' => 2,
				'profile_image' => 'no-image.png',
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			]);
			return view('fruntend.student.student_register.student_register_step_two')->with([
				'insertid' => $studentRegisterOne
			]);
		} elseif ($request->setep_two == 'setep_two') {
			$phoneCount = DB::table('users')->where('phone', $request->phone)->count();
			if ($phoneCount == 0) {
				$studentRegisterOne = app('App\User')->where('id', $request->student_id)->update([
					'phone' => $request->phone,
					'updated_at' => date("Y-m-d H:i:s")
				]);
				return view('fruntend.student.student_register.student_register_step_three')->with([
					'insertid' => $request->student_id
				]);
			} else {
				return view('fruntend.student.student_register.student_register_step_two')->with([
					'insertid' => $request->student_id,
					'error_msg' => 'Sorry, Your phone already exist.'
				]);
			}
		} elseif ($request->setep_three == 'setep_three') {

			$emailCount = DB::table('users')->where('email', $request->email)->count();

			if ($emailCount == 0) {
				$studentRegisterOne = app('App\User')->where('id', $request->student_id)->update([
					'email' => $request->email,
					'updated_at' => date("Y-m-d H:i:s")
				]);
				return view('fruntend.student.student_register.student_register_step_four')->with([
					'insertid' => $request->student_id
				]);
			} else {
				return view('fruntend.student.student_register.student_register_step_three')->with([
					'insertid' => $request->student_id,
					'error_msg' => 'Sorry, Your email already exist.'
				]);
			}
		} elseif ($request->setep_four == 'setep_four') {
			$studentRegisterOne = app('App\User')->where('id', $request->student_id)->update([
				'password' => Hash::make($request->confirmPassword),
				'updated_at' => date("Y-m-d H:i:s")
			]);
			return view('fruntend.student.student_register.student_register_step_five')->with([
				'insertid' => $request->student_id
			]);
		} elseif ($request->setep_five == 'setep_five') {
			$data = app('App\User')->where('id', $request->student_id)->first();

			if (Auth::loginUsingId($request->student_id)) {
				return redirect('student-dashboard');
			} else {
				return view('fruntend.student.student_register.student_register_step_five')->with([
					'insertid' => $request->student_id
				]);
			}
		}
	}
	/* student register controllers End */




	public function student_logged_in(Request $request)
	{
		$email = $request->input('email');
		$password = $request->input('password');
		$email_count = DB::table('users')->where('email', $email)->where('users_role', 2)->count();
		if ($email_count == 1) {
			$get_pass = DB::table('users')->where('email', $email)->get();
			foreach ($get_pass as $data) {
				$db_password = $data->password;
			}
			if (Hash::check($password, $db_password)) {
				if (Auth::attempt(['email' => $email, 'password' => $password, 'users_role' => 2])) {
					DB::table('users')->where('email', $email)->where('users_role', 2)->update([
						'last_login' => date("Y-m-d H:i:s")
					]);
					return redirect('student-dashboard')->with(array(
						'status' => 'success',
						'message' => 'You have loggedin.',
						'success_msg' => 'You have loggedin.',
					));
				} else {
					return redirect()->back()->with(array(
						'status' => 'danger',
						'message' =>  'Sorry, Your account deactivate by admin.',
						'error_msg' => 'Sorry, Your account deactivate by admin.',
						'email' => $email,
					));
				}
			} else {
				return redirect()->back()->with(array(
					'status' => 'danger',
					'message' =>  'Password does not match.',
					'error_msg' => 'Password does not match.',
					'email' => $email,
				));
			}
		} else {
			return redirect()->back()->with(array(
				'status' => 'danger',
				'message' =>  'Sorry! Email not registered.',
				'error_msg' => 'Sorry! Email not registered.'
			));
		}

		// return redirect()->back()->with(array('success_msg'=>'correct Updated.'));

	}



	public function student_job_search(Request $request)
	{

		$userRole = Session::get('userRole');
		$id = Session::get('gorgID');
		$OrgData = DB::table('users')->where('id', $id)->first();
		$locationData = DB::table('jobs')->select('location')->groupBy('location')->get();
		$titleData = DB::table('jobs')->select('job_title')->groupBy('job_title')->get();
		$job_title = $request->job_title;
		$location = $request->location;

		if (empty($job_title) and empty($location)) {
			$jobsData = DB::table('jobs')->where('status', 0)->get();
		} else {
			$jobsData = DB::table('jobs')->where('status', 0)->where('location', 'like', '%' . $location . '%')->where('job_title', 'like', '%' . $job_title . '%')->get();
		}
		if (Auth::check()) {
			return view('fruntend.student_job_search')->with(['job_title' => $job_title, 'location' => $location, 'OrgData' => $OrgData, 'jobsData' => $jobsData, 'locationData' => $locationData, 'titleData' => $titleData]);
		} else {
			return redirect('/student-login')->with(array('success_msg' => 'correct Updated.'));
		}
	}
}

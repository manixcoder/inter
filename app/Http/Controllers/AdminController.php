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

class AdminController extends Controller
{
	public function __construct()
	{
		date_default_timezone_set("Asia/Kolkata");
	}
	/*public function __construct(){
    $this->middleware('auth');
    $this->middleware('role');
  }*/


	public function admin_logged_in(Request $request)
	{
		$email = $request->input('email');
		$password = $request->input('password');
		$email_count = DB::table('users')->where('email', $email)->where('users_role', 1)->count();

		if ($email_count == 1) {
			$get_pass = DB::table('users')->where('email', $email)->get();
			foreach ($get_pass as $data) {
				$db_password = $data->password;
			}

			if (Hash::check($password, $db_password)) {
				if (Auth::attempt(['email' => $email, 'password' => $password])) {

					return redirect('dashboard')->with(array(
						'success_msg' => 'You have loggedin.',
					));
				} else {
					return redirect()->back()->with(array(
						'error_msg' => 'Sorry, Your account deactivate by admin.',
						'email' => $email,
					));
				}
			} else {
				return redirect()->back()->with(array(
					'error_msg' => 'Password does not match.',
					'email' => $email,
				));
			}
		} else {
			return redirect()->back()->with(array(
				'error_msg' => 'Sorry! Email not registered.'
			));
		}
	}
}

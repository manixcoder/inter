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
use Carbon;
use File;

class HomeController extends Controller
{
  public function __construct()
  {
    date_default_timezone_set("Asia/Kolkata");
  }
  /*public function __construct(){
    $this->middleware('auth');
    $this->middleware('role');
  }*/

  public function web_blog(Request $request)
  {
    //dd($request->search);
    if (isset($request->search)) {
      $generatequery = "SELECT * FROM blogs WHERE blog_heading LIKE '%' '" . $request->search . "' '%' OR description LIKE  '%' '" . $request->search . "' '%' ";
      $Data = DB::select($generatequery);
    } else {
      $Data = DB::table('blogs')->where('status', 0)->orderBy('id', 'desc')->get();
    }

    if ($Data != null) {
      return view('fruntend.common_pages.web_blog')->with('Data', $Data);
    } else {
      $msg = 'Please enter valid OTP.';
      return view('fruntend.common_pages.web_blog')->with('msg', $msg);
    }
  }
  public function recruiterListings(Request $request)
  {
    if (isset($request->search)) {
      $searchdata = $request->search;
    } else {
      $searchdata = 'No';
    }
    return view('fruntend.recruiter_profile_section.my_listing')->with([
      'searchdata' => $searchdata,
      'alert' => ''
    ]);
  }

  public function orgImageUpload(Request $request)
  {
    //  dd($request->all());

    if ($request->ajax()) {
      $id = Session::get('gorgID');
      if ($files = $request->file('file')) {
        $files = $request->file('file');
        $destinationPath = public_path('/uploads/');
        $profile_image = date('YmdHis') . "-" . $files->getClientOriginalName();
        $path =  $files->move($destinationPath, $profile_image);
        $update = DB::table('users')->where('id', $id)
          ->update([
            'org_image' => $profile_image,
          ]);
      }
      return response()->json([
        'success' => 'done',
        'valueimg' => $path
      ]);
    }
  }
  public function profileImageUpload(Request $request)
  {
    if ($request->ajax()) {
      $id = Session::get('gorgID');
      if ($request->file('file')) {
        $files = $request->file('file');
        $destinationPath = public_path('/uploads/');
        $org_image = date('YmdHis') . "-" . $files->getClientOriginalName();
        $path =  $files->move($destinationPath, $org_image);
        $update = DB::table('users')->where('id', $id)
          ->update([
            'profile_image' => $org_image,
          ]);
      }
      return response()->json([
        'success' => 'done',
        'valueimg' => $path
      ]);
    }
  }


  // public function add_contactus(Request $request)
  // {
  //   // dd($request->all());
  //   $data = array(
  //     'first_name' => $request->first_name,
  //     'last_name' => $request->last_name,
  //     'email' => $request->email,
  //     'mobile' => $request->mobile,
  //     'message' => $request->message,
  //     'created_at' => date("Y-m-d H:i:s"),
  //     'updated_at' => date("Y-m-d H:i:s")
  //   );

  //   $insertData = DB::table('contact_us')->insert($data);
  //   return view('fruntend.common_pages.contactus')->with('alert', 'your enquiry has been submitted successfully We will contact you soon.');
  // }

  public function web_login(Request $request)
  {
    $email = $request->input('email');
    $password = $request->input('password');
    $rolecheck = DB::table('users')->where('email', $email)->where('users_role', '!=', '1')->first();
    if ($rolecheck == null) {
      return redirect()->back()->with(array(
        'error_msg' => 'Email not registered',
        'email' => $email,
      ));
    } else {
      if ($rolecheck->users_role == 3) {
        $get_pass = DB::table('users')->where('email', $email)->get();

        foreach ($get_pass as $data) {
          $db_password = $data->password;
        }

        if ($get_pass != null) {
          if (Hash::check($password, $db_password)) {
            if (Auth::attempt(['email' => $email, 'password' => $password])) {
              DB::table('users')->where('email', $email)->update([
                'last_login' => date("Y-m-d H:i:s")
              ]);
              return redirect('recruiter-dashboard')->with(array(
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
              'error_msg' => 'Invalid credentials. Please try again.',
              'email' => $email,
            ));
          }
        } else {
          return redirect()->back()->with(array(
            'error_msg' => 'Password does not match.',
            'email' => $email,
          ));
        }
      } elseif ($rolecheck->users_role == 2) {
        $get_pass = DB::table('users')->where('email', $email)->get();
        foreach ($get_pass as $data) {
          $db_password = $data->password;
        }

        if (Hash::check($password, $db_password)) {
          if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('student-dashboard')->with(array(
              'success_msg' => 'You have loggedin.',
            ));
          } else {
            return redirect()->back()->with(array(
              'error_msg' => 'Sorry, Your account deactivate by admin.',
              'email' => $email,
            ));
          }
        }
      } else {
        return redirect()->back()->with(array(
          'error_msg' => 'Invalid credentials. Please try again.',
          'email' => $email,
        ));
      }
    }
  }

  public function forgot_password(Request $request)
  {
    $check_email = DB::table('users')->where('email', $request->email)->first();

    if ($check_email == true) {

      /*$otp = rand(1000,9999);*/
      $otp = 0000;
      $user = DB::table('users')->where('email', '=', $check_email->email)->update(['otp' => $otp]);

      /*$data = ['body' => 'Your OTP is : '. $otp];
        Mail::send('admin.verification_code', $data, function($message)
        {
          $message->to('hareshsingh121@gmail.com', 'Jon Doe')->subject('Otp Verification');
        });*/

      return view('admin.verification_code')->with(['email' => $check_email->email, 'alert' => '']);
    } else {
      return redirect()->back()->with('alert', 'The email address not found our records! Please entered valid email.');
    }
  }

  public function web_forgot_password(Request $request)
  {
    $check_email = DB::table('users')->where('email', $request->email)->first();

    if ($check_email == true) {

      /*$otp = rand(1000,9999);*/
      $otp = 0000;
      $user = DB::table('users')->where('email', '=', $check_email->email)->update(['otp' => $otp]);

      /*$data = ['body' => 'Your OTP is : '. $otp];
        Mail::send('admin.verification_code', $data, function($message)
        {
          $message->to('hareshsingh121@gmail.com', 'Jon Doe')->subject('Otp Verification');
        });*/

      return view('fruntend.common_pages.verification_code')->with(['email' => $check_email->email, 'alert' => '']);
    } else {
      return redirect()->back()->with('alert', 'The email address not found our records! Please entered valid email.');
    }
  }

  public function web_otp_verify(Request $request)
  {
    $check_otp = DB::table('users')->where('email', $request->email)->first();
    if ($check_otp->otp == $request->otp) {
      return view('fruntend.common_pages.resetpassword')
        ->with('email', $request->email);
    } else {
      $msg = 'Please enter valid OTP.';
      return view('fruntend.common_pages.verification_code')
        ->with([
          'email' => $request->email,
          'alert' => $msg
        ]);
    }
  }
  public function otp_verify(Request $request)
  {
    $check_otp = DB::table('users')->where('email', $request->email)->first();
    if ($check_otp->otp == $request->otp) {
      return view('admin.reset_password')->with(
        'email',
        $request->email
      );
    } else {
      $msg = 'Please enter valid OTP.';
      return view('admin.verification_code')->with([
        'email' => $request->email,
        'alert' => $msg
      ]);
    }
  }
  public function web_password_update(Request $request)
  {
    if ($request->email != '') {
      $udata['password'] = Hash::make($request->confirmPassword);
      $udate['temp_pass'] = $request->confirmPassword;
      DB::table('users')->where('email', $request->email)->update($udata);
      $msg = "Password changed successfully!.";
      $role = DB::table('users')->where('email', $request->email)->first();

      $role_id = $role->users_role;

      /* $msg = 'Please enter valid OTP.';*/
      return view('fruntend.web_login')->with(array(
        'status' => 'success',
        'message' => 'Password changed successfully!'
      ));


      // return view('fruntend.web_login')->with(['alert' => $msg]);
      /* switch ($role_id) 
        {
          case 1:
                return redirect('web-login');
            break;
          case 2:
                return redirect('web-login');
            break;
        }*/
    } else {
      echo 'something went wrong';
    }
  }

  public function password_update(Request $request)
  {

    if ($request->email != '') {
      $udata['password'] = Hash::make($request->new_password);
      $udate['temp_pass'] = $request->new_password;
      DB::table('users')->where('email', $request->email)->update($udata);
      $msg = "Password changed successfully!.";

      $role = DB::table('users')->where('email', $request->email)->first();

      $role_id = $role->users_role;

      switch ($role_id) {
        case 1:
          return view('admin.admin-login')->with(['email' => $request->email, 'alert' => $msg]);
          break;
        case 2:
          return redirect('student-login');
          break;
        case 3:
          return redirect('web-login');
          break;
      }
    } else {
      echo 'something went wrong';
    }
  }

  /* Blog web page controllers */
  public function blogsearch(Request $request)
  {
    if (isset($request->search)) {
      /*$Data = app('App\Blog')->Where('blog_heading', 'like', '%' . $request->search . '%')->get();*/
      $Data = "SELECT * FROM blogs WHERE blog_heading LIKE '%' '" . $request->search . "' '%' OR description LIKE  '%' '" . $request->search . "' '%' ";
    }
    $notfound = 'Data not found.!';
    if (count($Data) > 0) {
      return view('fruntend.blog')->with(['Data' => $Data, 'searchinput' => $request->search]);
    } else {
      return view('fruntend.blog')->with(['notfound' => $notfound]);
    }
  }

  public function blogsearchweb(Request $request)
  {
    if (isset($request->search)) {
      $generatequery = "SELECT * FROM blogs WHERE blog_heading LIKE '%' '" . $request->search . "' '%' OR description LIKE  '%' '" . $request->search . "' '%' ";
      $Data = DB::select($generatequery);
    }
    $notfound = 'Data not found.!';
    if (count($Data) > 0) {
      return view('fruntend.common_pages.web_blog')->with(['Data' => $Data, 'searchinput' => $request->search]);
    } else {
      return view('fruntend.common_pages.web_blog')->with(['notfound' => $notfound]);
    }
  }

  public function web_blog_data()
  {
    /*$Data = app('App\Blog')->where('feature_blog',0)->where('status',0)->get();*/
    $Data = app('App\Blog')->get();
    return view('fruntend.blog')->with(['Data' => $Data]);
  }
  /* Blog web page controllers End */

  /* Recruiter register controllers */
  public function recruider_register_step_one(Request $request)
  {

    if ($request->setep_one == 'setep_one') {

      $userInComp = DB::table('users')->where('email', '')->get();
      if ($userInComp) {
        foreach ($userInComp as $user) {
          DB::table('users')->where('id', $user->id)->delete();
        }
      }
      $recruiterRegisterOne = app('App\User')->insertGetId([
        'name' => $request->name,
        'users_role' => 3,
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s")
      ]);
      return view('fruntend.recruiter_register.recruiter_register_step_two')->with(['insertid' => $recruiterRegisterOne]);
      //}
    } elseif ($request->setep_two == 'setep_two') {
      $phonecheck = app('App\User')->where('phone', $request->phone)->first();
      if ($phonecheck == true) {
        return view('fruntend.recruiter_register.recruiter_register_step_two')->with(['error' => 'phone alredy exist', 'insertid' => $request->recruiterid]);
      }
      $recruiterRegisterOne = app('App\User')->where('id', $request->recruiterid)->update(['phone' => $request->phone]);
      return view('fruntend.recruiter_register.recruiter_register_step_three')->with(['insertid' => $request->recruiterid]);
    } elseif ($request->setep_three == 'setep_three') {
      $recruiterRegisterOne = app('App\User')->where('id', $request->recruiterid)->update(['designation' => $request->designation]);
      return view('fruntend.recruiter_register.recruiter_register_step_four')->with(['insertid' => $request->recruiterid]);
    } elseif ($request->setep_four == 'setep_four') {
      if ($files = $request->image) {
        $destinationPath = public_path('/uploads/');
        $profileImage = date('YmdHis') . "-" . $files->getClientOriginalName();
        $path =  $files->move($destinationPath, $profileImage);
        $image = $insert['photo'] = "$profileImage";
      }
      $recruiterRegisterOne = app('App\User')->where('id', $request->recruiterid)->update(['org_image' => 'company_profileBG.png', 'profile_image' => $image]);
      return view('fruntend.recruiter_register.recruiter_register_step_five')->with(['insertid' => $request->recruiterid]);
    } elseif ($request->setep_five == 'setep_five') {
      $recruiterRegisterOne = app('App\User')->where('id', $request->recruiterid)->update(['org_name' => $request->org_name]);
      return view('fruntend.recruiter_register.recruiter_register_step_six')->with(['insertid' => $request->recruiterid]);
    } elseif ($request->setep_six == 'setep_six') {

      $emailcheck = app('App\User')->where('email', $request->email)->first();
      if ($emailcheck == true) {
        return view('fruntend.recruiter_register.recruiter_register_step_six')->with(['error' => 'email alredy exist', 'insertid' => $request->recruiterid]);
      }
      $userData = app('App\User')->where('id', $request->recruiterid)->first();
      $recruiterRegisterOne = app('App\User')->where('id', $request->recruiterid)->update(['email' => $request->email]);



      return view('fruntend.recruiter_register.recruiter_register_step_seven')->with(['insertid' => $request->recruiterid]);
    } elseif ($request->setep_seven == 'setep_seven') {
      $recruiterRegisterOne = app('App\User')->where('id', $request->recruiterid)->update([
        'temp_pass' => $request->confirmPassword,
        'otp' => rand(1111, 9999),
        'password' => Hash::make($request->confirmPassword)
      ]);
      $data = app('App\User')->where('id', $request->recruiterid)->first();





      $to = $data->email; // note the comma
      // Subject
      $subject = 'Registration Verification Email';
      // Message
      $message = "
      <html>
      <head>
      <title>Registration Verification Email</title>
      </head>
      <body>
      <p>Dear " . $data->name . " ,</p></br>
      <p>We are so glad you are joining Internify today, get ready to realise your true potential!</p></br>
      <p>Your verification code is " . $data->otp . ".</p></br>
      <p>Welcome to Internify!</p></br>
      <p>Best,</p></br>
      <p>The Internify Team</p></br>
      </body>
      </html>";
      // To send HTML mail, the Content-type header must be set
      $headers[] = 'MIME-Version: 1.0';
      $headers[] = 'Content-type: text/html; charset=iso-8859-1';

      // Additional headers
      // $headers[] = 'To: Mary <mary@example.com>, Kelly <kelly@example.com>';
      $headers[] = 'From: The Internify contact@theinternify.com';
      //$headers[] = 'Cc: birthdayarchive@example.com';
      //$headers[] = 'Bcc: birthdaycheck@example.com';
      // Mail it
      mail($to, $subject, $message, implode("\r\n", $headers));

      return view('fruntend.recruiter_register.recruiter_register_step_nine')->with(['insertid' => $request->recruiterid]);
    } elseif ($request->setep_nine == 'setep_nine') {
      //dd($request->all());
      $otpcheck = app('App\User')->where('id', $request->recruiterid)->where('otp', $request->otp)->first();
      if ($otpcheck == true) {
        $data = app('App\User')->where('id', $request->recruiterid)->first();
        $data = app('App\User')->where('id', $request->recruiterid)->update([
          'email_verified_at' => date("Y-m-d H:i:s"),
          'otp' => ''
        ]);
        if (Auth::loginUsingId($request->recruiterid)) {

          return redirect('recruiter-dashboard');
        }
      } else {
        return view('fruntend.recruiter_register.recruiter_register_step_nine')->with(['error' => 'Otp wrong! Please try again', 'insertid' => $request->recruiterid]);
        // return view('fruntend.recruiter_register.recruiter_register_step_six')->with(['error' => 'email alredy exist', 'insertid' => $request->recruiterid]);
      }
      $data = app('App\User')->where('id', $request->recruiterid)->first();
      $data = app('App\User')->where('id', $request->recruiterid)->update([
        'email_verified_at' => date("Y-m-d H:i:s")
      ]);
      if (Auth::loginUsingId($request->recruiterid)) {

        return redirect('recruiter-dashboard');
      } else {
        return view('fruntend.recruiter_register.recruiter_register_step_nine')->with([
          'insertid' => $request->recruiterid
        ]);
      }
    }
  }

  public function questionnaireSave(Request $request)
  {
    $questionnairesData = DB::table('questionnaires')->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->first();
    $languages = implode(", ", $request->languages);
    if (!empty($questionnairesData)) {
      DB::table('questionnaires')->where('user_id', Auth::user()->id)->update([
        'age' => $request->age,
        'languages' => $languages,
        'work_hours' => $request->work_hours,
        'work_days' => $request->work_days,
        'experience' => $request->experience,
        'background_check' => $request->background_check,
        'drug_test' => $request->drug_test,
        'salary_amount' => $request->salary_amount,
        'updated_at' => date("Y-m-d H:i:s")
      ]);
    } else {
      DB::table('questionnaires')->insert([
        'user_id' => Auth::user()->id,
        'age' => $request->age,
        'languages' => $languages,
        'work_hours' => $request->work_hours,
        'work_days' => $request->work_days,
        'experience' => $request->experience,
        'background_check' => $request->background_check,
        'drug_test' => $request->drug_test,
        'salary_amount' => $request->salary_amount,
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s")
      ]);
    }

    return redirect('student/jobs')->with(['status' => 'success', 'message' => 'New Questionnaires added Successfully!']);
  }
  /* Recruiter register controllers End */

  public function questionnaireDetails(Request $request)
  {
    $questionnairesData = DB::table('questionnaires')->where('user_id', $request->student_id)->orderBy('id', 'DESC')->first();
    if (!empty($questionnairesData)) {
      $questionnairesData = $questionnairesData;
    } else {
      return back();
    }
    // dd($questionnairesData);
    return view('fruntend.questionnaire-details')->with([
      'status' => 'success',
      'message' => 'Successfully!',
      'student_id' => $request->student_id
    ]);
  }
}

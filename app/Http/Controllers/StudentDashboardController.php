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
use App\User;
use Carbon;


class StudentDashboardController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('role');
  }
  public function Dashboard(Request $request)
  {
    $userRole = Session::get('userRole');
    $id = Session::get('gorgID');
    $OrgData = DB::table('users')->where('id', $id)->first();
    $todaysdate = date('Y-m-d') . ' 00:00:00';
    // dd($userRole);
    if (!empty($request->search)) {
      $SearchData = $request->search;
    } else {
      $SearchData = '';
    }
    return view('fruntend.student.dashboard')->with([
      'OrgData' => $OrgData,
      'SearchData' => $SearchData,
      'userRole' => $userRole
    ]);
  }
  public function basic_info(Request $request)
  {
    $userRole = Session::get('userRole');
    $id = Session::get('gorgID');
    $OrgData = DB::table('users')->where('id', $id)->first();
    $edData = DB::table('education')->where('user_id', $id)->get();
    $exData = DB::table('experience')->where('user_id', $id)->get();
    $certData = DB::table('certificates')->where('user_id', $id)->get();
    $indusData = DB::table('my_favorite_industries')->where('user_id', $id)->get();
    $busiData = DB::table('business_functions')->where('user_id', $id)->get();
    $hobbyData = DB::table('hobbies_and_interests')->where('user_id', $id)->get();
    $accomData = DB::table('accomplishments')->where('user_id', $id)->get();
    $todaysdate = date('Y-m-d') . ' 00:00:00';
    return view('fruntend.student.basic-info')->with([
      'OrgData' => $OrgData,
      'edData' => $edData,
      'exData' => $exData,
      'certData' => $certData,
      'indusData' => $indusData,
      'busiData' => $busiData,
      'hobbyData' => $hobbyData,
      'accomData' => $accomData
    ]);
  }
  public function student_posts(Request $request)
  {
    $userRole = Session::get('userRole');
    $id = Session::get('gorgID');
    $OrgData = DB::table('users')->where('id', $id)->first();
    $edData = DB::table('education')->where('user_id', $id)->get();
    $exData = DB::table('experience')->where('user_id', $id)->get();
    $certData = DB::table('certificates')->where('user_id', $id)->get();
    $indusData = DB::table('my_favorite_industries')->where('user_id', $id)->get();
    $busiData = DB::table('business_functions')->where('user_id', $id)->get();
    $hobbyData = DB::table('hobbies_and_interests')->where('user_id', $id)->get();
    $accomData = DB::table('accomplishments')->where('user_id', $id)->get();
    $todaysdate = date('Y-m-d') . ' 00:00:00';
    return view('fruntend.student.student-posts')->with([
      'OrgData' => $OrgData,
      'edData' => $edData,
      'exData' => $exData,
      'certData' => $certData,
      'indusData' => $indusData,
      'busiData' => $busiData,
      'hobbyData' => $hobbyData,
      'accomData' => $accomData
    ]);
  }
  public function student_applications(Request $request)
  {
    $userRole = Session::get('userRole');
    $id = Session::get('gorgID');
    $OrgData = DB::table('users')->where('id', $id)->first();
    $edData = DB::table('education')->where('user_id', $id)->get();
    $exData = DB::table('experience')->where('user_id', $id)->get();
    $certData = DB::table('certificates')->where('user_id', $id)->get();
    $indusData = DB::table('my_favorite_industries')->where('user_id', $id)->get();
    $busiData = DB::table('business_functions')->where('user_id', $id)->get();
    $hobbyData = DB::table('hobbies_and_interests')->where('user_id', $id)->get();
    $accomData = DB::table('accomplishments')->where('user_id', $id)->get();
    $todaysdate = date('Y-m-d') . ' 00:00:00';
    return view('fruntend.student.student-applications')->with([
      'OrgData' => $OrgData,
      'edData' => $edData,
      'exData' => $exData,
      'certData' => $certData,
      'indusData' => $indusData,
      'busiData' => $busiData,
      'hobbyData' => $hobbyData,
      'accomData' => $accomData
    ]);
  }
  public function update_student_personal_details(Request $request)
  {
    $id = Session::get('gorgID');
    $update = DB::table('users')->where('id', $id)->update([
      'name' => $request->name,
      'email' => $request->email,
      'phone' => $request->phone,
      'dob' => $request->dob,
      'gender' => $request->gender,
    ]);
    return redirect()->back();
  }
  public function add_student_education(Request $request)
  {
    $id = Session::get('gorgID');
    $update = DB::table('education')
      ->insert([
        'user_id' => $id,
        'school_name' => $request->school_name,
        'name_of_technology' => $request->technology,
        'percentage' => $request->percentage,
        'year' => $request->year,
        'status' => 0,
      ]);
    return redirect()->back();
  }
  public function update_student_education(Request $request)
  {
    $update = DB::table('education')->where('id', $request->id)
      ->update([
        'school_name' => $request->school_name,
        'name_of_technology' => $request->technology,
        'percentage' => $request->percentage,
        'year' => $request->year,
        'status' => 0,
      ]);
    return redirect()->back();
  }
  public function add_student_experience(Request $request)
  {
    $id = Session::get('gorgID');
    if ($files = $request->image) {
      $destinationPath = public_path('/assets/student_image/');
      $profileImage = date('YmdHis') . "-" . $files->getClientOriginalName();
      $path =  $files->move($destinationPath, $profileImage);
      $update = DB::table('users')->where('id', $id)
        ->update([
          'profile_image' => $profileImage,
        ]);
    }
    $update = DB::table('experience')
      ->insert([
        'user_id' => $id,
        'company_name' => $request->company_name,
        'profile' => $request->profile_type,
        'duration_from' => $request->duration_from,
        'duration_to' => $request->duration_to,
        'location' => $request->location,
      ]);
    return redirect()->back();
  }
  public function update_student_experience(Request $request)
  {
    $id = Session::get('gorgID');
    if ($files = $request->image) {
      $destinationPath = public_path('/assets/student_image/');
      $profileImage = date('YmdHis') . "-" . $files->getClientOriginalName();
      $path =  $files->move($destinationPath, $profileImage);
      $update = DB::table('users')->where('id', $id)
        ->update([
          'profile_image' => $profileImage,
        ]);
    }
    $update = DB::table('experience')->where('id', $request->id)
      ->update([
        'user_id' => $id,
        'company_name' => $request->company_name,
        'profile' => $request->profile_type,
        'duration_from' => $request->duration_from,
        'duration_to' => $request->duration_to,
        'location' => $request->location,
      ]);
    /*if ($files = $request->image) {
      $update = DB::table('experience')->where('id', $request->id)
        ->update([

          'user_id' => $id,
          'company_name' => $request->company_name,
          'profile' => $request->profile_type,
          'duration_from' => $request->duration_from,
          'duration_to' => $request->duration_to,
          'location' => $request->location,

        ]);
    } else {
      $update = DB::table('experience')->where('id', $request->id)
        ->update([
          'user_id' => $id,
          'company_name' => $request->company_name,
          'profile' => $request->profile_type,
          'duration_from' => $request->duration_from,
          'duration_to' => $request->duration_to,
          'location' => $request->location,
        ]);
    }*/
    return redirect()->back();
  }
  public function add_student_certificate(Request $request)
  {
    $id = Session::get('gorgID');
    $update = DB::table('certificates')
      ->insert([
        'user_id' => $id,
        'certificate_name' => $request->certificate_name,
        'certificate_by' => $request->certificate_by,
        'year_of_completion' => $request->year_of_completion,
        'status' => 0,
      ]);
    return redirect()->back();
  }
  public function update_student_certificate(Request $request)
  {
    $id = Session::get('gorgID');
    $update = DB::table('certificates')->where('id', $request->id)
      ->update([
        'certificate_name' => $request->certificate_name,
        'certificate_by' => $request->certificate_by,
        'year_of_completion' => $request->year_of_completion,
        'status' => 0,
      ]);

    return redirect()->back();
  }
  public function add_student_industry(Request $request)
  {
    $id = Session::get('gorgID');
    $update = DB::table('my_favorite_industries')
      ->insert([
        'user_id' => $id,
        'industries_name' => $request->industry_name,
        'status' => 0,
      ]);
    return redirect()->back();
  }
  public function delete_student_industry(Request $request, $id)
  {
    $update = DB::table('my_favorite_industries')->where('id', $id)->delete();
    return redirect()->back();
  }
  public function add_student_business(Request $request)
  {
    $id = Session::get('gorgID');
    $update = DB::table('business_functions')
      ->insert([
        'user_id' => $id,
        'business_functions_name' => $request->business_function_name,
        'status' => 0,
      ]);
    return redirect()->back();
  }
  public function delete_student_business(Request $request, $id)
  {
    $update = DB::table('business_functions')->where('id', $id)->delete();
    return redirect()->back();
  }
  public function add_student_hobby(Request $request)
  {
    $id = Session::get('gorgID');
    $update = DB::table('hobbies_and_interests')
      ->insert([
        'user_id' => $id,
        'hobbies_name' => $request->hobby_name,
      ]);
    return redirect()->back();
  }
  public function delete_student_hobby(Request $request, $id)
  {
    $update = DB::table('hobbies_and_interests')->where('id', $id)->delete();
    return redirect()->back();
  }
  public function add_student_accomplishment(Request $request)
  {
    $id = Session::get('gorgID');
    $update = DB::table('accomplishments')
      ->insert([
        'user_id' => $id,
        'course_name' => $request->course_name,
        'awards' => $request->award,
        'test_scores' => $request->test_scores,
        'publications' => $request->publications,
        'status' => 0,
      ]);
    return redirect()->back();
  }
  public function update_student_accomplishment(Request $request)
  {
    $update = DB::table('accomplishments')->where('id', $request->id)
      ->update([
        'course_name' => $request->course_name,
        'awards' => $request->award,
        'test_scores' => $request->test_scores,
        'publications' => $request->publications,
        'status' => 0,
      ]);
    return redirect()->back();
  }
  public function add_post(Request $request)
  {
    if ($files = $request->image) {
      $destinationPath = public_path('/assets/post_images/');
      $profileImage = date('YmdHis') . "-" . $files->getClientOriginalName();
      $path =  $files->move($destinationPath, $profileImage);
    }
    $id = Session::get('gorgID');
    if ($files = $request->image) {
      $update = DB::table('posts')
        ->insert([
          'user_id' => $id,
          'heading' => $request->post_title,
          'description' => $request->post_details,
          'post_image' => $profileImage,
          'date_time' => date('Y-m-d H:i:s'),
          'status' => 0,
        ]);
    } else {
      $update = DB::table('posts')
        ->insert([
          'user_id' => $id,
          'heading' => $request->post_title,
          'description' => $request->post_details,
          'date_time' => date('Y-m-d H:i:s'),
          'status' => 0,
        ]);
    }
    return redirect()->back();
  }
  public function delete_student_post(Request $request, $id)
  {
    $update = DB::table('posts')->where('id', $id)->delete();
    return redirect()->back();
  }
  public function student_jobs(Request $request)
  {
    $userRole = Session::get('userRole');
    $id = Session::get('gorgID');
    $OrgData = DB::table('users')->where('id', $id)->first();
    $locationData = DB::table('jobs')->select('location')->groupBy('location')->get();
    $titleData = DB::table('jobs')->select('job_title')->groupBy('job_title')->get();
    $job_title = $request->job_title;
    $location = $request->location;
    if (empty($job_title) and empty($location)) {
      $jobsData = DB::table('jobs')->where('status', 0)->orderBy('id', 'desc')->get();
    } else {
      $jobsData = DB::table('jobs')->where('status', 0)->where('location', 'like', '%' . $location . '%')->where('job_title', 'like', '%' . $job_title . '%')->orderBy('id', 'desc')->get();
    }
    return view('fruntend.student.student-jobs')->with(['OrgData' => $OrgData, 'jobsData' => $jobsData, 'locationData' => $locationData, 'titleData' => $titleData]);
  }
  public function student_job_details(Request $request, $id)
  {
    $userRole = Session::get('userRole');
    $uid = Session::get('gorgID');
    $OrgData = DB::table('users')->where('id', $uid)->first();
    $jobsData = DB::table('jobs')->where('id',  $id)->first();
    return view('fruntend.student.student-job-details')->with(['OrgData' => $OrgData, 'appl' => $jobsData]);
  }
  public function student_job_apply(Request $request)
  {
    $id = Session::get('gorgID');
    $update = DB::table('job_applied')
      ->insert([
        'student_id' => $id,
        'job_id' => $request->job_id,
      ]);
    return redirect()->back();
  }
  public function upload_student_resume(Request $request)
  {
    if ($files = $request->image) {
      $destinationPath = public_path('/assets/student_image/');
      $profileImage = date('YmdHis') . "-" . $files->getClientOriginalName();
      $path =  $files->move($destinationPath, $profileImage);
    }
    $id = Session::get('gorgID');
    $resumeCount = DB::table('student_resume')->where('student_id', $id)->count();
    if ($resumeCount == 0) {
      $update = DB::table('student_resume')
        ->insert([
          'student_id' => $id,
          'image' => $profileImage,
        ]);
      return redirect()->back()->with(['success_msg' => "Resume Added"]);
    } else {
      $update = DB::table('student_resume')->where('student_id', $id)
        ->update([
          'image' => $profileImage,
        ]);
      return redirect()->back()->with(['success_msg' => "Resume Updated"]);
    }
  }
  public function student_setting(Request $request)
  {
    $userRole = Session::get('userRole');
    $id = Session::get('gorgID');
    $OrgData = DB::table('users')->where('id', $id)->first();
    return view('fruntend.student.student-setting')->with(['OrgData' => $OrgData]);
  }
  public function change_student_email(Request $request)
  {
    $request->validate([
      'email' => 'required|email|unique:users',
    ]);
    $userRole = Session::get('userRole');
    $id = Session::get('gorgID');
    $update = DB::table('users')->where('id', $id)
      ->update([
        'email' => $request->email,
      ]);
    return redirect()->back();
  }

  public function change_student_phone(Request $request)
  {
    $request->validate([

      'phone' => 'required|unique:users',
    ]);
    $userRole = Session::get('userRole');
    $id = Session::get('gorgID');
    $update = DB::table('users')->where('id', $id)
      ->update([

        'phone' => $request->phone,

      ]);

    return redirect()->back();
  }


  public function student_change_password(Request $request)
  {
    $userRole = Session::get('userRole');
    $id = Session::get('gorgID');
    $OrgData = DB::table('users')->where('id', $id)->first();

    return view('fruntend.student.student-change-password')->with(['OrgData' => $OrgData]);
  }

  public function student_password_update(Request $request)
  {

    $request->validate([

      'current_password' => 'required',
      'password' => 'required',
      'password_confirmation' => 'required|same:password',
    ]);

    $userRole = Session::get('userRole');
    $id = Session::get('gorgID');

    $currentPassword = Auth::User()->password;
    if (Hash::check($request->current_password, $currentPassword)) {
      $userId = Auth::User()->id;
      $user = User::find($userId);
      $user->password = Hash::make($request->password);;
      $user->save();
      return back()->with('success_msg', 'Your password has been updated successfully.');
    } else {
      return back()->with('error_msg', 'Current password does not match.');
    }
  }



  public function user_logout(Request $request)
  {


    Auth::logout();
    return redirect('/');
  }


  public function update_student_about(Request $request)
  {
    $id = Session::get('gorgID');
    $update = DB::table('users')->where('id', $id)
      ->update([

        'about' => $request->about,

      ]);

    return redirect()->back();
  }





  public function index()
  {
    Session::flash('success', 'login Successfully..!');
    return Redirect::action('DashboardController@dashboard');
  }
}

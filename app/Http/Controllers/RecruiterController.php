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
use Session;
use Response;
use DB;
use Auth;
use User;
use Recruiter;
use Hash;

class RecruiterController extends Controller
{


  public function __construct()
  {
    date_default_timezone_set("Asia/Kolkata");
    $this->middleware('auth');
    $this->middleware('role');
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $Data = app('App\User')->where('users_role', 3)->orderBy('id', 'DESC')->get();
    $DataCount = app('App\User')->where('users_role', 3)->count();
    $data['content'] = 'admin.recruiter.list_recruiter';
    return view('layouts.content', compact('data'))->with([
      'Data' => $Data,
      'DataCount' => $DataCount
    ]);
  }

  public function today_recruiter_list()
  {
    $todaysdate = date('Y-m-d') . ' 00:00:00';
    $Data = DB::table('users')->Where('users_role', 3)->where('created_at', '>=', $todaysdate)->paginate(10);
    $DataCount = DB::table('users')->Where('users_role', 3)->where('created_at', '>=', $todaysdate)->count();
    $data['content'] = 'admin.recruiter.list_recruiter';
    return view('layouts.content', compact('data'))->with(['Data' => $Data, 'DataCount' => $DataCount]);
  }
  public function recruiterPosts()
  {
    $todaysdate = date('Y-m-d') . ' 00:00:00';
    $Data = DB::table('users')->Where('users_role', 3)->where('created_at', '>=', $todaysdate)->paginate(10);
    $DataCount = DB::table('users')->Where('users_role', 3)->where('created_at', '>=', $todaysdate)->count();
    $data['content'] = 'fruntend.recruiter_profile_section.my_posts';
    return view('layouts.content', compact('data'))->with(['Data' => $Data, 'DataCount' => $DataCount]);
  }

  public function status_update($id)
  {
    $jobsdata = app('App\User')->where('id', $id)->first();

    if ($jobsdata->status == 1) {
      $update = app('App\User')->where('id', $id)->update([
        'status' => '0',
        'updated_at' => date("Y-m-d H:i:s")
      ]);
    } else {
      $update = app('App\User')->where('id', $id)->update([
        'status' => '1',
        'updated_at' => date("Y-m-d H:i:s")
      ]);
    }
  }

  public function delete($id)
  {
    $delete = app('App\User')->where('id', $id)->delete();
    $jobsData = DB::table('jobs')->where('user_id', $id)->get();
    foreach ($jobsData as $job) {
      $job_applied = DB::table('job_applied')->where('job_id', $job->id)->delete();
    }
    $jobs = DB::table('jobs')->where('user_id', $id)->delete();
    $postsData = DB::table('posts')->where('user_id', $id)->get();
    foreach ($postsData as $post) {
      $post_comment = DB::table('post_comment')->where('post_id', $post->id)->delete();
      $post_like = DB::table('post_like')->where('post_id', $post->id)->delete();
    }
    $posts = DB::table('posts')->where('user_id', $id)->delete();
    $post_comment = DB::table('post_comment')->where('user_id', $id)->delete();
    $post_like = DB::table('post_like')->where('user_id', $id)->delete();
    $notifications = DB::table('notifications')->Where('notifiable_id', $id)->delete();
    return redirect('recruiter-list');
  }

  public function redirect_recruiter()
  {
    $data['content'] = 'admin.recruiter.add_recruiter';
    return view('layouts.content', compact('data'));
  }

  public function create(Request $request)
  {

    $emailcheck = DB::table('users')->where('email', $request->email)->count();
    $phonecheck = DB::table('users')->where('phone', $request->phone)->count();

    /*dd($emailcheck);*/

    if ($emailcheck > 0) {
      return back()->with('error', 'Email is already registered.!');
    } elseif ($phonecheck > 0) {
      return back()->with('error', 'Phone is already registered.!');
    } else {
      if ($files = $request->image) {
        $destinationPath = public_path('/uploads/');
        $profileImage = date('YmdHis') . "-" . $files->getClientOriginalName();
        $path =  $files->move($destinationPath, $profileImage);
        $image = $insert['photo'] = "$profileImage";
      }

      $data = array(
        'org_image' => $image,
        'profile_image' => 'company_profileBG.png',
        'email' => $request->email,
        'name' => $request->name,
        'org_name' => $request->org_name,
        'phone' => $request->phone,
        'password' => Hash::make($request->password),
        'status' => 0,
        'users_role' => 3,
        'create_by' => Session::get('gorgID'),
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s")
      );

      $insertData = app('App\User')->insert($data);
    }

    return redirect('recruiter-list');
  }
  public function recruiterDelailsDelete($id)
  {
    $delete = app('App\User')->where('id', $id)->delete();
    $jobsData = DB::table('jobs')->where('user_id', $id)->get();
    foreach ($jobsData as $job) {
      $job_applied = DB::table('job_applied')->where('job_id', $job->id)->delete();
    }
    $jobs = DB::table('jobs')->where('user_id', $id)->delete();
    $postsData = DB::table('posts')->where('user_id', $id)->get();
    foreach ($postsData as $post) {
      $post_comment = DB::table('post_comment')->where('post_id', $post->id)->delete();
      $post_like = DB::table('post_like')->where('post_id', $post->id)->delete();
    }
    $posts = DB::table('posts')->where('user_id', $id)->delete();
    $post_comment = DB::table('post_comment')->where('user_id', $id)->delete();
    $post_like = DB::table('post_like')->where('user_id', $id)->delete();
    $notifications = DB::table('notifications')->Where('notifiable_id', $id)->delete();
    return redirect('recruiter-list')->with(array('status' => 'success', 'message' => 'Deleted Successfully!'));

    // $Data = app('App\User')->where('users_role', 3)->orderBy('id', 'Desc')->get();
    // $DataCount = app('App\User')->where('users_role', 3)->count();
    // $data['content'] = 'admin.recruiter.list_recruiter';
    // return view('layouts.content', compact('data'))->with([
    //   'Data' => $Data,
    //   'DataCount' => $DataCount
    // ]);
  }

  public function recruiter_detail($id)
  {
    $recruiterDetail = app('App\User')->where('id', $id)->first();
    $totalListedJobs =  DB::table('jobs')->where('user_id', $recruiterDetail->id)->orderBy('id', 'DESC')->get();

    $data['content'] = 'admin.recruiter.recruiter_detail';
    return view('layouts.content', compact('data'))->with([
      'recruiterDetail' => $recruiterDetail,
      'totalListedJobs' => $totalListedJobs
    ]);
  }
}

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
use App\Notifications\PostJobsNotification;
use Illuminate\Support\Facades\Notification;
use App\User;
use Session;
use Response;
use DB;
use Auth;
use Jobs;
use Carbon\Carbon;

class JobConroller extends Controller
{
  public function __construct()
  {
    date_default_timezone_set("Asia/Kolkata");
    $this->middleware('auth');
    $this->middleware('role');
  }

  public function job_details($id)
  {
    $Data = app('App\Jobs')->where('id', $id)->get();
    return view('fruntend.recruiter.job_detail_recruiter')->with(['Data' => $Data]);
  }

  public function job_profile($id)
  {

    $jobApplied = DB::table('job_applied as ja')
      ->join('users as r', 'ja.student_id', '=', 'r.id')
      ->where('ja.job_id', $id)
      ->select('ja.id', 'r.*')
      ->get();
    //dd($jobApplied);

    $Data = app('App\Jobs')->where('id', $id)->first();
    return view('fruntend.recruiter.job_detailecruiter')->with(['Data' => $jobApplied]);
  }


  public function company_details($id)
  {
    $Data = app('App\Jobs')->where('id', $id)->first();

    return view('fruntend.recruiter.job_detail_recruiter')->with(['Data' => $Data]);
  }

  public function create(Request $request)
  {
    // dd($request->offer);
    if ($files = $request->logo) {
      $destinationPath = public_path('/uploads/');
      $logoImage = date('YmdHis') . "-" . $files->getClientOriginalName();
      $path =  $files->move($destinationPath, $logoImage);
      $image = $insert['logo'] = "$logoImage";
    } else {
      $image = 'placeholder.png';
    }
    if ($files = $request->acttachPhoto) {
      $destinationPath = public_path('/uploads/');
      $acttachPhoto = date('YmdHis') . "-" . $files->getClientOriginalName();
      $path =  $files->move($destinationPath, $acttachPhoto);
      $attachment = $insert['attachment'] = "$acttachPhoto";
    } else {
      $attachment = 'placeholder.png';
    }

    // if(isset($attachment)){
    //   $attachment_file = $attachment;
    // }else{
    //   $attachment = '';
    // }

    $data = array(
      'attachment' => $attachment,
      'logo' => $image,
      'job_title' => $request->job_title,
      'location' => $request->location,
      'salary' => $request->currency . ' ' . $request->salary,
      'offer' => serialize($request->offer),
      'job_description' => $request->job_description,
      'status' => 0,
      'user_id' => Session::get('gorgID'),
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s")
    );

    $insertData = app('App\Jobs')->insert($data);

    $users = User::where('id', '!=', Session::get('gorgID'))->get();
    $notificationData = array(
      'comment_user' => Auth::user()->id,
      'post_title' => $request->job_title,
      'notification_type' => 'Post a new Jobs',
      'comment' => strip_tags($request->job_description)
    );
    foreach ($users as $user) {
      $user->notify(new PostJobsNotification($notificationData));
    }

    if ($insertData) {
      return redirect('/recruiter-listings')->with(array('status' => 'success', 'message' => 'Job created successfully!'));
    } else {
      return back()->with(array('status' => 'error', 'message' =>  'Something want wrong !'));
    }
  }

  public function index()
  {
    $Data = DB::table('jobs as jo')
      ->join('users as us', 'jo.user_id', '=', 'us.id')
      ->orderBy('jo.id', 'Desc')
      ->select('jo.*', 'us.profile_image', 'us.org_image')
      ->paginate(10);
    //->get();
    //$Data = app('App\Jobs')->orderBy('id', 'Desc')->get();
    $DataCount = app('App\Jobs')->count();

    $data['content'] = 'admin.jobs.listedjobs';
    return view('layouts.content', compact('data'))->with(['Data' => $Data, 'DataCount' => $DataCount]);
  }

  public function today_job_list()
  {
    $todaysdate = date('Y-m-d') . ' 00:00:00';
    //$Data = DB::table('jobs')->whereDate('created_at', Carbon::today())->paginate(10);
    $Data = DB::table('jobs as jo')
      ->join('users as us', 'jo.user_id', '=', 'us.id')
      ->whereDate('jo.created_at', Carbon::today())
      ->select('jo.*', 'us.profile_image', 'us.org_image')
      ->paginate(10);
    $DataCount = DB::table('jobs as jo')
      ->join('users as us', 'jo.user_id', '=', 'us.id')
      ->whereDate('jo.created_at', Carbon::today())->count();
    // dd($Data);
    $data['content'] = 'admin.jobs.listedjobs';
    return view('layouts.content', compact('data'))->with(['Data' => $Data, 'DataCount' => $DataCount]);
  }

  public function status_update($id)
  {
    $jobsdata = app('App\Jobs')->where('id', $id)->first();

    if ($jobsdata->status == 1) {
      $update = app('App\Jobs')->where('id', $id)->update([
        'status' => '0',
        'updated_at' => date("Y-m-d H:i:s")
      ]);
    } else {
      $update = app('App\Jobs')->where('id', $id)->update([
        'status' => '1',
        'updated_at' => date("Y-m-d H:i:s")
      ]);
    }
  }

  public function delete($id)
  {
    $delete = app('App\Jobs')->where('id', $id)->delete();
    return redirect('joblist')->with(array('status' => 'success', 'message' => 'Deleted Successfully !'));
    return back();
  }

  public function job_detail($id)
  {
    $jobDetail = app('App\Jobs')->where('id', base64_decode($id))->first();
    $job_created_by =  DB::table('users')->where('id', $jobDetail->user_id)->first();
    $appliedjobs = DB::table('job_applied')->where('job_id', $jobDetail->id)->get();

    $data['content'] = 'admin.jobs.job_details';
    return view('layouts.content', compact('data'))->with([
      'jobDetail' => $jobDetail,
      'job_created_by' => $job_created_by,
      'appliedjobs' => $appliedjobs
    ]);
  }

  public function file_download($id)
  {
    $file = DB::table('job_applied')->where('id', base64_decode($id))->first();
    $url = (base_path('public/resume/' . $file->resume));

    /*return Storage::download($url, $file->resume);*/

    return response()->download(storage_path($url));
  }
}

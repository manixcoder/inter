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
use Illuminate\Pagination\Paginator;
use App\Notifications\PostCommentNotification;
use Session;
use Response;
use DB;
use Hash;
use Auth;
use App\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
  public function __construct()
  {
    date_default_timezone_set("Asia/Kolkata");
    $this->middleware('auth');
    $this->middleware('role');
  }
  public function notification()
  {
    $userRole = Session::get('userRole');
    $id = Session::get('gorgID');
    $user = User::find($id);
    //dd($user);
    //   foreach ($user->notifications as $notification) {
    //     dd($notification);
    // }

    // $notification = DB::table('notifications')->where('notifiable_id', $id)->orderBy('id', 'DESC')->get();

    /* dd($id);*/

    // if ($userRole == 2) {
    //   $notification = DB::table('announcement')->where('aim', 'Students')->orWhere('aim', 'Both')->orderBy('id', 'DESC')->get();
    // } else {
    //   $notification = DB::table('announcement')->where('aim', 'Recruiters')->orWhere('aim', 'Both')->orderBy('id', 'DESC')->get();
    // }
    return view('fruntend.common_pages.notification');
  }
  public function contactus_queryes()
  {
    $Data = DB::table('contact_us')->orderBy('id', 'Desc')->get();
    $DataCount = count($Data);
    $data['content'] = 'admin.contactus_queryes';
    return view('layouts.content', compact('data'))->with([
      'Data' => $Data,
      'DataCount' => $DataCount
    ]);
  }

  public function query_delete($id)
  {
    $delete = DB::table('contact_us')->where('id', $id)->delete();
    return back();
  }
  public function search_header(Request $request)
  {
    if ($request->serch_in == 'Jobs') {
      $generatequery = "SELECT * FROM jobs WHERE location LIKE '%' '" . $request->search_text . "' '%' OR job_title LIKE  '%' '" . $request->search_text . "' '%' OR company_name LIKE  '%' '" . $request->search_text . "' '%' OR applicant LIKE  '%' '" . $request->search_text . "' '%'  OR create_on LIKE  '%' '" . $request->search_text . "' '%' OR company_name LIKE  '%' '" . $request->search_text . "' '%' ";
      $query = DB::select($generatequery);
      $Data = new Paginator($query, 10);
      $DataCount = count($Data);
      if ($DataCount > 0) {
        $data['content'] = 'admin.jobs.listedjobs';
        return view('layouts.content', compact('data'))->with(['Data' => $Data, 'DataCount' => $DataCount]);
      } else {
        return redirect('dashboard')->with('status', 'Profile updated!');
      }
    } elseif ($request->serch_in == 'Student') {
      $generatequery = "SELECT * FROM users WHERE name LIKE '%' '" . $request->search_text . "'  '%' OR email LIKE  '%' '" . $request->search_text . "' '%' OR phone LIKE  '%' '" . $request->search_text . "' '%' OR id LIKE  '%' '" . $request->search_text . "' '%'  ";
      $query = DB::select($generatequery);
      $Data = new Paginator($query, 10);
      $DataCount = count($Data);


      if ($DataCount > 0) {
        $data['content'] = 'admin.student.student_list';
        return view('layouts.content', compact('data'))->with(['Data' => $Data, 'DataCount' => $DataCount]);
      } else {
        return redirect('dashboard')->with('status', 'Profile updated!');
      }
    } elseif ($request->serch_in == 'Recruiter') {
      $generatequery = "SELECT * FROM users WHERE org_name LIKE '%' '" . $request->search_text . "'  '%' OR email LIKE  '%' '" . $request->search_text . "' '%' OR phone LIKE  '%' '" . $request->search_text . "' '%' OR id LIKE  '%' '" . $request->search_text . "' '%'  ";

      $query = DB::select($generatequery);
      $Data = new Paginator($query, 10);
      $DataCount = count($Data);

      if ($DataCount > 0) {
        $data['content'] = 'admin.recruiter.list_recruiter';
        return view('layouts.content', compact('data'))->with(['Data' => $Data, 'DataCount' => $DataCount]);
      } else {
        return redirect('dashboard')->with('status', 'Profile updated!');
      }
    }
  }


  public function Dashboard(Request $request)
  {
    $userRole = Session::get('userRole');
    $id = Session::get('gorgID');
    $OrgData = DB::table('users')->where('id', $id)->first();
    $todaysdate = date('Y-m-d') . ' 00:00:00';

    if ($userRole == '1') {

      $newStudents = DB::table('users')->Where('users_role', 2)->whereDate('created_at', Carbon::today())->count();
      $newRecruiters = DB::table('users')->where('users_role', 3)->whereDate('created_at', Carbon::today())->count();
      $todayJobs = DB::table('jobs')->whereDate('created_at', Carbon::today())->count();

      $totalStudents = DB::table('users')->where('users_role', 2)->count();
      $totalRecruiters = DB::table('users')->where('users_role', 3)->count();
      $totalJobs = DB::table('jobs')->count();


      $data['content'] = 'admin.dashboard.dashboard';
      return view('layouts.content', compact('data'))->with([
        'newStudents' => $newStudents,
        'newRecruiters' => $newRecruiters,
        'todayJobs' => $todayJobs,
        'totalStudents' => $totalStudents,
        'totalRecruiters' => $totalRecruiters,
        'totalJobs' => $totalJobs
      ]);
    }
    if ($userRole == '2') {
      $usredata = DB::table('users')->count();
      $data['content'] = 'admin.home';
      return view('layouts.content', compact('data'))->with(['usredata' => $usredata]);
    }
  }

  public function index()
  {
    Session::flash('success', 'login Successfully..!');
    return Redirect::action('DashboardController@dashboard');
  }
}

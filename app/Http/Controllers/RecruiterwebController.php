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

class RecruiterwebController extends Controller
{
  public function __construct()
  {
    date_default_timezone_set("Asia/Kolkata");
    $this->middleware('auth');
    $this->middleware('role');
  }

  public function search_filter_recruiter_posts(Request $request)
  {
    /*dd($request->search_text);*/
    $generatequery = "SELECT * FROM posts WHERE heading LIKE '%' '" . $request->search_text . "' '%' OR description LIKE  '%' '" . $request->search_text . "' '%' OR date_time LIKE  '%' '" . $request->search_text . "' '%' ";
    $posts = DB::select($generatequery);
    $id = Session::get('gorgID');
    $OrgData = DB::table('users')->where('id', $id)->first();
    if ($posts > 0) {
      return view('fruntend.recruiter.dashboard')->with(['OrgData' => $OrgData, 'posts' => $posts]);
    } else {
      return redirect('dashboard')->with('status', 'Profile updated!');
    }
  }
  public function removeProfileImage(Request $request)
  {
    DB::table('users')->where('id', $request->user_id)->update([
      'profile_image'=>'blank-profile-picture.png'
    ]);
    return back()->with('status', 'update successfully !');
  }
  public function dashboard(Request $request)
  {
    $userRole = Session::get('userRole');
    $id = Session::get('gorgID');
    $OrgData = DB::table('users')->where('id', $id)->first();
    $todaysdate = date('Y-m-d') . ' 00:00:00';
    $posts = app('App\Posts')->orderBy('id', 'DESC')->get();

    $notifications = DB::table('notifications')->get();
    foreach ($notifications as $notification) {
      $someArray = json_decode($notification->data, true);
      $userData = DB::table('users')->Where('id', $someArray['comment_user'])->first();
      if ($userData) {
      } else {
        DB::table('notifications')->Where('id', $notification->id)->delete();
      }
    }

    return view('fruntend.recruiter.dashboard')->with([
      'OrgData' => $OrgData,
      'posts' => $posts
    ]);
  }
  public function follow(Request $request, $id, $by_id)
  {
    $check_follow = DB::table('followers')->where('user_id', $id)->where('follow_id', $by_id)->first();
    if ($check_follow) {
      return redirect('recruiter-people')->with('status', 'Already Follow !');
    } else {
      DB::table('followers')->insert([
        'user_id' => $id,
        'follow_id' => $by_id,
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s")
      ]);
      return redirect('recruiter-people')->with('status', 'Follow successfully!');
    }
  }
  public function unfollow(Request $request, $id, $by_id)
  {
    $check_follow = DB::table('followers')
      ->where('user_id', $id)
      ->where('follow_id', $by_id)
      ->first();
    if ($check_follow) {
      DB::table('followers')->delete($check_follow->id);
      return redirect('recruiter-people')->with('status', 'Unfollow successfully !');
    }
  }

  public function edit_recruiter_profile(Request $request)
  {
    $editData = DB::table('users')->where('id', $request->edit_id)->first();
    if (isset($editData)) {
      $this->validate($request, [
        'phone'    => 'required|unique:users,phone,' . $request->edit_id,
        'email'     => 'required|unique:users,email,' . $request->edit_id,
      ]);
      User::where('id', $request->edit_id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'designation' => $request->designation,
      ]);
      // $update = DB::table('users')
      //   ->where('id', $request->edit_id)
      //   ->update([
      //     'name' => $request->name,
      //     'email' => $request->email,
      //     'phone' => $request->phone,
      //     'designation' => $request->designation,
      //     'updated_at' => date("Y-m-d H:i:s")
      //   ]);
    }
    return back()->with('status', 'update successfully !');
  }

  public function edit_recruiter_about(Request $request)
  {
    $editData = DB::table('users')->where('id', $request->edit_id)->first();

    if (isset($editData)) {
      $update = app('App\User')->where('id', $request->edit_id)->update([
        'requirter_overview' => $request->requirter_overview,
        'website' => $request->website,
        'industry' => $request->industry,
        'company_size' => $request->company_size,
        'org_name' => $request->org_name,
        'headquarters' => $request->headquarters,
        'address' => $request->address,
        'type' => $request->type,
        'founded' => $request->founded,
        'specialties' => $request->specialties
      ]);
      DB::table('jobs')->where('user_id', $request->edit_id)->update([
        'industry' => $request->industry,
      ]);
    }
    return back()->with('status', 'update successfully !');
  }
}

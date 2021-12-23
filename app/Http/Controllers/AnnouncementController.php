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
use App\Notifications\AnnouncementNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Mail\Mailer;
use App\User;
use Session;
use Response;
use DB;
use Hash;
use Auth;
use Anouncement;

class AnnouncementController extends Controller
{
  public function __construct()
  {
    date_default_timezone_set("Asia/Kolkata");
    $this->middleware('auth');
    $this->middleware('role');
  }

  public function index()
  {
    $Data = app('App\Announcement')->orderBy('id', 'Desc')->get();
    $data['content'] = 'admin.announcement.announcement';
    return view('layouts.content', compact('data'))->with(['Data' => $Data]);
  }

  public function delete($id)
  {
    $delete = app('App\Announcement')->where('id', $id)->delete();
    return back();
  }

  public function create(Request $request)
  {
    //dd($request->all());
    $data = array(
      'title' => $request->title,
      'description' => $request->description,
      'aim' => $request->aim,
      'status' => 0,
      'user_id' => Session::get('gorgID'),
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s")
    );

    if ($request->edit_id) {
      $insertData = app('App\Announcement')->where('id', $request->edit_id)->update($data);
    } else {
      $insertData = app('App\Announcement')->insert($data);
    }
    if ($request->aim == 'Both') {
      $users = User::where('id', '!=', Session::get('gorgID'))->get();
      $notificationData = array(
        'comment_user' => Auth::user()->id,
        'post_title' => $request->title,
        'notification_type' => 'Announcement by Admin',
        'comment' => strip_tags($request->description)
      );
      foreach ($users as $user) {
        $user->notify(new AnnouncementNotification($notificationData));
      }
    } elseif ($request->aim == 'Recruiters') {

      $users = User::where('id', '!=', Session::get('gorgID'))->where('users_role', '!=', 2)->get();
      $notificationData = array(
        'comment_user' => Auth::user()->id,
        'post_title' => $request->title,
        'notification_type' => 'Announcement by Admin',
        'comment' => strip_tags($request->description)
      );
      foreach ($users as $user) {
        $user->notify(new AnnouncementNotification($notificationData));
      }
    } else {
      $users = User::where('id', '!=', Session::get('gorgID'))->where('users_role', '!=', 3)->get();
      $notificationData = array(
        'comment_user' => Auth::user()->id,
        'post_title' => $request->title,
        'notification_type' => 'Announcement by Admin',
        'comment' => strip_tags($request->description)
      );
      foreach ($users as $user) {
        $user->notify(new AnnouncementNotification($notificationData));
      }
    }


    return redirect('announcement-list');
  }

  public function edit($id)
  {
    $announcementData = app('App\Announcement')->where('id', base64_decode($id))->first();
    $data['content'] = 'admin.announcement.edit_announcement';
    return view('layouts.content', compact('data'))->with(['announcementData' => $announcementData]);
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\PostCommentNotification;
use App\Notifications\UserLikePost;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Notification;
use Session;
use Response;
use DB;
use Auth;
use App\User;
use Posts;
use Hash;
use Carbon\Carbon;

class PostController extends Controller
{
  public function __construct()
  {
    date_default_timezone_set("Asia/Kolkata");
    $this->middleware('auth');
    $this->middleware('role');
  }

  public function add_comment(Request $request)
  {
    /*print_r($request->all()); die;*/

    $postdata = DB::table('posts')->where('id', $request->post_id)->first();
    $userid = Session::get('gorgID');
    $data = array(
      'user_id' => $userid,
      'post_id' => $request->post_id,
      'comment' => $request->comment,
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s")
    );

    $insertData = DB::table('post_comment')->insert($data);
    $users = User::where('id', '!=', Session::get('gorgID'))->get();
    // $notificationData = array(
    //   'comment_user' => Auth::user()->id,
    //   'post_title' => $postdata->heading,
    //   'notification_type' => 'comment',
    //   'comment' => $request->comment
    // );
    // foreach ($users as $user) {
    //   $user->notify(new PostCommentNotification($notificationData));
    // }
    return back();
  }

  public function share_post(Request $request)
  {
    $ldate = date('Y-m-d H:i:s');
    $data = array('date_time' => $ldate);
    $updatedata = DB::table('posts')->where('id', $request->post_id)->update($data);
    return back();
  }

  public function likefilter($id)
  {
    $userid = Session::get('gorgID');
    $postData = DB::table('posts')->where('id',  $id)->first();
    $postdata = DB::table('post_like')
      ->where('user_id', $userid)
      ->where('post_id', $id)
      ->first();
    if ($postdata == null) {
      $data = array(
        'user_id' => $userid,
        'post_id' => $id,
        'like_unlike' => 0,
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s")
      );
      $insertData = DB::table('post_like')->insert($data);
    } else {
      if ($postdata->like_unlike == 0) {
        $data = array(
          'like_unlike' => 1,
          'updated_at' => date("Y-m-d H:i:s")
        );
        $updatedata = DB::table('post_like')->where('id', $postdata->id)->update($data);
        $notificationData = array(
          'comment_user' => Auth::user()->id,
          'post_title' => "Like Post",
          'notification_type' => 'Liked your post',
          'comment' => $postData->heading

        );
      } else {
        $data = array('like_unlike' => 0,);
        $notificationData = array(
          'comment_user' => Auth::user()->id,
          'post_title' => "Like Post",
          'notification_type' => 'Liked your post',
          'comment' => $postData->heading
        );
        $updatedata = DB::table('post_like')->where('id', $postdata->id)->update($data);
      }
    }

    // $users = User::where('id', '!=', Session::get('gorgID'))->get();
    // foreach ($users as $user) {
    //   $user->notify(new UserLikePost($notificationData));
    // }
    // dd($notificationData);
  }

  public function index()
  {
    $Data = app('App\Posts')->orderBy('id', 'Desc')->get();
    $data['content'] = 'admin.post.post_list';
    return view('layouts.content', compact('data'))->with(['Data' => $Data]);
  }

  public function delete($id)
  {
    $delete = app('App\Posts')->where('id', $id)->delete();
    return back();
  }

  public function create(Request $request)
  {
    if ($files = $request->image) {
      $destinationPath = public_path('/uploads/');
      $profileImage = date('YmdHis') . "-" . $files->getClientOriginalName();
      $path =  $files->move($destinationPath, $profileImage);
      $image = $insert['photo'] = "$profileImage";
    }
    $data = array(
      'post_image' => $image,
      'heading' => $request->heading,
      'description' => $request->description,
      'date_time' => Carbon::now(),
      'status' => 0,
      'user_id' => Session::get('gorgID'),
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s")
    );
    $insertData = app('App\Posts')->insert($data);
    $users = User::where('id', '!=', Session::get('gorgID'))->get();
    $notificationData = array(
      'comment_user' => Auth::user()->id,
      'post_title' => $request->heading,
      'notification_type' => 'Posted a post',
      'comment' => $request->description
    );
    foreach ($users as $user) {
      $user->notify(new PostCommentNotification($notificationData));
    }
    return back();
  }

  public function blog_detail($id)
  {
    $blogDetail = app('App\Posts')->where('id', base64_decode($id))->first();
    $data['content'] = 'admin.blog.blog_details';
    return view('layouts.content', compact('data'))->with(['jobDetail' => $jobDetail]);
  }
}

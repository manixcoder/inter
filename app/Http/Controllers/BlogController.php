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
use Blog;
use Hash;

class BlogController extends Controller
{
  public function __construct()
  {
    date_default_timezone_set("Asia/Kolkata");
    $this->middleware('auth');
    $this->middleware('role');
  }
  public function web_blog_detail(Request $request)
  {
    //dd($request->all());
    $id =  $request->blog_id;
    $Data = app('App\Blog')->where('id', $id)->first();
    return view('fruntend.common_pages.blog_detail')->with(['Data' => $Data]);
  }

  public function index()
  {
    $Data = app('App\Blog')->orderBy('id', 'DESC')->get();
    $DataCount = app('App\Blog')->count();

    $data['content'] = 'admin.blog.blog_list';
    return view('layouts.content', compact('data'))->with([
      'Data' => $Data, 
      'DataCount' => $DataCount
    ]);
  }

  public function delete($id)
  {
    $delete = app('App\Blog')->where('id', $id)->delete();
    return back();
  }

  public function redirect_blog()
  {
    $data['content'] = 'admin.recruiter.add_recruiter';
    return view('layouts.content', compact('data'));
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
      'blog_image' => $image,
      'blog_heading' => $request->blog_heading,
      'description' => $request->description,
      'status' => 0,
      'created_by' => Session::get('gorgID'),
      'posted_date_and_time' => date("Y-m-d H:i:s"),
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s")
    );

    $insertData = app('App\Blog')->insert($data);
    return redirect('blog-list');
  }
  public function edit_blog(Request $request, $id)
  {
    $blogData = app('App\Blog')->where('id', $id)->orderBy('id', 'DESC')->first();
    $data['content'] = 'admin.blog.edit_blog';
    return view('layouts.content', compact('data'))->with(['blogData' => $blogData]);
  }
  public function updateBlog(Request $request)
  {
   // dd($request->all());
    $blogData = app('App\Blog')->where('id', $request->blog_id)->orderBy('id', 'DESC')->first();
    if ($files = $request->image) {
      $destinationPath = public_path('/uploads/');
      $profileImage = date('YmdHis') . "-" . $files->getClientOriginalName();
      $path =  $files->move($destinationPath, $profileImage);
      $image = $insert['photo'] = "$profileImage";
    }else{
      $image =$blogData->blog_image;
    }
    $blogData = app('App\Blog')->where('id', $request->blog_id)->update([
      'blog_image' => $image,
      'blog_heading' => $request->blog_heading,
      'description' => $request->description,
      'status' => 0,
      'created_by' => Session::get('gorgID'),
      'updated_at' => date("Y-m-d H:i:s")
    ]);
    $Data = app('App\Blog')->orderBy('id', 'DESC')->get();
    $DataCount = app('App\Blog')->count();

    $data['content'] = 'admin.blog.blog_list';
    return view('layouts.content', compact('data'))->with(['Data' => $Data, 'DataCount' => $DataCount]);

  }

  public function blog_detail($id)
  {
    $blogDetail = app('App\Blog')->where('id', base64_decode($id))->first();
    $data['content'] = 'admin.blog.blog_details';
    return view('layouts.content', compact('data'))->with(['jobDetail' => $jobDetail]);
  }
}

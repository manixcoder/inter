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
  public function __construct(){
    $this->middleware('auth');
    $this->middleware('role'); 
  }
  
  public function web_blog_detail($id){
    $Data = app('App\Blog')->where('id', $id)->first();
    return view('fruntend.common_pages.blog_detail')->with(['Data' => $Data]);
  }

  public function index() {
    $Data = app('App\Blog')->orderBy('id', 'DESC')->get();
    $DataCount = app('App\Blog')->count();
    
    $data['content'] = 'admin.blog.blog_list';
    return view('layouts.content', compact('data'))->with(['Data' => $Data, 'DataCount'=>$DataCount]);
  }

  public function delete($id){
    $delete = app('App\Blog')->where('id', $id)->delete();
    return back();
  } 

  public function redirect_blog() {
    $data['content'] = 'admin.recruiter.add_recruiter';
    return view('layouts.content', compact('data'));    
  }

  public function create(Request $request) {    
    if($files = $request->image){
      $destinationPath = public_path('/uploads/');
      $profileImage = date('YmdHis') . "-" . $files->getClientOriginalName();
      $path =  $files->move($destinationPath, $profileImage);
      $image = $insert['photo'] = "$profileImage";
    }

    $data = array(        
      'blog_image' => $image,    
      'blog_heading' => $request->blog_heading,      
      /*'feature_blog' => $request->feature_blog, */     
      'description' => $request->description,         
      'status' => 0,        
      'created_by' => Session::get('gorgID'),       
      'posted_date_and_time' => now(),       
    );

    $insertData = app('App\Blog')->insert($data);
    return redirect('blog-list');    
  }

  public function blog_detail($id){
    $blogDetail = app('App\Blog')->where('id', base64_decode($id))->first();
    $data['content'] = 'admin.blog.blog_details';
    return view('layouts.content', compact('data'))->with(['jobDetail' => $jobDetail]);
  }
}
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

class AboutusController extends Controller
{
  public function __construct()
  {
    date_default_timezone_set("Asia/Kolkata");
    $this->middleware('auth');
    $this->middleware('role');
  }

  public function index()
  {
    $Data = app('App\Aboutus')->paginate(10);
    $data['content'] = 'admin.aboutus.aboutus';
    return view('layouts.content', compact('data'))->with(['Data' => $Data]);
  }

  public function delete($id)
  {
    $delete = app('App\Aboutus')->where('id', $id)->delete();
    return back();
  }

  public function edit($id)
  {
    $editData = app('App\Aboutus')->where('id', base64_decode($id))->first();

    $data['content'] = 'admin.aboutus.add_aboutus';
    return view('layouts.content', compact('data'))->with(['editData' => $editData]);
  }

  public function create(Request $request)
  {
    $data = array(
      'heading' => $request->heading,
      'description' => $request->description,
      'status' => 0,
      'user_id' => Session::get('gorgID'),
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s")      
    );

    if ($request->edit_id) {
      $insertData = app('App\Aboutus')->where('id', $request->edit_id)->update($data);
    } else {
      $insertData = app('App\Aboutus')->insert($data);
    }
    return redirect('aboutus-list');
  }

  public function blog_detail($id)
  {
    $blogDetail = app('App\Posts')->where('id', base64_decode($id))->first();
    $data['content'] = 'admin.blog.blog_details';
    return view('layouts.content', compact('data'))->with(['jobDetail' => $jobDetail]);
  }
}

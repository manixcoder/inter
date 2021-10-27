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
use Anouncement;

class AnnouncementController extends Controller {
  public function __construct(){
    $this->middleware('auth');
    $this->middleware('role');
  }

  public function index() {
    $Data = app('App\Announcement')->orderBy('id','Desc')->get();
    $data['content'] = 'admin.announcement.announcement';
    return view('layouts.content', compact('data'))->with(['Data' => $Data]);
  }

  public function delete($id){
    $delete = app('App\Announcement')->where('id', $id)->delete();
    return back();
  } 

  public function create(Request $request) { 
    $data = array(      
      'title' => $request->title,      
      'description' => $request->description,         
      'aim' => $request->aim,         
      'status' => 0,        
      'user_id' => Session::get('gorgID'),       
    );

    if ($request->edit_id) {
      $insertData = app('App\Announcement')->where('id', $request->edit_id)->update($data);
    }else{
      $insertData = app('App\Announcement')->insert($data);
    } 
    
    return redirect('announcement-list');    
  }

  public function edit($id) {
    $announcementData = app('App\Announcement')->where('id', base64_decode($id))->first();    
    $data['content'] = 'admin.announcement.edit_announcement';
    return view('layouts.content', compact('data'))->with(['announcementData' => $announcementData]);
  }
  
}

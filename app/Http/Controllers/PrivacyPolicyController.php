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

class PrivacyPolicyController extends Controller {
  public function __construct(){
    $this->middleware('auth');
    $this->middleware('role');
  }

  public function index() {
    $Data = app('App\Privacy_policy')->paginate(10);

    $data['content'] = 'admin.privacy_policy.privacypolicy';
    return view('layouts.content', compact('data'))->with(['Data' => $Data]);
  }
  
  public function edit($id) {
    $editData = app('App\Privacy_policy')->where('id', base64_decode($id))->first();

    $data['content'] = 'admin.privacy_policy.add_privacypolicy';
    return view('layouts.content', compact('data'))->with(['editData' => $editData]);
  }

  public function create(Request $request) {    
    $data = array(      
      'heading' => $request->heading,      
      'text' => $request->text,          
      'status' => 0,        
      'user_id' => Session::get('gorgID'),       
    );

    if ($request->edit_id) {
     $insertData = app('App\Privacy_policy')->where('id', $request->edit_id)->update($data);
    }else{
      $insertData = app('App\Privacy_policy')->insert($data);
    }    
    return redirect('privacypolicy-list');    
  } 
  
  public function delete($id) {
    $delete = app('App\Privacy_policy')->where('id', $id)->delete();
    return back();
  } 
}
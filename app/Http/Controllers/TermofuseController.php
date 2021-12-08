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

class TermofuseController extends Controller {
  public function __construct(){
    $this->middleware('auth');
    $this->middleware('role');
  }

  public function index() {
    $Data = app('App\Term_of_use')->paginate(10);

    $data['content'] = 'admin.terms_of_use.termofuse';
    return view('layouts.content', compact('data'))->with(['Data' => $Data]);
  }
  
  public function create(Request $request) {    
    $data = array(      
      'heading' => $request->heading,      
      'description' => $request->description,          
      'status' => 0,        
      'user_id' => Session::get('gorgID'),  
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s")    
    );

    if ($request->edit_id) {
       $insertData = app('App\Term_of_use')->where('id', $request->edit_id)->update($data);
    }else{
       $insertData = app('App\Term_of_use')->insert($data);
    }

   
    return redirect('termofuse-list');    
  }  

  public function edit($id) {
    $editData = app('App\Term_of_use')->where('id', base64_decode($id))->first();

    $data['content'] = 'admin.terms_of_use.add_termsofuse';
    return view('layouts.content', compact('data'))->with(['editData' => $editData]);
  }
  
  public function delete($id) {
    $delete = app('App\Term_of_use')->where('id', $id)->delete();
    return back();
  } 
}

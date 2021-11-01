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
use Jobs;

class JobConroller extends Controller
{
  public function __construct(){
    $this->middleware('auth');
    $this->middleware('role');
  }
  
   public function job_details($id){
    $Data = app('App\Jobs')->where('id', $id)->get();
    return view('fruntend.recruiter.job_detail_recruiter')->with(['Data' => $Data]);
  }

  public function job_profile($id){
    $Data = app('App\Jobs')->where('id', $id)->first();
    return view('fruntend.recruiter.job_detailecruiter')->with(['Data' => $Data]);
  }
  

  public function company_details($id){
    $Data = app('App\Jobs')->where('id', $id)->first();

    return view('fruntend.recruiter.job_detail_recruiter')->with(['Data' => $Data]);
  }

   public function create(Request $request) {
     //dd($request->all());
     if($files = $request->logo){
       $destinationPath = public_path('/assets/jobs_images/');
       $profileImage = date('YmdHis') . "-" . $files->getClientOriginalName();
       $path =  $files->move($destinationPath, $profileImage);
       $image = $insert['logo'] = "$profileImage";
      }else{
        $image ='';
      }
      if($files = $request->acttachPhoto){
        $destinationPath = public_path('/assets/jobs_images/');
        $profileImage = date('YmdHis') . "-" . $files->getClientOriginalName();
        $path =  $files->move($destinationPath, $profileImage);
        $attachment = $insert['attachment'] = "$profileImage";
      }else{
        $attachment = '';
      }
    
      // if(isset($attachment)){
      //   $attachment_file = $attachment;
      // }else{
      //   $attachment = '';
      // }

    $data = array(        
      'attachment' => $attachment,    
      'logo' => $image,    
      'job_title' => $request->job_title,      
      'location' => $request->location,      
      'salary' => $request->salary,      
      'offer' => $request->offer,      
      'job_description' => $request->job_description, 
      'status' => 0,        
      'user_id' => Session::get('gorgID'),       
    );

    $insertData = app('App\Jobs')->insert($data);
    return back()->with(array('status' => 'success', 'message' =>  'Job created successfully!'));
    return back()->with('success', 'Job created successfully!');  
  }

  public function index(){
    $Data = app('App\Jobs')->orderBy('id', 'Desc')->get();
    $DataCount = app('App\Jobs')->count();

    $data['content'] = 'admin.jobs.listedjobs';
    return view('layouts.content', compact('data'))->with(['Data' => $Data, 'DataCount'=>$DataCount]);
  }

  public function today_job_list() {
    $todaysdate = date('Y-m-d').' 00:00:00';
    $Data = DB::table('jobs')->where('created_at', '>=', $todaysdate)->paginate(10);    
    $DataCount = DB::table('jobs')->where('created_at', '>=', $todaysdate)->count();

    $data['content'] = 'admin.jobs.listedjobs';
    return view('layouts.content', compact('data'))->with(['Data' => $Data, 'DataCount'=>$DataCount]);
  }

  public function status_update($id){   
    $jobsdata = app('App\Jobs')->where('id', $id)->first();

    if($jobsdata->status == 1)
    {
      $update = app('App\Jobs')->where('id', $id)->update(['status'=>'0']);
    }else{
      $update = app('App\Jobs')->where('id', $id)->update(['status'=>'1']);
    }    
  } 

  public function delete($id){
    $delete = app('App\Jobs')->where('id', $id)->delete();

    return back();
  } 

  public function job_detail($id){
    $jobDetail = app('App\Jobs')->where('id', base64_decode($id))->first();
    $job_created_by =  DB::table('users')->where('id', $jobDetail->user_id)->first();
    $appliedjobs = DB::table('job_applied')->where('job_id', $jobDetail->id)->get();

    $data['content'] = 'admin.jobs.job_details';
    return view('layouts.content', compact('data'))->with(['jobDetail' => $jobDetail, 'job_created_by'=>$job_created_by, 'appliedjobs'=>$appliedjobs]);
  }

  public function file_download($id){
    $file = DB::table('job_applied')->where('id', base64_decode($id))->first();    
    $url = (base_path('public/resume/'.$file->resume));
    
    /*return Storage::download($url, $file->resume);*/

    return response()->download(storage_path($url));
  }
}

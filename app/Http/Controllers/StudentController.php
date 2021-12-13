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
use Hash;
use Carbon\Carbon;

class StudentController extends Controller
{
  public function __construct()
  {
    date_default_timezone_set("Asia/Kolkata");
    $this->middleware('auth');
    $this->middleware('role');
  }

  public function index()
  {
    $Data = app('App\User')->where('users_role', 2)->orderBy('id', 'Desc')->get();
    $DataCount = app('App\User')->where('users_role', 2)->count();
    $data['content'] = 'admin.student.student_list';
    return view('layouts.content', compact('data'))->with(['Data' => $Data, 'DataCount' => $DataCount]);
  }

  public function today_student_list()
  {
    $todaysdate = date('Y-m-d') . ' 00:00:00';

    $Data = DB::table('users')->Where('users_role', 2)->where('created_at', '>=', $todaysdate)->paginate(10);

    $DataCount = DB::table('users')->Where('users_role', 2)->where('created_at', '>=', $todaysdate)->count();

    $data['content'] = 'admin.student.student_list';
    return view('layouts.content', compact('data'))->with(['Data' => $Data, 'DataCount' => $DataCount]);
  }

  public function status_update($id)
  {
    $studentdata = app('App\User')->where('id', $id)->first();

    if ($studentdata->status == 1) {
      $update = app('App\User')->where('id', $id)->update(['status' => '0']);
    } else {
      $update = app('App\User')->where('id', $id)->update(['status' => '1']);
    }
  }

  public function delete($id)
  {
    $delete = app('App\User')->where('id', $id)->delete();
    return back();
  }

  public function create(Request $request)
  {
    $emailcheck = app('App\User')->where('email', $request->email)->first();
    $phonecheck = app('App\User')->where('phone', $request->phone)->first();

    if ($emailcheck == true) {
      return back()->with('error', 'Email is already registered.!');
    } elseif ($phonecheck == true) {
      return back()->with('error', 'Phone is already registered.!');
    } else {

      if ($files = $request->image) {
        $destinationPath = public_path('/uploads/');
        $profileImage = date('YmdHis') . "-" . $files->getClientOriginalName();
        $path =  $files->move($destinationPath, $profileImage);
        $profile_image = $insert['photo'] = "$profileImage";
      } else {
        $profile_image = 'placeholder.png';
      }

      // if($request->image!=''){
      //     $imagecheck = $image;
      // }else{
      //     $imagecheck = 'no-image.png';
      // }
      $data = array(
        'profile_image' => $profile_image,
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'password' => Hash::make($request->password),
        'status' => 0,
        'users_role' => 2,
        'create_by' => Session::get('gorgID'),
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s")
      );

      $insertData = app('App\User')->insert($data);
      return redirect('student-list')->with(['Success' => 'Data insert successfully!']);
    }
  }

  public function student_detail($id)
  {
    //dd($id);
    $studentDetail = app('App\User')->where('id', $id)->first();
    //dd($studentDetail);
    $education =  DB::table('education')->where('user_id', $studentDetail->id)->orderBy('id', 'DESC')->first();
    $experience =  DB::table('experience')->where('user_id', $studentDetail->id)->orderBy('id', 'DESC')->first();
    $certificate =  DB::table('certificates')->where('user_id', $studentDetail->id)->orderBy('id', 'DESC')->first();
    $intrest =  DB::table('hobbies_and_interests')->where('user_id', $studentDetail->id)->orderBy('id', 'DESC')->first();
    $accomplishments =  DB::table('accomplishments')->where('user_id', $studentDetail->id)->orderBy('id', 'DESC')->first();

    $data['content'] = 'admin.student.student_details';
    return view('layouts.content', compact('data'))
      ->with([
        'studentDetail' => $studentDetail,
        'education' => $education,
        'experience' => $experience,
        'certificate' => $certificate,
        'intrest' => $intrest,
        'accomplishments' => $accomplishments
      ]);
  }
}

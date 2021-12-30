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
use Auth;
use DB;
use Hash;
use Carbon;
use File;

class SearchController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Kolkata");
    }
    public function web_blog_data()
    {
        /*$Data = app('App\Blog')->where('feature_blog',0)->where('status',0)->get();*/
        $Data = app('App\Blog')->get();
        return view('fruntend.blog')->with(['Data' => $Data]);
    }
    /* Blog web page controllers */
    public function blogsearch(Request $request)
    {
        if (isset($request->search)) {
            $generatequery = "SELECT * FROM blogs WHERE blog_heading LIKE '%' '" . $request->search . "' '%' OR description LIKE  '%' '" . $request->search . "' '%' ";
            $Data = DB::select($generatequery);
        } else {
            $Data = app('App\Blog')->get();
        }

        $notfound = 'Data not found.!';
        if (count($Data) > 0) {
            return view('fruntend.blog')->with(['Data' => $Data, 'searchinput' => $request->search]);
        } else {
            return view('fruntend.blog')->with(['notfound' => $notfound]);
        }
    }

    public function add_contactus(Request $request)
    {
        $data = array(
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'message' => $request->message,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        );

        $insertData = DB::table('contact_us')->insert($data);
        if (!Auth::guest()) {
            return redirect('contact_us')->with(array('status' => 'success', 'message' => 'Your inquiry has been submitted successfully We will contact you soon !'));
        } else {
            return redirect('contactus')->with(array('status' => 'success', 'message' => 'Your inquiry has been submitted successfully We will contact you soon !'));
        }


        // return view('fruntend.common_pages.contactus')
        //     ->with('alert', 'your enquiry has been submitted successfully We will contact you soon.');
    }

    /* Recruiter register controllers End */
}

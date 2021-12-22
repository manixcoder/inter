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

    /* Recruiter register controllers End */
}

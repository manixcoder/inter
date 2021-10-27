<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

use Session;
use Response;
use App\Comapny;
use App\User;
use DB;
use Hash;

class UsersController extends Controller
{
	public function user_profile(Request $request)
	{
		$getallheaders = $request->API_KEY;
		$apikey = Config('constants.API_KEY');

		//print_r($getallheaders); die;

		if($apikey == $getallheaders)
		{
			$userData = DB::table('customers')->where('id', $request->customer_id)->first();

			if($userData!='')
			{
				return response()->json
				([
				    'Status' => 'SUCCESS',
				    'Message' => 'Your Data Fetch successfully',
				    'Data' =>	($userData),	    
				]);
			}
			else
			{
				return response()->json
				([
				    'Status' => 'FAILED',
				    'Message' => 'Data Not Found',
				]);
			}
		}
		else
		{
			return response()->json
				([
				    'Status' => 'FAILED',
				    'Message' => 'You are not authorized'
				]);
		}
	}

	public function edit_customer_profile(Request $request)
	{
		$getallheaders = $request->API_KEY;
		$apikey = Config('constants.API_KEY');

		if($apikey == $getallheaders)
		{
			if($request->customer_id!='')
			{
				$customerdata = DB::table('customers')->where('id', $request->customer_id)->first();

				if($customerdata!='')
				{
					if($files = $request->image)
		            {
		                $destinationPath = public_path('/customer_image/');
						$profileImage = date('YmdHis') . "-" . $files->getClientOriginalName();
		                $path =  $files->move($destinationPath, $profileImage);
		                $image = $insert['photo'] = "$profileImage";

		                $Data = array
						(
							'name' => $request->name,
							'business_name' => $request->business_name,
						 	'dob' => $request->dob, 
						 	'gender' => $request->gender,
						 	'zip_code' => $request->zip_code, 
						 	'address' => $request->address, 
						 	'state_id' => $request->state_id, 
						 	'city_id' => $request->city_id,
						 	'image' => $image ?? '', 
						 	'updated_at' => date('Y-m-d H:i:s')
						);
					
						$edituserData = DB::table('customers')->where('id', $request->customer_id)->update($Data);
					}
					else
					{
						$Data = array
						(
							'name' => $request->name,
							'business_name' => $request->business_name,
						 	'dob' => $request->dob, 
						 	'gender' => $request->gender, 
						 	'zip_code' => $request->zip_code, 
						 	'address' => $request->address, 
						 	'state_id' => $request->state_id, 
						 	'city_id' => $request->city_id,  
						 	'updated_at' => date('Y-m-d H:i:s')
						);
					
						$edituserData = DB::table('customers')->where('id', $request->customer_id)->update($Data);
					}
				}
				else
				{
					return response()->json
					([
					    'Status' => 'FAILED',
					    'Message' => 'Customer Not Found',
					]);
				}
			}
			else
			{
				return response()->json
				([
				    'Status' => 'FAILED',
				    'Message' => 'Id not Found',
				]);
			}
			if($edituserData > 0)
			{
				return response()->json
				([
				    'Status' => 'SUCCESS',
				    'Success' => 'Your Data Update successfully',
				    'Data' =>	($edituserData),	    
				]);
			}
			else
			{
				return response()->json
				([
				    'Status' => 'FAILED',
				    'Message' => 'Data Not Found',
				]);
			}
		}
		else
		{
			return response()->json
				([
				    'Status' => 'FAILED',
				    'Message' => 'You are not authorized'
				]);
		}
	}


	/*public function edit_user_password(Request $request)
	{
		$getallheaders = $request->API_KEY;
		$apikey = Config('constants.API_KEY');

		//print_r($getallheaders); die;

		if($apikey == $getallheaders)
		{
			if(!empty($request->old_password) && !empty($request->user_id))
			{
				$userdata =  DB::table('users')->where('id', $request->user_id)->first();

				print_r(Hash::make($request->old_password)); die;

				if($userdata->password = Hash::make($request->old_password))
				{
					echo "success";  die;
				}
				else 
				{
					echo "hello"; die;
				}

				$Data = array('password' => Hash::make($request->new_password));
				$edituserData = DB::table('users')
				->where('id', $request->user_id)
				->update($Data);
			}
			else
			{
				return response()->json
				([
				    'Status' => 'FAILED',
				    'Message' => 'Id not Found',
				]);
			}
			if($edituserData > 0)
			{
				return response()->json
				([
				    'Status' => 'SUCCESS',
				    'Success' => 'Your Data Update successfully',
				    'Data' =>	($edituserData),	    
				]);
			}
			else
			{
				return response()->json
				([
				    'Status' => 'FAILED',
				    'Message' => 'Data Not Found',
				]);
			}
		}
		else
		{
			return response()->json
				([
				    'Status' => 'FAILED',
				    'Message' => 'You are not authorized'
				]);
		}
	}*/
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use URL;
use DB;

class FaceBookController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Kolkata");
    }
    /**
     * Login Using Facebook
     */
    public function loginUsingFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFromFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->stateless()->user();
            $findUser = User::where('email',$user->getEmail())->get();

            if(count($findUser) > 0){
                DB::table('users')->where('email',$user->getEmail())->update([
                    'facebook_id' => $user->getId(),
                ]);
                Auth::loginUsingId($findUser[0]->id);
                if ($findUser[0]->users_role === '3') {
                return redirect('/recruiter-dashboard');
            } elseif ($findUser[0]->users_role === '2') {
                return redirect('/student-dashboard');
            }
            }
            
            $saveUser = User::updateOrCreate([
                'facebook_id' => $user->getId(),
            ], [
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'profile_image' => 'blank-profile-picture.png',
                'users_role' => '2',
                //'password' => Hash::make($user->getName() . '@' . $user->getId())
            ]);

            Auth::loginUsingId($saveUser->id);
            if ($saveUser->users_role === '3') {
                return redirect('/recruiter-dashboard');
            } elseif ($saveUser->users_role === '2') {
                return redirect('/student-dashboard');
            }
            // dd($saveUser->users_role);
            // return redirect()->route('home');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthLinkedinController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Kolkata");
    }
    public function loginUsinglinkedin()
    {
        //dd("Hello Here");
        return Socialite::driver('linkedin')->scopes(['r_emailaddress', 'r_liteprofile', 'w_member_social'])->redirect();
    }
    public function callbackFromLinkedin()
    {
        try {
            $linkdinUser = Socialite::driver('linkedin')->stateless()->user();
           // dd($linkdinUser);
            $existUser = User::where('email', $linkdinUser->email)->first();
            if ($existUser) {
                Auth::loginUsingId($existUser->id);
                 if (Auth::user()->users_role === '2') {
                    return redirect('/student-dashboard');
                } elseif (Auth::user()->users_role === '3') {
                    return redirect('/recruiter-dashboard');
                }
            } else {
                $user = new User;
                $user->name = $linkdinUser->name;
                $user->email = $linkdinUser->email;
                $user->linkedin_id = $linkdinUser->id;
                $user->profile_image = 'blank-profile-picture.png';
                $user->password = md5(rand(1, 10000));

                $user->users_role = '2';
                $user->save();
                Auth::loginUsingId($user->id);
                if (Auth::user()->users_role === '2') {
                    return redirect('/student-dashboard');
                } elseif (Auth::user()->users_role === '3') {
                    return redirect('/recruiter-dashboard');
                }
            }
            return redirect('/student-dashboard');
            return redirect()->to('/web-login');
        } catch (Exception $e) {
            return redirect()->to('/web-login');
            return 'error';
        }
    }
}

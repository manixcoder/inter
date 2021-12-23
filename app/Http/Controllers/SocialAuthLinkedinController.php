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
        return Socialite::driver('linkedin')->redirect();
    }

    public function callbackFromLinkedin()
    {
        try {
            $linkdinUser = Socialite::driver('linkedin')->stateless()->user();
           // dd($linkdinUser);
            $existUser = User::where('email', $linkdinUser->email)->first();
            if ($existUser) {
                Auth::loginUsingId($existUser->id);
            } else {
                $user = new User;
                $user->name = $linkdinUser->name;
                $user->email = $linkdinUser->email;
                $user->linkedin_id = $linkdinUser->id;
                $user->password = md5(rand(1, 10000));
                $user->users_role = '2';
                $user->save();
                Auth::loginUsingId($user->id);
            if (Auth::user()->users_role === '3') {
                return redirect('/recruiter-dashboard');
            } elseif (Auth::user()->users_role === '2') {
                return redirect('/student-dashboard');
            }
            }
            return redirect()->to('/web-login');
        } catch (Exception $e) {
            return 'error';
        }
    }
}

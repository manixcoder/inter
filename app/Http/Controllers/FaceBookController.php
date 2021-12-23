<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use URL;

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
            /* image generation start */
            //dd($user->avatar);
            $path = $user->avatar;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
           // dd($base64);
            $img = $base64;
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $imageName = uniqid() . '.png';
            $file = "public/uploads/" . $imageName;
            $success = file_put_contents($file, $data);
            //dd($success);
            /* image generation end */
            $saveUser = User::updateOrCreate([
                'facebook_id' => $user->getId(),
            ], [
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'profile_image' => 'placeholder.png',
                //'profile_image' => $imageName,
                'users_role' => '2',
                'password' => Hash::make($user->getName() . '@' . $user->getId())
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

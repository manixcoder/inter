<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'users_role',
        'name',
        'email',
        'profile_image',
        'org_image',
        'org_name',
        'phone',
        'otp',
        'gender',
        'dob',
        'designation',
        'requirter_overview',
        'address',
        'about',
        'create_by',
        'country_id',
        'status',
        'last_login',
        'temp_pass',
        'website',
        'industry',
        'company_size',
        'headquarters',
        'specialties', 'type',
        'founded',
        'created_at',
        'updated_at',
        'facebook_id',
        'linkedin_id',
        'google_id',
        //'name', 'email', 'password','profile_image','username','users_role','facebook_id','google_id','linkedin_id'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
}

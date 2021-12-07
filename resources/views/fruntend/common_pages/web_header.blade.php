@php
$userRole = Session::get('userRole');
$id = Session::get('gorgID');
$OrgData = DB::table('users')->where('id', $id)->first();
//dd($OrgData);
$todaysdate = date('Y-m-d').' 00:00:00';
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf_token" content="{{csrf_token()}}">
  <title>internify - Home</title>
  <!-- Fontawesome 4 Cdn from BootstrapCDN -->
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="{{ asset('public/assets/web_assets/css/style.css')}}" rel="stylesheet">
  <link href="{{ asset('public/assets/web_assets/fonts/fonts.css')}}" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!--<script src="jquery-3.5.1.min.js"></script>-->
</head>

<body class="lightwht_bg">
  <header class="header_sec flow2_header fw">
    <div class="lgcontainer">
      <div class="innerrow">
        <div class="col_grid3">
          <a href="{{ URL::to('recruiter-dashboard') }}" class="logo-flow2">
            <img src="{{ asset('public/assets/images/logo.svg')}}" alt="logo-img" />
            <img class="hidelogo_header" src="{{ asset('public/assets/images/header-logo.svg')}}" alt="logo-img" />
          </a>
        </div>
        <div class="col_grid9 text-right">
          <div class="header_menu fw">
            <div class="togglebtn">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <?php 
            $userRole = Session::get('userRole');
            ?>
            @if($userRole == 2)
            <ul class="menu_right">
              <li class="{{ request()->is('student-dashboard') ? 'active' : '' }}">
                <a href="{{url('student-dashboard')}}">Home </a>
              </li>
              <li class="{{ request()->is('web/blog') ? 'active' : '' }}">
                <a href="{{url('web/blog')}}">Blogs </a>
              </li>
              <li class="{{ request()->is('student/jobs') ? 'active' : '' }}">
                <a href="{{url('student/jobs')}}">Jobs </a>
              </li>
              <li class="{{ request()->is('notifications') ? 'active' : '' }}">
                <a href="{{url('notification')}}">Notifications </a>
              </li>
              <li class="{{ request()->is('contact_us') ? 'active' : '' }}">
                <a href="{{url('contact_us')}}">Contact Us </a>
              </li>
            </ul>
            @else
            <ul class="menu_right">
              <li class="{{ request()->is('recruiter-dashboard') ? 'active' : '' }}">
                <a href="{{ URL::to('recruiter-dashboard') }}" class="subcategory">Home </a>
              </li>
              <li class="{{ request()->is('web/blog') ? 'active' : '' }}">
                <a href="{{URL::to('web/blog')}}" class="subcategory">Blogs </a>
              </li>
              <li class="{{ request()->is('web/post/jobs') ? 'active' : '' }}">
                <a href="{{URL::to('web/post/jobs')}}" class="subcategory">Post a Job </a>
              </li>
              <li class="{{ request()->is('notification') ? 'active' : '' }}">
                <a href="{{URL::to('notification')}}" class="subcategory">Notifications </a>
              </li>
              <li class="{{ request()->is('contact_us') ? 'active' : '' }}">
                <a href="{{URL::to('contact_us')}}" class="subcategory">Contact Us </a>
              </li>
            </ul>
            @endif
            <div class="login_user">
              <a class="user_dropdown" href="#">
                <i>

                  @if($OrgData->users_role ==='2')
                  <img src="{{ URL::asset('/public/uploads/') }}/{{ $OrgData->profile_image }}" alt="img">
                  @else
                  <img src="{{ URL::asset('/public/uploads/') }}/{{ $OrgData->org_image }}" alt="img">
                  @endif
                </i>
                <span>{{ $OrgData->name ?? ''}} <img src="{{ asset('public/assets/images/user-downarrow.png')}}" alt="img"></span>
              </a>
              @if($userRole == 2)
              <ul class="userdrop_down">
                <li class="{{ request()->is('student-dashboard') ? 'active' : '' }}">
                  <a href="{{url('student-dashboard')}}" class="username">{{$OrgData->name}}
                    <span>{{$OrgData->email}}</span></a>
                </li>
                <li class="{{ request()->is('student_setting') ? 'active' : '' }}">
                  <a href="{{url('student_setting')}}">Settings</a>
                </li>
                <li class="{{ request()->is('student_change_password') ? 'active' : '' }}">
                  <a href="{{url('student_change_password')}}">Change Password</a>
                </li>
                <li>
                  <a href="{{ url('/logout') }}" onClick="event.preventDefault();  document.getElementById('logout-form').submit();">Logout</a>
                  <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                    {{ csrf_field() }}
                  </form>
                </li>
              </ul>
              @else
              <ul class="userdrop_down">
                <li class="{{ request()->is('recruiter/basic/info') ? 'active' : '' }}">
                  <a href="{{URL::to('recruiter/basic/info')}}" class="username">{{$OrgData->name ?? ''}}
                    <span>{{ $OrgData->email ?? ''}}</span></a>
                </li>
                <li class="{{ request()->is('student_setting') ? 'active' : '' }}">
                  <a href="{{url('student_setting')}}">Settings</a>
                </li>
                <li class="{{ request()->is('student_change_password') ? 'active' : '' }}">
                  <a href="{{url('student_change_password')}}">Change Password</a>
                </li>
                <li>
                  <a href="{{ url('user-logout') }}">Logout</a>
                </li>
              </ul>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
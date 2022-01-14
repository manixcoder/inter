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
  
  <link rel="icon" type="image/png" href="{{ URL::asset('/public/uploads/favicon.jpeg') }}"/>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="{{ asset('public/assets/web_assets/css/style.css')}}" rel="stylesheet">
  <link href="{{ asset('public/assets/web_assets/fonts/fonts.css')}}" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!--<script src="jquery-3.5.1.min.js"></script>-->
</head>

<body class="lightwht_bg">
  @if (!Auth::guest())
  @php
  $userRole = Auth::user()->users_role;
  //$userRole = Session::get('userRole');
  //$id = Session::get('gorgID');
  $id = Auth::user()->id;
  $OrgData = DB::table('users')->where('id', $id)->first();
  //dd($OrgData);
  $todaysdate = date('Y-m-d').' 00:00:00';
  @endphp
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

            @if(Auth::user()->users_role === '2')
            <ul class="menu_right">
              <li class="{{ request()->is('student-dashboard') ? 'active' : '' }}">
                <a href="{{ URL::to('student-dashboard')}}">Home </a>
              </li>
              <li class="{{ request()->is('web/blog') ? 'active' : '' }} {{ request()->is('web/blog/detail') ? 'active' : '' }}">
                <a href="{{ URL::to('web/blog')}}">Blogs </a>
              </li>
              <li class="{{ request()->is('student/jobs') ? 'active' : '' }}">
                <a href="{{ URL::to('student/jobs')}}">Jobs </a>
              </li>
              <li class="{{ request()->is('notification') ? 'active' : '' }}">
                <a href="{{ URL::to('notification')}}">
                  Notifications
                  @if(auth()->user()->unreadNotifications->count() > 0)
                  <span class="badge badge-light">{{ auth()->user()->unreadNotifications->count() }}</span>
                  @endif
                </a>
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
              <li class="{{ request()->is('web/blog') ? 'active' : '' }} {{ request()->is('web/blog/detail') ? 'active' : '' }}">
                <a href="{{ URL::to('web/blog')}}" class="subcategory">Blogs </a>
              </li>
              @if(Auth::user()->users_role === '2')
              <li class="{{ request()->is('student/jobs') ? 'active' : '' }}">
                <a href="{{ URL::to('student/jobs')}}">Jobs </a>
              </li>
              @else
              <li class="{{ request()->is('web/post/jobs') ? 'active' : '' }}">
                <a href="{{ URL::to('web/post/jobs') }}" class="subcategory">Post a Job </a>
              </li>
              @endif

              <li class="{{ request()->is('notification') ? 'active' : '' }}">
                <a href="{{ URL::to('notification') }}" class="subcategory">Notifications
                  @if(auth()->user()->unreadNotifications->count() > 0)
                  <span class="badge badge-light">{{ auth()->user()->unreadNotifications->count() }}</span>
                  @endif
                </a>
              </li>
              <li class="{{ request()->is('contact_us') ? 'active' : '' }}">
                <a href="{{ URL::to('contact_us') }}" class="subcategory">Contact Us </a>
              </li>
            </ul>
            @endif
            <div class="login_user">
              <a class="user_dropdown" href="#">
                <i>
                  @if(Auth::user()->profile_image)
                  <img src="{{ URL::asset('/public/uploads/') }}/{{ Auth::user()->profile_image }}" alt="img">
                  @else
                  <img src="{{ URL::asset('/public/uploads/blank-profile-picture.png') }}" alt="img">
                  @endif
                </i>
                <span>{{ Auth::user()->name ?? ''}} <img src="{{ asset('public/assets/images/user-downarrow.png')}}" alt="img"></span>
              </a>
              @if(Auth::user()->users_role === '2')
              <ul class="userdrop_down">
                <li class="{{ request()->is('student-dashboard') ? 'active' : '' }}">
                  <a href="{{url('student-dashboard')}}" class="username">
                    {{ Auth::user()->name}}
                    <span>
                      {{ Auth::user()->email}}
                    </span>
                  </a>
                </li>
                <li class="{{ request()->is('student_setting') ? 'active' : '' }}">
                  <a href="{{url('student_setting')}}">
                    Settings
                  </a>
                </li>
                <li class="{{ request()->is('student_change_password') ? 'active' : '' }}">
                  <a href="{{url('student_change_password')}}">
                    Change Password
                  </a>
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
                  <a href="{{URL::to('recruiter/basic/info')}}" class="username">{{Auth::user()->name}}
                    <span>{{ Auth::user()->email}}</span></a>
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
  @else
  <header class="header_sec blog_header mobileHidesec fw">
    <div class="lgcontainer">
      <div class="innerrow">
        <div class="col_grid12">
          <ul class="nav-menu fw">
            <div class="togglebtn">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <div class="left_sec col_grid4 text-left menu_link">
              <li><a href="http://localhost/internify">Home</a></li>
              <li class="active"><a href="http://localhost/internify/blog">Blogs</a></li>
            </div>
            <div class="center_sec text-center col_grid4 menu_logo">
              <a href="http://localhost/internify">
                <img src="http://localhost/internify/public/assets/images/header-logo.svg" alt="logo">
                <img src="http://localhost/internify/public/assets/images/logo.svg" alt="wht-logo" class="wth-logo-hide">
              </a>

            </div>
            <div class="right_sec col_grid4 text-right menu_link">
              <li><a href="http://localhost/internify/web-login">Login</a></li>
              <li><a href="http://localhost/internify/contactus">Contact us</a></li>
            </div>
          </ul>
        </div>
      </div>
    </div>
  </header>

  @endif
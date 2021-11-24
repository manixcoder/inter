<div class="innerrow">
          <div class="col_grid3">
            <a href="{{url('student-dashboard')}}" class="logo-flow2">
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
                <li class="{{ request()->is('notification') ? 'active' : '' }}">
                  <a href="{{url('notification')}}">Notifications </a>
                </li>
                <li class="{{ request()->is('contact_us') ? 'active' : '' }}">
                  <a href="{{url('contact_us')}}">Contact Us </a>
                </li>
              </ul>
              <div class="login_user">
                <a class="user_dropdown" href="#">
                  <i>
                    
                  @if(Auth::user()->users_role == 2)
                      <img src="{{ URL::asset('/public/uploads/') }}/{{ Auth::user()->profile_image ?? ''}}" alt="img">
                    @else
                      <img src="{{ URL::asset('/public/uploads/') }}/{{ Auth::user()->org_image }}" alt="img">
                    @endif
                
                </i>
                  <span>{{ Auth::user()->name}} <img src="{{ asset('public/assets/images/user-downarrow.png')}}" alt="img"></span>
                </a>
                <ul class="userdrop_down">
                  <li>
                    <a href="{{url('student-dashboard')}}" class="username">{{Auth::user()->name}}
                    <span >{{Auth::user()->email}}</span></a>
                  </li>
                  <li>
                    <a href="{{url('student_setting')}}">Settings</a>
                  </li>
                  <li>
                    <a href="{{url('student_change_password')}}">Change Password</a>
                  </li>
                  <li>
                    <a href="{{ url('user-logout') }}" >Logout</a>
                     
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
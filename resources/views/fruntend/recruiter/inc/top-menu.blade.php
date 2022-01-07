<div class="innerrow">
  <div class="col_grid3">
    <a href="{{ URL::to('/') }}" class="logo-flow2">
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
        <li>
          <a href="{{ URL::to('/') }}">
            Home
          </a>
        </li>
        <li>
          <a href="#">
            Blogs
          </a>
        </li>
        <li>
          <a href="{{URL::to('web/post/jobs')}}">
            Post a Job
          </a>
        </li>
        <li>
          <a href="#">
            Notifications
          </a>
        </li>
        <li>
          <a href="#">
            Contact Us
          </a>
        </li>
      </ul>
      <div class="login_user">
        <a class="user_dropdown" href="#">
          <i><img src="{{ asset('public/assets/images/userimg-icon.png')}}" alt="img"></i>
          <span>
            {{$OrgData->name}}
            <img src="{{ asset('public/assets/images/user-downarrow.png')}}" alt="img">
          </span>
        </a>
        <ul class="userdrop_down">
          <li>
            <a href="./profile_basic_info.html" class="username">{{$OrgData->name}}
              <span>{{$OrgData->email}}</span></a>
          </li>
          <li>
            <a href="#">Settings</a>
          </li>
          <li>
            <a href="#">Change Password</a>
          </li>
          <li>
            <a href="{{ url('user-logout') }}">Logout</a>

          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
@php 
    $userRole = Session::get('userRole');
    $id = Session::get('gorgID');
    $recruiterInfo = DB::table('users')->where('id', $id)->first();
    $studentdata = DB::table('users')->where('status', 0)->where('users_role', 2)->get();
    $recruiterdata = DB::table('users')->where('status', 0)->where('users_role', 3)->get();
    $todaysdate = date('Y-m-d').' 00:00:00';   

    $posts = DB::table('posts')->where('user_id', $recruiterInfo->id)->where('status', 0)->orderBy('id', 'Desc')->get();    
    $listedjobs = DB::table('jobs')->where('user_id', $id)->orderBy('id', 'Desc')->get();
  @endphp
    <div class="body_wht-inners basicInfo_tab ">
      <div class="lgcontainer">
        <div class="boxDetailbg fw">
          <figure>
            <img src="{{ asset('public/assets/images/company_profileBG.png')}}" alt="jobs" />
          </figure>
        </div>
        <div class="compnayProfile_user fw">
          <div class="userBox_img">
            <img src="{{ URL::asset('/public/assets/org_images/') }}/{{ $recruiterInfo->org_image ?? ''}}" alt="icon_logo" />
          </div>
        </div> 
        <div class="tabCompnay_profile text-center fw">
          <ul class="profileTab" id="">
            <li class="{{ request()->is('basic/info') ? 'active' : '' }}">
              <a  href="{{ URL::to('basic/info') }}">Basic Info</a>
            </li>
            <li class="{{ request()->is('recruiter-about') ? 'active' : '' }}">
              <a href="{{ URL::to('recruiter-about') }}">About</a>
            </li>
            <li class="{{ request()->is('recruiter-posts') ? 'active' : '' }}">
              <a href="{{ URL::to('recruiter-posts')}}">My Posts</a>
            </li>
            <li class="{{ request()->is('recruiter-listings') ? 'active' : '' }}">
              <a href="{{ URL::to('recruiter-listings')}}">My Listings</a>
            </li>
            <li class="{{ request()->is('recruiter-followers') ? 'active' : '' }}">
              <a href="{{ URL::to('recruiter-followers')}}">Followers</a>
            </li>
            <li class="{{ request()->is('recruiter-people') ? 'active' : '' }}">
              <a href="{{ URL::to('recruiter-people')}}">People</a>
            </li>
          </ul>
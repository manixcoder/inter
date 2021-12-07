@include('fruntend.common_pages.web_header')
@include('fruntend.recruiter_profile_section.recruiter_basicinfo_sub_menues')
@php
$userRole = Session::get('userRole');
$id = Session::get('gorgID');
$recruiterInfo = DB::table('users')->where('id', $id)->first();
$studentdata = DB::table('users')->where('status', 0)->where('id','!=',$id)->where('users_role', 2)->get();
$recruiterdata = DB::table('users')->where('status', 0)->where('id','!=',$id)->where('users_role', 3)->get();
$todaysdate = date('Y-m-d').' 00:00:00';

$posts = DB::table('posts')->where('user_id', $recruiterInfo->id)->where('status', 0)->orderBy('id', 'Desc')->get();
$listedjobs = DB::table('jobs')->where('user_id', $id)->orderBy('id', 'Desc')->get();
@endphp

<!-- Recruiter Peoples section -->
<div class="profileTab_contBox" id="profileTab_link5">
  <div class="followers_sec fw">
    @if(isset($recruiterdata))
    @foreach($recruiterdata as $value)

    <div class="followers_shodeobox fw">
      <div class="innerrow">
        <div class="col_grid8 text-left">
          <div class="img_box">
            <img src="{{ URL::asset('/public/uploads/') }}/{{ $value->org_image }}" alt="icon">
          </div>
          <span class="font24Text clrBlack">{{ $value->name ?? ''}}
            <small>{{ $value->designation ?? ''}}</small>
          </span>
        </div>
        <div class="col_grid4 text-right">
          <div class="commentsApply mrtop0 fw">
            @php
            $check_follow = DB::table('followers')->where('user_id', $value->id)->where('follow_id', $id)->first();
            @endphp
            @if(isset($check_follow))
            <a href="{{ url('/recruiter-unfollow/'.$value->id.'/'.$id ) }}" class='unfollow_btn'>UnFollow</a>
            @else
            <a href="{{ url('/recruiter-follow/'.$value->id.'/'.$id ) }}" class='follow_btn'>Follow</a>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endforeach
    @endif
  </div>
</div>
</div>
</div>
</div>
@include('fruntend.common_pages.web_footer')
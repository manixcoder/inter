@include('fruntend.common_pages.web_header')
@include('fruntend.recruiter_profile_section.recruiter_basicinfo_sub_menues')
@php
$userRole = Session::get('userRole');
$id = Session::get('gorgID');
$recruiterInfo = DB::table('users')->where('id', $id)->first();

$check_follow = DB::table('followers')->where('follow_id', $id)->get();
$string = '';
foreach ($check_follow as $key => $value) {
$string .= ",$value->user_id";
}
$string = substr($string, 1);
$studentdata = DB::table('users')->where('status', 0)->whereIn('id', [$string])->where('users_role', 3)->get();

//$studentdata = DB::table('users')->where('status', 0)->where('id','!=',$id)->where('users_role', 2)->get();
$recruiterdata = DB::table('users')->where('status', 0)->where('users_role', 3)->get();
$todaysdate = date('Y-m-d').' 00:00:00';


$posts = DB::table('posts')->where('user_id', $recruiterInfo->id)->where('status', 0)->orderBy('id', 'Desc')->get();
$listedjobs = DB::table('jobs')->where('user_id', $id)->orderBy('id', 'Desc')->get();
@endphp
<!-- Recruiter Followers section -->


<div class="profileTab_contBox" id="profileTab_link4">
  <div class="followers_sec fw">
    @if(isset($studentdata))
    <?php
    // echo "<pre>";
    // print_r($studentdata);
    // die;
    ?>
    @foreach($studentdata as $value)
    <div class="followers_shodeobox fw">
      <div class="innerrow">
        <div class="col_grid8 text-left">
          <div class="img_box">
            @if($value->users_role=='3')
            <img src="{{ URL::asset('/public/uploads/') }}/{{ $value->org_image }}" alt="icon">
            @else
            <img src="{{ URL::asset('/public/uploads/') }}/{{ $value->profile_image }}" alt="icon">
            @endif
          </div>
          <span class="font24Text clrBlack">{{ $value->name ?? ''}}</span>
        </div>
        <!-- 
          <div class="col_grid4 text-right">
            <div class="commentsApply mrtop0 fw">
              <div class="commantsChat">
                <img src="{{ URL::asset('/public/assets/images/messageIcon.png') }}" alt="icon">
              </div>
            </div>
          </div> 
        -->
      </div>
    </div>
    @endforeach
    @else
    <div class="followers_shodeobox fw">
      <div class="innerrow">
        <div class="col_grid8 text-left">
          Record not found
        </div>
      </div>
    </div>
    @endif
  </div>
</div>
</div>
</div>
</div>
@include('fruntend.common_pages.web_footer')
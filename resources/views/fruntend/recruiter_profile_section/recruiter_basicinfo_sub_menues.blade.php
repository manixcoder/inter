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
<div class="body_wht-inners basicInfo_tab banner_image">
  <div class="lgcontainer">
    <div class="boxDetailbg fw">
      <figure>
        @if($recruiterInfo->org_image !='')
        <img id="img_profile" src="{{ asset('public/uploads')}}/{{ $recruiterInfo->org_image }}" alt="jobs" />
        @else
        <img id="img_profile" src="{{ asset('public/uploads/company_profileBG.png')}}" alt="jobs" />
        @endif
      </figure>
      <div class="form-group fileupload  banner-info">

      <input type="file" name="org_image" id="org_image" class="file-upload">
      <i class="camera-icon"><img src="{{ asset('public/assets/images/camera-icon.png')}}" alt="icon" /></i>
    </div>
    </div>
    
    <div class="profile_publicimg recruiter-remove-profile">
      <i class="camara-sdudentcamara"><img src="{{ asset('public/assets/images/camera-icon.png')}}" alt="icon" /></i>
      <div class="userBox_img">
        @if($recruiterInfo->profile_image !='')
        <img id="routput" src="{{ URL::asset('/public/uploads/') }}/{{ $recruiterInfo->profile_image ?? ''}}" alt="icon_logo" />
        @else
        <img id="routput" src="{{ asset('public/uploads/blank-profile-picture.png')}}" alt="jobs" />
        @endif
    </div>
    <div class="form-group fileupload">
      <input type="file" name="profile_image" id="profile_image" class="file-upload">
    </div>
    <form method="post" action="{{url('remove-profile-image')}}" class="remoovicon">
      @csrf
      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
      <button type="submit"><span>&#215;</span></button>
    </form>
</div>

    <div id="mgs_ta"></div>
    <div class="tabCompnay_profile text-center fw">
      <ul class="profileTab" id="">
        <li class="{{ request()->is('basic/info') ? 'active' : '' }}">
          <a href="{{ URL::to('basic/info') }}">Basic Info</a>
        </li>
        <li class="{{ request()->is('recruiter-about') ? 'active' : '' }}">
          <a href="{{ URL::to('recruiter-about') }}">About</a>
        </li>
        <!-- <li class="{{ request()->is('recruiter-posts') ? 'active' : '' }}">
              <a href="{{ URL::to('recruiter-posts')}}">My Posts</a>
            </li> -->
        <li class="{{ request()->is('recruiter-listings') ? 'active' : '' }}">
          <a href="{{ URL::to('recruiter-listings')}}">My Listings</a>
        </li>
        <!-- li class="{{ request()->is('recruiter-followers') ? 'active' : '' }}">
              <a href="{{ URL::to('recruiter-followers')}}">Followers</a>
            </li>
            <li class="{{ request()->is('recruiter-people') ? 'active' : '' }}">
              <a href="{{ URL::to('recruiter-people')}}">People</a>
            </li -->
      </ul>


      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

      <script type="text/javascript">
        $('#org_image').on('change', function(ev) {
          console.log("here inside");
          var filedata = this.files[0];
          var imgtype = filedata.type;
          var match = ['image/jpeg', 'image/jpg'];
          // if(!(imgtype==match[0])||(imgtype==match[1])){
          //     $('#mgs_ta').html('<p style="color:red">Plz select a valid type image..only jpg jpeg allowed</p>');
          //     }else{
          // $('#mgs_ta').empty();
          //---image preview
          var reader = new FileReader();
          reader.onload = function(ev) {
            $('#img_profile').attr('src', ev.target.result).css('width', '100%');
          }
          reader.readAsDataURL(this.files[0]);
          /// preview end
          //upload
          var postData = new FormData();
          postData.append('file', this.files[0]);
          var url = "{{url('org-image-upload')}}";
          $.ajax({
            headers: {
              'X-CSRF-Token': $('meta[name=csrf_token]').attr('content')
            },
            async: true,
            type: "post",
            contentType: false,
            url: url,
            data: postData,
            processData: false,
            success: function() {
              console.log("success");
            }
          });
          //}
        });


        $('#profile_image').on('change', function(ev) {
         // console.log("here inside");
          var filedata = this.files[0];
          var imgtype = filedata.type;
          var match = ['image/jpeg', 'image/jpg'];
          // if(!(imgtype==match[0])||(imgtype==match[1])){
          //   $('#mgs_ta').html('<p style="color:red">Plz select a valid type image..only jpg jpeg allowed</p>');
          //   }else{
          $('#mgs_ta').empty();
          //---image preview
          var reader = new FileReader();
          reader.onload = function(ev) {
            $('#routput').attr('src', ev.target.result).css('width', '100%');
          }
          reader.readAsDataURL(this.files[0]);
          /// preview end
          //upload
          var postData = new FormData();
          postData.append('file', this.files[0]);
          var url = "{{url('profile-image-upload')}}";
          $.ajax({
            headers: {
              'X-CSRF-Token': $('meta[name=csrf_token]').attr('content')
            },
            async: true,
            type: "post",
            contentType: false,
            url: url,
            data: postData,
            processData: false,
            success: function() {
              location.reload();
              return false;
              console.log("load");
            }
          });
          // }
        });
      </script>
      <script >
    $(document).ready(function(){
    $(".header_sec .togglebtn").click(function(){
      $(".header_sec ").toggleClass("opne_flow2header");
    });
  });
  </script>
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
          @if($recruiterInfo->org_image !='')
            <img  src="{{ asset('public/uploads')}}/{{ $recruiterInfo->org_image }}" alt="jobs" />
            @else
            <img id="img_profile" src="{{ asset('public/uploads/company_profileBG.png')}}" alt="jobs" />
            @endif
          </figure>
        </div>
        <div class="compnayProfile_user fw">
          <div class="userBox_img">
             @if($recruiterInfo->profile_image !='')
            <img  src="{{ URL::asset('/public/uploads/') }}/{{ $recruiterInfo->profile_image ?? ''}}" alt="icon_logo" />
            @else
            <img id="routput" src="{{ asset('public/uploads/no-image.png')}}" alt="jobs" />
            @endif
          </div>
        </div> 
        <div class="form-group">
          <label>Profile Image</label>
            <input type="file" name="profile_image" id="profile_image">
        </div>
        
        <div class="form-group">
              <label>Banner Image</label>
              <input type="file" name="org_image" id="org_image">
            </div>
        
        
        <div id="mgs_ta"></div>
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
  $('#org_image').on('change',function(ev){
    console.log("here inside");
    var filedata=this.files[0];
    var imgtype=filedata.type;
    var match=['image/jpeg','image/jpg'];
    if(!(imgtype==match[0])||(imgtype==match[1])){
        $('#mgs_ta').html('<p style="color:red">Plz select a valid type image..only jpg jpeg allowed</p>');
        }else{
          $('#mgs_ta').empty();
          //---image preview
          var reader=new FileReader();
          reader.onload=function(ev){
            $('#img_profile').attr('src',ev.target.result).css('width','150px').css('height','150px');
          }
          reader.readAsDataURL(this.files[0]);
          /// preview end
          //upload
          var postData=new FormData();
          postData.append('file',this.files[0]);
          var url="{{url('org-image-upload')}}";
          $.ajax({
            headers:{'X-CSRF-Token':$('meta[name=csrf_token]').attr('content')},
            async:true,
            type:"post",
            contentType:false,
            url:url,
            data:postData,
            processData:false,
            success:function(){
              console.log("success");
            }
            });
          }
      });


      $('#profile_image').on('change',function(ev){
        console.log("here inside");
        var filedata=this.files[0];
        var imgtype=filedata.type;
        var match=['image/jpeg','image/jpg'];
        if(!(imgtype==match[0])||(imgtype==match[1])){
          $('#mgs_ta').html('<p style="color:red">Plz select a valid type image..only jpg jpeg allowed</p>');
          }else{
          $('#mgs_ta').empty();
          //---image preview
          var reader=new FileReader();
          reader.onload=function(ev){
            $('#routput').attr('src',ev.target.result).css('width','100%');
          }
          reader.readAsDataURL(this.files[0]);
          /// preview end
          //upload
          var postData=new FormData();
          postData.append('file',this.files[0]);
          var url="{{url('profile-image-upload')}}";
          $.ajax({
            headers:{'X-CSRF-Token':$('meta[name=csrf_token]').attr('content')},
            async:true,
            type:"post",
            contentType:false,
            url:url,
            data:postData,
            processData:false,
            success:function(){
              console.log("success");
            }
            });
          }
      });
</script>
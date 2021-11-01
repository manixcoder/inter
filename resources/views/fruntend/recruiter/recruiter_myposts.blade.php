  @include('fruntend.common_pages.web_header')  

  @php 
    $userRole = Session::get('userRole');
    $id = Session::get('gorgID');
    $recruiterInfo = DB::table('users')->where('id', $id)->first();
    $todaysdate = date('Y-m-d').' 00:00:00';   

    $posts = DB::table('posts')->where('user_id', $recruiterInfo->id)->where('status', 0)->orderBy('id', 'Desc')->get();
  @endphp

    <div class="body_wht-inners basicInfo_tab ">
      <div class="lgcontainer">
        <div class="boxDetailbg fw">
          <figure>
          @if($recruiterInfo->profile_image !='no-image.png')
            <img src="{{ asset('public/assets/org_images')}}/{{ $recruiterInfo->profile_image }}" alt="jobs" />
            @else
            <img src="{{ asset('public/assets/images/company_profileBG.png')}}" alt="jobs" />
            @endif
          </figure>
        </div>
        <div class="compnayProfile_user fw">
          <div class="userBox_img">
            <img src="{{ URL::asset('/public/assets/org_images/') }}/{{ $recruiterInfo->org_image ?? ''}}" alt="icon_logo" />
          </div>
        </div> 
        <div class="tabCompnay_profile text-center fw">
          <ul class="profileTab" id="profileTab_link">
            <li>
              <a href="#profileTab_link0">Basic Info</a>
            </li>
            <li class="active">
              <a href="#profileTab_link1">About</a>
            </li>
            <li>
              <a href="#profileTab_link2">My Posts</a>
            </li>
            <li>
              <a href="#profileTab_link3">My Listings</a>
            </li>
            <li>
              <a href="#profileTab_link4">Followers</a>
            </li>
            <li>
              <a href="#profileTab_link5">People</a>
            </li>
          </ul>

          <!-- Recruiter Basic info section -->
          <div class="profileTab_contBox" id="profileTab_link0">
            <div class="comProInfo_cont fw">
              <div class="innerrow">

                <form class="form_sec fw col_grid12" action="{{ URL::to('edit/recruiter/profile')}}" method="POST" id="FormValidation" enctype="multipart/form-data">
                @csrf
                  <div class="fw praDesignation">
                    <p>Basic Info is only visible to your internal company as well as the admin.</p>
                  </div>
                  <div class="innerrow">
                    <div class="col_grid6 ">
                      <div class="form-group">
                        <label>Your Full Name</label>
                        <input type="hidden" name="edit_id" value="{{ $recruiterInfo->id }}">
                        <input type="text" name="name" placeholder="" class="form-control" value="{{ $recruiterInfo->name ?? ''}}" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required="" maxlength="100">
                      </div>
                    </div>
                    <div class="col_grid6 ">
                      <div class="form-group">
                        <label>Designation</label>
                        <input type="text" name="designation" placeholder="" class="form-control" value="{{ $recruiterInfo->designation ?? ''}}" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required="" maxlength="100">
                      </div>
                    </div>
                    <div class="col_grid6 ">
                      <div class="form-group">
                        <label>Mobile Number</label>
                        <input type="text" name="phone" class="form-control" onkeyup="this.value=this.value.replace(/[^\d]/,'')" placeholder="Enter your mobile number" class="form-control" required maxlength="10" value="{{ $recruiterInfo->phone }}" />

                        <span class="inputcheck"><img src="{{ asset('public/assets/images/verified.png')}}" alt="icon"></span>
                      </div>
                    </div>
                    <div class="col_grid6 ">
                      <div class="form-group">
                        <label>Official Email Address</label>
                        <input type="text" name="email" placeholder="" id='txtEmail' class="email form-control" value="{{ $recruiterInfo->email ?? ''}}" required="" maxlength="100">
                        <span class="inputcheck"><img src="{{ asset('public/assets/images/verified.png')}}" alt="icon"></span>
                        <span style="display:none; color: red;" class="emailvalidation">Enter valid email address.!</span>
              <span style="display:none; color: red;" class="emailvalidation1">Please Enter email address.!</span>
                      </div>
                    </div>
                    <div class="confirmApply postjob_btn col_grid12 fw">
                      <button type="submit" class="input-btn text-left" id='btnValidate' data-modal="#createNewPostrecuriter">Edit Info<i><img src="{{ asset('public/assets/images/edit_info.png')}}" alt="icon"></i></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- Recruiter About section -->
          <div class="profileTab_contBox basicTab_contBox" id="profileTab_link1">
            <form class="form_sec fw col_grid12" action="{{ URL::to('edit/recruiter/about')}}" method="POST" id="FormValidation" enctype="multipart/form-data">
                @csrf
              <div class="innerrow">
                <div class="col_grid12 ">
                  <div class="form-group">
                    <label>Overview</label>
                    <input type="hidden" name="edit_id" value="{{ $recruiterInfo->id }}">
                    <textarea name="requirter_overview" id="" cols="30" rows="10" class="form-control">{{ $recruiterInfo->requirter_overview }}</textarea>
                  </div>
                </div>
                <div class="col_grid12 ">
                  <div class="form-group">
                    <label>Website</label>
                    <input type="text" name="website" placeholder="" class="form-control" value="{{ $recruiterInfo->website ?? ''}}" maxlength="100">
                  </div>
                </div>
                <div class="col_grid6 ">
                  <div class="form-group">
                    <label>Industry</label>
                    <input type="text" name="industry" placeholder="" class="form-control" value="{{ $recruiterInfo->industry ?? ''}}" maxlength="100">
                  </div>
                </div>
                <div class="col_grid6 ">
                  <div class="form-group">
                    <label>Company size</label>
                    <input type="text" name="company_size" placeholder="" class="form-control" value="{{ $recruiterInfo->company_size ?? ''}}" maxlength="100">
                  </div>
                </div>
                <div class="col_grid12 ">
                  <div class="form-group">
                    <label>Organization name</label>
                    <input type="text" name="org_name" placeholder="" class="form-control" value="{{ $recruiterInfo->org_name ?? ''}}" maxlength="100">
                  </div>
                </div>
                <div class="col_grid12 ">
                  <div class="form-group">
                    <label>Headquarters</label>
                    <input type="text" name="headquarters" placeholder="" class="form-control" value="{{ $recruiterInfo->headquarters ?? ''}}" maxlength="100">
                  </div>
                </div>
                <div class="col_grid12 ">
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" placeholder="" class="form-control" value="{{ $recruiterInfo->address ?? ''}}" maxlength="200">
                  </div>
                </div>
                <div class="col_grid6 ">
                  <div class="form-group">
                    <label>Type</label>
                    <input type="text" name="type" placeholder="" class="form-control" value="{{ $recruiterInfo->type ?? ''}}" maxlength="100">
                  </div>
                </div>
                <div class="col_grid6 ">
                  <div class="form-group">
                    <label>Founded</label>
                    <input type="text" name="founded" placeholder="" class="form-control" value="{{ $recruiterInfo->founded ?? ''}}">
                  </div>
                </div>
                <div class="col_grid12 ">
                  <div class="form-group">
                    <label>Specialties</label>
                    <textarea name="specialties" id="" cols="30" rows="10" class="form-control">{{ $recruiterInfo->specialties ?? '' }}</textarea>
                  </div>
                </div>
                <div class="confirmApply postjob_btn col_grid12 fw">
                  <button type="submit" class="input-btn text-left" data-modal="#createNewPostrecuriter">Edit About <i><img src="{{ asset('public/assets/images/edit_info.png')}}" alt="icon"></i></button>
                </div>
              </div>
            </form>
          </div>

          <!-- Recruiter Posts section -->
          <div class="profileTab_contBox " id="profileTab_link2">
            <div class="small_contaner blogcontainer">
              <div class="fw posted_heading">
                <h3 class="font36text clrBlack semiboldfont_fmly">
                  You have posted ({{ count($posts ?? '') }} Posts)
                  <span class="pull-right">
                    <a  href="javascript:void(0);" class="open-modal input-btn" data-modal="#createNewPostrecuriter">Create a New Post</a>
                  </span>
                </h3>
              </div>

              @if(isset($posts))
                @foreach($posts as $postdata)
                  <div class="content-group fw">
                    <div class="text-cont fw">
                      <div class="userCommnet_deta fw">
                        <span><img src="{{ URL::asset('/public/assets/post_images/') }}/{{ $recruiterInfo->profile_image }}" alt="icon"></span>
                        <div class="userCommnet_Name">
                          <h4>{{ $recruiterInfo->name ?? ''}}<span>{{ date('d M Y | H:i', strtotime($postdata->date_time)) }}</span> <span class="delete_postbtn"><a href="{{ URL::to('post-delete',$postdata->id) }}" onclick="return confirm('Are you sure you want to delete this item?');"> <i><img src="{{ URL::asset('/public/assets/images/delete.png') }}" alt="delete-icon" /></i> Delete Post</a></span></h4>
                        </div>
                      </div>
                      <p class="site-pra">{{ $postdata->description ?? ''}}</p>
                    </div>
                    <div class="img-cont fw">
                      <figure class="full-img">
                        <img src="{{ URL::asset('/public/assets/post_images/') }}/{{ $postdata->post_image }}" alt="img1">
                      </figure>
                    </div>
                    <ul class="commntsMsgBox fw">
                      <li>
                        <a href="#"><span><img src="{{ URL::asset('/public/assets/images/likedIcon.png') }}" alt="icon"></span> 35 Likes</a>
                      </li>
                      <li>
                        <a href="#"><span><img src="{{ URL::asset('/public/assets/images/commentIcon.png') }}" alt="icon"></span> 05 Comments</a>
                      </li>
                      <li>
                        <a href="#"><span><img src="{{ URL::asset('/public/assets/images/messageIcon.png') }}" alt="icon"></span> Message</a>
                      </li>
                      <li>
                        <a href="#"><span><img src="{{ URL::asset('/public/assets/images/shareIcon.png') }}" alt="icon"></span> Share</a>
                      </li>
                    </ul>
                  </div>
                @endforeach
              @endif
             
            </div>
          </div>

          <!-- Recruiter Lostings section -->
          <div class="profileTab_contBox" id="profileTab_link3">
            <div class="small_contaner mylisting_recuriter">
              <div class="findblog_search blogView_search fw">
                <form class="fw">
                  <div class="from-group">
                    <div class="input-icon">
                      <i><img src="images/searchIcon.png" alt="icon"></i>
                      <input class="form-control" type="text" name="search" placeholder="Find your friends or companies you want to work at!">
                    </div>
                    <div class="btn_group">
                      <button type="button" class="input-btn">Search</button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="fw posted_heading">
                <h3 class="font36text clrBlack semiboldfont_fmly">
                  <span>You have listed (03 jobs)</span> 
                  <span class="pull-right">
                    <a href="javascript:void(0);" class="open-modal input-btn" data-modal="#">Post a New Job</a>
                  </span>
                </h3>
              </div>
              <div class="fw profilePost_wapper listjob_wapper">
                <div class="jobsDetailBox fw">
                  <div class="profile_sec fw" >
                    <div class="compnayBoxImg">
                      <img src="images/newtechlogo.png" alt="images" />
                    </div>
                    <div class="compnay">
                      <h5>Mumbai</h5>
                      <a href="jobs_detailrecuiter.html" class="interested_link"> 3 Interested Candidates</a>
                    </div>
                  </div>
                  <div class="jobsDetailCont fw">
                    <h3>ARK Newtech Private Limited</h3>
                    <p><a href="#" class="lightblue_text">Junior Associate - SAS Programming</a></p>
                    <div class="innerrow">
                      <div class="col_grid9">
                        <ul>
                          <li>Great opportunity for freshers to kickstart their career</li>
                          <li>Be part of a dynamic and supportive work environment</li>
                        </ul>
                      </div>
                      <div class="col_grid3">
                        <a href="./jobs_detailrecuiter.html"  class="input-btn redBGmanage_btn ">View Job</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="jobsDetailBox fw">
                  <div class="profile_sec fw" >
                    <div class="compnayBoxImg">
                      <img src="images/header-logo.svg" alt="images" />
                    </div>
                    <div class="compnay">
                      <h5>New Delhi</h5>
                      <a href="jobs_detailrecuiter.html" class="interested_link"> 3 Interested Candidates</a>
                    </div>
                  </div>
                  <div class="jobsDetailCont fw">
                    <h3>Quess Private Limited</h3>
                    <p><a href="#" class="lightblue_text">Junior Associate - SAS Programming</a></p>
                    <div class="innerrow">
                      <div class="col_grid9">
                        <ul>
                          <li>Great opportunity for freshers to kickstart their career</li>
                          <li>Be part of a dynamic and supportive work environment</li>
                        </ul>
                      </div>
                      <div class="col_grid3">
                        <a href="./jobs_detailrecuiter.html"  class="input-btn redBGmanage_btn ">View Job</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="jobsDetailBox fw">
                  <div class="profile_sec fw" >
                    <div class="compnayBoxImg">
                      <img src="images/newtechlogo.png" alt="images" />
                    </div>
                    <div class="compnay">
                      <h5>Mumbai</h5>
                      <a href="jobs_detailrecuiter.html" class="interested_link"> 3 Interested Candidates</a>
                    </div>
                  </div>
                  <div class="jobsDetailCont fw">
                    <h3>ARK Newtech Private Limited</h3>
                    <p><a href="#" class="lightblue_text">Junior Associate - SAS Programming</a></p>
                    <div class="innerrow">
                      <div class="col_grid9">
                        <ul>
                          <li>Great opportunity for freshers to kickstart their career</li>
                          <li>Be part of a dynamic and supportive work environment</li>
                        </ul>
                      </div>
                      <div class="col_grid3">
                        <a href="./jobs_detailrecuiter.html"  class="input-btn redBGmanage_btn ">View Job</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="jobsDetailBox fw">
                  <div class="profile_sec fw" >
                    <div class="compnayBoxImg">
                      <img src="images/newtechlogo.png" alt="images" />
                    </div>
                    <div class="compnay">
                      <h5>Mumbai</h5>
                      <span>2 days ago</span>
                    </div>
                  </div>
                  <div class="jobsDetailCont fw">
                    <h3>ARK Newtech Private Limited</h3>
                    <p><a href="#" class="lightblue_text">Junior Associate - SAS Programming</a></p>
                    <div class="innerrow">
                      <div class="col_grid9">
                        <ul>
                          <li>Great opportunity for freshers to kickstart their career</li>
                          <li>Be part of a dynamic and supportive work environment</li>
                        </ul>
                      </div>
                      <div class="col_grid3">
                        <a href="./jobs_detailrecuiter.html"  class="input-btn redBGmanage_btn ">View Job</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="jobsDetailBox fw">
                  <div class="profile_sec fw" >
                    <div class="compnayBoxImg">
                      <img src="images/newtechlogo.png" alt="images" />
                    </div>
                    <div class="compnay">
                      <h5>Mumbai</h5>
                      <span>2 days ago</span>
                    </div>
                  </div>
                  <div class="jobsDetailCont fw">
                    <h3>ARK Newtech Private Limited</h3>
                    <p><a href="#" class="lightblue_text">Junior Associate - SAS Programming</a></p>
                    <div class="innerrow">
                      <div class="col_grid9">
                        <ul>
                          <li>Great opportunity for freshers to kickstart their career</li>
                          <li>Be part of a dynamic and supportive work environment</li>
                        </ul>
                      </div>
                      <div class="col_grid3">
                        <a href="./jobs_detailrecuiter.html"  class="input-btn redBGmanage_btn ">View Job</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Recruiter Followers section -->
          <div class="profileTab_contBox" id="profileTab_link4">
            <div class="followers_sec fw">
              <div class="followers_shodeobox fw">
                <div class="innerrow">
                  <div class="col_grid8 text-left">
                    <div class="img_box">
                      <img src="images/userimg-icon.png" alt="icon">
                    </div>
                    <span class="font24Text clrBlack">Jaiks Doe</span>
                  </div>
                  <div class="col_grid4 text-right">
                    <div class="commentsApply mrtop0 fw">
                      <div class="commantsChat">
                        <img src="images/messageIcon.png" alt="icon">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="followers_shodeobox fw">
                <div class="innerrow">
                  <div class="col_grid8 text-left">
                    <div class="img_box">
                      <img src="images/userimg-icon.png" alt="icon">
                    </div>
                    <span class="font24Text clrBlack">Jaiks Johnson</span>
                  </div>
                  <div class="col_grid4 text-right">
                    <div class="commentsApply mrtop0 fw">
                      <div class="commantsChat">
                        <img src="images/messageIcon.png" alt="icon">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="followers_shodeobox fw">
                <div class="innerrow">
                  <div class="col_grid8 text-left">
                    <div class="img_box">
                      <img src="images/userimg-icon.png" alt="icon">
                    </div>
                    <span class="font24Text clrBlack">Jaiks Doe</span>
                  </div>
                  <div class="col_grid4 text-right">
                    <div class="commentsApply mrtop0 fw">
                      <div class="commantsChat">
                        <img src="images/messageIcon.png" alt="icon">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Recruiter Peoples section -->
          <div class="profileTab_contBox" id="profileTab_link5">
            <div class="followers_sec fw">
              <div class="followers_shodeobox fw">
                <div class="innerrow">
                  <div class="col_grid8 text-left">
                    <div class="img_box">
                      <img src="images/userimg-icon.png" alt="icon">
                    </div>
                    <span class="font24Text clrBlack">Jaiks Doe
                      <small>Manager</small>
                    </span>
                  </div>
                  <div class="col_grid4 text-right">
                    <div class="commentsApply mrtop0 fw">
                      <div class="commantsChat">
                        <img src="images/messageIcon.png" alt="icon">
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="followers_shodeobox fw">
                <div class="innerrow">
                  <div class="col_grid8 text-left">
                    <div class="img_box">
                      <img src="images/userimg-icon.png" alt="icon">
                    </div>
                    <span class="font24Text clrBlack">Jaiks Johnson <small>Manager</small></span>
                  </div>
                  <div class="col_grid4 text-right">
                    <div class="commentsApply mrtop0 fw">
                      <div class="commantsChat">
                        <img src="images/messageIcon.png" alt="icon">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="followers_shodeobox fw">
                <div class="innerrow">
                  <div class="col_grid8 text-left">
                    <div class="img_box">
                      <img src="images/userimg-icon.png" alt="icon">
                    </div>
                    <span class="font24Text clrBlack">Jaiks Doe <small>Manager</small></span>
                  </div>
                  <div class="col_grid4 text-right">
                    <div class="commentsApply mrtop0 fw">
                      <div class="commantsChat">
                        <img src="images/messageIcon.png" alt="icon">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div> 

    <div class='modal personal_DtlPop createNewPost_popup' id='createNewPostrecuriter'>
      <div class="close fw">
        <a class='btn close-modal' data-modal="#createNewPostrecuriter" href="#"><img src="{{ asset('public/assets/images/close.png')}}" alt="icon"></a>
      </div>
      <div class='content fw'>
        <h3 class="modal_heading">Create a New Post</h3>
        <div class="form_sec fw ">

          <form  action="{{ URL::to('add-post')}}" method="POST" id="FormValidation" enctype="multipart/form-data">
            @csrf
            <div class="innerrow">
              <div class="col_grid12 upload_box_sec">
                <div class="uploadBox">
                  <input type="file" name="image" onchange="loadFile(event)" required="" />
                  <div class="file_cont">
                    <img style="max-width: 50%; height: auto;" src="{{ asset('public/assets/images/attach_img.png')}}" id="output" alt="icon" />
                    <h4 class="font24Text clrBlack">Attach Photo</h4>
                  </div>
                </div>
                <div class="uplaodCheckBtn">
                  <!-- <a href="#" >Post</a> -->

                  <button type="submit" class="input-btn"> <span><img src="{{ asset('public/assets/images/loginCheck_icon.png')}}" alt="icon" /></span> Post</button>
                </div>
              </div>
              <div class="col_grid12 ">
                <div class="form-group">
                  <input type="text" name="heading" placeholder="Enter Heading" class="form-control" required="">
                </div>
              </div>
              <div class="col_grid12 ">
                <div class="form-group">
                  <textarea  name="description" placeholder="What do you want to write here?" class="form-control"></textarea required="">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>  
    </div>

    <script type="text/javascript">        
      $(document).ready(function(e) {
        $('#btnValidate').click(function() {
            var sEmail = $('#txtEmail').val();
            if ($.trim(sEmail).length == 0) {
                $('.emailvalidation1').show();
                setTimeout(function () {
                  $('.emailvalidation1').hide();
                }, 3000);
                return false;
            }
            if (validateEmail(sEmail)) {              
            }
            else {
              $('.emailvalidation').show();
              setTimeout(function () {
                  $('.emailvalidation').hide();
              }, 3000);
              
                
                return false;
            }
        });
      });

    function validateEmail(sEmail) {
        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (filter.test(sEmail)) {
          return true;
        }
        else {
          return false;
        }
    }              
</script>
 <!-- image viewer -->
    <script>
      var loadFile = function(event) {
         var output = document.getElementById('output');
         output.src = URL.createObjectURL(event.target.files[0]);
         output.onload = function() {
           URL.revokeObjectURL(output.src) // free memory
         }
      };
    </script>

  @include('fruntend.common_pages.web_footer')  
    
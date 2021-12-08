  @include('fruntend.common_pages.web_header')

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
          @if($recruiterInfo->profile_image !='no-image.png')
          <img src="{{ asset('public/uploads')}}/{{ $recruiterInfo->profile_image }}" alt="jobs" />
          @else
          <img src="{{ asset('public/uploads/company_profileBG.png')}}" alt="jobs" />
          @endif


        </figure>
      </div>
      <div class="compnayProfile_user fw">
        <div class="userBox_img">
          <img src="{{ URL::asset('/public/uploads/') }}/{{ $recruiterInfo->org_image ?? ''}}" alt="icon_logo" />
        </div>
      </div>
      <div class="tabCompnay_profile text-center fw">
        <ul class="profileTab" id="profileTab_link">
          <li>
            <a class="active" href="#profileTab_link0">Basic Info</a>
          </li>
          <li>
            <a href="#profileTab_link1">About</a>
          </li>
          <li>
            <a href="#profileTab_link2">My Posts</a>
          </li>
          <li>
            <a href="#profileTab_link3">My Listings</a>
          </li>
          <!--li>
            <a href="#profileTab_link4">Followers</a>
          </li>
          <li>
            <a href="#profileTab_link5">People</a>
          </li-->
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
                      <input type="text" id="recruiterid_name" name="name" placeholder="" class="form-control" value="{{ $recruiterInfo->name ?? ''}}" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required="" maxlength="100">

                      <span style="display:none; color: red;" class="val_name">Please enter name.</span>
                    </div>
                  </div>
                  <div class="col_grid6 ">
                    <div class="form-group">
                      <label>Designation</label>
                      <input type="text" id="designation" name="designation" placeholder="" class="form-control" value="{{ $recruiterInfo->designation ?? ''}}" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required="" maxlength="100">
                      <span style="display:none; color: red;" class="vardesignaion">Please enter designation.</span>
                    </div>
                  </div>
                  <div class="col_grid6 ">
                    <div class="form-group">
                      <label>Mobile Number</label>
                      <input type="text" name="phone" class="form-control" onkeyup="this.value=this.value.replace(/[^\d]/,'')" placeholder="Enter your mobile number" class="form-control" required maxlength="10" value="{{ $recruiterInfo->phone }}" readonly="" />

                      <span class="inputcheck"><img src="{{ asset('public/assets/images/verified.png')}}" alt="icon"></span>
                    </div>
                  </div>
                  <div class="col_grid6 ">
                    <div class="form-group">
                      <label>Official Email Address</label>
                      <input type="text" name="email" placeholder="" id='txtEmail' class="email form-control" value="{{ $recruiterInfo->email ?? ''}}" required="" maxlength="100" readonly="">
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
                  <textarea name="requirter_overview" id="requirter_overview" cols="30" rows="10" class="form-control" maxlength="500">{{ $recruiterInfo->requirter_overview }}</textarea>
                  <span style="display:none; color: red;" class="val_verview">Please enter overview.</span>
                </div>
              </div>
              <div class="col_grid12 ">
                <div class="form-group">
                  <label>Website</label>
                  <input type="text" name="website" id="website" placeholder="" class="form-control" value="{{ $recruiterInfo->website ?? ''}}" maxlength="100">
                  <span style="display:none; color: red;" class="val_website">Please enter website.</span>
                </div>
              </div>
              <div class="col_grid6 ">
                <div class="form-group">
                  <label>Industry</label>
                  <input type="text" name="industry" id="industry" placeholder="" class="form-control" value="{{ $recruiterInfo->industry ?? ''}}" maxlength="100">

                  <span style="display:none; color: red;" class="val_industry">Please enter industry.</span>
                </div>
              </div>
              <div class="col_grid6 ">
                <div class="form-group">
                  <label>Company size</label>
                  <input type="text" name="company_size" id="company_size" placeholder="" class="form-control" value="{{ $recruiterInfo->company_size ?? ''}}" maxlength="10">
                  <span style="display:none; color: red;" class="val_company_size">Please enter company size.</span>
                </div>
              </div>
              <div class="col_grid12 ">
                <div class="form-group">
                  <label>Organization name</label>
                  <input type="text" name="org_name" id="org_name" placeholder="" class="form-control" value="{{ $recruiterInfo->org_name ?? ''}}" maxlength="100">
                  <span style="display:none; color: red;" class="val_org_name">Please enter organization name.</span>
                </div>
              </div>
              <div class="col_grid12 ">
                <div class="form-group">
                  <label>Headquarters</label>
                  <input type="text" name="headquarters" id="headquarters" placeholder="" class="form-control" value="{{ $recruiterInfo->headquarters ?? ''}}" maxlength="100">
                  <span style="display:none; color: red;" class="val_headquarters">Please enter headquarters.</span>
                </div>
              </div>
              <div class="col_grid12 ">
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" name="address" id="address" placeholder="" class="form-control" value="{{ $recruiterInfo->address ?? ''}}" maxlength="200">
                  <span style="display:none; color: red;" class="val_address">Please enter address.</span>
                </div>
              </div>
              <div class="col_grid6 ">
                <div class="form-group">
                  <label>Type</label>
                  <input type="text" name="type" id="type" placeholder="" class="form-control" value="{{ $recruiterInfo->type ?? ''}}" maxlength="100">
                  <span style="display:none; color: red;" class="val_type">Please enter type.</span>
                </div>
              </div>
              <div class="col_grid6 ">
                <div class="form-group">
                  <label>Founded</label>
                  <input type="text" name="founded" id="founded" placeholder="" class="form-control" value="{{ $recruiterInfo->founded ?? ''}}" maxlength="100">
                  <span style="display:none; color: red;" class="val_founded">Please enter founded.</span>
                </div>
              </div>
              <div class="col_grid12 ">
                <div class="form-group">
                  <label>Specialties</label>
                  <textarea name="specialties" id="specialties" cols="30" rows="10" class="form-control" maxlength="500">{{ $recruiterInfo->specialties ?? '' }}</textarea>
                  <span style="display:none; color: red;" class="val_specialties">Please enter specialties.</span>
                </div>
              </div>
              <div class="confirmApply postjob_btn col_grid12 fw">
                <button type="submit" class="input-btn text-left" id="btnValidate2" data-modal="#createNewPostrecuriter">Edit About <i><img src="{{ asset('public/assets/images/edit_info.png')}}" alt="icon"></i></button>
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
                  <a href="javascript:void(0);" class="open-modal input-btn" data-modal="#createNewPostrecuriter">Create a New Post</a>
                </span>
              </h3>
            </div>

            @if(isset($posts))
            @foreach($posts as $postdata)
            <div class="content-group fw">
              <div class="text-cont fw">
                <div class="userCommnet_deta fw">
                  <span><img src="{{ URL::asset('/public/uploads/') }}/{{ $recruiterInfo->profile_image }}" alt="icon"></span>
                  <div class="userCommnet_Name">
                    <h4>
                      {{ $recruiterInfo->name ?? ''}}
                      <span>
                        {{ date('d M Y | H:i', strtotime($postdata->date_time)) }}
                      </span>
                      @if($users->id != $postdata->user_id)
                        @else
                        <span class="delete_postbtn">
                          <a href="{{ url('delete_student_post/'.$postdata->id) }}"><i>
                            <img src="{{ asset('public/assets/images/delete.png')}}" alt="delete-icon" /></i>
                            Delete Post
                          </a>
                        </span>
                        @endif
                    </h4>
                  </div>
                </div>
                <p class="site-pra">{{ $postdata->description ?? ''}}</p>
              </div>
              <div class="img-cont fw">
                <figure class="full-img">
                  <img src="{{ URL::asset('/public/uploads/') }}/{{ $postdata->post_image }}" alt="img1">
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
                <a href="{{ URL::to('/message')}}" target="_blank"><span><img src="{{ URL::asset('/public/assets/images/messageIcon.png') }}" alt="icon"></span> Message</a>
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

        <!-- Recruiter Listings section -->
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
                <span>You have listed ({{ count($listedjobs ?? '') }} jobs)</span>
                <span class="pull-right">
                  <a href="{{URL::to('web/post/jobs')}}" class="input-btn" data-modal="#">Post a New Job</a>
                </span>
              </h3>
            </div>
            <div class="fw profilePost_wapper listjob_wapper">
              @if(isset($listedjobs))
              @foreach($listedjobs as $value)
              @php
              $userdetail = DB::table('users')->where('id', $value->user_id)->first();
              $jobApplied = DB::table('job_applied')->where('job_id', $value->id)->count();
              @endphp
              <div class="jobsDetailBox fw">
                <div class="profile_sec fw">
                  <div class="compnayBoxImg">
                    <img src="{{ URL::asset('/public/assets/job_images/') }}/{{ $value->logo }}" alt="images" />
                  </div>
                  <div class="compnay">
                    <h5>{{ $value->location ?? ''}}</h5>
                    <a href="{{ URL::to('job-details',$value->id) }}" class="interested_link"> {{$jobApplied ?? ''}} Interested Candidates</a>
                  </div>
                </div>
                <div class="jobsDetailCont fw">
                  <h3>{{ $userdetail->org_name ?? ''}}</h3>
                  <p><a href="#" class="lightblue_text">{{ $value->job_title ?? ''}}</a></p>
                  <div class="innerrow">
                    <div class="col_grid9">
                      <ul>
                        <li>{{$value->job_description}}</li>
                        <!-- <li>Be part of a dynamic and supportive work environment</li> -->
                      </ul>
                    </div>
                    <div class="col_grid3">
                      <a href="{{ URL::to('job-profile',$value->id) }}" class="input-btn redBGmanage_btn ">View Job</a>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
              @endif

            </div>
          </div>
        </div>

        <!-- Recruiter Followers section -->
        <div class="profileTab_contBox" id="profileTab_link4">
          <div class="followers_sec fw">
            @if(isset($studentdata))
            @foreach($studentdata as $value)
            <div class="followers_shodeobox fw">
              <div class="innerrow">
                <div class="col_grid8 text-left">
                  <div class="img_box">
                    <img src="{{ URL::asset('/public/uploads/') }}/{{ $value->profile_image }}" alt="icon">
                  </div>
                  <span class="font24Text clrBlack">{{ $value->name ?? ''}}</span>
                </div>
                <div class="col_grid4 text-right">
                  <div class="commentsApply mrtop0 fw">
                    <div class="commantsChat">
                      <img src="{{ URL::asset('/public/assets/images/messageIcon.png') }}" alt="icon">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            @endif
          </div>
        </div>

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
                    <div class="commantsChat">
                      <img src="{{ URL::asset('/public/assets/images/messageIcon.png') }}" alt="icon">
                    </div>

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

  <div class='modal personal_DtlPop createNewPost_popup' id='createNewPostrecuriter'>
    <div class="close fw">
      <a class='btn close-modal' data-modal="#createNewPostrecuriter" href="#"><img src="{{ asset('public/assets/images/close.png')}}" alt="icon"></a>
    </div>
    <div class='content fw'>
      <h3 class="modal_heading">Create a New Post</h3>
      <div class="form_sec fw ">

        <form action="{{ URL::to('add-post')}}" method="POST" id="FormValidation" enctype="multipart/form-data">
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
                <textarea name="description" placeholder="What do you want to write here?" class="form-control" required=""></textarea>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function(e) {
      $('#btnValidate2').click(function() {
        var requirter_org_name = $('#specialties').val();
        if ($.trim(requirter_org_name).length == 0) {
          $('.val_specialties').show();
          setTimeout(function() {
            $('.val_specialties').hide();
          }, 3000);
          return false;
        } else {
          return true;
        }
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function(e) {
      $('#btnValidate2').click(function() {
        var requirter_org_name = $('#founded').val();
        if ($.trim(requirter_org_name).length == 0) {
          $('.val_founded').show();
          setTimeout(function() {
            $('.val_founded').hide();
          }, 3000);
          return false;
        } else {
          return true;
        }
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function(e) {
      $('#btnValidate2').click(function() {
        var requirter_org_name = $('#type').val();
        if ($.trim(requirter_org_name).length == 0) {
          $('.val_type').show();
          setTimeout(function() {
            $('.val_type').hide();
          }, 3000);
          return false;
        } else {
          return true;
        }
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function(e) {
      $('#btnValidate2').click(function() {
        var requirter_org_name = $('#address').val();
        if ($.trim(requirter_org_name).length == 0) {
          $('.val_address').show();
          setTimeout(function() {
            $('.val_address').hide();
          }, 3000);
          return false;
        } else {
          return true;
        }
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function(e) {
      $('#btnValidate2').click(function() {
        var requirter_org_name = $('#headquarters').val();
        if ($.trim(requirter_org_name).length == 0) {
          $('.val_headquarters').show();
          setTimeout(function() {
            $('.val_headquarters').hide();
          }, 3000);
          return false;
        } else {
          return true;
        }
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function(e) {
      $('#btnValidate2').click(function() {
        var requirter_org_name = $('#org_name').val();
        if ($.trim(requirter_org_name).length == 0) {
          $('.val_org_name').show();
          setTimeout(function() {
            $('.val_org_name').hide();
          }, 3000);
          return false;
        } else {
          return true;
        }
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function(e) {
      $('#btnValidate2').click(function() {
        var requirter_company_size = $('#company_size').val();
        if ($.trim(requirter_company_size).length == 0) {
          $('.val_company_size').show();
          setTimeout(function() {
            $('.val_company_size').hide();
          }, 3000);
          return false;
        } else {
          return true;
        }
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function(e) {
      $('#btnValidate2').click(function() {
        var requirter_industry = $('#industry').val();
        if ($.trim(requirter_industry).length == 0) {
          $('.val_industry').show();
          setTimeout(function() {
            $('.val_industry').hide();
          }, 3000);
          return false;
        } else {
          return true;
        }
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function(e) {
      $('#btnValidate2').click(function() {
        var requirter_overview = $('#requirter_overview').val();
        if ($.trim(requirter_overview).length == 0) {
          $('.val_verview').show();
          setTimeout(function() {
            $('.val_verview').hide();
          }, 3000);
          return false;
        } else {
          return true;
        }
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function(e) {
      $('#btnValidate2').click(function() {
        var requirter_website = $('#website').val();
        if ($.trim(requirter_website).length == 0) {
          $('.val_website').show();
          setTimeout(function() {
            $('.val_website').hide();
          }, 3000);
          return false;
        } else {
          return true;
        }
      });
    });
  </script>

  <!-- User pofile validation -->

  <script type="text/javascript">
    $(document).ready(function(e) {
      $('#btnValidate').click(function() {
        var val_recruiter_name = $('#recruiterid_name').val();
        if ($.trim(val_recruiter_name).length == 0) {
          $('.val_name').show();
          setTimeout(function() {
            $('.val_name').hide();
          }, 3000);
          return false;
        } else {
          return true;
        }
      });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function(e) {
      $('#btnValidate').click(function() {
        var var_desination = $('#designation').val();
        if ($.trim(var_desination).length == 0) {
          $('.vardesignaion').show();
          setTimeout(function() {
            $('.vardesignaion').hide();
          }, 3000);
          return false;
        } else {
          return true;
        }
      });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function(e) {
      $('#btnValidate').click(function() {
        var sEmail = $('#txtEmail').val();
        if ($.trim(sEmail).length == 0) {
          $('.emailvalidation1').show();
          setTimeout(function() {
            $('.emailvalidation1').hide();
          }, 3000);
          return false;
        }
        if (validateEmail(sEmail)) {} else {
          $('.emailvalidation').show();
          setTimeout(function() {
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
      } else {
        return false;
      }
    }
  </script>

  <!-- User pofile validation End-->
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
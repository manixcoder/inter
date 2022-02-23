<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf_token" content="{{csrf_token()}}">
  <title>Internify - Home</title>
  <!-- Fontawesome 4 Cdn from BootstrapCDN -->
  <link rel="icon" type="image/png" href="{{ URL::asset('/public/uploads/favicon.png') }}" />
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="{{ asset('public/assets/web_assets/css/style.css')}}" rel="stylesheet">
  <link href="{{ asset('public/assets/web_assets/fonts/fonts.css')}}" rel="stylesheet">
</head>

<body class="lightwht_bg">
  <header class="header_sec flow2_header fw">
    <div class="lgcontainer">
      @include('fruntend.common_pages.web_header')
      <?php
      if (!empty($user_id)) {
        $userid = $user_id;
      } else {
        $userid = Auth::user()->id;
      }
      $userRole = Session::get('userRole');
      $count = 30;
      $loginby = DB::table('users')->where('id', $userid)->first();
      $education = DB::table('education')->where('user_id', $userid)->first();
      $certificate = DB::table('certificates')->where('user_id', $userid)->first();
      $myfavorite = DB::table('my_favorite_industries')->where('user_id', $userid)->first();
      $businesses = DB::table('business_functions')->where('user_id', $userid)->first();
      $hobbies = DB::table('hobbies_and_interests')->where('user_id', $userid)->first();
      $accomplishments = DB::table('accomplishments')->where('user_id', $userid)->first();
      $OrgData = DB::table('users')->where('id', $userid)->first();
      if ($loginby->address != '') {
        $count = $count + 10;
      }
      if ($loginby->about != '') {
        $count = $count + 5;
      }
      if ($education) {
        $count = $count + 20;
      }
      if ($certificate) {
        $count = $count + 15;
      }
      if ($myfavorite) {
        $count = $count + 5;
      }
      if ($businesses) {
        $count = $count + 10;
      }
      if ($hobbies) {
        $count = $count + 10;
      }
      if ($accomplishments) {
        $count = $count + 5;
      }

      ?>

    </div>
  </header>
  <div class="body_wht-inners ">
    <div class="profile_public fw">
      <div class="lgcontainer">
        <div class="innerrow">
          <div class="col_grid9">
            <div class="profile_publicimg">
              <i class="camara-sdudentcamara"><img src="{{ asset('public/assets/images/camera-icon.png')}}" alt="icon" /></i>
              @if($OrgData->users_role =='2')
              <img id="stu_id" src="{{ asset('public/uploads/')}}/{{$OrgData->profile_image}}" alt="img" />
              @else
              <img src="{{ asset('public/assets/images/userimg-icon.png')}}" alt="img" />
              @endif
              @if($userRole !='3')
              <div class="form-group fileupload">
                <input type="file" name="student_image" id="studentImage" class="fileupload-btn">
              </div>
              @endif
              <form method="post" action="{{url('remove-profile-image')}}" class="remoovicon">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <button type="submit">&#215;</button>
              </form>
            </div>
            <div class="profile_publicDetail">
              <h4 class="clrwht font36text  semiboldfont_fmly">
                {{$OrgData->name}}
              </h4>
              <h4 class="clrwht font36text  semiboldfont_fmly">
                <a href="mailto:<?php echo $OrgData->email ?>">
                  {{$OrgData->email}}
                </a>
              </h4>
              <h4 class="clrwht font36text  semiboldfont_fmly">
                {{$OrgData->phone}}
              </h4>
              <div class="progressbar_sec whtprogressBar fw">
                <div class="progressbar_cont fw">
                  <span style="width: <?php echo $count; ?>%;"></span>
                </div>
                <?php echo $count; ?>% profile completed
              </div>
            </div>
          </div>
          <div class="col_grid3">


          </div>
        </div>
      </div>
    </div>
    <div class="tabCompnay_profile profileDetail_tab text-center fw">
      <div class="lgcontainer">
        <ul class=" profileDetail_ul" id="profileTab_link">
          @if($userid != Auth::user()->id)
          @else
          <li>
            <a href="{{url('student-profile-basic-info')}}" class="active">My Details</a>
          </li>
          <!-- <li>
            <a href="{{url('student-posts')}}">My Posts</a>
          </li> -->
          <li>
            <a href="{{url('student-applications')}}">My Applications</a>
          </li>
          @endif
        </ul>
      </div>
      <div class="profileTab_contBox fw" id="profileTab_Details1">
        <div class="fw personal_Details">
          <div class="lgcontainer">
            <div class="innerrow">
              <div class="col_grid12 text-left">
                <h3 class="font36text  bukhariSrptfont_fmly clrred">Personal Details <a style="display:none" href="javascript:void(0);" class="open-modal" data-modal="#personal_DtlPop_edit"><span class="pull-right font20Text"><i><img src="{{ asset('public/assets/images/edit.png')}}" alt="img" /></i></span></a></h3>
                <div class="innerrow">
                  <form class="form_sec fw col_grid12" action="{{ url('update_student_personal_details') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="innerrow">
                      <div class="col_grid12 ">
                        <div class="form-group">
                          <label>Name</label>
                          <input type="text" name="name" value="{{$OrgData->name}}" class="form-control" maxlength="100" size="100" required @if($userid !=Auth::user()->id) disabled @endif>
                        </div>
                      </div>
                      <div class="col_grid6">
                        <div class="form-group">
                          <label>Email Address</label>
                          <input type="email" name="email" value="{{$OrgData->email}}" class="form-control" maxlength="30" @if($userid !=Auth::user()->id) disabled @endif size="100" required>
                          @error('email')
                          <small class="form-control-feedback">{{ $errors->first('email') }}</small>
                          @enderror
                          <span class="inputcheck"><img src="{{ asset('public/assets/images/verified.png')}}" alt="icon"></span>
                        </div>
                      </div>
                      <div class="col_grid6">
                        <div class="form-group">
                          <label>Mobile Number</label>
                          <input type="text" name="phone" value="{{$OrgData->phone}}" class="form-control" maxlength="10" @if($userid !=Auth::user()->id) disabled @endif minlength="10" size="10" required>
                          @error('phone')
                          <small class="form-control-feedback">{{ $errors->first('phone') }}</small>
                          @enderror
                        </div>
                      </div>
                      <div class="col_grid6">
                        <div class="form-group">
                          <label>Date of Birth</label>
                          <input type="date" name="dob" value="{{$OrgData->dob}}" class="form-control" @if($userid !=Auth::user()->id) disabled @endif required>
                        </div>
                      </div>
                      <div class="col_grid6 unlock_sec">
                        <div class="form-group">
                          <label>Gender</label>
                          <select name="gender" class="form-control" @if($userid !=Auth::user()->id) disabled @endif>
                            <option value="0" {{ $OrgData->gender == '0' ? 'selected' : '' }}>Male</option>
                            <option value="1" {{ $OrgData->gender == '1' ? 'selected' : '' }}>Female</option>
                            <option value="2" {{ $OrgData->gender == '2' ? 'selected' : '' }}>Non-Binary</option>
                          </select>
                        </div>
                      </div>
                      @if($userid != Auth::user()->id)
                      @else
                      <div class="col_grid12 profile_update_btn text-center">
                        <div class="form-group">
                          <input type="submit" value="Update" class="input-btn">
                        </div>
                      </div>
                      @endif
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="fw aboutusBg smaeHeading">
          <div class="fw aboutusBg_sec">

            <form class="form_sec fw col_grid12" action="{{ url('update_student_about') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="lgcontainer">
                <h3 class="font36text  bukhariSrptfont_fmly clrred">About</h3>
                <div class="boxShodewBg fw">
                  <div class="form-group">
                    <textarea name="about" class="grytextPra" @if($userid !=Auth::user()->id) disabled @endif>{!! $OrgData->about !!}</textarea>
                  </div>
                </div>
                <div class="col_grid3 profile_update_btn text-center">
                  @if($userid != Auth::user()->id)
                  @else
                  <div class="form-group">
                    <input type="submit" value="Update" class="input-btn">
                  </div>
                  @endif
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="fw educationSec aboutusBg smaeHeading">
          <div class="fw aboutusBg_sec">
            <div class="lgcontainer">

              <h3 href="javascript:void(0);" data-modal="#education_add_detail" class="font36text  bukhariSrptfont_fmly clrred @if($userid != Auth::user()->id)
                @else open-modal @endif">
                Education
                @if($userid != Auth::user()->id)
                @else
                <span class="pull-right font20Text">
                  <i>
                    <img src="{{ asset('public/assets/images/add.png')}}" alt="img" />
                  </i>
                  Add
                </span>
              </h3>
              @endif
              <form class="form_sec fw">
                <div class="innerrow">
                  @foreach($edData as $ed)
                  <div class="col_grid12 ">
                    <div class="form-group">
                      <label>School Name</label>
                      <input type="text" value="{{$ed->school_name}}" maxlength="200" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="col_grid12">
                    <div class="form_btm_sec education-view-sec ">
                      <div class="innerrow">
                        <div class="col_grid4">
                          <div class="form-group">
                            <label>Course</label>
                            <input type="text" value="{{$ed->name_of_technology}}" placeholder="Name of Technology" maxlength="200" class="form-control" readonly>
                          </div>
                        </div>
                        <div class="col_grid4">
                          <div class="form-group">
                            <label>Percentage</label>
                            <input type="text" value="{{$ed->percentage}}" placeholder="65%" maxlength="200" class="form-control" readonly>
                          </div>
                        </div>
                        <div class="col_grid4">
                          <div class="form-group">
                            <label>Year</label>
                            <input type="text" onblur="yearValidation(this.value,event)" id="year" value="{{$ed->year}}" placeholder="Year" class="form-control" readonly>
                          </div>
                        </div>
                        @if($userid != Auth::user()->id)
                        @else
                        <div class="smaeHeading rightedit_sec ">
                          <div class="certificatesSec-edit">
                            <a class="pull-right font20Text open-modal" href="javascript:void(0);" data-modal="#education_update_detail_{{$ed->id}}">
                              <i>
                                <img src="{{ asset('public/assets/images/edit.png')}}" alt="img" />
                              </i>
                            </a>
                            <a class="pull-right font20Text" href="{{ url('delete-course') }}/{{$ed->id}}">
                              <i>
                                <img src="{{ asset('public/assets/images/delete.png')}}" alt="img" class="delete-icon" />
                              </i>
                            </a>
                          </div>
                        </div>
                        @endif
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>

              </form>
            </div>
          </div>
        </div>
        @foreach($edData as $ed)
        <div class='modal personal_DtlPop' id='education_update_detail_{{$ed->id}}'>
          <div class="close fw">
            <a class='btn close-modal' data-modal="#education_update_detail_{{$ed->id}}" href="#"><img src="{{ asset('public/assets/images/close.png')}}" alt="icon"></a>
          </div>
          <form class="form_sec fw col_grid12" action="{{ url('update_student_education') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class='content fw'>
              <h3 class="modal_heading">Update Course/Degree</h3>
              <div class="form_sec fw ">
                <div class="innerrow">
                  <div class="col_grid6">
                    <div class="form-group">
                      <label>School Name</label>
                      <input type="text" name="school_name" value="{{$ed->school_name}}" class="form-control" required />
                      <input type="hidden" name="id" value="{{$ed->id}}" />
                    </div>
                  </div>
                  <div class="col_grid6 ">
                    <div class="form-group">
                      <label>Course/Degree</label>
                      <input type="text" name="technology" value="{{$ed->name_of_technology}}" maxlength="200" class="form-control" required />
                    </div>
                  </div>
                  <div class="col_grid6 ">
                    <div class="form-group">
                      <label>Percentage</label>
                      <input type="text" name="percentage" value="{{$ed->percentage}}" maxlength="200" placeholder="percentage" class="form-control" required />
                    </div>
                  </div>
                  <div class="col_grid6 ">
                    <div class="form-group">
                      <label>Year</label>
                      <input type="text" onblur="yearValidation(this.value,event)" id="year" name="year" value="{{$ed->year}}" placeholder="Ex. 1990" class="form-control" required />
                    </div>
                  </div>
                </div>
                <div class="confirmApply fw">
                  <button type="submit" class="input-btn">Save</button>
                </div>
              </div>
            </div>
          </form>
        </div>
        @endforeach
        <div class="fw educationSec aboutusBg smaeHeading paddTop0">
          <div class="fw aboutusBg_sec">

            <div class="lgcontainer">

              <h3 href="javascript:void(0);" data-modal="#experience_add_detail" class="font36text  bukhariSrptfont_fmly clrred @if($userid != Auth::user()->id)
                @else open-modal @endif">
                Experience
                @if($userid != Auth::user()->id)
                @else
                <span class="pull-right font20Text">
                  <i>
                    <img src="{{ asset('public/assets/images/add.png')}}" alt="img" /></i>
                  Add
                </span>
              </h3>
              @endif
              <div class="boxShodewBg fw mrtop0 experienceBox">
                @foreach($exData as $exp)

                <div class="innerrow">
                  <div class="col_grid9">
                    <div class="userBox">
                      @if($exp->company_image !='')
                      <img src="{{ asset('public/uploads/'.$exp->company_image)}}" alt="icon" />

                      @else
                      <img src="{{ asset('public/uploads/blank-profile-picture.png')}}" alt="icon" />
                      @endif
                    </div>

                    <div class="experienceBox_cont">
                      <h4 class="font24Text clrBlack">
                        {{$exp->company_name}} <br /> {{$exp->profile}}
                      </h4>
                      <p class="font24Text clrGray">{{$exp->location}} <br /> {{$exp->duration_from}} - {{$exp->duration_to}}</p>
                    </div>
                  </div>
                  @if($userid != Auth::user()->id)
                  @else
                  <div class="col_grid3 experience-edit">
                    <span class=" font20Text open-modal" href="javascript:void(0);" data-modal="#experience_update_detail_{{$exp->id}}">
                      <i>
                        <img src="{{ asset('public/assets/images/edit.png')}}" alt="img">
                      </i>
                    </span>
                    <a class="font20Text" href="{{ url('delete-experience') }}/{{$exp->id}}">
                      <i>
                        <img src="{{ asset('public/assets/images/delete.png')}}" alt="img" class="delete-icon" />
                      </i>
                    </a>
                  </div>
                  @endif
                </div>
                <div class='modal personal_DtlPop' id='experience_update_detail_{{$exp->id}}'>
                  <div class="close fw">
                    <a class='btn close-modal' data-modal="#experience_update_detail_{{$exp->id}}" href="#"><img src="{{ asset('public/assets/images/close.png')}}" alt="icon"></a>
                  </div>
                  <form class="form_sec fw col_grid12" action="{{ url('update_student_experience') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class='content fw'>
                      <h3 class="modal_heading">Update Experience</h3>
                      <div class="form_sec fw ">
                        <div class="innerrow">
                          <div class="col_grid6">
                            <div class="form-group">
                              <label>Company Name</label>
                              <input type="text" name="company_name" value="{{$exp->company_name}}" maxlength="200" class="form-control" required />
                              <input type="hidden" name="id" value="{{$exp->id}}" />
                            </div>
                          </div>
                          <div class="col_grid6 ">
                            <div class="form-group">
                              <label>Job Type</label>
                              <input type="text" name="profile_type" value="{{$exp->profile}}" maxlength="200" class="form-control" required />
                            </div>
                          </div>
                          <div class="col_grid6 ">
                            <div class="form-group">
                              <label>From</label>
                              <input type="date" name="duration_from" value="{{ $exp->duration_from }}" class="form-control" required />
                            </div>
                          </div>
                          <div class="col_grid6 ">
                            <div class="form-group">
                              <label>To</label>
                              <input type="date" name="duration_to" value="{{ $exp->duration_to }}" maxlength="200" class="form-control" required />
                            </div>
                          </div>
                          <div class="col_grid6 ">
                            <div class="form-group">
                              <label>Location</label>
                              <input type="text" name="location" value="{{$exp->location}}" maxlength="200" class="form-control" required />
                            </div>
                          </div>
                          <div class="col_grid6 file-popupinput">
                            <div class="form-group fileupload-group">
                              <label>Company logo</label>
                              <input type="file" name="company_image" class="form-control" />
                              <span class="fileupload-popup"></span>
                            </div>
                          </div>
                          <div class="col_grid6 file-popupinput ">
                            <div class="form-group">

                              @if(!empty($exp->company_image))
                              <img style="width:100px" src="{{ asset('public/uploads/'.$exp->company_image)}}" alt="icon" />
                              @else
                              <img style="width:100px" src="{{ asset('public/assets/images/userimg-icon.png')}}" alt="icon" />
                              @endif
                            </div>
                          </div>
                        </div>
                        <div class="confirmApply fw">
                          <button type="submit" class="input-btn">Save</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        <div class="fw educationSec aboutusBg smaeHeading paddTop0">
          <div class="fw aboutusBg_sec form_sec">
            <div class="lgcontainer">

              <h3 data-modal="#certificate_add_detail" class="font36text  bukhariSrptfont_fmly clrred @if($userid != Auth::user()->id)
                @else open-modal @endif">
                Certificates
                @if($userid != Auth::user()->id)
                @else
                <span class="pull-right font20Text">
                  <i>
                    <img src="{{ asset('public/assets/images/add.png')}}" alt="img" />
                  </i>
                  Add
                </span>
              </h3>
              @endif
              <div class="innerrow certificatesSec">

                @foreach($certData as $cert)
                <div class="col_grid12">
                  <div class="form_btm_sec">
                    <div class="innerrow">
                      <div class="col_grid4">
                        <div class="form-group">
                          <label>Certificate Name</label>
                          <input type="text" name="Name" value="{{$cert->certificate_name}}" maxlength="200" class="form-control" readonly>
                        </div>
                      </div>
                      <div class="col_grid4">
                        <div class="form-group">
                          <label>Certified By</label>
                          <input type="text" name="Name" value="{{$cert->certificate_by}}" maxlength="200" class="form-control" readonly>
                        </div>
                      </div>
                      <div class="col_grid4">
                        <div class="form-group">
                          <label>Year of Completion</label>
                          <input type="text" onblur="yearValidation(this.value,event)" id="year" name="Name" value="{{$cert->year_of_completion}}" maxlength="200" class="form-control" readonly>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="smaeHeading rightedit_sec">
                    @if($userid != Auth::user()->id)
                    @else
                    <h3 class="certificatesSec-edit">
                      <span class=" font20Text open-modal" href="javascript:void(0);" data-modal="#certificate_update_detail_{{$cert->id}}">
                        <i>
                          <img src="{{ asset('public/assets/images/edit.png')}}" alt="img" />
                        </i>
                      </span>
                      <span class=" font20Text">
                        <a class=" font20Text" href="{{ url('delete-certificate') }}/{{$cert->id}}">
                          <i>
                            <img src="{{ asset('public/assets/images/delete.png')}}" alt="img" class="delete-icon" />
                          </i>
                        </a>
                      </span>
                    </h3>
                    @endif
                  </div>
                </div>
                <div class='modal personal_DtlPop' id='certificate_update_detail_{{$cert->id}}'>
                  <div class="close fw">
                    <a class='btn close-modal' data-modal="#certificate_update_detail_{{$cert->id}}" href="#"><img src="{{ asset('public/assets/images/close.png')}}" alt="icon"></a>
                  </div>
                  <form class="form_sec fw col_grid12" action="{{ url('update_student_certificate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class='content fw'>
                      <h3 class="modal_heading">Update Certificate</h3>
                      <div class="form_sec fw ">
                        <div class="innerrow">
                          <div class="col_grid6">
                            <div class="form-group">
                              <label>Certificate Name</label>
                              <input type="text" name="certificate_name" value="{{$cert->certificate_name}}" maxlength="200" class="form-control" required />
                              <input type="hidden" name="id" value="{{$cert->id}}" />
                            </div>
                          </div>
                          <div class="col_grid6 ">
                            <div class="form-group">
                              <label>Certificate By</label>
                              <input type="text" name="certificate_by" value="{{$cert->certificate_by}}" maxlength="200" class="form-control" required />
                            </div>
                          </div>
                          <div class="col_grid6 ">
                            <div class="form-group">
                              <label>Year of Completetion</label>
                              <input type="text" onblur="yearValidation(this.value,event)" id="year" name="year_of_completion" value="{{$cert->year_of_completion}}" class="form-control" required />
                            </div>
                          </div>

                        </div>
                        <div class="confirmApply fw">
                          <button type="submit" class="input-btn">Save</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        <div class="fw educationSec aboutusBg smaeHeading paddTop0">
          <div class="fw aboutusBg_sec form_sec">
            <div class="lgcontainer">

              <h3 data-modal="#industry_add_detail" class="font36text  bukhariSrptfont_fmly clrred @if($userid != Auth::user()->id)
                @else open-modal @endif">
                My Favourite Industries (e.g. Healthcare, Entertainment, Consulting)
                @if($userid != Auth::user()->id)
                @else
                <span class="pull-right font20Text">
                  <i>
                    <img src="{{ asset('public/assets/images/add.png')}}" alt="img" />
                  </i>
                  Add
                </span>
              </h3>
              @endif
              <ul class="favouriteIndus_sec fw">
                @foreach($indusData as $indus)
                <li>
                  <a href="#" class="input-btn">
                    {{$indus->industries_name}}
                  </a>
                  @if($userid != Auth::user()->id)
                  @else
                  <a href="{{ url('delete_student_industry/'.$indus->id) }}" class="cross-iconpopup">
                    <i class="fa fa-times" aria-hidden="true"></i>
                  </a>
                  @endif
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        <div class="fw educationSec aboutusBg smaeHeading paddTop0">
          <div class="fw aboutusBg_sec form_sec">
            <div class="lgcontainer">

              <h3 data-modal="#business_add_detail" class="font36text  bukhariSrptfont_fmly clrred @if($userid != Auth::user()->id)
                @else open-modal @endif">
                Business Functions I Want to Work in (e.g. Sales, HR, R&D)
                @if($userid != Auth::user()->id)
                @else
                <span class="pull-right font20Text">
                  <i>
                    <img src="{{ asset('public/assets/images/add.png')}}" alt="img" />
                  </i>
                  Add
                </span>
              </h3>
              @endif
              <ul class="favouriteIndus_sec fw">
                @foreach($busiData as $business)
                <li>
                  <a href="#" class="input-btn">
                    {{$business->business_functions_name}}
                  </a>
                  @if($userid != Auth::user()->id)
                  @else
                  <a href="{{ url('delete_student_business/'.$business->id) }}" class="cross-iconpopup">
                    <i class="fa fa-times" aria-hidden="true"></i>
                  </a>
                  @endif
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        <div class="fw educationSec aboutusBg smaeHeading paddTop0">
          <div class="fw aboutusBg_sec form_sec">
            <div class="lgcontainer">

              <h3 data-modal="#hobbies_add_detail" class="font36text  bukhariSrptfont_fmly clrred @if($userid != Auth::user()->id)
                @else open-modal @endif">
                Hobbies & Interests
                @if($userid != Auth::user()->id)
                @else
                <span class="pull-right font20Text">
                  <i>
                    <img src="{{ asset('public/assets/images/add.png')}}" alt="img" />
                  </i>
                  Add
                </span>
              </h3>
              @endif
              <ul class="favouriteIndus_sec fw">
                @foreach($hobbyData as $hobby)
                <li>
                  <a href="#" class="input-btn">
                    {{$hobby->hobbies_name}}
                  </a>
                  @if($userid != Auth::user()->id)
                  @else
                  <a href="{{ url('delete_student_hobby/'.$hobby->id) }}" class="cross-iconpopup">
                    <i class="fa fa-times" aria-hidden="true"></i>
                  </a>
                  @endif
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        <div class="fw educationSec aboutusBg smaeHeading paddTop0 lastdiv">
          <div class="fw aboutusBg_sec form_sec">
            <div class="lgcontainer">
              <h3 class="font36text  bukhariSrptfont_fmly clrred @if($userid != Auth::user()->id)
                @else open-modal @endif">
                <!-- <h3 data-modal="#accomplishment_add_detail" class="font36text  bukhariSrptfont_fmly clrred "> -->
                Accomplishments
                @if($userid != Auth::user()->id)
                @else
                <span class="pull-right font20Text toggle-Acmntsbtn">
                  <i><img src="{{ asset('public/assets/images/add.png')}}" alt="img" /></i>
                  Add
                  <!-- <select name="" id="" class="font36text  bukhariSrptfont_fmly clrred open-modal">
                      <option value=""> Add</option>
                      <option value="Course" data-modal="#accomplishment_add_detai4" >Course</option>
                      <option value="Awards" data-modal="#accomplishment_add_detail3">Awards</option>
                      <option value="Test Scores" data-modal="#accomplishment_add_detail2">Test Scores</option>
                      <option value="Publications" data-modal="#accomplishment_add_detail1">Publications</option>
                    </select> -->
                </span>
                <ul class="toggle-Acmnts" style="display:none;">
                  <li><a href="#" data-modal="#accomplishment_add_detail" class="open-modal">Course</a></li>
                  <li><a href="#" data-modal="#accomplishment_add_detail1" class="open-modal">Awards</a></li>
                  <li><a href="#" data-modal="#accomplishment_add_detail2" class="open-modal">Test Scores</a></li>
                  <li><a href="#" data-modal="#accomplishment_add_detail3" class="open-modal">Publications</a></li>
                </ul>
              </h3>
              @endif
              <div class="boxShodewBg fw">



                <?php $i = 1; ?>
                @foreach($accomData as $key=> $accom)
                <div class="coursesBox fw">
                  <div class="innerrow">
                    <div class="col_grid9 text-left">
                      <h3>{{ $key+1 }}. {{$accom->accomplishment_type}}</h3>
                      <h3>{{$accom->course_name}}</h3>
                      <p>{{$accom->awards}}</p>
                      <p>{{$accom->test_scores}}</p>
                      <p>{{$accom->publications}}</p>
                    </div>
                    @if($userid != Auth::user()->id)
                    @else
                    <div class="col_grid3 text-right">
                      <span class="pull-right font20Text open-modal" href="javascript:void(0);" data-modal="#accomplishment_update_detail_{{$accom->id}}">
                        <i>
                          <img src="{{ asset('public/assets/images/edit.png')}}" alt="img"></i>
                      </span>
                    </div>
                    @endif
                  </div>
                </div>
                <div class='modal personal_DtlPop' id='accomplishment_update_detail_{{$accom->id}}'>
                  <?php  // dd($accom);
                  ?>
                  <div class="close fw">
                    <a class='btn close-modal' data-modal="#accomplishment_update_detail_{{$accom->id}}" href="#">
                      <img src="{{ asset('public/assets/images/close.png')}}" alt="icon">
                    </a>
                  </div>
                  <form class="form_sec fw col_grid12" action="{{ url('update_student_accomplishment') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class='content fw'>
                      <h3 class="modal_heading">Add Accomplishment</h3>
                      <div class="form_sec fw ">
                        <div class="innerrow">
                          <div class="col_grid6">
                            <div class="form-group">
                              <label>Accomplishment Type</label>
                              <input type="text" value="{{$accom->accomplishment_type}}" name="accomplishment_type"  maxlength="200" class="form-control disable" />
                              <!--select name="accomplishment_type" id="accomplishment_type" class="form-control" required>
                                <option value="Course" {{ ( $accom->accomplishment_type == 'Course') ? 'selected' : '' }}>Course</option>
                                <option value="Awards" {{ ( $accom->accomplishment_type == 'Awards') ? 'selected' : '' }}>Awards</option>
                                <option value="Test Scores" {{ ( $accom->accomplishment_type == 'Test Scores') ? 'selected' : '' }}>Test Scores</option>
                                <option value="Publications" {{ ( $accom->accomplishment_type == 'Publications') ? 'selected' : '' }}>Publications</option>
                              </select -->
                            </div>
                          </div>
                          <div class="col_grid6">
                            <div class="form-group">
                              <label>Course Name</label>
                              <input type="text" value="{{$accom->course_name}}" name="course_name" maxlength="200" class="form-control" />
                              <input type="hidden" value="{{$accom->id}}" name="id" />
                            </div>
                          </div>
                          <div class="col_grid6 ">
                            <div class="form-group">
                              <label>Award</label>
                              <input type="text" value="{{$accom->awards}}" name="award" maxlength="200" class="form-control" />
                            </div>
                          </div>
                          <div class="col_grid6 ">
                            <div class="form-group">
                              <label>Test Scores</label>
                              <input type="text" value="{{$accom->test_scores}}" name="test_scores" maxlength="200" class="form-control" />
                            </div>
                          </div>
                          <div class="col_grid6 ">
                            <div class="form-group">
                              <label>Publications</label>
                              <input type="text" value="{{$accom->publications}}" name="publications" maxlength="200" class="form-control" />
                            </div>
                          </div>
                        </div>
                        <div class="confirmApply fw">
                          <button type="submit" class="input-btn">Save</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <?php $i++ ?>
                @endforeach
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
  </div>
  </div>
  </div>
  <footer class="fw">
    @include('fruntend.student.inc.footer')
  </footer>
  <!-- <div class="se-pre-con"></div> -->
  <div class='modal personal_DtlPop createNewPost_popup' id='createHomePostrecuriter'>
    <div class="close fw">
      <a class='btn close-modal' data-modal="#createHomePostrecuriter" href="#"><img src="{{ asset('public/assets/images/close.png')}}')}}" alt="icon"></a>
    </div>
    <div class='content fw'>
      <h3 class="modal_heading">Create a New Post</h3>
      <div class="form_sec fw ">
        <div class="innerrow">
          <div class="col_grid12 upload_box_sec">
            <div class="uploadBox">
              <input type="file" name="acttachPhoto" />
              <div class="file_cont">
                <img src="{{ asset('public/assets/images/attach_img.png')}}')}}" alt="icon" />
                <h4 class="font24Text clrBlack">Attach Photo</h4>
              </div>
            </div>
            <div class="uplaodCheckBtn">
              <a href="#" class="input-btn">Post <span><img src="{{ asset('public/assets/images/loginCheck_icon.png')}}')}}" alt="icon" /></span></a>
            </div>
          </div>
          <div class="col_grid12 ">
            <div class="form-group">
              <input type="text" name="Name" placeholder="Enter URL" class="form-control">
            </div>
          </div>
          <div class="col_grid12 ">
            <div class="form-group">
              <textarea name="text" placeholder="What do you want to write here?" class="form-control"></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!----------------Popup Start----------------------->

  <div class='modal personal_DtlPop' id='education_add_detail'>
    <div class="close fw">
      <a class='btn close-modal' data-modal="#education_add_detail" href="#">
        <img src="{{ asset('public/assets/images/close.png')}}" alt="icon">
      </a>
    </div>
    <form class="form_sec fw col_grid12" action="{{ url('add_student_education') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class='content fw'>
        <h3 class="modal_heading">Add Course/Degree</h3>
        <div class="form_sec fw ">
          <div class="innerrow">
            <div class="col_grid6">
              <div class="form-group">
                <label>School Name</label>
                <input type="text" name="school_name" maxlength="200" class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Course/Degree</label>
                <input type="text" name="technology" class="form-control" maxlength="200" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Percentage</label>
                <input type="text" name="percentage" class="form-control" maxlength="200" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Year</label>
                <input type="text" onblur="yearValidation(this.value,event)" id="year" name="year" placeholder="Ex. 1990" class="form-control" required />
              </div>
            </div>
          </div>
          <div class="confirmApply fw">
            <button type="submit" class="input-btn">Save</button>
          </div>
        </div>
      </div>
    </form>
  </div>





  <div class='modal personal_DtlPop' id='experience_add_detail'>
    <div class="close fw">
      <a class='btn close-modal' data-modal="#experience_add_detail" href="#"><img src="{{ asset('public/assets/images/close.png')}}" alt="icon"></a>
    </div>
    <form class="form_sec fw col_grid12" action="{{ url('add_student_experience') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class='content fw'>
        <h3 class="modal_heading">Add Experience</h3>
        <div class="form_sec fw ">
          <div class="innerrow">
            <div class="col_grid6">
              <div class="form-group">
                <label>Company Name</label>
                <input type="text" name="company_name" maxlength="200" class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Job Type</label>
                <input type="text" name="profile_type" maxlength="200" class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>From</label>
                <input type="date" name="duration_from" placeholder="Ex. 2021-08-02" class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>To</label>
                <input type="date" name="duration_to" placeholder="Ex. 2023-08-02" class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>To</label>
                <input type="date" name="duration_to" placeholder="Ex. 2023-08-02" class="form-control" required />
                </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Location</label>
                <input type="text" name="location" class="form-control" maxlength="500" required />
              </div>
            </div>
            <div class="col_grid6 file-popupinput">
              <div class="form-group fileupload-group">
                <label>Company Logo</label>
                <input type="file" name="company_image" class="form-control" />
                <span class="fileupload-popup"></span>
              </div>
            </div>
          </div>
          <div class="confirmApply fw">
            <button type="submit" class="input-btn">Save</button>
          </div>
        </div>
      </div>
    </form>
  </div>



  <div class='modal personal_DtlPop' id='certificate_add_detail'>
    <div class="close fw">
      <a class='btn close-modal' data-modal="#certificate_add_detail" href="#"><img src="{{ asset('public/assets/images/close.png')}}" alt="icon"></a>
    </div>
    <form class="form_sec fw col_grid12" action="{{ url('add_student_certificate') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class='content fw'>
        <h3 class="modal_heading">Add Certificate</h3>
        <div class="form_sec fw ">
          <div class="innerrow">
            <div class="col_grid6">
              <div class="form-group">
                <label>Certificate Name</label>
                <input type="text" name="certificate_name" maxlength="200" class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Certified by</label>
                <input type="text" name="certificate_by" maxlength="200" class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Year of Completetion</label>
                <input type="text" name="year_of_completion" onblur="yearValidation(this.value,event)" id="year2" placeholder="Year EX 1990" maxlength="200" class="form-control" required />
              </div>
            </div>

          </div>
          <div class="confirmApply fw">
            <button type="submit" class="input-btn">Save</button>
          </div>
        </div>
      </div>
    </form>
  </div>



  <div class='modal personal_DtlPop' id='industry_add_detail'>
    <div class="close fw">
      <a class='btn close-modal' data-modal="#industry_add_detail" href="#"><img src="{{ asset('public/assets/images/close.png')}}" alt="icon"></a>
    </div>
    <form class="form_sec fw col_grid12" action="{{ url('add_student_industry') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class='content fw'>
        <h3 class="modal_heading">Add Industry</h3>
        <div class="form_sec fw ">
          <div class="innerrow">
            <div class="col_grid12">
              <div class="form-group">
                <label>Industry Name</label>
                <input type="text" name="industry_name" placeholder="Industry Name" maxlength="200" class="form-control" required />
              </div>
            </div>


          </div>
          <div class="confirmApply fw">
            <button type="submit" class="input-btn">Save</button>
          </div>
        </div>
      </div>
    </form>
  </div>



  <div class='modal personal_DtlPop' id='business_add_detail'>
    <div class="close fw">
      <a class='btn close-modal' data-modal="#business_add_detail" href="#"><img src="{{ asset('public/assets/images/close.png')}}" alt="icon"></a>
    </div>
    <form class="form_sec fw col_grid12" action="{{ url('add_student_business') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class='content fw'>
        <h3 class="modal_heading">Add Business Function</h3>
        <div class="form_sec fw ">
          <div class="innerrow">
            <div class="col_grid12">
              <div class="form-group">
                <label>Business Function Name</label>
                <input type="text" name="business_function_name" placeholder="Business Function Name" maxlength="200" class="form-control" required />
              </div>
            </div>


          </div>
          <div class="confirmApply fw">
            <button type="submit" class="input-btn">Save</button>
          </div>
        </div>
      </div>
    </form>
  </div>



  <div class='modal personal_DtlPop' id='hobbies_add_detail'>
    <div class="close fw">
      <a class='btn close-modal' data-modal="#hobbies_add_detail" href="#"><img src="{{ asset('public/assets/images/close.png')}}" alt="icon"></a>
    </div>
    <form class="form_sec fw col_grid12" action="{{ url('add_student_hobby') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class='content fw'>
        <h3 class="modal_heading">Add Hobbies & Interests</h3>
        <div class="form_sec fw ">
          <div class="innerrow">
            <div class="col_grid12">
              <div class="form-group">
                <label>Hobby Name</label>
                <input type="text" name="hobby_name" maxlength="200" placeholder="Hobby Name" class="form-control" required />
              </div>
            </div>


          </div>
          <div class="confirmApply fw">
            <button type="submit" class="input-btn">Save</button>
          </div>
        </div>
      </div>
    </form>
  </div>



  <div class='modal personal_DtlPop' id='accomplishment_add_detail'>
    <div class="close fw">
      <a class='btn close-modal' data-modal="#accomplishment_add_detail" href="#"><img src="{{ asset('public/assets/images/close.png')}}" alt="icon"></a>
    </div>
    <form class="form_sec fw col_grid12" action="{{ url('add_student_accomplishment') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class='content fw'>
        <h3 class="modal_heading">Add Accomplishment</h3>
        <div class="form_sec fw ">
          <div class="innerrow">
            <div class="col_grid6">
              <div class="form-group">
             
                <label>Accomplishment Type</label>
                <input type="text" name="accomplishment_type"  class="form-control disable" value="Course">
                <!-- <select name="accomplishment_type" id="accomplishment_type" class="form-control" required>
                  <option value="Course">Course</option>
                  <option value="Awards">Awards</option>
                  <option value="Test Scores">Test Scores</option>
                  <option value="Publications">Publications</option>
                </select> -->
              </div>
            </div>
            <div class="col_grid6">
              <div class="form-group">
                <label>Course Name</label>
                <input type="text" name="course_name" maxlength="200" class="form-control" />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Award</label>
                <input type="text" name="award" maxlength="200" class="form-control" />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Test Scores</label>
                <input type="text" name="test_scores" maxlength="200" class="form-control" />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Publications</label>
                <input type="text" name="publications" maxlength="200" class="form-control" />
              </div>
            </div>
          </div>
          <div class="confirmApply fw">
            <button type="submit" class="input-btn">Save</button>
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class='modal personal_DtlPop' id='accomplishment_add_detail1'>
    <div class="close fw">
      <a class='btn close-modal' data-modal="#accomplishment_add_detail1" href="#"><img src="{{ asset('public/assets/images/close.png')}}" alt="icon"></a>
    </div>
    <form class="form_sec fw col_grid12" action="{{ url('add_student_accomplishment') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class='content fw'>
        <h3 class="modal_heading">Add Accomplishment</h3>
        <div class="form_sec fw ">
          <div class="innerrow">
            <div class="col_grid6">
              <div class="form-group">
                <label>Accomplishment Type</label>
                <input type="text" name="accomplishment_type" class="form-control disable" value="Awards">

              </div>
            </div>
            <div class="col_grid6">
              <div class="form-group">
                <label>Course Name</label>
                <input type="text" name="course_name" maxlength="200" class="form-control" />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Award</label>
                <input type="text" name="award" maxlength="200" class="form-control" />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Test Scores</label>
                <input type="text" name="test_scores" maxlength="200" class="form-control" />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Publications</label>
                <input type="text" name="publications" maxlength="200" class="form-control" />
              </div>
            </div>
          </div>
          <div class="confirmApply fw">
            <button type="submit" class="input-btn">Save</button>
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class='modal personal_DtlPop' id='accomplishment_add_detail2'>
    <div class="close fw">
      <a class='btn close-modal' data-modal="#accomplishment_add_detail2" href="#"><img src="{{ asset('public/assets/images/close.png')}}" alt="icon"></a>
    </div>
    <form class="form_sec fw col_grid12" action="{{ url('add_student_accomplishment') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class='content fw'>
        <h3 class="modal_heading">Add Accomplishment</h3>
        <div class="form_sec fw ">
          <div class="innerrow">
            <div class="col_grid6">
              <div class="form-group">
                <label>Accomplishment Type</label>
                <input type="text" name="accomplishment_type" class="form-control disable" value="Test Scores">

              </div>
            </div>
            <div class="col_grid6">
              <div class="form-group">
                <label>Course Name</label>
                <input type="text" name="course_name" maxlength="200" class="form-control" />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Award</label>
                <input type="text" name="award" maxlength="200" class="form-control" />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Test Scores</label>
                <input type="text" name="test_scores" maxlength="200" class="form-control" />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Publications</label>
                <input type="text" name="publications" maxlength="200" class="form-control" />
              </div>
            </div>
          </div>
          <div class="confirmApply fw">
            <button type="submit" class="input-btn">Save</button>
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class='modal personal_DtlPop' id='accomplishment_add_detail3'>
    <div class="close fw">
      <a class='btn close-modal' data-modal="#accomplishment_add_detail3" href="#"><img src="{{ asset('public/assets/images/close.png')}}" alt="icon"></a>
    </div>
    <form class="form_sec fw col_grid12" action="{{ url('add_student_accomplishment') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class='content fw'>
        <h3 class="modal_heading">Add Accomplishment</h3>
        <div class="form_sec fw ">
          <div class="innerrow">
            <div class="col_grid6">
              <div class="form-group">
                <label>Accomplishment Type</label>
                <input type="text" name="accomplishment_type" class="form-control disable" value="Publications">

              </div>
            </div>
            <div class="col_grid6">
              <div class="form-group">
                <label>Course Name</label>
                <input type="text" name="course_name" maxlength="200" class="form-control" />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Award</label>
                <input type="text" name="award" maxlength="200" class="form-control" />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Test Scores</label>
                <input type="text" name="test_scores" maxlength="200" class="form-control" />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Publications</label>
                <input type="text" name="publications" maxlength="200" class="form-control" />
              </div>
            </div>
          </div>
          <div class="confirmApply fw">
            <button type="submit" class="input-btn">Save</button>
          </div>
        </div>
      </div>
    </form>
  </div>

  <div class='modal personal_DtlPop' id='createNewPost'>
    <div class="close fw">
      <a class='btn close-modal' data-modal="#createNewPost" href="#"><img src="{{ asset('public/assets/images/close.png')}}" alt="icon"></a>
    </div>
    <form class="form_sec fw col_grid12" action="{{ url('add_post') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class='content fw'>
        <h3 class="modal_heading">Add Post</h3>
        <div class="form_sec fw ">
          <div class="innerrow">
            <div class="col_grid12">
              <div class="form-group">
                <label>Post Title</label>
                <input type="text" name="post_title" maxlength="200" class="form-control" required />
              </div>
            </div>
            <div class="col_grid12">
              <div class="form-group">
                <label>Post Details</label>
                <textarea name="post_details" maxlength="200" class="form-control" required></textarea>
              </div>
            </div>
            <div class="col_grid12">
              <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" maxlength="200" class="form-control" />
              </div>
            </div>


          </div>
          <div class="confirmApply fw">
            <button type="submit" class="input-btn">Save</button>
          </div>
        </div>
      </div>
    </form>
  </div>
  <!----------------Popup end----------------------->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script>
    $(window).on('load', function() {
      $('.se-pre-con').delay(1500).fadeOut('slow');
    });
  </script>
  <script type="text/javascript">
    $('#studentImage').on('change', function(ev) {
      //console.log("here inside");
      var filedata = this.files[0];
      var imgtype = filedata.type;
      var match = ['image/jpeg', 'image/jpg', 'image/png'];
      // if (!(imgtype == match[0]) || (imgtype == match[1])) {
      //   $('#mgs_ta').html('<p style="color:red">Plz select a valid type image..only jpg jpeg allowed</p>');
      // } else {
      $('#mgs_ta').empty();
      //---image preview
      var reader = new FileReader();
      reader.onload = function(ev) {
        $('#stu_id').attr('src', ev.target.result).css('width', '150px').css('height', '150px');
      }
      reader.readAsDataURL(this.files[0]);
      /// preview end
      //upload
      var postData = new FormData();
      postData.append('file', this.files[0]);
      var url = "{{url('student-image-upload')}}";
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
          console.log("success");
        }
      });
      //}
    });


    // $('#profile_image').on('change',function(ev){
    //   console.log("here inside");
    //   var filedata=this.files[0];
    //   var imgtype=filedata.type;
    //   var match=['image/jpeg','image/jpg'];
    //   if(!(imgtype==match[0])||(imgtype==match[1])){
    //     $('#mgs_ta').html('<p style="color:red">Plz select a valid type image..only jpg jpeg allowed</p>');
    //     }else{
    //     $('#mgs_ta').empty();
    //     //---image preview
    //     var reader=new FileReader();
    //     reader.onload=function(ev){
    //       $('#output').attr('src',ev.target.result).css('width','100%');
    //     }
    //     reader.readAsDataURL(this.files[0]);
    //     /// preview end
    //     //upload
    //     var postData=new FormData();
    //     postData.append('file',this.files[0]);
    //     var url="{{url('profile-image-upload')}}";
    //     $.ajax({
    //       headers:{'X-CSRF-Token':$('meta[name=csrf_token]').attr('content')},
    //       async:true,
    //       type:"post",
    //       contentType:false,
    //       url:url,
    //       data:postData,
    //       processData:false,
    //       success:function(){
    //         console.log("success");
    //       }
    //       });
    //     }
    // });
  </script>

  <script src="{{ asset('public/assets/web_assets/js/jquery-lb.js')}}"></script>
  <script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
  <script type="text/javascript">
    CKEDITOR.replace('about');
  </script>
  <script>
    $(document).ready(function() {
      $(".clicktobtm").click(function() {
        $("html, body").animate({
          scrollTop: $(
            'html, body').get(0).scrollHeight
        }, 2000);
      });
    });
  </script>
  <script>
    $(window).scroll(function() {
      var scroll = $(window).scrollTop();

      if (scroll >= 1000) {
        $("body").addClass("blogLoginFixed_sec");
      } else {
        $("body").removeClass("blogLoginFixed_sec");
      }
    });
    $(".modal").each(function() {
      $(this).wrap('<div class="popupWapper"></div>')
    });

    $(".open-modal").on('click', function(e) {
      e.preventDefault();
      e.stopImmediatePropagation;

      var $this = $(this),
        modal = $($this).data("modal");

      $(modal).parents(".popupWapper").addClass("open");
      setTimeout(function() {
        $(modal).addClass("open");
      }, 350);

      $(document).on('click', function(e) {
        var target = $(e.target);

        if ($(target).hasClass("popupWapper")) {
          $(target).find(".modal").each(function() {
            $(this).removeClass("open");
          });
          setTimeout(function() {
            $(target).removeClass("open");
          }, 350);
        }

      });

    });

    $(".close-modal").on('click', function(e) {
      e.preventDefault();
      e.stopImmediatePropagation;

      var $this = $(this),
        modal = $($this).data("modal");

      $(modal).removeClass("open");
      setTimeout(function() {
        $(modal).parents(".popupWapper").removeClass("open");
      }, 350);

    });
  </script>
  <script>
    $(window).scroll(function() {
      var scroll = $(window).scrollTop();

      if (scroll >= 50) {
        $("body").addClass("body_blog");
      } else {
        $("body").removeClass("body_blog");
      }
    });
    $(window).scroll(function() {
      var scroll = $(window).scrollTop();

      if (scroll >= 50) {
        $("body").addClass("flow2header");
      } else {
        $("body").removeClass("flow2header");
      }
    });
    $(document).ready(function() {
      $(".header_sec .togglebtn").click(function() {
        $(".header_sec ").toggleClass("opne_flow2header");
      });
    });

    // Iterate over each select element
    $('select1').each(function() {

      // Cache the number of options
      var $this = $(this),
        numberOfOptions = $(this).children('option').length;

      // Hides the select element
      $this.addClass('s-hidden');

      // Wrap the select element in a div
      $this.wrap('<div class="select"></div>');

      // Insert a styled div to sit over the top of the hidden select element
      $this.after('<div class="styledSelect"></div>');

      // Cache the styled div
      var $styledSelect = $this.next('div.styledSelect');

      // Show the first select option in the styled div
      $styledSelect.text($this.children('option').eq(0).text());

      // Insert an unordered list after the styled div and also cache the list
      var $list = $('<ul />', {
        'class': 'options'
      }).insertAfter($styledSelect);

      // Insert a list item into the unordered list for each select option
      for (var i = 0; i < numberOfOptions; i++) {
        $('<li />', {
          text: $this.children('option').eq(i).text(),
          rel: $this.children('option').eq(i).val()
        }).appendTo($list);
      }

      // Cache the list items
      var $listItems = $list.children('li');

      // Show the unordered list when the styled div is clicked (also hides it if the div is clicked again)
      $styledSelect.click(function(e) {
        e.stopPropagation();
        $('div.styledSelect.active').each(function() {
          $(this).removeClass('active').next('ul.options').hide();
        });
        $(this).toggleClass('active').next('ul.options').toggle();
      });

      // Hides the unordered list when a list item is clicked and updates the styled div to show the selected list item
      // Updates the select element to have the value of the equivalent option
      $listItems.click(function(e) {
        e.stopPropagation();
        $styledSelect.text($(this).text()).removeClass('active');
        $this.val($(this).attr('rel'));
        $list.hide();
        /* alert($this.val()); Uncomment this for demonstration! */
      });

      // Hides the unordered list when clicking outside of it
      $(document).click(function() {
        $styledSelect.removeClass('active');
        $list.hide();
      });

    });
  </script>
  <script>
    $('#profileTab_link li a:not(:first)').addClass('inactive');
    $('.profileTab_contBox').hide();
    $('.profileTab_contBox:first').show();
    $('#profileTab_link li a').click(function() {
      var t = $(this).attr('href');
      $('#profileTab_link li a').addClass('inactive');
      $(this).removeClass('inactive');
      $('.profileTab_contBox').hide();
      $(t).fadeIn('slow');
      return false;
    })

    if ($(this).hasClass('inactive')) { //this is the start of our condition 
      $('#profileTab_link li a').addClass('inactive');
      $(this).removeClass('inactive');
      $('.profileTab_contBox').hide();
      $(t).fadeIn('slow');
    }
  </script>
  <script>
    $(' .menu_right li').click(function() {
      $(' .menu_right li').removeClass('active');
      $(this).addClass('active');
    });




    function yearValidation(year, ev) {

      var text = /^[0-9]+$/;
      if (ev.type == "blur" || year.length == 4 && ev.keyCode != 8 && ev.keyCode != 46) {
        if (year != 0) {
          if ((year != "") && (!text.test(year))) {

            alert("Please Enter Numeric Values Only");
            document.getElementById('year').value = '';
            document.getElementById('year2').value = '';
            return false;
          }

          if (year.length != 4) {
            alert("Year is not proper. Please check");
            document.getElementById('year').value = '';
            document.getElementById('year2').value = '';
            return false;
          }
          var current_year = new Date().getFullYear();
          if ((year < 1970) || (year > current_year)) {
            alert("Year should be in range 1970 to current year");
            document.getElementById('year').value = '';
            document.getElementById('year2').value = '';
            return false;
          }
          return true;
        }
      }
    }

    $('.close-modal').click(function() {
      location.reload();
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.toggle-Acmntsbtn').click(function() {
        $(".toggle-Acmnts").toggleClass("toggle-contpopup");
      });
      $(".toggle-Acmnts li a").click(function() {
        $(".toggle-Acmnts").removeClass("toggle-contpopup");
      });
    });
  </script>
</body>

</html>
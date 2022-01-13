<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>internify - Home</title>
  <!-- Fontawesome 4 Cdn from BootstrapCDN -->
  <link rel="icon" type="image/png" href="{{ URL::asset('/public/uploads/favicon.jpeg') }}"/>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="{{ asset('public/assets/web_assets/css/style.css')}}" rel="stylesheet">
  <link href="{{ asset('public/assets/web_assets/fonts/fonts.css')}}" rel="stylesheet">
</head>

<body class="lightwht_bg">
  <header class="header_sec flow2_header fw">
    <div class="lgcontainer">
      @include('fruntend.student.inc.top-menu')
      <?php
      $userRole = Session::get('userRole');
      $count = 20;
      $userid = Session::get('gorgID');
      $loginby = DB::table('users')->where('id', $userid)->first();
      if ($loginby->address != '') {
        $count = $count + 10;
      }
      if ($loginby->about != '') {
        $count = $count + 10;
      }
      if ($loginby->website != '') {
        $count = $count + 10;
      }
      if ($loginby->industry != '') {
        $count = $count + 10;
      }
      if ($loginby->company_size != '') {
        $count = $count + 10;
      }
      if ($loginby->headquarters != '') {
        $count = $count + 10;
      }
      ?>

    </div>
  </header>

  <div class="body_wht-inners ">
  
    <div class="profile_public  fw">
      <div class="lgcontainer">
        <div class="innerrow">
          <div class="col_grid9">
            <div class="profile_publicimg">
              23423
              <img src="{{ asset('public/assets/images/userimg-icon.png')}}" alt="img" />
            </div>
            <div class="profile_publicDetail">
              <h4 class="clrwht font36text  semiboldfont_fmly">{{$OrgData->name}}</h4>
              <h4 class="clrwht font36text  semiboldfont_fmly"><a href="mailto:<?php echo $OrgData->email ?>">{{$OrgData->email}}</a></h4>
              <h4 class="clrwht font36text  semiboldfont_fmly">{{$OrgData->phone}}</h4>
              <div class="progressbar_sec whtprogressBar fw">
                <div class="progressbar_cont fw">
                  <span></span>
                </div>
                <?php echo $count; ?>% profile completed
              </div>
            </div>
          </div>
          <div class="col_grid3">
            <!--div class="rightPublic text-right font24Text">
                Public Profile<div class="profileToggle">
                  <div class="k-switch">
                    <div class="track"></div> 
                   <div class="ball green"></div>
                   <div class="ball red"></div>
                   </div>
                </div>           
              </div -->
          </div>
        </div>
      </div>
    </div>
    <div class="tabCompnay_profile profileDetail_tab text-center fw">
      <div class="lgcontainer">
        <ul class=" profileDetail_ul" id="profileTab_link">
          <li>
            <a href="#profileTab_Details1">My Details</a>
          </li>
          <!-- <li>
            <a href="#profileTab_Posts2">My Posts</a>
          </li> -->
          <li>
            <a href="#profileTab_Applications3">My Applications</a>
          </li>
        </ul>
      </div>
      <div class="profileTab_contBox fw" id="profileTab_Details1">
        <div class="fw personal_Details">
          <div class="lgcontainer">
            <div class="innerrow">
              <div class="col_grid12 text-left">
                <h3 class="font36text  bukhariSrptfont_fmly clrred">
                  Personal Details 
                  <a style="display:none" href="javascript:void(0);" class="open-modal" data-modal="#personal_DtlPop_edit">
                  <span class="pull-right font20Text"><i><img src="{{ asset('public/assets/images/edit.png')}}" alt="img" /></i>Edit</span></a></h3>
                <div class="innerrow">
                  <form class="form_sec fw col_grid12" action="{{ url('update_student_personal_details') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="innerrow">
                      <div class="col_grid12 ">
                        <div class="form-group">
                          <label>Your Name</label>
                          <input type="text" name="name" value="{{$OrgData->name}}" class="form-control" required>
                        </div>
                      </div>
                      <div class="col_grid6">
                        <div class="form-group">
                          <label>Email Address</label>
                          <input type="email" name="email" value="{{$OrgData->email}}" class="form-control" required>
                          <span class="inputcheck"><img src="{{ asset('public/assets/images/verified.png')}}" alt="icon"></span>
                        </div>
                      </div>
                      <div class="col_grid6">
                        <div class="form-group">
                          <label>Mobile Number</label>
                          <input type="text" name="phone" value="{{$OrgData->phone}}" class="form-control" required>

                        </div>
                      </div>
                      <div class="col_grid6">
                        <div class="form-group">
                          <label>Date of Birth</label>
                          <input type="date" name="dob" value="{{$OrgData->dob}}" class="form-control" required>
                        </div>
                      </div>
                      <div class="col_grid6 unlock_sec">
                        <div class="form-group">
                          <label>Gender</label>
                          <select name="gender" class="form-control" id="selectbox1">
                            
                            <option value="0" {{ $OrgData->gender==0 ? 'selected' : '' }}>Male</option>
                            <option value="1" {{ $OrgData->gender==1 ? 'selected' : '' }}>Female</option>
                            <option value="2" {{ $OrgData->gender==2 ? 'selected' : '' }}>Non-Binary</option>
                           
                           

                          </select>
                        </div>
                      </div>
                      <div class="col_grid12 profile_update_btn text-center">
                        <div class="form-group">
                          <input type="submit" value="Update" class="input-btn">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="fw aboutusBg smaeHeading">
          <div class="fw aboutusBg_sec">
            <div class="lgcontainer">
              <h3 class="font36text  bukhariSrptfont_fmly clrred">About</h3>
              <div class="boxShodewBg fw">
                <p class="grytextPra">{!! $OrgData->about !!}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="fw educationSec aboutusBg smaeHeading">
          <div class="fw aboutusBg_sec">
            <div class="lgcontainer">
              <h3 class="font36text  bukhariSrptfont_fmly clrred">Education </h3>
              <form class="form_sec fw">
                <div class="innerrow">
                  @foreach($edData as $ed)
                  <div class="col_grid12 ">
                    <div class="form-group">
                      <label>School Name</label> <a class="pull-right font20Text open-modal" href="javascript:void(0);" data-modal="#education_update_detail_{{$ed->id}}"><i><img src="{{ asset('public/assets/images/edit.png')}}" alt="img" /></i>Edit</a>
                      <input type="text" value="{{$ed->school_name}}" placeholder="School Name" class="form-control" readonly>
                    </div>
                  </div>

                  <div class="col_grid12">
                    <div class="form_btm_sec">
                      <div class="innerrow">
                        <div class="col_grid4">
                          <div class="form-group">
                            <label>Technology</label>
                            <input type="text" value="{{$ed->name_of_technology}}" placeholder="Name of Technology" class="form-control" readonly>
                          </div>
                        </div>
                        <div class="col_grid4">
                          <div class="form-group">
                            <label>Percentage</label>
                            <input type="text" value="{{$ed->percentage}}" placeholder="65%" class="form-control" readonly>
                          </div>
                        </div>
                        <div class="col_grid4">
                          <div class="form-group">
                            <label>Year</label>
                            <input type="text" value="{{$ed->year}}" placeholder="Year" class="form-control" readonly>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
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
                                <input type="text" name="school_name" value="{{$ed->school_name}}" placeholder="BSc in Cyber Security" class="form-control" required />
                                <input type="hidden" name="id" value="{{$ed->id}}" />
                              </div>
                            </div>
                            <div class="col_grid6 ">
                              <div class="form-group">
                                <label>Course/Degree</label>
                                <input type="text" name="technology" value="{{$ed->name_of_technology}}"  class="form-control" required />
                              </div>
                            </div>
                            <div class="col_grid6 ">
                              <div class="form-group">
                                <label>Percentage</label>
                                <input type="text" name="percentage" value="{{$ed->percentage}}" placeholder="percentage" class="form-control" required />
                              </div>
                            </div>
                            <div class="col_grid6 ">
                              <div class="form-group">
                                <label>Year</label>
                                <input type="text" name="year" value="{{$ed->year}}" placeholder="Ex. 2021-08-02" class="form-control" required />
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
                <div class="smaeHeading rightedit_sec">

                  <a href="javascript:void(0);" class="open-modal" data-modal="#education_add_detail"><span class="pull-right font20Text"><i><img src="{{ asset('public/assets/images/add.png')}}" alt="img" /></i>Add</span></a>

                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="fw educationSec aboutusBg smaeHeading paddTop0">
          
          <div class="fw aboutusBg_sec">
            <div class="lgcontainer">
              <h3 href="javascript:void(0);" data-modal="#experience_add_detail" class="font36text  bukhariSrptfont_fmly clrred open-modal">Experience <span class="pull-right font20Text"><i><img src="{{ asset('public/assets/images/add.png')}}" alt="img" /></i>Add</span></h3>
              <div class="boxShodewBg fw mrtop0 experienceBox">


                @foreach($exData as $exp)
                <?php 
                // echo "<pre>";
                // print_r($exp);
                // die("1");
                ?>
                <div class="innerrow">
                  <div class="col_grid9">
                    <div class="userBox">
                      @if(!empty($exp->company_image))
                      <img src="{{ asset('public/uploads/'.$exp->company_image)}}" alt="icon" />
                      @else
                      <img src="{{ asset('public/assets/images/userimg-icon.png')}}" alt="icon" />
                      @endif
                    </div>

                    <div class="experienceBox_cont">
                      <h4 class="font24Text clrBlack">
                        {{$exp->company_name}} <br /> {{$exp->profile}}
                      </h4>
                      <p class="font24Text clrGray">{{$exp->location}} <br /> {{$exp->duration_from}} - {{$exp->duration_to}}</p>
                    </div>
                  </div>
                  <div class="col_grid3">
                    <span class="pull-right font20Text open-modal" href="javascript:void(0);" data-modal="#experience_update_detail_{{$exp->id}}"><i><img src="{{ asset('public/assets/images/edit.png')}}" alt="img"></i>Edit</span>
                  </div>
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
                              <input type="text" name="company_name" value="{{$exp->company_name}}" class="form-control" required />
                              <input type="hidden" name="id" value="{{$exp->id}}" />
                            </div>
                          </div>
                          <div class="col_grid6 ">
                            <div class="form-group">
                              <label>Profile Type</label>
                              <input type="text" name="profile_type" value="{{$exp->profile}}" class="form-control" required />
                            </div>
                          </div>
                          <div class="col_grid6 ">
                            <div class="form-group">
                              <label>Duration From</label>
                              <input type="text" name="duration_from" value="{{$exp->duration_from}}" class="form-control" required />
                            </div>
                          </div>
                          <div class="col_grid6 ">
                            <div class="form-group">
                              <label>Duration To</label>
                              <input type="text" name="duration_to" value="{{$exp->duration_to}}" class="form-control" required />
                            </div>
                          </div>
                          <div class="col_grid6 ">
                            <div class="form-group">
                              <label>Location</label>
                              <input type="text" name="location" value="{{$exp->location}}" class="form-control" required />
                            </div>
                          </div>
                          <div class="col_grid6 ">
                            <div class="form-group">
                              <label>Profile Image</label>
                              <input type="file" name="image" class="form-control" />
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
              <h3 data-modal="#certificate_add_detail" class="font36text  bukhariSrptfont_fmly clrred open-modal">Certificates <span class="pull-right font20Text"><i><img src="{{ asset('public/assets/images/add.png')}}" alt="img" /></i>Add</span></h3>
              <div class="innerrow certificatesSec">

                @foreach($certData as $cert)
                <div class="col_grid12">
                  <div class="form_btm_sec">
                    <div class="innerrow">
                      <div class="col_grid4">
                        <div class="form-group">
                          <label>Certificate Name</label>
                          <input type="text" name="Name" value="{{$cert->certificate_name}}" class="form-control" readonly>
                        </div>
                      </div>
                      <div class="col_grid4">
                        <div class="form-group">
                          <label>Certified By</label>
                          <input type="text" name="Name" value="{{$cert->certificate_by}}" class="form-control" readonly>
                        </div>
                      </div>
                      <div class="col_grid4">
                        <div class="form-group">
                          <label>Year of Completion</label>
                          <input type="text" name="Name" value="{{$cert->year_of_completion}}" class="form-control" readonly>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="smaeHeading rightedit_sec">
                    <h3><span class="pull-right font20Text open-modal" href="javascript:void(0);" data-modal="#certificate_update_detail_{{$cert->id}}"><i><img src="{{ asset('public/assets/images/add.png')}}" alt="img" /></i>Edit</span></h3>
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
                              <input type="text" name="certificate_name" value="{{$cert->certificate_name}}" class="form-control" required />
                              <input type="hidden" name="id" value="{{$cert->id}}" />
                            </div>
                          </div>
                          <div class="col_grid6 ">
                            <div class="form-group">
                              <label>Certificate By</label>
                              <input type="text" name="certificate_by" value="{{$cert->certificate_by}}" class="form-control" required />
                            </div>
                          </div>
                          <div class="col_grid6 ">
                            <div class="form-group">
                              <label>Year of Completetion</label>
                              <input type="text" name="year_of_completion" value="{{$cert->year_of_completion}}" class="form-control" required />
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
              <h3 data-modal="#industry_add_detail" class="font36text  bukhariSrptfont_fmly clrred open-modal">My Favourite Industries <span class="pull-right font20Text"><i><img src="{{ asset('public/assets/images/add.png')}}" alt="img" /></i>Add</span></h3>
              <ul class="favouriteIndus_sec fw">
                @foreach($indusData as $indus)
                <li><a href="#" class="input-btn">{{$indus->industries_name}}</a><a href="{{ url('delete_student_industry/'.$indus->id) }}">X</a></li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        <div class="fw educationSec aboutusBg smaeHeading paddTop0">
          <div class="fw aboutusBg_sec form_sec">
            <div class="lgcontainer">
              <h3 class="font36text  bukhariSrptfont_fmly clrred">Business Functions I want to Work in <span class="pull-right font20Text"><i><img src="{{ asset('public/assets/images/add.png')}}" alt="img" /></i>Add</span></h3>
              <ul class="favouriteIndus_sec fw">
                <li><a href="#" class="input-btn">Application Development</a></li>
                <li><a href="#" class="input-btn">UI/UX Designing</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="fw educationSec aboutusBg smaeHeading paddTop0">
          <div class="fw aboutusBg_sec form_sec">
            <div class="lgcontainer">
              <h3 class="font36text  bukhariSrptfont_fmly clrred">Hobbies & Interests <span class="pull-right font20Text"><i><img src="{{ asset('public/assets/images/add.png')}}" alt="img" /></i>Add</span></h3>
              <ul class="favouriteIndus_sec fw">
                <li><a href="#" class="input-btn">Swimming</a></li>
                <li><a href="#" class="input-btn">Blogging</a></li>
                <li><a href="#" class="input-btn">Photography</a></li>
                <li><a href="#" class="input-btn">Sports</a></li>
                <li><a href="#" class="input-btn">Travel</a></li>
                <li><a href="#" class="input-btn">Learning languages</a></li>
                <li><a href="#" class="input-btn">Listening to music</a></li>
                <li><a href="#" class="input-btn">Marketing</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="fw educationSec aboutusBg smaeHeading paddTop0 lastdiv">
          <div class="fw aboutusBg_sec form_sec">
            <div class="lgcontainer">
              <div class="boxShodewBg fw">
                <h3 class="font36text  bukhariSrptfont_fmly clrred">Accomplishments <span class="pull-right font20Text"><i><img src="{{ asset('public/assets/images/add.png')}}" alt="img" /></i>Add</span></h3>
                <div class="coursesBox fw">
                  <div class="innerrow">
                    <div class="col_grid9 text-left">
                      <h3>1 . Courses</h3>
                      <p>BSc in Cyber Security</p>
                      <p>65%</p>
                      <p>Infosectrain</p>
                    </div>
                    <div class="col_grid3 text-right">
                      <span class="pull-right font20Text"><i><img src="{{ asset('public/assets/images/edit.png')}}" alt="img"></i>Edit</span>
                    </div>
                  </div>
                </div>
                <div class="coursesBox fw">
                  <div class="innerrow">
                    <div class="col_grid9 text-left">
                      <h3>1 . Awards</h3>
                      <p>Cybersecurity Awards</p>
                      <p>Infosectrain</p>
                      <p>2012</p>
                    </div>
                    <div class="col_grid3 text-right">
                      <span class="pull-right font20Text"><i><img src="{{ asset('public/assets/images/edit.png')}}" alt="img"></i>Edit</span>
                    </div>
                  </div>
                </div>
                <div class="coursesBox fw">
                  <div class="innerrow">
                    <div class="col_grid9 text-left">
                      <h3>2 . Test Scores</h3>
                      <p>XYZ Title</p>
                      <p>45</p>
                      <p>Organization/Institute name</p>
                      <p>5 June 2021</p>
                      <div class="fw courseboxbtm">
                        <p>XYZ Title</p>
                        <p>45</p>
                        <p>Organization/Institute name</p>
                        <p>5 June 2021</p>
                      </div>
                    </div>
                    <div class="col_grid3 text-right">
                      <span class="pull-right font20Text"><i><img src="{{ asset('public/assets/images/edit.png')}}" alt="img"></i>Edit</span>
                    </div>
                  </div>
                </div>
                <div class="coursesBox fw">
                  <div class="innerrow">
                    <div class="col_grid9 text-left">
                      <h3>1 . Publications</h3>
                      <p>XYZ Title</p>
                      <p>Donson Publisher</p>
                      <p>Lorem ipsum dolor sit amet.</p>
                      <p>5 June 2021</p>
                    </div>
                    <div class="col_grid3 text-right">
                      <span class="pull-right font20Text"><i><img src="{{ asset('public/assets/images/edit.png')}}" alt="img"></i>Edit</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="profileTab_contBox fw" id="profileTab_Posts2">
        <div class="fw myPostSec">
          <div class="small_contaner blogcontainer">
            <div class="fw posted_heading">
              <h3 class="font36text clrBlack semiboldfont_fmly">
                You have posted (02 Posts)
                <span class="pull-right">
                  <a href="javascript:void(0);" class="open-modal input-btn" data-modal="#createNewPost">Create a New Post</a>
                </span>
              </h3>
            </div>
            <div class="content-group fw">
              <div class="text-cont fw">
                <div class="userCommnet_deta fw">
                  <span><img src="{{ asset('public/assets/images/userimg-icon.png')}}" alt="icon"></span>
                  <div class="userCommnet_Name">
                    <h4>
                      John Doe 
                      <span>
                        27 May 2021 | 10:30
                      </span> 
                      <span class="delete_postbtn">
                        <i>
                          <img src="{{ asset('public/assets/images/delete.png')}}" alt="delete-icon" />
                        </i>
                        Delete Post
                      </span>
                    </h4>
                  </div>
                </div>
                <p class="site-pra">
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.0:30
                </p>
              </div>
              <div class="img-cont fw">
                <figure class="full-img">
                  <img src="{{ asset('public/assets/images/blogflow-card.png')}}" alt="img1">
                </figure>
              </div>
              <ul class="commntsMsgBox fw">
                <li>
                  <a href="#"><span><img src="{{ asset('public/assets/images/likedIcon.png')}}" alt="icon"></span> 35 Likes</a>
                </li>
                <li>
                  <a href="#"><span><img src="{{ asset('public/assets/images/commentIcon.png')}}" alt="icon"></span> 05 Comments</a>
                </li>
                <li>
                <a href="{{ URL::to('/message')}}" target="_blank"><span><img src="{{ asset('public/assets/images/messageIcon.png')}}" alt="icon"></span> Message</a>
                </li>
                <li>
                  <a href="#"><span><img src="{{ asset('public/assets/images/shareIcon.png')}}" alt="icon"></span> Share</a>
                </li>
              </ul>
            </div>
            <div class="content-group fw">
              <div class="text-cont fw">
                <div class="userCommnet_deta fw">
                  <span><img src="{{ asset('public/assets/images/userimg-icon.png')}}" alt="icon"></span>
                  <div class="userCommnet_Name">
                    <h4>
                      John Doe 
                      <span>
                        27 May 2021 | 10:30
                      </span> 
                      <span class="delete_postbtn">
                        <i>
                          <img src="{{ asset('public/assets/images/delete.png')}}" alt="delete-icon" />
                        </i>
                        Delete Post
                      </span>
                    </h4>
                  </div>
                </div>
                <p class="site-pra">
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.0:30
                </p>
              </div>
              <div class="img-cont fw">
                <figure class="full-img">
                  <img src="{{ asset('public/assets/images/blogimg_2.png')}}" alt="img1">
                </figure>
              </div>
              <ul class="commntsMsgBox fw">
                <li>
                  <a href="#"><span><img src="{{ asset('public/assets/images/likedIcon.png')}}" alt="icon"></span> 35 Likes</a>
                </li>
                <li>
                  <a href="#"><span><img src="{{ asset('public/assets/images/commentIcon.png')}}" alt="icon"></span> 05 Comments</a>
                </li>
                <li>
                <a href="{{ URL::to('/message')}}" target="_blank"><span><img src="{{ asset('public/assets/images/messageIcon.png')}}" alt="icon"></span> Message</a>
                </li>
                <li>
                  <a href="#"><span><img src="{{ asset('public/assets/images/shareIcon.png')}}" alt="icon"></span> Share</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="profileTab_contBox fw" id="profileTab_Applications3">
        <div class="fw myPostSec">
          <div class="small_contaner">
            <div class="fw myApplications_Sec">
              <h3 class="font36text  semiboldfont_fmly">
                You have applied for (04 Jobs)
              </h3>
              <div class="jobsDetailBox fw">
                <div class="profile_sec fw">
                  <div class="compnayBoxImg">
                    <img src="{{ asset('public/assets/images/newtechlogo.png')}}" alt="images">
                  </div>
                  <div class="compnay">
                    <h5>Mumbai</h5>
                    <span><a href="#" class="applied_btn">Applied</a>2 days ago</span>
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
                      <div class="commentsApply commMr0 fw">
                        <a href="javascript:void(0);" class="">
                          <div class="commantsChat">
                            <img src="{{ asset('public/assets/images/messageIcon.png')}}" alt="icon">
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="jobsDetailBox fw">
                <div class="profile_sec fw">
                  <div class="compnayBoxImg">
                    <img src="{{ asset('public/assets/images/header-logo.svg')}}" alt="images">
                  </div>
                  <div class="compnay">
                    <h5>New Delhi</h5>
                    <span><a href="#" class="applied_btn">Applied</a>2 days ago</span>
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
                      <div class="commentsApply commMr0 fw">
                        <a href="javascript:void(0);" class="">
                          <div class="commantsChat">
                            <img src="{{ asset('public/assets/images/messageIcon.png')}}" alt="icon">
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="jobsDetailBox fw">
                <div class="profile_sec fw">
                  <div class="compnayBoxImg">
                    <img src="{{ asset('public/assets/images/newtechlogo.png')}}" alt="images">
                  </div>
                  <div class="compnay">
                    <h5>Mumbai</h5>
                    <span><a href="#" class="applied_btn">Applied</a>2 days ago</span>
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
                      <div class="commentsApply commMr0 fw">
                        <a href="javascript:void(0);" class="">
                          <div class="commantsChat">
                            <img src="{{ asset('public/assets/images/messageIcon.png')}}" alt="icon">
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="jobsDetailBox fw">
                <div class="profile_sec fw">
                  <div class="compnayBoxImg">
                    <img src="{{ asset('public/assets/images/header-logo.svg')}}" alt="images">
                  </div>
                  <div class="compnay">
                    <h5>New Delhi</h5>
                    <span><a href="#" class="applied_btn">Applied</a>2 days ago</span>
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
                      <div class="commentsApply commMr0 fw">
                        <a href="javascript:void(0);" class="">
                          <div class="commantsChat">
                            <img src="{{ asset('public/assets/images/messageIcon.png')}}" alt="icon">
                          </div>
                        </a>
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

  /*----------------Popup Start-----------------------*/

  <div class='modal personal_DtlPop' id='education_add_detail'>
    <div class="close fw">
      <a class='btn close-modal' data-modal="#education_add_detail" href="#"><img src="{{ asset('public/assets/images/close.png')}}" alt="icon"></a>
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
                <input type="text" name="school_name" placeholder="BSc in Cyber Security" class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Course/Degree</label>
                <input type="text" name="technology" placeholder="technology" class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Percentage</label>
                <input type="text" name="percentage" placeholder="percentage" class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Year</label>
                <input type="text" name="year" placeholder="Ex. 2021-08-02" class="form-control" required />
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
                <input type="text" name="company_name" placeholder="ARK Newtech Private Limited" class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Profile Type</label>
                <input type="text" name="profile_type" placeholder="Backend Developer" class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Duration From</label>
                <input type="text" name="duration_from" placeholder="Ex. 2021-08-02" class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Duration To</label>
                <input type="text" name="duration_to" placeholder="Ex. 2023-08-02" class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Location</label>
                <input type="text" name="location" class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Company Image</label>
                <input type="file" name="company_image" class="form-control" />
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
                <input type="text" name="certificate_name" class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Certified by</label>
                <input type="text" name="certificate_by" class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Year of Completetion</label>
                <input type="text" name="year_of_completion" class="form-control" required />
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
                <input type="text" name="industry_name" class="form-control" required />
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


  /*----------------Popup end-----------------------*/


  <script src="{{ asset('public/assets/web_assets/js/jquery-lb.js')}}"></script>
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
    $('select').each(function() {

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
  </script>
</body>

</html>
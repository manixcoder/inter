<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Internify - Home</title>
  <!-- Fontawesome 4 Cdn from BootstrapCDN -->
  <link rel="icon" type="image/png" href="{{ URL::asset('/public/uploads/favicon.png') }}"/>
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
      $count = 30;
      $userid = Session::get('gorgID');
      $loginby = DB::table('users')->where('id', $userid)->first();
      $education = DB::table('education')->where('user_id', $userid)->first();
      $certificate = DB::table('certificates')->where('user_id', $userid)->first();
      $myfavorite = DB::table('my_favorite_industries')->where('user_id', $userid)->first();
      $businesses = DB::table('business_functions')->where('user_id', $userid)->first();
      $hobbies = DB::table('hobbies_and_interests')->where('user_id', $userid)->first();
      $accomplishments = DB::table('accomplishments')->where('user_id', $userid)->first();
      $OrgData = DB::table('users')->where('id', $userid)->first();
      // echo "<pre>";
      // print_r($OrgData->profile_image);
      // die;
      // echo "<pre>";
      // print_r($education);
      // die;
      if ($loginby->address != '') {
        $count = $count + 10;
      }
      if ($loginby->about != '') {
        $count = $count + 5;
      }
      if ($education) {
        $count = $count + 10;
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
    <div class="profile_public  fw">
      <div class="lgcontainer">
        <div class="innerrow">
          <div class="col_grid9">
            <div class="profile_publicimg">
              @if($loginby->profile_image =='blank-profile-picture.png')
              <img src="{{ asset('public/assets/images/userimg-icon.png')}}" alt="img" />
              @else
              <img src="{{ asset('public/uploads/'.$loginby->profile_image)}}" alt="img" />
              @endif
              <!-- <img src="{{ asset('public/assets/images/userimg-icon.png')}}" alt="img"/> -->
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
              </div-->
          </div>
        </div>
      </div>
    </div>
    <div class="tabCompnay_profile profileDetail_tab text-center fw">
      <div class="lgcontainer">
        <ul class=" profileDetail_ul" id="profileTab_link">
          <li>
            <a href="{{url('student-profile-basic-info')}}">My Details</a>
          </li>
          <li>
            <a href="{{url('student-posts')}}" class="active">My Posts</a>
          </li>
          <li>
            <a href="{{url('student-applications')}}">My Applications</a>
          </li>
        </ul>
      </div>

      <div class="profileTab_contBox fw" id="profileTab_Posts2">
        <div class="fw myPostSec">
          <div class="small_contaner blogcontainer">
            <div class="fw posted_heading">
              @php
              $userRole = Session::get('userRole');
              $id = Session::get('gorgID');
              $users = DB::table('users')->where('id', $id)->first();
              $posts = DB::table('posts')->where('user_id', $id)->orderBy('id', 'desc')->get();
              if(empty($SearchData))
              {
              $posts = DB::table('posts')->where('user_id', $id)->orderBy('id', 'DESC')->get();
              }else{
              $generatequery = "SELECT * FROM posts WHERE user_id='".$id."' WHERE heading LIKE '%' '".$SearchData."' '%' OR description LIKE '%' '".$SearchData."' '%' OR date_time LIKE '%' '".$SearchData."' '%' ";
              $posts = DB::select($generatequery);

              }
              @endphp
              <h3 class="font36text clrBlack semiboldfont_fmly">
                You have posted (0{{count($posts)}} Posts)
                <span class="pull-right">
                  <a href="javascript:void(0);" class="open-modal input-btn" data-modal="#createNewPost">Create a New Post</a>
                </span>
              </h3>
            </div>

            @foreach($posts as $post)
            @php
            $userid = Session::get('gorgID');
            $loginby = DB::table('users')->where('id', $userid)->first();
            $createdby = DB::table('users')->where('id', $post->user_id)->first();
            $likeby = DB::table('post_like')->where('post_id', $post->id)->where('like_unlike', 0)->count();
            $commentby = DB::table('post_comment')->where('post_id', $post->id)->count();
            $commentbydata = DB::table('post_comment')->where('post_id', $post->id)->get();
            $likeorUnlike = DB::table('post_like')->where('user_id', $userid)->where('post_id', $post->id)->first();
            
            @endphp
            <div class="content-group fw">
              <div class="text-cont fw">
                <div class="userCommnet_deta fw">
                  <span>
                    @if($createdby->users_role==='1')
                    <img src="{{ asset('public/uploads/'.$loginby->profile_image)}}" alt="icon" />
                    @elseif($createdby->users_role==='2')
                    <img src="{{ asset('public/uploads/'.$loginby->profile_image)}}" alt="icon" />
                    @elseif($createdby->users_role==='3')
                    <img src="{{ asset('public/uploads/'.$loginby->profile_image)}}" alt="icon" />
                    @else
                    <img src="{{ asset('public/uploads/userimg-icon.png')}}" alt="icon" />
                    @endif
                    <!-- @if($users->profile_image =='blank-profile-picture.png')
                    <img src="{{ asset('public/uploads/userimg-icon.png')}}" alt="icon" />
                    @else
                    <img src="{{ asset('public/uploads/'.$loginby->profile_image)}}" alt="icon" />
                    @endif -->
                    <!-- <img src="{{ asset('public/assets/images/userimg-icon.png')}}" alt="icon"> -->
                  </span>
                  <div class="userCommnet_Name">
                    <h4>{{$users->name}}
                      <span>
                        {!! date('d M Y H:i:s', strtotime($post->date_time)) !!}
                      </span>
                      
                      @if($users->id != $post->user_id)
                        @else
                        <span class="delete_postbtn">
                          <a href="{{ url('delete_student_post/'.$post->id) }}"><i>
                            <img src="{{ asset('public/assets/images/delete.png')}}" alt="delete-icon" /></i>
                            Delete Post
                          </a>
                        </span>
                        @endif
                      

                    </h4>
                  </div>
                </div>
                <h3 class="font57text clrBlack semiboldfont_fmly">{{$post->heading}}</h3>
                <p class="site-pra">
                  {!! $post->description !!}
                </p>
              </div>
              <div class="img-cont fw">
                <figure class="full-img">
                  <img src="{{ asset('public/uploads/'.$post->post_image)}}" alt="img1">
                </figure>
              </div>
              <ul class="commntsMsgBox fw">
                @if($likeby == null)
                <li>
                  <a href="javascript:void(0);" onclick="editRecords({{ $post->id }})">
                    <span><img src="{{ asset('public/assets/images/likedIcon.png')}}" alt="icon">
                    </span>{{ $likeby ?? ''}} Likes</a>
                </li>
                @else
                <li>
                  <a href="javascript:void(0);" onclick="editRecords({{ $post->id }})" style="color:#ba3143" ;><span><img src="{{ asset('public/assets/images/likedIcon.png')}}" alt="icon"></span> {{ $likeby ?? ''}} Likes</a>
                </li>
                @endif
                <li class="commentbyopne">
                  <a href="javascript:void(0);">
                    <span>
                      <img src="{{ asset('public/assets/images/commentIcon.png')}}" alt="icon">
                    </span> {{ $commentby ?? '' }} Comments
                  </a>
                </li>
                <div class="commentBox-usersec">
                  <div class="commentBox-heading">Comments
                    <span>({{ $commentby ?? '' }})</span>
                    <span class="closebtn">
                      <i class="fa fa-times-circle" aria-hidden="true"></i>
                    </span>
                  </div>
                  <div class="commentBox-chats">
                    @if(isset($commentbydata))
                    @foreach($commentbydata as $comments)
                    @php $commentbyuser = DB::table('users')->where('id', $comments->user_id)->first(); @endphp
                    <div class="commentBox-chats-wapper">
                      @if($userRole == 3)
                      <span class="usericon"><img src="{{ URL::asset('/public/uploads/') }}/{{ $commentbyuser->org_image ?? ''}}" alt="icon" /></span>
                      @else
                      <span class="usericon"><img src="{{ URL::asset('/public/uploads/') }}/{{ $commentbyuser->profile_image ?? ''}}" alt="icon" /></span>
                      @endif
                      <div class="commentuser-rightuser">
                        <h4>{{ $commentbyuser->name ?? ''}}</h4>
                        <p>{{ $comments->comment ?? ''}}</p>
                        <div class="comticon">
                          <!--<span><i class="fa fa-thumbs-up" aria-hidden="true"></i> - 312</span><span><a href="#" class="reply">Reply</a></span>-->
                        </div>
                      </div>
                    </div>
                    @endforeach
                    @endif
                    <form action="{{ URL::to('add-comment')}}" method="POST" id="FormValidation" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="post_id" id="postid" value="{{ $post->id ?? ''}} " class="form-control">

                      <div class="comment-inputmsg">
                        <input type="text" name="comment" id="commentdata" class="form-control" required="">
                        <button type="submit" class="btn"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                      </div>
                    </form>
                  </div>
                </div>
                <li>
                <a href="{{ URL::to('/message')}}" target="_blank"><span><img src="{{ asset('public/assets/images/messageIcon.png')}}" alt="icon"></span> Message</a>
                </li>
                <!--li class="shareclickon">
                  <a href="javascript:void(0);"><span><img src="{{ asset('public/assets/images/shareIcon.png')}}" alt="icon"></span> Share</a>
                </li -->
                <div class="sharebox-sec">
                  <div class="sharebox-user">
                    @if($userRole == 3)
                    <span><img src="{{ URL::asset('/public/uploads/') }}/{{ $loginby->org_image ?? ''}}"></span>
                    @else
                    <span><img src="{{ URL::asset('/public/uploads/') }}/{{ $loginby->profile_image ?? ''}}"></span>
                    @endif
                    {{ $loginby->name ?? ''}}
                    <small class="shareclosebtn"><img src="{{ asset('public/assets/images/close.png')}}" alt="icon"></small>
                  </div>
                  <form action="{{ URL::to('share-post')}}" method="POST" id="FormValidation" enctype="multipart/form-data">
                    @csrf
                    <div class="sharebox-commnet">
                      <input type="hidden" name="post_id" value="{{ $post->id }}">
                      <button type="submit" class="share-btn">share Now</button>
                    </div>
                  </form>
                </div>
              </ul>
            </div>
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
              <input type="text" name="Name" placeholder="Enter URL" class="form-control maxlength=" 100" size="100"">
              </div>
            </div>
            <div class=" col_grid12 ">
              <div class=" form-group">
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
                <input type="text" name="school_name" placeholder="BSc in Cyber Security" class="form-control" maxlength="100" size="100" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Course/Degree</label>
                <input type="text" name="technology"  class="form-control" maxlength="100" size="100" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Percentage</label>
                <input type="text" name="percentage" placeholder="percentage" class="form-control" maxlength="100" size="100" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Year</label>
                <input type="text" name="year" placeholder="Ex. 2021-08-02" class="form-control" maxlength="100" size="100" required />
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
                <input type="text" name="company_name" placeholder="ARK Newtech Private Limited" class="form-control" maxlength="100" size="100" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Profile Type</label>
                <input type="text" name="profile_type" placeholder="Backend Developer" class="form-control" maxlength="100" size="100" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Duration From</label>
                <input type="text" name="duration_from" placeholder="Ex. 2021-08-02" class="form-control" maxlength="100" size="100" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Duration To</label>
                <input type="text" name="duration_to" placeholder="Ex. 2023-08-02" class="form-control" maxlength="100" size="100" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Location</label>
                <input type="text" name="location" class="form-control" required maxlength="100" size="100" />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Company Image</label>
                <input type="file" name="company_image" class="form-control" maxlength="100" size="100" />
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
                <input type="text" name="certificate_name" maxlength="100" class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Certified by</label>
                <input type="text" name="certificate_by" maxlength="150" class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Year of Completetion</label>
                <input type="text" name="year_of_completion" maxlength="150" class="form-control" required />
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
                <input type="text" name="industry_name" maxlength="100" class="form-control" required />
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
                <input type="text" name="business_function_name" maxlength="150" class="form-control" required />
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
                <input type="text" name="hobby_name" maxlength="100" class="form-control" required />
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
                <select name="accomplishment_type" id="accomplishment_type" class="form-control" required>
                  <option value="Course">Course</option>
                  <option value="Awards">Awards</option>
                  <option value="Test Scores">Test Scores</option>
                  <option value="Publications">Publications</option>
                </select>
              </div>
            </div>
            <div class="col_grid6">
              <div class="form-group">
                <label>Course Name</label>
                <input type="text" name="course_name" maxlength="100" class="form-control"/>
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Award</label>
                <input type="text" name="award" class="form-control" maxlength="100"/>
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Test Scores</label>
                <input type="text" name="test_scores" class="form-control" maxlength="100"/>
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Publications</label>
                <input type="text" name="publications" class="form-control" maxlength="100"/>
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
            <div class="col_grid12 upload_box_sec">
              <div class="uploadBox">
                <!-- <input type="file" name="image" /> -->
                <input type="file" name="image" onchange="loadFile(event)">
                <div class="file_cont">
                  <img src="{{ asset('public/assets/images/attach_img.png')}}" id="output" alt="icon" />
                  <h4 class="font24Text clrBlack">Attach Photo</h4>
                </div>
              </div>
              <div class="uplaodCheckBtn">
                <button type="submit" class="input-btn">Post <span><img src="{{ asset('public/assets/images/loginCheck_icon.png')}}" alt="icon" /></span></button>
              </div>
            </div>
            <div class="col_grid12">
              <div class="form-group">
                <label>Post Title</label>
                <input type="text" name="post_title" class="form-control" maxlength="200" required />
              </div>
            </div>
            <div class="col_grid12">
              <div class="form-group">
                <label>Post Details</label>
                <textarea name="post_details" class="form-control" maxlength="400" required></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>



  <!----------------Popup end----------------------->


  <script src="{{ asset('public/assets/web_assets/js/jquery-lb.js')}}"></script>
  <script>
      $(window).on('load', function(){
       $('.se-pre-con').delay(1500).fadeOut('slow');
     });
   </script>
  <script>
    var loadFile = function(event) {
      var output = document.getElementById('output');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
      }
    };
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
    $(' .menu_right li').click(function() {
      $(' .menu_right li').removeClass('active');
      $(this).addClass('active');
    });

    $(document).ready(function() {
      $('.commentbyopne').on('click', function() {
        $(this).removeClass('opencomments-active').addClass('opencomments-active');
      });
      $('.closebtn').on('click', function() {
        $(' .commentbyopne').removeClass('opencomments-active');
      });
    });
    $(document).ready(function() {
      $('.shareclickon').on('click', function() {
        $(this).removeClass('shareclickon-active').addClass('shareclickon-active');
      });
      $('.shareclosebtn').on('click', function() {
        $(' .shareclickon').removeClass('shareclickon-active');
      });
    });
  </script>
  <script type="text/javascript">
    function editRecords(id) {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        url: "{{url('likefilter/')}}" + '/' + id,
        method: "GET",
        contentType: 'application/json',
        success: function(data) {
          var url = window.location.href;
          $(".lightwht_bg").load(url);
        }
      });
    }
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
    $('.close-modal').click(function() {
      location.reload();
    });
  </script>
  <script >
    $(document).ready(function(){
    $(".header_sec .togglebtn").click(function(){
      $(".header_sec ").toggleClass("opne_flow2header");
    });
  });
  </script>
</body>

</html>
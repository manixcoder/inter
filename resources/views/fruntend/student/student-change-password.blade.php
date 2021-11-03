<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>internify - Home</title>
  <!-- Fontawesome 4 Cdn from BootstrapCDN -->
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="{{ asset('public/assets/web_assets/css/style.css')}}" rel="stylesheet">
  <link href="{{ asset('public/assets/web_assets/fonts/fonts.css')}}" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="{{ asset('public/assets/web_assets/css/style.css')}}" rel="stylesheet">
  <link href="{{ asset('public/assets/web_assets/fonts/fonts.css')}}" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script>

  <style type="text/css">
    .has-feedback .form-control-feedback {
      top: 33px;
    }

    .validate_cus {
      color: red;
      font-size: small;
    }

    label {
      display: inline-block;
      margin-bottom: 5px;
      font-weight: 700;
    }

    .top-row>div {
      float: left;
      width: 48%;
      margin-right: 4%;
    }

    .field-wrap {
      position: relative;
      margin-bottom: 20px;
    }

    input,
    textarea {
      font-size: 18px;
      display: block;
      height: 100%;
      width: 100%;
      padding: 5px 10px;
      background: none;
      background-image: none;
      border: 1px solid #a0b3b0;
      color: #545f58;
      border-radius: 6px;
      -webkit-transition: border-color .25s ease, box-shadow .25s ease;
      transition: border-color .25s ease, box-shadow .25s ease;
    }

    input:disabled {
      background: #eee;
    }

    .button:hover,
    .button:focus {
      background: #0b9444;
    }

    .button-block {
      display: block;
      width: 50%;
    }

    .button {
      border: 0;
      outline: none;
      border-radius: 20px;
      padding: 15px 0;
      font-size: 1.6rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: .1em;
      background: #187143;
      color: #ffffff;
      -webkit-transition: all 0.5s ease;
      transition: all 0.5s ease;
      -webkit-appearance: none;
    }

    #password_reg1 {
      color: red;
    }
  </style>
</head>

<body class="lightwht_bg">
  <header class="header_sec flow2_header fw">
    <div class="lgcontainer">
      @if($OrgData->users_role == 2)
      @include('fruntend.student.inc.top-menu')
      @else
      @include('fruntend.common_pages.web_header')
      @endif
    </div>
  </header>
  <div class="body_wht-inners ">
    <div class="fw  changePassword_sec">
      <div class="lgcontainer">
        <div class="changePassword_box">
          <div class="changePassword_heading">
            <h3 class="font36text  bukhariSrptfont_fmly clrred">Change Password</h3>
          </div>
          @if(Session::has('status'))
          @if(Session::has('status') == 'success')
          <div class="popupWapper">
            <div class="modal cPassword_update_popup" id="cPassword_update">
              <div class="close fw">
                <a class="btn close-modal" data-modal="#cPassword_update" href="#"><img src="{{ asset('public/assets/images/images/close.png' )}}" alt="icon"></a>
              </div>
              <div class="content fw">
                <div class="password_update_sec fw">
                  <figure class="fw">
                    <img src="{{ asset('public/assets/images/images/succcessfull.png') }}" alt="icon">
                  </figure>
                  <h3>{{ Session::get('message') }}</h3>
                </div>
              </div>
            </div>
          </div>
          @endif
          @endif

          <form class="form_sec fw" method="POST" action="{{ url('student-password-update') }}" id="signup-form">
            <!-- @if(Session::has('success_msg'))
            <div class="col_grid8" style="color:green">
              {{ Session::get('success_msg') }}
            </div>
            @endif -->

            @if(Session::has('error_msg'))
            <div class="col_grid8" style="color:red">
              {{ Session::get('error_msg') }}
            </div>
            @endif


            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="form-group">
              <div class="col_grid8" style="color:red">{{ $error }}</div>
            </div>
            @endforeach
            @endif
            @csrf
            <div class="innerrow">
              <div class="col_grid12 ">
                <div class="form-group">
                  <label>Current Password</label>
                  <input type="password" name="current_password" placeholder="Enter your current password" class="form-control" required maxlength="50">
                </div>
              </div>
              <div class="col_grid12 ">
                <div class="form-group">
                  <label>New Password</label>
                  <input type="password" name="password" id="password_reg" placeholder="Enter your new password" class="form-control" required maxlength="20">
                  <span class="glyphicon form-control-feedback" id="password_reg1" style="color:red;">
                </div>
              </div>
              <div class="col_grid12 ">
                <div class="form-group">
                  <label>Confirm Password</label>
                  <input type="password" name="password_confirmation" id="confirmPassword" placeholder="Re-enter your new password" class="form-control" required maxlength="20">
                  <span class="glyphicon form-control-feedback" id="confirmPassword1" style="color:red;">
                </div>
              </div>

              <div class="col_grid12 confirmApply ">
                <button type="submit" class="input-btn">Change Password <span><img src="{{ asset('public/assets/images/loginCheck_icon.png')}}" alt="icon" /></span></button>
              </div>
            </div>
          </form>
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

  <!----------------Popup Start----------------------->

  <div class='modal personal_DtlPop' id='education_add_detail'>
    <div class="close fw">
      <a class='btn close-modal' data-modal="#education_add_detail" href="#"><img src="{{ asset('public/assets/images/close.png')}}" alt="icon"></a>
    </div>
    <form class="form_sec fw col_grid12" action="{{ url('add_student_education') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class='content fw'>
        <h3 class="modal_heading">Add Course</h3>
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
                <label>Technology</label>
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
                <label>Profile Image</label>
                <input type="file" name="image" class="form-control" />
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
                <label>Certificate By</label>
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
                <input type="text" name="business_function_name" class="form-control" required />
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
                <input type="text" name="hobby_name" class="form-control" required />
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
                <label>Course Name</label>
                <input type="text" name="course_name" class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Award</label>
                <input type="text" name="award" class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Test Scores</label>
                <input type="text" name="test_scores" class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Publications</label>
                <input type="text" name="publications" class="form-control" required />
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
                <input type="text" name="post_title" class="form-control" required />
              </div>
            </div>
            <div class="col_grid12">
              <div class="form-group">
                <label>Post Details</label>
                <textarea name="post_details" class="form-control" required></textarea>
              </div>
            </div>
            <div class="col_grid12">
              <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control" />
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



  <div class='modal resumeUpload_popup' id='resumeUpload'>
    <?php
    $userid = Session::get('gorgID');
    $res = DB::table('student_resume')->where('student_id', $userid)->first();
    ?>
    <div class="close fw">
      <a class='btn close-modal' data-modal="#resumeUpload"><img src="{{ asset('public/assets/images/close.png')}}" alt="icon"></a>
    </div>
    <form class="form_sec fw col_grid12" action="{{ url('upload_student_resume') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class='content fw'>
        <h3 class="modal_heading">Resume Attachment</h3>
        <div class="innerrow">
          <div class="col_grid6">
            @if(!empty($res->image))
            <figure class="resumeimg">
              <iframe src="{{ asset('public/assets/student_image/'.$res->image) }}" width="300" height="300"></iframe>
            </figure>

            <span class="fw"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> {{$res->image}}</span>
            @endif
            <div class="innerrow">

            </div>
          </div>
          <div class="col_grid6 text-center">
            @if(!empty($res->updated_at))
            <h5>Last updated on {!! date('d M Y', strtotime($res->updated_at)) !!}</h5>
            @endif
            <div class="custome_uplaodresume">
              <div class="inputgroup">
                <input type="file" name="image" class="uploadbtn" required>
                <span>Update Resume</span>
              </div>
            </div>
          </div>
          <div class="confirmApply fw">
            <button type="submit" class="input-btn text-center">Confirm & Apply</button>
          </div>
        </div>
      </div>
    </form>
  </div>



  <!----------------Popup end----------------------->

  <script type="text/javascript">
    var value = $("#password_reg").val();

    $.validator.addMethod("checklower", function(value) {
      return /[a-z]/.test(value);
    });
    $.validator.addMethod("checkupper", function(value) {
      return /[A-Z]/.test(value);
    });
    $.validator.addMethod("checkdigit", function(value) {
      return /[0-9]/.test(value);
    });
    $.validator.addMethod("pwcheck", function(value) {
      return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) && /[a-z]/.test(value) && /\d/.test(value) && /[A-Z]/.test(value);
    });

    $('#signup-form').validate({
      rules: {
        password: {
          minlength: 6,
          maxlength: 30,
          required: true,
          pwcheck: true,
          checklower: true,
          checkupper: true,
          checkdigit: true
        },
        confirmPassword: {
          equalTo: "#password_reg",
        },
      },
      messages: {
        password: {
          pwcheck: "Password is not strong enough",
          checklower: "Need atleast 1 lowercase alphabet",
          checkupper: "Need atleast 1 uppercase alphabet",
          checkdigit: "Need atleast 1 digit"
        }
      },
      highlight: function(element) {
        var id_attr = "#" + $(element).attr("id") + "1";
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        $(id_attr).removeClass('glyphicon-ok').addClass('glyphicon-remove');
        $('.form-group').css('margin-bottom', '5px');
        $('.form').css('padding', '30px 40px');
        $('.tab-group').css('margin', '0 0 25px 0');
        $('.help-block').css('display', '');
      },
      unhighlight: function(element) {
        var id_attr = "#" + $(element).attr("id") + "1";
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        $(id_attr).removeClass('glyphicon-remove').addClass('glyphicon-ok');
        $('#confirmPassword').attr('disabled', false);
      },
      errorElement: 'span',
      errorClass: 'validate_cus',
      errorPlacement: function(error, element) {
        x = element.length;
        if (element.length) {
          error.insertAfter(element);
        } else {
          error.insertAfter(element);
        }
      }

    });
  </script>


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

    $(document).ready(function() {
      $('.pub-accordion-content').hide();

      $('#pub-accordion').find('.pub-accordion-toggle').click(function() {

        var $this = $(this);
        var toOpen = $this.hasClass("open");
        $('h4').removeClass("open").addClass("closed");


        //Toggle icon
        if (!toOpen) {
          $this.removeClass("closed").addClass("open");
        }

        //Expand or collapse this panel
        $this.next().slideToggle('fast')

        //Hide the other panels
        $(".pub-accordion-content").not($this.next()).slideUp('fast');
      });
    });
  </script>

  <script>
    $(' .menu_right li').click(function() {
      $(' .menu_right li').removeClass('active');
      $(this).addClass('active');
    });
  </script>

  <script type="text/javascript">
    $(".k-switch").click(function() {
      var self = $(this);
      if (self.hasClass("on")) {
        self.removeClass("on");
      } else {
        self.addClass("on");
      }
    });
  </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>internify - Home</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="{{ asset('public/assets/web_assets/css/style.css')}}" rel="stylesheet">
  <link href="{{ asset('public/assets/web_assets/fonts/fonts.css')}}" rel="stylesheet">
</head>

<body class="lightwht_bg">
  <header class="header_sec flow2_header fw">
    <div class="lgcontainer">
      @include('fruntend.student.inc.top-menu')
    </div>
  </header>
  <div class="body_wht-inners ">
    @if(Session::has('status'))
    @if(Session::has('status') == 'success')
    <div class="popupWapper">
      <div class="modal resumeUpload_popup successfullyModalPopup" id="successfullyModal">
        <div class="content fw">
          <div class="imgcheck_icon fw">
            <img src="{{ asset('public/assets/images/images/succcessfull.png') }}" alt="icon">
          </div>
          <h3 class="">{{ Session::get('message') }}</h3>
          <p>You will be contacted through <br> your email or phone number, hang tight!</p>
        </div>
      </div>
    </div>
    @endif
    @endif

    @if(Session::has('status'))
    <div class="alert alert-{{ Session::get('status') }}">
      <i class="fa fa-building-o" aria-hidden="true"></i> {{ Session::get('message') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
    </div>
    @endif

    <?php
    // echo "<pre>";
    // print_r($appl);
    // die;
    ?>
    <div class="lgcontainer">
      <div class="boxDetailbg fw">
        <figure>
          @if($appl->logo !='')
          <img src="{{ asset('public/uploads')}}/{{ $appl->logo }}" alt="jobs">
          @else
          <img src="{{ asset('public/uploads/placeholder.png')}}" alt="newtechlogo">
          @endif
        </figure>
      </div>
      <div class="jobsDetailProfile fw">
        <div class="innerrow">
          <div class="col_grid9">
            <div class="jobsDetailComp_img">
              @if($appl->profile_image !='')
              <img src="{{ asset('public/uploads')}}/{{ $appl->profile_image }}" alt="newtechlogo">
              @else
              <img src="{{ asset('public/uploads/placeholder.png')}}" alt="newtechlogo">
              @endif
            </div>
            <div class="jobsDetailComp_cont">
              <h3>{{ $appl->org_name }}</h3>
              <h3><a href="#" class="lightblue_text">{{$appl->job_title}}</a></h3>
              <p>{{ $appl->salary }}</p>
              <p>{{ $appl->location }}</p>
            </div>
          </div>
          <div class="col_grid3">
            <div class="retextbtn_sec">
              <form method="post" action="{{ url('company-profile') }}">
                @csrf
                <input type="hidden" name="comp_id" value="{{ $OrgData->id }}">

                <button type="submit" class="retextbtn">View Company Profile</button>
                <img src="{{ asset('public/assets/images/arrow_right_red.png')}}" alt="redarrow">
              </form>
              <!--a href="{{ url('company-profile') }}/{{ $OrgData->id }}" class="retextbtn">View Company Profile
                <span>
                  <img src="{{ asset('public/assets/images/arrow_right_red.png')}}" alt="redarrow">
                </span>
              </a -->
            </div>
            <div class="commentsApply fw">
              <div class="commantsChat">
                <a href="{{ URL::to('/message')}}" target="_blank">
                  <img src="{{ asset('public/assets/images/messageIcon.png')}}" alt="icon">
                </a>
              </div>
              <div class="applyBtn">
                <?php
                $userRole   = Session::get('userRole');
                $userid     = Session::get('gorgID');
                $jobCount   = DB::table('job_applied')->where('student_id', $userid)->where('job_id', $appl->id)->count();
                $orgData = DB::table('users')->where('id', $appl->user_id)->first();
                ?>
                @if($jobCount==0)
                <form method="post" action="{{ url('student_job_apply') }}">
                  @csrf
                  <input type="hidden" name="job_id" value="{{ $appl->id }}">
                  <button type="submit" class="input-btn" data-modal="#successfullyModal">Apply</button>
                </form>
                @else
                <a class="input-btn">Applied</a>
                @endif
              </div>
            </div>
          </div>
          <div class="col_grid12 extraleft_pad mrtop_extra45 contact_profileinfo">
            <div class="innerrow">
              <div class="col_grid6 contactmail">
                <span>
                  Contact:
                  <a href="mailto:{{ $orgData->email }}" class="lightblue_text">
                    {{ $orgData->email }}
                  </a>
                </span>
              </div>
              <div class="col_grid6 text-right checkbox_notify">
                <div class="custominputBox">
                  <input type="checkbox" class="inputCheck">
                  <span></span>
                </div>
                <span>Notify me for similar jobs</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="jobDescriptions_sec fw">
        <h3 class="borderBox_heading">Offer</h3>
        <ul>
          @foreach(unserialize($appl->offer) as $offer)
          <li>{{ $offer }}</li>
          @endforeach
        </ul>
      </div>
      <div class="jobDescriptions_sec fw">
        <h3 class="borderBox_heading">Job Descriptions</h3>
        <p>{!! $appl->job_description !!}</p>
      </div>
      @if($appl->attachment !='')
      <div class="jobDescriptions_sec fw">
        <h3 class="borderBox_heading">Attachment</h3>
        <a href="{{ URL::asset('/public/uploads/') }}/{{ $appl->attachment ?? ''}}" download>
          <img src="{{ URL::asset('/public/assets/images/fileupload_sec.png') }}" alt="icon">

          <img src="{{ URL::asset('/public/assets/images/download.png') }}" alt="icon">
        </a>
      </div>
      @endif
      <div class="fw similarBox_sec blog_intersted_box">
        <div class="lgcontainer">
          <div class="innerrow">
            <div class="col_grid12 arrowheading_site right_after_arrow ">
              <h3>Similar Jobs</h3>
            </div>
            @php
            $jobs_data = DB::table('jobs')->where('status', 0)->where('id', '!=', $appl->id)->limit(2)->get();
            @endphp
            @foreach($jobs_data as $job)
            <div class="col_grid6">
              <div class="jobsDetailBox fw">
                <div class="profile_sec fw">
                  <div class="compnayBoxImg">
                    <img src="{{ asset('public/uploads/'.$job->logo)}}" alt="images">
                  </div>
                </div>
                <div class="jobsDetailCont fw">
                  <h3>{{$job->job_title}}</h3>
                  <p><a href="#" class="lightblue_text">{{$job->job_title}}</a></p>
                  <div class="innerrow">
                    <div class="col_grid12">
                      <ul>
                        @foreach(unserialize($job->offer) as $offer)

                        <li>{{ $offer }}</li>
                        @endforeach
                      </ul>
                    </div>
                    <div class="col_grid8">
                      <p><span>{{$job->location}}</span>
                        <!--span class="dots">6 Months Internship</span -->
                      </p>
                    </div>
                    <div class="col_grid4">
                      <a href="{{url('student-job-details/'.$job->id)}}" class="input-btn redBGmanage_btn">View Job</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="popupWapper">
    <div class="modal resumeUpload_popup successfullyModalPopup open" id="successfullyModal">

      <div class="content fw">
        <div class="imgcheck_icon fw">
          <img src="{{ asset('public/assets/images/succcessfull.png')}}" alt="icon">
        </div>
        <h3 class="">Job Applied Successfully</h3>
        <p>You will be contacted through <br> your email or phone number, hang tight!</p>
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
  @include('fruntend.common_pages.web_header')

  @php
  $recruiterDetails = DB::table('users')->where('id', $Data[0]->user_id)->first();
  $intrestedCandidate = DB::table('job_applied')->where('job_id', $Data[0]->id)->get();
  @endphp

  <div class="body_wht-inners ">
    <div class="lgcontainer">
      <div class="boxDetailbg fw">
        <figure>
          <img src="{{ URL::asset('/public/assets/images/jobsDetailBG.png') }}" alt="jobs" />
        </figure>
      </div>
      <div class="jobsDetailProfile fw">
        <div class="innerrow">
          <div class="col_grid12">
            <div class="jobsDetailComp_img">
              <img src="{{ URL::asset('/public/uploads/') }}/{{ $recruiterDetails->org_image }}" alt="newtechlogo" />
            </div>
            <div class="jobsDetailComp_cont">
              <h3>{{ $recruiterDetails->org_name}}</h3>
              <h3><a href="#" class="lightblue_text clrBlack">{{ $Data[0]->job_title ?? ''}}</a></h3>
              <p>{{ $Data[0]->location ?? ''}}</p>
            </div>
          </div>
          <div class="col_grid3" style="display: none;">
            <div class="retextbtn_sec">
              <a href="#" class="retextbtn">View Company Profile <span><img src="images/arrow_right_red.png" alt="redarrow" /></span></a>
            </div>
            <div class="commentsApply fw">
              <div class="commantsChat">
                <img src="{{ URL::asset('/public/assets/images/messageIcon.png')}}" alt="icon" />
              </div>
              <div class="applyBtn">
                <a href="javascript:void(0);" class="input-btn open-modal" data-modal="#successfullyModal">Apply</a>
              </div>
            </div>
          </div>
          <!--<div class="col_grid12 Jobextend_details text-center">-->
          <!--  <a href="javascript:void(0);" class="lightblue_text">Extend Details <span><img src="images/arrow_drop_down_blue.png" /></span></a>-->
          <!--</div>-->

          @if(Session::has('status'))
                    <div class="alert alert-{{ Session::get('status') }}">
                        <i class="fa fa-building-o" aria-hidden="true"></i> {{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                    </div>
            @endif
          <div class=" intercandidates_sec fw">
            <h3>{{ count($intrestedCandidate ?? '')}} Interested Candidates</h3>

            

            @if(isset($intrestedCandidate))
            @foreach($intrestedCandidate as $value)
            
            

            @php 
            $studentDetails = DB::table('users')->where('id', $value->student_id)->first();
            $studentResume = DB::table('student_resume')->where('student_id', $value->student_id)->first();

            @endphp
            <div class="intercandidates_box fw">
              <div class="jobsDetailBox fw">
                <div class="innerrow">
                  <div class="col_grid8">
                    <div class="intercandidates_imgbox">
                      <img src="{{ URL::asset('/public/uploads/') }}/{{ $studentDetails->profile_image ?? ''}}" alt="img">
                    </div>
                    <div class="intercandidates_contbox">
                      <h3 class="clrblack bold">{{ $studentDetails->name ?? ''}}</h3>
                      <h4 class="clrblack ">
                        <a href="mailto:{{ $studentDetails->email ?? ''}}" class="clrblack">
                          {{ $studentDetails->email ?? ''}}
                        </a>
                      </h4>
                      <h4 class="clrblack ">
                        {{ $studentDetails->phone ?? ''}}
                      </h4>
                    </div>
                  </div>

                  <div class="col_grid4">
                    <div class="commentsApply fw">
                      <div class="commantsChat">
                        <img src="{{ URL::asset('/public/assets/images/messageIcon.png') }}" alt="icon">
                      </div>
                      <div class="applyBtn">
                        <a href="{{ URL::to('student-selected',$studentDetails->id) }}/{{ $Data[0]->user_id }}" class="input-btn">Shortlist & Send Email</a>
                      </div>
                    </div>
                  </div>
                  <div class="col_grid12 intercandidatesProfile">
                    <div class="innerrow">
                      <div class="col_grid9">
                        <div class="cvpdf">
                          @if(!empty($studentResume))
                          <a href="{{ URL::asset('/public/uploads/') }}/{{ $studentResume->image ?? ''}}" download>
                            <img src="{{ URL::asset('/public/assets/images/fileupload_sec.png') }}" alt="icon">
                            {{ $value->resume ?? ''}}
                            <img src="{{ URL::asset('/public/assets/images/download.png') }}" alt="icon">
                          </a>
                          @endif
                        </div>
                        <div class="retextbtn_sec">
                          <a href="{{ URL::to('student-profiles',$studentDetails->id) }}" class="retextbtn">
                            View Profile
                            <span>
                              <img src="{{ URL::asset('/public/assets/images/arrow_right_red.png') }}" alt="redarrow">
                            </span>
                          </a>
                        </div>
                      </div>
                      <div class="text-right  col_grid3">
                        <div class="applyBtn">
                          <a href="{{ URL::to('student-reject',$studentDetails->id) }}/{{ $Data[0]->user_id }}" class="input-btn redText">Reject</a>
                        </div>
                      </div>
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
  @include('fruntend.common_pages.web_footer')

  <div class='modal resumeUpload_popup successfullyModalPopup' id='successfullyModal'>

    <div class='content fw'>
      <div class="imgcheck_icon fw">
        <img src="{{ URL::asset('/public/assets/images/succcessfull.png') }}" alt="icon" />
      </div>
      <h3 class="">Job Applied Successfully</h3>
      <p>Recruiter will contact you through <br />your email or mobile number.</p>
    </div>
  </div>
  <script src="js/jquery-lb.js"></script>
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
    $(' .menu_right li').click(function() {
      $(' .menu_right li').removeClass('active');
      $(this).addClass('active');
    });
    $(document).ready(function() {
      $(".Jobextend_details .lightblue_text").click(function() {
        $(".intercandidates_sec ").slideToggle();
      });
    });
  </script>
  </body>

  </html>
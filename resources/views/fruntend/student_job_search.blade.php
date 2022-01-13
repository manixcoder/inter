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
  <body class="body_redbg">
    <header class="header_sec blog_header mobileHidesec fw">
      <div class="lgcontainer">
        <div class="innerrow">
          <div class="col_grid12">
          <ul class="nav-menu fw">
              <div class="togglebtn">
                <span></span>
                <span></span>
                <span></span>
              </div>
              <div class="left_sec col_grid4 text-left menu_link">
                <li class="active"><a href="{{ URL::to('/') }}">Home</a></li>
                <li><a href="{{ URL::to('blog') }}">Blogs</a></li>
              </div>
               <div class="center_sec text-center col_grid4 menu_logo">
                 <li>
                 <a href="{{ URL::to('/') }}">
                   <img src="{{ asset('public/assets/images/header-logo.svg')}}" alt="logo" />
                   <img src="{{ asset('public/assets/images/logo.svg')}}" alt="wht-logo" class="wth-logo-hide" />
                  </a>
                </li>
              </div>
              <div class="right_sec col_grid4 text-right menu_link">
                <li><a href="{{ URL::to('student-login') }}">Login</a></li>
                <li><a href="{{ URL::to('contactus') }}">Contact us</a></li>
              </div>
            </ul>
          </div>
        </div>
      </div>
    </header>
   
    <div class="body_wht-inners ">
      <div class="middle_container middleContainerbox">
       
        <div class="unlock_sec jobSearch_sec">
          <h4>Find internships that inspire</h4>
          <form method="get" action="{{url('student-jobs')}}">
            <div class="innerrow">
              <div class="col_grid5 rightmap_icon">
                <div class="form_group">
                  <!-- <select name="location" class="form-contorl" id="selectbox2">
                    <?php
                    // if(!empty($location))
                    // {
                    //   $location=$location;
                    // }
                    // else {
                    //   $location="";
                    // }
                      ?>
                    <option value="{{$location}}" >{{$location}}</option>
                    @foreach($locationData as $ld)
                    <option value="<?php //echo $ld->location ?>" ><?php // echo $ld->location ?></option>
                   @endforeach

                  </select> -->

                  <select name="location" class="form-contorl" id="selectbox2">
                  <option value="">Select Location</option>                        
                        <option value="Mumbai">Mumbai</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Bangalore">Bangalore</option>
                        <option value="Pune">Pune</option>
                        <option value="Mohali">Mohali</option>
                        <option value="Chandigarh">Chandigarh</option>
                        <option value="Hydrabad">Hydrabad</option>
                      </select>
                  
                </div>  
              </div>
              <div class="col_grid4">
                <div class="form_group">
                  <!-- select name="job_title" class="form-contorl" id="selectbox1">
                    <?php
                    // if(!empty($job_title))
                    // {
                    //   $job_title=$job_title;
                    // }
                    // else {
                    //   $job_title="";
                    // }
                      ?>
                    <option value="{{$job_title}}" >{{$job_title}}</option>
                    @foreach($titleData as $td)
                    <option value="<?php //echo $td->job_title ?>" ><?php // echo $td->job_title ?></option>
                   @endforeach
                  </select -->

                  <select name="job_title" class="form-contorl" id="selectbox2">
                        <option value="">Select Job Title</option>                        
                        <option value="Sales & Marketing Executive">Sales & Marketing Executive</option>
                        <option value="Front-end Developer">Front-end Developer</option>
                        <option value="Financial Analyst">Financial Analyst</option>
                      </select>
                </div>
              </div>
              <div class="col_grid3  ">
                <div class="btn">
                  <button type="submit" class="input-btn lending_search" name="search">SEARCH</button>
                </div>
              </div>
            </div>
          </form>
        </div>


        @foreach($jobsData as $appl)
                <div class="jobsDetailBox fw">
                  <div class="profile_sec fw">
                    <div class="compnayBoxImg">
                      <img src="{{ asset('public/uploads/'.$appl->logo)}}" alt="images">
                    </div>
                    <div class="compnay">
                      <h5>{{$appl->location}}</h5>
                      <span>
                      <?php
                  $userRole = Session::get('userRole');
                  $uid = Session::get('gorgID');
                  $jobCount = DB::table('job_applied')->where('student_id', $uid)->where('job_id', $appl->id)->count();
                  ?>

                  @if($jobCount==0)
                  
                 @else
                 <a href="#" class="applied_btn">Applied</a>
                 @endif
                       
                        
                        {!! date('d M Y', strtotime($appl->created_at)) !!}
                      
                      
                      </span>
                    </div>
                  </div>
                  <div class="jobsDetailCont fw">
                    <h3>{{$appl->company_name}}</h3>
                    <p><a href="#" class="lightblue_text">{{$appl->job_title}}</a></p>
                    <div class="innerrow">
                      <div class="col_grid9">
                        <ul>
                          <li><?php echo $appl->job_description ?></li>
                         
                        </ul>
                      </div>
                      <div class="col_grid3">
                <a href="{{url('student-login')}}"  class="input-btn redBGmanage_btn ">View Job</a>
                    </div>
                    </div>
                  </div>
                </div>
                @endforeach


      






      </div>
    </div>

    <footer class="fw">
      <div class="lgcontainer">
        <ul class="footer_menu col_grid7 text-left">
          <li><a href="{{URL::to('aboutus')}}">About Us</a></li>
          <li><a href="{{URL::to('contactus')}}">Contact Us</a></li>
          <li><a href="{{URL::to('termsofuse')}}">Terms of Use</a></li>
          <li><a href="{{URL::to('privacypolicy')}}">Privacy Policy</a></li>
        </ul>
        <ul class="social_icon col_grid5 text-right">
          <li>
            <a href="https://open.spotify.com/user/64p2h14btruk2aydbijnajk9o"><i class="fa fa-spotify" aria-hidden="true"></i></a>
          </li>
          <li>
            <a href="https://www.facebook.com/Theinternify"><i class="fa fa-facebook" aria-hidden="true"></i></a>
          </li>
          <li>
            <a href="https://twitter.com/TInternify "><i class="fa fa-twitter" aria-hidden="true"></i></a>
          </li>
          <li>
            <a href="https://www.instagram.com/theinternify/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
          </li>
          <li>
            <a href="https://www.linkedin.com/company/the-internify/ "><i class="fa fa-linkedin" aria-hidden="true"></i></a>
          </li>
        </ul>
      </div>
    </footer>
    <script src="{{ asset('public/assets/web_assets/js/jquery-lb.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
   <script>
     $(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 7,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: true,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 992,
            settings: {
                slidesToShow: 5
            }
        }, {
            breakpoint: 700,
            settings: {
                slidesToShow: 4
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 3
            }
        },
        {
            breakpoint: 400,
            settings: {
                slidesToShow: 2
            }
        }]
    });
});
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
    $(window).scroll(function() {    
      var scroll = $(window).scrollTop();

      if (scroll >= 50) {
          $("body").addClass("flow2header");
      } else {
          $("body").removeClass("flow2header");
      }
  });
  $(document).ready(function(){
    $(".header_sec .togglebtn").click(function(){
      $(".header_sec ").toggleClass("opne_flow2header");
    });
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
  // Iterate over each select element
$('select').each(function () {

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
$styledSelect.click(function (e) {
    e.stopPropagation();
    $('div.styledSelect.active').each(function () {
        $(this).removeClass('active').next('ul.options').hide();
    });
    $(this).toggleClass('active').next('ul.options').toggle();
});

// Hides the unordered list when a list item is clicked and updates the styled div to show the selected list item
// Updates the select element to have the value of the equivalent option
$listItems.click(function (e) {
    e.stopPropagation();
    $styledSelect.text($(this).text()).removeClass('active');
    $this.val($(this).attr('rel'));
    $list.hide();
    /* alert($this.val()); Uncomment this for demonstration! */
});

// Hides the unordered list when clicking outside of it
$(document).click(function () {
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
</script>
  </body>
</html>
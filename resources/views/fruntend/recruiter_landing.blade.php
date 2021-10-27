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
               <div class="center_sec text-center col_grid4 menu_logo"><a href="{{ URL::to('/') }}"><img src="{{ asset('public/assets/images/header-logo.svg')}}" alt="logo" /><img src="{{ asset('public/assets/images/logo.svg')}}" alt="wht-logo" class="wth-logo-hide" /></a></li></div>
              <div class="right_sec col_grid4 text-right menu_link">
                <li><a href="{{ URL::to('web-login') }}">Login</a></li>
                <li><a href="{{ URL::to('contactus') }}">Contact us</a></li>
              </div>
            </ul>
          </div>
        </div>
      </div>
    </header>
    <header class="header_sec flow2_header mobileHideShow fw">
      <div class="lgcontainer">
        <div class="innerrow">
          <div class="col_grid3">
            <a href="./flow2_home.html" class="logo-flow2">
              <img src="{{ asset('public/assets/images/logo.svg')}}" alt="logo-img" />
              <img class="hidelogo_header" src="{{ asset('public/assets/images/header-logo.svg')}}" alt="logo-img" />
            </a>
          </div>
          <div class="col_grid9 text-right">
            <div class="header_menu fw">
              <div class="togglebtn">
                <span></span>
                <span></span>
                <span></span>
              </div>
              <ul class="menu_right">
                <li >
                  <a href="{{ URL::to('/') }}">Home </a>
                </li>
                <li  class="active">
                  <a href="{{ URL::to('blog') }}">Blogs </a>
                </li>
                <li><a href="{{ URL::to('web-login') }}">Login</a></li>
                <li><a href="{{ URL::to('contactus') }}">Contact us</a></li>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>
    <ul class="rightSocial_sec">
      <li><a href="https://www.facebook.com/Theinternify"><img src="{{ asset('public/assets/images/fo_facebook.png')}}" alt="icon" /></a></li>
      <li><a href="https://twitter.com/TInternify"><img src="{{ asset('public/assets/images/fo_twitter.png')}}" alt="icon" /></a></li>
      <li><a href="https://www.instagram.com/theinternify/"><img src="{{ asset('public/assets/images/fo_insta.png')}}" alt="icon" /></a></li>
      <li><a href="https://www.linkedin.com/company/the-internify/"><img src="{{ asset('public/assets/images/fo_linkedin.png')}}" alt="icon" /></a></li>
    </ul>
    <div class="body_redbg-inner  iam_text_sec">
      <div class="empowering-sec">
        <div class="empotext-cont">
          <div class="lgcontainer">
              <div class=" leanding_pg text-center recruiterLeanding_sec fw">
                <div class="redefining-sec">
                  <h2>Helping Companies
                    <span>understand the next big thing</span>
                  </h2>
                  <h3 class="companys_vision">Take your company’s vision to new heights with interns from Internify!</h3>
                </div>
                <div class="btm_arrow whtarrow_slide">
                  <a href="#internships_id" class="clicktobtm"><img src="{{ asset('public/assets/images/arrow_line_white.png')}}" alt="arrow" /></a>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
    <div class="internships_sec recruiter_sec fw" id="internships_id">
      <div class="lgcontainer">
        <div class="innerrow">
          <div class="col_grid12 arrowheading_site recruiterGreenText bdrCntr">
            <h3>It’s easy to hire the <span class="btm_bdrleanding">best candidate </span> for the job!</h3>
          </div>
        </div>
        <div class="recruiter_box fw">
          <div class="innerrow ">
            <div class="col_grid4 leftrecruiter_img text-left colgridLeft">
              <figure class="recruiter_imgBox leftimgBox">
                <img src="{{ asset('public/assets/images/rl_post_a_job.png')}}" alt="icon" />
              </figure>
            </div>
            <div class="col_grid8 rightrecruiter_text text-right">
              <h3 class="clrred bukhariSrptfont_fmly">Post a job</h3>
              <p class=" clrBlack">Tell us about your role and we'll reach out to the right candidates.</p>
            </div>
          </div>
        </div>
        <div class="recruiter_box fw">
          <div class="innerrow ">
            <div class="col_grid4 leftrecruiter_img text-left colgridRight">
              <figure class="recruiter_imgBox rightimgBox">
                <img src="{{ asset('public/assets/images/rl_review_candidate.png')}}" alt="icon" />
              </figure>
            </div>
            <div class="col_grid8 rightrecruiter_text text-right">
              <h3 class="clrred bukhariSrptfont_fmly">Review candidates</h3>
              <p class=" clrBlack">Browse profiles, shortlist and reject with a simple click.</p>
            </div>
          </div>
        </div>
        <div class="recruiter_box fw">
          <div class="innerrow ">
          <div class="col_grid4 leftrecruiter_img text-left colgridLeft">
            <figure class="recruiter_imgBox leftimgBox">
              <img src="{{ asset('public/assets/images/rl_send_direct_email.png')}}" alt="icon" />
            </figure>
          </div>
          <div class="col_grid8 rightrecruiter_text text-right">
            <h3 class="clrred bukhariSrptfont_fmly">Send direct email</h3>
            <p class=" clrBlack">Reach out directly on the platform or on email to the best candidates for the internship.</p>
          </div>
          </div>
        </div>
        <div class="recruiter_box fw">
          <div class="innerrow ">
            <div class="col_grid4 leftrecruiter_img text-left colgridRight">
              <figure class="recruiter_imgBox rightimgBox">
                <img src="{{ asset('public/assets/images/rl_hire_candidate.png')}}" alt="icon" />
              </figure>
            </div>
            <div class="col_grid8 rightrecruiter_text text-right">
              <h3 class="clrred bukhariSrptfont_fmly">Hire candidate</h3>
              <p class=" clrBlack">Make the process downright simple and convenient.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="internships_sec fw">
      <div class="lgcontainer">
        <div class="innerrow">
          <div class="col_grid12 arrowheading_site recruiterGreenText ">
            <h3><span class="btm_bdrleanding">Find an intern </span> for every function in your company!</h3>
          </div>
          <div class="col_grid4">
            <div class="internships_img_box">
              <figure>
                <img src="{{ asset('public/assets/images/detialicon2.png')}}" alt="icon1">
              </figure>
              <h4>Digital Marketing</h4>
            </div>
          </div>
          <div class="col_grid4">
            <div class="internships_img_box">
              <figure>
                <img src="{{ asset('public/assets/images/detialicon6.png')}}" alt="icon1">
              </figure>
              <h4>Human Resources</h4>
            </div>
          </div>
          <div class="col_grid4">
            <div class="internships_img_box">
              <figure>
                <img src="{{ asset('public/assets/images/detialicon1.png')}}" alt="icon1">
              </figure>
              <h4>Information Technology</h4>
            </div>
          </div>
          <div class="col_grid4">
            <div class="internships_img_box">
              <figure>
                <img src="{{ asset('public/assets/images/detialicon5.png')}}" alt="icon1">
              </figure>
              <h4>Banking & Finance</h4>
            </div>
          </div>
          <div class="col_grid4">
            <div class="internships_img_box">
              <figure>
                <img src="{{ asset('public/assets/images/detialicon4.png')}}" alt="icon1">
              </figure>
              <h4>Sales & Marketing</h4>
            </div>
          </div>
          <div class="col_grid4">
            <div class="internships_img_box">
              <figure>
                <img src="{{ asset('public/assets/images/detialicon3.png')}}" alt="icon1">
              </figure>
              <h4>Hospitality & Tourism</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="fw">
      <div class="lgcontainer">
        <ul class="footer_menu col_grid7 text-left">
         <li><a href="{{ URL::to('aboutus')}}">About Us</a></li>
          <li><a href="{{ URL::to('contactus')}}">Contact Us</a></li>
          <li><a href="{{ URL::to('termsofuse')}}">Terms of Use</a></li>
          <li><a href="{{ URL::to('privacypolicy')}}">Privacy Policy</a></li>
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
    <script src="{{ asset('public/assets/web_assets/js/commen-hd.js')}}"></script>
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
$(document).ready(function(){
    $('.header li a').click(function(){
      $('.header li a').removeClass("active");
      $(this).addClass("active");
  });
  });
 </script>
  </body>
</html>
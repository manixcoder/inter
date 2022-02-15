<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>internify - Blog</title>
  <!-- Fontawesome 4 Cdn from BootstrapCDN -->
  <link rel="icon" type="image/png" href="{{ URL::asset('/public/uploads/favicon.jpeg') }}"/>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="{{ asset('public/assets/web_assets/css/style.css')}}" rel="stylesheet">
  <link href="{{ asset('public/assets/web_assets/fonts/fonts.css')}}" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

  <!-- Readmore script -->
  <script>
    function AddReadMore() {
      //This limit you can set after how much characters you want to show Read More.
      var carLmt = 500;
      // Text to show when text is collapsed
      var readMoreTxt = " ... Read More";
      // Text to show when text is expanded
      var readLessTxt = " Read Less";

      //Traverse all selectors with this class and manupulate HTML part to show Read More
      $(".addReadMore").each(function() {
        if ($(this).find(".firstSec").length)
          return;

        var allstr = $(this).text();
        if (allstr.length > carLmt) {
          var firstSet = allstr.substring(0, carLmt);
          var secdHalf = allstr.substring(carLmt, allstr.length);
          var strtoadd = firstSet + "<span class='SecSec'>" + secdHalf + "</span><span class='readMore'  title='Click to Show More'>" + readMoreTxt + "</span><span class='readLess' title='Click to Show Less'>" + readLessTxt + "</span>";
          $(this).html(strtoadd);
        }

      });
      //Read More and Read Less Click Event binding
      $(document).on("click", ".readMore,.readLess", function() {
        $(this).closest(".addReadMore").toggleClass("showlesscontent showmorecontent");
      });
    }
    $(function() {
      //Calling function after Page Load
      AddReadMore();
    });
  </script>
  <style>
    .addReadMore.showlesscontent .SecSec,
    .addReadMore.showlesscontent .readLess {
      display: none;
    }

    .addReadMore.showmorecontent .readMore {
      display: none;
    }

    .addReadMore .readMore,
    .addReadMore .readLess {
      font-weight: bold;
      margin-left: 2px;
      color: blue;
      cursor: pointer;
    }

    .addReadMoreWrapTxt.showmorecontent .SecSec,
    .addReadMoreWrapTxt.showmorecontent .readLess {
      display: block;
    }
  </style>
</head>

<body class="">
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
              <li><a href="{{ URL::to('/') }}">Home</a></li>
              <li class="active"><a href="{{ URL::to('blog') }}">Blogs</a></li>
            </div>
            <div class="center_sec text-center col_grid4 menu_logo">
              <a href="{{ URL::to('/') }}">
                <img src="{{ asset('public/assets/images/header-logo.svg')}}" alt="logo" />
                <img src="{{ asset('public/assets/images/logo.svg')}}" alt="wht-logo" class="wth-logo-hide" />
              </a>
              </li>
            </div>
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
          <a href="{{ URL::to('/') }}" class="logo-flow2">
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
              <li>
                <a href="{{ URL::to('/') }}">Home </a>
              </li>
              <li class="active">
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
  <div class="body_wht-inners ">
    <div class="small_contaner blogcontainer">
      <div class="findblog_search blogView_search fw">
        <form action="{{ url('blogsearch') }}" method="POST" id="FormValidation" enctype="multipart/form-data">
          @csrf
          <div class="from-group">
            <div class="input-icon">
              <i><img src="{{ asset('public/assets/images/searchIcon.png')}}" alt="icon"></i>
              <input class="form-control" type="text" name="search" placeholder="Find Blogs" value="{{ $searchinput ?? ''}}" required="">
            </div>
            <div class="btn_group">
              <button type="submit" class="input-btn">Search</button>
            </div>
          </div>
        </form>
      </div>
      @if(isset($Data))
      @foreach($Data as $value)
      @php $createdby = DB::table('users')->where('id', $value->created_by)->first(); @endphp
      <div class="content-group fw">
        <div class="text-cont fw">
          <h3 class="nrml-heading">
            {{ $value->blog_heading ?? ''}}
          </h3>
          <p class="site-pra addReadMore showlesscontent">
            <?php echo $value->description ?>
          </p>
        </div>
        <div class="img-cont fw">
          <figure class="full-img">
            <img src="{{ URL::asset('/public/uploads/') }}/{{ $value->blog_image }}" alt="img1" />
          </figure>
        </div>
        <div class="admin-date-box fw">
          <span class="gary-small-text text-left col_grid6">Posted on :<span>{{date('d M Y | H:i'  , strtotime($value->created_at))}}</span></span>
          <span class="gary-small-text text-right col_grid6">Posted by :<span>{{ $createdby->name ?? ''}}</span></span>
        </div>
      </div>
      @endforeach
      @else
      <p>Data not found.!</p>
      @endif
    </div>
    <div class="login_blogWapper_fw fw">
      <div class="loginBGRED_sec blogLogin_fullwidth">
        <div class="login_wapper">
          <div class="login_contbox">
            <div class="logo_img fw">
              <a href="{{ URL::to('/')}}">
                <img src="{{ asset('public/assets/images/logo.svg') }}" alt="logo">
              </a>
            </div>
            <form action="{{ URL::to('web-login-dashboard') }}" method="POST" class="welcome_cont fw" id="signup-form" enctype="multipart/form-data">
              @csrf
              <h3>Welcome!</h3>
              <div class="innerrow">
                <div class="col_grid8">
                  <h5>Login to Internify </h5>
                </div>
                <div class="text-right col_grid4">
                  <button type="submit" class="input-btn">Login <span><img src="{{ asset('public/assets/images/logininput_right.png') }}" class="wht-icon" alt="icon"></span><span><img src="{{ asset('public/assets/images/arrow_right_red.png') }}" class="none-img redimg-arrow" alt="icon" ></span></button>
                </div>
              </div>
              <div class="from-group fw">
                <input type="text" name="email" placeholder="Enter your registered email address" class="form-control" required>
              </div>
              <div class="from-group innerbtn fw">
                <input type="password" name="password" placeholder="Enter your password" class="form-control" required>
                <span class="froget_btn">
                  <a href="{{URL::to('web-forgot-password')}}" class="textbtn_green">Forgot password</a>
                </span>
              </div>
              <div class="social_login bloglogin_icon fw">
                <h4><span><a href="./home-pg.html">Or Login With</a></span></h4>
                <ul class="social_icon fw">
                  <ul class="social_icon fw">
                    <li><a href="https://www.facebook.com/Theinternify" class="login_icon"><img src="{{ asset('public/assets/images/login_facebook.png') }}" alt="icon"></a></li>
                    <li><a href="https://www.linkedin.com/company/the-internify/" class="login_icon"><img src="{{ asset('public/assets/images/login_linkedin.png') }}" alt="icon"></a></li>
                    <!-- <li><a href="#" class="login_icon"><img src="{{ asset('public/assets/images/login_google.png') }}" alt="icon"></a></li> -->
                  </ul>
                </ul>
                 <h5>Don't have an account ? <a href="{{URL::to('student-register-step-one')}}" class="textbtn_green">Register now</a></h5>
              </div>
              <!-- <div class="footer_login fw">
                <h5>By logging in, you agree to our <a href="{{URL::to('termsofuse')}}" class="textbtn_green">terms and conditions</a> as well as our <a href="{{URL::to('privacypolicy')}}" class="textbtn_green">privacy policy</a></h5>
              </div> -->
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="se-pre-con"></div>
  <script src="{{ asset('public/assets/web_assets/js/jquery-lb.js')}}"></script>
  <script src="{{ asset('public/assets/web_assets/js/commen-hd.js')}}"></script>

  <script>
      $(window).on('load', function(){
       $('.se-pre-con').delay(1500).fadeOut('slow');
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
  </script>
  <script>
    $(' .menu_right li').click(function() {
      $(' .menu_right li').removeClass('active');
      $(this).addClass('active');
    });
  </script>
  <script>
    $(document).ready(function() {
      $(' .menu_right li').click(function() {
        $(' .menu_right li').removeClass('active');
        $(this).addClass('active');
      });
      $(' .profileTab li').click(function() {
        $(' .profileTab li').removeClass('active');
        $(this).addClass('active');
      });
    });
  </script>
</body>

</html>
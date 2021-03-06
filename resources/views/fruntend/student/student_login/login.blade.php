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

<body class="">
  <div class="loginBGRED_sec forgot_pass_pg">
    <div class="login_wapper">
      <div class="login_contbox digitcode_sec reset_password">
        <div class="logo_img fw">
          <a href="{{URL::to('/')}}">
            <img src="{{ asset('public/assets/images/logo.svg') }}" alt="logo">
          </a>
        </div>
        <form action="{{ url('student_logged_in') }}" method="POST" enctype="multipart/form-data" class="welcome_cont fw">
          <h3>Welcome!</h3>
          <div class="innerrow">
            @csrf
            <div class="col_grid8">
              <h5>Login to Internify </h5>
            </div>
            <div class="text-right col_grid4">
              <button type="submit" class="input-btn">Login
                <span>
                  <img src="{{ asset('public/assets/images/logininput_right.png')}}" class="wht-icon" alt="icon">
                </span>
                <span>
                  <img src="{{ asset('public/assets/images/arrow_right_red.png')}}" class="none-img redimg-arrow" alt="icon">
                </span>
              </button>
            </div>
          </div>
          @if(Session::has('error_msg'))
          <div class="col_grid8" style="color:red">
            {{ Session::get('error_msg') }}
          </div>
          @endif
          <div class="from-group fw">
            <input type="email" name="email" placeholder="Enter your registered email address" class="form-control" required>
          </div>
          <div class="from-group innerbtn fw">
            <input type="password" name="password" placeholder="Enter your password" class="form-control" required>
            <span class="froget_btn">
              <a href="{{url('web-forgot-password')}}" class="textbtn_green">Forgot password</a>
            </span>
          </div>
          <div class="social_login bloglogin_icon fw">
            <h4><span><a href="./home-pg.html">Or Login With</a></span></h4>
            <ul class="social_icon fw">
              <ul class="social_icon fw">
                <li>
                  <a href="{{ route('facebook.login') }}" class="login_icon">
                    <img src="{{ asset('public/assets/images/login_facebook.png')}}" alt="icon">
                  </a>

                  <!-- <a href="https://www.facebook.com/Theinternify" class="login_icon">
                    <img src="{{ asset('public/assets/images/login_facebook.png')}}" alt="icon">
                  </a> -->
                  
                </li>
                <li>
                <a href="{{ route('linkedin.login') }}" class="login_icon">
                    <img src="{{ asset('public/assets/images/login_linkedin.png')}}" alt="icon">
                  </a>
                  <!-- <a href="https://www.linkedin.com/company/the-internify/" class="login_icon">
                    <img src="{{ asset('public/assets/images/login_linkedin.png')}}" alt="icon">
                  </a> -->
                </li>
                <li>
                <!-- <a href="{{ route('google.login') }}" class="login_icon">
                    <img src="{{ asset('public/assets/images/login_google.png')}}" alt="icon">
                  </a> -->
                  <!-- a href="https://open.spotify.com/user/64p2h14btruk2aydbijnajk9o" class="login_icon">
                    <img src="{{ asset('public/assets/images/login_google.png')}}" alt="icon">
                  </a-->
                </li>
              </ul>
            </ul>
            <h5>
              Don't have an account ?
              <a href="{{URL::to('student-register-step-one')}}" class="textbtn_green">
                Register now
              </a>
            </h5>
          </div>
          <div class="footer_login fw">
            <h5>
              By logging in, you agree to our 
              <a href="{{url('termsofuse')}}" class="textbtn_green">
                terms and views
              </a> 
              as well as our <a href="{{url('privacypolicy')}}" class="textbtn_green">privacy policy</a></h5>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- <div class="se-pre-con"></div> -->
  <script src="{{ asset('public/assets/web_assets/js/jquery-lb.js')}}"></script>

  <script>
      $(window).on('load', function(){
       $('.se-pre-con').delay(1500).fadeOut('slow');
     });
   </script>
</body>

</html>
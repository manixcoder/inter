<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>internify - Login</title>
  <!-- Fontawesome 4 Cdn from BootstrapCDN -->
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="{{ asset('public/assets/web_assets/css/style.css')}}" rel="stylesheet">
  <link href="{{ asset('public/assets/web_assets/fonts/fonts.css')}}" rel="stylesheet">
  <script src="{{ asset('public/assets/js/jequery-main3.5.js')}}"></script>
  <script src="{{ asset('public/js/commonjs.js')}}"></script>
  <!-- CSS only -->

</head>

<body class="">
  <div class="loginBGRED_sec">
    <div class="login_wapper">
      <div class="login_contbox">
        <div class="logo_img fw">
          <a href="{{URL::to('/')}}"><img src="{{ asset('public/assets/images/logo.svg')}}" alt="logo"></a>
          <h1 class="message" style="color:#fff">@if(isset($message)){{$message}}@endif</h1>
        </div>

        <form action="{{ URL::to('web-login-dashboard') }}" method="POST" class="welcome_cont fw" id="signup-form" enctype="multipart/form-data">
          @csrf
          <h3>Welcome there!</h3>
          <div class="innerrow">
            <div class="col_grid8">
              <h5>Login to Internify </h5>
              @if(Session::has('error_msg'))
              <span class="message" style="color:white;">{{ Session::get('error_msg') }} </span>
              @endif
            </div>

            @if(Session::has('success_msg'))
            <div class="col_grid8" style="color: black;">
              {{ Session::get('success_msg') }}
            </div>
            @endif

            @if (isset($alert))
            <div class="alert alert-success" style="color:white">
              <p>{{$alert ?? ''}}</p>
            </div>
            @endif

            @if(Session::has('success'))
            <div class="popupWapper">
              <div class="modal cPassword_update_popup open" id="cPassword_update">
                <div class="close fw">
                  <a class="btn close-modal" data-modal="#cPassword_update" href="#">
                    <img src="{{ asset('public/assets/images/close.png')}}" alt="icon">
                  </a>
                </div>
                <div class="content fw">
                  <div class="password_update_sec fw">
                    <figure class="fw">
                      <img src="images/succcessfull.png" alt="icon">
                    </figure>
                    <h3>{{ Session::get('success') }}</h3>
                  </div>
                </div>
              </div>
            </div>
            @endif
            <div class="text-right col_grid4">
              <button type="submit" id="btnValidate" class="input-btn">Login
                <span>
                  <img src="{{ asset('public/assets/images/logininput_right.png')}}" class="wht-icon" alt="icon">
                </span>
                <span>
                  <img src="{{ asset('public/assets/images/arrow_right_red.png')}}" class="none-img redimg-arrow" alt="icon">
                </span>
              </button>
            </div>
          </div>
          <div class="from-group fw">
            <input type="text" name="email" id="txtEmail" placeholder="Enter your registered email address" class="test form-control" maxlength="100" size="100" required maxlength="50">

            <span style="display:none; color: #ffffff;" class="emailvalidation">Enter valid email address.!</span>
            <span style="display:none; color: #ffffff;" class="emailvalidation1">Please Enter email address.!</span>
          </div>
          <div class="from-group innerbtn fw">
            <input type="password" name="password" placeholder="Enter your password" class="form-control" maxlength="100" size="100" required maxlength="50">
            <span class="froget_btn">
              <a href="{{URL::to('web-forgot-password')}}" class="textbtn_green">Forgot password</a>
            </span>
          </div>
          <div class="social_login bloglogin_icon fw">
            <h4><span>Or Login With</span></h4>
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
                  <!-- <a href="https://www.linkedin.com/company/the-internify/ " class="login_icon">
                    <img src="{{ asset('public/assets/images/login_linkedin.png')}}" alt="icon">
                  </a> -->
                </li>
                <li>
                  <a href="{{ route('google.login') }}" class="login_icon">
                    <img src="{{ asset('public/assets/images/login_google.png')}}" alt="icon">
                  </a> 

                  <!-- <a href="https://open.spotify.com/user/64p2h14btruk2aydbijnajk9o" class="login_icon">
                    <img src="{{ asset('public/assets/images/login_google.png')}}" alt="icon">
                  </a> -->
                </li>
              </ul>
            </ul>
           
            <h5>Don't have an account ? <a href="{{URL::to('recruiter-register-step-one')}}" class="textbtn_green">Register now</a></h5>
          </div>
          <div class="footer_login fw">
            <h5>By logging in, you agree to our <a href="{{URL::to('termsofuse')}}" class="textbtn_green">terms and conditions</a> as well as our <a href="{{URL::to('privacypolicy')}}" class="textbtn_green">privacy policy</a></h5>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="{{ asset('public/assets/web_assets/js/jquery-lb.js')}}"></script>
  <script src="{{ asset('public/assets/web_assets/js/commen-hd.js')}}"></script>  
  <script type="text/javascript">
    setTimeout(function() {
      $(".alert").fadeOut(1500);
    }, 5000);
  </script>
  <script type="text/javascript">
    $(document).ready(function(e) {
      setTimeout(function() {
        $('.message').hide();
      }, 5000);
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function(e) {
      $('#btnValidate').click(function() {
        var sEmail = $('#txtEmail').val();
        if ($.trim(sEmail).length == 0) {
          $('.emailvalidation1').show();
          setTimeout(function() {
            $('.emailvalidation1').hide();
          }, 3000);
          return false;
        }
        if (validateEmail(sEmail)) {} else {
          $('.emailvalidation').show();
          setTimeout(function() {
            $('.emailvalidation').hide();
          }, 3000);


          return false;
        }
      });
    });

    function validateEmail(sEmail) {
      var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
      if (filter.test(sEmail)) {
        return true;
      } else {
        return false;
      }
    }
  </script>
</body>

</html>
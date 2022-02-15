<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>internify - Login</title>
    <!-- Fontawesome 4 Cdn from BootstrapCDN -->
    <link rel="icon" type="image/png" href="{{ URL::asset('/public/uploads/favicon.jpeg') }}"/>
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
              <img src="{{ asset('public/assets/images/logo.svg')}}" alt="logo">
            </a>
          </div>
          <form class="welcome_cont regstepone-sec fw" action="{{ url('recruider_register_step_one') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="innerrow">
              <div class="col_grid12 digitcode">
                <h5>1 <i><img src="{{ asset('public/assets/images/logininput_right.png')}}" alt="icon"></i> Okay! What's your name? </h5>
              </div>
            </div>
            <div class="from-group fw">
              <input type="hidden" name="setep_one" value="setep_one">
              <input type="text" name="name" class="form-control" placeholder="Enter your full name" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required="" maxlength="50"/>
            </div>
            <div class="text-right fw continue_topbtn">
              <span class="pull-right btn_continue">
                <button type="submit" class="input-btn">Continue <span><img src="{{ asset('public/assets/images/logininput_right.png')}}" class="wht-icon" alt="icon"></span><span><img src="{{ asset('public/assets/images/arrow_right_red.png')}}" class="none-img redimg-arrow" alt="icon" ></span></button>
              </span>
            </div>
            <div class="footer_login extramrtop fw">
              <h5>By registering, you agree to our  <a href="{{URL::to('termsofuse')}}" class="textbtn_green">terms and conditions</a> as well as our <a href="{{URL::to('privacypolicy')}}" class="textbtn_green">privacy policy</a></h5>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="se-pre-con"></div>
  <script src="{{ asset('public/assets/web_assets/js/jquery-lb.js')}}"></script>

  <script>
      $(window).on('load', function(){
       $('.se-pre-con').delay(1500).fadeOut('slow');
     });
   </script>
  </body>
</html>
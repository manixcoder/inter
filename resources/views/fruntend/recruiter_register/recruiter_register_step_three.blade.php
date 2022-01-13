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
    <script src="{{ asset('public/assets/js/jequery-main3.5.js')}}"></script> 
    <script src="{{ asset('public/js/commonjs.js')}}"></script> 
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
           <form class="welcome_cont fw" action="{{ url('recruider_register_step_one') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="innerrow">
              <div class="col_grid12 digitcode">
                <h5>3 <i><img src="{{ asset('public/assets/images/logininput_right.png') }}" alt="icon"></i> Great! What's your role at your company? </h5>
              </div>
            </div>
            <div class="from-group fw">
              <input type="hidden" name="recruiterid" value="{{ $insertid ?? ''}}">
              <input type="hidden" name="setep_three" value="setep_three">
              <input type="text" name="designation" placeholder="Enter your designation" class="form-control" required onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required="" maxlength="100">
              
            </div>
            <div class="text-right fw continue_topbtn">
              <span class="continue_text pull-left">Just press "Enter " to continue</span>
              <span class="pull-right btn_continue">
                <button type="submit" class="input-btn">Continue <span><img src="{{ asset('public/assets/images/logininput_right.png')}}" class="wht-icon" alt="icon"></span><span><img src="{{ asset('public/assets/images/arrow_right_red.png')}}" class="none-img redimg-arrow" alt="icon" ></span></button>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="{{ asset('public/assets/web_assets/js/jquery-lb.js')}}"></script>
    
    
  </body>
</html>
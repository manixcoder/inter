<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Internify - Login</title>
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
        <form class="welcome_cont fw" action="{{ url('student_register_step_one') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="innerrow">
            <div class="col_grid12 digitcode">
              <h5>
                7
                <i>
                  <img src="{{ asset('public/assets/images/logininput_right.png')}}" alt="icon">
                </i>
                Amazing! Now, create your password.
              </h5>
            </div>
          </div>
          <div class="from-group fw">
            <input type="hidden" name="recruiterid" value="{{ $insertid ?? ''}}">
            <input type="hidden" name="setep_seven" value="setep_seven">
            <input type="password" name="password" class="form-control" required maxlength="10">
          </div>
          <div class="text-right fw continue_topbtn">
            <span class="continue_text pull-left">Just press "Enter " to continue</span>
            <span class="pull-right btn_continue">
              <button type="sumbit" class="input-btn">Continue <span><img src="{{ asset('public/assets/images/logininput_right.png')}}" class="wht-icon" alt="icon"></span><span><img src="{{ asset('public/assets/images/arrow_right_red.png')}}" class="none-img redimg-arrow" alt="icon"></span></button>
            </span>
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
  


  <script type="text/javascript">
    $(document).ready(function() {
          $('#password').keyup(function() {
            $('#result').html(checkStrength($('#password').val()))
          })
          function checkStrength(password) { 
            //initial strength var strength = 0 //if the password length is less than 6, return message. if (password.length < 6) { $('#result').removeClass() $('#result').addClass('short') return 'Too short' } //length is ok, lets continue. //if length is 8 characters or more, increase strength value if (password.length > 7) strength += 1 //if password contains both lower and uppercase characters, increase strength value if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1 //if it has numbers and characters, increase strength value if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1 //if it has one special character, increase strength value if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1 //if it has two special characters, increase strength value if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,",%,&,@,#,$,^,*,?,_,~])/)) strength += 1 //now we have calculated strength value, we can return messages //if value is less than 2 if (strength < 2 ) { $('#result').removeClass() $('#result').addClass('weak') return 'Weak' } else if (strength == 2 ) { $('#result').removeClass() $('#result').addClass('good') return 'Good' } else { $('#result').removeClass() $('#result').addClass('strong') return 'Strong' } } });

            Read more: http: //mrbool.com/how-to-validate-password-strength-using-jquery/26760#ixzz764uN7seU
  </script>
  </body>

</html>
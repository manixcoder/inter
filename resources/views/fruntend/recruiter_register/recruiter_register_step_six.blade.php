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
           <form class="welcome_cont regstepfive-sec fw" action="{{ url('recruider_register_step_one') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="innerrow">
              <div class="col_grid12 digitcode">
                <h5>6 <i><img src="{{ asset('public/assets/images/logininput_right.png') }}" alt="icon"></i> Awesome! What’s your company’s official email address? </h5>
              </div>
            </div>
            <div class="from-group fw">
              <input type="hidden" name="recruiterid" value="{{ $insertid ?? ''}}">
              <input type="hidden" name="setep_six" value="setep_six">
              <input type="text" name="email" id='txtEmail' placeholder="Enter official email address" class="email form-control" required>
              <span style="display:none; color: #ffffff;" class="emailvalidation">Enter valid email address.!</span>
              <span style="display:none; color: #ffffff;" class="emailvalidation1">Please Enter email address.!</span>

              @if(isset($error))
              <span class="hidesec" style="color:white;">This email is already registered.</span>
              @endif
            </div>
            <div class="text-right fw continue_topbtn">
              <span class="pull-right btn_continue">
                <button type="submit" id='btnValidate' class="input-btn">Continue <span><img src="{{ asset('public/assets/images/logininput_right.png')}}" class="wht-icon" alt="icon"></span><span><img src="{{ asset('public/assets/images/arrow_right_red.png')}}" class="none-img redimg-arrow" alt="icon" ></span></button>
              </span>
            </div>
          </div>
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
    
    <script type="text/javascript">        
      $(document).ready(function(e) {
        $('#btnValidate').click(function() {
            var sEmail = $('#txtEmail').val();
            if ($.trim(sEmail).length == 0) {
                $('.emailvalidation1').show();
                setTimeout(function () {
                  $('.emailvalidation1').hide();
                }, 3000);
                return false;
            }
            if (validateEmail(sEmail)) {              
            }
            else {
              $('.emailvalidation').show();
              setTimeout(function () {
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
        }
        else {
          return false;
        }
    }              
</script>

    <script type="text/javascript">
      $(document).ready(function() {
        setTimeout(function() {
          $('.hidesec').hide();
        }, 5000); // milliseconds
      });
    </script> 
  </body>
</html>
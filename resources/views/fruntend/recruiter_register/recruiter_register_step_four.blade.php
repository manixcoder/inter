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
  <body class="">
    
    <div class="loginBGRED_sec forgot_pass_pg">
      <div class="login_wapper">
        <div class="login_contbox digitcode_sec reset_password">
          <div class="logo_img fw">
             <a href="{{URL::to('/')}}">
               <img src="{{ asset('public/assets/images/logo.svg')}}" alt="logo">
              </a>
          </div>
          <form class="welcome_cont fw" action="{{ url('recruider_register_step_one') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="innerrow">
              <div class="col_grid12 digitcode">
                <h5>4 <i><img src="{{ asset('public/assets/images/logininput_right.png') }}" alt="icon"></i> Cool! Attach your organization’s logo.</h5>
              </div>
            </div>
            <div class="from-group fw">
              <div class="organization_logo">
                <div class="upload_logo">
                  <input type="hidden" name="recruiterid" value="{{ $insertid ?? ''}}">
                  <input type="hidden" name="setep_four" value="setep_four">
                  <input type="file" name="image" required="" onchange="loadFile(event)">
                  <figure><img src="{{ asset('public/assets/images/uploadgreen.png') }}" id="output" alt="uploadgreen"></figure>
                  <p>Organization Logo</p>
                </div>
              </div>
            </div>
            <div class="text-right fw continue_topbtn">
              <span class="continue_text pull-left">Just press "Enter " to continue</span>
              <span class="pull-right btn_continue">
                <button type="sumbit"  class="input-btn">Continue <span><img src="{{ asset('public/assets/images/logininput_right.png')}}" class="wht-icon" alt="icon"></span><span><img src="{{ asset('public/assets/images/arrow_right_red.png')}}" class="none-img redimg-arrow" alt="icon" ></span></button>
              </span>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="js/jquery-lb.js"></script>
    <script>
      var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
          URL.revokeObjectURL(output.src) // free memory
        }
      };
    </script>
   
  </body>
</html>
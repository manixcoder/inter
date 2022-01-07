<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>internify - Verification Code</title>
    <!-- Fontawesome 4 Cdn from BootstrapCDN -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('public/assets/web_assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('public/assets/web_assets/fonts/fonts.css')}}" rel="stylesheet">
    <script src="jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
    
    <div class="loginBGRED_sec forgot_pass_pg profileheader Verification-codenew">
      <div class="login_wapper">
        <div class="login_contbox digitcode_sec">
          <div class="logo_img fw">
            <a href="{{URL::to('/')}}">
              <img src="{{ asset('public/assets/images/logo.svg')}}" alt="logo">
            </a>
          </div>
          <form action="{{URL::to('web/otp/verify')}}" method="post" class="welcome_cont fw">
              {{csrf_field()}} 
              <div class="welcome_cont verificationBlog fw">
                <h3>Verification</h3>
                <div class="innerrow">
                  <div class="col_grid8 digitcode">
                    <h5>We’ve sent a 4-digit code to </h5>
                    <h3><a href="#">{{ $email ?? '' }}</a></h3>
                  </div>
                  <div class="text-right col_grid4">
                       
                  
                    <button type="submit" id="btnValidate" class="input-btn">Verify <span><img src="{{ asset('public/assets/images/logininput_right.png')}}" alt="icon"></span></button>
                   
                  </div>
                </div>
                <div class="from-group fw">
                  <input type="hidden" name="email" value="{{ $email ?? '' }}">
                  <input type="text" name="otp" onkeyup="this.value=this.value.replace(/[^\d]/,'')" placeholder="Enter 4 digit otp" class="form-control" required maxlength="4" minlength="10"> 
                   @if (isset($alert))
                      <div class="alert alert-success" style="color:white">
                          <p>{{$alert ?? ''}}</p>
                      </div>
                    @endif
                </div>
                
              </div>
            </form>
        </div>
      </div>
    </div>
    <script src="js/jquery-lb.js"></script>
     <script type="text/javascript">        
      setTimeout(function() {
        $(".alert").fadeOut(1500);
      }, 5000);      
    </script>
  </body>
</html>
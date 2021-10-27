<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{ asset('public/assets/js/jequery-main3.5.js')}}"></script>    
    <link href="{{ asset('public/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/responsive.css')}}" rel="stylesheet">
    <link href="{{ asset('public/assets/fonts/fonts.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Verification OTP</title>         
  </head>
                                                                                                                                                                                                        
  <body class="login_page registered_page">
                                                                                                                                                                                
    <div class="container">
        <div class="logo">                                                                                               
          <a href="#"><img src="./images/login_logo.png" alt="login_logo"></a>
        </div>                                          

        <div class="login-item">                                            
          <form action="{{ URL('')}}" method="post" class="form-login">
            {{csrf_field()}}
            <input type="hidden" name="email" value="{{ $email }}">
            <h3>Verification</h3> 
            <div class="form-field">                                           
              <input id="Enter-otp" type="text" class="form-input" placeholder="Enter OTP" required>
            </div>   
            <div class="form-field">
              <button>Verify</button>
            </div>
          </form>
        </div>

    </div>


   <!-- Optional JavaScript; choose one of the two! -->
   <script src="js/jequery-main3.5.js"></script>
   <script src="js/aos.js"></script>
  </body>
</html>
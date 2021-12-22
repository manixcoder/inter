<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('public/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/responsive.css')}}" rel="stylesheet">
    <link href="{{ asset('public/assets/fonts/fonts.css')}}" rel="stylesheet">
    <script src="{{ asset('public/assets/js/jequery-main3.5.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
    <title>Forgot Password</title>         
  </head>
                                                                                                                                                                                                        
  <body class="login_page registered_page">                                         
    <div class="container">
      <div class="logo">                                                                                               
        <a href="{{ URL::to('/') }}"><img src="{{ asset('public/assets/images/login_logo.png')}}" alt="login_logo"></a>
      </div>                                          

      <div class="login-item">                                            
        <form action="{{URL('forgot_password')}}" method="post" class="form-login">
          {{csrf_field()}}            
          <h3>Forgot Password</h3> 
          
          <div class="form-field">                                           
            <input id="registered" type="email" name="email" class="form-input" placeholder="Enter Registered Email Address" required>
          </div>
          @if (session('alert'))
            <div class="alert alert-success">
              {{ session('alert') }}
            </div>
          @endif   
          <div class="form-field">
            <button type="submit">Send Me OTP</button>              
          </div>
        </form>
      </div>
    </div>

    <script type="text/javascript">        
      setTimeout(function() {
        $(".alert").fadeOut(1500);
      }, 5000);      
    </script>

   <!-- Optional JavaScript; choose one of the two! -->
   <script src="js/aos.js"></script>
  </body>
</html>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('public/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/responsive.css')}}" rel="stylesheet">
    <link href="{{ asset('public/assets/fonts/fonts.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{ asset('public/assets/js/jequery-main3.5.js')}}"></script>
    <title>internify</title>         
  </head>
                                                                                                                                                                                                        
  <body class="login_page registered_page">
                                                                                                                                                                                
    <div class="container">
        <div class="logo">                                                                                               
          <a href="#"><img src="{{ asset('public/assets/images/login_logo.png')}}" alt="login_logo"></a>
        </div>                                          
                                                           
        <div class="login-item">                                            
          <form action="{{ URL('password_update')}}" method="post" class="form-login">
            {{csrf_field()}} 
            <h3>Reset Password</h3>                          
            <div class="form-field"> 
              <input type="hidden" name="email" value="{{ $email }}">                                          
              <input id="create-password" type="text"  class="form-input" placeholder="Create Password" minlength="8" required>
            </div>  
            <div class="form-field">                                           
              <input id="confirm-password" type="text" name="new_password" class="form-input" placeholder="Confirm Password" minlength="8" required>
            </div>                                                                                    
            <div class="form-field">
              <button id="checkpassword">Reset</button>
            </div>                                                 
          </form>
        </div>

    </div>

    <script type="text/javascript">
        $( document ).ready(function() {
            var password = document.getElementById("create-password")
          , confirm_password = document.getElementById("confirm-password");

          $("#checkpassword").click(function(){
            if(password.value != confirm_password.value) {
              confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
              confirm_password.setCustomValidity('');
            }
          });
        });

    </script>


   <!-- Optional JavaScript; choose one of the two! -->
   <script src="js/jequery-main3.5.js"></script>
   <script src="js/aos.js"></script>
  </body>
</html>
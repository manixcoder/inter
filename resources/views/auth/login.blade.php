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
      <title>Login</title>
   </head>
   <body class="login_page">
      @include('layouts.alert')            
      <div class="container">
         <div class="logo">                                                                                               
            <a href="#"><img src="{{ asset('public/assets/images/login_logo.png')}}" alt="login_logo"></a>
         </div>
         <div class="login-item">
            <form action="{{ URL::to('admin_logged_in') }}" method="post" class="test form-login">
               {{csrf_field()}}
               @if (count($errors) > 0)
               <div class="alert alert-danger">
                  <ul>
                     @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                     @endforeach
                  </ul>
               </div>
               @endif
               <h3>Admin Login</h3>
               @if (isset($alert))
               <div class="alert alert-success">
                  <p>{{$alert ?? ''}}</p>
               </div>
               @endif 
               <div class="form-field">                                           
                  <input type="email" id="txtEmail" name="email" class="form-input" placeholder="Email address" value="{{ $email ?? ''}}" required autocomplete="off">                  
               </div>
               <span style="display:none; color: #ffffff;" class="emailvalidation">Enter valid email address.!</span>
               <span style="display:none; color: #ffffff;" class="emailvalidation1">Please enter email address.!</span> 
               <div class="form-field">                                        
                  <input id="login-password" name="password" type="password" class="form-input" placeholder="Password" minlength="8" required>
               </div>
               <span style="display:none; color: #ffffff;" class="passvalidation">Please enter password.!</span>
               <div class="form-field forgot">
                  <a href="{{URL('forgot-password')}}">Forgot Password ?</a>
               </div>
               <div class="form-field">
                  <!-- <button>Login</button> -->
                  <button type="submit" id="btnValidate"> {{ __('Login') }}</button>
               </div>
            </form>
         </div>
      </div>
      <script type="text/javascript">        
         setTimeout(function() {
           $(".alert").fadeOut(1500);
         }, 5000);      
      </script>
      <script type="text/javascript">        
         $(document).ready(function(e) {
           $('#btnValidate').click(function() {
             var sEmail = $('#txtEmail').val();
             var spass = $('#login-password').val();
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
         $(document).ready(function(e) {
           $('#btnValidate').click(function() {         
             var spass = $('#login-password').val();
             if ($.trim(spass).length == 0) {  
               $('.passvalidation').show();
               setTimeout(function () {
                 $('.passvalidation').hide();
               }, 3000);
               return false;
             }           
             else {
               return true;           
             }
           });
         });                 
      </script>
      <!-- Optional JavaScript; choose one of the two! -->
      <script src="js/aos.js"></script>
   </body>
</html>
@php 

@endphp

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">   
    <link href="{{ asset('public/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/responsive.css')}}" rel="stylesheet">
    <link href="{{ asset('public/assets/fonts/fonts.css')}}" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ URL::asset('/public/uploads/favicon.jpeg') }}"/>
    <script src="{{ asset('public/assets/js/jequery-main3.5.js')}}"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Verification OTP</title>         
  </head>
                                                                                                                                                                                                        
  <body class="login_page registered_page">
                                                                                                                                                                                
    <div class="container">
        <div class="logo">                                                                                               
          <a href="{{ URL::to('/') }}"><img src="{{ asset('public/assets/images/login_logo.png')}}" alt="login_logo"></a>
        </div>                                          

        <div class="login-item">                                            
          <form action="{{ URL('otp_verify')}}" method="post" class="form-login">
            {{csrf_field()}}
            <input type="hidden" name="email" value="{{ $email ?? '' }}">
            <h3 class="text-center" style="margin-bottom:0;">Verification</h3> 
            <div class="form-field">     
                <div id="divOuter">
                     <div id="divInner">
              
              <input id="partitioned" type = "number" id="Enter-otp" name="otp" class="form-input" placeholder="" required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "4" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  onKeyPress="if(this.value.length==4) return false;"/>
                </div>
                </div>
            </div>   
            @if (isset($alert))
              <div class="alert alert-success">
                  <p>{{$alert ?? ''}}</p>
              </div>
            @endif 
            <div class="form-field">
              <button type="submit">Verify</button>
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
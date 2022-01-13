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
  <link href="{{ asset('public/assets/web_assets/css/style.css')}}" rel="stylesheet">
  <link href="{{ asset('public/assets/web_assets/fonts/fonts.css')}}" rel="stylesheet">
  <script src="jquery-3.5.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body class="">
  <div class="loginBGRED_sec forgot_pass_pg ">
    <div class="login_wapper">
      <div class="login_contbox">
        <div class="logo_img fw">
          <a href="{{URL::to('/')}}">
            <img src="{{ asset('public/assets/images/logo.svg')}}" alt="logo">
          </a>
        </div>
        <form action="{{URL::to('web/forgot/password')}}" method="post" class="welcome_cont fw">
          {{csrf_field()}}
          <h3>Forgot Password?</h3>
          <div class="innerrow">
            <div class="col_grid8">
              <h5>We'll help you to reset it</h5>
            </div>
            <div class="text-right col_grid4">
              <button type="submit" id="btnValidate" class="input-btn">Next <span><img src="{{ asset('public/assets/images/logininput_right.png')}}" alt="icon"></span></button>
            </div>
          </div>

          @if (session('alert'))
          <div class="alert alert-success" style="color:white;">
            {{ session('alert') }}
          </div>
          @endif
          <div class="from-group fw">
            <input type="email" name="email" id="txtEmail" placeholder="Enter your registered email address" class="form-control" required maxlength="50">
            <span style="display:none; color: white;" class="emailvalidation">Enter valid email address.!</span>
            <span style="display:none; color: white;" class="emailvalidation1">Please Enter email address.!</span>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="js/jquery-lb.js"></script>
  <script type="text/javascript">
    $(document).ready(function(e) {
      $('#btnValidate').click(function() {
        var sEmail = $('#txtEmail').val();
        if ($.trim(sEmail).length == 0) {
          $('.emailvalidation1').show();
          setTimeout(function() {
            $('.emailvalidation1').hide();
          }, 3000);
          return false;
        }
        if (validateEmail(sEmail)) {} else {
          $('.emailvalidation').show();
          setTimeout(function() {
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
      } else {
        return false;
      }
    }
  </script>
  <script type="text/javascript">
    setTimeout(function() {
      $(".alert").fadeOut(1500);
    }, 5000);
  </script>


</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>internify - Login</title>
  <!-- Fontawesome 4 Cdn from BootstrapCDN -->
  <link rel="icon" type="image/png" href="{{ URL::asset('/public/uploads/favicon.jpeg') }}"/>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="{{ asset('public/assets/web_assets/css/style.css')}}" rel="stylesheet">
  <link href="{{ asset('public/assets/web_assets/fonts/fonts.css')}}" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script>

  <style type="text/css">
    .has-feedback .form-control-feedback {
      top: 33px;
    }

    .validate_cus {
      color: #ffff;
      font-size: small;
    }

    label {
      display: inline-block;
      margin-bottom: 5px;
      font-weight: 700;
    }

    .top-row>div {
      float: left;
      width: 48%;
      margin-right: 4%;
    }

    .field-wrap {
      position: relative;
      margin-bottom: 20px;
    }

    input,
    textarea {
      font-size: 18px;
      display: block;
      height: 100%;
      width: 100%;
      padding: 5px 10px;
      background: none;
      background-image: none;
      border: 1px solid #a0b3b0;
      color: #545f58;
      border-radius: 6px;
      -webkit-transition: border-color .25s ease, box-shadow .25s ease;
      transition: border-color .25s ease, box-shadow .25s ease;
    }

    input:disabled {
      background: #eee;
    }

    .button:hover,
    .button:focus {
      background: #0b9444;
    }

    .button-block {
      display: block;
      width: 50%;
    }

    .button {
      border: 0;
      outline: none;
      border-radius: 20px;
      padding: 15px 0;
      font-size: 1.6rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: .1em;
      background: #187143;
      color: #ffffff;
      -webkit-transition: all 0.5s ease;
      transition: all 0.5s ease;
      -webkit-appearance: none;
    }
  </style>


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
        <form class="welcome_cont fw" action="{{ url('recruider_register_step_one') }}" method="POST" enctype="multipart/form-data" id="signup-form">
          @csrf
          <div class="innerrow">
            <div class="col_grid12 digitcode">
              <h5>7 <i><img src="{{ asset('public/assets/images/logininput_right.png')}}" alt="icon"></i> Amazing! Now, create your password. </h5>
            </div>
          </div>
          <div class="from-group fw">
            <input type="hidden" name="recruiterid" value="{{ $insertid ?? ''}}">
            <input type="hidden" name="setep_eight" value="setep_eight">
            <input type="password" id="password_reg" name="new_password" class="form-control" required maxlength="10" placeholder="Re-enter your password">
            <span class="glyphicon form-control-feedback" id="password_reg1">
          </div>
          <div class="text-right fw continue_topbtn">
            <span class="pull-right btn_continue">
              <button type="sumbit" class="input-btn">Continue <span><img src="{{ asset('public/assets/images/logininput_right.png')}}" class="wht-icon" alt="icon"></span><span><img src="{{ asset('public/assets/images/arrow_right_red.png')}}" class="none-img redimg-arrow" alt="icon"></span></button>
            </span>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="se-pre-con"></div>
  <script src="js/jquery-lb.js"></script>
  <script>
      $(window).on('load', function(){
       $('.se-pre-con').delay(1500).fadeOut('slow');
     });
   </script>  


  <script type="text/javascript">
    var value = $("#password_reg").val();

    $.validator.addMethod("checklower", function(value) {
      return /[a-z]/.test(value);
    });
    $.validator.addMethod("checkupper", function(value) {
      return /[A-Z]/.test(value);
    });
    $.validator.addMethod("checkdigit", function(value) {
      return /[0-9]/.test(value);
    });
    $.validator.addMethod("pwcheck", function(value) {
      return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) && /[a-z]/.test(value) && /\d/.test(value) && /[A-Z]/.test(value);
    });

    $('#signup-form').validate({
      rules: {
        password: {
          minlength: 6,
          maxlength: 30,
          required: true,
          //pwcheck: true,
          checklower: true,
          checkupper: true,
          checkdigit: true
        },
        confirmPassword: {
          equalTo: "#passwd_reg",
        },
      },
      messages: {
        password: {
          pwcheck: "Password is not strong enough",
          checklower: "Need atleast 1 lowercase alphabet",
          checkupper: "Need atleast 1 uppercase alphabet",
          checkdigit: "Need atleast 1 digit"
        }
      },
      highlight: function(element) {
        var id_attr = "#" + $(element).attr("id") + "1";
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        $(id_attr).removeClass('glyphicon-ok').addClass('glyphicon-remove');
        $('.form-group').css('margin-bottom', '5px');
        $('.form').css('padding', '30px 40px');
        $('.tab-group').css('margin', '0 0 25px 0');
        $('.help-block').css('display', '');
      },
      unhighlight: function(element) {
        var id_attr = "#" + $(element).attr("id") + "1";
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        $(id_attr).removeClass('glyphicon-remove').addClass('glyphicon-ok');
        $('#confirmPassword').attr('disabled', false);
      },
      errorElement: 'span',
      errorClass: 'validate_cus',
      errorPlacement: function(error, element) {
        x = element.length;
        if (element.length) {
          error.insertAfter(element);
        } else {
          error.insertAfter(element);
        }
      }

    });
  </script>



</body>

</html>
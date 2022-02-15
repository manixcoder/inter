<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>internify - Contact Us</title>
  <!-- Fontawesome 4 Cdn from BootstrapCDN -->
  <link rel="icon" type="image/png" href="{{ URL::asset('/public/uploads/favicon.jpeg') }}"/>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="{{ asset('public/assets/web_assets/css/style.css')}}" rel="stylesheet">
  <link href="{{ asset('public/assets/web_assets/fonts/fonts.css')}}" rel="stylesheet">
  <script src="jquery-3.5.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body class="">
  <header class="header_sec mobileHidesec blog_header   login-header fw">
    <div class="lgcontainer">
      <div class="innerrow">
        <div class="col_grid12">
          <ul class="nav-menu fw">
            <div class="togglebtn">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <div class="left_sec col_grid4 text-left menu_link">
              <li><a href="{{ URL::to('/') }}">Home</a></li>
              <li><a href="{{ URL::to('blog') }}">Blogs</a></li>
            </div>
            <div class="center_sec text-center col_grid4 menu_logo">
              <li>
                <a href="{{ URL::to('/') }}">
                  <img src="{{ asset('public/assets/images/header-logo.svg')}}" alt="logo" />
                  <img src="{{ asset('public/assets/images/logo.svg')}}" alt="wht-logo" class="wth-logo-hide" />
                </a>
              </li>
            </div>
            <div class="right_sec col_grid4 text-right menu_link">
              <li><a href="{{ URL::to('web-login') }}">Login</a></li>
              <li class="active"><a href="{{ URL::to('contactus') }}">Contact us</a></li>
            </div>
          </ul>
        </div>
      </div>
    </div>
  </header>
  <header class="header_sec flow2_header mobileHideShow fw">
    <div class="lgcontainer">
      <div class="innerrow">
        <div class="col_grid3">
          <a href="{{ URL::to('/') }}" class="logo-flow2">
            <img src="{{ asset('public/assets/images/logo.svg') }}" alt="logo-img" />
            <img class="hidelogo_header" src="{{ asset('public/assets/images/header-logo.svg')}}" alt="logo-img" />
          </a>
        </div>
        <div class="col_grid9 text-right">
          <div class="header_menu fw">
            <div class="togglebtn">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <ul class="menu_right">
              <li>
                <a href="{{ URL::to('/') }}">Home </a>
              </li>
              <li class="active">
                <a href="{{ URL::to('blog') }}">Blogs </a>
              </li>
              <li><a href="{{ URL::to('web-login') }}">Login</a></li>
              <li><a href="{{ URL::to('contactus') }}">Contact us</a></li>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="body_wht-inners ">
    <div class="redAbout_banner text-center contactus_banner fw">
      <div class="lgcontainer">
        <h2>Contact Us</h2>
      </div>
    </div>
    <div class="aboutCont_sec contactus_pg fw">
      <div class="lgcontainer">
        <div class="aboutCont_box fw">
          <div class="innerrow">
            <div class="adress_cont col_grid5">
              <div class="innerrow ">
                <div class="col_grid12 contect-heading">
                  <h3>Reach Out!</h3>
                </div>
              </div>
              <h4>Mumbai, India</h4>
              <ul class="adreeInfo">
                <!-- <li><a href="#"><i><img src="{{ asset('public/assets/images/c_address.png')}}" alt="icon"></i>909 Sardis Station, Minneapolis, 55402</a></li> -->
                <li><a href="mailto:contact@theinternify.com"><i><img src="{{ asset('public/assets/images/c_mail.png')}}" alt="icon"></i>contact@theinternify.com</a></li>
                <li><a href="tel:+91 9167176705"><i><img src="{{ asset('public/assets/images/c_contact_number.png')}}" alt="icon"></i>+91 9167176705</a></li>
              </ul>
              <ul class="adressFlow_social">
                <p>Follow our socials</p>
                <li><a href="https://www.facebook.com/Theinternify"><img src="{{ asset('public/assets/images/c_facebook.png')}}" alt="icon"></a></li>
                <li><a href="https://www.instagram.com/theinternify/"><img src="{{ asset('public/assets/images/c_insta.png')}}" alt="icon"></a></li>
                <li><a href="https://twitter.com/TInternify "><img src="{{ asset('public/assets/images/c_twitter.png')}}" alt="icon"></a></li>
                <li><a href="https://www.linkedin.com/company/the-internify/ "><img src="{{ asset('public/assets/images/c_linkedin.png')}}" alt="icon"></a></li>
              </ul>
            </div>
            @if(Session::has('status'))
            <div class="alert alert-{{ Session::get('status') }}">
              <i class="fa fa-building-o" aria-hidden="true"></i> {{ Session::get('message') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            @endif
            <div class="col_grid7">
              <div class="adressMap_sec pull-right">
                <form class="fw" action="{{ url('add_contactus') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group col_grid6">
                    <label>First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter your first name" required="" maxlength="50">
                    <span style="display:none; color: red;" class="f_name">Please enter first name.</span>
                  </div>
                  <div class="form-group col_grid6">
                    <label>Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter your last name" required="" maxlength="50">
                    <span style="display:none; color: red;" class="l_name">Please enter last name.</span>
                  </div>
                  <div class="form-group col_grid6">
                    <label>Mobile Number</label>
                    <!-- <input type="number" class="form-control" placeholder="Enter your mobile number" required="" maxlength="10">-->
                    <input type="text" name="mobile" id="phone" onkeyup="this.value=this.value.replace(/[^\d]/,'')" placeholder="Enter your mobile number" class="form-control" required maxlength="10" minlength="10">
                    <span style="display:none; color: red;" class="validate_phone">Please enter phone.</span>
                  </div>
                  <div class="form-group col_grid6">
                    <label>Email Address</label>
                    <input type="email" id='txtEmail' name="email" class="form-control" placeholder="Enter your email address" required="" maxlength="100">

                    <span style="display:none; color: red;" class="emailvalidation">Enter valid email address.!</span>
                    <span style="display:none; color: red;" class="emailvalidation1">Please Enter email address.!</span>
                  </div>
                  
                  <div class="form-group col_grid12 write-message">
                    <label>Write Message <span id="remainingC">(0/500)</span></label>
                    <textarea class="form-control" name="message" id="message" placeholder="Please provide any relevant details or expiation" required="" maxlength="500"></textarea>
                    <!-- <span style="display:none; color: red;" class="validate_msg">Please enter message.</span> -->
                  </div>
                  <div class="form-group col_grid12 text-center">
                    <button type="submit" id="btnValidate" class="btn btn-default">
                      <img src="{{ asset('public/assets/images/loginCheck_icon.png')}}" alt="icon" />
                      Submit
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="fw">
    <div class="lgcontainer">
      <ul class="footer_menu col_grid7 text-left">
        <li><a href="{{ URL::to('aboutus')}}">About Us</a></li>
        <li><a href="{{ URL::to('contactus')}}">Contact Us</a></li>
        <li><a href="{{ URL::to('termsofuse')}}">Terms of Use</a></li>
        <li><a href="{{ URL::to('privacypolicy')}}">Privacy Policy</a></li>
      </ul>
      <ul class="social_icon col_grid5 text-right">
        <li>
          <a href="https://open.spotify.com/user/64p2h14btruk2aydbijnajk9o"><i class="fa fa-spotify" aria-hidden="true"></i></a>
        </li>
        <li>
          <a href="https://www.facebook.com/Theinternify"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        </li>
        <li>
          <a href="https://twitter.com/TInternify "><i class="fa fa-twitter" aria-hidden="true"></i></a>
        </li>
        <li>
          <a href="https://www.instagram.com/theinternify/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        </li>
        <li>
          <a href="https://www.linkedin.com/company/the-internify/ "><i class="fa fa-linkedin" aria-hidden="true"></i></a>
        </li>
      </ul>
    </div>
  </footer>

  <div class="se-pre-con"></div>
  <script src="{{ asset('public/assets/web_assets/js/jquery-lb.js')}}"></script>
  <script src="{{ asset('public/assets/web_assets/js/commen-hd.js')}}"></script>
<script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
  <script>
      $(window).on('load', function(){
       $('.se-pre-con').delay(1500).fadeOut('slow');
     });
   </script>
  
  <script type="text/javascript">
    CKEDITOR.replace('message');
  </script>
  <script>
    $(document).ready(function() {
      var len = 0;
      var maxchar = 500;

      $('#message').keyup(function() {
        len = this.value.length
        if (len > maxchar) {
          return false;
        } else if (len > 0) {
          $("#remainingC").html((maxchar - len));
        } else {
          $("#remainingC").html((maxchar));
        }
      })
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function(e) {
      $('#btnValidate').click(function() {
        var valemail = $('#first_name').val();
        if ($.trim(valemail).length == 0) {
          $('.f_name').show();
          setTimeout(function() {
            $('.f_name').hide();
          }, 3000);
          return false;
        } else {
          return true;
        }
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function(e) {
      $('#btnValidate').click(function() {
        var val_pass = $('#last_name').val();
        if ($.trim(val_pass).length == 0) {
          $('.l_name').show();
          setTimeout(function() {
            $('.l_name').hide();
          }, 3000);
          return false;
        } else {
          return true;
        }
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function(e) {
      $('#btnValidate').click(function() {
        var val_phon = $('#phone').val();
        if ($.trim(val_phon).length == 0) {
          $('.validate_phone').show();
          setTimeout(function() {
            $('.validate_phone').hide();
          }, 3000);
          return false;
        } else {
          return true;
        }
      });
    });
  </script>

  <script type="text/javascript">
    // $(document).ready(function(e) {
    //   $('#btnValidate').click(function() {
    //     var spass = $('#message').val();
    //     if ($.trim(spass).length == 0) {
    //       $('.validate_msg').show();
    //       setTimeout(function() {
    //         $('.validate_msg').hide();
    //       }, 3000);
    //       return false;
    //     } else {
    //       return true;
    //     }
    //   });
    // });
  </script>


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
  <script>
    $(document).ready(function() {
      $(".clicktobtm").click(function() {
        $("html, body").animate({
          scrollTop: $(
            'html, body').get(0).scrollHeight
        }, 2000);
      });
    });
  </script>
  <script>
    $(window).scroll(function() {
      var scroll = $(window).scrollTop();

      if (scroll >= 1000) {
        $("body").addClass("blogLoginFixed_sec");
      } else {
        $("body").removeClass("blogLoginFixed_sec");
      }
    });
    $(".modal").each(function() {
      $(this).wrap('<div class="popupWapper"></div>')
    });

    $(".open-modal").on('click', function(e) {
      e.preventDefault();
      e.stopImmediatePropagation;

      var $this = $(this),
        modal = $($this).data("modal");

      $(modal).parents(".popupWapper").addClass("open");
      setTimeout(function() {
        $(modal).addClass("open");
      }, 350);

      $(document).on('click', function(e) {
        var target = $(e.target);

        if ($(target).hasClass("popupWapper")) {
          $(target).find(".modal").each(function() {
            $(this).removeClass("open");
          });
          setTimeout(function() {
            $(target).removeClass("open");
          }, 350);
        }

      });

    });

    $(".close-modal").on('click', function(e) {
      e.preventDefault();
      e.stopImmediatePropagation;

      var $this = $(this),
        modal = $($this).data("modal");

      $(modal).removeClass("open");
      setTimeout(function() {
        $(modal).parents(".popupWapper").removeClass("open");
      }, 350);

    });
  </script>
  <script>
    $(window).scroll(function() {
      var scroll = $(window).scrollTop();

      if (scroll >= 50) {
        $("body").addClass("body_blog");
      } else {
        $("body").removeClass("body_blog");
      }
    });
    $(window).scroll(function() {
      var scroll = $(window).scrollTop();

      if (scroll >= 50) {
        $("body").addClass("flow2header");
      } else {
        $("body").removeClass("flow2header");
      }
    });
    $(document).ready(function() {
      $(".header_sec .togglebtn").click(function() {
        $(".header_sec ").toggleClass("opne_flow2header");
      });
    });

    // Iterate over each select element
    $('select').each(function() {

      // Cache the number of options
      var $this = $(this),
        numberOfOptions = $(this).children('option').length;

      // Hides the select element
      $this.addClass('s-hidden');

      // Wrap the select element in a div
      $this.wrap('<div class="select"></div>');

      // Insert a styled div to sit over the top of the hidden select element
      $this.after('<div class="styledSelect"></div>');

      // Cache the styled div
      var $styledSelect = $this.next('div.styledSelect');

      // Show the first select option in the styled div
      $styledSelect.text($this.children('option').eq(0).text());

      // Insert an unordered list after the styled div and also cache the list
      var $list = $('<ul />', {
        'class': 'options'
      }).insertAfter($styledSelect);

      // Insert a list item into the unordered list for each select option
      for (var i = 0; i < numberOfOptions; i++) {
        $('<li />', {
          text: $this.children('option').eq(i).text(),
          rel: $this.children('option').eq(i).val()
        }).appendTo($list);
      }

      // Cache the list items
      var $listItems = $list.children('li');

      // Show the unordered list when the styled div is clicked (also hides it if the div is clicked again)
      $styledSelect.click(function(e) {
        e.stopPropagation();
        $('div.styledSelect.active').each(function() {
          $(this).removeClass('active').next('ul.options').hide();
        });
        $(this).toggleClass('active').next('ul.options').toggle();
      });

      // Hides the unordered list when a list item is clicked and updates the styled div to show the selected list item
      // Updates the select element to have the value of the equivalent option
      $listItems.click(function(e) {
        e.stopPropagation();
        $styledSelect.text($(this).text()).removeClass('active');
        $this.val($(this).attr('rel'));
        $list.hide();
        /* alert($this.val()); Uncomment this for demonstration! */
      });

      // Hides the unordered list when clicking outside of it
      $(document).click(function() {
        $styledSelect.removeClass('active');
        $list.hide();
      });

    });
  </script>
  <script>
    $('#profileTab_link li a:not(:first)').addClass('inactive');
    $('.profileTab_contBox').hide();
    $('.profileTab_contBox:first').show();
    $('#profileTab_link li a').click(function() {
      var t = $(this).attr('href');
      $('#profileTab_link li a').addClass('inactive');
      $(this).removeClass('inactive');
      $('.profileTab_contBox').hide();
      $(t).fadeIn('slow');
      return false;
    })

    if ($(this).hasClass('inactive')) { //this is the start of our condition 
      $('#profileTab_link li a').addClass('inactive');
      $(this).removeClass('inactive');
      $('.profileTab_contBox').hide();
      $(t).fadeIn('slow');
    }

    $(".k-switch").click(function() {

      // Simple Code
      var self = $(this);

      if (self.hasClass("on")) {
        self.removeClass("on");
      } else {
        self.addClass("on");
      }
    });
  </script>
  <script>
    $(' .menu_right li').click(function() {
      $(' .menu_right li').removeClass('active');
      $(this).addClass('active');
    });
  </script>
</body>

</html>
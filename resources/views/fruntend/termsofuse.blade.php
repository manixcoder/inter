<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Internify- Terms of Use</title>
  <!-- Fontawesome 4 Cdn from BootstrapCDN -->
  <link rel="icon" type="image/png" href="{{ URL::asset('/public/uploads/favicon.jpeg') }}"/>
  <link rel="icon" type="image/png" href="{{ URL::asset('/public/uploads/favicon.jpeg') }}"/>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="{{ asset('public/assets/web_assets/css/style.css')}}" rel="stylesheet">
  <link href="{{ asset('public/assets/web_assets/fonts/fonts.css')}}" rel="stylesheet">
</head>

<body class="">
  <header class="header_sec mobileHidesec blog_header login-header fw">
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
              <li><a href="{{ URL::to('contactus') }}">Contact us</a></li>
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
            <img src="images/logo.svg" alt="logo-img" />
            <img class="hidelogo_header" src="images/header-logo.svg" alt="logo-img" />
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
              <li><a href="{{ URL::to('aboutus')}}">About Us</a></li>
              <li><a href="{{ URL::to('contactus')}}">Contact Us</a></li>
              <li><a href="{{ URL::to('termsofuse')}}">Terms of Use</a></li>
              <li><a href="{{ URL::to('privacypolicy')}}">Privacy Policy</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="body_wht-inners ">
    <div class="redAbout_banner text-center fw">
      <div class="lgcontainer">
        <h2>Terms of Use</h2>
      </div>
    </div>
    <div class="aboutCont_sec fw">
      <div class="lgcontainer">
        @php
        $termsofusedata = DB::table('term_of_use')->orderBy('id', 'ASC')->where('status',0)->get();
        @endphp
        @if(isset($termsofusedata))
        @foreach($termsofusedata as $value)
        <?php // dd($value);
        ?>
        <div class="aboutCont_box">
          <h3>{{ $value->heading }}</h3>
          <?php echo  $value->description ?>
        </div>
        @endforeach
        @endif
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

  <script src="{{ asset('public/assets/web_assets/js/jquery-lb.js')}}"></script>
  <script src="{{ asset('public/assets/web_assets/js/commen-hd.js')}}"></script>
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
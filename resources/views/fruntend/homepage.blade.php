<header class="header_sec flow2_header mobileHideShow fw">
  <div class="lgcontainer">
    <div class="innerrow">
      <div class="col_grid3">
        <a href="{{ URL::to('/') }}" class="logo-flow2">
          <img src="{{ asset('public/assets/images/logo.svg')}}" alt="logo-img" />
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
            <li>
              @auth
              @if(Auth::user()->users_role === '2')
              <script>window.location = "{{ URL::to('student-dashboard') }}";</script>
              @else
              <script>window.location = "{{ URL::to('recruiter-dashboard') }}";</script>
              @endif
              
              @endauth
              @guest
              <a href="{{ URL::to('web-login') }}">
                Login
                @endguest

              </a>
            </li>
            <li><a href="{{ URL::to('contactus') }}">Contact us</a></li>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</header>
<div class="body_redbg-inner body_wapper">
  <div class="banner_bgsec text-center fw">
    <div class="empowering-sec">
      <div class="empotext-cont">
        <div class="lgcontainer">
          <h2>EMPOWERING THE <span class="fw">creators of tomorrow</span></h2>
          <div class="btm_arrow clicktobtm">
            <a href="#iam_text_btm"><img src="{{ asset('public/assets/images/btm-arrow.png')}}" alt="arrow" /></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="iam_text_sec text-center fw" id="iam_text_btm">
    <div class="empowering-sec">
      <div class="empotext-cont">
        <div class="lgcontainer">
          <ul class="iam_text_cont text-center fw">
            <li><a href="{{URL::to('recruiter-lending')}}"> I AM AN<span class="fw">employer</span></a></li>
            <li><a href="{{URL::to('student-landing-page')}}"> I AM A<span class="fw">student</span></span></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="se-pre-con"></div>
  <script src="{{ asset('public/assets/web_assets/js/jquery-lb.js')}}"></script>
  <script src="{{ asset('public/assets/web_assets/js/commen-hd.js')}}"></script>

  <script>
      $(window).on('load', function(){
       $('.se-pre-con').delay(1500).fadeOut('slow');
     });
   </script>
<script type="text/javascript">
  $(document).ready(function() {
      $(".header_sec .togglebtn").click(function() {
        $(".header_sec ").toggleClass("opne_flow2header");
      });
   });
</script>
<script>
      $(window).on('load', function(){
       $('.se-pre-con').delay(1500).fadeOut('slow');
     });
   </script>
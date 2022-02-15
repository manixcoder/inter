<footer class="fw">
      <div class="lgcontainer">
        <ul class="footer_menu col_grid7 text-left">
          <li><a href="./aboutus-login.html">About Us</a></li>
          <li><a href="./contact_us-login.html">Contact Us</a></li>
          <li><a href="./terms_use-login.html">Terms of Use</a></li>
          <li><a href="./privacy_policy-login.html">Privacy Policy</a></li>
        </ul>
        <ul class="social_icon col_grid5 text-right">
          <!-- <li>
            <a href="https://open.spotify.com/user/64p2h14btruk2aydbijnajk9o"><i class="fa fa-spotify" aria-hidden="true"></i></a>
          </li> -->
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
    <script src="{{ asset('public/assets/web_assets/js/jquery.multiform-text-editor.js')}}"></script>
    <script src="{{ asset('public/assets/web_assets/js/effects.js')}}"></script>
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
  $(".modal").each( function(){
  $(this).wrap('<div class="popupWapper"></div>')
});

$(".open-modal").on('click', function(e){
  e.preventDefault();
  e.stopImmediatePropagation;
  
  var $this = $(this),
      modal = $($this).data("modal");
  
  $(modal).parents(".popupWapper").addClass("open");
  $(modal).parents("body").addClass("open");
  setTimeout( function(){
    $(modal).addClass("open");
  }, 350);
  
  $(document).on('click', function(e){
    var target = $(e.target);
    
    if ($(target).hasClass("popupWapper")){
      $(target).find(".modal").each( function(){
        $(this).removeClass("open");
      });
      setTimeout( function(){
        $(target).removeClass("open");
      }, 350);
    }
    
    
  });
  
  
  
});

$(".close-modal").on('click', function(e){
  e.preventDefault();
  e.stopImmediatePropagation;
  
  var $this = $(this),
      modal = $($this).data("modal");
  
  $(modal).removeClass("open");
  setTimeout( function(){ 
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
  $(document).ready(function(){
    $(".header_sec .togglebtn").click(function(){
      $(".header_sec ").toggleClass("opne_flow2header");
    });
  });



   </script>
  <script>
   $(document).ready(function() {
        $(' .menu_right li').click(function() {
           $(' .menu_right li').removeClass('active');
         $(this).addClass('active');
       });
       $(' .profileTab li').click(function() {
           $(' .profileTab li').removeClass('active');
         $(this).addClass('active');
       });
   });
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
  </body>
</html>
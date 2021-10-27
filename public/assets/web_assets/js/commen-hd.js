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
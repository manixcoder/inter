<div class="sidebar_sec">
    <div class="sidbar-toggle">
        <span>+</span>
        <span class="close-icon">x</span>
    </div>
   <ul class="loder">
      <li><a href="{{ URL::to('dashboard')}}">Dashboard</a></li>
      <li><a href="{{ URL::to('joblist')}}">Listed Jobs</a></li>
      <li><a href="{{URL::to('student-list')}}">Students</a></li>
      <li><a href="{{ URL::to('recruiter-list')}}">Recruiters</a></li>
      <li><a href="{{ URL::to('blog-list')}}">Blogs</a></li>
      <li><a href="{{URL::to('post-list')}}">Posts</a></li>
      <li><a href="{{URL::to('announcement-list')}}">Announcement</a></li>
      <li>
         <a href="#" class="submenu-dropdown">Layouts<i class="fa fa-angle-up"></i></a>
         <ul class="sub-menu" style="display: none;">
            <li><a href="{{URL::to('aboutus-list')}}">About Us</a></li>
            <li><a href="{{URL::to('termofuse-list')}}">Terms of use</a></li>
            <li><a href="{{URL::to('privacypolicy-list')}}">Privacy Policy</a></li> 
            <li><a href="{{URL::to('contactus_queryes')}}">Contact Us</a></li> 
         </ul>
      </li>                       
      
   </ul>                                                               
</div>
<script type="text/javascript">
   $(function(){
      var current = location.pathname;
      $('.loder li a').each(function(){
         var $this = $(this);
         if($this.attr('href').indexOf(current) !== -1){
            $this.addClass('active');
         }   
      })
   })
   $(document).ready(function(){
      $(".submenu-dropdown").click(function(){
        $(".sub-menu").slideToggle();
      });
        $(".sidbar-toggle").click(function(){
           $(".main_contant").toggleClass("sidbar-toggle-show");
        });  
    });
</script>
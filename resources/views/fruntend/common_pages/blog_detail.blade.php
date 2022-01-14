 @include('fruntend.common_pages.web_header')
 @php
 $createdby = DB::table('users')->where('id', $Data->created_by)->first();
 $blogData = DB::table('blogs')->orderBy('id', 'Desc')->where('id','!=',$Data->id)->take(2)->get();
 @endphp
 <div class="body_wht-inners viewDetailBlog_sec ">
   <div class="small_contaner blogcontainer">
     <!--<div class="findblog_search blogView_search fw">
          <form class="fw">
            <div class="from-group">
              <div class="input-icon">
                <i ><img src="{{ asset('public/assets/images/searchIcon.png')}}" alt="icon"></i>
                <input class="form-control" type="text" name="search" placeholder="Find Blogs">
              </div>
              <div class="btn_group">
                <button type="button" class="input-btn" >Search</button>
              </div>
            </div>
          </form>
        </div>-->
     <div class="content-group fw">
       <div class="text-cont fw">
         <h3 class="nrml-heading">
           {{ $Data->blog_heading ?? ''}}
         </h3>
         <div class="admin-date-box fw">
           <span class="gary-small-text text-left col_grid6">Posted on :<span>
               {{date('d M Y | H:i'  , strtotime($Data->created_at))}}
             </span>
           </span>
           <span class="gary-small-text text-right col_grid6">Posted by :<span>
               {{ $createdby->name ?? ''}}
             </span>
           </span>
         </div>

       </div>
       <div class="img-cont fw">
         <figure class="full-img">
           <img src="{{ URL::asset('/public/uploads/') }}/{{ $Data->blog_image }}" alt="img1" />
         </figure>
       </div>
       <div class="viewdetail_pra fw">
         <p class="site-pra">
           <?php echo  $Data->description ?>
         </p>
       </div>
     </div>
   </div>
   <div class="fw blog_intersted">
     <div class="lgcontainer">
       <div class="innerrow">
         <div class="col_grid12 arrowheading_site right_after_arrow interested_right">
           <h3>You may be <span>interested in these blogs t</span>oo</h3>
         </div>
       </div>
     </div>

     <div class="blog_intersted_box fw">
       <div class="lgcontainer">
         <div class="innerrow">

           @if(isset($blogData))
           @foreach($blogData as $value)
           @php $createdby = DB::table('users')->where('id', $value->created_by)->first(); @endphp
           <div class="col_grid6">
             <div class="content-group fw">
               <div class="text-cont fw">
                 <h3 class="nrml-heading">
                   {{ $value->blog_heading ?? ''}}
                 </h3>
                 <div class="viewdetail_pra fw">
                   <p class="site-pra">
                     <?php // echo $value->description ?>
                     <?php 
           // echo $value->description;
           echo substr($value->description, 0, 300);
           ?>
                   <form action="{{URL::to('web/blog/detail')}}" method="post" enctype="multipart/form-data">
                     @csrf
                     <input type="hidden" name="blog_id" value="{{ $value->id }}">
                     <input type="submit" class="read_more_btn" value="READ MORE">
                   </form>
                   <!-- a href="{{URL::to('web/blog/detail/')}}/{{ $value->id }}" class="read_more_btn">
                       READ MORE
                     </a-->
                   </p>
                 </div>
                 <div class="img-cont fw">
                   <figure class="full-img">
                     <img src="{{ URL::asset('/public/uploads/') }}/{{ $value->blog_image }}" alt="img1" />
                   </figure>
                 </div>
                 <div class="admin-date-box fw">
                   <span class="gary-small-text text-left col_grid6">Posted on :<span>
                       {{date('d M Y | H:i'  , strtotime($value->created_at))}}
                     </span>
                   </span>
                   <span class="gary-small-text text-right col_grid6">Posted by :<span>
                       {{ $createdby->name ?? ''}}
                     </span>
                   </span>
                 </div>
               </div>
             </div>
           </div>
           @endforeach
           @endif
         </div>
       </div>
     </div>
   </div>
 </div>
 @include('fruntend.common_pages.web_footer')
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
 </script>
 <script>
   $(' .menu_right li').click(function() {
     $(' .menu_right li').removeClass('active');
     $(this).addClass('active');
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
 </script>
 </body>

 </html>
 @include('fruntend.common_pages.web_header')

 <div class="body_wht-inners ">
   <div class="small_contaner blogcontainer">
     <div class="findblog_search blogView_search fw">
       <form action="{{ url('web/blog') }}" method="POST" id="FormValidation" enctype="multipart/form-data">
         @csrf
         <div class="from-group">
           <div class="input-icon">
             <i><img src="{{ asset('public/assets/images/searchIcon.png')}}" alt="icon"></i>
             <input class="form-control" type="text" name="search" placeholder="Find Blogs" value="{{ $searchinput ?? ''}}" required="">
           </div>
           <div class="btn_group">
             <button type="submit" class="input-btn">Search</button>
           </div>
         </div>
       </form>
     </div>

     @if(isset($Data))
     @foreach($Data as $value)
     @php
     $createdby = DB::table('users')->where('id', $value->created_by)->first();
     @endphp
     <div class="content-group fw">
       <div class="text-cont fw">
         <h3 class="nrml-heading">
           {{ $value->blog_heading ?? ''}}
         </h3>
         <p class="site-pra addReadMore showlesscontent">
           {{ strip_tags($value->description) ?? ''}} ..
           <form action="{{URL::to('web/blog/detail')}}" method="post" enctype="multipart/form-data">
             @csrf
             <input type="hidden" name="blog_id" value="{{ $value->id }}">
             <input type="submit" value="READ MORE">
           </form>
           <!--a href="{{URL::to('web/blog/detail/')}}/{{ $value->id }}" class="read_more_btn">
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
         <span class="gary-small-text text-left col_grid6">Posted on :
           <span>
             {{date('d M Y | H:i'  , strtotime($value->posted_date_and_time))}}
           </span>
         </span>
         <span class="gary-small-text text-right col_grid6">Posted by :
           <span>
             {{ $createdby->name ?? ''}}
           </span>
         </span>
       </div>
     </div>
     @endforeach
     @else
     <p>Data not found.!</p>
     @endif
   </div>
 </div>
 @include('fruntend.common_pages.web_footer')
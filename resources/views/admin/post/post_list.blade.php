<div class="content dashboard-pg post-pgcont">
   <div class=" fw postpg-sec fw">
      <div class="col-md-6 postblog-sec">
         <div id="loading_p">
            <img id="loading-image" src="{{ URL::asset('/public/uploads/TheInternifyAnimatedLogo.gif') }}" alt="Loading..." />
         </div>
         @if(isset($Data))
         @foreach($Data as $postsdata)
         @php
         $likeby = DB::table('post_like')->where('post_id', $postsdata->id)->where('like_unlike', 0)->count();
         $commentby = DB::table('post_comment')->where('post_id', $postsdata->id)->count();
         @endphp
         <div class="content-group fw">
            <div class="text-cont fw">
               <div class="userCommnet_deta fw">
                  @php $userdetail = DB::table('users')->where('id', $postsdata->user_id)->first(); @endphp
                  <span>
                     @if($userdetail->profile_image !='')
                     <img src="{{ URL::asset('/public/uploads/') }}/{{ $userdetail->profile_image ?? ''}}" alt="icon">
                     @else
                     <img src="{{ URL::asset('/public/uploads/placeholder.png') }}" alt="icon">
                     @endif

                  </span>
                  <div class="userCommnet_Name">
                     <h4>{{ $userdetail->name ?? ''}} <span>{{ date('d M Y | H:i:s', strtotime($postsdata->created_at))}}</span> </h4>
                  </div>
               </div>
               <h3 class="siteheading">{{ $postsdata->heading ?? ''}}</h3>
               <p class="site-pra">

                  <?php echo $postsdata->description; ?>
               </p>
            </div>
            <div class="img-cont fw">
               <figure class="full-img">
                  <img src="{{ URL::asset('/public/uploads/') }}/{{ $postsdata->post_image }}" alt="img1">
               </figure>
            </div>
            <ul class="commntsMsgBox fw">
               <li>
                  <a href="javascript::void(0)"><span><img src="{{ URL::asset('/public/assets/images/likedIcon.png') }}" alt="icon"></span> {{ $likeby ?? ''}} Likes</a>
               </li>
               <li>
                  <a href="javascript::void(0)"><span><img src="{{ URL::asset('/public/assets/images/commentIcon.png') }}" alt="icon"></span> {{ $commentby ?? '' }} Comments</a>
               </li>
               <!-- <li>
                        <a href="{{ URL::to('/message')}}" target="_blank"><span><img src="{{ URL::asset('/public/assets/images/messageIcon.png') }}" alt="icon"></span> Message</a>
                     </li>-->
               <li>
                  <a href="{{ URL::to('post-delete',$postsdata->id) }}" onclick="return confirm('Are you sure you want to delete this item?');"> <img src="{{ asset('public/assets/images/delete.svg')}}"><span></span> Delete </a>
               </li>
            </ul>
         </div>
         @endforeach
         @endif
      </div>

      <div class="col-md-6  createpos-sec">
         <form action="{{ URL::to('add-post')}}" method="POST" id="FormValidation" enctype="multipart/form-data">
            @csrf
            <div class="studentform_box jobsdetails_sec">
               <h4 class="greentext">Create A New Post</h4>
               <div class="form_group small_btn ">
                  <div class="upload_btn upload_rectgal">
                     <div class="upload_box">
                        <input type="file" class="form_control" name="image" onchange="loadFile(event)" required="">
                     </div>
                     <div class="upload_text">
                        <img src="{{ URL::asset('/public/assets/images/upload_img.svg') }}" id="output" alt="upload_img">
                        <span class="uplod_text">Attach Photo</span>
                     </div>
                  </div>
               </div>
               <div class="form_group small_btn">
                  <input type="text" name="heading" placeholder="Headline" class="form_control" required="">
               </div>
               <div class="form_group small_btn">
                  <textarea name="description" placeholder="Write Content......" class="form_control textarea" required=""></textarea>
               </div>
               <div class="form_group small_btn">
                  <button type="submit" class="form_control btn"> Publish</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
<script>
   var loadFile = function(event) {
      var output = document.getElementById('output');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
         URL.revokeObjectURL(output.src) // free memory
      }
   };
</script>
<script>
   $(window).load(function() {
      //alert("hi");
      $('#loading_p').hide();
   });
</script>
<div class="content dashboard-pg">
   <h3 class="heading"><span class="red_text"> Blogs > </span> Update Blog</h3>
   <div class="row">
      <?php 
      // echo "<pre>";
      // print_r($blogData);
      // die;
      ?>
      <div class="col-md-12 studentform textcenter">
         <form  action="{{ URL::to('update-blog')}}" method="POST" id="FormValidation" enctype="multipart/form-data">
            <input type="hidden" name="blog_id" value="{{ $blogData->id }}">
            @csrf
            <div class="studentform_box">
               <div class="form_group small_btn ">
                  <div class="upload_btn upload_rectgal">
                     <div class="upload_box">
                     @if($blogData->blog_image !='')
                     <input type="file" name="image" onchange="loadFile(event)" class="form_control" >
                     @else
                        <input type="file" name="image" onchange="loadFile(event)" class="form_control" required="">
                        @endif
                     </div>
                     <div class="upload_text">
                        @if($blogData->blog_image !='')
                        <img src="{{ URL::asset('/public/uploads') }}/{{ $blogData->blog_image }}" id="boutput" alt="upload_img">
                        @else
                        <img src="{{ URL::asset('/public/assets/images/upload_img.svg') }}" id="boutput" alt="upload_img">
                        @endif
                       
                        <span class="uplod_text">Attach Image</span>
                     </div>
                  </div>
               </div>
               <div class="form_group small_btn">
                  <input type="text" name="blog_heading" placeholder="Headline" value="{{ $blogData->blog_heading }}" class="form_control" required="">
               </div>
               <div class="form_group small_btn">
                  <textarea name="description" placeholder="Write Content......" class="form_control textarea" required="">{{ $blogData->description }}</textarea>
               </div>
              <!-- <div class="form_group small_btn">
                  <div class="redioBox fw">
                      <span class="aimfor_text">Feature Blog</span>
                        <div class="redioinput">
                            <div class="redioinput_box">
                                <input type="radio" id="Students" name="feature_blog" value="0" checked="checked">
                                <span></span>
                            </div>
                            <label for="Students">Yes</label>
                        </div>
                        <div class="redioinput">
                            <div class="redioinput_box">
                                 <input type="radio" id="css" name="feature_blog" value="1">
                                 <span></span>
                             </div>
                            <label for="css">No</label>
                        </div>
                  </div>
              </div>-->
               <div class="form_group small_btn">
                  <button type="submit"  class="form_control btn" > Update</button>
               </div>
            </div>
         </form>.
      </div>
   </div>
</div>
<script>
      var loadFile = function(event) {
        var output = document.getElementById('boutput');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
          URL.revokeObjectURL(output.src) // free memory
        }
      };
    </script>
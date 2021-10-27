@include('fruntend.common_pages.web_header')  
@include('fruntend.recruiter_profile_section.recruiter_basicinfo_sub_menues')

@php 
    $userRole = Session::get('userRole');
    $id = Session::get('gorgID');
    $recruiterInfo = DB::table('users')->where('id', $id)->first();
    $studentdata = DB::table('users')->where('status', 0)->where('users_role', 2)->get();
    $recruiterdata = DB::table('users')->where('status', 0)->where('users_role', 3)->get();
    $todaysdate = date('Y-m-d').' 00:00:00';   

    $posts = DB::table('posts')->where('user_id', $recruiterInfo->id)->where('status', 0)->orderBy('id', 'Desc')->get();    
    $listedjobs = DB::table('jobs')->where('user_id', $id)->orderBy('id', 'Desc')->get();
  @endphp 
      <!-- Recruiter Posts section -->
          <div class="profileTab_contBox " id="profileTab_link2">
            <div class="small_contaner blogcontainer">
              <div class="fw posted_heading">
                <h3 class="font36text clrBlack semiboldfont_fmly">
                  You have posted ({{ count($posts ?? '') }} Posts)
                  <span class="pull-right">
                    <a  href="javascript:void(0);" class="open-modal input-btn" data-modal="#createNewPostrecuriter">Create a New Post</a>
                  </span>
                </h3>
              </div>

              @if(isset($posts))
                @foreach($posts as $postdata)
                
                @php 
                    $likeby = DB::table('post_like')->where('post_id', $postdata->id)->where('like_unlike', 0)->count(); 
                    $commentby = DB::table('post_comment')->where('post_id', $postdata->id)->count(); 
                @endphp
                  <div class="content-group fw">
                    <div class="text-cont fw">
                      <div class="userCommnet_deta fw">
                        <span><img src="{{ URL::asset('/public/assets/post_images/') }}/{{ $recruiterInfo->profile_image }}" alt="icon"></span>
                        <div class="userCommnet_Name">
                          <h4>{{ $recruiterInfo->name ?? ''}}<span>{{ date('d M Y | H:i', strtotime($postdata->date_time)) }}</span> <span class="delete_postbtn"><a href="{{ URL::to('post-delete',$postdata->id) }}" onclick="return confirm('Are you sure you want to delete this item?');"> <i><img src="{{ URL::asset('/public/assets/images/delete.png') }}" alt="delete-icon" /></i> Delete Post</a></span></h4>
                        </div>
                      </div>
                      <h1>{{ $postdata->heading ?? ''}}</h1>
                      <p class="site-pra">{{ $postdata->description ?? ''}}</p>
                    </div>
                    <div class="img-cont fw">
                      <figure class="full-img">
                        <img src="{{ URL::asset('/public/assets/post_images/') }}/{{ $postdata->post_image }}" alt="img1">
                      </figure>
                    </div>
                    <ul class="commntsMsgBox fw">
                      <li>
                        <a href="#"><span><img src="{{ URL::asset('/public/assets/images/likedIcon.png') }}" alt="icon"></span> {{ $likeby ?? '' }} Likes</a>
                      </li>
                      <li>
                        <a href="#"><span><img src="{{ URL::asset('/public/assets/images/commentIcon.png') }}" alt="icon"></span> {{ $commentby ?? '' }} Comments</a>
                      </li>
                   <!--   <li>
                        <a href="#"><span><img src="{{ URL::asset('/public/assets/images/shareIcon.png') }}" alt="icon"></span> Share</a>
                      </li>-->
                    </ul>
                  </div>
                @endforeach
              @endif
             
            </div>
          </div>
        </div>
      </div>
    </div>

     <div class='modal personal_DtlPop createNewPost_popup' id='createNewPostrecuriter'>
      <div class="close fw">
        <a class='btn close-modal' data-modal="#createNewPostrecuriter" href="#"><img src="{{ asset('public/assets/images/close.png')}}" alt="icon"></a>
      </div>
      <div class='content fw'>
        <h3 class="modal_heading">Create a New Post</h3>
        <div class="form_sec fw ">

          <form  action="{{ URL::to('add-post')}}" method="POST" id="FormValidation" enctype="multipart/form-data">
            @csrf
            <div class="innerrow">
              <div class="col_grid12 upload_box_sec">
                <div class="uploadBox">
                  <input type="file" name="image" onchange="loadFile(event)" required="" />
                  <div class="file_cont">
                    <img style="max-width: 50%; height: auto;" src="{{ asset('public/assets/images/attach_img.png')}}" id="output" alt="icon" />
                    <h4 class="font24Text clrBlack">Attach Photo</h4>
                  </div>
                </div>
                <div class="uplaodCheckBtn">
                  <!-- <a href="#" >Post</a> -->

                  <button type="submit" class="input-btn"> <span><img src="{{ asset('public/assets/images/loginCheck_icon.png')}}" alt="icon" /></span> Post</button>
                </div>
              </div>
              <div class="col_grid12 ">
                <div class="form-group">
                  <input type="text" name="heading" placeholder="Enter Heading" class="form-control" required="">
                </div>
              </div>
              <div class="col_grid12 ">
                <div class="form-group">
                  <textarea  name="description" placeholder="What do you want to write here?" class="form-control" required=""></textarea >
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>  
    </div>

      <script>
      var loadFile = function(event) {
         var output = document.getElementById('output');
         output.src = URL.createObjectURL(event.target.files[0]);
         output.onload = function() {
           URL.revokeObjectURL(output.src) // free memory
         }
      };
    </script>

    @include('fruntend.common_pages.web_footer') 
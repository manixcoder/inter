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
          <a href="javascript:void(0);" class="open-modal input-btn" data-modal="#createNewPostrecuriter">Create a New Post</a>
        </span>
      </h3>
    </div>

    @if(isset($posts))
    @foreach($posts as $postdata)

    @php
    $likeby = DB::table('post_like')->where('post_id', $postdata->id)->where('like_unlike', 0)->count();
    $commentby = DB::table('post_comment')->where('post_id', $postdata->id)->count();
    $loginby = DB::table('users')->where('id', $id)->first();
    @endphp
    <div class="content-group fw">
      <div class="text-cont fw">
        <div class="userCommnet_deta fw">
          <span>
            <img src="{{ URL::asset('/public/uploads/') }}/{{ $recruiterInfo->org_image }}" alt="icon">
          </span>
          <div class="userCommnet_Name">
            <h4>
              {{ $recruiterInfo->name ?? ''}}
              <span>
                {{ date('d M Y | H:i', strtotime($postdata->date_time)) }}
              </span>
              @if($id != $postdata->user_id)
              @else
              <span class="delete_postbtn">
                <a href="{{ url('delete_student_post/'.$postdata->id) }}"><i>
                    <img src="{{ asset('public/assets/images/delete.png')}}" alt="delete-icon" /></i>
                  Delete Post
                </a>
              </span>
              @endif
            </h4>
          </div>
        </div>
        <h1>{{ $postdata->heading ?? ''}}</h1>
        <p class="site-pra">{{ $postdata->description ?? ''}}</p>
      </div>
      <div class="img-cont fw">
        <figure class="full-img">
          <img src="{{ URL::asset('/public/uploads/') }}/{{ $postdata->post_image }}" alt="img1">
        </figure>
      </div>
      <ul class="commntsMsgBox fw">
        @if($likeby == null)
        <li>
          <a href="javascript:void(0);" onclick="editRecords({{ $postdata->id }})"><span><img src="{{ asset('public/assets/images/likedIcon.png')}}" alt="icon"></span> {{ $likeby ?? ''}} Likes</a>
        </li>
        @else
        <li>
          <a href="javascript:void(0);" onclick="editRecords({{ $postdata->id }})" style="color:#ba3143" ;><span><img src="{{ asset('public/assets/images/likedIcon.png')}}" alt="icon"></span> {{ $likeby ?? ''}} Likes</a>
        </li>
        @endif
        <!-- li>
        <a href="#"><span><img src="{{ URL::asset('/public/assets/images/likedIcon.png') }}" alt="icon"></span> {{ $likeby ?? '' }} Likes</a>
      </li -->
        <li class="commentbyopne">
          <a href="javascript:void(0);">
            <span>
              <img src="{{ URL::asset('/public/assets/images/commentIcon.png') }}" alt="icon">
            </span>
            {{ $commentby ?? '' }}
            Comments
          </a>
        </li>
        <div class="commentBox-usersec">
          <div class="commentBox-heading">Comments <span>({{ $commentby ?? '' }})</span><span class="closebtn"><i class="fa fa-times-circle" aria-hidden="true"></i></span></div>
          <div class="commentBox-chats">
            @if(isset($commentbydata))
            @foreach($commentbydata as $comments)
            @php $commentbyuser = DB::table('users')->where('id', $comments->user_id)->first(); @endphp
            <div class="commentBox-chats-wapper">
              @if($userRole == 3)
              <span class="usericon"><img src="{{ URL::asset('/public/uploads/') }}/{{ $commentbyuser->org_image ?? ''}}" alt="icon" /></span>
              @else
              <span class="usericon"><img src="{{ URL::asset('/public/uploads/') }}/{{ $commentbyuser->profile_image ?? ''}}" alt="icon" /></span>
              @endif
              <div class="commentuser-rightuser">
                <h4>{{ $commentbyuser->name ?? ''}}</h4>
                <p>{{ $comments->comment ?? ''}}</p>
                <div class="comticon">
                  <!--<span><i class="fa fa-thumbs-up" aria-hidden="true"></i> - 312</span><span><a href="#" class="reply">Reply</a></span>-->
                </div>
              </div>
            </div>
            @endforeach
            @endif

            <form action="{{ URL::to('add-comment')}}" method="POST" id="FormValidation" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="post_id" id="postid" value="{{ $postdata->id ?? ''}}" class="form-control">

              <div class="comment-inputmsg">
                <input type="text" name="comment" id="commentdata" class="form-control" required="">
                <button type="submit" class="btn"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
              </div>
            </form>

          </div>
        </div>
        <!--li class="shareclickon">
          <a href="javascript:void(0);"><span><img src="{{ URL::asset('/public/assets/images/shareIcon.png') }}" alt="icon"></span> Share</a>
        </li-->

        <div class="sharebox-sec">
          <div class="sharebox-user">

            @if($userRole == 3)
            <span><img src="{{ URL::asset('/public/uploads/') }}/{{ $loginby->org_image ?? ''}}"></span>
            @else
            <span><img src="{{ URL::asset('/public/uploads/') }}/{{ $loginby->profile_image ?? ''}}"></span>
            @endif

            {{ $loginby->name ?? ''}}
            <small class="shareclosebtn"><img src="{{ asset('public/assets/images/close.png')}}" alt="icon"></small>
          </div>
          <form action="{{ URL::to('share-post')}}" method="POST" id="FormValidation" enctype="multipart/form-data">
            @csrf
            <div class="sharebox-commnet">
              <input type="hidden" name="post_id" value="{{ $postdata->id }}">
              <button type="submit" class="share-btn">share Now</button>
            </div>
          </form>
        </div>
        <li>
        <a href="{{ URL::to('/message')}}" target="_blank"><span><img src="{{ URL::asset('/public/assets/images/messageIcon.png') }}" alt="icon"></span> Message</a>
        </li>
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

      <form action="{{ URL::to('add-post')}}" method="POST" id="FormValidation" enctype="multipart/form-data">
        @csrf
        <div class="innerrow">
          <div class="col_grid12 upload_box_sec">
            <div class="uploadBox">
              <input type="file" name="image" onchange="loadFile(event)" required="" />
              <div class="file_cont">
                <img style="max-width: 50%; height: auto;" src="{{ asset('public/assets/images/attach_img.png')}}" id="outputpost" alt="icon" />
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
              <textarea name="description" placeholder="What do you want to write here?" class="form-control" required=""></textarea>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  var loadFile = function(event) {
    var output = document.getElementById('outputpost');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>
<script type="text/javascript">
  function editRecords(id) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: "{{url('likefilter/')}}" + '/' + id,
      method: "GET",
      contentType: 'application/json',
      success: function(data) {
        var url = window.location.href;
        $(".lightwht_bg").load(url);
      }
    });
  }
</script>
<script type="text/javascript">
  function editRecords(id) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: "{{url('likefilter/')}}" + '/' + id,
      method: "GET",
      contentType: 'application/json',
      success: function(data) {
        var url = window.location.href;
        $(".lightwht_bg").load(url);
      }
    });
  }
</script>
<script>
  $(' .menu_right li').click(function() {
    $(' .menu_right li').removeClass('active');
    $(this).addClass('active');
  });

  $(document).ready(function() {
    $('.commentbyopne').on('click', function() {
      $(this).removeClass('opencomments-active').addClass('opencomments-active');
    });
    $('.closebtn').on('click', function() {
      $(' .commentbyopne').removeClass('opencomments-active');
    });
  });
  $(document).ready(function() {
    $('.shareclickon').on('click', function() {
      $(this).removeClass('shareclickon-active').addClass('shareclickon-active');
    });
    $('.shareclosebtn').on('click', function() {
      $(' .shareclickon').removeClass('shareclickon-active');
    });
  });

  $('.close-modal').click(function() {
    location.reload();
  });
</script>

@include('fruntend.common_pages.web_footer')
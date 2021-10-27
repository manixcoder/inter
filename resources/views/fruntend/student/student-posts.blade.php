
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>internify - Home</title>
    <!-- Fontawesome 4 Cdn from BootstrapCDN -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('public/assets/web_assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('public/assets/web_assets/fonts/fonts.css')}}" rel="stylesheet">
  </head>
  <body class="lightwht_bg">
    <header class="header_sec flow2_header fw">
      <div class="lgcontainer">
        
        
      @include('fruntend.student.inc.top-menu')     
        
        
      </div>
    </header>
    <div class="body_wht-inners ">
      <div class="profile_public  fw">
        <div class="lgcontainer">
          <div class="innerrow">                       
            <div class="col_grid9">
              <div class="profile_publicimg">
                <img src="{{ asset('public/assets/images/userimg-icon.png')}}" alt="img"/>
              </div>                                                
              <div class="profile_publicDetail">
                <h4 class="clrwht font36text  semiboldfont_fmly">{{$OrgData->name}}</h4>
                <h4 class="clrwht font36text  semiboldfont_fmly"><a href="mailto:<?php echo $OrgData->email ?>">{{$OrgData->email}}</a></h4>
                <h4 class="clrwht font36text  semiboldfont_fmly">{{$OrgData->phone}}</h4>
                <div class="progressbar_sec whtprogressBar fw">
                  <div class="progressbar_cont fw">
                    <span></span>  
                  </div>
                  30% profile completed
                </div>
              </div>
            </div>
            <div class="col_grid3">
              <div class="rightPublic text-right font24Text">
                Public Profile<div class="profileToggle">
                  <div class="k-switch">
                    <div class="track"></div> 
                   <div class="ball green"></div>
                   <div class="ball red"></div>
                   </div>
                </div>           
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tabCompnay_profile profileDetail_tab text-center fw">
        <div class="lgcontainer">
          <ul class=" profileDetail_ul" id="profileTab_link">
          <li>
              <a href="{{url('student-profile-basic-info')}}">My Details</a>
            </li>
            <li>
              <a href="{{url('student-posts')}}"  class="active">My Posts</a>
            </li>
            <li>
              <a href="{{url('student-applications')}}">My Applications</a>
            </li>
          </ul>
        </div>
        
        <div class="profileTab_contBox fw" id="profileTab_Posts2">
          <div class="fw myPostSec">
            <div class="small_contaner blogcontainer">
              <div class="fw posted_heading">
                @php
                $userRole = Session::get('userRole');
                $id = Session::get('gorgID');
                $users = DB::table('users')->where('id', $id)->first();
             $posts = DB::table('posts')->where('user_id', $id)->orderBy('id', 'desc')->get();
                @endphp
                <h3 class="font36text clrBlack semiboldfont_fmly">
                  You have posted (0{{count($posts)}} Posts)
                  <span class="pull-right">
                    <a  href="javascript:void(0);" class="open-modal input-btn" data-modal="#createNewPost">Create a New Post</a>
                  </span>
                </h3>
              </div>


              @foreach($posts as $post)
              <div class="content-group fw">
                <div class="text-cont fw">
                  <div class="userCommnet_deta fw">
                    <span><img src="{{ asset('public/assets/images/userimg-icon.png')}}" alt="icon"></span>
                    <div class="userCommnet_Name">
                      <h4>{{$users->name}} <span>{!! date('d M Y H:i:s', strtotime($post->date_time)) !!}</span> <span class="delete_postbtn"><a href="{{ url('delete_student_post/'.$post->id) }}"><i><img src="{{ asset('public/assets/images/delete.png')}}" alt="delete-icon" /></i>Delete Post</a></span></h4>
                    </div>
                  </div>
                  <h3  class="font57text clrBlack semiboldfont_fmly">{{$post->heading}}</h3>
                  <p class="site-pra">
                    {!! $post->description !!}
                  </p>
                </div>
                <div class="img-cont fw">
                  <figure class="full-img">
                    <img src="{{ asset('public/assets/post_images/'.$post->post_image)}}" alt="img1">
                  </figure>
                </div>
                <ul class="commntsMsgBox fw">
                  <li>
                    <a href="#"><span><img src="{{ asset('public/assets/images/likedIcon.png')}}" alt="icon"></span> 35 Likes</a>
                  </li>
                  <li>
                    <a href="#"><span><img src="{{ asset('public/assets/images/commentIcon.png')}}" alt="icon"></span> 05 Comments</a>
                  </li>
                  <li>
                    <a href="#"><span><img src="{{ asset('public/assets/images/messageIcon.png')}}" alt="icon"></span> Message</a>
                  </li>
                  <li>
                    <a href="#"><span><img src="{{ asset('public/assets/images/shareIcon.png')}}" alt="icon"></span> Share</a>
                  </li>
                </ul>
              </div>
@endforeach
              
              


              `
            </div>
          </div>
        </div>
       
               
             



                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="fw">
    @include('fruntend.student.inc.footer') 
    </footer>
    <div class='modal personal_DtlPop createNewPost_popup' id='createHomePostrecuriter'>
      <div class="close fw">
        <a class='btn close-modal' data-modal="#createHomePostrecuriter" href="#"><img src="{{ asset('public/assets/images/close.png')}}')}}" alt="icon"></a>
      </div>
      <div class='content fw'>
        <h3 class="modal_heading">Create a New Post</h3>
        <div class="form_sec fw ">
          <div class="innerrow">
            <div class="col_grid12 upload_box_sec">
              <div class="uploadBox">
                <input type="file" name="acttachPhoto" />
                <div class="file_cont">
                  <img src="{{ asset('public/assets/images/attach_img.png')}}')}}" alt="icon" />
                  <h4 class="font24Text clrBlack">Attach Photo</h4>
                </div>
              </div>
              <div class="uplaodCheckBtn">
                <a href="#" class="input-btn">Post <span><img src="{{ asset('public/assets/images/loginCheck_icon.png')}}')}}" alt="icon" /></span></a>
              </div>
            </div>
            <div class="col_grid12 ">
              <div class="form-group">
                <input type="text" name="Name" placeholder="Enter URL" class="form-control maxlength="100" size="100"">
              </div>
            </div>
            <div class="col_grid12 ">
              <div class="form-group">
                <textarea  name="text" placeholder="What do you want to write here?" class="form-control"></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>	
    </div>

<!----------------Popup Start----------------------->

<div class='modal personal_DtlPop' id='education_add_detail'>
      <div class="close fw">
        <a class='btn close-modal' data-modal="#education_add_detail" href="#"><img src="{{ asset('public/assets/images/close.png')}}" alt="icon"></a>
      </div>
      <form class="form_sec fw col_grid12" action="{{ url('add_student_education') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class='content fw'>
        <h3 class="modal_heading">Add Course</h3>
        <div class="form_sec fw ">
          <div class="innerrow">
            <div class="col_grid6">
              <div class="form-group">
                <label>School Name</label>
                <input type="text" name="school_name" placeholder="BSc in Cyber Security" class="form-control" maxlength="100" size="100" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Technology</label>
                <input type="text" name="technology" placeholder="technology" class="form-control" maxlength="100" size="100" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Percentage</label>
                <input type="text" name="percentage" placeholder="percentage" class="form-control" maxlength="100" size="100" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Year</label>
                <input type="text" name="year" placeholder="Ex. 2021-08-02" class="form-control" maxlength="100" size="100" required />
              </div>
            </div>
          </div>
          <div class="confirmApply fw">
            <button type="submit" class="input-btn" >Save</button>
          </div>
        </div>
      </div>
</form>	
    </div>





    <div class='modal personal_DtlPop' id='experience_add_detail'>
      <div class="close fw">
        <a class='btn close-modal' data-modal="#experience_add_detail" href="#"><img src="{{ asset('public/assets/images/close.png')}}" alt="icon"></a>
      </div>
      <form class="form_sec fw col_grid12" action="{{ url('add_student_experience') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class='content fw'>
        <h3 class="modal_heading">Add Experience</h3>
        <div class="form_sec fw ">
          <div class="innerrow">
            <div class="col_grid6">
              <div class="form-group">
                <label>Company Name</label>
                <input type="text" name="company_name" placeholder="ARK Newtech Private Limited" class="form-control" maxlength="100" size="100" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Profile Type</label>
                <input type="text" name="profile_type" placeholder="Backend Developer" class="form-control" maxlength="100" size="100" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Duration From</label>
                <input type="text" name="duration_from" placeholder="Ex. 2021-08-02" class="form-control" maxlength="100" size="100" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Duration To</label>
                <input type="text" name="duration_to" placeholder="Ex. 2023-08-02" class="form-control" maxlength="100" size="100" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Location</label>
                <input type="text" name="location"  class="form-control" required maxlength="100" size="100" />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Profile Image</label>
                <input type="file" name="image" class="form-control" maxlength="100" size="100" />
              </div>
            </div>
          </div>
          <div class="confirmApply fw">
            <button type="submit" class="input-btn" >Save</button>
          </div>
        </div>
      </div>
</form>	
    </div>



    <div class='modal personal_DtlPop' id='certificate_add_detail'>
      <div class="close fw">
        <a class='btn close-modal' data-modal="#certificate_add_detail" href="#"><img src="{{ asset('public/assets/images/close.png')}}" alt="icon"></a>
      </div>
      <form class="form_sec fw col_grid12" action="{{ url('add_student_certificate') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class='content fw'>
        <h3 class="modal_heading">Add Certificate</h3>
        <div class="form_sec fw ">
          <div class="innerrow">
            <div class="col_grid6">
              <div class="form-group">
                <label>Certificate Name</label>
                <input type="text" name="certificate_name"  maxlength="100" class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Certificate By</label>
                <input type="text" name="certificate_by"  maxlength="150" class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Year of Completetion</label>
                <input type="text" name="year_of_completion"  maxlength="150" class="form-control" required />
              </div>
            </div>
            
          </div>
          <div class="confirmApply fw">
            <button type="submit" class="input-btn" >Save</button>
          </div>
        </div>
      </div>
</form>	
    </div>



    <div class='modal personal_DtlPop' id='industry_add_detail'>
      <div class="close fw">
        <a class='btn close-modal' data-modal="#industry_add_detail" href="#"><img src="{{ asset('public/assets/images/close.png')}}" alt="icon"></a>
      </div>
      <form class="form_sec fw col_grid12" action="{{ url('add_student_industry') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class='content fw'>
        <h3 class="modal_heading">Add Industry</h3>
        <div class="form_sec fw ">
          <div class="innerrow">
            <div class="col_grid12">
              <div class="form-group">
                <label>Industry Name</label>
                <input type="text" name="industry_name"  maxlength="100" class="form-control" required />
              </div>
            </div>
           
            
          </div>
          <div class="confirmApply fw">
            <button type="submit" class="input-btn" >Save</button>
          </div>
        </div>
      </div>
</form>	
    </div>



    <div class='modal personal_DtlPop' id='business_add_detail'>
      <div class="close fw">
        <a class='btn close-modal' data-modal="#business_add_detail" href="#"><img src="{{ asset('public/assets/images/close.png')}}" alt="icon"></a>
      </div>
      <form class="form_sec fw col_grid12" action="{{ url('add_student_business') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class='content fw'>
        <h3 class="modal_heading">Add Business Function</h3>
        <div class="form_sec fw ">
          <div class="innerrow">
            <div class="col_grid12">
              <div class="form-group">
                <label>Business Function Name</label>
                <input type="text" name="business_function_name"  maxlength="150" class="form-control" required />
              </div>
            </div>
           
            
          </div>
          <div class="confirmApply fw">
            <button type="submit" class="input-btn" >Save</button>
          </div>
        </div>
      </div>
</form>	
    </div>



    <div class='modal personal_DtlPop' id='hobbies_add_detail'>
      <div class="close fw">
        <a class='btn close-modal' data-modal="#hobbies_add_detail" href="#"><img src="{{ asset('public/assets/images/close.png')}}" alt="icon"></a>
      </div>
      <form class="form_sec fw col_grid12" action="{{ url('add_student_hobby') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class='content fw'>
        <h3 class="modal_heading">Add Hobbies & Interests</h3>
        <div class="form_sec fw ">
          <div class="innerrow">
            <div class="col_grid12">
              <div class="form-group">
                <label>Hobby Name</label>
                <input type="text" name="hobby_name"  maxlength="100" class="form-control" required />
              </div>
            </div>
           
            
          </div>
          <div class="confirmApply fw">
            <button type="submit" class="input-btn" >Save</button>
          </div>
        </div>
      </div>
</form>	
    </div>



    <div class='modal personal_DtlPop' id='accomplishment_add_detail'>
      <div class="close fw">
        <a class='btn close-modal' data-modal="#accomplishment_add_detail" href="#"><img src="{{ asset('public/assets/images/close.png')}}" alt="icon"></a>
      </div>
      <form class="form_sec fw col_grid12" action="{{ url('add_student_accomplishment') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class='content fw'>
        <h3 class="modal_heading">Add Accomplishment</h3>
        <div class="form_sec fw ">
          <div class="innerrow">
            <div class="col_grid6">
              <div class="form-group">
                <label>Course Name</label>
                <input type="text" name="course_name"  maxlength="100" class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Award</label>
                <input type="text" name="award" class="form-control"  maxlength="100" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Test Scores</label>
                <input type="text" name="test_scores" class="form-control"  maxlength="100" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Publications</label>
                <input type="text" name="publications" class="form-control"  maxlength="100" required />
              </div>
            </div>
          </div>
          <div class="confirmApply fw">
            <button type="submit" class="input-btn" >Save</button>
          </div>
        </div>
      </div>
      </form>	
    </div>



    <div class='modal personal_DtlPop' id='createNewPost'>
      <div class="close fw">
        <a class='btn close-modal' data-modal="#createNewPost" href="#"><img src="{{ asset('public/assets/images/close.png')}}" alt="icon"></a>
      </div>
      <form class="form_sec fw col_grid12" action="{{ url('add_post') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class='content fw'>
            <h3 class="modal_heading">Add Post</h3>
            <div class="form_sec fw ">
              <div class="innerrow">
                <div class="col_grid12 upload_box_sec">
                  <div class="uploadBox">
                    <input type="file"  name="image" />
                    <div class="file_cont">
                      <img src="{{ asset('public/assets/images/attach_img.png')}}" alt="icon" />
                      <h4 class="font24Text clrBlack">Attach Photo</h4>
                    </div>
                  </div>
                  <div class="uplaodCheckBtn">
                    <button type="submit" class="input-btn">Post <span><img src="{{ asset('public/assets/images/loginCheck_icon.png')}}" alt="icon" /></span></button>
                  </div>
                </div>
                <div class="col_grid12">
                  <div class="form-group">
                    <label>Post Title</label>
                    <input type="text" name="post_title" class="form-control"  maxlength="200" required />
                  </div>
                </div>
                <div class="col_grid12">
                  <div class="form-group">
                    <label>Post Details</label>
                    <textarea name="post_details" class="form-control"  maxlength="400" required></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>	
    </div>

    

<!----------------Popup end----------------------->


    <script src="{{ asset('public/assets/web_assets/js/jquery-lb.js')}}"></script>
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

  // Iterate over each select element
$('select').each(function () {

// Cache the number of options
var $this = $(this),
    numberOfOptions = $(this).children('option').length;

// Hides the select element
$this.addClass('s-hidden');

// Wrap the select element in a div
$this.wrap('<div class="select"></div>');

// Insert a styled div to sit over the top of the hidden select element
$this.after('<div class="styledSelect"></div>');

// Cache the styled div
var $styledSelect = $this.next('div.styledSelect');

// Show the first select option in the styled div
$styledSelect.text($this.children('option').eq(0).text());

// Insert an unordered list after the styled div and also cache the list
var $list = $('<ul />', {
    'class': 'options'
}).insertAfter($styledSelect);

// Insert a list item into the unordered list for each select option
for (var i = 0; i < numberOfOptions; i++) {
    $('<li />', {
        text: $this.children('option').eq(i).text(),
        rel: $this.children('option').eq(i).val()
    }).appendTo($list);
}

// Cache the list items
var $listItems = $list.children('li');

// Show the unordered list when the styled div is clicked (also hides it if the div is clicked again)
$styledSelect.click(function (e) {
    e.stopPropagation();
    $('div.styledSelect.active').each(function () {
        $(this).removeClass('active').next('ul.options').hide();
    });
    $(this).toggleClass('active').next('ul.options').toggle();
});

// Hides the unordered list when a list item is clicked and updates the styled div to show the selected list item
// Updates the select element to have the value of the equivalent option
$listItems.click(function (e) {
    e.stopPropagation();
    $styledSelect.text($(this).text()).removeClass('active');
    $this.val($(this).attr('rel'));
    $list.hide();
    /* alert($this.val()); Uncomment this for demonstration! */
});

// Hides the unordered list when clicking outside of it
$(document).click(function () {
    $styledSelect.removeClass('active');
    $list.hide();
});

});
   </script>
   <script>
     $('#profileTab_link li a:not(:first)').addClass('inactive');
$('.profileTab_contBox').hide();
$('.profileTab_contBox:first').show();
$('#profileTab_link li a').click(function(){
    var t = $(this).attr('href');
    $('#profileTab_link li a').addClass('inactive');        
    $(this).removeClass('inactive');
    $('.profileTab_contBox').hide();
    $(t).fadeIn('slow');
    return false;
})

if($(this).hasClass('inactive')){ //this is the start of our condition 
    $('#profileTab_link li a').addClass('inactive');         
    $(this).removeClass('inactive');
    $('.profileTab_contBox').hide();
    $(t).fadeIn('slow');    
}

   </script>
   <script>
    $(' .menu_right li').click(function() {
       $(' .menu_right li').removeClass('active');
     $(this).addClass('active');
   });
  </script>
  </body>
</html>

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
        
        
     @if($OrgData->users_role == 2)
                @include('fruntend.student.inc.top-menu')
            @else
                @include('fruntend.common_pages.web_header')  
            @endif     
        
        
      </div>
    </header>
    
    @if(Session::has('success_msg'))
            <div class="col_grid8" style="color:green">
            {{ Session::get('success_msg') }}
              </div>
              @endif 

              @if ($errors->any())
              @foreach ($errors->all() as $error)
              <div class="form-group">
              <div class="col_grid8" style="color:red">{{ $error }}</div></div>
                         @endforeach 
                         @endif


              <div class="body_wht-inners ">
      <div class="middle_container settingContainer">
        <h3 class="siteheading">Settings <span class="pull-right"><a href="{{ url('/logout') }}" onClick="event.preventDefault();  document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                {{ csrf_field() }}
              </form>
      </span></h3>
        <div class="settingBox fw">
          <div class="innerrow">
            <div class="col_grid7 text-left">
              <h4>Language</h4>
              <p>Choose the language</p>
            </div>
            <div class="col_grid5 text-right ">
              <div class="unlock_sec">
                <div class="form_group fw">
                  <div class="select">
                    <select class="form-contorl fw" id="selectbox1">
                      <option>English</option>
                      <option>Hindi</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="settingBox fw">
          <div class="innerrow">
            <div class="col_grid7 text-left">
              <h4>Notification(s)</h4>
              <p>Receive notifications when someone interacts with <br />your posts, messages you or views your profile!</p>
            </div>
            <div class="col_grid5 text-right">
              <div class="rightPublic text-right fw">
                <div class="profileToggle">
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
        <div id="pub-accordion">
          <div class="settingBox fw">
            <div class="innerrow">
              <div class="col_grid12 text-left">
                <h4>Change Email Address</h4>
                <p>Edit or add another email address</p>
                <div class="toggleArrow pub-accordion-toggle closed">
                  <a ><img src="{{ asset('public/assets/images/arrow_down_grey.png')}}" alt="icon"></a>
                </div>
                <div class="form_sec pub-accordion-content fw">
                  <form method="post" action="{{url('change-student-email')}}">
                  @csrf
                  <div class="form-group fw">
                    <input class="form-control" name="email" type="email" value="{{$OrgData->email}}" maxlength="50" required />
                    <button type="submit" class="inputcheck verifyFont">Change</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="settingBox fw">
            <div class="innerrow">
              <div class="col_grid12 text-left">
                <h4>Change Phone Number</h4>
                <p>Edit or add another phone number</p>
                <div class="toggleArrow  pub-accordion-toggle closed">
                  <a><img src="{{ asset('public/assets/images/arrow_down_grey.png')}}" alt="icon"></a>
                </div>
                <div class="form_sec pub-accordion-content fw">
                <form method="post" action="{{url('change-student-phone')}}">
                  @csrf
                  <div class="form-group fw">
                    <input class="form-control" name="phone" value="{{$OrgData->phone}}" required="" maxlength="10" onkeyup="this.value=this.value.replace(/[^\d]/,'')" />
                    <button type="submit" class="inputcheck verifyFont">Change</button>
                  </div>
                  </form>
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
                <input type="text" name="Name" placeholder="Enter URL" class="form-control">
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
                <input type="text" name="school_name" placeholder="BSc in Cyber Security" class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Technology</label>
                <input type="text" name="technology" placeholder="technology" class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Percentage</label>
                <input type="text" name="percentage" placeholder="percentage" class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Year</label>
                <input type="text" name="year" placeholder="Ex. 2021-08-02" class="form-control" required />
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
                <input type="text" name="company_name" placeholder="ARK Newtech Private Limited" class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Profile Type</label>
                <input type="text" name="profile_type" placeholder="Backend Developer" class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Duration From</label>
                <input type="text" name="duration_from" placeholder="Ex. 2021-08-02" class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Duration To</label>
                <input type="text" name="duration_to" placeholder="Ex. 2023-08-02" class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Location</label>
                <input type="text" name="location"  class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Profile Image</label>
                <input type="file" name="image" class="form-control" />
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
                <input type="text" name="certificate_name"  class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Certificate By</label>
                <input type="text" name="certificate_by"  class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Year of Completetion</label>
                <input type="text" name="year_of_completion"  class="form-control" required />
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
                <input type="text" name="industry_name"  class="form-control" required />
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
                <input type="text" name="business_function_name"  class="form-control" required />
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
                <input type="text" name="hobby_name"  class="form-control" required />
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
                <input type="text" name="course_name" class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Award</label>
                <input type="text" name="award" class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Test Scores</label>
                <input type="text" name="test_scores" class="form-control" required />
              </div>
            </div>
            <div class="col_grid6 ">
              <div class="form-group">
                <label>Publications</label>
                <input type="text" name="publications" class="form-control" required />
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
          <div class="col_grid12">
              <div class="form-group">
                <label>Post Title</label>
                <input type="text" name="post_title" class="form-control" required />
              </div>
            </div>
            <div class="col_grid12">
              <div class="form-group">
                <label>Post Details</label>
                <textarea name="post_details" class="form-control" required></textarea>
              </div>
            </div>
            <div class="col_grid12">
              <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control"  />
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



    <div class='modal resumeUpload_popup' id='resumeUpload'>
    <?php
$userid = Session::get('gorgID');
$res = DB::table('student_resume')->where('student_id', $userid)->first();
?>
      <div class="close fw">
        <a class='btn close-modal' data-modal="#resumeUpload"><img src="{{ asset('public/assets/images/close.png')}}" alt="icon"></a>
      </div>
      <form class="form_sec fw col_grid12" action="{{ url('upload_student_resume') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class='content fw'>
        <h3 class="modal_heading">Resume Attachment</h3>
        <div class="innerrow">
          <div class="col_grid6">
            @if(!empty($res->image))
            <figure class="resumeimg">
              <iframe src="{{ asset('public/assets/student_image/'.$res->image) }}" width="300" height="300"></iframe>
            </figure>
            
            <span class="fw"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> {{$res->image}}</span>
            @endif
           <div class="innerrow">
           
           </div>
          </div>
          <div class="col_grid6 text-center">
            @if(!empty($res->updated_at))
            <h5>Last updated on {!! date('d M Y', strtotime($res->updated_at)) !!}</h5>
            @endif
            <div class="custome_uplaodresume">
              <div class="inputgroup">
                <input type="file" name="image" class="uploadbtn" required>
                <span>Update Resume</span>
              </div>
            </div>
          </div>
          <div class="confirmApply fw">
            <button type="submit" class="input-btn text-center">Confirm & Apply</button>
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

$(document).ready(function() {
  $('.pub-accordion-content').hide();

  $('#pub-accordion').find('.pub-accordion-toggle').click(function() {

    var $this = $(this);
    var toOpen = $this.hasClass("open");
    $('h4').removeClass("open").addClass("closed");


    //Toggle icon
    if (!toOpen) {
      $this.removeClass("closed").addClass("open");
    }

    //Expand or collapse this panel
    $this.next().slideToggle('fast')

    //Hide the other panels
    $(".pub-accordion-content").not($this.next()).slideUp('fast');
  });
});

   </script>
   
   <script>
    $(' .menu_right li').click(function() {
       $(' .menu_right li').removeClass('active'); 
     $(this).addClass('active');
   });
  </script>
  
<script type="text/javascript">
    $(".k-switch").click(function () {
     var self = $(this);
      if(self.hasClass("on")) {
         self.removeClass("on");
      } else {
        self.addClass("on");
      }
    });  
  </script>
  </body>
</html>
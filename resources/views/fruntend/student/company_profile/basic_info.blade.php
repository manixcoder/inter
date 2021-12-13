@include('fruntend.common_pages.web_header')
@include('fruntend.recruiter_profile_section.recruiter_basicinfo_sub_menues')

@php
$userRole = Session::get('userRole');
$id = Session::get('gorgID');
$recruiterInfo = DB::table('users')->where('id', $id)->first();
@endphp

<!-- Recruiter Basic info section -->
<div class="profileTab_contBox" id="profileTab_link0">
  <div class="comProInfo_cont fw">
    <div class="innerrow">
      <form class="form_sec fw col_grid12" action="{{ URL::to('edit/recruiter/profile')}}" method="POST" id="FormValidation" enctype="multipart/form-data">
        @csrf
        <div class="fw praDesignation">
          <p>Basic Info is only visible to your internal company as well as the admin.</p>
        </div>
        <div class="innerrow">
          <div class="col_grid6 ">
            <div class="form-group">
              <label>Your Full Name</label>
              <input type="hidden" name="edit_id" value="{{ $recruiterInfo->id }}">
              <input type="text" id="recruiterid_name" name="name" placeholder="" class="form-control" value="{{ $recruiterInfo->name ?? '' }}" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required="" maxlength="100">

              <span style="display:none; color: red;" class="val_name">Please enter name.</span>
            </div>
          </div>
          <div class="col_grid6 ">
            <div class="form-group">
              <label>Designation</label>
              <input type="text" id="designation" name="designation" placeholder="" class="form-control" value="{{ $recruiterInfo->designation ?? ''}}" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required="" maxlength="100">
              <span style="display:none; color: red;" class="vardesignaion">Please enter designation.</span>
            </div>
          </div>
          <div class="col_grid6 ">
            <div class="form-group">
              <label>Mobile Number</label>
              <input type="text" name="phone" class="form-control" onkeyup="this.value=this.value.replace(/[^\d]/,'')" placeholder="Enter your mobile number" class="form-control" required maxlength="10" value="{{ $recruiterInfo->phone }}" readonly="" />

              <span class="inputcheck"><img src="{{ asset('public/assets/images/verified.png')}}" alt="icon"></span>
            </div>
          </div>
          <div class="col_grid6 ">
            <div class="form-group">
              <label>Official Email Address</label>
              <input type="text" name="email" placeholder="" id='txtEmail' class="email form-control" value="{{ $recruiterInfo->email ?? ''}}" required="" maxlength="100" readonly="">
              <span class="inputcheck"><img src="{{ asset('public/assets/images/verified.png')}}" alt="icon"></span>
              <span style="display:none; color: red;" class="emailvalidation">Enter valid email address.!</span>
              <span style="display:none; color: red;" class="emailvalidation1">Please Enter email address.!</span>
            </div>
          </div>

          <!-- <div class="col_grid6 ">
            <div class="form-group">
              <label>Profile Image</label>
               <input type="file" name="org_image" >              
            </div>
          </div> -->

          <!-- <div class="col_grid6 ">
            <div class="form-group">
              <label>Banner Image</label>
               <input type="file" name="profile_image" >              
            </div>
          </div> -->
          <div class="confirmApply postjob_btn col_grid12 fw">
            <button type="submit" class="input-btn text-left" id='btnValidate' data-modal="#createNewPostrecuriter">
              Edit Info
              <i>
                <img src="{{ asset('public/assets/images/edit_info.png')}}" alt="icon">
              </i>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function(e) {
    $('#btnValidate').click(function() {
      var val_recruiter_name = $('#recruiterid_name').val();
      if ($.trim(val_recruiter_name).length == 0) {
        $('.val_name').show();
        setTimeout(function() {
          $('.val_name').hide();
        }, 3000);
        return false;
      } else {
        return true;
      }
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(e) {
    $('#btnValidate').click(function() {
      var var_desination = $('#designation').val();
      if ($.trim(var_desination).length == 0) {
        $('.vardesignaion').show();
        setTimeout(function() {
          $('.vardesignaion').hide();
        }, 3000);
        return false;
      } else {
        return true;
      }
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(e) {
    $('#btnValidate').click(function() {
      var sEmail = $('#txtEmail').val();
      if ($.trim(sEmail).length == 0) {
        $('.emailvalidation1').show();
        setTimeout(function() {
          $('.emailvalidation1').hide();
        }, 3000);
        return false;
      }
      if (validateEmail(sEmail)) {} else {
        $('.emailvalidation').show();
        setTimeout(function() {
          $('.emailvalidation').hide();
        }, 3000);


        return false;
      }
    });
  });

  function validateEmail(sEmail) {
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
      return true;
    } else {
      return false;
    }
  }
</script>

<!-- User pofile validation End-->
<!-- image viewer -->
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
  @include('fruntend.common_pages.web_header')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


  <style>
    /* Popup box BEGIN */
    .hover_bkgr_fricc {
      background: rgba(0, 0, 0, .4);
      cursor: pointer;
      display: none;
      height: 100%;
      position: fixed;
      text-align: center;
      top: 0;
      width: 100%;
      z-index: 10000;
    }

    .hover_bkgr_fricc .helper {
      display: inline-block;
      height: 100%;
      vertical-align: middle;
    }

    .hover_bkgr_fricc>div {
      background-color: #fff;
      box-shadow: 10px 10px 60px #555;
      display: inline-block;
      height: auto;
      max-width: 551px;
      min-height: 100px;
      vertical-align: middle;
      width: 60%;
      position: relative;
      border-radius: 8px;
      padding: 15px 5%;
    }

    .popupCloseButton {
      background-color: #fff;
      border: 3px solid #999;
      border-radius: 50px;
      cursor: pointer;
      display: inline-block;
      font-family: arial;
      font-weight: bold;
      position: absolute;
      top: -20px;
      right: -20px;
      font-size: 25px;
      line-height: 30px;
      width: 30px;
      height: 30px;
      text-align: center;
    }

    .popupCloseButton:hover {
      background-color: #ccc;
    }

    .trigger_popup_fricc {
      cursor: pointer;
      font-size: 20px;
      margin: 20px;
      display: inline-block;
      font-weight: bold;
    }

    /* Popup box BEGIN */
  </style>

  <div class="body_wht-inners ">
    <div class="newPostJob_pg fw">
      <div class="middle_container">
        <div class=" arrowheading_site text-left right_after_arrow afterHide_arrow">
          <h3>Post A New Job</h3>
        </div>
        <div class="form_sec fw">

         

          <form action="{{ URL::to('add-job')}}" method="POST" id="FormValidation" name="postJob" enctype="multipart/form-data">
            @csrf
            <div class="innerrow">
              <div class="col_grid12 upload_box_sec">
                <div class="uploadBox">
                  <input type="file" name="logo" onchange="loadFile(event)" accept="image/png, image/gif, image/jpeg" required>
                  <div class="file_cont">
                    <img src="{{ asset('public/assets/images/attach_img.png')}}" id="output" alt="icon" class="jobpostnew-file" />
                    <h4 class="font24Text clrBlack">Attach any organization or work culture photo (It's optional)</h4>
                  </div>
                </div>
              </div>
              <div class="col_grid12 ">
                <div class="form-group newform-control">
                  <label>Write Job Title</label>
                  <!--select name="job_title" class="form-contorl" id="job_title" required>
                        <option value="">Select Job Title</option>                        
                        <option value="Sales & Marketing Executive">Sales & Marketing Executive</option>
                        <option value="Front-end Developer">Front-end Developer</option>
                        <option value="Financial Analyst">Financial Analyst</option>
                      </select -->
                  <input type="text" name="job_title" class="form-control" id="job_title" required>
                </div>
              </div>
              <div class="col_grid6 ">
                <div class="form-group newform-control">
                  <label>Job Location</label>
                  <!-- <select name="location" class="form-contorl" id="location"  required>
                        <option value="">Select Location</option>                        
                        <option value="Mumbai">Mumbai</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Bangalore">Bangalore</option>
                        <option value="Pune">Pune</option>
                        <option value="Mohali">Mohali</option>
                        <option value="Chandigarh">Chandigarh</option>
                        <option value="Hydrabad">Hydrabad</option>
                      </select> -->
                  <input type="text" name="location" class="form-control" id="location" required>
                </div>
              </div>



              <div class="col_grid6 ">
                <div class="form-group newform-control">
                  <label>Salary (Optional)</label>
                  <div class="form_dev">
                    <div class="inr_opction">
                      <select name="currency">
                        <!--option selected="" value="">Select Currency</option -->
                        <option selected="" value="INR">INR</option>
                        <option value="USD">USD</option>
                      </select>
                    </div>
                    <div class="input_sec">
                      <input type="number" name="salary" placeholder="Enter Salary" class="form-control" onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="10">
                    </div>
                  </div>
                </div>
              </div>



              <div class="col_grid12 ">
                <div class="form-group newoffer">
                  <label>Job Offers</label>
                  <input type="text" name="offer[]" placeholder="Job Offer" class="form-control" maxlength="100"  required>
                  <div id="offer_add" style="margin-top: 10px;display: inline-block;width: 100%;"></div>
                </div>
              </div>
              <div class="col_grid12 ">
                <div id="moreoffer">
                  <span class="pull-right font20Text" id="add_more">
                    <i>
                      <img src="{{ asset('public/assets/images/add.png') }}" alt="img">
                    </i>
                    Add More Offer
                  </span>
                </div>
              </div>
              <div class="col_grid12 ">

                <div class="form-group">
                  <label>Job Description</label>
                </div>
              </div>
              <div class="col_grid12 ">

                <div class="form-group">


                  <textarea class="form-control" name="job_description" id='job_description'></textarea>
                </div>
              </div>

              <div class="col_grid12 upload_box_sec jobUpload_sec">
                <div class="uploadBox">
                  <input type="file" name="acttachPhoto" accept=".pdf,.docx" />
                  <div class="file_cont fileupload2">
                    <img src="{{ asset('public/assets/images/upload_file.png')}}" id="output2" alt="icon" />
                    <h4 class="font24Text clrBlack">Drag and drop or upload a file (It's optional)</h4>
                  </div>
                </div>
              </div>

              <div class="confirmApply postjob_btn col_grid12 fw">
                <button type="submit" class="input-btn text-left" data-modal="#jobPostPopup">
                  Post Job <i><img src="{{ asset('public/assets/images/loginCheck_icon.png')}}" alt="icon" /></i>
                </button>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>







  @include('fruntend.common_pages.web_footer')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
  <script type="text/javascript">
    CKEDITOR.replace('job_description');
  </script>


  <script>
    $(function() {
      // Initialize form validation on the registration form.
      // It has the name attribute "registration"
      $("form[name='postJob']").validate({
        // Specify validation rules
        rules: {
          // The key name on the left side is the name attribute
          // of an input field. Validation rules are defined
          // on the right side
          job_title: "required",
          location: "required",
          job_description: "required",
          email: {
            required: true,
            // Specify that email should be validated
            // by the built-in "email" rule
            email: true
          },
          password: {
            required: true,
            minlength: 5
          }
        },
        // Specify validation error messages
        messages: {
          job_title: "Please enter your job title",
          location: "Please enter your location",
          job_description: "Please enter your job description",
          password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
          },
          email: "Please enter a valid email address"
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
          form.submit();
        }
      });
    });
  </script>
  <script>
    $(document).ready(function() {


      $("#add_more").click(function() {
        $("#offer_add").append('<input  type="text" name="offer[]" style="margin-top: 10px;display: inline-block;width: 100%;" placeholder="Job Offer" class="form-control" required="" maxlength="100">');
      });
    });
  </script>

  <script>
    /* Script for success popup */
    $(document).ready(function() {
      $('.hover_bkgr_fricc').show();
    });
    $('.hover_bkgr_fricc').click(function() {
      $('.hover_bkgr_fricc').hide();
    });
    $('.popupCloseButton').click(function() {
      $('.hover_bkgr_fricc').hide();
    });
    var loadFile = function(event) {
      var output = document.getElementById('output');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
      }
    };
    var loadFile2 = function(event) {
      var output = document.getElementById('output2');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
      }
    };
  </script>
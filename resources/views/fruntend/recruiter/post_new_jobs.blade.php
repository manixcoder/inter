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
         
          @if(Session::has('status'))
          <div class="hover_bkgr_fricc resumeUpload_popup successfullyModalPopup">
            <div class='content fw'>
              <div class="imgcheck_icon fw">
                <img src="{{ asset('public/assets/images/succcessfull.png')}}" alt="icon" />
              </div>
              <h3 class="">Job Posted Successfully</h3>
              <!--p>Recruiter will contact you through <br />your email or mobile number.</p -->
            </div>
          </div>
          <?php 
         // sleep(10);
          ?>
          <!-- <script type="text/javascript">
            window.location = "{{ URL::to('/recruiter-listings') }}";//here double curly bracket
            </script> -->
         
          
          @endif

          <form action="{{ URL::to('add-job')}}" method="POST" id="FormValidation" enctype="multipart/form-data">
            @csrf
            <div class="innerrow">
              <div class="col_grid12 upload_box_sec">
                <div class="uploadBox">
                  <input type="file" name="logo" onchange="loadFile(event)">
                  <div class="file_cont">
                    <img src="{{ asset('public/assets/images/attach_img.png')}}" id="output" alt="icon" class="jobpostnew-file" />
                    <h4 class="font24Text clrBlack">Attach any organization or work culture photo (It's optional)</h4>
                  </div>
                </div>
              </div>
              <div class="col_grid12 ">
                <div class="form-group">
                  <label>Write Job Title</label>
                  <select name="job_title" class="form-contorl" id="selectbox2">
                        <option value="">Select Job Title</option>                        
                        <option value="Sales & Marketing Executive">Sales & Marketing Executive</option>
                        <option value="Front-end Developer">Front-end Developer</option>
                        <option value="Financial Analyst">Financial Analyst</option>
                      </select>
                  <!-- <input type="text" name="job_title" placeholder="" class="form-control" required="" maxlength="100"> -->
                </div>
              </div>
              <div class="col_grid6 ">
                <div class="form-group">
                  <label>Job Location</label>
                  <!-- <input type="text" name="location" placeholder="" class="form-control" required="" maxlength="100"> -->
                  <select name="location" class="form-contorl" id="selectbox2">
                        <option value="">Select Location</option>                        
                        <option value="Mumbai">Mumbai</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Bangalore">Bangalore</option>
                        <option value="Pune">Pune</option>
                        <option value="Mohali">Mohali</option>
                        <option value="Chandigarh">Chandigarh</option>
                        <option value="Hydrabad">Hydrabad</option>
                      </select>
                </div>
              </div>

              <!-- div class="col_grid6 ">
                <div class="form-group">
                  <label>Salary (Optional)</label>
                  <input type="text" name="salary" placeholder="Enter Salary" class="form-control" onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="10">
                </div>
              </div -->

              <div class="col_grid6 ">
                <div class="form-group">
                  <label>Salary (Optional)</label>
                  <div class="form_dev">
                    <div class="inr_opction">
                      <select name="currency">
                        <!--option selected="" value="">Select Currency</option -->
                        <option selected="" value="INR">INR</option>
                        <option value="doller">doller</option>
                      </select>
                    </div>
                    <div class="input_sec">
                      <input type="number" name="salary" placeholder="Enter Salary" class="form-control" onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="10">
                    </div>
                  </div>
                </div>
              </div>

              <!--  <div class="col_grid6 ">
                  <div class="form-group">
                    <label>Salary (Optional)</label>
                    <div class="form_dev">
                      <div class="inr_opction">
                        <select name="salary" required="">
                          <option selected>INR</option>
                          <option >INR</option>
                          <option >INR</option>
                        </select>
                      </div>
                      <div class="input_sec">
                        <input type="number" name="" placeholder="" class="form-control">
                      </div>
                    </div>
                  </div>
                </div> -->

              <div class="col_grid12 ">
                <div class="form-group newoffer">
                  <label>Job Offers</label>
                  <input  type="text" name="offer[]" placeholder="Job Offer" class="form-control" required="" maxlength="100">
                  <div id="offer_add" style="margin-top: 10px;display: inline-block;width: 100%;"></div>
                </div>
              </div>

              <div class="col_grid12 ">
                <div class="form-group">
                  <label>Job Description
                    <div id="moreoffer">
                      <span class="pull-right font20Text" id="add_more">
                        <i>
                          <img src="{{ asset('public/assets/images/add.png') }}" alt="img">
                        </i>
                        Add More Offer Point
                      </span>
                    </div>
                  </label>
                  <textarea class="form-control" name="job_description"></textarea>
                </div>
              </div>

              <div class="col_grid12 upload_box_sec jobUpload_sec">
                <div class="uploadBox">
                  <input type="file" name="acttachPhoto" onchange="loadFile2(event)" />
                  <div class="file_cont fileupload2">
                    <img src="{{ asset('public/assets/images/upload_file.png')}}" id="output2" alt="icon" />
                    <h4 class="font24Text clrBlack">Attach any organization or work culture photo (It's optional)</h4>
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

  <div class="popupWapper ">
    <div class="modal jobPostPopup_sec" id="jobPostPopup">
      <div class="content fw">
        <?php
        $userid = Session::get('gorgID');
        $loginUser = DB::table('users')->where('id', $userid)->first();
        $jobsData = DB::table('jobs')->where('user_id', $userid)->orderBy('id', 'desc')->first();
        ?>
        <div class="boxDetailbg fw">
          <figure>
            <img src="{{ asset('public/uploads')}}/" alt="jobs">
          </figure>
        </div>
        <div class="jobsDetailProfile text-left fw">
          <div class="innerrow">
            <div class="col_grid12">
              <div class="jobsDetailComp_img">
                <img src="{{ asset('public/uploads')}}" alt="newtechlogo">
              </div>
              <div class="jobsDetailComp_cont text-left">
                <h3>{{ $loginUser->org_name }}</h3>
                <h3><a href="#" class="lightblue_text">job_title</a></h3>
                <p>location</p>
                <p class="bold">offer</p>
              </div>
            </div>
            <div class="jobDescriptions_sec text-left fw">
              <h3 class="borderBox_heading">Offer</h3>
              <ul>
                <li>offer</li>
                <!--li>Be part of a dynamic and supportive work environment</li -->
              </ul>
            </div>
            <div class="jobDescriptions_sec text-left fw">
              <h3 class="borderBox_heading">Job Descriptions</h3>
              <p>job_description</p>

              <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software. </p>
              <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
             -->
            </div>
            <div class="confirmApply postjob_btn col_grid12 fw">
              <span class="confirbtn_span redconfirbtn">
                <a href="javascript:void(0);" class="input-btn text-left ">
                  Back to Edit
                  <i>
                    <img src="{{ asset('public/assets/images/back_to_edit.png')}}" alt="icon">
                  </i>
                </a>
              </span>
              <span class="confirbtn_span">
                <a href="javascript:void(0);" class="input-btn text-left open-modal  " data-modal="#savesuccessfullyModal">
                  Confirm &amp; Post<i>
                    <img src="{{ asset('public/assets/images/loginCheck_icon.png')}}" alt="icon"></i></a></span>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="popupWapper">
    <div class="modal resumeUpload_popup successfullyModalPopup open" id="savesuccessfullyModal">
      <div class="content fw">
        <div class="imgcheck_icon fw">
          <img src="{{ asset('public/assets/images/succcessfull.png') }}" alt="icon">
        </div>
        <h3 class="">Job Posted Successfully</h3>
        <p>You will be notified when <br>candidates apply for this opening.</p>
      </div>
    </div>
  </div>



  @include('fruntend.common_pages.web_footer')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
$(document).ready(function(){
  

  $("#add_more").click(function(){
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
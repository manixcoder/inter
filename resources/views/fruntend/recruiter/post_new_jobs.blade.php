  @include('fruntend.common_pages.web_header')  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="jquery-3.5.1.min.js"></script>
  
    <style>
        /* Popup box BEGIN */
.hover_bkgr_fricc{
    background:rgba(0,0,0,.4);
    cursor:pointer;
    display:none;
    height:100%;
    position:fixed;
    text-align:center;
    top:0;
    width:100%;
    z-index:10000;
}
.hover_bkgr_fricc .helper{
    display:inline-block;
    height:100%;
    vertical-align:middle;
}
.hover_bkgr_fricc > div {
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

            @if(session()->has('success'))
                <div class="hover_bkgr_fricc resumeUpload_popup successfullyModalPopup">
                    <div class='content fw'>
                        <div class="imgcheck_icon fw">
                          <img src="{{ asset('public/assets/images/succcessfull.png')}}" alt="icon" />
                        </div>
                        <h3 class="">Job Posted Successfully</h3>
                        <p>Recruiter will contact you through <br />your email or mobile number.</p>
                    </div>
                </div>
            @endif

            <form  action="{{ URL::to('add-job')}}" method="POST" id="FormValidation" enctype="multipart/form-data">
              @csrf
              <div class="innerrow">
                <div class="col_grid12 upload_box_sec">
                  <div class="uploadBox">
                    <input type="file" name="logo" onchange="loadFile(event)"  required="">
                    <div class="file_cont">
                      <img src="{{ asset('public/assets/images/attach_img.png')}}" id="output" alt="icon" class="jobpostnew-file" />
                      <h4 class="font24Text clrBlack">Attach any organization or work culture photo (It's optional)</h4>
                    </div>
                  </div>
                </div>
                <div class="col_grid12 ">
                  <div class="form-group">
                    <label>Write Job Title</label>
                    <input type="text" name="job_title" placeholder="" class="form-control" required="" maxlength="100">
                  </div>
                </div>
                <div class="col_grid6 ">
                  <div class="form-group">
                    <label>Job Location</label>
                    <input type="text" name="location" placeholder="" class="form-control" required="" maxlength="100">
                  </div>
                </div>

                 <div class="col_grid6 ">
                  <div class="form-group">
                    <label>Salary (Optional)</label>
                    <input type="text" name="salary" placeholder="Enter Salary" class="form-control" onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="10">
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
                  <div class="form-group">
                    <label>Job Offers</label>
                    <input type="text" name="offer" placeholder="Job Offer" class="form-control" required="" maxlength="100">
                  </div>
                </div>
               
                <div class="col_grid12 ">
                  <div class="form-group">
                    <label>Job Description</label>
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
    

    
      @include('fruntend.common_pages.web_footer')  
      <script>
    /* Script for success popup */
        $( document ).ready(function() {
               $('.hover_bkgr_fricc').show();
            });
            $('.hover_bkgr_fricc').click(function(){
                $('.hover_bkgr_fricc').hide();
            });
            $('.popupCloseButton').click(function(){
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
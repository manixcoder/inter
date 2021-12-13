@include('fruntend.common_pages.web_header')  
@include('fruntend.recruiter_profile_section.recruiter_basicinfo_sub_menues') 
@php 

    $userRole = Session::get('userRole');
    $id = Session::get('gorgID');
    $recruiterInfo = DB::table('users')->where('id', $id)->first();
@endphp
<!-- Recruiter About section -->
          <div class="profileTab_contBox basicTab_contBox" id="profileTab_link1">
            <form class="form_sec fw col_grid12" action="{{ URL::to('edit/recruiter/about')}}" method="POST" id="FormValidation" enctype="multipart/form-data">
                @csrf
              <div class="innerrow">
                <div class="col_grid12 ">
                  <div class="form-group">
                    <label>Overview</label>
                    <input type="hidden" name="edit_id" value="{{ $recruiterInfo->id }}">
                    <textarea name="requirter_overview" id="requirter_overview" cols="100" rows="200" class="form-control" maxlength="500">{{ $recruiterInfo->requirter_overview }}</textarea>
                    <span style="display:none; color: red;" class="val_verview">Please enter overview.</span>
                  </div>
                </div>
                <div class="col_grid12 ">
                  <div class="form-group">
                    <label>Website</label>
                    <input type="text" name="website" id="website" placeholder="" class="form-control" value="{{ $recruiterInfo->website ?? ''}}" maxlength="100">
                    <span style="display:none; color: red;" class="val_website">Please enter website.</span>
                  </div>
                </div>
                <div class="col_grid6 ">
                  <div class="form-group">
                    <label>Industry</label>
                    <input type="text" name="industry" id="industry" placeholder="" class="form-control" value="{{ $recruiterInfo->industry ?? ''}}" maxlength="100">

                    <span style="display:none; color: red;" class="val_industry">Please enter industry.</span>
                  </div>
                </div>
                <div class="col_grid6 ">
                  <div class="form-group">
                    <label>Company size</label>
                    <input type="text" name="company_size" id="company_size" placeholder="" class="form-control" value="{{ $recruiterInfo->company_size ?? ''}}" maxlength="50">
                    <span style="display:none; color: red;" class="val_company_size">Please enter company size.</span>
                  </div>
                </div>
                <div class="col_grid12 ">
                  <div class="form-group">
                    <label>Organization name</label>
                    <input type="text" name="org_name" id="org_name" placeholder="" class="form-control" value="{{ $recruiterInfo->org_name ?? ''}}" maxlength="100">
                    <span style="display:none; color: red;" class="val_org_name">Please enter organization name.</span>
                  </div>
                </div>
                <div class="col_grid12 ">
                  <div class="form-group">
                    <label>Headquarters</label>
                    <input type="text" name="headquarters" id="headquarters" placeholder="" class="form-control" value="{{ $recruiterInfo->headquarters ?? ''}}" maxlength="100">
                    <span style="display:none; color: red;" class="val_headquarters">Please enter headquarters.</span>
                  </div>
                </div>
                <div class="col_grid12 ">
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" id="address" placeholder="" class="form-control" value="{{ $recruiterInfo->address ?? ''}}" maxlength="200">
                    <span style="display:none; color: red;" class="val_address">Please enter address.</span>
                  </div>
                </div>
                <div class="col_grid6 ">
                  <div class="form-group">
                    <label>Type</label>
                    <input type="text" name="type" id="type" placeholder="" class="form-control" value="{{ $recruiterInfo->type ?? ''}}" maxlength="100">
                    <span style="display:none; color: red;" class="val_type">Please enter type.</span>
                  </div>
                </div>
                <div class="col_grid6 ">
                  <div class="form-group">
                    <label>Founded</label>
                    <input type="text" name="founded" id="founded" placeholder="" class="form-control" value="{{ $recruiterInfo->founded ?? ''}}" maxlength="100">
                    <span style="display:none; color: red;" class="val_founded">Please enter founded.</span>
                  </div>
                </div>
                <div class="col_grid12 ">
                  <div class="form-group">
                    <label>Specialties</label>
                    <textarea name="specialties" id="specialties" cols="30" rows="10" class="form-control" maxlength="500">{{ $recruiterInfo->specialties ?? '' }}</textarea>
                    <span style="display:none; color: red;" class="val_specialties">Please enter specialties.</span>
                  </div>
                </div>
                <div class="confirmApply postjob_btn col_grid12 fw">
                  <button type="submit" class="input-btn text-left" id="btnValidate2" data-modal="#createNewPostrecuriter">Edit About <i><img src="{{ asset('public/assets/images/edit_info.png')}}" alt="icon"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">        
      $(document).ready(function(e) {
         $('#btnValidate2').click(function() {         
           var requirter_org_name = $('#specialties').val();
            if ($.trim(requirter_org_name).length == 0) {  
              $('.val_specialties').show();
              setTimeout(function () {
              $('.val_specialties').hide();
              }, 3000);
             return false;
            }                    
           else {
             return true;           
            }
         });
       });                 
    </script>

    <script type="text/javascript">        
      $(document).ready(function(e) {
         $('#btnValidate2').click(function() {         
           var requirter_org_name = $('#founded').val();
            if ($.trim(requirter_org_name).length == 0) {  
              $('.val_founded').show();
              setTimeout(function () {
              $('.val_founded').hide();
              }, 3000);
             return false;
            }                    
           else {
             return true;           
            }
         });
       });                 
    </script>

    <script type="text/javascript">        
      $(document).ready(function(e) {
         $('#btnValidate2').click(function() {         
           var requirter_org_name = $('#type').val();
            if ($.trim(requirter_org_name).length == 0) {  
              $('.val_type').show();
              setTimeout(function () {
              $('.val_type').hide();
              }, 3000);
             return false;
            }                    
           else {
             return true;           
            }
         });
       });                 
    </script>

    <script type="text/javascript">        
      $(document).ready(function(e) {
         $('#btnValidate2').click(function() {         
           var requirter_org_name = $('#address').val();
            if ($.trim(requirter_org_name).length == 0) {  
              $('.val_address').show();
              setTimeout(function () {
              $('.val_address').hide();
              }, 3000);
             return false;
            }                    
           else {
             return true;           
            }
         });
       });                 
    </script>

    <script type="text/javascript">        
      $(document).ready(function(e) {
         $('#btnValidate2').click(function() {         
           var requirter_org_name = $('#headquarters').val();
            if ($.trim(requirter_org_name).length == 0) {  
              $('.val_headquarters').show();
              setTimeout(function () {
              $('.val_headquarters').hide();
              }, 3000);
             return false;
            }                    
           else {
             return true;           
            }
         });
       });                 
    </script>

    <script type="text/javascript">        
      $(document).ready(function(e) {
         $('#btnValidate2').click(function() {         
           var requirter_org_name = $('#org_name').val();
            if ($.trim(requirter_org_name).length == 0) {  
              $('.val_org_name').show();
              setTimeout(function () {
              $('.val_org_name').hide();
              }, 3000);
             return false;
            }                    
           else {
             return true;           
            }
         });
       });                 
    </script>

    <script type="text/javascript">        
      $(document).ready(function(e) {
         $('#btnValidate2').click(function() {         
           var requirter_company_size = $('#company_size').val();
            if ($.trim(requirter_company_size).length == 0) {  
              $('.val_company_size').show();
              setTimeout(function () {
              $('.val_company_size').hide();
              }, 3000);
             return false;
            }                    
           else {
             return true;           
            }
         });
       });                 
    </script>

    <script type="text/javascript">        
      $(document).ready(function(e) {
         $('#btnValidate2').click(function() {         
           var requirter_industry = $('#industry').val();
            if ($.trim(requirter_industry).length == 0) {  
              $('.val_industry').show();
              setTimeout(function () {
              $('.val_industry').hide();
              }, 3000);
             return false;
            }                    
           else {
             return true;           
            }
         });
       });                 
    </script>

    <script type="text/javascript">        
      $(document).ready(function(e) {
         $('#btnValidate2').click(function() {         
           var requirter_overview = $('#requirter_overview').val();
            if ($.trim(requirter_overview).length == 0) {  
              $('.val_verview').show();
              setTimeout(function () {
              $('.val_verview').hide();
              }, 3000);
             return false;
            }                    
           else {
             return true;           
            }
         });
       });                 
    </script>

    <script type="text/javascript">        
      $(document).ready(function(e) {
         $('#btnValidate2').click(function() {         
           var requirter_website = $('#website').val();
            if ($.trim(requirter_website).length == 0) {  
              $('.val_website').show();
              setTimeout(function () {
              $('.val_website').hide();
              }, 3000);
             return false;
            }                    
           else {
             return true;           
            }
         });
       });                 
    </script>
    @include('fruntend.common_pages.web_footer') 
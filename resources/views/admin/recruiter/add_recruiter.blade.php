    <style>
        #frmCheckPassword {
            border-top: #F0F0F0 2px solid;
            background: #808080;
            padding: 10px;
        }

        .demoInputBox {
            padding: 7px;
            border: #F0F0F0 1px solid;
            border-radius: 4px;
        }

        #password-strength-status {
            padding: 5px 10px;
            color: #FFFFFF;
            border-radius: 4px;
            margin-top: 5px;
        }

        .medium-password {
            background-color: #b7d60a;
            border: #BBB418 1px solid;
        }

        .weak-password {
            background-color: #ce1d14;
            border: #AA4502 1px solid;
        }

        .strong-password {
            background-color: #12CC1A;
            border: #0FA015 1px solid;
        }
    </style>
    <div class="content dashboard-pg">
        <h3 class="heading"><span class="red_text"> Recruiters > </span> Add New Recruiter</h3>
        <div class="row">
            <div class="col-md-12 studentform textcenter">
                
                    @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                                
                <form  action="{{ URL::to('add-recruiter')}}" method="POST" id="signup-form" enctype="multipart/form-data">
                @csrf
                    <div class="studentform_box">
                        <div class="form_group ">
                          <div class="upload_btn">
                            <div class="upload_box">
                              <input type="file" class="form_control" id="imgval" onchange="loadFile(event)" name="image" required="">
                            </div>
                            
                            <div class="upload_text">
                              <img src="{{ asset('public/assets/images/upload_img.svg')}}" id="output" alt="upload_img">
                              <span class="uplod_text">Organization Logo</span>
                            </div>
                            
                          </div>
                          <span style="display:none; color:red; margin-left: 260px;" class="img_val">Please select image.</span>
                        </div>
                         <div class="form_group">
                            <input type="text" name="name" id="name" placeholder="Recruiter name" class="form_control" required="" maxlength="100" size="100">
                            <span style="display:none; color: red;" class="recruitername">Please enter name.</span>
                        </div>
                        <div class="form_group">
                            <input type="text" name="org_name" id="org_name" placeholder="Organization name" class="form_control" required="" maxlength="100">
                            <span style="display:none; color: red;" class="orgnamevalidation">Please enter organization name.</span>
                        </div>
                        <div class="form_group">
                            <input type="text" id='txtEmail' name="email" placeholder="Email Address" class="form_control" maxlength="100">
                            @if(isset($alert))
                            <span class="alert" style="color:red;">This email already exists.!</span>
                            @endif
                            <span style="display:none; color: red;" class="emailvalidation">Please Enter valid email address.!</span>
                            <span style="display:none; color: red;" class="val_email">Please enter email.</span>
                        </div>
                        <div class="form_group">
                            <input type="text" name="phone" placeholder="Contact Number" id="valphon" class="form_control" required="" maxlength="10" onkeyup="this.value=this.value.replace(/[^\d]/,'')">
                            <span style="display:none; color: red;" class="vali_phon">Please enter phone number.</span>
                        </div>
                       <!-- <div class="form_group">
                            <input type="password" id="password_reg" name="password" placeholder="Create Password" class="form_control" required="" maxlength="100">
                             <span style="display:none; color: red;" class="val_pass">Please enter password.</span>
                            <span style="color:red;" class="glyphicon form-control-feedback" id="confirmPassword1">
                        </div>-->
                
                    <div class="form_group">
                      <input type="password" id="password" name="password" placeholder="Create Password" class="form_control" value="{{ $password ?? ''}}" required="" minlength="6" onKeyUp="checkPasswordStrength();">
                      <span style="display:none; color: red;" class="val_pass">Please enter password.</span>
                    </div>

                    <div class="form_group">
                      <div id="password-strength-status"></div>
                    </div>
                        <div class="form_group">
                            <button type="submit" id='btnValidate' class="form_control btn" > save</button>
                        </div>
                    </div>
                </form>                
            </div>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        function checkPasswordStrength() {
            var number = /([0-9])/;
            var alphabets = /([a-zA-Z])/;
            var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
            if ($('#password').val().length < 6) {
                $('#password-strength-status').removeClass();
                $('#password-strength-status').addClass('weak-password');
                $('#password-strength-status').html("Weak (should be atleast 6 characters.)");
            } else {
                if ($('#password').val().match(number) && $('#password').val().match(alphabets) && $('#password').val().match(special_characters)) {
                    $('#password-strength-status').removeClass();
                    $('#password-strength-status').addClass('strong-password');
                    $('#password-strength-status').html("Strong");
                } else {
                    $('#password-strength-status').removeClass();
                    $('#password-strength-status').addClass('medium-password');
                    $('#password-strength-status').html("Medium (should include alphabets, numbers and special characters.)");
                }
            }
        }
    </script>
    
    <script type="text/javascript">        
         $(document).ready(function(e) {
           $('#btnValidate').click(function() {         
             var valemail = $('#txtEmail').val();
             if ($.trim(valemail).length == 0) {  
               $('.val_email').show();
               setTimeout(function () {
                 $('.val_email').hide();
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
           $('#btnValidate').click(function() {         
             var val_pass = $('#password').val();
             if ($.trim(val_pass).length == 0) {  
               $('.val_pass').show();
               setTimeout(function () {
                 $('.val_pass').hide();
               }, 3000);
               return false;
             }else {
               return true;           
             }
           });
        });                 
    </script>
    
    <script type="text/javascript">        
        $(document).ready(function(e) {
           $('#btnValidate').click(function() {         
             var val_phon = $('#valphon').val();
             if ($.trim(val_phon).length == 0) {  
               $('.vali_phon').show();
               setTimeout(function () {
                 $('.vali_phon').hide();
               }, 3000);
               return false;
             }else {
               return true;           
             }
           });
        });                 
    </script>
    
    <script type="text/javascript">        
        $(document).ready(function(e) {
           $('#btnValidate').click(function() {         
             var spass = $('#name').val();
             if ($.trim(spass).length == 0) {  
               $('.recruitername').show();
               setTimeout(function () {
                 $('.recruitername').hide();
               }, 3000);
               return false;
             }else {
               return true;           
             }
           });
        });                 
    </script>
    
    <script type="text/javascript">        
        $(document).ready(function(e) {
           $('#btnValidate').click(function() {         
             var imgvali = $('#imgval').val();
             if ($.trim(imgvali).length == 0) {  
               $('.img_val').show();
               setTimeout(function () {
                 $('.img_val').hide();
               }, 3000);
               return false;
             }else {
               return true;           
             }
           });
        });                 
    </script>

      <script type="text/javascript">        
         $(document).ready(function(e) {
           $('#btnValidate').click(function() {  
             var orgname = $('#org_name').val();
             
             if($.trim(orgname).length == 0) {
              $('.orgnamevalidation').show();
               setTimeout(function () {
                 $('.orgnamevalidation').hide();
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
        $('#btnValidate').click(function() {
            var sEmail = $('#txtEmail').val();
            if ($.trim(sEmail).length == 0) {
                $('.emailvalidation1').show();
                setTimeout(function () {
                  $('.emailvalidation1').hide();
                }, 3000);
                return false;
            }
            if (validateEmail(sEmail)) {              
            }
            else {
              $('.emailvalidation').show();
              setTimeout(function () {
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
        }
        else {
          return false;
        }
    }              
</script>
    <script>
      var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
          URL.revokeObjectURL(output.src) // free memory
        }
      };
    </script>
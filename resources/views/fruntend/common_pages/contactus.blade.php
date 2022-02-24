 @include('fruntend.common_pages.web_header')
 <div class="body_wht-inners ">
   <div class="redAbout_banner text-center contactus_banner fw">
     <div class="lgcontainer">
       <h2>Contact Us</h2>
     </div>
   </div>
   <div class="aboutCont_sec contactus_pg fw">
     <div class="lgcontainer">
       <div class="aboutCont_box fw">
         <div class="innerrow">
           <div class="col_grid12">
             <h3>Reach Out!</h3>
           </div>
           <div class="adress_cont col_grid5">
             <h4>Mumbai, India</h4>
             <ul class="adreeInfo">
               <!-- <li><a href="#"><i><img src="{{ asset('public/assets/images/c_address.png')}}" alt="icon"></i>909 Sardis Station, Minneapolis, 55402</a></li> -->
               <li><a href="mailto:contact@theinternify.com"><i><img src="{{ asset('public/assets/images/c_mail.png')}}" alt="icon"></i>contact@theinternify.com</a></li>
               <li><a href="tel:+91 9167176705"><i><img src="{{ asset('public/assets/images/c_contact_number.png')}}" alt="icon"></i>+91 9167176705</a></li>
             </ul>
             <ul class="adressFlow_social">
               <p>Follow our socials</p>
               <li><a href="https://www.facebook.com/Theinternify"><img src="{{ asset('public/assets/images/c_facebook.png')}}" alt="icon"></a></li>
               <li><a href="https://www.instagram.com/theinternify/"><img src="{{ asset('public/assets/images/c_insta.png')}}" alt="icon"></a></li>
               <li><a href="https://twitter.com/TInternify "><img src="{{ asset('public/assets/images/c_twitter.png')}}" alt="icon"></a></li>
               <li><a href="https://www.linkedin.com/company/the-internify/ "><img src="{{ asset('public/assets/images/c_linkedin.png')}}" alt="icon"></a></li>
             </ul>
           </div>
           @if(Session::has('status'))
                    <div class="alert alert-{{ Session::get('status') }}">
                        <i class="fa fa-building-o" aria-hidden="true"></i> {{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                    </div>
                    @endif
           @if (isset($message))
           <div class="alert alert-success" style="color:white">
             <p>{{$message ?? ''}}</p>
           </div>
           @endif
           <div class="col_grid7">
             <div class="adressMap_sec pull-right">
               <form class="fw" action="{{ url('add_contactus') }}" method="POST" enctype="multipart/form-data">
                 @csrf
                 <div class="form-group col_grid6">
                   <label>First Name</label>
                   <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter your first name" required="" maxlength="50">
                   <span style="display:none; color: red;" class="f_name">Please enter first name.</span>
                 </div>
                 <div class="form-group col_grid6">
                   <label>Last Name</label>
                   <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter your last name" required="" maxlength="50">
                   <span style="display:none; color: red;" class="l_name">Please enter last name.</span>
                 </div>
                 <div class="form-group col_grid6">
                   <label>Mobile Number</label>
                   <!-- <input type="number" class="form-control" placeholder="Enter your mobile number" required="" maxlength="10">-->
                   <input type="text" name="mobile" id="phone" onkeyup="this.value=this.value.replace(/[^\d]/,'')" placeholder="Enter your mobile number" class="form-control" required maxlength="10" minlength="10">
                   <span style="display:none; color: red;" class="validate_phone">Please enter phone.</span>
                 </div>
                 <div class="form-group col_grid6">
                   <label>Email Address</label>
                   <input type="email" id='txtEmail' name="email" class="form-control" placeholder="Enter your email address" required="" maxlength="100">

                   <span style="display:none; color: red;" class="emailvalidation">Enter valid email address.!</span>
                   <span style="display:none; color: red;" class="emailvalidation1">Please Enter email address.!</span>
                 </div>
                 
                 <div class="form-group col_grid12 write-message">
                   <label>Write Message <span id="remainingC">(0/500)</span></label>
                   <textarea class="form-control" name="message" id="message" placeholder="Please provide any relevant details or expiation"  maxlength="500"></textarea>
                   <!--span style="display:none; color: red;" class="validate_msg">Please enter message.</span-->
                 </div>
                 <div class="form-group col_grid12 text-center">
                   <button type="submit" id="btnValidate" class="btn btn-default"><img src="{{ asset('public/assets/images/loginCheck_icon.png')}}" alt="icon" /> Submit</button>
                 </div>
               </form>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
 <script src="{{ asset('public/assets/web_assets/js/jquery-lb.js')}}"></script>
 <script src="{{ asset('public/assets/web_assets/js/commen-hd.js')}}"></script>
 <script type="text/javascript">
    CKEDITOR.replace('message');
  </script>
 <script>
   $(document).ready(function() {
     var len = 0;
     var maxchar = 500;

     $('#message').keyup(function() {
       len = this.value.length
       if (len > maxchar) {
         return false;
       } else if (len > 0) {
         $("#remainingC").html((maxchar - len));
       } else {
         $("#remainingC").html((maxchar));
       }
     })
   });
 </script>
 <script type="text/javascript">
   $(document).ready(function(e) {
     $('#btnValidate').click(function() {
       var valemail = $('#first_name').val();
       if ($.trim(valemail).length == 0) {
         $('.f_name').show();
         setTimeout(function() {
           $('.f_name').hide();
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
       var val_pass = $('#last_name').val();
       if ($.trim(val_pass).length == 0) {
         $('.l_name').show();
         setTimeout(function() {
           $('.l_name').hide();
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
       var val_phon = $('#phone').val();
       if ($.trim(val_phon).length == 0) {
         $('.validate_phone').show();
         setTimeout(function() {
           $('.validate_phone').hide();
         }, 3000);
         return false;
       } else {
         return true;
       }
     });
   });
 </script>

 <script type="text/javascript">
  //  $(document).ready(function(e) {
  //    $('#btnValidate').click(function() {
  //      var spass = $('#message').val();
  //      if ($.trim(spass).length == 0) {
  //        $('.validate_msg').show();
  //        setTimeout(function() {
  //          $('.validate_msg').hide();
  //        }, 3000);
  //        return false;
  //      } else {
  //        return true;
  //      }
  //    });
  //  });
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
 <script type="text/javascript">
   $(document).ready(function() {
     setTimeout(function() {
       $('.alert').hide();
     }, 5000); // milliseconds
   });
 </script>
 <script>
   $(document).ready(function() {
     $(' .menu_right li').click(function() {
       $(' .menu_right li').removeClass('active');
       $(this).addClass('active');
     });
     $(' .profileTab li').click(function() {
       $(' .profileTab li').removeClass('active');
       $(this).addClass('active');
     });
   });
 </script>
 <script >
    $(document).ready(function(){
    $(".header_sec .togglebtn").click(function(){
      $(".header_sec ").toggleClass("opne_flow2header");
    });
  });
  </script>
 @include('fruntend.common_pages.web_footer')
<div class="content">
   <div class="container-fluid">
      <!-- Page-Title -->
      <div class="row">
         <div class="col-sm-12">
            <h4 class="pull-left page-title">Manage Executive</h4>
            <ol class="breadcrumb pull-right">
               <li><a href="{{ URL::to('home') }}">Home</a></li>
               <li><a href="{{URL::to('')}}">Setting</a></li>
               <li class="active">Manage Executive</li>
            </ol>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-body">
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="m-b-30">
                           <button type="button" class="btn btn-primary waves-effect waves-light" onclick="addRecords()"> Add <i class="md md-add-circle-outline"></i></button>
                        </div>
                     </div>
                  </div>
                  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                     <thead>
                        <tr>
                           <th>Sr.No.</th>
                           <th>Name</th>
                           <th>Email</th>
                           <th>Phone</th>
                           <th>Status</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                         @foreach($usredata as $key => $data)
                         @if($data->users_role > 1)
                         <tr class="gradeX">
                            <td>{{ $key+1 }}</td>
                            <td>{{ $data->first_name }} {{ $data->last_name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->phone }}</td>
                            @if($data->status == 1)
                            <td>
                              <p class="mb-0">
                                <span class="badge badge-success">Active</span>
                              </p>
                            </td>
                            @else
                            <td>
                              <p class="mb-0">
                                <span class="badge badge-danger">Inactive</span>
                              </p>
                            </td>
                            @endif
                            <td class="actions">
                             <!--  <a href="javascript::void(0)" class="on-default edit-row"  onclick="editRecords({{ $data->id }})" data-toggle="tooltip" data-modal="modal-12" data-placement="top" title="" data-original-title="View"><i class="fas fa-eye"></i></a>  -->
                              &nbsp;&nbsp;&nbsp;
                               <a href="javascript::void(0)" class="on-default edit-row"  onclick="editRecords({{ $data->id }})" data-toggle="tooltip" data-modal="modal-12" data-placement="top" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a> 
                               &nbsp;&nbsp;&nbsp;
                               <a href="{{ URL::to('delete-user',$data->id)}}" class="on-default remove-row" onclick="return confirm('Are you sure you want to delete this item?');" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fas fa-trash"></i></a>
                            </td>
                         </tr>
                         @endif
                         @endforeach
                      </tbody>
                  </table>
               </div>
               <!-- end card-body -->
            </div>
         </div>
         <!-- container -->
      </div>
   </div>
</div>

<!-- Model Start -->
<div id="unique-model" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title mt-0">Executive Define</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form  action="{{ url('add-user') }}" method="POST" id="FormValidation" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <input type="hidden" name="ids" id="ids">
            <div class="modal-body">
               <div class="row">                                 
                  
                  <div class="col-md-6">
                    <div class="form-group"> 
                      <label for="field-1" class="control-label"> First Name : <font color="red">*</font></label> 
                      <input type="text" id="first_name" name="first_name" class="form-control" required="" aria-required="true"> 
                    </div>
                  </div>
                   <div class="col-md-6">
                    <div class="form-group"> 
                      <label for="field-1" class="control-label"> Last Name : <font color="red">*</font></label> 
                      <input type="text" id="last_name" name="last_name" class="form-control" required="" aria-required="true"> 
                    </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group"> 
                        <label for="field-1" class="control-label"> Executive-Email : <font color="red">*</font></label> 
                        <input  type="email" onkeyup="email_check()" id="email" name="email" class="form-control" required="" aria-required="true" > 
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group"> 
                        <label for="field-1" class="control-label allownumericwithoutdecimal"> Executive-Phone : <font color="red">*</font></label> 
                        <input  type="text" id="phone" name="phone" class="form-control" required="" aria-required="true" maxlength="10" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" maxlength="10" title="phone"> 
                     </div>
                  </div>
                  <div class="col-md-6" id="hide_password">
                     <div class="form-group"> 
                        <label for="field-1" class="control-label">Password : <font color="red">*</font></label> 
                        <input  type="password" id="password" name="password" class="form-control" required="" aria-required="true"> 
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <p class="control-label"><b>Status :</b> <font color="red">*</font></p>
                        <div class="radio radio-info form-check-inline">
                           <input type="radio" id="active" value="1" name="status" checked="">
                           <label for="inlineRadio1"> Active </label>
                        </div>
                        <div class="radio radio-info form-check-inline">
                           <input type="radio" id="inactive" value="0" name="status">
                           <label for="inlineRadio1"> Inactive </label>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer"> 
               <button type="submit" id="submitbtn" class="btn btn-primary">Submit</button>
               <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button> 
            </div>
         </form>
      </div>
   </div>
</div>
<!-- Modal End -->

<!-- Model Start -->
<div id="unique-view-model" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title mt-0">Executive Define</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form  action="{{ url('add-user') }}" method="POST" id="FormValidation" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <input type="hidden" name="ids" id="ids">
            <div class="modal-body">
               <div class="row">                                 
                  
                  <div class="col-md-6">
                    <div class="form-group"> 
                      <label for="field-1" class="control-label"> Executive-Name : <font color="red">*</font></label> 
                      <input type="text" id="name" name="name" class="form-control" required="" aria-required="true"> 
                    </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group"> 
                        <label for="field-1" class="control-label"> Executive-Email : <font color="red">*</font></label> 
                        <input  type="email" onkeyup="email_check()" id="email" name="email" class="form-control" required="" aria-required="true" > 
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group"> 
                        <label for="field-1" class="control-label allownumericwithoutdecimal"> Executive-Phone : <font color="red">*</font></label> 
                        <input  type="text" id="phone" name="phone" class="form-control" required="" aria-required="true" maxlength="10" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" maxlength="10" title="phone"> 
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group"> 
                        <label for="field-1" class="control-label">Password : <font color="red">*</font></label> 
                        <input  type="password" id="password" name="password" class="form-control" required="" aria-required="true"> 
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <p class="control-label"><b>Status :</b> <font color="red">*</font></p>
                        <div class="radio radio-info form-check-inline">
                           <input type="radio" id="active" value="1" name="status" checked="">
                           <label for="inlineRadio1"> Active </label>
                        </div>
                        <div class="radio radio-info form-check-inline">
                           <input type="radio" id="inactive" value="0" name="status">
                           <label for="inlineRadio1"> Inactive </label>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer"> 
               <button type="submit" id="submitbtn" class="btn btn-primary">Submit</button>
               <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button> 
            </div>
         </form>
      </div>
   </div>
</div>
<!-- Modal End -->

<!-- Email Dupalicasi Check -->
  <script type="text/javascript">
    function email_check()
    {
      var y = $('#email').val();
      $.ajaxSetup({   
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({   
          url:"{{url('useremail/')}}"+'/'+y,  
          method:"POST", 
          contentType : 'application/json',
          success: function( data ) {
            if( data ) {
              $("#email").val('');    
              $("#email").focus();
            } else   {
              return true;
            }
          }
        });
    }
  </script>  

<!-- Edit user details -->
<script type="text/javascript">
  function editRecords(id) {    
    $.ajaxSetup({   
      headers: {   
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }   
    });   
    $.ajax({   
      url:"{{url('excutive-edit/')}}"+'/'+id,  
      method:"POST", 
      contentType : 'application/json',   
      success: function( data ) {  
        document.getElementById("ids").value = data.id;   
        document.getElementById("first_name").value = data.first_name;   
        document.getElementById("last_name").value = data.last_name;   
        document.getElementById("email").value = data.email;   
        document.getElementById("phone").value = data.phone;    
         $("#hide_password").hide();
        var val = data.status;   
          if( val == 1) {
            $('input[name=status][value=' + val + ']').prop('checked',true);
          }else{   
             $('input[name=status][value=' + val + ']').prop('checked',true);
          }   
            document.getElementById("submitbtn").innerText ='UPDATE';   
            $('#unique-model').modal('show');
          }
      });
    }
/* View Executime details */
  function viewRecords(id) { 
    $.ajaxSetup({   
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }   
    });
   
    $.ajax({
      url:"{{url('view-customer/')}}"+'/'+id,  
      method:"POST", 
      contentType : 'application/json',
      success: function( data ) {      
        document.getElementById("job_id").value = data.job_id;
        document.getElementById("v_emp_id").innerText = data.emp_id;
        document.getElementById("v_reg_no").innerHTML = data.reg_no;
        $('#unique-view-model').modal('show');
      }
    });
  }
</script>
<!-- Only Enter Number show -->
<script type="text/javascript">
  $(".allownumericwithoutdecimal").on("keypress keyup blur",function (event) {    
    $(this).val($(this).val().replace(/[^\d].+/, ""));
      if ((event.which < 48 || event.which > 57)) {
          event.preventDefault();
      }
  });
</script>
<!-- Add records excutive -->
<script type="text/javascript">
  function addRecords() {    
    document.getElementById("FormValidation").reset();   
    document.getElementById("submitbtn").innerText ='Save';   
    $('#unique-model').modal('show');
  }
</script>
<!-- Start content -->
<div class="content">
   <div class="container-fluid">
      <div class="wraper">
         <div class="row">
            <div class="col-sm-12">
               <div class="bg-picture text-center" style="background-image:url('{{ asset('public/assets/images/big/bg.jpg') }}')">
                  <div class="bg-picture-overlay"></div>
                  <div class="profile-info-name">
                     <img src="{{ URL::asset('/public/profile_image/') }}/{{ $companydata->profile_image }}" class="thumb-lg rounded-circle img-thumbnail" alt="profile-image"> 
                     <h3 class="text-white">{{ $companydata->first_name ?? '' }} {{ $companydata->last_name ?? '' }}</h3>
                  </div>
               </div>
               <!--/ meta -->
            </div>
         </div>
        <!--  <div class="row user-tabs">
            <div class="col-md-9 col-xl-6">
               <ul class="nav nav-tabs tabs" role="tablist">
                  <li class="nav-item tab">
                     <a class="nav-link active" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="true">
                     <span class="d-block d-sm-none"><i class="fa fa-home"></i></span>
                     <span class="d-none d-sm-block">About</span>
                     </a>
                  </li>
                  <li class="nav-item tab">
                     <a class="nav-link" id="setting-tab" data-toggle="tab" href="#setting" role="tab" aria-controls="setting" aria-selected="false">
                     <span class="d-block d-sm-none"><i class="fa fa-cog"></i></span>
                     <span class="d-none d-sm-block">Settings</span>
                     </a>
                  </li>
                 
                  <div class="indicator"></div>
               </ul>
            </div>
         </div> -->
         <div class="row">
            <div class="col-lg-12">
               <div class="tab-content profile-tab-content">
                  
                  <div class="" id="" aria-labelledby="">
                     <!-- Personal-Information -->
                     <div class="card card-default card-fill">
                        <div class="card-header">
                           <h3 class="card-title">Edit Profile</h3>
                        </div>
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="card-body">
                           <form action="{{'edit-userprofile'}}" method="POST" id="FormValidation" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" name="u_ids" value='{{Auth::user()->id ?? ""}}'>
                              <input type="hidden" name="c_ids" value='{{$companydata->id ?? ""}}'>
                              <div class="form-group">
                                 <label for="FullName">Name</label>
                                 <input type="text" name="name" id="name" value="{{ $companydata->name ?? '' }} " id="Name" required="" aria-required="true" class="form-control" maxlength="100" size="100">
                              </div>
                              <div class="form-group">
                                 <label for="Email">Email</label>
                                 <input type="email" name="email" value="{{ $companydata->email ?? '' }} {{ $companydata->last_name ?? '' }}" id="Email" class="form-control" required="" aria-required="true" readonly="" maxlength="100" size="100">
                              </div>
                              
                              <div class="form-group">
                                 <label for="Password">Current Password</label>
                                 <input type="password" name="password" placeholder="" id="password" class="form-control" required="" value="" aria-required="true" autocomplete="off" maxlength="100" size="100">
                                 @error('password')
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                              </div>
                              <div class="form-group">
                                 <label for="RePassword">New Password</label>
                                 <input type="password" name="new_password" placeholder="" id="new_password"  class="form-control" required="" aria-required="true" maxlength="100" size="100">
                                 @error('password')
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                              </div>
                              <button class="btn btn-primary waves-effect waves-light w-md" type="submit">Save</button>
                           </form>
                        </div>
                     </div>
                     <!-- Personal-Information -->
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- container-fluid -->
   </div>
   <!-- content -->
</div>
<script type="text/javascript">
   $('#name').on('keypress', function (event) {
    var regex = new RegExp("^[a-zA-Z0-9]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
});
</script>
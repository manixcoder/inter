<div class="content dashboard-pg">
   <h3 class="heading"><span class="red_text"> Recruiters ></span>#{{ $recruiterDetail->id ?? ''}}</h3>
   <div class=" jobsdetails_sec fw">
      <div class="jobsdetails_leftcont">
         <h4 class="greentext">Basic Info</h4>
         <div class="personalUser_cont">
            <div class="userIcon">
               <img src="{{ URL::asset('/public/uploads/') }}/{{ $recruiterDetail->org_image }}" />
            </div>
            <div class="userdetail_cont">
               <a href="{{ URL::to('/message')}}">
                  <i>
                     <img src="{{ URL::asset('/public/assets/images/chat_2.svg') }}" alt="chat">
                  </i>
               </a>
               <a href="{{ URL::to('recruiter-delails-delete',$recruiterDetail->id) }}">
                  <i>
                     <img src="{{ URL::asset('/public/assets/images/delete.svg') }}" alt="chat">
                  </i>
               </a>
            </div>
         </div>
         <ul class="jobsdetails_text">
            <li>Recruiter ID <b>#{{ $recruiterDetail->id ?? ''}}</b></li>
            <li>Recruiter Name <b>{{ $recruiterDetail->name ?? ''}}</b></li> 
            <li>Email Address <b>{{ $recruiterDetail->email ?? ''}}</b></li>
            <li>Mobile Number <b>{{ $recruiterDetail->phone ?? ''}}</b></li>
            <li>Company Name <b>{{ $recruiterDetail->org_name ?? ''}}</b></li>
            <li>Last Login<b>@if($recruiterDetail->last_login !=''){{ date('d-M-Y | H:i', strtotime($recruiterDetail->last_login ?? ''))}}@endif</b></li>
            <li>
               Status
               <b>
                  <select name="status" onchange="statuschange({{ $recruiterDetail->id ?? ''}})">
                     @if($recruiterDetail->status == 0)
                     <option value="0">Active</option>
                     <option value="1">Inactive</option>
                     @else
                     <option value="1">Inactive</option>
                     <option value="0">Active</option>
                     @endif
                  </select>
               </b>
            </li>
         </ul>
         <h4 class="greentext">Overview</h4>
         <ul class="jobsdetails_text">
            <li>{{ $recruiterDetail->requirter_overview ?? '' }}</li>
         </ul>
         <h4 class="greentext">Website</h4>
         <ul class="jobsdetails_text">
            <li>{{ $recruiterDetail->website ?? '' }}</li>
         </ul>


         <h4 class="greentext">Industry</h4>
         <ul class="jobsdetails_text">
            <li>{{ $recruiterDetail->industry ?? '' }}</li>
         </ul>


         <h4 class="greentext">Company size</h4>
         <ul class="jobsdetails_text">
            <li><?php echo $recruiterDetail->company_size ?></li>
         </ul>


         <h4 class="greentext">Headquaters</h4>
         <ul class="jobsdetails_text">
            <li>{{ $recruiterDetail->headquarters ?? '' }}</li>
         </ul>

         <h4 class="greentext">Address</h4>
         <ul class="jobsdetails_text">
            <li>{{ $recruiterDetail->address ?? '' }}</li>
         </ul>

         <h4 class="greentext">Type</h4>
         <ul class="jobsdetails_text">
            <li>{{ $recruiterDetail->type ?? '' }}</li>
         </ul>

         <h4 class="greentext">Founded</h4>
         <ul class="jobsdetails_text">
            <li>{{ $recruiterDetail->founded ?? '' }}</li>
         </ul>

         <h4 class="greentext">Specialities</h4>
         <ul class="jobsdetails_text">
            <li><?php echo $recruiterDetail->specialties ?></li>
         </ul>
      </div>
      <div class="jobsdetails_leftcont jobsdetails_rightcont">
         <div class="tatile_box">

            <h4 class="greentext">Total Listed Jobs ({{ count($totalListedJobs ?? '') }})</h4>
         </div>
         <div class="responsive_textbox basicinfo-table">
            <div class="fw table-responsive">
               <table class="table ">
                  <thead>
                     <tr>
                        <th>Listed Job ID</th>
                        <th>Job Title</th>
                        <th>Location</th>
                        <th>Created on</th>
                        <th>Actions</th>
                     </tr>
                  </thead>
                  <tbody>
                     @if(isset($totalListedJobs))
                     @foreach($totalListedJobs as $key=> $value)
                     <tr>
                        <td>#{{ $key+1 }}</td>
                        <td>{{ $value->job_title ?? ''}}</td>
                        <td>{{ $value->location ?? ''}}</td>
                        <td>{{date('d M Y', strtotime($value->created_at ?? ''))}}</td>
                        <td>
                           <i><a href="{{ URL::to('job-detail',base64_encode($value->id)) }}">
                                 <img src="{{ asset('public/assets/images/view.svg')}}" alt="icon">
                              </a>
                           </i>
                           <i>
                              <a href="{{ URL::to('job-delete',$value->id) }}" onclick="return confirm('Are you sure you want to delete this item?');"> <img src="{{ asset('public/assets/images/delete.svg')}}" alt="icon">
                              </a>
                           </i>
                        </td>
                     </tr>
                     @endforeach
                     @endif
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript">
   function statuschange(id) {
      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });
      $.ajax({
         url: "{{url('student-change/')}}" + '/' + id,
         method: "GET",
         contentType: 'application/json',
         success: function(data) {}
      });
   }
</script>
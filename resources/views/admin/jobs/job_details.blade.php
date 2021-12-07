<div class="content dashboard-pg">
   <h3 class="heading"><span class="red_text"> Listed Jobs > </span>  #{{$jobDetail->id}}</h3>
   <div class=" jobsdetails_sec fw">
      <div class="jobsdetails_leftcont">
         <h4 class="greentext">Job Details</h4>
         <ul class="jobsdetails_text">
            <li>Job ID <b>#{{$jobDetail->id}}</b></li>
            <li>Job Title <b>{{$jobDetail->job_title}}</b></li>
            <li>Job Location <b>{{$jobDetail->location}}</b></li>
            <li>Salary <b>{{$jobDetail->salary}}/-</b></li>
         </ul>
         <div class="offer_textcant">
            <h4 class="greentext">Offers</h4>
            @foreach(unserialize($jobDetail->offer) as $offer)
            <li>{{ $offer }}</li>
            @endforeach
            <!-- <p>{{$jobDetail->offer ?? ''}}</p> -->
         </div>
         <div class="offer_textcant">
            <h4 class="greentext">Job Description</h4>
            <p>{{ strip_tags($jobDetail->job_description) }}</p>
         </div>
         <ul class="jobsdetails_text">
            <li>Created On <b>{{date('d-M-Y', strtotime($jobDetail->created_at))}}</b></li>
            <li>
               Status
               	<b>
                  	<select name="status" onchange="statuschange({{ $jobDetail->id }})">
	                    @if($jobDetail->status == 0)
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
      </div>
      <div class="jobsdetails_leftcont jobsdetails_rightcont">
         <h4 class="greentext">Company Details</h4>
         <div class="companyWapper">
            <div class="fw company_cant">
               <ul class="jobsdetails_text">
                  <li>Company Logo<b><span class="imgbox"><img src="{{ URL::asset('/public/uploads/') }}/{{ $job_created_by->org_image }}" alt="icon"></span></b></li>
                  <li>Company Name <b>{{ $job_created_by->org_name ?? ''}}</b></li>
                  <li>Official Email <b>{{ $job_created_by->email ?? ''}}</b></li>
               </ul>
               <ul class="jobsdetails_text">
                  <li>Job Posted By<b>{{ $job_created_by->name ?? ''}}</b></li>
                  <li>Designation <b>{{ $job_created_by->designation ?? ''}}</b></li>
                  <li>View Details 
                     <b>
                       <!--  <i><a href=""><img src="{{ URL::asset('/public/assets/images/chat_2.svg') }}" alt="chat"></a></i> -->
                        
                        <i><a href="{{ URL::to('recruiter-detail', base64_encode($job_created_by->id)) }}"><img src="{{ asset('public/assets/images/view.svg')}}" alt="chat"></a></i>
                        <!-- <i><a href="#"><img src="{{ asset('public/assets/images/delete.svg')}}" alt="chat"></a></i> -->
                     </b>
                  </li>
               </ul>
            </div>
            <div class="tatile_box">
               <h4 class="greentext">Total Applicants ({{ count($appliedjobs)}})</h4>
            </div>
            <div class="responsive_textbox">
               <div class="fw table-responsive">
                  <table class="table ">
                     <thead>
                        <tr>
                           <th>Application ID</th>
                           <th>Student Name</th>
                           <th>Email Address</th>
                           <th>Mobile Number</th>
                           <th>Resume</th>
                        </tr>
                     </thead>
                     <tbody>
                        @if(isset($appliedjobs))
                           @foreach($appliedjobs as $value)
                              @php 
                              $student_name = DB::table('users')->where('id', $value->student_id)->first(); 
                              
                              @endphp
                              <tr>
                                 <td>#{{ $value->id ?? ''}}</td>
                                 <td>{{$student_name->name ?? '' }}</td>
                                 <td>{{$student_name->email ?? ''}}</td>
                                 <td>{{$student_name->phone ?? ''}}</td>
                                 <td>
                                    <i>
                                       @php 
                                       $resume = DB::table('student_resume')->where('student_id', $student_name->id)->first();
                                       
                                        @endphp
                                    <a href="{{ URL::asset('/public/uploads/') }}/{{ $resume->image ?? ''}}" download>
                                        <img src="{{ URL::asset('/public/assets/images/download.svg') }}"></i>
                                    </a>
                                    <?php   
                                    // $resume = DB::table('student_resume')->where('id', $student_name->id)->first();
                                
                                    //     if(isset($file)){
                                    //         $url = (base_path('public/resume/'.$resume->resume));
                                    //     }
                                    ?>
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
</div>
<script type="text/javascript">
   function statuschange(id){
   	$.ajaxSetup({   
         headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
      }); 
      $.ajax({   
         url:"{{url('jobstatus-change/')}}"+'/'+id,     
         method:"GET",   
         contentType : 'application/json',   
         success: function( data ) {  	            
         }
      });
   }
</script>
<div class="content dashboard-pg">
            <h3 class="heading"><span class="red_text"> Students > </span>  #{{ $studentDetail->id ?? ''}} </h3>
                    <div class=" jobsdetails_sec fw">
                      <div class="jobsdetails_leftcont">
                        <h4 class="greentext">Personal Details</h4>
                        <div class="personalUser_cont">
                          <div class="userIcon">
                            <img src="{{ URL::asset('/public/uploads/') }}/{{ $studentDetail->profile_image ?? ''}}" />
                          </div>
                          <div class="userdetail_cont">
                           <!--  <a href="#"><i><img src="{{ URL::asset('/public/assets/images/chat_2.svg') }}" alt="chat"></i></a> -->
                           <!--  <a href="#"><i><img src="{{ URL::asset('/public/assets/images/delete.svg') }}" alt="chat"></i></a> -->
                          </div>
                        </div>
                        <ul class="jobsdetails_text">
                          <li>Student ID <b>#{{ $studentDetail->id ?? ''}}</b></li>
                          <li>Student Name <b>{{ $studentDetail->name ?? ''}}</b></li>
                          <li>Email Address <b>{{ $studentDetail->email ?? ''}}</b></li>
                          <li>Mobile Number <b>{{ $studentDetail->phone ?? ''}}</b></li>
                          <li>Date of Birth <b>{{ $studentDetail->dob ?? ''}}</b></li>
                          <li>Gender <b>@if($studentDetail->gender == 0) Male @else Female @endif</b></li>
                          <li>Last Login<b>{{date('d-M-Y | H:i', strtotime($studentDetail->last_login ?? ''))}}</b></li>
                          
                          <li>Status 
                            <b>  
                              <select name="status" onchange="statuschange({{$studentDetail->id ?? ''}})">
                                @if($studentDetail->status == 0)
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
                      <h4 class="greentext">About Me</h4>
                      <ul class="jobsdetails_text">
                      <li>{{$studentDetail->about }}</li>
                      </ul>
                      <div class="std-wapper">
                        <div class="offer_textcant">
                          
                          <h4 class="greentext">Education</h4>
                          <p>{{ $education->school_name ?? ''}}</p>
                          <ul class="jobsdetails_text">
                            <li>{{ $education->name_of_technology ?? ''}}</li>
                            <li>{{ $education->percentage ?? ''}}</li>
                            <li>{{date('Y', strtotime($education->year ?? ''))}}</li>
                          </ul>

                          <h4 class="greentext">Experience</h4>
                          <p>{{$experience->company_name ?? ''}}</p>
                          <p>{{$experience->profile ?? ''}}</p>
                          <ul class="jobsdetails_text">
                            <li>{{$experience->location ?? ''}}</li>
                            <li>{{date('M Y', strtotime($experience->duration_from  ?? ''))}} - {{date('M Y', strtotime($experience->duration_to ?? ''))}}</li>
                          </ul>

                          <h4 class="greentext">Cettificate</h4>
                          <p>{{ $certificate->certificate_name ?? ''}}</p>
                          <ul class="jobsdetails_text">
                            <li>{{ $certificate->certificate_by ?? ''}}</li>
                            <li>{{ $certificate->year_of_completion ?? ''}} Year</li>
                          </ul>

                          <h4 class="greentext">Intrests</h4>
                          <p>{{ $intrest->hobbies_name ?? ''}}</p>    
                          <ul class="jobsdetails_text">
                           
                          </ul>                      

                          <h4 class="greentext">Accomplishments</h4>
                          <p>{{ $accomplishments->course_name ?? ''}}</p>
                          <ul class="jobsdetails_text">
                            <li>{{ $accomplishments->test_scores ?? ''}}%</li>
                            <li>{{ $accomplishments->publications ?? ''}}</li>
                          </ul>
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
          url:"{{url('student-change/')}}"+'/'+id,     
          method:"GET",   
          contentType : 'application/json',   
          success: function( data ) {               
          }
      });
  }
</script>
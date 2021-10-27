  @include('fruntend.common_pages.web_header') 

   @php 
    $recruiterDetails = DB::table('users')->where('id', $Data->user_id)->first();
    $intrestedCandidate = DB::table('job_applied')->where('job_id', $Data->id)->get();
  @endphp 
 
    <div class="body_wht-inners ">
      <div class="lgcontainer">
        <div class="boxDetailbg fw">
          <figure>
            <img src="{{ URL::asset('/public/assets/images/jobsDetailBG.png') }}" alt="jobs" />
          </figure>
        </div>
        <div class="jobsDetailProfile fw">
          <div class="innerrow">
            <div class="col_grid9">
              <div class="jobsDetailComp_img">
                <img src="{{ URL::asset('/public/assets/jobs_images/') }}/{{ $Data->logo }}" alt="newtechlogo" />
              </div>
              <div class="jobsDetailComp_cont">
                <h3>{{ $recruiterDetails->org_name ?? ''}}</h3>
                <h3><a href="#" class="lightblue_text">{{ $Data->job_title ?? ''}}</a></h3>
                <p>{{ $Data->location ?? ''}}</p>
              </div>
            </div>
            <div class="col_grid12 extraleft_pad mrtop_extra45 contact_profileinfo">
              <div class="innerrow">
                <div class="col_grid6 contactmail">
                  <span>Contact: <a href="mailto:jenifer193@arknewtech.com" class="lightblue_text"> {{ $recruiterDetails->email ?? ''}}</a></span>
                </div>
                <div class="col_grid6 text-right checkbox_notify">
                  <div class="custominputBox">
                    <input type="checkbox" class="inputCheck">
                    <span></span>
                  </div>
                  <span>Notify me for similar jobs</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="jobDescriptions_sec fw">
          <h3 class="borderBox_heading">Offer</h3>
          <ul>
            <li>{{ $Data->location ?? ''}}</li>
          </ul>
        </div>
        <div class="jobDescriptions_sec fw">
          <h3 class="borderBox_heading">Job Descriptions</h3>
          <p>{{ $Data->job_description ?? ''}}</p>
        </div>
        
      </div>
    </div>
     @include('fruntend.common_pages.web_footer')  
   
  
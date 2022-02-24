@include('fruntend.common_pages.web_header')  
@include('fruntend.recruiter_profile_section.recruiter_basicinfo_sub_menues')

  @php 
    $userRole = Session::get('userRole');
    $id = Session::get('gorgID');
    $recruiterInfo = DB::table('users')->where('id', $id)->first();
    $studentdata = DB::table('users')->where('status', 0)->where('users_role', 2)->get();
    $recruiterdata = DB::table('users')->where('status', 0)->where('users_role', 3)->get();
    $todaysdate = date('Y-m-d').' 00:00:00';   

    $posts = DB::table('posts')->where('user_id', $recruiterInfo->id)->where('status', 0)->orderBy('id', 'Desc')->get();    
    $listedjobs = DB::table('jobs')->where('user_id', $id)->orderBy('id', 'Desc')->get();
  @endphp 
<!-- Recruiter Listings section -->
          <div class="profileTab_contBox" id="profileTab_link3">
            <div class="small_contaner mylisting_recuriter">
              <div class="findblog_search blogView_search fw">
                 
                <form class="fw">
                  <div class="from-group">
                    <div class="input-icon">
                      <i><img src="{{ URL::asset('/public/assets/images/searchIcon.png') }}" alt="icon"></i>
                      <input class="form-control" type="text" name="search" placeholder="Find your friends or companies you want to work at!">
                    </div>
                    <div class="btn_group">
                      <button type="submit" class="input-btn">Search</button>
                    </div>
                  </div>
                </form>
              </div>
               @if(Session::has('status'))
                    <div class="alert alert-{{ Session::get('status') }}">
                        <i class="fa fa-building-o" aria-hidden="true"></i> {{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                    </div>
                    @endif
              <div class="fw posted_heading">
                <h3 class="font36text clrBlack semiboldfont_fmly">
                  <span>You have listed ({{ count($listedjobs ?? '') }} jobs)</span> 
                  <span class="pull-right">
                    <a href="{{URL::to('web/post/jobs')}}" class="input-btn" data-modal="#">Post a New Job</a>
                  </span>
                </h3>
              </div>
              <div class="fw profilePost_wapper listjob_wapper">
                @if(isset($listedjobs))
                  @foreach($listedjobs as $value)
                    @php 
                    
                      $userdetail = DB::table('users')->where('id', $value->user_id)->first(); 
                      $jobApplied = DB::table('job_applied')->where('job_id', $value->id)->count();
                    @endphp
                    <div class="jobsDetailBox fw">
                      <div class="profile_sec fw" >
                        <div class="compnayBoxImg">
                          @if($userdetail->org_image !='')
                          <img src="{{ URL::asset('/public/uploads/') }}/{{ $userdetail->org_image }}" alt="images" />
                          @else
                          <img src="{{ URL::asset('/public/uploads/blank-profile-picture.png') }}" alt="images" />
                          @endif
                        </div>
                        <div class="compnay">
                          <h5>{{ $value->location ?? ''}}</h5>
                          <a href="{{ URL::to('job-details',$value->id) }}" class="interested_link"> {{$jobApplied ?? ''}} Interested Candidates</a>
                        </div>
                      </div>
                      <div class="jobsDetailCont fw">
                        <h3>{{ $userdetail->org_name ?? ''}}</h3>
                        <p><a href="#" class="lightblue_text">{{ $value->job_title ?? ''}}</a></p>
                        <div class="innerrow">
                         
                          <div class="col_grid9">
                            <ul>
                              @foreach(unserialize($value->offer) as $offer)
                              <li>{{ $offer }}</li>
                              @endforeach
                              <!-- <li>Be part of a dynamic and supportive work environment</li> -->
                            </ul>
                          </div>
                          <div class="col_grid3">
                            <a href="{{ URL::to('job-details',$value->id) }}"  class="input-btn redBGmanage_btn ">View Job</a>
                          </div>
                        </div>
                      </div>
                    </div> 
                  @endforeach
                @endif 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>   
    <script >
    $(document).ready(function(){
    $(".header_sec .togglebtn").click(function(){
      $(".header_sec ").toggleClass("opne_flow2header");
    });
  });
  </script>
    @include('fruntend.common_pages.web_footer') 
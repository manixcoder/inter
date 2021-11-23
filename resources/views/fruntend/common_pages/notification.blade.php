  @include('fruntend.common_pages.web_header')  
    <div class="body_wht-inners ">
      <div class="middle_container">
        <div class=" arrowheading_site text-left right_after_arrow afterHide_arrow">
          <h3>Notifications</h3>
        </div>
        
        @if(count($notification)>0)
          @foreach($notification as $value)
          @php $userdata = DB::table('users')->where('id', $value->user_id)->first(); @endphp
            <div class="notifivation_box fw">
              <div class="img_notiProfile">
                @if($userdata->users_role == 2)
                  <img src="{{ URL::asset('/public/uploads/') }}/{{ $userdata->profile_image ?? ''}}" alt="icon" />
                @else
                  <img src="{{ URL::asset('/public/uploads/') }}/{{ $userdata->org_image }}" alt="icon" />
                @endif
              </div>
              <div class="notification_cont">
                <div class="innerrow">
                  <div class="col_grid8 text-left">
                    <h4>{{ $userdata->name ?? '' }} <span> {{ $value->title ?? ''}}</span> </h4>
                  </div>
                  <div class="col_grid4 text-right">
                    <div class="fw text-right dateText">
                      {{$value->created_at ?? ''}}
                    </div>
                  </div>
                </div>
                <div class="notipra_text fw">
                   <p>{{ $value->description ?? ''}}</p>
                </div>
              </div>
            </div>
          @endforeach
          @else
          <h2>404</h2> 
          <p>Data not found.</p>
        @endif        
      </div>
    </div>
     @include('fruntend.common_pages.web_footer')  
    
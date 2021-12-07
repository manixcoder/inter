  @include('fruntend.common_pages.web_header')  
    <div class="body_wht-inners ">
      <div class="middle_container">
        <div class=" arrowheading_site text-left right_after_arrow afterHide_arrow">
          <h3>Notifications</h3>
        </div>
        @foreach(auth()->user()->notifications as $notification)
            @php 
            $userData = DB::table('users')->where('id',  $notification->data['comment_user'])->first();
            @endphp
            <div class="notifivation_box fw">
              <div class="img_notiProfile">
                @if($userData->users_role==='2')
                <img src="{{ URL::asset('/public/uploads/') }}/{{ $userData->profile_image}}" alt="icon" />
                @else
                <img src="{{ URL::asset('/public/uploads/') }}/{{ $userData->org_image}}" alt="icon" />
                @endif
              </div>
              <div class="notification_cont">
                <div class="innerrow">
                  <div class="col_grid8 text-left">
                    <h4> <span>{{ $userData->name}} </span> </h4>
                    <p>{{ $notification->data['notification_type']}}</p>
                  </div>
                  <div class="col_grid4 text-right">
                    <div class="fw text-right dateText">
                    <p>{{ $notification->data['comment']}}</p>
                    </div>
                  </div>
                </div>
                <div class="notipra_text fw">
                  
                </div>
              </div>
            </div>
            @endforeach 
          </div>
    </div>
     @include('fruntend.common_pages.web_footer')  
    
  @include('fruntend.common_pages.web_header')
  <div class="body_wht-inners ">
    <div class="middle_container">
      <div class=" arrowheading_site text-left right_after_arrow afterHide_arrow">
        
       
        <h3>Notifications </h3>
      </div>
      @foreach(auth()->user()->Notifications as $notification)
      @php
      // dd($notification);
      $userData = DB::table('users')->where('id', $notification->data['comment_user'])->first();
      $role = $userData->users_role;
      $notification->markAsRead();
      @endphp
      <div class="notifivation_box fw">
        <div class="img_notiProfile">
          @if($userData->users_role === '2')
          <img src="{{ URL::asset('/public/uploads/') }}/{{ $userData->profile_image}}" alt="icon" />
          @elseif($userData->users_role === '3')
          <img src="{{ URL::asset('/public/uploads/') }}/{{ $userData->profile_image}}" alt="icon" />
          @else
          <img src="{{ URL::asset('/public/uploads/placeholder.png') }}" alt="icon" />
          @endif
        </div>
        <div class="notification_cont">
          <div class="innerrow">
            <div class="col_grid8 text-left">
              <h4>
                <span>
                  @if($userData->users_role === '2')
                  {{ $userData->name }}
                  @elseif($userData->users_role === '3')
                  {{ $userData->org_name }}
                  @else
                  @endif
                </span>
              </h4>
              <p>
                {{ $notification->data['notification_type']}} {{ $notification->data['post_title']}}
              </p>
            </div>
            <div class="col_grid4 text-right">
              <div class="fw text-right dateText">
                <p>
                  {!! date('d M Y H:i', strtotime($notification->created_at)) !!}
                </p>
              </div>
            </div>
          </div>
          <div class="notipra_text fw">
            <?php echo  $notification->data['comment'] ?>
          </div>
          <div class="notipra_text fw">
            @if($notification->data['notification_type'] ==='Post a new Jobs')
            <a href="{{ URL::to('student/jobs')}}">View</a>
            @endif
            @if($notification->data['notification_type'] ==='Posted a post')
            <a href="{{ URL::to('/')}}">View</a>
            @endif
            

          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  @include('fruntend.common_pages.web_footer')
 @include('fruntend.common_pages.web_header')  
    <div class="body_wht-inners ">
      <div class="redAbout_banner text-center fw">
        <div class="lgcontainer">
          <h2>Privacy Policy</h2>
        </div>
      </div>
      <div class="aboutCont_sec fw">
        <div class="lgcontainer">
          @php 
            $privacypolicydata = DB::table('privacy_policy')->orderBy('id', 'Desc')->where('status',0)->get();
          @endphp
          @if(isset($privacypolicydata))
            @foreach($privacypolicydata as $value)
              <div class="aboutCont_box">
                <h3>{{ $value->heading }}</h3>
                <p>{{ $value->text }}</p>
              </div>
            @endforeach
          @endif         
        </div>
      </div>
    </div>
     @include('fruntend.common_pages.web_footer')  
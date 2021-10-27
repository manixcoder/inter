  @include('fruntend.common_pages.web_header')  

  @php $aboutusdata = DB::table('about_us')->orderBy('id', 'Desc')->where('status',0)->get(); @endphp

    <div class="body_wht-inners ">
      <div class="redAbout_banner text-center fw">
        <div class="lgcontainer">
          <h2>About Us</h2>
        </div>
      </div>
        @if(isset($aboutusdata))
          @foreach($aboutusdata as $value)
            <div class="aboutCont_sec fw">
              <div class="lgcontainer"> 
                <div class="aboutCont_box">
                  <h3>{{ $value->heading }}</h3>
                  <p>{{ $value->text }}</p>
                </div>          
              </div>
            </div>
          @endforeach
        @endif
    </div>
  @include('fruntend.common_pages.web_footer')  
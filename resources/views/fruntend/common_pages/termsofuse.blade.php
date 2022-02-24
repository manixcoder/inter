@include('fruntend.common_pages.web_header')  
    <div class="body_wht-inners ">
      <div class="redAbout_banner text-center fw">
        <div class="lgcontainer">
          <h2>Terms of Use</h2>
        </div>
      </div>
      <div class="aboutCont_sec fw">
        <div class="lgcontainer">
          @php 
            $termsofusedata = DB::table('term_of_use')->orderBy('id', 'Desc')->where('status',0)->get();
          @endphp
          @if(isset($termsofusedata))
            @foreach($termsofusedata as $value)
            <?php // dd($value);?>
              <div class="aboutCont_box">
                <h3>{{ $value->heading }}</h3>
                <p><?php echo $value->description ?></p>
              </div>
            @endforeach
          @endif         
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
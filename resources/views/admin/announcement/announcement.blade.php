<div class="content dashboard-pg">
   <h3 class="heading">Announcement
    <span class="add_student_btn">
    <a href="{{ URL::to('add_announcement')}}">Create Announcement</a>
    </span>
   </h3>
   <div id="loading_an">
      <img id="loading-image" src="{{ URL::asset('/public/uploads/TheInternifyAnimatedLogo.gif') }}" alt="Loading..." />
    </div>
   <div class="row">
      <div class="col-md-12 listtable-sec">
         <table class="table listjob_table text-left" id="announcementlist">
            <thead>
               <tr>
                  <th>
                     Blog ID
                <span class="serach-input">
                        <input type="text" name="searchbox" class="serachbox">
                     </span>
                  </th>
                  <th class="images_th">
                     Title
                     <span class="serach-input">
                        <input type="text" name="searchbox" class="serachbox">
                     </span>
                  </th>
                  <th class="headlineTh">
                     Content
                <span class="serach-input">
                        <input type="text" name="searchbox" class="serachbox">
                     </span>
                  </th>
                  <th class="contentTh">
                     Aim For
                     <span class="serach-input">
                        <input type="text" name="searchbox" class="serachbox">
                     </span>
                  </th>
                  <th class="Announced">
                     Announced on
                <span class="serach-input">
                        <input type="text" name="searchbox" class="serachbox">
                     </span>
                  </th>
                  <th class="actionTh">
                     Actions
                  </th>
               </tr>
            </thead>
            <tbody id="tabledata">
               @if(isset($Data))
                  @foreach($Data as $key=> $value)
                    <tr>
                         <td>#{{ $key+1 }}</td>
                         <td>{{$value->title }}</td>
                         <td><?php echo $value->description ?></td>
                         <td>{{$value->aim }}</td>
                         <td>{{ date('d M Y', strtotime($value->created_at))}}</td>
                         <td>
                           <span class="edit_icon">
                              <a href="{{ URL::to('announcement-edit',base64_encode($value->id)) }}">
                                 <img src="{{ asset('public/assets/images/editicon.png')}}" alt="icon">
                              </a>
                           </span>
                           <span class="edit_icon">
                              <a href="{{ URL::to('announcement-delete',$value->id) }}" onclick="return confirm('Are you sure you want to delete this item?');">
                                 <img src="{{ asset('public/assets/images/delete.svg')}}" alt="icon">
                              </a>                                   
                           </span>
                        </td>
                    </tr>  
                  @endforeach 
               @endif           
            </tbody>
            </table>
         
      </div>
   </div>
</div>

<!-- Table Search -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
<script type="text/javascript">
   $(document).ready(function(){
     $(".serachbox").on("keyup", function() {
       var value = $(this).val().toLowerCase();
       $("#tabledata tr").filter(function() {
         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
       });
     });
   });
</script>
<script>
   $(document).ready(function() {
      $('#announcementlist').DataTable({order:[]});
   });
</script>
<script>
    $(window).load(function() {
   // alert("hi");
    $('#loading').hide();
});
  </script>
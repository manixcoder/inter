<div class="content dashboard-pg">
 	<h3 class="heading">Announcement
    <span class="add_student_btn">
    <a href="{{ URL::to('add_announcement')}}">Create Announcement</a>
    </span>
 	</h3>
   <div class="row">
      <div class="col-md-12 listtable-sec">
         <table class="table listjob_table text-left" id="example">
            <thead>
               <tr>
                  <th>
                     Blog ID
                    
                  </th>
                  <th class="images_th">
                     Title
                     
                  </th>
                  <th class="headlineTh">
                     Content
                    
                  </th>
                  <th class="contentTh">
                     Aim For
                     
                  </th>
                  <th class="Announced">
                     Announced on
                  </th>
                  <th class="actionTh">
                     Actions
                  </th>
               </tr>
            </thead>
            <tbody id="tabledata">
            	@if(isset($Data))
            		@foreach($Data as $value)
		              <tr>
		                   <td>#{{$value->id }}</td>
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
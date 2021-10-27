<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>-->
<div class="content dashboard-pg">
            <h3 class="heading">Recruiters ({{ $DataCount}} )
            <span class="add_student_btn">
				<a href="{{ URL::to('redirect-recruiter')}}">Add New Recruiter</a>
			</span></h3>
            <div class="row">
              	<div class="col-md-12 listtable-sec">
					<table class="table listjob_table text-left" id="example">
						<thead>
							<tr>
								<th>Recruiter ID</th>
								<th>Company Logo/Name </th>
								<th> Official Email Address	</th>
								<th> Contact Number </th>
								<th> Status </th>
								<th>Actions </th>
							</tr>
						</thead>
						<tbody id="tabledata">
							@if(isset($Data))
								@foreach($Data as $value)
									@php 
										$old_date_timestamp = strtotime($value->created_at);
										$new_date = date('d-M-Y', $old_date_timestamp);  
									@endphp
									<tr>
										<td>#{{ $value->id }}</td>
										<td><i class="user_img"><img src="{{ URL::asset('/public/assets/org_images/') }}/{{ $value->org_image }}" alt="usericon"></i> {{ $value->org_name }}</td>
										<!--<td>{{ $value->name }}</td>-->
										<td>{{ $value->email }}</td>
										<td>{{ $value->phone }}</td>
										<td>
											<select class="active_salectbox" name="status" onchange="statuschange({{$value->id}})">
												@if($value->status == 0)
													<option value="0">Active</option>
													<option value="1">Inactive</option>
												@else
													<option value="1">Inactive</option>
													<option value="0">Active</option>
												@endif
											</select>
										</td>
										<td>
											<span class="edit_icon">
												<a href="{{ URL::to('recruiter-detail',base64_encode($value->id)) }}">
													<img src="{{ asset('public/assets/images/view.svg')}}" alt="icon">
												</a>
											</span>
											<span class="edit_icon">
												<a href="{{ URL::to('recruiter-delete',$value->id) }}" onclick="return confirm('Are you sure you want to delete this item?');">
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

<!-- Active inactive script -->
<script type="text/javascript">
	function statuschange(id){
		$.ajaxSetup({   
	        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
	    }); 
	    $.ajax({   
	        url:"{{url('recruiter-change/')}}"+'/'+id,     
	        method:"GET",   
	        contentType : 'application/json',   
	        success: function( data ) {  	            
	        }
	    });
	}
</script>
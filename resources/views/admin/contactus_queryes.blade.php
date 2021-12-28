<div class="content dashboard-pg">
<h3 class="heading">Contact Us ({{$DataCount ?? ''}})
	
	</h3>
    <div class="row">
    	
      	<div class="col-md-12 listtable-sec">
			<table class="table listjob_table text-left" id="ContactTable">
				<thead>
					<tr>
						<th>
							ID
							<span class="serach-input">
								<input type="text" name="searchbox" class="serachbox">
							</span>	
						</th>
						<th class="company_th">
							Name
							<span class="serach-input">
								<input type="text" name="searchbox" class="serachbox">
							</span>							
						</th>
						<th>
							Email Address
						<span class="serach-input">
								<input type="text" name="searchbox" class="serachbox">
							</span>
						</th>
						<th>
							Mobile Number
							<span class="serach-input">
								<input type="text" name="searchbox" class="serachbox">
							</span>
						</th>
						
						<th>
							Message
						<span class="serach-input">
								<input type="text" name="searchbox" class="serachbox">
							</span>
						</th>
						<th>
							Date/Time
						
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
								<td>{{$value->first_name }} {{$value->last_name }}</td>
								<td>{{$value->email }}</td>
								<td>{{$value->mobile }}</td>										
								<td><?php echo $value->message ?></td>
								<td>{{ date('d-M-Y / H:m', strtotime($value->created_at)) }}</td>
								<td>
									<span class="edit_icon">
										<a href="{{ URL::to('query-delete',$value->id) }}" onclick="return confirm('Are you sure you want to delete this item?');">
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
<script type="text/javascript">
	function statuschange(id){
		$.ajaxSetup({   
	        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
	    }); 
	    $.ajax({   
	        url:"{{url('student-change/')}}"+'/'+id,     
	        method:"GET",   
	        contentType : 'application/json',   
	        success: function( data ) {  	            
	        }
	    });
	}
</script>
<script>
	$(document).ready(function() {
		$('#ContactTable').DataTable({order:[]});
	});
</script>
<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>-->
<div class="content dashboard-pg">
	<!-- <div id="loading_r">
		<img id="loading-image" src="{{ URL::asset('/public/uploads/TheInternifyAnimatedLogo.gif') }}" alt="Loading..." />
	</div> -->
	<h3 class="heading">Recruiters ({{ $DataCount}} )
		<span class="add_student_btn">
			<a href="{{ URL::to('redirect-recruiter')}}">Add New Recruiter</a>
		</span>
	</h3>

	<div class="row">
		<div class="col-md-12 listtable-sec">
			<table class="table listjob_table text-left" id="listrecruiter_table">
				<thead>
					<tr>
						<th>
							Recruiter ID
							<span class="serach-input">
								<input type="text" name="searchbox" class="serachbox">
							</span>
						</th>
						<th>
							Company Logo/Name
							<span class="serach-input">
								<input type="text" name="searchbox" class="serachbox">
							</span>
						</th>
						<th>
							RecruiterName
							<span class="serach-input">
								<input type="text" name="searchbox" class="serachbox">
							</span>
						</th>
						<th>
							Official Email Address
							<span class="serach-input">
								<input type="text" name="searchbox" class="serachbox">
							</span>
						</th>
						<th>
							Contact Number
							<span class="serach-input">
								<input type="text" name="searchbox" class="serachbox">
							</span>
						</th>
						<th>
							Status
						</th>
						<th>
							Actions
						</th>
					</tr>
				</thead>
				<tbody id="recruitertabledata">
					@if(isset($Data))
					<?php $i = 1; ?>
					@foreach($Data as $key=> $value)
					@php
					$old_date_timestamp = strtotime($value->created_at);
					$new_date = date('d-M-Y', $old_date_timestamp);
					@endphp
					<tr>
						<td>#{{ $key+1 }}</td>
						<td>
							<i class="user_img">
								<img src="{{ URL::asset('/public/uploads/') }}/{{ $value->org_image }}" alt="usericon">
							</i>
							{{ $value->org_name }}
						</td>
						<td>{{ $value->name }}</td>
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
								<a href="{{ URL::to('recruiter-detail',$value->id ) }}">
									<img src="{{ asset('public/assets/images/view.svg')}}" alt="icon">
								</a>
							</span>
							<!-- <span class="edit_icon">
								<a href="{{ URL::to('/message')}}" target="_blank"><img src="{{ URL::asset('/public/assets/images/chat_2.svg') }}" alt="chat"></a>
							</span> -->
							<span class="edit_icon">
								<a href="{{ URL::to('recruiter-delete',$value->id) }}" onclick="return confirm('Are you sure you want to delete this item?');">
									<img src="{{ asset('public/assets/images/delete.svg')}}" alt="icon">
								</a>
							</span>
						</td>
					</tr>
					<?php $i++; ?>
					@endforeach
					@endif
				</tbody>
			</table>

		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
<!-- Table Search -->
<script type="text/javascript">
	$(document).ready(function() {
		$(".serachbox").on("change", function() {
			var value = $(this).val().toLowerCase();
			$("#recruitertabledata tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
	});
</script>

<!-- Active inactive script -->
<script type="text/javascript">
	function statuschange(id) {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			url: "{{url('recruiter-change/')}}" + '/' + id,
			method: "GET",
			contentType: 'application/json',
			success: function(data) {}
		});
	}
</script>

<script>
	$(document).ready(function() {
		$('#listrecruiter_table').DataTable({
			order: []
		});
	});
</script>
<script>
	$(window).load(function() {
		//alert("hi");
		$('#loading_r').hide();
	});
</script>
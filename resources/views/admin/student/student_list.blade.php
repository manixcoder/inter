<div class="content dashboard-pg">
	<h3 class="heading">Students ({{$DataCount ?? ''}})
		<span class="add_student_btn">
			<a href="{{ 'addstudent_redirect' }}">Add New Student</a>
		</span>
	</h3>
	<div class="row">

		<div class="col-md-12 listtable-sec">
			<table class="table listjob_table text-left" id="liststudent_table">
				<thead>
					<tr>
						<th class="company_th">
							Student ID
							<span class="serach-input">
								<input type="text" name="searchbox" class="serachbox">
							</span>
						</th>
						<th class="company_th">
							Student Name
							<span class="serach-input">
								<input type="text" name="searchbox" class="serachbox">
							</span>
						</th>
						<th class="company_th">
							Email Address
							<span class="serach-input">
								<input type="text" name="searchbox" class="serachbox">
							</span>
						</th>
						<th class="company_th">
							Mobile Number
							<span class="serach-input">
								<input type="text" name="searchbox" class="serachbox">
							</span>
						</th>
						<th class="company_th">
							Profile Image
							<span class="serach-input">
								<input type="text" name="searchbox" class="serachbox">
							</span>
						</th>
						<th class="status">
							Status

						</th>
						<th class="actionTh">
							Actions
						</th>
					</tr>
				</thead>
				<tbody id="tabledata">
					@if(isset($Data))
					<?php $i = 1; ?>
					@foreach($Data as $value)
					<tr>
						<td>#{{ $i }}</td>
						<td>{{$value->name }}</td>
						<td>{{$value->email }}</td>
						<td>{{$value->phone }}</td>
						<td>
							<i class="user_img">
								@if($value->profile_image !='')
								<img src="{{ URL::asset('/public/uploads/') }}/{{ $value->profile_image }}" alt="usericon">
								@else
								<img src="{{ URL::asset('/public/uploads/placeholder.png') }}" alt="usericon">
								@endif
							</i>
							{{ $value->org_name }}
						</td>
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
							<a href="{{ URL::to('student-detail',$value->id) }}">
								<img src="{{ asset('public/assets/images/view.svg')}}" alt="icon">
							</a>
							<span class="edit_icon">
								<a href="{{ URL::to('/message')}}" target="_blank">
									<img src="{{ asset('public/assets/images/chat_2.svg')}}" alt="icon">
								</a>
							</span>

							<span class="edit_icon">
								<a href="{{ URL::to('student-delete',$value->id) }}" onclick="return confirm('Are you sure you want to delete this item?');">
									<img src="{{ asset('public/assets/images/delete.svg')}}" alt="icon">
								</a>
							</span>
						</td>
					</tr>
					<?php $i++ ?>
					@endforeach
					@endif
				</tbody>
			</table>
			<!---->
		</div>
	</div>
</div>
<script type="text/javascript">
	function statuschange(id) {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			url: "{{url('student-change/')}}" + '/' + id,
			method: "GET",
			contentType: 'application/json',
			success: function(data) {}
		});
	}
</script>
<script>
	$(document).ready(function() {
		$('#liststudent_table').DataTable({
			columnDefs: [{
				orderable: false,
				targets: 0
			}],
			order: [
				[1, 'asc']
			]
		});
	});
</script>
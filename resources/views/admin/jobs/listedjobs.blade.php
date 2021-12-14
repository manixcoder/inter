<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>-->
<div class="content dashboard-pg">
	<div class="row">
		<h3 class="heading">Listed Jobs ({{ $DataCount}} )</h3>
		<div class="col-md-12 listtable-sec">
			<table class="table listjob_table text-left" id="listjob_table">
				<thead>
					<tr>
						<th class="jobid">
							Listed Job ID
							<span class="serach-input">
								<input type="text" name="searchbox" class="serachbox">
							</span>

						</th>
						<th class="company_th">
							Company Logo/Name
							<span class="serach-input">
								<input type="text" name="searchbox" class="serachbox">
							</span>

						</th>
						<th class="jobtitle-th">
							Job Title
							<span class="serach-input">
								<input type="text" name="searchbox" class="serachbox">
							</span>

						</th>
						<th class="location-th">
							Location
							<span class="serach-input">
								<input type="text" name="searchbox" class="serachbox">
							</span>
						</th>

						<th class="createdon-list">
							Created on
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
					@foreach($Data as $value)
					@php $orgname = DB::table('users')->where('id', $value->user_id)->first(); @endphp
					<tr>
						<td>#{{ $value->id }}</td>
						<td><i class="user_img"><img src="{{ URL::asset('/public/uploads/') }}/{{ $value->org_image }}" alt="usericon"></i> {{ $orgname->org_name ?? '' }}</td>
						<td>{{ $value->job_title }}</td>
						<td>{{ $value->location }}</td>

						<td>{{ date('d M Y', strtotime($value->created_at)) }}</td>
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
								<a href="{{ URL::to('job-detail',base64_encode($value->id)) }}">
									<img src="{{ asset('public/assets/images/view.svg')}}" alt="icon">
								</a>
							</span>
							<!--
								<span class="edit_icon">
									<img src="{{ asset('public/assets/images/chat_2.svg')}}" alt="icon">
								</span> 
							-->
							<span class="edit_icon">
								<a href="{{ URL::to('job-delete',$value->id) }}" onclick="return confirm('Are you sure you want to delete this item?');">
									<img src="{{ asset('public/assets/images/delete.svg')}}" alt="icon">
								</a>
							</span>
						</td>
					</tr>
					@endforeach
					@else
					<p>Data not found.!</p>
					@endif
				</tbody>
			</table>

		</div>
	</div>
</div>
<script type="text/javascript">
	$(function() {
		$("#datepicker").datepicker({
			dateFormat: "yy-mm-dd"
		});
		$("#datepicker").on("change", function() {
			alert('tes');
			var selected = $(this).val();
		});
	});
</script>

<!-- Table Search -->
<script type="text/javascript">
	$(document).ready(function() {
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
	function statuschange(id) {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			url: "{{url('jobstatus-change/')}}" + '/' + id,
			method: "GET",
			contentType: 'application/json',
			success: function(data) {}
		});
	}
</script>
<script>
	$(document).ready(function() {
		$('#listjob_table').DataTable({
			"lengthChange": true,
			"dom": '<"top"i>rt<"bottom"flp><"clear">',
			"lengthMenu": [
				[10, 25, 50, 100, 500, 1000],
				[10, 25, 50, 100, 500, "Max"]
			],
			"pageLength": 10,
		});
	});
</script>
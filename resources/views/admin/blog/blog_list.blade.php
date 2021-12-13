<div class="content dashboard-pg">
	<h3 class="heading">Blogs
		<span class="add_student_btn">
			<a href="{{URL::to('addblog_redirect')}}">Publish New Blog</a>
		</span>
	</h3>
	<div class="row">
		<div class="col-md-12 listtable-sec">
			<table class="table listjob_table text-left" id="listblog_table">
				<thead>
					<tr>
						<th>
							Blog ID
							<span class="serach-input">
								<input type="text" name="searchbox" class="serachbox">
							</span>
						</th>
						<th class="headlineTh">
							Headline
							<span class="serach-input">
								<input type="text" name="searchbox" class="serachbox">
							</span>
						</th>
						<th class="contentTh">
							Content
							<span class="serach-input">
								<input type="text" name="searchbox" class="serachbox">
							</span>
						</th>
						<th class="publishedTh">
							Published on
							<span class="serach-input">
								<input type="text" name="searchbox" class="serachbox">
							</span>
						</th>
						<th class="images_th">
							Image
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
					@php
					$old_date_timestamp = strtotime($value->posted_date_and_time);
					$new_date = date('d-M-Y', $old_date_timestamp);
					@endphp
					<tr>
						<td>#{{ $i }}</td>
						<td>{{$value->blog_heading}}</td>
						<td>{{ strip_tags($value->description) }}</td>
						<td>{{$new_date}}</td>
						<td><i class="box_img"><img src="{{ URL::asset('/public/uploads/') }}/{{ $value->blog_image }}" alt="usericon"></i></td>
						<td>
							<!-- <span class="edit_icon">
												<a href="#">
													<img src="{{ asset('public/assets/images/view.svg')}}" alt="icon">
												</a>
											</span> -->
							<!--	<span class="edit_icon">
												<img src="{{ asset('public/assets/images/chat_2.svg')}}" alt="icon">
											</span>-->
							<span class="edit_icon">
								<a href="{{ URL::to('blog-delete',$value->id) }}" onclick="return confirm('Are you sure you want to delete this item?');">
									<img src="{{ asset('public/assets/images/delete.svg')}}" alt="icon">
								</a>
							</span>
						</td>
					</tr>
					<?php $i++;  ?>
					@endforeach
					@endif
				</tbody>
			</table>

		</div>
	</div>
</div>

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
	// $(document).ready(function() {
	// 	$('#listblog_table').DataTable({
	// 		"lengthChange": true,
	// 		"dom": '<"top"i>rt<"bottom"flp><"clear">',
	// 		"lengthMenu": [
	// 			[10, 25, 50, 100, 500, 1000],
	// 			[10, 25, 50, 100, 500, "Max"]
	// 		],
	// 		"pageLength": 10,
	// 	});
	// });
</script>
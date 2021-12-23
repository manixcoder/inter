<div class="content dashboard-pg">
	<h3 class="heading">Dashboard</h3>
	<div class="row">
		<div class="col-md-2">
			<a href="{{ URL::to('today-student-list') }}">
				<div class="risk_crirical">
					<h3>{{ $newStudents ?? ''}}</h3>
					<p>New Students</p>
				</div>
			</a>
		</div>
		<div class="col-md-2">
			<a href="{{ URL::to('today-recruiter-list') }}">
				<div class="risk_crirical">
					<h3>{{ $newRecruiters ?? ''}}</h3>
					<p>New Recruiters</p>
				</div>
			</a>
		</div>
		<div class="col-md-2">
			<a href="{{ URL::to('today-job-list') }}">
				<div class="risk_crirical">
					<h3>{{ $todayJobs ?? ''}}</h3>
					<p>Today Listed Jobs</p>
				</div>
			</a>
		</div>
		<div class="col-md-2">
			<a href="{{ URL::to('student-list') }}">
				<div class="risk_crirical">
					<h3>{{ $totalStudents ?? ''}}</h3>
					<p>Total Students</p>
				</div>
			</a>
		</div>
		<div class="col-md-2">
			<a href="{{ URL::to('recruiter-list') }}">
				<div class="risk_crirical">
					<h3>{{ $totalRecruiters ?? ''}}</h3>
					<p>Total Recruiters</p>
				</div>
			</a>
		</div>
		<div class="col-md-2">
			<a href="{{ URL::to('joblist') }}">
				<div class="risk_crirical">
					<h3>{{ $totalJobs ?? ''}}</h3>
					<p>Total Listed Jobs</p>
				</div>
			</a>
		</div>
	</div>
</div>
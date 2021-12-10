<html>
	<head>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

		<style>
			table {
				font-family: arial, sans-serif;
				border-collapse: collapse;
				width: 100%;
			}

			td,
			th {
				border: 1px solid #dddddd;
				text-align: left;
				padding: 8px;
			}

			tr:nth-child(even) {
				background-color: #dddddd;
			}

			#ssp{
				text-align: right
			}
		</style>
	</head>

	<body>
		<div class="content">
			<div class="container-fluid">
				<!-- Page-Title -->
				<center>
					<div class="row">
						<div class="col-md-12">
							<div class="card" style="width:100%;">
								<div class="card-body">
									<form method="post" action="#" id="FormValidation" enctype="multipart/form-data">
										@csrf

										<div class="row">
											<div class="col-md-12">
												<h2> IT-SCIENT LLC </h2>
												<p>[ Office no-726, Ithome Tower-B, sect-62, Noida ]</p>
											</div>

											<div class="col-md-12" style="margin-bottom: 10px;">
												<h3> Salary Slip </h3>
											</div>

											<table>
												<thead>
													<tr>
														<th style="border: none !important;">Emp Name : {{ $name }} </th>
														<th style="border: none !important;">Designation : {{ $designation }}</th>
														<th style="border: none !important;">Emp Code : {{ $empcode }}</th>
													</tr>
												</thead>
											</table>


											<table>
												<thead>
													<tr>
														<th style="border: none !important;">Month : {{ $month }}</th>
														<th style="border: none !important;">Year : {{ $year }}</th>
													</tr>
												</thead>
											</table>
										</div>

										<table class="table table-bordered mb-0" style="margin-top: 20px;">
											<thead>
												<tr style="background-color: #e2e2e2;">
													<th style="text-align: center;">Earnings</th>
													<th></th>
													<th style="text-align: center;">Deductions</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Basic Salary</td>
													<td id="ssp">{{ $emp_basic_salary }}</td>
													<td>Loan Installment</td>
													<td id="ssp">{{ $loanamount }}.00</td>
												</tr>
											</tbody>
											<tr>
												<td>HRA</td>
												<td id="ssp">{{ $hra }}</td>
												<td>TDS</td>
												<td id="ssp">{{ $totalded }}</td>
											</tr>

											<tbody>
												<tr>
													<td>Medical Insurance</td>
													<td id="ssp">{{ $Medical_insurance }}</td>
													<td>-</td>
													<td id="ssp">-</td>
												</tr>
											</tbody>

											<tr>
												<td>Other Allowance</td>
												<td id="ssp">{{ $otherAllowance }}</td>
												<td>-</td>
												<td id="ssp">-</td>
											</tr>

											<tbody>
												<tr>
													<td>PF</td>
													<td id="ssp">{{ $pf }}</td>
													<td>-</td>
													<td id="ssp">-</td>
												</tr>
											</tbody>

											<tr>
												<td>Total Addition</td>
												<td id="ssp">{{ $emp_basic_salary + $hra + $Medical_insurance + $otherAllowance + $pf }}</td>
												<td>Total Deduction</td>
												<td id="ssp">{{ $totalded + $loanamount }}</td>
											</tr>

											<tbody>
												<tr>
													<td></td>
													<td id="ssp"></td>
													<td style="background-color: #e2e2e2;"><b>Net Salary</b></td>
													<td  id="ssp" style="background-color: #e2e2e2;">{{ $netpay }}<b></b></td>
												</tr>
											</tbody>
										</table>
									</div>
									
									<table>
										<thead>
											<tr>
												<th style="border: none !important;">Dated As : {{ date('Y-m-d') }} </th>
											</tr>
										</thead>
									</table>

									<table style="margin-top: 20px;">
										<thead>
											<tr>
												<th style="border: none !important;">Employee Signature: </th>
												<th style="border: none !important;">Director Signature:</th>
											</tr>
										</thead>
									</table>
								</div>
							</div>
						</div>
					</center>
				</div>
			</div>
		</body>	
</html>
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
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="table-responsive">
                                 <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                  <thead>
                                    <tr>
                                      <th>Emp Name</th>
                                      <th>Attedance Date</th>
                                      <th>In Time</th>
                                      <th>Out Time</th>
                                      <th>Shift Name</th>
                                      <th>Late</th>
                                      <th>Over Time</th>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>

                                    <tr class="gradeX">
                                      <td>{{ $name }}</td>
                                      <td>{{ $attendance_date }}</td>
                                      <td>{{ $in_time }}</td>
                                      <td>{{ $out_time }}</td>
                                      <td>{{ $shift_name }}</td>
                                      <td>{{ $late }}</td>
                                      <td>{{ $overtime }}</td>
                                      

                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </center>
                    </div>
                  </div>
                </body> 
                </html>
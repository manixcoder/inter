@php $username = DB::table('users')->where('id',Session::get('gorgID'))->first(); @endphp
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('public/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/responsive.css')}}" rel="stylesheet">
    <link href="{{ asset('public/assets/fonts/fonts.css')}}" rel="stylesheet">
    <script src="{{ asset('public/assets/js/jequery-main3.5.js')}}"></script> 
    <script src="{{ asset('public/js/commonjs.js')}}"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> 
    <script src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script> 

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.2.0/css/fixedHeader.dataTables.min.css">
    <title>Dashboard</title>
    <title>Dashboard</title>
  </head>
  <body>    
    <header class="header_sec">
      <div class="logo_part">
        <a href="{{URL::to('dashboard')}}"><img src="{{ asset('public/assets/images/logo.jpg')}}" alt="logo"></a>
      </div>                                                              
      <div class="navbar-nav">


         <div class="navbar-form">
        <form  action="{{ URL::to('search-header')}}" method="POST" id="signup-form" enctype="multipart/form-data">
        @csrf

          <div class="form-group">
                   
            
            <input type="text" name="search_text" class="form-control" placeholder="Search here" required="">
            <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>

            <select class="form-control" name="serch_in" required="">
              <option value="">Choose one</option>
              <option value="Jobs">Jobs</option>
              <option value="Student">Student</option>
              <option value="Recruiter">Recruiter</option>
            </select> 
          </div>
         </form>
      </div>  
      <ul>
        <!--  <li><i class="fa fa-comments"></i></li> -->
         <li>                
              <div class="login_part">
                  <div class="dropdown">
                    <figure><img src="{{ URL::asset('/public/uploads/') }}/{{ $username->org_image }}" alt="user-img"></figure>  
                    <button onclick="myFunction()" class="dropbtn">{{ $username->name ?? ''}}<i class="fa fa-angle-down"></i></button>
                    <ul class="logout-dropdown">
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();" class="dropdown-item"><i class="md md-settings-power mr-2"></i> {{ __('Logout') }}</a>
                        </li>
                    </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                           @csrf
                        </form>
                  </div>             
              </div>
         </li>
      </ul>                                                                                      
      </div>                      
    </header> 
  <div class="main_contant">
    @if (session('status'))
      <div style="text-align:center; color: red;" class="alert alert-danger" role="alert">
        Data not found.!
      </div>
    @endif
      
      

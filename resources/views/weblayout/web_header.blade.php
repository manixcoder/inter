<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>internify - Home</title>
    <!-- Fontawesome 4 Cdn from BootstrapCDN -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">    
    <link href="{{ asset('public/assets/web_assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('public/assets/web_assets/fonts/fonts.css')}}" rel="stylesheet">
  </head>
  <body class="">
    <header class="header_sec mobileHidesec fw">
      <div class="lgcontainer">
        <div class="innerrow">
          <div class="col_grid12">
            <ul class="nav-menu fw">
              <div class="togglebtn">
                <span></span>
                <span></span>
                <span></span>
              </div>
              <div class="left_sec col_grid4 text-left menu_link">
                <li class="active"><a href="{{ URL::to('/') }}">Home</a></li>
                <li><a href="{{ URL::to('blog') }}">Blogs</a></li>
              </div>
              <div class="center_sec text-center col_grid4 menu_logo"><a href="{{ URL::to('/') }}"><img src="{{ asset('public/assets/images/header-logo.svg')}}" alt="logo" /><img src="{{ asset('public/assets/images/logo.svg')}}" alt="wht-logo" class="wth-logo-hide" /></a></li></div>
              <div class="right_sec col_grid4 text-right menu_link">
                <li><a href="{{ URL::to('web-login') }}">Login</a></li>
                <li><a href="{{ URL::to('contactus') }}">Contact us</a></li>
              </div>
            </ul>                                                     
          </div>
        </div>
      </div>
    </header>
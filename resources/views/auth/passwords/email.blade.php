<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- Mirrored from coderthemes.com/moltran/blue/pages-recoverpw.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Jun 2019 12:16:16 GMT -->
<head>
    <meta charset="utf-8" />
    <title>{{__('Reset Password') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('public/assets/images/favicon_1.ico')}}">

    <!-- Custom Files -->
    <link href="{{ asset('public/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/style.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('public/assets/js/modernizr.min.js') }}"></script>

</head>
<body>


    <div class="wrapper-page">
        <div class="card card-pages">

            <div class="card-header bg-img"> 
                <div class="bg-overlay"></div>
                <h3 class="text-center m-t-10 text-white"> Reset Password </h3>
            </div> 

            <div class="card-body">
             @if (count($errors) > 0)
             <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </div>
            @endif
            <form  method="POST" action="{{ route('password.email') }}" class="text-center"> 
                @csrf
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    @if (session('status'))
                    {{ session('status') }}
                    @else
                    Enter your <b>Email</b> and instructions will be sent to you!
                    @endif
                </div>
                <div class="form-group m-b-0"> 
                    <div class="input-group"> 
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> 
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <span class="input-group-append"> <button type="submit" class="btn btn-primary waves-effect waves-light"> {{ __('Send Password Reset Link') }}</button> </span> 
                    </div> 
                </div> 

            </form>

        </div>                                 

    </div>
</div>


<script>
    var resizefunc = [];
</script>

<!-- Main  -->
<script src="{{ asset('public/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('public/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/assets/js/detect.js') }}"></script>
<script src="{{ asset('public/assets/js/fastclick.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery.blockUI.js') }}"></script>
<script src="{{ asset('public/assets/js/waves.js') }}"></script>
<script src="{{ asset('public/assets/js/wow.min.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery.scrollTo.min.js') }}"></script>

<script src="{{ asset('public/assets/js/jquery.app.js') }}"></script>

</body>

<!-- Mirrored from coderthemes.com/moltran/blue/pages-recoverpw.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Jun 2019 12:16:16 GMT -->
</html>
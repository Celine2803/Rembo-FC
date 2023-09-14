<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Rembo Football Club </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="{{ asset('/assets/css/font.css')}}">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="{{ asset('/assets/https://fonts.googleapis.com/css?family=Muli:300,400,700')}}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('/assets/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('/assets/css/custom.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('/assets/img/favicon.ico')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
    <link rel="stylesheet" href={{ asset('/assets/css/style.coach.css')}}>
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    @include('coach.pages1.header1')
    
    @include('coach.pages1.sidebar1')
      <!-- Sidebar Navigation end-->
     @yield('coach')
     @include('coach.pages1.footer1')
    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('/assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('/assets/vendor/popper.js/umd/popper.min.js')}}"></script>
    <script src="{{ asset('/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('/assets/vendor/jquery.cookie/jquery.cookie.js')}}"></script>
    <script src="{{ asset('/assets/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{ asset('/assets/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('/assets/js/charts-home.js')}}"></script>
    <script src="{{ asset('/assets/js/front.js')}}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
</script>
  </body>
</html>
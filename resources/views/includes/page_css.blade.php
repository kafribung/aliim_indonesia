@include('includes.favicon')
<!-- web-fonts -->
<link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,500' rel='stylesheet' type='text/css'>

<!-- Bootstrap -->
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

<!-- font-awesome -->
<link href="{{ asset('assets/fonts/font-awesome/font-awesome.min.css') }}" rel="stylesheet">
<!-- Mobile Menu Style -->
<link href="{{ asset('assets/css/mobile-menu.css') }}" rel="stylesheet">

<!-- Owl carousel -->
<link href="{{ asset('assets/css/owl.carousel.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/owl.theme.default.min.css') }}" rel="stylesheet">
<!-- Theme Style -->
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('dash/images/favicon.jpg') }}">

{{-- Page Loader --}}
<style>
  .preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background-color: #fff;
  }

  .preloader .loading {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    font: 14px arial;
  }
</style>
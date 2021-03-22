<!DOCTYPE html>
<html>
<head>
    @include('includes.page_meta')
    @include('includes.page_css')

    <!-- Global site tag (gtag.js) - Google Analytics -->
    {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-D6J2E0GVG7"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-D6J2E0GVG7');
    </script> --}}
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar">
    <div id="main-wrapper">
        <!-- Page Preloader -->
        <div class="preloader">
            <div class="loading">
                <img src="{{ asset('assets/img/spinner.gif') }}" width="80">
                <p>Harap Tunggu</p>
            </div>
        </div>
        <!-- End preloader -->
        <div class="uc-mobile-menu-pusher">
            <div class="content-wrapper">
                @include('layouts.page_navbar')
                @yield('content')
                @include('layouts.page_hadist')
                @include('layouts.page_footer')
            </div>
            <!-- #content-wrapper -->
        </div>
        <!-- .offcanvas-pusher -->
        @include('layouts.page_navbar_mobile')
    </div>
    <!-- #main-wrapper -->
    @include('includes.page_script')
    @stack('after_script')
</body>
</html>
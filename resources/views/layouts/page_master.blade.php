<!DOCTYPE html>
<html>

<head>
    <title>Aliim - Belajar Islam dengan asik dan menarik</title>
    @include('includes.page_meta')
    @include('includes.page_css')
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
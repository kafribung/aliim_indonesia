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
        <div id="preloader">
            <div id="status">
                <div class="status-mes"></div>
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
</body>

</html>
 <!-- header_section_wrapper -->
 <section id="header_section_wrapper" class="header_section_wrapper">
    <div class="container">
        <!-- Header Section -->
        <div class="header-section">
            <div class="row">
                <div class="col-md-4">
                    <div class="left_section">
                        <span class="date">
                            <p id="hari"></p>
                        </span>
                        <!-- Date -->
                        <span class="time">
                            <script>
                                document.write(new Date().getDate())
                            </script>/
                            <script>
                                document.write(new Date().getMonth())
                            </script>/
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                        </span>
                        <!-- Time -->
                    </div>
                    <!-- Left Header Section -->
                </div>
                <div class="col-md-4">
                    <div class="logo">
                        <a href="/"><img src="{{ asset('assets/img/logo.png') }}" title="Aliim | Indonesia" alt="Aliim Logo"></a>
                        <p>~ Belajar Islam Dengan Mudah ~</p>
                    </div>
                    <!-- Logo Section -->
                </div>
                <div class="col-md-4">
                    <div class="right_section">
                        <ul class="nav navbar-nav">
                            <li><a href="/login">Masuk</a></li>
                            <li><a href="/register">Daftar</a></li>
                        </ul>

                        <ul class="nav-cta hidden-xs">
                            <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-search"></i></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="head-search">
                                            <form role="form">
                                                <!-- Input Group -->
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Type Something"> <span class="input-group-btn">
                                                        <button type="submit"
                                                            class="btn btn-primary">Search
                                                        </button>
                                                    </span></div>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <!-- Search Section -->
                    </div>
                    <!-- Right Header Section -->
                </div>
            </div>
        </div>
        <!-- END Header Section -->

        <!-- navigation-section -->
        <div class="navigation-section">
            <!-- END nav -->
            <nav class="navbar m-menu navbar-default">
                <div class="container text-center">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1"><span class="sr-only">Toggle
                                navigation</span> <span class="icon-bar"></span> <span
                                class="icon-bar"></span> <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="#navbar-collapse-1">
                        <ul class="nav navbar-nav main-nav">
                            <li class="active"><a href="/">Home</a></li>
                            <li class="dropdown m-menu-fw">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                    Belajar Islam
                                    <span><i class="fa fa-angle-down"></i></span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="m-menu-content">
                                            <ul class="col-sm text-center">
                                                <li class="dropdown-header">Mengenal Islam</li>
                                                <li>
                                                    <a href="#">Akidah</a>
                                                </li>
                                                <li>
                                                    <a href="#">Akhlak</a>
                                                </li>
                                                <li>
                                                    <a href="#">Manhaj/Aturan</a>
                                                </li>
                                                <li>
                                                    <a href="#">Al-Quuran</a>
                                                </li>
                                                <li>
                                                    <a href="#">Fikih dan Muamalah</a>
                                                </li>
                                            </ul>

                                        </div>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown m-menu-fw">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                    Video
                                    <span><i class="fa fa-angle-down"></i></span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="m-menu-content">
                                            <ul class="col-sm text-center">
                                                <li class="dropdown-header">Belajar</li>
                                                <li>
                                                    <a href="#">Sholat</a>
                                                </li>
                                                <li>
                                                    <a href="#">Istikharah</a>
                                                </li>
                                                <li>
                                                    <a href="#">Ngaji</a>
                                                </li>
                                                <li>
                                                    <a href="#">Puasa</a>
                                                </li>
                                                <li>
                                                    <a href="#">Muamalah</a>
                                                </li>
                                                <li>
                                                    <a href="#">Haji</a>
                                                </li>
                                            </ul>

                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Doa Harian</a>
                            </li>
                            <li>
                                <a href="#">Tanya Ustad</a>
                            </li>

                        </ul>
                    </div>
                    <!-- .navbar-collapse -->
                </div>
                <!-- .container -->
            </nav>
            <!-- END nav -->
        </div>
        <!-- END navigation-section -->
    </div>
    <!-- .container -->
</section>
<!-- END header_section_wrapper -->
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
                        <a href="/">
                            <img src="{{ asset('assets/img/logo.jpg') }}" title="Aliim | Indonesia" alt="Aliim Logo">
                        </a>
                        <p>~ Belajar Islam Dengan Mudah ~</p>
                    </div>
                    <!-- Logo Section -->
                </div>
                <div class="col-md-4">
                    <div class="right_section">
                        @guest
                        <ul class="nav navbar-nav">
                            <li><a href="/login">Masuk</a></li>
                            <li><a href="/register">Daftar</a></li>
                        </ul>

                        @else
                        <ul class="nav navbar-nav">
                            <li>
                                <div class="media-left">
                                    <img alt="64x64" class="rounded-circle" src="{{url(Auth::user()->takeImg)}}" width=50"
                                        height="50">
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{Auth::user()->name}}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/profil">Profile</a>
                                    <a class="dropdown-item" href=""
                                        onclick="event.preventDefault(); document.getElementById('logout').submit();">Logout</a>
                                    <form id="logout" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                    @if (Auth::user()->role==2 || Auth::user()->role==1)
                                    <a class="dropdown-item" href="/dashboard"><b>Dashboard</b></a>
                                    @endif
                                </div>
                            </li>
                        </ul>
                        @endguest

                        <ul class="nav-cta hidden-xs">
                            <li class="dropdown"><a href="" data-toggle="dropdown" class="dropdown-toggle"><i
                                        class="fa fa-search"></i></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="head-search">
                                            <form role="form" action="/search/artikel" method="get">
                                                <!-- Input Group -->
                                                <div class="input-group">
                                                    <input type="text" name="cari" class="form-control"
                                                        placeholder="Cari Artikel">
                                                    <span class="input-group-btn">
                                                        <button type="submit" class="btn btn-primary">Cari
                                                        </button>
                                                    </span>
                                                </div>
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
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="navbar-collapse-1"><span class="sr-only">Toggle
                                navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span
                                class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-collapse-1">
                        <ul class="nav navbar-nav main-nav">
                            <li class="{{ Request::is('/') ? 'active' : '' }}">
                                <a href="/">Beranda</a>
                            </li>
                            <li class="dropdown m-menu-fw {{ Request::is('belajar-artikel/*') ? 'active' : '' }} {{ Request::is('artikel-islam/*') ? 'active' : '' }}">
                                <a href="" data-toggle="dropdown" class="dropdown-toggle">
                                    Belajar Islam
                                    <span><i class="fa fa-angle-down"></i></span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="m-menu-content">
                                            <ul class="col-sm text-center">
                                                <li class="dropdown-header">Mengenal Islam</li>
                                                @foreach ($kategori_artikels as $kategori)
                                                <li>
                                                    <a href="/belajar-artikel/{{$kategori->title}}">{{$kategori->title}}
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="{{  request()->is('motivasi') ? 'active' : '' }}">
                                <a href="/galeri-islam">Galeri Islam</a>
                            </li>
                            <li class="{{  request()->is('tanya-ustad') ? 'active' : '' }}">
                                <a href="/tanya-ustad">Tanya Ustad <sup class="badge badge-info text-danger">{{ Auth::user()->countUnseenMessages() }}</sup> </a>
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
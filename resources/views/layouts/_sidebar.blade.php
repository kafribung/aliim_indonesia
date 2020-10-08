<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{Request::segment(1) == 'dashboard' ? 'active' : ''}}">
                    <a href="/dashboard"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>

                @if (auth()->user()->role != 2)
                <li class="menu-title">Manajemen</li>
                <li class="menu-item-has-children dropdown {{Request::segment(1) == 'user' ? 'active' : ''}} {{ request()->segment(1) == 'ustad' ? 'active' : '' }} {{ request()->segment(1) == 'admin' ? 'active' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs "></i>Manajemen</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-user"></i><a href="/user">User</a></li>
                        <li><i class="menu-icon fa fa-heart"></i><a href="/ustad">Ustad</a></li>
                        <li><i class="menu-icon fa fa-user-circle"></i><a href="/admin">Admin</a></li>
                    </ul>
                </li>
                @endif

                <li class="menu-title">Artikel & Video</li>

                <!-- /Artikel -->
                <li class="menu-item-has-children dropdown {{Request()->segment(1) == 'kategori-artikel' ? 'active' : ''}} {{Request()->segment(1) == 'artikel' ? 'active' : ''}}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-newspaper-o "></i>Artikel</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-list"></i><a href="/kategori-artikel">Kategori Artikel</a></li>
                        <li><i class="menu-icon fa fa-newspaper-o"></i><a href="/artikel">Semua Artikel</a></li>
                        <li><i class="menu-icon fa fa-pencil"></i><a href="/artikel/create">Tambah Artikel</a></li>
                    </ul>
                </li>

                <!-- /Video -->
                <li class="menu-item-has-children dropdown {{Request()->segment(1) == 'kategori-video' ? 'active' : ''}} {{Request()->segment(1) == 'video' ? 'active' : ''}}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-video-camera "></i>Video</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-list"></i><a href="/kategori-video">Kategori Video</a></li>
                        <li><i class="menu-icon fa fa-video-camera"></i><a href="/video">Semua Video</a></li>
                        <li><i class="menu-icon fa fa-pencil"></i><a href="/video/create">Tambah Video</a></li>
                    </ul>
                </li>

                @if (auth()->user()->role != 2)
                <li class="menu-title">Motivasi</li>
                <!-- /Motivasi -->
                <li class="menu-item-has-children dropdown {{Request()->segment(1) == 'doa-hadist' ? 'active' : ''}}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-file-image-o "></i>Doa & Hadist</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-image"></i><a href="/doa-hadist">Semua Doa & Hadist</a></li>
                        <li><i class="menu-icon fa fa-pencil"></i><a href="/doa-hadist/create">Tambah Doa & Hadist</a></li>
                    </ul>
                </li>


                <li class="menu-title">Plugin</li>
                <!-- /Plugin -->
                <li class="menu-item-has-children dropdown {{Request()->segment(1) == 'iklan' ? 'active' : ''}} {{Request()->segment(1) == 'hadist' ? 'active' : ''}}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-plug"></i>Doa & Hadist</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-gift"></i><a href="/iklan">Iklan</a></li>
                        <li><i class="menu-icon fa fa-shield"></i><a href="/hadist">Hadist Harian</a></li>
                    </ul>
                </li>
                @endif


                <li class="menu-title">Komentar</li>
                <!-- /.menu-title -->

                <li>
                    <a href="#"> <i class="menu-icon ti-comments"></i>Lihat Komentar</a>
                </li>

                <li class="menu-title">Pertanyaan</li>
                <!-- /.menu-title -->

                <li>
                    <a href="#"> <i class="menu-icon ti-comment-alt"></i>Lihat Pertanyaan</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->
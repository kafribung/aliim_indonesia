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
                        <li><i class="menu-icon fa fa-moon-o"></i><a href="/ustad">Ustad</a></li>
                        <li><i class="menu-icon fa fa-user-circle"></i><a href="/admin">Admin</a></li>
                    </ul>
                </li>
                @endif

                <!-- /Artikel -->
                <li class="menu-title">Artikel</li>
                <li class="{{Request()->segment(1) == 'kategori-artikel' ? 'active' : ''}}">
                    <a href="/kategori-artikel"><i class="menu-icon fa fa-list"></i>Kategori Artikel</a>
                </li>
                <li class="{{Request()->segment(1) == 'artikel' ? 'active' : ''}}">
                    <a href="/artikel"><i class="menu-icon fa fa-newspaper-o"></i>Artikel</a>
                </li>

                @if (auth()->user()->role != 2)
                <!-- /Galeri -->
                <li class="menu-title">Galeri</li>
                <li class="{{Request()->segment(1) == 'galeri' ? 'active' : ''}}">
                    <a href="/galeri"> <i class="menu-icon fa fa-file-image-o"></i>Galeri</a>
                </li>

                <!-- /Iklan -->
                <li class="menu-title">Iklan & Hadist</li>
                <li class="{{Request()->segment(1) == 'iklan' ? 'active' : ''}}">
                    <a href="/iklan"> <i class="menu-icon fa fa-gift"></i>Iklan</a>
                </li>
                @endif

                <!-- /Hadist -->
                <li class="{{Request()->segment(1) == 'hadist' ? 'active' : ''}}">
                    <a href="/hadist"> <i class="menu-icon fa fa-shield"></i>Hadist Harian</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->
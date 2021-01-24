<!-- Navbar Mobile -->
<a href="#" class="crunchify-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
<div class="uc-mobile-menu uc-mobile-menu-effect">
    <button type="button" class="close" aria-hidden="true" data-toggle="offcanvas" id="uc-mobile-menu-close-btn">&times;</button>
    <div>
        <ul id="menu">
            <!-- Home -->
            <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Home</a></li>
            <!-- Belajar Islam-->
            <li class="dropdown m-menu-fw {{ Request::is('belajar-artikel/*') ? 'active' : '' }} {{ Request::is('artikel-islam/*') ? 'active' : '' }}"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Belajar Islam <span><i class="fa fa-angle-down"></i></span></a>
                <ul class="dropdown-menu">
                    <li>
                        <div class="m-menu-content">
                            <ul class="col-sm-3">
                                <li class="dropdown-header">Mengenal Islam</li>
                                @foreach ($kategori_artikels as $kategori)
                                    <li>
                                        <a href="/belajar-artikel/{{$kategori->title}}">{{$kategori->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <!-- Motivasi -->
            <li class="{{  request()->is('motivasi') ? 'active' : '' }}">
                <a href="/motivasi">Motivasi</a>
            </li>
            <!-- TanyaUstad -->
            <li class="{{  request()->is('tanya-ustad') ? 'active' : '' }}">
                <a href="/tanya-ustad">Tanya Ustad</a>
            </li>
        </ul>
    </div>
</div>
<!-- .uc-mobile-menu -->
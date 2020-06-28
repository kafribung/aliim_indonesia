<!-- Navbar Mobile -->
<a href="#" class="crunchify-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
<div class="uc-mobile-menu uc-mobile-menu-effect">
    <button type="button" class="close" aria-hidden="true" data-toggle="offcanvas" id="uc-mobile-menu-close-btn">&times;</button>
    <div>
        <ul id="menu">
            <!-- Home -->
            <li><a href="index.html">Home</a></li>
            <!-- Belajar Islam-->
            <li class="dropdown m-menu-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Belajar Islam
                    <span><i class="fa fa-angle-down"></i></span></a>
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
            <!-- Video -->
            <li class="dropdown m-menu-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Vidoe
                    <span><i class="fa fa-angle-down"></i></span></a>
                <ul class="dropdown-menu">
                    <li>
                        <div class="m-menu-content">
                            <ul class="col-sm-3">
                                <li class="dropdown-header">Belajar Video</li>
                                @foreach ($kategori_videos as $kategori)
                                <li>
                                    <a href="/belajar-video/{{$kategori->title}}">{{$kategori->title}}</a>
                                </li>
                                @endforeach
                            </ul>

                        </div>
                    </li>
                </ul>
            </li>
            <li>
                <a href="/motivasi">Motivasi</a>
            </li>
            <li>
                <a href="#">Tanya Ustad</a>
            </li>
        </ul>
    </div>
</>
<!-- .uc-mobile-menu -->
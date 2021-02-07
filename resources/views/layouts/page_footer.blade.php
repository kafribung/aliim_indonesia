{{-- Footer --}}
<section id="footer_section" class="footer_section">
    <div class="container">
        <hr class="footer-top">
        <div class="row">
            <div class="col-md-4">
                <div class="footer_widget_title">
                    <h3>Tentang Aliim</h3>
                </div>
                <div class="logo footer-logo">
                    <img class="lazy" data-src="{{ asset('assets/img/karakter.jpg') }}" alt="Belajar" title="Aliim Indonesia" width="200">
                    <p>Sebuah tempat pembelajaran dan pengetahuan mulai dari dasar tentang islam, dilengkapi dengan artikel islam dan video pembelajaran</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footer_widget_title">
                    <h3>Informasi</h3>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <ul class="list-unstyled left">
                            <li>Page Aliim</li>
                            <li>Email</li>
                            <li>Pengembang</li>
                            <li>Alamat</li>
                        </ul>
                    </div>
                    <div class="col-xs-8">
                        <ul class="list-unstyled">
                            <li>
                                <a href="aliim.web.id">Aliim Lending Page</a>
                            </li>
                            <li>
                                <a href="mailto:aliim.nomads@gmail.com">aliim.nomads@gmail.com</a>
                            </li>
                            <li>Aliim Indonesia</li>
                            <li>
                                Jl. Romangpolong, Somba Opu, Romangpolong, Kec. Somba Opu, Kabupaten Gowa, Sulawesi Selatan 92113
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="footer_widget_title">
                    <h3>Tanggapan</h3>
                </div>
                @if (session('msg'))
                    <p class="alert alert-info">{{ session('msg') }}</p>
                @endif
                <form action="{{ route('tanggapan.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="description">Berikan tanggapan</label>
                        <textarea name="description" cols="50" rows="8" style="resize: none"  id="description" class="form-control" placeholder="Tanggapan anda mengenai aplikasi ini"></textarea>
                        @if ($errors->has('description'))
                            <p class="alert alert-danger">{{ $errors->first('description') }}</p>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm btn-block">Kirim</button>
                </form>
            </div>
        </div>
    </div>

    <div class="footer_bottom_Section">
        <div class="container">
            <div class="row">
                <div class="footer">
                    <div class="col-sm-3">
                        <div class="social">
                            <a href="https://www.facebook.com/aliimindonesia-112200600443015/" target="_blank" class="icons-sm fb-ic"><i class="fa fa-facebook"></i></a>
                            <!--Twitter-->
                            <a href="https://twitter.com/aliim_indonesia" target="_blank" class="icons-sm tw-ic"><i class="fa fa-twitter"></i></a>
                            <!--Google +-->
                            <a href="https://www.instagram.com/aliim.indonesia/" target="_blank" class="icons-sm inst-ic"><i class="fa fa-instagram"> </i></a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <p>
                            &copy; Hak Cipta
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="https://aliim.web.id" target="_blank">Aliim | Indonesia</a>
                            <!-- TEMPLATE :  https://uicookies.com -->
                        </p>
                    </div>
                    <div class="col-sm-3">
                        <p>Mari kembali kejalanNya</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- END Footer --}}
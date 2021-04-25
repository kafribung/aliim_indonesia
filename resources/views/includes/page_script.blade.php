<!-- jquery Core-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<!-- Bootstrap -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

<!-- Lazy Load -->
<script src="{{ asset('assets/js/lazy-load.js') }}"></script>

<!-- Theme Menu -->
<script src="{{ asset('assets/js/mobile-menu.js') }}"></script>

<!-- Owl carousel -->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

<!-- Theme Script -->
<script src="{{ asset('assets/js/script.js') }}"></script>

<!-- Hari -->
<script>
    let hari = document.getElementById('hari');
    let namaHari = ['Ahad', 'Senin', 'Selasa', 'Rabu', 'Kamis', "Jum'at", 'Sabtu'];
    let decrement = new Date().getDay();
    hari.innerHTML = namaHari[decrement];
</script>

{{-- Page Loader --}}
<script>
    $(document).ready(function(){
    $(".preloader").fadeOut();
    })
</script>

{{-- Lightbox --}}
<script src="{{ asset('lightbox/js/lightgallery.min.js') }}"></script>

<!-- lightgallery plugins -->
<script src="{{ asset('lightbox/js/lg-thumbnail.min.js') }}"></script>
<script src="{{ asset('lightbox/js/lg-fullscreen.min.js') }}"></script>
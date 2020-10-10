<!-- jquery Core-->
{{-- <script src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script> --}}
{{-- <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script> --}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<!-- Bootstrap -->
{{-- <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script> --}}
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

<!-- Theme Menu -->
<script src="{{ asset('assets/js/mobile-menu.js') }}"></script>

<!-- Owl carousel -->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

<!-- Theme Script -->
<script src="{{ asset('assets/js/script.js') }}"></script>

<!-- Hari -->
<script>
    let hari = document.getElementById('hari');
     let namaHari = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'ahad'];
     let decrement = new Date().getDay();

     hari.innerHTML = namaHari[decrement];
</script>

{{-- Page Loader --}}
<script>
    $(document).ready(function(){
    $(".preloader").fadeOut();
    })
</script>

{{-- Plugin Share --}}
<script type="text/javascript"
    src="https://platform-api.sharethis.com/js/sharethis.js#property=5ef8452a678aaf0012f25cab&product=inline-share-buttons"
    async="async"></script>
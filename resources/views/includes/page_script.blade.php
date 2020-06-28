 <!-- jquery Core-->
 <script src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>

 <!-- Bootstrap -->
 <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

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
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5ef8452a678aaf0012f25cab&product=inline-share-buttons" async="async"></script>


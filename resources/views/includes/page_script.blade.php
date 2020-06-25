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
     var hari = document.getElementById('hari');
     var namaHari = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'ahad'];
     let decrement = new Date().getDay() - 1;

     hari.innerHTML = namaHari[decrement];
 </script>
<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>All Rights Reserved &copy; Created By : <a href="http://tabadil.com/" target="_blank"><b>Tabadil</b></a></span>
    </div>
  </div>
</footer>
<!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span>
    </button>
  </div>
  <div class="modal-body">Are You Sure To Logout ?</div>
  <div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-dismiss="modal">Back</button>
    <a class="btn btn-info" href="{{ route('dashboardpage') }}"
      onclick="event.preventDefault();
    document.getElementById('logout-form').submit();"> Logout </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </div>
</div>
</div>
</div>
<!-- Bootstrap core JavaScript-->
<script>
let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

  elems.forEach(function(html) {
      let switchery = new Switchery(html,  { size: 'small' });
  });
  
  
  
  
  </script>
<script src="{{ asset('Backend/js/jquery.min.js') }}"></script>
<script src="{{ asset('Backend/js/bootstrap.bundle.min.js') }}"></script>
<!-- Core plugin JavaScript-->
<script src="{{ asset('Backend/js/jquery.easing.min.js') }}"></script>
<!-- Custom scripts for all pages-->
<script src="{{ asset('Backend/js/sb-admin-2.min.js') }}"></script>
<!-- Page level plugins -->
<script type="text/javascript" src="{{ asset('Backend/js/bootstrap-filestyle.js') }}"> </script>
@yield('ckeditor')
<script src="{{ asset('Backend/js/custom.js') }}"></script>
<script src="{{ asset('Backend/js/updates.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>

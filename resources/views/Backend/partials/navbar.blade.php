<!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <li class="nav-item">
              <a class="nav-link" target="_blank" href="{{ route('/') }}" aria-haspopup="true" aria-expanded="false">
                <span class="navbar-linked mr-2 d-none d-lg-inline text-dark small">
                  <i class="fas fa-eye fa-3x"></i> Site Online</span>
              </a>
            </li>
            <li class="nav-item no-arrow">
              <a class="nav-link" href="" data-toggle="modal" data-target="#logoutModal">
                <span class="navbar-linked mr-1 d-none d-lg-inline text-dark small">
                  <i class="fas fa-sign-out-alt"></i>Logout</span>
                <img class="img-profile rounded-circle" src="{{ asset('Backend/img/admin.png') }}">
              </a>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

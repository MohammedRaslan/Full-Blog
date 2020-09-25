<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->

    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboardpage') }}">
        <div class="sidebar-brand-icon">
          <i class="fas fa-user-cog"></i>
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item @if (\Request::is('admin/dashboard')) active @endif">
        <a class="nav-link" href="{{ route('dashboardpage') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span class="sidebar-title">Dashboard</span></a>
      </li>

      <!-- Nav Item - Settings -->
      <li class="nav-item @if (\Request::is('admin/settings')) active @endif">
        <a class="nav-link" href="{{ route('settingspage') }}">
          <i class="fas fa-tools"></i>
          <span class="sidebar-title">Website Settings</span></a>
      </li>

      <!-- Nav Item - About -->
      <li class="nav-item @if (\Request::is('admin/about')) active @endif">
        <a class="nav-link" href="{{ route('aboutpage') }}">
          <i class="fas fa-building"></i>
          <span class="sidebar-title">About us</span></a>
      </li>

      <!-- Nav Item - About -->
      <li class="nav-item @if (\Request::is('admin/slider')) active @endif">
        <a class="nav-link" href="{{ route('sliderpage') }}">
          <i class="fas fa-image"></i>
          <span class="sidebar-title">Slider</span></a>
      </li>

      <!-- Nav Item - Features -->
      <li class="nav-item @if (\Request::is('admin/features')) active @endif">
        <a class="nav-link" href="{{ route('featurespage') }}">
          <i class="fas fa-cubes"></i>
          <span class="sidebar-title">Features</span></a>
      </li>

      <!-- Nav Item - Services -->
      <li class="nav-item @if (\Request::is('admin/services')) active @endif">
        <a class="nav-link" href="{{ route('servicespage') }}">
          <i class="fas fa-toolbox"></i>
          <span class="sidebar-title">Services</span></a>
      </li>
      <!-- Nav Item - Counter -->
      <li class="nav-item @if (\Request::is('admin/counter')) active @endif">
        <a class="nav-link" href="{{ route('counterspage') }}">
          <i class="fas fa-poll"></i>
          <span class="sidebar-title">Counter</span></a>
      </li>
      <!-- Nav Item - Partners -->
      <li class="nav-item @if (\Request::is('admin/partners')) active @endif">
        <a class="nav-link" href="{{ route('partnerspage') }}">
          <i class="fas fa-handshake"></i>
          <span class="sidebar-title">Partners</span></a>
      </li>
      <!-- Nav Item - Pricing -->
      <li class="nav-item @if (\Request::is('admin/pricing')) active @endif">
        <a class="nav-link" href="{{ route('pricingpage') }}">
          <i class="fas fa-money"></i>
          <span class="sidebar-title">Pricing Packages</span></a>
      </li>
      <!-- Nav Item - Testimonials -->
      <li class="nav-item @if (\Request::is('admin/testimonials')) active @endif">
        <a class="nav-link" href="{{ route('testimonialspage') }}">
          <i class="fas fa-money"></i>
          <span class="sidebar-title">Testimonials</span></a>
      </li>
      <!-- Nav Item - Team Members -->
      <li class="nav-item @if (\Request::is('admin/team')) active @endif">
        <a class="nav-link" href="{{ route('teampage') }}">
          <i class="fas fa-users"></i>
          <span class="sidebar-title">Team Members</span></a>
      </li>
      <!-- Nav Item - Projects -->
      <li class="nav-item @if (\Request::is('admin/projects')) active @endif">
        <a class="nav-link" href="{{ route('projectspage') }}">
          <i class="fas fa-globe"></i>
          <span class="sidebar-title">Projects</span></a>
      </li>
      <!-- Nav Item - Posts -->
      <li class="nav-item @if (\Request::is('admin/posts')) active @endif">
        <a class="nav-link" href="{{ route('postspage') }}">
          <i class="fas fa-newspaper"></i>
          <span class="sidebar-title">Blog</span></a>
      </li>
      <!-- Nav Item - FAQ -->
      <li class="nav-item @if (\Request::is('admin/faqs')) active @endif">
        <a class="nav-link" href="{{ route('faqspage') }}">
          <i class="fas fa-question"></i>
          <span class="sidebar-title">FAQ's</span></a>
      </li>
      <!-- Nav Item - Subscribers List -->
      <li class="nav-item @if (\Request::is('admin/subscribers')) active @endif">
        <a class="nav-link" href="{{ route('subscriberspage') }}">
          <i class="fas fa-users"></i>
          <span class="sidebar-title">Subscribers List</span></a>
      </li>
      <!-- Nav Item - Messages  -->
      <li class="nav-item @if (\Request::is('admin/messages')) active @endif">
        <a class="nav-link" href="{{ route('messagespage') }}">
          <i class="fas fa-envelope"></i>
          <span class="sidebar-title">Contact Messages</span></a>
      </li>
      <!-- Nav Item - Pages  -->
      <li class="nav-item @if (\Request::is('admin/pages')) active @endif">
        <a class="nav-link" href="{{ route('pagespage') }}">
          <i class="fas fa-file"></i>
          <span class="sidebar-title">Pages</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

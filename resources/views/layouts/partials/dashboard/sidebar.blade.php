<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href={{ route('posts') }}>
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
    <a class="nav-link" href="/dashboard">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Master
  </div>
  <!-- Nav Item - My Posts -->
  <li class="nav-item {{ request()->routeIs('posts.*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('posts.index') }}">
      <i class="fas fa-fw fa-file"></i>
      <span>My Posts</span></a>
  </li>

  @can('admin')
  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Administrator
  </div>
  <!-- Nav Item - Categories -->
  <li class="nav-item {{ request()->routeIs('categories.*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('categories.index') }}">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Categories</span></a>
  </li>
  <li class="nav-item {{ request()->routeIs('all-posts.*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('all-posts.index') }}">
      <i class="fas fa-fw fa-file"></i>
      <span>All Posts</span></a>
  </li>
  @endcan
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
<!-- End of Sidebar -->
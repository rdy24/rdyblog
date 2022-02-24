<nav class="navbar navbar-expand-lg navbar-dark bg-warning">
  <div class="container">
    <a class="navbar-brand" href="/">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('posts') || request()->routeIs('posts.detail') ? 'active' : '' }}"
            href="/posts">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('category') ? 'active' : '' }}" href="/category">Category</a>
        </li>
        @auth
        <li class="nav-item dropdown mx-auto">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            Welcome, {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();this.closest('form').submit();">
                  Log out
                </a>
              </form>
            </li>
          </ul>
        </li>
        @else
        <li class="nav-item mx-auto">
          <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" href="/login">Login</a>
        </li>
        @endauth
      </ul>
    </div>



  </div>
</nav>
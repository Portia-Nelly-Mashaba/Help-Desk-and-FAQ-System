<div class="container-fluid">
    <!-- First section -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <h1>
          <a href="#" class="navbar-brand">Yowza HelpDesk Forum</a>
        </h1>
        <form action="#" class="form-inline mr-3 mb-2 mb-sm-0">
            <div class="input-group mb-3">
                <input type="text" class="form-control mr-sm-2" placeholder="Search Category" />
                <div class="input-group-append">
                    <button type="submit" class="btn btn-dark">GO</button>
                </div>
            </div>
          </form>

          {{-- @guest
              <a href="" class="nav-item nav-link text-black btn btn-dark" href="{{ route('login')}}">Login</a>
              <a href="" class="nav-item nav-link text-black btn btn-dark" href="{{ route('register')}}">Register</a>
          @endguest
          <a class="nav-item nav-link text-white">
            @auth
                <form id="logout-form" action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Logout</button>
                </form>
            @endauth --}}
          </a>

      </div>
    </nav>

    <!-- first section end -->
  </div>
  <div class="container">
    <nav class="breadcrumb">
      <a href="#" class="breadcrumb-item active"> Dashboard</a>
    </nav>
  </div>

@yield('content')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.names', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />



        <!-- Added Bootstrap link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

<body>
  <!-- container section start -->
  <section id="container" class="">
    {{-- @include('admin.header') --}}
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="{{ route('dashboard.home')}}">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="fa fa-edit"></i>
                          <span>User Forum Menu</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="{{ route('category.create')}}">Create Category</a></li>
              <li><a class="" href="{{ route('forum.create')}}">Create Forum</a></li>

            </ul>
          </li>
         <li>
            <a class="" href="/dashboard/users">
                          <i class="fa fa-users"></i>
                          <span>Users</span>
                      </a>
          </li>
          <li>
            <a class="" href="{{ route('categories')}}">
                          <i class="fa fa-list-alt"></i>
                          <span>Categories</span>
                      </a>
          </li>

          <li>
            <a class="" href="{{ route('forums')}}">
                          <i class="fa fa-users"></i>
                          <span>Forum</span>
                      </a>
          </li>





        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

    <div id="app">
      @yield('content')
    </div>


  </section>




</body>

</html>

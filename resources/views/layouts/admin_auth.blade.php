<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>HelpDesk and FAQ System | Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="#">

        <!-- jquery.vectormap css -->
        <link href="{{ asset('assets/admin/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="{{ asset('assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('assets/admin/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/admin/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets/admin/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/admin/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body data-topbar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">


            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box d-lg-block mt-3">
                            <h3 class="text-white">HelpDesk</h3>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="ri-menu-2-line align-middle"></i>
                        </button>

                        <!-- App Search-->
                        <form class="app-search d-none d-lg-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="ri-search-line"></span>
                            </div>
                        </form>






                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                                  data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ri-notification-3-line"></i>
                                <span class="noti-dot"></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0"> Notifications </h6>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#!" class="small"> View All</a>
                                        </div>
                                    </div>
                                </div>
                                <div data-simplebar style="max-height: 230px;">
                                    <a href="" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <div class="avatar-xs me-3">
                                                <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                    <i class="ri-shopping-cart-line"></i>
                                                </span>
                                            </div>
                                            <div class="flex-1">
                                                <h6 class="mb-1">Your order is placed</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1">If several languages coalesce the grammar</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                <div class="p-2 border-top">
                                    <div class="d-grid">
                                        <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                            <i class="mdi mdi-arrow-right-circle me-1"></i> View More..
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block user-dropdown">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="{{ asset('assets/admin/images/users/avatar-1.jpg')}}"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1">Portia</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="{{route('admin.profile', ['id' => auth()->id()])}}"><i class="ri-user-line align-middle me-1"></i> Profile</a>
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout')}}">
                                    @csrf
                                    <button class="dropdown-item text-danger"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</button>
                                {{-- <a class="dropdown-item text-danger" href="#"></a> --}}
                                </form>
                            </div>

                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                                <i class="ri-settings-2-line"></i>
                            </button>
                        </div>

                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!-- User details -->
                    <div class="user-profile text-center mt-3">
                        <div class="">
                            <img src="{{ asset('assets/admin/images/users/avatar-1.jpg')}}" alt="" class="avatar-md rounded-circle">
                        </div>
                        <div class="mt-3">
                            <h4 class="font-size-16 mb-1">Portia Mashaba</h4>
                            <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
                        </div>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>

                            <li>
                                <a href="{{ route('dashboard.home')}}" class="waves-effect">
                                    <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            <li>
                                <a href="calendar.html" class=" waves-effect">
                                    <i class="fa fa-question-circle"></i>
                                    <span>FAQ Section</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect text-dark">
                                    <i class="fa fa-list-alt"></i>
                                    <span>Category</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('category.create')}}">Add New Category</a></li>
                                    <li><a href="{{ route('categories')}}">Categories</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="fas fa-comments"></i>
                                    <span>Forum</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('forum.create')}}">Add New Forum</a></li>
                                    <li><a href="{{ route('forums')}}">Forum</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="fa-solid fa-user"></i>
                                    <span>User Discussion</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="">New Posts</a></li>
                                    <li><a href="">New Replies</a></li>
                                </ul>
                            </li>


                            <li class="menu-title">Users</li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-account-circle-line"></i>
                                    <span>Registered Users</span>
                                </a>

                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{route('users')}}">Users</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-account-circle-line"></i>
                                    <span>Authentication</span>
                                </a>

                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="auth-login.html">Login</a></li>
                                    <li><a href="auth-register.html">Register</a></li>
                                    <li><a href="auth-recoverpw.html">Recover Password</a></li>
                                    <li><a href="auth-lock-screen.html">Lock Screen</a></li>
                                </ul>
                            </li>



                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
           @yield('content')
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center px-3 py-4">

                    <h5 class="m-0 me-2">Settings</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="{{ asset('assets/admin/images/layouts/layout-1.jpg')}}" class="img-fluid img-thumbnail" alt="layout-1">
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                        <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="{{ asset('assets/admin/images/layouts/layout-2.jpg')}}" class="img-fluid img-thumbnail" alt="layout-2">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css">
                        <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="{{ asset('assets/admin/images/layouts/layout-3.jpg')}}" class="img-fluid img-thumbnail" alt="layout-3">
                    </div>
                    <div class="form-check form-switch mb-5">
                        <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css">
                        <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>


                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets/admin/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

        {{-- <script src="{{ asset('assets/admin/libs/metismenu/metisMenu.min.js')}}"></script> --}}
        <script src="{{ asset('assets/admin/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{ asset('assets/admin/libs/node-waves/waves.min.js')}}"></script>


        <!-- apexcharts -->
        <script src="{{ asset('assets/admin/libs/apexcharts/apexcharts.min.js')}}"></script>

        <!-- jquery.vectormap map -->
        <script src="{{ asset('assets/admin/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script src="{{ asset('assets/admin/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js')}}"></script>

        <!-- Required datatable js -->
        <script src="{{ asset('assets/admin/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('assets/admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Responsive examples -->
        <script src="{{ asset('assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{ asset('assets/admin/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

        <script src="{{ asset('assets/admin/js/pages/dashboard.init.js')}}"></script>

        <!-- App js -->
        <script src="{{ asset('assets/admin/js/app.js')}}"></script>

        {{-- tab pane js --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    </body>

</html>


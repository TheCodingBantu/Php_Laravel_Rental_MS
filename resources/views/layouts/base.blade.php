<!doctype html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <title>Rentx manager</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <link href="{{asset('assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css">


        <link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">

        <!-- Responsive datatable examples -->
        <link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">

        <!-- C3 Chart css -->
        <link href="{{asset('assets/libs/c3/c3.min.css')}}" rel="stylesheet" type="text/css">

        <!-- Bootstrap Css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/font.css')}}" rel="stylesheet" type="text/css">



    </head>

    <body data-sidebar="dark">


        <!-- Loader -->
            <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box ">

                            <a href="index.html" class="logo " style='border:1px solid #263238'>

                                <span class="logo-lg">
                                    <img src="{{asset('assets/images/logo.png')}}" alt="" height="50">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="mdi mdi-menu"></i>
                        </button>

                        <div class="d-none d-sm-block ms-2">
                            <h4 class="page-title">@isset($title)
                                {{$title}}
                            @endisset</h4>
                        </div>
                    </div>

                    <!-- Search input -->
                    <div class="search-wrap" id="search-wrap">
                        <div class="search-bar">
                            <input class="search-input form-control" placeholder="Search">
                            <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                                <i class="mdi mdi-close-circle"></i>
                            </a>
                        </div>
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-none d-lg-inline-block me-2">
                            <button type="button" class="btn header-item toggle-search noti-icon waves-effect" data-target="#search-wrap">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                        </div>

                        <div class="dropdown d-none d-lg-inline-block me-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                                <i class="mdi mdi-fullscreen"></i>
                            </button>
                        </div>



                        <div class="dropdown d-inline-block me-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ion ion-md-notifications"></i>
                                <span class="badge bg-danger rounded-pill">3</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h5 class="m-0 font-size-16"> Notification (3) </h5>
                                        </div>
                                    </div>
                                </div>
                                <div data-simplebar style="max-height: 230px;">
                                    <a href="" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <div class="avatar-xs me-3">
                                                <span class="avatar-title bg-success rounded-circle font-size-16">
                                                    <i class="mdi mdi-cart-outline"></i>
                                                </span>
                                            </div>
                                            <div class="flex-1">
                                                <h6 class="mt-0 font-size-15 mb-1">Your order is placed</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1">Dummy text of the printing and typesetting industry.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <div class="avatar-xs me-3">
                                                <span class="avatar-title bg-warning rounded-circle font-size-16">
                                                    <i class="mdi mdi-message-text-outline"></i>
                                                </span>
                                            </div>
                                            <div class="flex-1">
                                                <h6 class="mt-0 font-size-15 mb-1">New Message received</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1">You have 87 unread messages</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <div class="avatar-xs me-3">
                                                <span class="avatar-title bg-info rounded-circle font-size-16">
                                                    <i class="mdi mdi-glass-cocktail"></i>
                                                </span>
                                            </div>
                                            <div class="flex-1">
                                                <h6 class="mt-0 font-size-15 mb-1">Your item is shipped</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1">It is a long established fact that a reader will</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                                <div class="p-2 border-top">
                                    <div class="d-grid">
                                        <a class="btn btn-sm btn-link font-size-14  text-center" href="javascript:void(0)">
                                            View all
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="{{asset('assets/images/users/avatar-1.jpg')}}" alt="Header Avatar">
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">My Wallet</a>
                                <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end">11</span>Settings</a>
                                <a class="dropdown-item" href="#">Lock screen</a>
                                <div class="dropdown-divider"></div>

                                <form method="POST" action="{{ route('logout') }}"> @csrf

                                    <a class="dropdown-item text-danger" href="{{route('logout')}}"onclick="event.preventDefault();this.closest('form').submit();"> Logout</a>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Main</li>



                            <li>
                                <a href="widgets.html" class="waves-effect">
                                    <i class="mdi mdi-cube-outline"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="mdi mdi-email-outline"></i>
                                    <span>Users </span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{route('users')}}">Users List</a></li>
                                    <li><a href="{{route('addUser')}}">Add User</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="mdi mdi-buffer"></i>
                                    <span>Property </span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{route('property.show')}}">Property List</a></li>
                                    <li><a href="{{route('property.create')}}">Add Property</a></li>
                                    <li><a href="{{route('unit.show')}}">Units List</a></li>
                                    <li><a href="{{route('unit.create')}}">Add Unit</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="mdi mdi-cart-outline"></i>
                                    <span>Locations </span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{route('locations.show')}}">Locations List</a></li>
                                    <li><a href="{{route('locations.add')}}">Add location</a></li>


                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="mdi mdi-clipboard-outline"></i>
                                    <span>Tenants</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{route('tenant.show')}}">Tenant List</a></li>
                                    <li><a href="{{route('tenant.create')}}">Add Tenant</a></li>

                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="mdi mdi-chart-line"></i>
                                    <span>Invoices</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{route('invoice.show')}}">Invoice List</a></li>
                                    <li><a href="{{route('invoice.create')}}">Create Invoice</a></li>

                                </ul>
                            </li>


                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="mdi mdi-album"></i>
                                    <span>Payments</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{route('payment.show')}}">Payment List</a></li>
                                    <li><a href="{{route('payment.create')}}">Pay Now</a></li>
                                    <li><a href="{{route('processor.show')}}">Payment Methods</a></li>

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
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        @yield('content')

</body>
@if (session('error'))
<script>
    toastr.error("{{ session('error')}}");
</script>
@endisset
@if (session('success'))
<script>
    toastr.success("{{ session('success') }}");
</script>
@endisset

</html>

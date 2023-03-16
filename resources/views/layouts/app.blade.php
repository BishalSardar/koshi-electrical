<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Koshi</title>

    <meta name="description"
        content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Dashmix">
    <meta property="og:description"
        content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">


    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('admin/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/js/plugins/select2/css/select2.min.css') }}">


    <!-- Dashmix framework -->
    <link rel="stylesheet" id="css-main" href="{{ asset('admin/css/dashmix.min.css') }}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css"> -->
    <!-- END Stylesheets -->
</head>

<body>
    <div id="page-container"
        class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
        <!-- Sidebar -->
        <nav id="sidebar" aria-label="Main Navigation">
            <!-- Side Header -->
            <div class="bg-header-dark">
                <div class="content-header bg-white-5">
                    <!-- Logo -->
                    <a class="fw-semibold text-white tracking-wide" href="">
                        <span class="smini-visible">
                            D<span class="opacity-75">x</span>
                        </span>
                        <span class="smini-hidden">
                            Koshi<span class="opacity-75"> Electirical Shop</span>
                        </span>
                    </a>
                    <!-- END Logo -->
                </div>
            </div>
            <!-- END Side Header -->

            <!-- Sidebar Scrolling -->
            <div class="js-sidebar-scroll">
                <!-- Side Navigation -->
                <div class="content-side">
                    <ul class="nav-main">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->segment(1) == 'home' ? 'active' : '' }}"
                                href="{{ route('home') }}">
                                <i class="nav-main-link-icon fa fa-home"></i>
                                <span class="nav-main-link-name">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->segment(1) == 'regular-bill' ? 'active' : '' }}"
                                href="{{ route('regularBill.index') }}">
                                <i class="nav-main-link-icon fa fa-file-invoice"></i>
                                <span class="nav-main-link-name">Regular Bill</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link  {{ request()->segment(1) == 'contract' ? 'active' : '' }}"
                                href="{{ route('contract.index') }}">
                                <i class="nav-main-link-icon fa fa-file-contract"></i>
                                <span class="nav-main-link-name">Contracts</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link  {{ request()->segment(1) == 'customer-bill' ? 'active' : '' }}"
                                href="{{ route('customerBill.index') }}">
                                <i class="nav-main-link-icon fa fa-address-book"></i>
                                <span class="nav-main-link-name">Customer Bill</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link  {{ request()->segment(1) == 'customer' ? 'active' : '' }}"
                                href="{{ route('customer.index') }}">
                                <i class="nav-main-link-icon fa fa-user"></i>
                                <span class="nav-main-link-name">Customer</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link  {{ request()->segment(1) == 'stock' ? 'active' : '' }}"
                                href="{{ route('stock.index') }}">
                                <i class="nav-main-link-icon fa fa-cubes"></i>
                                <span class="nav-main-link-name">Stock</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link  {{ request()->segment(1) == 'category' ? 'active' : '' }}"
                                href="{{ route('category.index') }}">
                                <i class="nav-main-link-icon fa fa-cube"></i>
                                <span class="nav-main-link-name">Category</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link  {{ request()->segment(1) == 'product' ? 'active' : '' }}"
                                href="{{ route('product.index') }}">
                                <i class="nav-main-link-icon fa fa-cube"></i>
                                <span class="nav-main-link-name">Product</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link  {{ request()->segment(1) == 'warranty_guarantee' ? 'active' : '' }}"
                                href="{{ route('warranty.guarantee.index') }}">
                                <i class="nav-main-link-icon fa fa-cube"></i>
                                <span class="nav-main-link-name">Warranty/Guarantee</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link  {{ request()->segment(1) == 'supplier-bill' ? 'active' : '' }}"
                                href="{{ route('supplier-bill.index') }}">
                                <i class="nav-main-link-icon fa fa-file-invoice"></i>
                                <span class="nav-main-link-name">Supplier Bill</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link  {{ request()->segment(1) == 'supplier' ? 'active' : '' }}"
                                href="{{ route('supplier.index') }}">
                                <i class="nav-main-link-icon fa fa-industry"></i>
                                <span class="nav-main-link-name">Supplier</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- END Side Navigation -->
            </div>
            <!-- END Sidebar Scrolling -->
        </nav>
        <!-- END Sidebar -->

        <!-- Header -->
        <header id="page-header">
            <!-- Header Content -->
            <div class="content-header">
                <!-- Left Section -->
                <div class="space-x-1">
                    <!-- Toggle Sidebar -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                    <button type="button" class="btn btn-alt-secondary" data-toggle="layout"
                        data-action="sidebar_toggle">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                    <!-- END Toggle Sidebar -->

                    <!-- Open Search Section -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-alt-secondary" data-toggle="layout"
                        data-action="header_search_on">
                        <i class="fa fa-fw opacity-50 fa-search"></i> <span
                            class="ms-1 d-none d-sm-inline-block">Search</span>
                    </button>
                    <!-- END Open Search Section -->
                </div>
                <!-- END Left Section -->

                <!-- Right Section -->
                <div class="space-x-1">
                    <!-- User Dropdown -->
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn btn-alt-secondary" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-fw fa-user d-sm-none"></i>
                            <span class="d-none d-sm-inline-block">{{ Auth::user()->name }}</span>
                            <i class="fa fa-fw fa-angle-down opacity-50 ms-1 d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end p-0" aria-labelledby="page-header-user-dropdown">
                            <div class="bg-primary-dark rounded-top fw-semibold text-white text-center p-3">
                                User Options
                            </div>
                            <div class="p-2">
                                <a class="dropdown-item" href="{{ route('admin.profile') }}">
                                    <i class="far fa-fw fa-user me-1"></i> Profile
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.profile.edit') }}">
                                    <i class="far fa-fw fa-pen-to-square me-1"></i> Edit Profile
                                </a>
                                {{-- <div role="separator" class="dropdown-divider"></div> --}}

                                <a class="dropdown-item" href="{{ route('admin.password.edit') }}">
                                    <i class="far fa-fw fa-pen-to-square me-1"></i> changePassword
                                </a>

                                <div role="separator" class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="far fa-fw fa-arrow-alt-circle-left me-1"></i> Sign Out
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- END User Dropdown -->

                    <!-- Notifications Dropdown -->
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn btn-alt-secondary" id="page-header-notifications-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-fw fa-bell"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-notifications-dropdown">
                            <div class="bg-primary-dark rounded-top fw-semibold text-white text-center p-3">
                                Notifications
                            </div>
                            <ul class="nav-items my-2">
                                <li>
                                    <a class="d-flex text-dark py-2" href="javascript:void(0)">
                                        <div class="flex-shrink-0 mx-3">
                                            <i class="fa fa-fw fa-check-circle text-success"></i>
                                        </div>
                                        <div class="flex-grow-1 fs-sm pe-2">
                                            <div class="fw-semibold">App was updated to v5.6!</div>
                                            <div class="text-muted">3 min ago</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="d-flex text-dark py-2" href="javascript:void(0)">
                                        <div class="flex-shrink-0 mx-3">
                                            <i class="fa fa-fw fa-user-plus text-info"></i>
                                        </div>
                                        <div class="flex-grow-1 fs-sm pe-2">
                                            <div class="fw-semibold">New Subscriber was added! You now have 2580!
                                            </div>
                                            <div class="text-muted">10 min ago</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="d-flex text-dark py-2" href="javascript:void(0)">
                                        <div class="flex-shrink-0 mx-3">
                                            <i class="fa fa-fw fa-times-circle text-danger"></i>
                                        </div>
                                        <div class="flex-grow-1 fs-sm pe-2">
                                            <div class="fw-semibold">Server backup failed to complete!</div>
                                            <div class="text-muted">30 min ago</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="d-flex text-dark py-2" href="javascript:void(0)">
                                        <div class="flex-shrink-0 mx-3">
                                            <i class="fa fa-fw fa-exclamation-circle text-warning"></i>
                                        </div>
                                        <div class="flex-grow-1 fs-sm pe-2">
                                            <div class="fw-semibold">You are running out of space. Please consider
                                                upgrading your plan.</div>
                                            <div class="text-muted">1 hour ago</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="d-flex text-dark py-2" href="javascript:void(0)">
                                        <div class="flex-shrink-0 mx-3">
                                            <i class="fa fa-fw fa-plus-circle text-primary"></i>
                                        </div>
                                        <div class="flex-grow-1 fs-sm pe-2">
                                            <div class="fw-semibold">New Sale! + $30</div>
                                            <div class="text-muted">2 hours ago</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="p-2 border-top">
                                <a class="btn btn-alt-primary w-100 text-center" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-eye opacity-50 me-1"></i> View All
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- END Notifications Dropdown -->
                </div>
                <!-- END Right Section -->
            </div>
            <!-- END Header Content -->

            <!-- Header Search -->
            <div id="page-header-search" class="overlay-header bg-header-dark">
                <div class="bg-white-10">
                    <div class="content-header">
                        <form class="w-100" action="be_pages_generic_search.html" method="POST">
                            <div class="input-group">
                                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                <button type="button" class="btn btn-alt-primary" data-toggle="layout"
                                    data-action="header_search_off">
                                    <i class="fa fa-fw fa-times-circle"></i>
                                </button>
                                <input type="text" class="form-control border-0" placeholder="Search or hit ESC.."
                                    id="page-header-search-input" name="page-header-search-input">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END Header Search -->

            <!-- Header Loader -->
            <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
            <div id="page-header-loader" class="overlay-header bg-header-dark">
                <div class="bg-white-10">
                    <div class="content-header">
                        <div class="w-100 text-center">
                            <i class="fa fa-fw fa-sun fa-spin text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Header Loader -->
        </header>
        <!-- END Header -->

        <!-- Main Container -->
        <main id="main-container">
            @yield('content')
        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <!--
      Dashmix JS
    
      Core libraries and functionality
      webpack is putting everything together at assets/_js/main/app.js
    --
    
    
    <!-- jQuery (required for DataTables plugin) -->
    <script src="{{ asset('admin/js/lib/jquery.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('admin/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/js/dashmix.app.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('admin/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('admin/js/app.js') }}"></script>
</body>

</html>

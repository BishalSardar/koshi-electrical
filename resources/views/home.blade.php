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

    <!-- Dashmix framework -->
    <link rel="stylesheet" id="css-main" href="{{ asset('admin/css/dashmix.min.css') }}">

    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('admin/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/js/plugins/select2/css/select2.min.css') }}">


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
                            <a class="nav-main-link  {{ request()->segment(1) == 'warranty_guarantee_claim' ? 'active' : '' }}"
                                href="{{ route('warranty.guarantee.claim.index') }}">
                                <i class="nav-main-link-icon fa fa-cube"></i>
                                <span class="nav-main-link-name">Warranty/Guarantee Claim</span>
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
                </div>
                <!-- END Right Section -->
            </div>
            <!-- END Header Content -->

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
            <!-- Hero -->
            <div class="content">
                <div
                    class="d-md-flex justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-start">
                    <div
                        class="d-md-flex gap-4 justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-start">
                        <h1 class="h3 mb-1">
                            Dashboard
                        </h1>
                        <p class="fw-medium mb-0 text-muted">
                            Welcome, admin! You have <a class="fw-medium" href="javascript:void(0)">8 new
                                notifications</a>.
                        </p>
                    </div>
                </div>
            </div>
            <!-- END Hero -->

            <!-- Page Content -->
            <div class="content">
                <!-- Overview -->
                <div class="row items-push">
                    <div class="col-sm-6 col-xl-3">
                        <div class="block block-rounded text-center d-flex flex-column h-100 mb-0">
                            <div class="block-content block-content-full flex-grow-1">
                                <div class="item rounded-3 bg-body mx-auto my-3">
                                    <i class="fa fa-users fa-lg text-primary"></i>
                                </div>
                                <div class="fs-1 fw-bold">{{ $customerCount }}</div>
                                <div class="text-muted mb-3">Customers</div>
                            </div>
                            <div class="block-content block-content-full block-content-sm bg-body-light fs-sm">
                                <a class="fw-medium" href="{{ route('customer.index') }}">
                                    View all customer
                                    <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="block block-rounded text-center d-flex flex-column h-100 mb-0">
                            <div class="block-content block-content-full flex-grow-1">
                                <div class="item rounded-3 bg-body mx-auto my-3">
                                    <i class="fa fa-chart-line fa-lg text-primary"></i>
                                </div>
                                <div class="fs-1 fw-bold">Rs. {{ $regularSales }}</div>
                                <div class="text-muted mb-3">Regular Sales</div>
                            </div>
                            <div class="block-content block-content-full block-content-sm bg-body-light fs-sm">
                                <a class="fw-medium" href="{{ route('regularBill.index') }}">
                                    View all sales
                                    <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="block block-rounded text-center d-flex flex-column h-100 mb-0">
                            <div class="block-content block-content-full flex-grow-1">
                                <div class="item rounded-3 bg-body mx-auto my-3">
                                    <i class="fa fa-chart-line fa-lg text-primary"></i>
                                </div>
                                <div class="fs-1 fw-bold">Rs. {{ $customerSales }}</div>
                                <div class="text-muted mb-3">Customer Sales</div>
                            </div>
                            <div class="block-content block-content-full block-content-sm bg-body-light fs-sm">
                                <a class="fw-medium" href="{{ route('customerBill.index') }}">
                                    View all sales
                                    <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="block block-rounded text-center d-flex flex-column h-100 mb-0">
                            <div class="block-content block-content-full">
                                <div class="item rounded-3 bg-body mx-auto my-3">
                                    <i class="fa fa-wallet fa-lg text-primary"></i>
                                </div>
                                <div class="fs-1 fw-bold">Rs. {{ $totalEarnings }}</div>
                                <div class="text-muted mb-3">Total Earnings</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Overview -->

                <!-- Store Growth -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            Store Growth
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option">
                                <i class="si si-wrench"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="row">
                            <div class="col-xl-12 d-md-flex align-items-md-center">
                                <div class="p-md-2 p-lg-3 w-100">
                                    <!-- Bars Chart Container -->
                                    <!-- Chart.js Chart is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _js/pages/be_pages_dashboard.js -->
                                    <!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
                                    <canvas id="js-chartjs-analytics-bars"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Store Growth -->

                <!-- Latest Orders + Stats -->
                <div class="row">
                    <div class="col-md-8">
                        <!--  Latest Orders -->
                        <div class="block block-rounded block-mode-loading-refresh">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">
                                    Latest Orders
                                </h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-toggle="block-option"
                                        data-action="state_toggle" data-action-mode="demo">
                                        <i class="si si-refresh"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content">
                                <table class="table table-striped table-hover table-borderless table-vcenter fs-sm">
                                    <thead>
                                        <tr>
                                            <th>Bill ID</th>
                                            <th>Bill Date</th>
                                            <th>Status</th>
                                            <th>Net Total Amount</th>
                                            <th style="width: 15%;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customer_bills as $customer_bill)
                                            <tr>
                                                <td class="fw-semibold">
                                                    <strong>{{ $customer_bill->id }}</strong>
                                                </td>
                                                <td>
                                                    <span>{{ $customer_bill->invoice_date }}</span>
                                                </td>
                                                <td>
                                                    @if ($customer_bill->status == 0)
                                                        <span class="badge bg-danger">Unpaid</span>
                                                    @else
                                                        <span class="badge bg-success">Paid</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span>Rs. {{ $customer_bill->net_total_amount }}</span>
                                                </td>
                                                <td class="text-center fs-sm">
                                                    <a class="btn btn-sm btn-primary"
                                                        href="{{ route('customerBill.profile', $customer_bill->id) }}">
                                                        <i class="fa fa-fw fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div
                                class="block-content block-content-full block-content-sm bg-body-light fs-sm text-center">
                                <a class="fw-medium" href="{{ route('customerBill.index') }}">
                                    View all bills
                                    <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                                </a>
                            </div>
                        </div>
                        <!-- END Latest Orders -->
                    </div>
                    <div class="col-md-4 d-flex flex-column">
                        <!-- Stats -->
                        <div class="block block-rounded">
                            <div
                                class="block-content block-content-full d-flex justify-content-between align-items-center flex-grow-1">
                                <div class="me-3">
                                    <p class="fs-3 fw-bold mb-0">
                                        {{ $completedContracts }}
                                    </p>
                                    <p class="text-muted mb-0">
                                        Completed Contracts
                                    </p>
                                </div>
                                <div class="item rounded-circle bg-body">
                                    <i class="fa fa-check fa-lg text-primary"></i>
                                </div>
                            </div>
                            <div
                                class="block-content block-content-full block-content-sm bg-body-light fs-sm text-center">
                                <a class="fw-medium" href="{{ route('contract.index') }}">
                                    View Contracts
                                    <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                                </a>
                            </div>
                        </div>
                        <div class="block block-rounded text-center d-flex flex-column flex-grow-1">
                            <div class="block-content block-content-full d-flex align-items-center flex-grow-1">
                                <div class="w-100">
                                    <div class="item rounded-3 bg-body mx-auto my-3">
                                        <i class="fa fa-archive fa-lg text-primary"></i>
                                    </div>
                                    <div class="fs-1 fw-bold">{{ $available_product_count }}</div>
                                    <div class="text-muted mb-3">Products in Stocks</div>
                                </div>
                            </div>
                            <div class="block-content block-content-full block-content-sm bg-body-light fs-sm">
                                <a class="fw-medium" href="{{ route('stock.index') }}">
                                    Product Stocks
                                    <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                                </a>
                            </div>
                        </div>
                        <!-- END Stats -->
                    </div>
                </div>
                <!-- END Latest Orders + Stats -->
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <!--
      Dashmix JS
    
      Core libraries and functionality
      webpack is putting everything together at assets/_js/main/app.js
    --
    
    

   
    <!-- Page JS Code -->

    <script src="{{ asset('admin/js/dashmix.app.min.js') }}"></script>
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

    <!-- Page JS Code -->
    <script src="{{ asset('admin/js/app.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('admin/js/plugins/chart.js/Chart.min.js') }}"></script>

    <!-- Page JS Code -->
    {{-- <script src="{{ asset('admin/js/pages/be_pages_dashboard.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin/js/pages/be_comp_charts.min.js') }}"></script> --}}


    <script>
        Dashmix.onLoad(() =>
            class {
                static initChartsBars() {
                    (Chart.defaults.color = "#818d96"),
                    (Chart.defaults.scale.grid.color = "transparent"),
                    (Chart.defaults.scale.grid.zeroLineColor = "transparent"),
                    (Chart.defaults.scale.beginAtZero = !0),
                    (Chart.defaults.elements.line.borderWidth = 1),
                    (Chart.defaults.plugins.legend.labels.boxWidth = 12);
                    let r,
                        a,
                        o = document.getElementById("js-chartjs-analytics-bars");
                    (a = {
                        labels: ["MON", "TUE", "WED", "THU", "FRI", "SAT", "SUN"],
                        datasets: [{
                                label: "This Week",
                                fill: !0,
                                backgroundColor: "rgba(6, 101, 208, .6)",
                                borderColor: "transparent",
                                pointBackgroundColor: "rgba(6, 101, 208, 1)",
                                pointBorderColor: "#fff",
                                pointHoverBackgroundColor: "#fff",
                                pointHoverBorderColor: "rgba(6, 101, 208, 1)",
                                data: <?php echo json_encode($customer_sales_by_day); ?>,
                            },
                            {
                                label: "Last Week",
                                fill: !0,
                                backgroundColor: "rgba(6, 101, 208, .2)",
                                borderColor: "transparent",
                                pointBackgroundColor: "rgba(6, 101, 208, .2)",
                                pointBorderColor: "#fff",
                                pointHoverBackgroundColor: "#fff",
                                pointHoverBorderColor: "rgba(6, 101, 208, .2)",
                                data: <?php echo json_encode($regular_sales_by_day); ?>,
                            },
                        ],
                    }),
                    null !== o &&
                        (r = new Chart(o, {
                            type: "bar",
                            data: a,
                            options: {
                                plugins: {
                                    tooltip: {
                                        callbacks: {
                                            label: function(r) {
                                                return (
                                                    r.dataset.label +
                                                    ": " +
                                                    r.parsed.y +
                                                    " Rs. sales"
                                                );
                                            },
                                        },
                                    },
                                },
                            },
                        }));
                }
                static init() {
                    this.initChartsBars();
                }
            }.init()
        );
    </script>

</body>

</html>

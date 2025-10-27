<!DOCTYPE html>
<html lang="en">

<head>
    <script type="text/javascript" src="https://js.stripe.com/v3/"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard | W4UHOMES</title>
    <link rel="icon" href="{{ asset('account/cloud/uploads/favicon.png') }}" type="image/png" />

    <!-- Fonts and icons -->
    <script src="{{ asset('user/account/dash/js/plugin/webfont/webfont.min.js') }}"></script>
    <!-- Sweet Alert -->
    <script src="{{ asset('user/account/dash/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('user/account/dash/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/account/dash/css/fonts.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/account/dash/css/atlantis.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/account/dash/css/customs.css') }}">
    <link rel="stylesheet" href="{{ asset('user/account/dash/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/dt-1.10.21/af-2.3.5/b-1.6.3/b-flash-1.6.3/b-html5-1.6.3/b-print-1.6.3/r-2.2.5/datatables.min.css" />

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <!-- W3CSS -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- Bootstrap Notify -->
    <script src="{{ asset('user/account/dash/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js" defer></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.1/dist/chart.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('user/font-awesome/css/font-awesome.min.css') }}">

    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <style>
        [wire\:loading],
        [wire\:loading\.delay],
        [wire\:loading\.inline-block],
        [wire\:loading\.inline],
        [wire\:loading\.block],
        [wire\:loading\.flex],
        [wire\:loading\.table],
        [wire\:loading\.grid] {
            display: none;
        }

        [wire\:offline] {
            display: none;
        }

        [wire\:dirty]:not(textarea):not(input):not(select) {
            display: none;
        }

        input:-webkit-autofill,
        select:-webkit-autofill,
        textarea:-webkit-autofill {
            animation-duration: 50000s;
            animation-name: livewireautofill;
        }

        @keyframes livewireautofill {
            from {}
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            color: white;
            text-align: center;
        }

        .square-btn {
            padding: 15px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .square-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-label {
            font-size: 14px;
            font-weight: 500;
        }
    </style>

    <script>
        // Add your client ID and secret
        var PAYPAL_CLIENT = 'iidjdjdj';
        var PAYPAL_SECRET = 'jijdjkdkdk';
        
        // Point your server to the PayPal API
        var PAYPAL_ORDER_API = 'https://api.paypal.com/v2/checkout/orders/';
    </script>
    <script src="https://www.paypal.com/sdk/js?client-id=iidjdjdj"></script>
</head>

<body data-background-color="light">
    <div id="app">
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            // Tawk.to code here
        </script>
        <!--End of Tawk.to Script-->

        <div class="wrapper">
            <div class="main-header">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="blue">
                    <a href="{{ route('admin.dashboard') }}" class="logo" style="font-size: 19px; color:#fff;">
                        THESPACE
                    </a>
                    <button class="ml-auto navbar-toggler sidenav-toggler" type="button" data-toggle="collapse"
                        data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <i class="fa fa-bars"></i>
                        </span>
                    </button>
                    <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                </div>
                <!-- End Logo Header -->

                <!-- Navbar Header -->
                <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue">
                    <div class="container-fluid">
                        <div class="collapse" id="search-nav">
                            <form class="navbar-left navbar-form nav-search mr-md-3">
                                <div class="input-group">
                                    <input type="text" placeholder="Search ..." class="form-control">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-search">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                            <li class="nav-item dropdown hidden-caret">
                                <div id="google_translate_element"></div>
                            </li>
                            <li class="nav-item dropdown hidden-caret">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"
                                    aria-expanded="false">
                                    <i class="text-white fas fa-user-circle fa-lg"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                    <div class="dropdown-user-scroll scrollbar-outer">
                                        <li>
                                            <div class="user-box">
                                                <div class="avatar-lg">
                                                    <i class="fas fa-user text-primary"></i>
                                                </div>
                                                <div class="u-text">
                                                    <h4>Admin User</h4>
                                                    <p class="text-muted">admin@example.com</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-cog"></i> Account Settings
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-key"></i> Change Password
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="fas fa-sign-out-alt"></i> Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>

            <!-- Sidebar -->
            <div class="sidebar sidebar-style-2" data-background-color="white">
                <div class="sidebar-wrapper scrollbar scrollbar-inner">
                    <div class="sidebar-content">
                        <div class="user">
                            <div class="info">
                                <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                    <span>
                                        Admin User
                                        <span class="user-level">Administrator</span>
                                        <span class="caret"></span>
                                    </span>
                                </a>
                                <div class="clearfix"></div>
                                <div class="collapse in" id="collapseExample">
                                    <ul class="nav">
                                        <li>
                                            <a href="#profile">
                                                <span class="link-collapse">My Profile</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#edit">
                                                <span class="link-collapse">Edit Profile</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#settings">
                                                <span class="link-collapse">Settings</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <ul class="nav nav-primary">
                            <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                <a href="{{ route('admin.dashboard') }}">
                                    <i class="fas fa-tachometer-alt"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>

                            <li class="nav-section">
                                <span class="sidebar-mini-icon">
                                    <i class="fa fa-ellipsis-h"></i>
                                </span>
                                <h4 class="text-section">Management</h4>
                            </li>

                            <li class="nav-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                                <a href="{{ route('admin.users.index') }}">
                                    <i class="fas fa-users"></i>
                                    <p>Manage Users</p>
                                </a>
                            </li>

                            <li class="nav-item {{ request()->routeIs('admin.transactions.*') ? 'active' : '' }}">
                                <a href="{{ route('admin.transactions.index') }}">
                                    <i class="fas fa-exchange-alt"></i>
                                    <p>Manage Transactions</p>
                                </a>
                            </li>

                            <li class="nav-item {{ request()->routeIs('admin.investments.*') ? 'active' : '' }}">
                                <a href="{{ route('admin.investments.index') }}">
                                    <i class="fas fa-chart-line"></i>
                                    <p>Manage Investments</p>
                                </a>
                            </li>

                            <li class="nav-section">
                                <span class="sidebar-mini-icon">
                                    <i class="fa fa-ellipsis-h"></i>
                                </span>
                                <h4 class="text-section">Settings</h4>
                            </li>

                            <li class="nav-item">
                                <a href="#">
                                    <i class="fas fa-cog"></i>
                                    <p>System Settings</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#">
                                    <i class="fas fa-sliders-h"></i>
                                    <p>Preferences</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Sidebar -->
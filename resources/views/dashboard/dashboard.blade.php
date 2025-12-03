<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheSpace - Investor Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        :root {
            --primary-blue: #061b2e;
            --accent-blue: #0052a3;
            --dark-blue: #051524;
            --light-blue: #0a2d4d;
            --text-color: #e8f1f8;
            --light-gray: #0c1f33;
            --border-color: #1a3a5f;
            --success-green: #00c853;
            --warning-orange: #ff9800;
            --danger-red: #f44336;
            --change-password-color: #ff9800;
            /* Orange for visibility */
            --logout-color: #f44336;
            /* Red for visibility */
        }

        body {
            background-color: var(--dark-blue);
            color: var(--text-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            padding-top: 70px;
            /* Space for fixed navbar */
        }

        /* Compact Navbar Styles */
        .custom-navbar {
            background-color: var(--primary-blue) !important;
            border-bottom: 1px solid var(--border-color);
            padding: 0.5rem 1rem;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
            min-height: 70px;
        }

        .custom-navbar .navbar-brand {
            color: white !important;
            font-weight: 700;
            font-size: 1.4rem;
            padding: 0.3rem 0;
        }

        .brand-text {
            background: linear-gradient(45deg, #fff, var(--accent-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .custom-navbar .nav-link {
            color: #a8c6e5 !important;
            padding: 0.6rem 0.8rem;
            border-radius: 6px;
            margin: 0 0.1rem;
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 0.9rem;
            white-space: nowrap;
        }

        .custom-navbar .nav-link:hover,
        .custom-navbar .nav-link.active {
            background-color: var(--light-blue);
            color: white !important;
        }

        .custom-navbar .nav-link i {
            width: 18px;
            text-align: center;
            font-size: 0.9rem;
            margin-right: 0.4rem;
        }

        /* User Info in Navbar */
        .user-info-nav {
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .user-avatar-nav {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: linear-gradient(45deg, var(--accent-blue), var(--light-blue));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 0.85rem;
            border: 2px solid rgba(255, 255, 255, 0.2);
        }

        .user-details-nav {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-weight: 600;
            font-size: 0.9rem;
            color: white;
        }

        .user-tier {
            font-size: 0.75rem;
            color: #a8c6e5;
        }

        /* Dropdown Menu */
        .dropdown-menu {
            background-color: var(--primary-blue);
            border: 1px solid var(--border-color);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            min-width: 220px;
        }

        .dropdown-item {
            color: #a8c6e5;
            padding: 0.7rem 1rem;
            transition: all 0.2s;
            display: flex;
            align-items: center;
        }

        .dropdown-item:hover {
            background-color: var(--light-blue);
            color: white;
        }

        /* HIGHLIGHTED OPTIONS - Very Visible */
        .dropdown-item.change-password {
            background: linear-gradient(45deg, rgba(255, 152, 0, 0.1), rgba(255, 152, 0, 0.2));
            border-left: 3px solid var(--change-password-color);
            color: #ffcc80 !important;
            font-weight: 600;
        }

        .dropdown-item.change-password i {
            color: var(--change-password-color) !important;
        }

        .dropdown-item.change-password:hover {
            background: linear-gradient(45deg, rgba(255, 152, 0, 0.2), rgba(255, 152, 0, 0.3));
            color: white !important;
        }

        .dropdown-item.logout {
            background: linear-gradient(45deg, rgba(244, 67, 54, 0.1), rgba(244, 67, 54, 0.2));
            border-left: 3px solid var(--logout-color);
            color: #ff8a80 !important;
            font-weight: 600;
        }

        .dropdown-item.logout i {
            color: var(--logout-color) !important;
        }

        .dropdown-item.logout:hover {
            background: linear-gradient(45deg, rgba(244, 67, 54, 0.2), rgba(244, 67, 54, 0.3));
            color: white !important;
        }

        .dropdown-divider {
            border-color: var(--border-color);
            opacity: 0.5;
        }

        /* Mobile Responsive */
        @media (max-width: 991.98px) {
            .custom-navbar .navbar-collapse {
                background-color: var(--primary-blue);
                padding: 1rem;
                border-radius: 0 0 8px 8px;
                border: 1px solid var(--border-color);
                border-top: none;
                margin-top: 0.5rem;
            }

            .custom-navbar .nav-link {
                margin: 0.2rem 0;
                padding: 0.7rem;
            }

            .user-info-nav {
                justify-content: center;
                text-align: center;
                padding: 0.5rem 0;
            }
        }

        @media (max-width: 768px) {
            body {
                padding-top: 65px;
            }

            .custom-navbar {
                padding: 0.4rem 0.8rem;
                min-height: 65px;
            }

            .custom-navbar .navbar-brand {
                font-size: 1.3rem;
            }

            .user-details-nav {
                display: none;
            }
        }

        /* Navbar Toggle */
        .navbar-toggler {
            border: 1px solid var(--border-color);
            padding: 0.3rem 0.5rem;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 2px var(--accent-blue);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* Welcome Notification */
        .welcome-notification {
            position: fixed;
            top: 80px;
            right: 20px;
            background-color: var(--primary-blue);
            border: 1px solid var(--accent-blue);
            border-radius: 8px;
            padding: 20px;
            max-width: 350px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            z-index: 1050;
            transform: translateX(400px);
            transition: transform 0.4s ease-in-out;
            opacity: 0;
        }

        .welcome-notification.show {
            transform: translateX(0);
            opacity: 1;
        }

        .notification-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .notification-title {
            font-weight: 600;
            font-size: 1.1rem;
            color: var(--text-color);
            margin: 0;
        }

        .notification-close {
            background: none;
            border: none;
            color: var(--text-color);
            font-size: 1.2rem;
            cursor: pointer;
            opacity: 0.7;
            transition: opacity 0.2s;
        }

        .notification-close:hover {
            opacity: 1;
        }

        .notification-content {
            font-size: 0.95rem;
            color: #a8c6e5;
            margin-bottom: 15px;
        }

        .notification-actions {
            display: flex;
            gap: 10px;
        }

        .notification-btn {
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            border: none;
        }

        .notification-btn-primary {
            background-color: var(--accent-blue);
            color: white;
        }

        .notification-btn-secondary {
            background-color: transparent;
            color: var(--text-color);
            border: 1px solid var(--border-color);
        }

        .notification-btn:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        /* Deposit Guidelines Section */
        .deposit-guidelines {
            margin-bottom: 30px;
        }

        .guidelines-card {
            background-color: var(--primary-blue);
            border-radius: 10px;
            padding: 25px;
            border: 1px solid var(--border-color);
            transition: all 0.3s;
        }

        .guidelines-card:hover {
            border-color: var(--accent-blue);
        }

        .guidelines-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border-color);
        }

        .guidelines-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--text-color);
            margin: 0;
        }

        .guidelines-toggle {
            background: none;
            border: none;
            color: var(--accent-blue);
            font-size: 0.9rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: all 0.2s;
        }

        .guidelines-toggle:hover {
            opacity: 0.8;
        }

        .guidelines-content {
            display: block;
        }

        .guidelines-content.collapsed {
            display: none;
        }

        .guideline-item {
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--border-color);
        }

        .guideline-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .guideline-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
            background-color: var(--accent-blue);
            color: white;
            border-radius: 50%;
            font-weight: 600;
            margin-right: 10px;
        }

        .guideline-heading {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--text-color);
        }

        .guideline-text {
            color: #a8c6e5;
            margin-bottom: 15px;
            line-height: 1.6;
        }

        .deposit-methods {
            display: flex;
            gap: 20px;
            margin-top: 15px;
        }

        .method-card {
            flex: 1;
            background-color: var(--light-blue);
            border-radius: 8px;
            padding: 20px;
            border: 1px solid var(--border-color);
            transition: all 0.3s;
        }

        .method-card:hover {
            border-color: var(--accent-blue);
            transform: translateY(-3px);
        }

        .method-title {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--text-color);
        }

        .method-description {
            color: #a8c6e5;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .key-terms {
            background-color: var(--light-blue);
            border-radius: 8px;
            padding: 15px;
            margin-top: 15px;
            border-left: 4px solid var(--accent-blue);
        }

        .key-terms-title {
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--text-color);
        }

        .key-terms-list {
            color: #a8c6e5;
            padding-left: 20px;
            margin: 0;
        }

        .key-terms-list li {
            margin-bottom: 8px;
        }

        /* Action Buttons Section */
        .action-buttons-section {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid var(--border-color);
        }

        .action-buttons-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--text-color);
            text-align: center;
        }

        .action-buttons-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
            align-items: center;
        }

        .top-button {
            width: 100%;
            max-width: 400px;
        }

        .bottom-buttons {
            display: flex;
            gap: 15px;
            width: 100%;
            max-width: 400px;
        }

        .action-button {
            padding: 14px 20px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-decoration: none;
            text-align: center;
            min-height: 60px;
            flex: 1;
            color: white;
        }

        .action-button:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            color: white;
            text-decoration: none;
        }

        .action-button i {
            font-size: 1.2rem;
        }

        .manager-button {
            background-color: var(--accent-blue);
        }

        .direct-deposit-button {
            background-color: var(--success-green);
        }

        .installment-button {
            background-color: var(--warning-orange);
        }

        /* Main Content */
        .main-content {
            padding: 20px;
        }

        /* Dashboard Cards */
        .dashboard-card {
            background-color: var(--primary-blue);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid var(--border-color);
            transition: transform 0.3s;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            border-color: var(--accent-blue);
        }

        .card-title {
            font-size: 1.1rem;
            color: #a8c6e5;
            margin-bottom: 15px;
        }

        .card-value {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .card-change {
            font-size: 0.9rem;
        }

        .positive {
            color: var(--success-green);
        }

        .negative {
            color: var(--danger-red);
        }

        /* Quick Action Buttons on Dashboard */
        .quick-actions-container {
            margin: 30px 0;
            padding: 20px;
            background-color: var(--primary-blue);
            border-radius: 10px;
            border: 1px solid var(--border-color);
        }

        .quick-actions-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 25px;
            color: var(--text-color);
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .quick-actions-title i {
            color: var(--accent-blue);
        }

        .quick-actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .quick-action-card {
            background-color: var(--light-blue);
            border-radius: 8px;
            padding: 25px 20px;
            border: 1px solid var(--border-color);
            transition: all 0.3s;
            text-align: center;
            cursor: pointer;
        }

        .quick-action-card:hover {
            border-color: var(--accent-blue);
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .quick-action-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 1.5rem;
        }

        .quick-action-card.change-password-card .quick-action-icon {
            background-color: rgba(255, 152, 0, 0.2);
            color: var(--change-password-color);
            border: 2px solid rgba(255, 152, 0, 0.3);
        }

        .quick-action-card.logout-card .quick-action-icon {
            background-color: rgba(244, 67, 54, 0.2);
            color: var(--logout-color);
            border: 2px solid rgba(244, 67, 54, 0.3);
        }

        .quick-action-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--text-color);
        }

        .quick-action-card.change-password-card .quick-action-title {
            color: #ffcc80;
        }

        .quick-action-card.logout-card .quick-action-title {
            color: #ff8a80;
        }

        .quick-action-description {
            font-size: 0.9rem;
            color: #a8c6e5;
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .quick-action-btn {
            padding: 8px 20px;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
            font-size: 0.9rem;
            width: 100%;
        }

        .quick-action-card.change-password-card .quick-action-btn {
            background-color: var(--change-password-color);
            color: white;
        }

        .quick-action-card.logout-card .quick-action-btn {
            background-color: var(--logout-color);
            color: white;
        }

        .quick-action-btn:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .welcome-notification {
                top: 75px;
                right: 10px;
                left: 10px;
                max-width: none;
            }

            .deposit-methods {
                flex-direction: column;
            }

            .method-card {
                width: 100%;
            }

            .card-value {
                font-size: 1.5rem;
            }

            .bottom-buttons {
                flex-direction: column;
            }

            .action-button {
                min-height: 55px;
            }

            .quick-actions-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .main-content {
                padding: 15px 10px;
            }

            .dashboard-card {
                padding: 15px;
            }

            .guidelines-card {
                padding: 20px 15px;
            }

            .guidelines-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .guidelines-toggle {
                align-self: flex-end;
            }

            .action-button {
                padding: 12px 15px;
            }

            .quick-action-card {
                padding: 20px 15px;
            }
        }
    </style>

    <!-- Smartsupp Live Chat script -->
    <script type="text/javascript">
        var _smartsupp = _smartsupp || {};
_smartsupp.key = 'f6a3d316c4b17c246e490d79381c7db5c5e2f484';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
    </script>
    <noscript> Powered by <a href="https://www.smartsupp.com" target="_blank">Smartsupp</a></noscript>

</head>

<body>
    <!-- Compact Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
        <div class="container-fluid">
            <!-- Brand/Logo -->
            <a class="navbar-brand" href="{{route('dashboard')}}">
                <i class="fas fa-robot me-2"></i>
                <span class="brand-text">TheSpace</span>
            </a>

            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Dashboard -->
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('dashboard')}}">
                            <i class="fas fa-tachometer-alt me-1"></i>Dashboard
                        </a>
                    </li>

                    <!-- Portfolio -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('dashboard.portfolio')}}">
                            <i class="fas fa-chart-line me-1"></i>Portfolio
                        </a>
                    </li>

                    <!-- Investments -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('dashboard.investments')}}">
                            <i class="fas fa-wallet me-1"></i>Investments
                        </a>
                    </li>

                    <!-- Transactions -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('dashboard.transactions')}}">
                            <i class="fas fa-exchange-alt me-1"></i>Transactions
                        </a>
                    </li>

                    <!-- Insurance -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('dashboard.insurance')}}">
                            <i class="fas fa-shield-alt me-1"></i>Insurance
                        </a>
                    </li>
                </ul>

                <!-- User Menu & Settings -->
                <ul class="navbar-nav ms-auto">
                    <!-- Settings -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('dashboard.settings')}}">
                            <i class="fas fa-cog me-1"></i>Settings
                        </a>
                    </li>

                    <!-- User Dropdown - Now Very Visible -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            style="background-color: var(--light-blue); padding: 8px 15px; border-radius: 8px;">
                            <div class="user-info-nav">
                                <div class="user-avatar-nav">
                                    {{ strtoupper(substr(Auth::user()->first_name ?? Auth::user()->name, 0, 1)) }}
                                    {{ strtoupper(substr(Auth::user()->last_name ?? '', 0, 1)) }}
                                </div>
                                <div class="user-details-nav">
                                    <div class="user-name">
                                        {{ Auth::user()->first_name ?? Auth::user()->name }}{{ Auth::user()->last_name
                                        ?? '' }}
                                    </div>
                                    <small class="user-tier">
                                        {{ Auth::user()->tier ?? Auth::user()->role ?? 'Investor' }}
                                    </small>
                                </div>
                                <i class="fas fa-chevron-down ms-2" style="color: #a8c6e5;"></i>
                            </div>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{route('dashboard')}}"><i
                                        class="fas fa-user me-2"></i>Profile</a></li>
                            <li><a class="dropdown-item" href="{{route('dashboard.settings')}}"><i
                                        class="fas fa-cog me-2"></i>Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <!-- HIGHLIGHTED CHANGE PASSWORD OPTION -->
                            <li>
                                <a class="dropdown-item change-password" href="#" data-bs-toggle="modal"
                                    data-bs-target="#changePasswordModal">
                                    <i class="fas fa-key me-2"></i><strong>Change Password</strong>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-question-circle me-2"></i>Help &
                                    Support</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <!-- HIGHLIGHTED LOGOUT OPTION -->
                            <li>
                                <a class="dropdown-item logout" href="#" data-bs-toggle="modal"
                                    data-bs-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt me-2"></i><strong>Logout</strong>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Welcome Notification -->
    <div class="welcome-notification" id="welcomeNotification">
        <div class="notification-header">
            <h3 class="notification-title">Welcome Back, {{ Auth::user()->first_name ?? Auth::user()->name }}!</h3>
            <button class="notification-close" id="notificationClose">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="notification-content">
            Your portfolio is up <span class="positive">+2.34%</span> since your last visit. Check out your latest gains
            and recent activity.
        </div>
        <div class="notification-actions">
            <button class="notification-btn notification-btn-primary" id="viewPortfolioBtn">
                View Portfolio
            </button>
            <button class="notification-btn notification-btn-secondary" id="dismissBtn">
                Dismiss
            </button>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container-fluid main-content">


        <!-- Deposit Guidelines Section -->
        <div class="deposit-guidelines">
            <div class="guidelines-card">
                <div class="guidelines-header">
                    <h2 class="guidelines-title">Deposit Guidelines</h2>
                    <button class="guidelines-toggle" id="guidelinesToggle">
                        <span>Collapse</span>
                        <i class="fas fa-chevron-up"></i>
                    </button>
                </div>
                <div class="guidelines-content" id="guidelinesContent">
                    <!-- Guideline 1 -->
                    <div class="guideline-item">
                        <h3 class="guideline-heading">
                            <span class="guideline-number">1</span>
                            Requesting an Account Manager
                        </h3>
                        <p class="guideline-text">
                            Prior to initiating any deposit, it is strongly advised that you request the assistance of
                            an Account Manager if you don't have one.
                            Your assigned Account Manager will provide personalized guidance throughout the deposit and
                            investment process, ensuring compliance with all necessary procedures.
                        </p>
                    </div>

                    <!-- Guideline 2 -->
                    <div class="guideline-item">
                        <h3 class="guideline-heading">
                            <span class="guideline-number">2</span>
                            Deposit Methods
                        </h3>
                        <p class="guideline-text">
                            We offer two convenient deposit methods to accommodate different investor preferences:
                            Direct Deposit and Installment Payment.
                        </p>

                        <div class="deposit-methods">
                            <!-- Direct Deposit Method -->
                            <div class="method-card">
                                <h4 class="method-title">Direct Deposit</h4>
                                <p class="method-description">
                                    A Direct Deposit involves transferring the entire investment amount in a single
                                    transaction.
                                    Once the deposit is confirmed, your investment will be activated immediately, and
                                    returns will commence according to the terms of your selected investment plan.
                                </p>
                            </div>

                            <!-- Installment Payment Method -->
                            <div class="method-card">
                                <h4 class="method-title">Installment Payment</h4>
                                <p class="method-description">
                                    The Installment Payment option is designed for investors who intend to begin with a
                                    specific investment amount but do not currently have the full capital available.
                                    For example, if you plan to start with $50,000 but do not have the complete funds at
                                    the moment, you may choose to make payments in smaller portions until the full
                                    amount is reached.
                                </p>
                            </div>
                        </div>

                        <div class="key-terms">
                            <h4 class="key-terms-title">Key Terms:</h4>
                            <ul class="key-terms-list">
                                <li>You may complete your installment payments in up to four (4) transactions.</li>
                                <li>Your investment will officially commence after the total target amount has been
                                    fully deposited.</li>
                                <li>Following your first installment, you will begin receiving company bonuses, which
                                    are withdrawable to your registered bank wallet or wallet.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Action Buttons Section -->
                    <div class="action-buttons-section">
                        <h3 class="action-buttons-title">Take Action</h3>
                        <div class="action-buttons-container">
                            <a href="{{route('dashboard.accountmanager')}}"
                                class="action-button manager-button top-button" id="requestManagerBtn">
                                <i class="fas fa-user-tie"></i>
                                Request Account Manager
                            </a>
                            <div class="bottom-buttons">
                                <a href="{{route('dashboard.directdeposit')}}"
                                    class="action-button direct-deposit-button">
                                    <i class="fas fa-money-bill-wave"></i>
                                    Direct Deposit
                                </a>
                                <a href="{{route('dashboard.installmentpayment')}}"
                                    class="action-button installment-button" id="installmentBtn">
                                    <i class="fas fa-calendar-alt"></i>
                                    Installment Payment
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Quick Actions Section - VERY VISIBLE ON DASHBOARD -->
        <div class="quick-actions-container">
            <h2 class="quick-actions-title">
                <i class="fas fa-bolt"></i> Quick Actions
            </h2>
            <div class="quick-actions-grid">
                <!-- Change Password Card -->
                <div class="quick-action-card change-password-card">
                    <div class="quick-action-icon">
                        <i class="fas fa-key"></i>
                    </div>
                    <h3 class="quick-action-title">Change Password</h3>
                    <p class="quick-action-description">
                        Update your account password for enhanced security. Recommended every 90 days.
                    </p>
                    <button class="quick-action-btn" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                        <i class="fas fa-lock me-1"></i> Change Password
                    </button>
                </div>

                <!-- Logout Card -->
                <div class="quick-action-card logout-card">
                    <div class="quick-action-icon">
                        <i class="fas fa-sign-out-alt"></i>
                    </div>
                    <h3 class="quick-action-title">Logout</h3>
                    <p class="quick-action-description">
                        Securely logout from your account. Always logout when using shared devices.
                    </p>
                    <button class="quick-action-btn" data-bs-toggle="modal" data-bs-target="#logoutModal">
                        <i class="fas fa-sign-out-alt me-1"></i> Logout Now
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Change Password Modal -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content"
                style="background-color: var(--primary-blue); border: 1px solid var(--border-color); border-top: 4px solid var(--change-password-color);">
                <div class="modal-header border-bottom border-secondary">
                    <h5 class="modal-title" id="changePasswordModalLabel" style="color: #ffcc80;">
                        <i class="fas fa-key me-2"></i>Change Password
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="changePasswordForm">
                        @csrf
                        <div class="mb-3">
                            <label for="current_password" class="form-label" style="color: #a8c6e5;">
                                <i class="fas fa-lock me-1"></i>Current Password
                            </label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="current_password"
                                    name="current_password"
                                    style="background-color: var(--light-blue); border: 1px solid var(--border-color); color: var(--text-color);"
                                    placeholder="Enter your current password" required>
                                <button class="btn btn-outline-secondary toggle-password" type="button"
                                    style="border-color: var(--border-color); color: #a8c6e5;"
                                    data-target="current_password">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="invalid-feedback" id="current_password_error"></div>
                        </div>

                        <div class="mb-3">
                            <label for="new_password" class="form-label" style="color: #a8c6e5;">
                                <i class="fas fa-key me-1"></i>New Password
                            </label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="new_password" name="new_password"
                                    style="background-color: var(--light-blue); border: 1px solid var(--border-color); color: var(--text-color);"
                                    placeholder="Enter new password" required minlength="8">
                                <button class="btn btn-outline-secondary toggle-password" type="button"
                                    style="border-color: var(--border-color); color: #a8c6e5;"
                                    data-target="new_password">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="form-text" style="color: #a8c6e5; font-size: 0.85rem;">
                                <i class="fas fa-info-circle me-1"></i>Password must be at least 8 characters long
                            </div>
                            <div class="invalid-feedback" id="new_password_error"></div>
                        </div>

                        <div class="mb-3">
                            <label for="new_password_confirmation" class="form-label" style="color: #a8c6e5;">
                                <i class="fas fa-key me-1"></i>Confirm New Password
                            </label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="new_password_confirmation"
                                    name="new_password_confirmation"
                                    style="background-color: var(--light-blue); border: 1px solid var(--border-color); color: var(--text-color);"
                                    placeholder="Confirm your new password" required>
                                <button class="btn btn-outline-secondary toggle-password" type="button"
                                    style="border-color: var(--border-color); color: #a8c6e5;"
                                    data-target="new_password_confirmation">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="invalid-feedback" id="new_password_confirmation_error"></div>
                        </div>

                        <div class="modal-footer border-top border-secondary pt-3">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                style="background-color: var(--light-blue); border-color: var(--border-color); color: #a8c6e5;">
                                <i class="fas fa-times me-1"></i>Cancel
                            </button>
                            <button type="submit" class="btn btn-warning" id="changePasswordBtn"
                                style="background-color: var(--change-password-color); border-color: var(--change-password-color); color: white;">
                                <i class="fas fa-save me-1"></i>
                                <span id="changePasswordBtnText">Update Password</span>
                                <span id="changePasswordSpinner" class="spinner-border spinner-border-sm d-none"
                                    role="status"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Confirmation Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content"
                style="background-color: var(--primary-blue); border: 1px solid var(--border-color); border-top: 4px solid var(--logout-color);">
                <div class="modal-header border-bottom border-secondary">
                    <h5 class="modal-title" id="logoutModalLabel" style="color: #ff8a80;">
                        <i class="fas fa-sign-out-alt me-2"></i>Confirm Logout
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="mb-4">
                        <i class="fas fa-sign-out-alt fa-3x mb-3" style="color: var(--logout-color);"></i>
                        <h4 style="color: var(--text-color);">Ready to leave?</h4>
                        <p style="color: #a8c6e5; margin-top: 10px;">
                            Are you sure you want to logout from your account?
                        </p>
                        <div class="alert alert-warning mt-3"
                            style="background-color: rgba(244, 67, 54, 0.1); border-color: rgba(244, 67, 54, 0.3); color: #ffcc80;">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <small>For security, always logout when using shared devices.</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top border-secondary">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        style="background-color: var(--light-blue); border-color: var(--border-color); color: #a8c6e5;">
                        <i class="fas fa-times me-1"></i>Cancel
                    </button>
                    <form id="logoutForm" action="{{ route('user.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger" id="logoutBtn"
                            style="background-color: var(--logout-color); border-color: var(--logout-color);">
                            <i class="fas fa-sign-out-alt me-1"></i>
                            <span id="logoutBtnText">Yes, Logout</span>
                            <span id="logoutSpinner" class="spinner-border spinner-border-sm d-none"
                                role="status"></span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add active class to current page in navbar
            const currentPage = window.location.pathname.split('/').pop();
            const navLinks = document.querySelectorAll('.nav-link');
            
            navLinks.forEach(link => {
                const linkHref = link.getAttribute('href');
                if (linkHref === currentPage || (currentPage === '' && linkHref === 'href="{{route('dashboard')}}"')) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });

            // Welcome Notification Logic
            const welcomeNotification = document.getElementById('welcomeNotification');
            const notificationClose = document.getElementById('notificationClose');
            const dismissBtn = document.getElementById('dismissBtn');
            const viewPortfolioBtn = document.getElementById('viewPortfolioBtn');
            
            // Show notification after a short delay
            setTimeout(() => {
                welcomeNotification.classList.add('show');
            }, 800);
            
            // Close notification when X button is clicked
            notificationClose.addEventListener('click', () => {
                welcomeNotification.classList.remove('show');
            });
            
            // Close notification when dismiss button is clicked
            dismissBtn.addEventListener('click', () => {
                welcomeNotification.classList.remove('show');
            });
            
            // Navigate to portfolio when view portfolio button is clicked
            viewPortfolioBtn.addEventListener('click', () => {
                window.location.href = '{{ route("dashboard.portfolio") }}';
                welcomeNotification.classList.remove('show');
            });
            
            // Auto-hide notification after 8 seconds
            setTimeout(() => {
                if (welcomeNotification.classList.contains('show')) {
                    welcomeNotification.classList.remove('show');
                }
            }, 8000);
            
            // Deposit Guidelines Logic
            const guidelinesToggle = document.getElementById('guidelinesToggle');
            const guidelinesContent = document.getElementById('guidelinesContent');
            
            // Toggle guidelines content
            guidelinesToggle.addEventListener('click', () => {
                guidelinesContent.classList.toggle('collapsed');
                
                if (guidelinesContent.classList.contains('collapsed')) {
                    guidelinesToggle.innerHTML = '<span>Expand</span> <i class="fas fa-chevron-down"></i>';
                } else {
                    guidelinesToggle.innerHTML = '<span>Collapse</span> <i class="fas fa-chevron-up"></i>';
                }
            });

            // Toggle password visibility
            document.querySelectorAll('.toggle-password').forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const input = document.getElementById(targetId);
                    const icon = this.querySelector('i');
                    
                    if (input.type === 'password') {
                        input.type = 'text';
                        icon.classList.remove('fa-eye');
                        icon.classList.add('fa-eye-slash');
                    } else {
                        input.type = 'password';
                        icon.classList.remove('fa-eye-slash');
                        icon.classList.add('fa-eye');
                    }
                });
            });

            // Change Password Form Submission
            const changePasswordForm = document.getElementById('changePasswordForm');
            if (changePasswordForm) {
                changePasswordForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const formData = new FormData(this);
                    const changePasswordBtn = document.getElementById('changePasswordBtn');
                    const changePasswordBtnText = document.getElementById('changePasswordBtnText');
                    const changePasswordSpinner = document.getElementById('changePasswordSpinner');
                    
                    // Reset errors
                    document.querySelectorAll('.invalid-feedback').forEach(el => {
                        el.textContent = '';
                        el.style.display = 'none';
                    });
                    document.querySelectorAll('.form-control').forEach(el => {
                        el.classList.remove('is-invalid');
                    });
                    
                    // Show loading state
                    changePasswordBtn.disabled = true;
                    changePasswordBtnText.classList.add('d-none');
                    changePasswordSpinner.classList.remove('d-none');
                    
                    // Submit via AJAX
                    fetch('{{ route("user.change-password") }}', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Success
                            alert('✅ Password changed successfully!');
                            document.getElementById('changePasswordModal').querySelector('.btn-close').click();
                            changePasswordForm.reset();
                        } else {
                            // Show errors
                            if (data.errors) {
                                Object.keys(data.errors).forEach(field => {
                                    const input = document.getElementById(field);
                                    const errorDiv = document.getElementById(field + '_error');
                                    if (input && errorDiv) {
                                        input.classList.add('is-invalid');
                                        errorDiv.textContent = data.errors[field][0];
                                        errorDiv.style.display = 'block';
                                    }
                                });
                            } else if (data.message) {
                                alert('❌ ' + data.message);
                            }
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('❌ An error occurred. Please try again.');
                    })
                    .finally(() => {
                        // Reset button state
                        changePasswordBtn.disabled = false;
                        changePasswordBtnText.classList.remove('d-none');
                        changePasswordSpinner.classList.add('d-none');
                    });
                });
            }

            // Logout form submission
            const logoutForm = document.getElementById('logoutForm');
            if (logoutForm) {
                logoutForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const logoutBtn = document.getElementById('logoutBtn');
                    const logoutBtnText = document.getElementById('logoutBtnText');
                    const logoutSpinner = document.getElementById('logoutSpinner');
                    
                    logoutBtn.disabled = true;
                    logoutBtnText.classList.add('d-none');
                    logoutSpinner.classList.remove('d-none');
                    
                    // Submit the form
                    this.submit();
                });
            }

            // Add click handlers for quick action cards
            document.querySelectorAll('.quick-action-card').forEach(card => {
                card.addEventListener('click', function(e) {
                    if (!e.target.closest('.quick-action-btn')) {
                        const button = this.querySelector('.quick-action-btn');
                        if (button) {
                            button.click();
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>
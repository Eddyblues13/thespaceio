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
        }

        .dropdown-item {
            color: #a8c6e5;
            padding: 0.7rem 1rem;
            transition: all 0.2s;
        }

        .dropdown-item:hover {
            background-color: var(--light-blue);
            color: white;
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
        }
    </style>
</head>

<body>
    <!-- Compact Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
        <div class="container-fluid">
            <!-- Brand/Logo -->
            <a class="navbar-brand" href="index.html">
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
                        <a class="nav-link active" href="dashboard.html">
                            <i class="fas fa-tachometer-alt me-1"></i>Dashboard
                        </a>
                    </li>

                    <!-- Portfolio -->
                    <li class="nav-item">
                        <a class="nav-link" href="portfolio.html">
                            <i class="fas fa-chart-line me-1"></i>Portfolio
                        </a>
                    </li>

                    <!-- Investments -->
                    <li class="nav-item">
                        <a class="nav-link" href="investment.html">
                            <i class="fas fa-wallet me-1"></i>Investments
                        </a>
                    </li>

                    <!-- Transactions -->
                    <li class="nav-item">
                        <a class="nav-link" href="transactions.html">
                            <i class="fas fa-exchange-alt me-1"></i>Transactions
                        </a>
                    </li>

                    <!-- Insurance -->
                    <li class="nav-item">
                        <a class="nav-link" href="insurance.html">
                            <i class="fas fa-shield-alt me-1"></i>Insurance
                        </a>
                    </li>
                </ul>

                <!-- User Menu & Settings -->
                <ul class="navbar-nav ms-auto">
                    <!-- Settings -->
                    <li class="nav-item">
                        <a class="nav-link" href="settings.html">
                            <i class="fas fa-cog me-1"></i>Settings
                        </a>
                    </li>

                    <!-- User Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <div class="user-info-nav">
                                <div class="user-avatar-nav">JD</div>
                                <div class="user-details-nav">
                                    <div class="user-name">John Doe</div>
                                    <small class="user-tier">Tier 2 Investor</small>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="profile.html"><i class="fas fa-user me-2"></i>Profile</a>
                            </li>
                            <li><a class="dropdown-item" href="security.html"><i
                                        class="fas fa-lock me-2"></i>Security</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="help.html"><i
                                        class="fas fa-question-circle me-2"></i>Help & Support</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item text-danger" href="index.html">
                                    <i class="fas fa-arrow-left me-2"></i>Back to Main Site
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
            <h3 class="notification-title">Welcome Back, John!</h3>
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
                                <li>You may complete your installment payments in up to four (3) transactions.</li>
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
                            <a href="accountmanager.html" class="action-button manager-button top-button"
                                id="requestManagerBtn">
                                <i class="fas fa-user-tie"></i>
                                Request Account Manager
                            </a>
                            <div class="bottom-buttons">
                                <a href="directdeposit.html" class="action-button direct-deposit-button">
                                    <i class="fas fa-money-bill-wave"></i>
                                    Direct Deposit
                                </a>
                                <a href="installmentalpayment.html" class="action-button installment-button"
                                    id="installmentBtn">
                                    <i class="fas fa-calendar-alt"></i>
                                    Installment Payment
                                </a>
                            </div>
                        </div>
                    </div>
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
                if (linkHref === currentPage || (currentPage === '' && linkHref === 'dashboard.html')) {
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
                window.location.href = 'portfolio.html';
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
        });
    </script>
</body>

</html>
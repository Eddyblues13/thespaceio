<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheSpace - Request Account Manager</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
            --michael-gold: #FFD700;
            --premium-gold: #FFD700;
        }

        body {
            background-color: var(--dark-blue);
            color: var(--text-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            overflow-x: hidden;
            padding-top: 70px;
            /* Account for fixed navbar */
        }

        /* Responsive Navbar */
        .navbar-TheSpace {
            background-color: var(--primary-blue);
            border-bottom: 1px solid var(--border-color);
            padding: 0.5rem 1rem;
            transition: all 0.3s;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand {
            color: white;
            font-weight: bold;
            display: flex;
            align-items: center;
        }

        .navbar-brand i {
            margin-right: 10px;
        }

        .navbar-nav .nav-link {
            color: #a8c6e5;
            padding: 10px 15px;
            transition: all 0.3s;
            border-radius: 5px;
            margin: 2px 0;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            background-color: var(--light-blue);
            color: white;
        }

        .navbar-nav .nav-link i {
            width: 20px;
            text-align: center;
            margin-right: 8px;
        }

        .navbar-toggler {
            border: 1px solid var(--border-color);
            padding: 5px 10px;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 2px rgba(0, 82, 163, 0.25);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* Dropdown for smaller screens */
        @media (max-width: 991px) {
            .navbar-collapse {
                background-color: var(--primary-blue);
                padding: 10px;
                border-radius: 0 0 8px 8px;
                border: 1px solid var(--border-color);
                border-top: none;
                max-height: 70vh;
                overflow-y: auto;
            }

            .navbar-nav {
                margin-top: 10px;
            }
        }

        /* Main Content */
        .main-content {
            padding: 20px;
        }

        /* Top Bar */
        .top-bar {
            background-color: var(--primary-blue);
            padding: 15px 20px;
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 20px;
            border-radius: 8px;
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--accent-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            margin-right: 10px;
        }

        /* Dashboard Cards */
        .dashboard-card {
            background-color: var(--primary-blue);
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 20px;
            border: 1px solid var(--border-color);
        }

        .card-title {
            font-size: 1.3rem;
            color: var(--text-color);
            margin-bottom: 15px;
            font-weight: 600;
        }

        .card-subtitle {
            font-size: 1rem;
            color: #a8c6e5;
            margin-bottom: 20px;
        }

        /* Account Manager Selection */
        .selection-container {
            text-align: center;
            margin-bottom: 30px;
        }

        .selection-title {
            font-size: 1.8rem;
            margin-bottom: 10px;
            color: var(--text-color);
        }

        .selection-subtitle {
            font-size: 1.1rem;
            color: #a8c6e5;
            margin-bottom: 30px;
        }

        /* Premium Manager Notice */
        .premium-notice {
            background: linear-gradient(135deg, rgba(255, 215, 0, 0.1) 0%, rgba(0, 82, 163, 0.1) 100%);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 25px;
            border: 2px solid rgba(255, 215, 0, 0.3);
            text-align: center;
        }

        .premium-icon {
            color: var(--premium-gold);
            font-size: 2rem;
            margin-bottom: 10px;
        }

        /* Vertical Scrollable Container */
        .vertical-scroll-container {
            position: relative;
            height: 500px;
            overflow: hidden;
            margin: 30px 0;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--light-blue) 0%, var(--primary-blue) 100%);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            border: 2px solid var(--border-color);
        }

        .vertical-managers-track {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .vertical-manager-card {
            width: 100%;
            height: 160px;
            background-color: var(--primary-blue);
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            padding: 20px;
            transition: all 0.3s ease;
            opacity: 0.7;
        }

        .vertical-manager-card:last-child {
            border-bottom: none;
        }

        .vertical-manager-card.active {
            background-color: var(--light-blue);
            border-left: 4px solid var(--accent-blue);
            opacity: 1;
            transform: scale(1.02);
        }

        .vertical-manager-card.premium {
            background: linear-gradient(135deg, rgba(255, 215, 0, 0.1) 0%, var(--primary-blue) 100%);
            border-left: 4px solid var(--premium-gold);
        }

        .vertical-manager-card.premium.active {
            background: linear-gradient(135deg, rgba(255, 215, 0, 0.2) 0%, var(--light-blue) 100%);
            box-shadow: 0 0 20px rgba(255, 215, 0, 0.3);
        }

        .vertical-manager-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--accent-blue);
            margin-right: 20px;
            flex-shrink: 0;
        }

        .vertical-manager-card.premium .vertical-manager-avatar {
            border-color: var(--premium-gold);
            box-shadow: 0 0 15px rgba(255, 215, 0, 0.4);
        }

        .vertical-manager-info {
            flex-grow: 1;
            text-align: left;
        }

        .vertical-manager-name {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--text-color);
        }

        .vertical-manager-card.premium .vertical-manager-name {
            color: var(--premium-gold);
        }

        .vertical-manager-title {
            font-size: 0.95rem;
            color: #a8c6e5;
            margin-bottom: 8px;
        }

        .vertical-manager-specialty {
            font-size: 0.85rem;
            color: var(--accent-blue);
            background-color: rgba(0, 82, 163, 0.2);
            padding: 4px 10px;
            border-radius: 15px;
            display: inline-block;
        }

        .vertical-manager-card.premium .vertical-manager-specialty {
            background-color: rgba(255, 215, 0, 0.2);
            color: var(--premium-gold);
        }

        .vertical-manager-stats {
            display: flex;
            gap: 20px;
            margin-top: 10px;
        }

        .vertical-stat {
            text-align: center;
        }

        .vertical-stat-value {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--accent-blue);
            margin-bottom: 2px;
        }

        .vertical-manager-card.premium .vertical-stat-value {
            color: var(--premium-gold);
        }

        .vertical-stat-label {
            font-size: 0.75rem;
            color: #a8c6e5;
        }

        .premium-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background-color: rgba(255, 215, 0, 0.2);
            color: var(--premium-gold);
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-left: 15px;
        }

        .availability {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background-color: var(--danger-red);
        }

        .availability.available {
            background-color: var(--success-green);
        }

        /* Controls */
        .controls-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .control-btn {
            background-color: var(--accent-blue);
            color: white;
            border: none;
            border-radius: 6px;
            padding: 12px 25px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .control-btn:hover {
            background-color: #00458a;
            transform: translateY(-2px);
        }

        .control-btn:disabled {
            background-color: var(--border-color);
            cursor: not-allowed;
            transform: none;
        }

        .control-btn.secondary {
            background-color: transparent;
            border: 1px solid var(--border-color);
        }

        .control-btn.secondary:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }

        .premium-btn {
            background-color: var(--premium-gold);
            color: var(--dark-blue);
            font-weight: 600;
        }

        .premium-btn:hover {
            background-color: #e6c200;
            transform: translateY(-2px);
        }

        /* Selected Manager */
        .selected-manager {
            text-align: center;
            margin-top: 30px;
            padding: 25px;
            background-color: var(--light-blue);
            border-radius: 10px;
            border: 2px solid var(--premium-gold);
            display: none;
            box-shadow: 0 0 20px rgba(255, 215, 0, 0.3);
        }

        .selected-manager.show {
            display: block;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .selected-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--premium-gold);
            margin-bottom: 15px;
        }

        .selected-name {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--premium-gold);
        }

        .selected-title {
            font-size: 1.1rem;
            color: #a8c6e5;
            margin-bottom: 15px;
        }

        .selected-bio {
            max-width: 600px;
            margin: 0 auto 20px;
            color: #a8c6e5;
            line-height: 1.6;
            display: none;
        }

        .selected-bio.show {
            display: block;
            animation: fadeIn 0.5s ease-in-out;
        }

        .stats-container {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-bottom: 25px;
        }

        .stat {
            text-align: center;
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--premium-gold);
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 0.9rem;
            color: #a8c6e5;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 25px;
        }

        .action-btn {
            background-color: transparent;
            color: var(--premium-gold);
            border: 1px solid var(--premium-gold);
            border-radius: 6px;
            padding: 10px 25px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .action-btn:hover {
            background-color: rgba(255, 215, 0, 0.1);
            transform: translateY(-2px);
        }

        /* Contact Modal */
        .contact-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .contact-modal.show {
            opacity: 1;
            visibility: visible;
        }

        .contact-content {
            background-color: var(--primary-blue);
            border-radius: 15px;
            padding: 30px;
            max-width: 500px;
            width: 90%;
            text-align: center;
            border: 2px solid var(--premium-gold);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            transform: translateY(20px);
            transition: transform 0.3s ease;
        }

        .contact-modal.show .contact-content {
            transform: translateY(0);
        }

        .contact-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--premium-gold);
            margin: 0 auto 20px;
            display: block;
        }

        .contact-name {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--premium-gold);
        }

        .contact-title {
            font-size: 1.1rem;
            color: #a8c6e5;
            margin-bottom: 20px;
        }

        .contact-description {
            color: #a8c6e5;
            margin-bottom: 25px;
            line-height: 1.6;
        }

        .contact-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 25px;
        }

        .contact-link {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: var(--text-color);
            transition: all 0.3s;
            padding: 15px;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.05);
            width: 140px;
        }

        .contact-link:hover {
            background-color: rgba(255, 215, 0, 0.1);
            transform: translateY(-5px);
            color: var(--premium-gold);
        }

        .contact-icon {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .contact-link-text {
            font-weight: 500;
        }

        .contact-close {
            background-color: transparent;
            color: var(--premium-gold);
            border: 1px solid var(--premium-gold);
            border-radius: 6px;
            padding: 8px 20px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
        }

        .contact-close:hover {
            background-color: rgba(255, 215, 0, 0.1);
        }

        /* Scroll Indicators */
        .scroll-indicators {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        .scroll-indicator {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: var(--border-color);
            transition: all 0.3s;
        }

        .scroll-indicator.active {
            background-color: var(--premium-gold);
            transform: scale(1.3);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .dashboard-card {
                padding: 20px;
            }

            .vertical-scroll-container {
                height: 400px;
            }

            .vertical-manager-card {
                height: 140px;
                padding: 15px;
            }

            .vertical-manager-avatar {
                width: 70px;
                height: 70px;
                margin-right: 15px;
            }

            .vertical-manager-stats {
                gap: 15px;
            }

            .stats-container {
                flex-direction: column;
                gap: 15px;
            }

            .action-buttons {
                flex-direction: column;
                gap: 15px;
            }

            .contact-links {
                flex-direction: column;
                align-items: center;
            }

            .contact-link {
                width: 100%;
                max-width: 250px;
            }
        }

        @media (max-width: 576px) {
            .main-content {
                padding: 15px 10px;
            }

            .top-bar {
                padding: 10px 15px;
            }

            .dashboard-card {
                padding: 15px;
            }

            .controls-container {
                flex-direction: column;
                align-items: center;
            }

            .control-btn {
                width: 100%;
                max-width: 250px;
                justify-content: center;
            }

            .vertical-manager-card {
                flex-direction: column;
                height: auto;
                padding: 15px;
                text-align: center;
            }

            .vertical-manager-avatar {
                margin-right: 0;
                margin-bottom: 10px;
            }

            .vertical-manager-info {
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <!-- Responsive Navbar -->
    <nav class="navbar navbar-expand-lg navbar-TheSpace fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{url('/')}}">
                <i class="fas fa-robot me-2"></i>TheSpace
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTheSpace"
                aria-controls="navbarTheSpace" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTheSpace">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.html">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="portfolio.html">
                            <i class="fas fa-chart-line"></i> Portfolio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="investments.html">
                            <i class="fas fa-wallet"></i> Investments
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.deposit') }}">
                            <i class="fas fa-money-bill-transfer"></i> Direct Deposit
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="account-manager.html">
                            <i class="fas fa-user-tie"></i> Account Manager
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="transactions.html">
                            <i class="fas fa-exchange-alt"></i> Transactions
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.reports') }}">
                            <i class="fas fa-file-invoice-dollar"></i> Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="settings.html">
                            <i class="fas fa-cog"></i> Settings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/')}}">
                            <i class="fas fa-arrow-left"></i> Back to Main Site
                        </a>
                    </li>
                </ul>
                <div class="d-flex user-info">
                    <div class="user-avatar"> {{ strtoupper(substr(Auth::user()->first_name ?? Auth::user()->name, 0,
                        1)) }}
                        {{ strtoupper(substr(Auth::user()->last_name ?? '', 0, 1)) }}</div>
                    <div>
                        <div class="fw-bold"> {{ Auth::user()->first_name ?? Auth::user()->name }}{{
                            Auth::user()->last_name
                            ?? '' }}</div>
                        <small class="text-muted">
                            {{ Auth::user()->tier ?? Auth::user()->role ?? 'Investor' }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid">
        <div class="row">
            <!-- Main Content -->
            <div class="col-12 main-content">
                <!-- Top Bar -->
                <div class="top-bar d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Request Account Manager</h4>
                    <div class="user-info d-none d-md-flex">
                        <div class="user-avatar"> {{ strtoupper(substr(Auth::user()->first_name ?? Auth::user()->name,
                            0, 1)) }}
                            {{ strtoupper(substr(Auth::user()->last_name ?? '', 0, 1)) }}</div>
                        <div>
                            <div class="fw-bold"> {{ Auth::user()->first_name ?? Auth::user()->name }}{{
                                Auth::user()->last_name
                                ?? '' }}</div>
                            <small class="text-muted">
                                {{ Auth::user()->tier ?? Auth::user()->role ?? 'Investor' }}
                            </small>
                        </div>
                    </div>
                </div>

                <!-- Selection Interface -->
                <div class="dashboard-card">
                    <div class="selection-container">
                        <h1 class="selection-title">Find Your Account Manager</h1>
                        <p class="selection-subtitle">
                            Scroll through our portfolio managers. Michael Saylor is our exclusive premium manager.
                        </p>

                        <!-- Premium Manager Notice -->
                        <div class="premium-notice">
                            <div class="premium-icon">
                                <i class="fas fa-crown"></i>
                            </div>
                            <h4>Exclusive Premium Manager Available</h4>
                            <p class="mb-0">Michael Saylor is our only premium account manager with specialized
                                expertise in Bitcoin and digital asset strategies.</p>
                        </div>

                        <!-- Vertical Scrollable Container -->
                        <div class="vertical-scroll-container">
                            <div class="vertical-managers-track" id="verticalManagersTrack">
                                <!-- Manager cards will be inserted here by JavaScript -->
                            </div>
                        </div>

                        <!-- Scroll Indicators -->
                        <div class="scroll-indicators" id="scrollIndicators">
                            <!-- Indicators will be inserted here by JavaScript -->
                        </div>

                        <!-- Controls -->
                        <div class="controls-container">
                            <button class="control-btn secondary" id="scrollUpBtn">
                                <i class="fas fa-chevron-up"></i> Scroll Up
                            </button>
                            <button class="control-btn premium-btn" id="selectPremiumBtn">
                                <i class="fas fa-crown"></i> Select Premium Manager
                            </button>
                            <button class="control-btn secondary" id="scrollDownBtn">
                                <i class="fas fa-chevron-down"></i> Scroll Down
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Selected Manager Display -->
                <div class="selected-manager" id="selectedManager">
                    <img src="img/micheal saylor.jpeg" alt="Account Manager" class="selected-avatar"
                        id="selectedAvatar">
                    <h2 class="selected-name" id="selectedName">Michael Saylor</h2>
                    <p class="selected-title" id="selectedTitle">Bitcoin Strategy Director</p>

                    <div class="stats-container">
                        <div class="stat">
                            <div class="stat-value" id="statClients">50+</div>
                            <div class="stat-label">Clients</div>
                        </div>
                        <div class="stat">
                            <div class="stat-value" id="statExperience">10+</div>
                            <div class="stat-label">Years Experience</div>
                        </div>
                        <div class="stat">
                            <div class="stat-value" id="statSpecialty">215%</div>
                            <div class="stat-label">Success Rate</div>
                        </div>
                    </div>

                    <!-- Bio section that appears when About button is clicked -->
                    <p class="selected-bio" id="selectedBio">
                        Michael Saylor is our exclusive premium Bitcoin Strategy Director with over 10 years of
                        experience in digital asset allocation. He specializes in Bitcoin investment strategies and has
                        achieved remarkable 215% success rates for his clients through strategic cryptocurrency
                        portfolio management. As our only premium manager, he offers exclusive access to high-yield
                        digital asset opportunities.
                    </p>

                    <!-- Action buttons at the bottom -->
                    <div class="action-buttons">
                        <button class="action-btn" id="contactBtn">
                            <i class="fas fa-envelope"></i> Contact
                        </button>
                        <button class="action-btn" id="aboutBtn">
                            <i class="fas fa-info-circle"></i> About
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Modal -->
    <div class="contact-modal" id="contactModal">
        <div class="contact-content">
            <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
                alt="Michael Saylor Representative" class="contact-avatar">
            <h2 class="contact-name">Eleanor Vance</h2>
            <p class="contact-title">Senior Client Relations Manager</p>
            <p class="contact-description">
                Eleanor is Michael Saylor's dedicated representative and your primary point of contact.
            </p>

            <div class="contact-links">
                <a href="https://teams.live.com/l/invite/FEATnsW2wwr1UOlVwE?v=g1" class="contact-link" id="teamsLink">
                    <i class="fab fa-microsoft contact-icon"></i>
                    <span class="contact-link-text">Microsoft Teams</span>
                </a>
                <a href="http://t.me/michaelsaylorrepresentative" class="contact-link" id="telegramLink">
                    <i class="fab fa-telegram contact-icon"></i>
                    <span class="contact-link-text">Telegram</span>
                </a>
            </div>

            <button class="contact-close" id="contactClose">Close</button>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Elements
            const verticalManagersTrack = document.getElementById('verticalManagersTrack');
            const scrollIndicators = document.getElementById('scrollIndicators');
            const scrollUpBtn = document.getElementById('scrollUpBtn');
            const scrollDownBtn = document.getElementById('scrollDownBtn');
            const selectPremiumBtn = document.getElementById('selectPremiumBtn');
            const selectedManager = document.getElementById('selectedManager');
            const selectedAvatar = document.getElementById('selectedAvatar');
            const selectedName = document.getElementById('selectedName');
            const selectedTitle = document.getElementById('selectedTitle');
            const selectedBio = document.getElementById('selectedBio');
            const statClients = document.getElementById('statClients');
            const statExperience = document.getElementById('statExperience');
            const statSpecialty = document.getElementById('statSpecialty');
            const contactBtn = document.getElementById('contactBtn');
            const aboutBtn = document.getElementById('aboutBtn');
            const contactModal = document.getElementById('contactModal');
            const contactClose = document.getElementById('contactClose');
            const teamsLink = document.getElementById('teamsLink');
            const telegramLink = document.getElementById('telegramLink');
            
            // Account Managers Data (Michael Saylor as the only premium manager)
            const accountManagers = [
                {
                    id: 1,
                    name: "Sarah Johnson",
                    title: "Investment Advisor",
                    specialty: "Tech & AI Investments",
                    bio: "Sarah specializes in technology and AI investments with over 8 years of experience.",
                    clients: "150+",
                    experience: "8+",
                    successRate: "95%",
                    avatar: "https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60",
                    available: true,
                    isPremium: false
                },
                {
                    id: 2,
                    name: "Michael Chen",
                    title: "Wealth Management Specialist",
                    specialty: "International Markets",
                    bio: "Michael brings 12 years of international market expertise, focusing on emerging economies.",
                    clients: "200+",
                    experience: "12+",
                    successRate: "92%",
                    avatar: "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60",
                    available: true,
                    isPremium: false
                },
                {
                    id: 3,
                    name: "Elena Rodriguez",
                    title: "Portfolio Strategist",
                    specialty: "Sustainable Investing",
                    bio: "Elena is an expert in ESG investing with 6 years of experience.",
                    clients: "120+",
                    experience: "6+",
                    successRate: "89%",
                    avatar: "https://images.unsplash.com/photo-1536922246289-88c42f957773?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60",
                    available: false,
                    isPremium: false
                },
                {
                    id: 4,
                    name: "Michael Saylor",
                    title: "Bitcoin Strategy Director",
                    specialty: "Digital Asset Allocation",
                    bio: "Michael Saylor is our exclusive premium Bitcoin Strategy Director with over 10 years of experience in digital asset allocation. He specializes in Bitcoin investment strategies and has achieved remarkable 215% success rates for his clients through strategic cryptocurrency portfolio management. As our only premium manager, he offers exclusive access to high-yield digital asset opportunities.",
                    clients: "50+",
                    experience: "10+",
                    successRate: "215%",
                    avatar: "data:image/jpeg;base64,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",
                    available: true,
                    isPremium: true
                },
                {
                    id: 5,
                    name: "David Wilson",
                    title: "Risk Management Advisor",
                    specialty: "Hedge Fund Strategies",
                    bio: "David specializes in advanced risk management techniques and alternative investments.",
                    clients: "180+",
                    experience: "10+",
                    successRate: "96%",
                    avatar: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60",
                    available: true,
                    isPremium: false
                },
                {
                    id: 6,
                    name: "Olivia Parker",
                    title: "Retirement Planning Expert",
                    specialty: "Long-term Growth",
                    bio: "Olivia focuses on retirement planning and long-term wealth preservation.",
                    clients: "170+",
                    experience: "9+",
                    successRate: "94%",
                    avatar: "https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60",
                    available: true,
                    isPremium: false
                },
                {
                    id: 7,
                    name: "James Thompson",
                    title: "Venture Capital Specialist",
                    specialty: "Startup Investments",
                    bio: "James has experience in venture capital and private equity investments.",
                    clients: "90+",
                    experience: "7+",
                    successRate: "88%",
                    avatar: "https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60",
                    available: false,
                    isPremium: false
                }
            ];
            
            // Variables
            let currentPosition = 0;
            const cardHeight = 160; // Height of each manager card
            const visibleCards = 3; // Number of cards visible in container
            const michaelPosition = 3; // Michael Saylor position (0-indexed)
            let isScrolling = false;
            
            // Initialize the vertical managers track
            function initializeVerticalManagersTrack() {
                verticalManagersTrack.innerHTML = '';
                scrollIndicators.innerHTML = '';
                
                accountManagers.forEach((manager, index) => {
                    const managerCard = document.createElement('div');
                    managerCard.className = `vertical-manager-card ${manager.isPremium ? 'premium' : ''}`;
                    managerCard.dataset.id = manager.id;
                    managerCard.dataset.index = index;
                    
                    managerCard.innerHTML = `
                        <div class="availability ${manager.available ? 'available' : ''}"></div>
                        <img src="${manager.avatar}" alt="${manager.name}" class="vertical-manager-avatar">
                        <div class="vertical-manager-info">
                            <div class="vertical-manager-name">${manager.name}</div>
                            <div class="vertical-manager-title">${manager.title}</div>
                            <div class="vertical-manager-specialty">${manager.specialty}</div>
                            <div class="vertical-manager-stats">
                                <div class="vertical-stat">
                                    <div class="vertical-stat-value">${manager.clients}</div>
                                    <div class="vertical-stat-label">Clients</div>
                                </div>
                                <div class="vertical-stat">
                                    <div class="vertical-stat-value">${manager.experience}</div>
                                    <div class="vertical-stat-label">Years</div>
                                </div>
                                <div class="vertical-stat">
                                    <div class="vertical-stat-value">${manager.successRate}</div>
                                    <div class="vertical-stat-label">Success</div>
                                </div>
                            </div>
                        </div>
                        ${manager.isPremium ? '<div class="premium-badge"><i class="fas fa-crown"></i> Premium Manager</div>' : ''}
                    `;
                    
                    // Add click event to select manager
                    managerCard.addEventListener('click', () => {
                        if (manager.available) {
                            scrollToPosition(index);
                            if (manager.isPremium) {
                                displayManagerSelection(manager);
                            }
                        } else {
                            alert(`${manager.name} is currently unavailable. Please select an available manager.`);
                        }
                    });
                    
                    verticalManagersTrack.appendChild(managerCard);
                    
                    // Create scroll indicator
                    const indicator = document.createElement('div');
                    indicator.className = 'scroll-indicator';
                    indicator.dataset.index = index;
                    indicator.addEventListener('click', () => scrollToPosition(index));
                    scrollIndicators.appendChild(indicator);
                });
                
                // Set initial position to Michael Saylor
                scrollToPosition(michaelPosition);
            }
            
            // Scroll to specific position
            function scrollToPosition(position) {
                if (isScrolling) return;
                
                isScrolling = true;
                currentPosition = position;
                
                // Calculate scroll position
                const scrollY = position * cardHeight;
                verticalManagersTrack.style.transform = `translateY(-${scrollY}px)`;
                
                // Update active card and indicators
                updateActiveCard();
                
                // Enable scrolling after animation completes
                setTimeout(() => {
                    isScrolling = false;
                }, 600);
            }
            
            // Scroll up
            function scrollUp() {
                if (currentPosition > 0 && !isScrolling) {
                    scrollToPosition(currentPosition - 1);
                }
            }
            
            // Scroll down
            function scrollDown() {
                if (currentPosition < accountManagers.length - visibleCards && !isScrolling) {
                    scrollToPosition(currentPosition + 1);
                }
            }
            
            // Scroll to Michael Saylor (premium manager)
            function scrollToPremium() {
                scrollToPosition(michaelPosition);
                displayManagerSelection(accountManagers[michaelPosition]);
            }
            
            // Update active card and indicators
            function updateActiveCard() {
                // Remove active class from all cards
                document.querySelectorAll('.vertical-manager-card').forEach(card => {
                    card.classList.remove('active');
                });
                
                // Add active class to current card
                const currentCard = document.querySelector(`.vertical-manager-card[data-index="${currentPosition}"]`);
                if (currentCard) {
                    currentCard.classList.add('active');
                }
                
                // Update indicators
                document.querySelectorAll('.scroll-indicator').forEach((indicator, index) => {
                    if (index === currentPosition) {
                        indicator.classList.add('active');
                    } else {
                        indicator.classList.remove('active');
                    }
                });
            }
            
            // Display manager selection
            function displayManagerSelection(manager) {
                // Only show selection for premium manager
                if (!manager.isPremium) return;
                
                // Update selected manager display
                selectedAvatar.src = manager.avatar;
                selectedName.textContent = manager.name;
                selectedTitle.textContent = manager.title;
                selectedBio.textContent = manager.bio;
                statClients.textContent = manager.clients;
                statExperience.textContent = manager.experience;
                statSpecialty.textContent = manager.successRate;
                
                // Hide the bio by default
                selectedBio.classList.remove('show');
                
                // Show the selected manager section
                selectedManager.classList.add('show');
                
                // Scroll the selected manager section into view
                selectedManager.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
            
            // Contact button functionality
            function contactManager() {
                contactModal.classList.add('show');
                document.body.style.overflow = 'hidden'; // Prevent scrolling
            }
            
            // About button functionality
            function showAbout() {
                selectedBio.classList.toggle('show');
                
                if (selectedBio.classList.contains('show')) {
                    aboutBtn.innerHTML = '<i class="fas fa-times"></i> Close';
                } else {
                    aboutBtn.innerHTML = '<i class="fas fa-info-circle"></i> About';
                }
            }
            
            // Close contact modal
            function closeContactModal() {
                contactModal.classList.remove('show');
                document.body.style.overflow = ''; // Restore scrolling
            }
            
            // Open Microsoft Teams
            function openTeams() {
                // Try to open Microsoft Teams app
                window.open('msteams://', '_blank');
                
                // If app is not installed, redirect to app store after a short delay
                setTimeout(function() {
                    if (!document.hidden) {
                        // Redirect to Microsoft Teams download page
                        window.open('https://www.microsoft.com/en-us/microsoft-teams/download-app', '_blank');
                    }
                }, 500);
            }
            
            // Open Telegram
            function openTelegram() {
                // Try to open Telegram app with Michael Saylor representative
                window.open('tg://resolve?domain=michaelsaylor_rep', '_blank');
                
                // If app is not installed, redirect to app store after a short delay
                setTimeout(function() {
                    if (!document.hidden) {
                        // Redirect to Telegram download page
                        window.open('https://telegram.org/apps', '_blank');
                    }
                }, 500);
            }
            
            // Event Listeners
            scrollUpBtn.addEventListener('click', scrollUp);
            scrollDownBtn.addEventListener('click', scrollDown);
            selectPremiumBtn.addEventListener('click', scrollToPremium);
            contactBtn.addEventListener('click', contactManager);
            aboutBtn.addEventListener('click', showAbout);
            contactClose.addEventListener('click', closeContactModal);
            teamsLink.addEventListener('click', openTeams);
            telegramLink.addEventListener('click', openTelegram);
            
            // Close modal when clicking outside the content
            contactModal.addEventListener('click', function(e) {
                if (e.target === contactModal) {
                    closeContactModal();
                }
            });
            
            // Initialize
            initializeVerticalManagersTrack();
        });
    </script>
</body>

</html>
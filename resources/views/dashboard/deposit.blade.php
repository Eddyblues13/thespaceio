<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheSpace - Deposit Funds</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        }

        body {
            background-color: var(--dark-blue);
            color: var(--text-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            padding-top: 70px;
        }

        /* Compact Navbar Styles - Same as Dashboard */
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

        /* Deposit Options */
        .deposit-options {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 30px;
        }

        .deposit-option {
            flex: 1;
            min-width: 200px;
            background-color: var(--light-blue);
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            border: 2px solid transparent;
        }

        .deposit-option:hover {
            background-color: var(--accent-blue);
            transform: translateY(-3px);
        }

        .deposit-option.active {
            border-color: var(--success-green);
            background-color: var(--light-blue);
        }

        .deposit-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        .deposit-form {
            background-color: var(--primary-blue);
            border-radius: 10px;
            padding: 25px;
            border: 1px solid var(--border-color);
        }

        .form-label {
            color: #a8c6e5;
            margin-bottom: 8px;
        }

        .form-control,
        .form-select {
            background-color: var(--dark-blue);
            border: 1px solid var(--border-color);
            color: var(--text-color);
            padding: 10px 15px;
        }

        .form-control:focus,
        .form-select:focus {
            background-color: var(--dark-blue);
            border-color: var(--accent-blue);
            color: var(--text-color);
            box-shadow: 0 0 0 0.25rem rgba(0, 82, 163, 0.25);
        }

        .crypto-address {
            background-color: var(--dark-blue);
            border-radius: 8px;
            padding: 15px;
            margin-top: 15px;
            border: 1px solid var(--border-color);
        }

        .address-text {
            font-family: monospace;
            font-size: 0.9rem;
            word-break: break-all;
            margin-bottom: 10px;
        }

        .copy-btn {
            background-color: var(--accent-blue);
            color: white;
            border: none;
            padding: 5px 15px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .copy-btn:hover {
            background-color: #004080;
        }

        .qr-code {
            text-align: center;
            margin-top: 20px;
        }

        .qr-code img {
            max-width: 200px;
            border-radius: 8px;
        }

        .btn-deposit {
            background-color: var(--success-green);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 6px;
            font-weight: 600;
            width: 100%;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .btn-deposit:hover {
            background-color: #00a843;
        }

        .fee-info {
            background-color: var(--light-blue);
            border-radius: 8px;
            padding: 15px;
            margin-top: 20px;
            font-size: 0.9rem;
        }

        .processing-time {
            display: flex;
            align-items: center;
            margin-top: 10px;
            color: #a8c6e5;
        }

        .processing-time i {
            margin-right: 8px;
            color: var(--warning-orange);
        }

        /* Recent Deposits */
        .activity-item {
            display: flex;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid var(--border-color);
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            flex-shrink: 0;
        }

        .activity-crypto {
            background-color: rgba(247, 147, 26, 0.2);
            color: #f7931a;
        }

        .activity-bank {
            background-color: rgba(0, 82, 163, 0.2);
            color: var(--accent-blue);
        }

        .activity-wire {
            background-color: rgba(0, 200, 83, 0.2);
            color: var(--success-green);
        }

        .activity-cashapp {
            background-color: rgba(0, 207, 93, 0.2);
            color: #00cf5d;
        }

        .activity-details {
            flex-grow: 1;
        }

        .activity-amount {
            font-weight: 600;
        }

        .status-pending {
            color: var(--warning-orange);
        }

        .status-completed {
            color: var(--success-green);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .deposit-option {
                min-width: 150px;
            }

            .card-value {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 576px) {
            .main-content {
                padding: 15px 10px;
            }

            .dashboard-card {
                padding: 15px;
            }

            .deposit-options {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <!-- Compact Navigation Bar - Same as Dashboard -->
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
                        <a class="nav-link" href="{{route('dashboard')}}">
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

                    <!-- User Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
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
                                <a class="dropdown-item text-danger" href="{{route('dashboard')}}">
                                    <i class="fas fa-arrow-left me-2"></i>Back to Main Site
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid main-content">
        <!-- Account Summary -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="dashboard-card">
                    <div class="card-title">Cash Balance</div>
                    <div class="card-value">${{ number_format($user->cash_balance ?? 0, 2) }}</div>
                    <div class="card-change">Available to invest</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dashboard-card">
                    <div class="card-title">Pending Deposits</div>
                    <div class="card-value">${{
                        number_format($user->transactions()->deposits()->pending()->sum('amount') ?? 0, 2) }}</div>
                    <div class="card-change">{{ $user->transactions()->deposits()->pending()->count() }} transactions
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dashboard-card">
                    <div class="card-title">Last Deposit</div>
                    @php
                    $lastDeposit = $user->transactions()->deposits()->completed()->latest()->first();
                    @endphp
                    <div class="card-value">
                        @if($lastDeposit)
                        ${{ number_format($lastDeposit->amount, 2) }}
                        @else
                        $0.00
                        @endif
                    </div>
                    <div class="card-change positive">
                        @if($lastDeposit)
                        Completed {{ $lastDeposit->created_at->diffForHumans() }}
                        @else
                        No deposits yet
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Deposit Options and Form -->
        <div class="row">
            <!-- Deposit Form -->
            <div class="col-lg-8">
                <div class="dashboard-card">
                    <div class="card-title">Deposit Funds</div>

                    <!-- Deposit Method Selection -->
                    <div class="deposit-options mb-4">
                        <div class="deposit-option active" data-method="crypto">
                            <div class="deposit-icon">
                                <i class="fab fa-bitcoin"></i>
                            </div>
                            <div class="fw-bold">Cryptocurrency</div>
                            <small>BTC, ETH, USDT</small>
                        </div>
                        <div class="deposit-option" data-method="bank">
                            <div class="deposit-icon">
                                <i class="fas fa-university"></i>
                            </div>
                            <div class="fw-bold">Bank Transfer</div>
                            <small>ACH, SEPA</small>
                        </div>
                        <div class="deposit-option" data-method="wire">
                            <div class="deposit-icon">
                                <i class="fas fa-exchange-alt"></i>
                            </div>
                            <div class="fw-bold">Wire Transfer</div>
                            <small>Domestic & International</small>
                        </div>
                        <div class="deposit-option" data-method="cashapp">
                            <div class="deposit-icon">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <div class="fw-bold">Cash App</div>
                            <small>Instant Transfer</small>
                        </div>
                    </div>

                    <!-- Deposit Form -->
                    <form id="depositForm" action="{{ route('deposit.store') }}" method="POST">
                        @csrf
                        <!-- Crypto Deposit -->
                        <div id="crypto-form" class="deposit-form">
                            <div class="mb-3">
                                <label class="form-label">Select Cryptocurrency</label>
                                <select class="form-select" id="cryptoCurrency" name="crypto_type" required>
                                    <option value="bitcoin">Bitcoin (BTC)</option>
                                    <option value="ethereum">Ethereum (ETH)</option>
                                    <option value="usdt">Tether (USDT)</option>
                                    <option value="usdc">USD Coin (USDC)</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deposit Amount (USD)</label>
                                <input type="number" class="form-control" id="cryptoAmount" name="amount"
                                    placeholder="0.00" min="10" step="0.01" required>
                                <input type="hidden" name="method" value="crypto">
                                <input type="hidden" name="currency" value="USD">
                                <input type="hidden" name="wallet_address" id="walletAddress" value="">
                            </div>

                            <!-- Dynamic Crypto Address Display -->
                            <div id="crypto-address-container" style="display: none;">
                                <div class="crypto-address">
                                    <div class="fw-bold mb-2" id="crypto-address-title">Send <span
                                            id="crypto-name"></span> to this address:</div>
                                    <div class="address-text" id="generated-address-text"></div>
                                    <button type="button" class="copy-btn" id="copy-address-btn">
                                        <i class="fas fa-copy me-1"></i> Copy Address
                                    </button>

                                    <div class="qr-code" id="qr-code-container">
                                        <div class="fw-bold mb-2">Or scan this QR code:</div>
                                        <img id="qr-code-image" src="" alt="QR Code">
                                    </div>
                                </div>

                                <div class="fee-info mt-3">
                                    <div class="fw-bold">Deposit Information:</div>
                                    <ul class="mt-2 mb-0">
                                        <li>Amount: $<span id="deposit-amount"></span></li>
                                        <li>Cryptocurrency: <span id="deposit-crypto"></span></li>
                                        <li>Address: <span id="display-address"></span></li>
                                        <li>Status: <span class="text-warning">Pending</span></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="fee-info">
                                <div class="fw-bold">Important Information:</div>
                                <ul class="mt-2 mb-0">
                                    <li>Minimum deposit: $10</li>
                                    <li>Network fees may apply</li>
                                    <li>Funds will be credited after 3 network confirmations</li>
                                    <li>Only send the selected cryptocurrency to this address</li>
                                    <li>Address expires in 30 minutes</li>
                                </ul>
                            </div>

                            <div class="processing-time">
                                <i class="fas fa-clock"></i>
                                <span>Processing time: 10-30 minutes</span>
                            </div>

                            <button type="button" class="btn-deposit" id="cryptoGenerate">Generate Deposit
                                Address</button>
                            <button type="submit" class="btn-deposit" id="cryptoSubmit" style="display: none;">Confirm
                                Deposit</button>
                        </div>

                        <!-- Bank Transfer -->
                        <div id="bank-form" class="deposit-form" style="display: none;">
                            <div class="mb-3">
                                <label class="form-label">Linked Bank Account</label>
                                <select class="form-select" name="bank_account" required>
                                    <option value="chase">Chase Bank •••• 4512</option>
                                    <option value="boa">Bank of America •••• 7834</option>
                                    <option value="wells">Wells Fargo •••• 2398</option>
                                    <option value="new">Link New Bank Account</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deposit Amount (USD)</label>
                                <input type="number" class="form-control" name="amount" placeholder="0.00" min="10"
                                    step="0.01" required>
                                <input type="hidden" name="method" value="bank">
                                <input type="hidden" name="currency" value="USD">
                            </div>

                            <!-- Dynamic Bank Instructions -->
                            <div id="bank-instructions">
                                <div class="fw-bold mb-2">Bank Transfer Instructions:</div>
                                <div class="bg-dark p-3 rounded mb-3" id="bank-details">
                                    <!-- Will be populated by JavaScript -->
                                </div>
                            </div>

                            <div class="fee-info">
                                <div class="fw-bold">Important Information:</div>
                                <ul class="mt-2 mb-0" id="bank-info">
                                    <!-- Will be populated by JavaScript -->
                                </ul>
                            </div>

                            <div class="processing-time">
                                <i class="fas fa-clock"></i>
                                <span id="bank-processing-time">Processing time: 1-3 business days</span>
                            </div>

                            <button type="submit" class="btn-deposit">Initiate Bank Transfer</button>
                        </div>

                        <!-- Wire Transfer -->
                        <div id="wire-form" class="deposit-form" style="display: none;">
                            <div class="mb-3">
                                <label class="form-label">Account Type</label>
                                <select class="form-select" name="wire_type" required>
                                    <option value="domestic">Domestic Wire Transfer</option>
                                    <option value="international">International Wire Transfer</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deposit Amount (USD)</label>
                                <input type="number" class="form-control" name="amount" placeholder="0.00" min="100"
                                    step="0.01" required>
                                <input type="hidden" name="method" value="wire">
                                <input type="hidden" name="currency" value="USD">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Reference/Notes</label>
                                <input type="text" class="form-control" name="reference"
                                    placeholder="Your name or account ID" required>
                            </div>

                            <!-- Dynamic Wire Instructions -->
                            <div id="wire-instructions">
                                <div class="fw-bold mb-2">Wire Transfer Instructions:</div>
                                <div class="bg-dark p-3 rounded mb-3" id="wire-details">
                                    <!-- Will be populated by JavaScript -->
                                </div>
                            </div>

                            <div class="fee-info">
                                <div class="fw-bold">Important Information:</div>
                                <ul class="mt-2 mb-0" id="wire-info">
                                    <!-- Will be populated by JavaScript -->
                                </ul>
                            </div>

                            <div class="processing-time">
                                <i class="fas fa-clock"></i>
                                <span id="wire-processing-time">Processing time: 1 business day</span>
                            </div>

                            <button type="submit" class="btn-deposit">Confirm Wire Transfer</button>
                        </div>

                        <!-- Cash App -->
                        <div id="cashapp-form" class="deposit-form" style="display: none;">
                            <div class="mb-3">
                                <label class="form-label">Cash App Username</label>
                                <input type="text" class="form-control" name="cashapp_username"
                                    placeholder="Your Cash App $username" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deposit Amount (USD)</label>
                                <input type="number" class="form-control" name="amount" placeholder="0.00" min="10"
                                    step="0.01" required>
                                <input type="hidden" name="method" value="cashapp">
                                <input type="hidden" name="currency" value="USD">
                            </div>

                            <!-- Dynamic CashApp Instructions -->
                            <div id="cashapp-instructions">
                                <div class="mb-3">
                                    <label class="form-label">Tenex Cash Tag</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="text" class="form-control" id="cashtag-display" value="TenexInvest"
                                            readonly>
                                        <button type="button" class="btn btn-outline-secondary copy-btn"
                                            data-address="TenexInvest">
                                            <i class="fas fa-copy"></i>
                                        </button>
                                    </div>
                                    <div class="form-text">Send funds to this Cash Tag from your Cash App</div>
                                </div>
                            </div>

                            <div class="fee-info">
                                <div class="fw-bold">Important Information:</div>
                                <ul class="mt-2 mb-0" id="cashapp-info">
                                    <!-- Will be populated by JavaScript -->
                                </ul>
                            </div>

                            <div class="processing-time">
                                <i class="fas fa-clock"></i>
                                <span id="cashapp-processing-time">Processing time: Instant</span>
                            </div>

                            <button type="submit" class="btn-deposit">Initiate Cash App Transfer</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Recent Deposits -->
            <div class="col-lg-4">
                <div class="dashboard-card">
                    <div class="card-title">Recent Deposits</div>
                    <div class="activity-list">
                        @forelse($recentDeposits as $deposit)
                        <div class="activity-item">
                            <div class="activity-icon activity-{{ $deposit->method }}">
                                @if($deposit->method == 'crypto')
                                <i class="fab fa-bitcoin"></i>
                                @elseif($deposit->method == 'bank')
                                <i class="fas fa-university"></i>
                                @elseif($deposit->method == 'wire')
                                <i class="fas fa-exchange-alt"></i>
                                @else
                                <i class="fas fa-mobile-alt"></i>
                                @endif
                            </div>
                            <div class="activity-details">
                                <div class="fw-bold">{{ $deposit->title }}</div>
                                <small>{{ ucfirst($deposit->method) }} • {{
                                    $deposit->created_at->diffForHumans() }}</small>
                            </div>
                            <div class="activity-amount status-{{ $deposit->status }}">+${{
                                number_format($deposit->amount, 2) }}</div>
                        </div>
                        @empty
                        <div class="text-center py-3">
                            <p class="text-muted">No recent deposits</p>
                        </div>
                        @endforelse
                    </div>
                </div>

                <!-- Help Card -->
                <div class="dashboard-card">
                    <div class="card-title">Need Help?</div>
                    <p>If you have any questions about depositing funds, please contact our support team.</p>
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-primary">
                            <i class="fas fa-question-circle me-2"></i> Support Center
                        </button>
                        <button class="btn btn-outline-primary">
                            <i class="fas fa-envelope me-2"></i> Contact Support
                        </button>
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
                if (linkHref === currentPage || (currentPage === '' && linkHref === 'href="{{route('dashboard')}}"')) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });

            // Deposit method selection
            const depositOptions = document.querySelectorAll('.deposit-option');
            const depositForms = {
                crypto: document.getElementById('crypto-form'),
                bank: document.getElementById('bank-form'),
                wire: document.getElementById('wire-form'),
                cashapp: document.getElementById('cashapp-form')
            };

            // Crypto elements
            const cryptoGenerate = document.getElementById('cryptoGenerate');
            const cryptoSubmit = document.getElementById('cryptoSubmit');
            const cryptoAddressContainer = document.getElementById('crypto-address-container');
            const walletAddressInput = document.getElementById('walletAddress');

            // Handle cryptocurrency selection change
            document.getElementById('cryptoCurrency').addEventListener('change', function() {
                resetCryptoForm();
            });

            function resetCryptoForm() {
                // Reset crypto form state
                cryptoAddressContainer.style.display = 'none';
                cryptoGenerate.style.display = 'block';
                cryptoSubmit.style.display = 'none';
                walletAddressInput.value = '';
            }
            
            // Handle deposit method selection
            depositOptions.forEach(option => {
                option.addEventListener('click', function() {
                    const method = this.getAttribute('data-method');
                    
                    // Update active state
                    depositOptions.forEach(opt => opt.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Show corresponding form
                    Object.values(depositForms).forEach(form => {
                        form.style.display = 'none';
                    });
                    
                    if (depositForms[method]) {
                        depositForms[method].style.display = 'block';
                        
                        // Load payment details from backend
                        loadPaymentDetails(method);
                    }
                    
                    // Update hidden method field for all forms
                    document.querySelectorAll('input[name="method"]').forEach(input => {
                        input.value = method;
                    });

                    // Reset crypto form if switching methods
                    if (method !== 'crypto') {
                        resetCryptoForm();
                    }
                });
            });
            
            // Copy address functionality
            const copyButtons = document.querySelectorAll('.copy-btn');
            copyButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const address = this.getAttribute('data-address') || document.getElementById('generated-address-text').textContent;
                    navigator.clipboard.writeText(address).then(() => {
                        // Change button text temporarily
                        const originalText = this.innerHTML;
                        this.innerHTML = '<i class="fas fa-check me-1"></i> Copied!';
                        setTimeout(() => {
                            this.innerHTML = originalText;
                        }, 2000);
                    });
                });
            });
            
            // Handle crypto deposit address generation
            cryptoGenerate.addEventListener('click', function() {
                const amount = document.getElementById('cryptoAmount').value;
                const currency = document.getElementById('cryptoCurrency').value;
                
                if (!amount || amount < 10) {
                    alert('Please enter a valid amount (minimum $10)');
                    return;
                }

                // Show loading state
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Generating...';
                this.disabled = true;
                
                // Generate crypto address via AJAX - FIXED ROUTE
                fetch('{{ route("deposit.generate.address") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        crypto_type: currency,
                        amount: amount
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update UI with generated address
                        document.getElementById('crypto-name').textContent = data.crypto_name;
                        document.getElementById('generated-address-text').textContent = data.address;
                        document.getElementById('qr-code-image').src = data.qr_code;
                        document.getElementById('deposit-amount').textContent = amount;
                        document.getElementById('deposit-crypto').textContent = data.crypto_name;
                        document.getElementById('display-address').textContent = data.address.substring(0, 20) + '...';
                        
                        // Set wallet address in hidden field
                        walletAddressInput.value = data.address;
                        
                        // Show address container
                        cryptoAddressContainer.style.display = 'block';
                        
                        // Show submit button, hide generate button
                        cryptoGenerate.style.display = 'none';
                        cryptoSubmit.style.display = 'block';
                    } else {
                        alert('Error generating deposit address: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error generating deposit address. Please try again.');
                })
                .finally(() => {
                    // Reset button state
                    this.innerHTML = originalText;
                    this.disabled = false;
                });
            });
            
            // Load payment details for each method
            function loadPaymentDetails(method) {
                // This would typically make an AJAX call to get dynamic payment details
                // For now, we'll use static data
                
                const paymentDetails = {
                    bank: {
                        details: `
                            <div class="mb-2"><strong>Bank Name:</strong> Silicon Valley Bank</div>
                            <div class="mb-2"><strong>Account Name:</strong> TheSpace Investments LLC</div>
                            <div class="mb-2"><strong>Account Number:</strong> 3301234567</div>
                            <div class="mb-2"><strong>Routing Number:</strong> 121140399</div>
                            <div class="mb-2"><strong>Reference:</strong> Your Account ID: {{ Auth::id() }}</div>
                        `,
                        info: `
                            <li>Minimum deposit: $10</li>
                            <li>No fees for ACH transfers</li>
                            <li>Processing time: 1-3 business days</li>
                            <li>Make sure to include your account ID as reference</li>
                        `
                    },
                    wire: {
                        details: `
                            <div class="mb-2"><strong>Bank Name:</strong> Silicon Valley Bank</div>
                            <div class="mb-2"><strong>Account Name:</strong> TheSpace Investments LLC</div>
                            <div class="mb-2"><strong>Account Number:</strong> 3301234567</div>
                            <div class="mb-2"><strong>Routing Number:</strong> 121140399 (Domestic)</div>
                            <div class="mb-2"><strong>SWIFT/BIC:</strong> SVBKUS6S (International)</div>
                            <div class="mb-2"><strong>Bank Address:</strong> 3000 Tasman Drive, Santa Clara, CA 95054</div>
                            <div class="mb-2"><strong>Reference:</strong> Your Account ID: {{ Auth::id() }}</div>
                        `,
                        info: `
                            <li>Minimum deposit: $100</li>
                            <li>Domestic wire fee: $15</li>
                            <li>International wire fee: $25</li>
                            <li>Processing time: 1 business day</li>
                            <li>Include your account ID in the reference field</li>
                        `
                    },
                    cashapp: {
                        info: `
                            <li>Minimum deposit: $10</li>
                            <li>No fees for Cash App transfers</li>
                            <li>Processing time: Instant</li>
                            <li>Send funds to $TenexInvest from your Cash App</li>
                            <li>Include your username in the notes</li>
                        `
                    }
                };
                
                if (paymentDetails[method]) {
                    if (paymentDetails[method].details) {
                        const detailsElement = document.getElementById(method + '-details');
                        if (detailsElement) {
                            detailsElement.innerHTML = paymentDetails[method].details;
                        }
                    }
                    
                    if (paymentDetails[method].info) {
                        const infoElement = document.getElementById(method + '-info');
                        if (infoElement) {
                            infoElement.innerHTML = paymentDetails[method].info;
                        }
                    }
                }
            }
            
            // Initialize with crypto form
            loadPaymentDetails('crypto');
        });
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenex - Withdraw Funds</title>
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
        }

        /* Sidebar */
        .sidebar {
            background-color: var(--primary-blue);
            min-height: 100vh;
            padding: 0;
            border-right: 1px solid var(--border-color);
            transition: all 0.3s;
        }

        .sidebar .navbar-brand {
            color: white;
            font-weight: bold;
            padding: 20px 15px;
            border-bottom: 1px solid var(--border-color);
            text-align: center;
        }

        .sidebar .nav-link {
            color: #a8c6e5;
            padding: 12px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.3s;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: var(--light-blue);
            color: white;
        }

        .sidebar .nav-link i {
            width: 25px;
            text-align: center;
            margin-right: 10px;
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

        /* Withdrawal Options */
        .withdrawal-options {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 30px;
        }

        .withdrawal-option {
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

        .withdrawal-option:hover {
            background-color: var(--accent-blue);
            transform: translateY(-3px);
        }

        .withdrawal-option.active {
            border-color: var(--success-green);
            background-color: var(--light-blue);
        }

        .withdrawal-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        .withdrawal-form {
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

        .btn-withdraw {
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

        .btn-withdraw:hover {
            background-color: #00a843;
        }

        .btn-withdraw:disabled {
            background-color: #6c757d;
            cursor: not-allowed;
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

        /* Recent Withdrawals */
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

        .status-failed {
            color: var(--danger-red);
        }

        /* Security Verification */
        .security-verification {
            background-color: var(--light-blue);
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
            border-left: 4px solid var(--warning-orange);
        }

        .verification-step {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .verification-step:last-child {
            margin-bottom: 0;
        }

        .step-number {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: var(--accent-blue);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            flex-shrink: 0;
        }

        .step-complete {
            background-color: var(--success-green);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .sidebar {
                min-height: auto;
                width: 100%;
            }

            .withdrawal-option {
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

            .top-bar {
                padding: 10px 15px;
            }

            .dashboard-card {
                padding: 15px;
            }

            .withdrawal-options {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar">
                <div class="d-flex flex-column">
                    <a class="navbar-brand" href="/">
                        <i class="fas fa-robot me-2"></i>Tenex
                    </a>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="portfolio">
                                <i class="fas fa-chart-line"></i> Portfolio
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="investment">
                                <i class="fas fa-wallet"></i> Investments
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="transactions">
                                <i class="fas fa-exchange-alt"></i> Transactions
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="deposit">
                                <i class="fas fa-plus-circle"></i> Deposit Funds
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="withdrawal">
                                <i class="fas fa-minus-circle"></i> Withdraw Funds
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="insurance">
                                <i class="fas fa-file-invoice-dollar"></i> Insurance
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="settings">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                        </li>
                        <li class="nav-item mt-4">
                            <a class="nav-link" href="/">
                                <i class="fas fa-arrow-left"></i> Back to Main Site
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 main-content">
                <!-- Top Bar -->
                <div class="top-bar d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Withdraw Funds</h4>
                    <div class="user-info">
                        <div class="user-avatar">JD</div>
                        <div>
                            <div class="fw-bold">John Doe</div>
                            <small class="text-muted">Tier 2 Investor</small>
                        </div>
                    </div>
                </div>

                <!-- Account Summary -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="dashboard-card">
                            <div class="card-title">Available Balance</div>
                            <div class="card-value">$12,450</div>
                            <div class="card-change">Ready to withdraw</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="dashboard-card">
                            <div class="card-title">Pending Withdrawals</div>
                            <div class="card-value">$2,500</div>
                            <div class="card-change">2 transactions</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="dashboard-card">
                            <div class="card-title">Last Withdrawal</div>
                            <div class="card-value">$3,000</div>
                            <div class="card-change positive">Completed 3 days ago</div>
                        </div>
                    </div>
                </div>

                <!-- Withdrawal Options and Form -->
                <div class="row">
                    <!-- Withdrawal Form -->
                    <div class="col-lg-8">
                        <div class="dashboard-card">
                            <div class="card-title">Withdraw Funds</div>

                            <!-- Withdrawal Method Selection -->
                            <div class="withdrawal-options mb-4">
                                <div class="withdrawal-option active" data-method="crypto">
                                    <div class="withdrawal-icon">
                                        <i class="fab fa-bitcoin"></i>
                                    </div>
                                    <div class="fw-bold">Cryptocurrency</div>
                                    <small>BTC, ETH, USDT</small>
                                </div>
                                <div class="withdrawal-option" data-method="bank">
                                    <div class="withdrawal-icon">
                                        <i class="fas fa-university"></i>
                                    </div>
                                    <div class="fw-bold">Bank Transfer</div>
                                    <small>ACH, SEPA</small>
                                </div>
                                <div class="withdrawal-option" data-method="wire">
                                    <div class="withdrawal-icon">
                                        <i class="fas fa-exchange-alt"></i>
                                    </div>
                                    <div class="fw-bold">Wire Transfer</div>
                                    <small>Domestic & International</small>
                                </div>
                                <div class="withdrawal-option" data-method="cashapp">
                                    <div class="withdrawal-icon">
                                        <i class="fas fa-mobile-alt"></i>
                                    </div>
                                    <div class="fw-bold">Cash App</div>
                                    <small>Instant Transfer</small>
                                </div>
                            </div>

                            <!-- Withdrawal Form -->
                            <form id="withdrawalForm">
                                <!-- Crypto Withdrawal -->
                                <div id="crypto-form" class="withdrawal-form">
                                    <div class="mb-3">
                                        <label class="form-label">Select Cryptocurrency</label>
                                        <select class="form-select" id="cryptoCurrency">
                                            <option value="bitcoin">Bitcoin (BTC)</option>
                                            <option value="ethereum">Ethereum (ETH)</option>
                                            <option value="usdt">Tether (USDT)</option>
                                            <option value="usdc">USD Coin (USDC)</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Withdrawal Amount (USD)</label>
                                        <input type="number" class="form-control" id="cryptoAmount" placeholder="0.00"
                                            min="50" step="0.01" max="12450">
                                        <div class="form-text">Minimum withdrawal: $50</div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Recipient Wallet Address</label>
                                        <input type="text" class="form-control" id="walletAddress"
                                            placeholder="Enter your wallet address">
                                        <div class="form-text">Make sure this address supports the selected
                                            cryptocurrency</div>
                                    </div>

                                    <div class="fee-info">
                                        <div class="fw-bold">Important Information:</div>
                                        <ul class="mt-2 mb-0">
                                            <li>Minimum withdrawal: $50</li>
                                            <li>Network fees will be deducted from the withdrawal amount</li>
                                            <li>Withdrawals typically process within 2-4 hours</li>
                                            <li>Double-check the wallet address before submitting</li>
                                        </ul>
                                    </div>

                                    <div class="processing-time">
                                        <i class="fas fa-clock"></i>
                                        <span>Processing time: 2-4 hours</span>
                                    </div>

                                    <button type="button" class="btn-withdraw" id="cryptoSubmit">Request
                                        Withdrawal</button>
                                </div>

                                <!-- Bank Transfer -->
                                <div id="bank-form" class="withdrawal-form" style="display: none;">
                                    <div class="mb-3">
                                        <label class="form-label">Linked Bank Account</label>
                                        <select class="form-select">
                                            <option value="chase">Chase Bank •••• 4512</option>
                                            <option value="boa">Bank of America •••• 7834</option>
                                            <option value="wells">Wells Fargo •••• 2398</option>
                                            <option value="new">Add New Bank Account</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Withdrawal Amount (USD)</label>
                                        <input type="number" class="form-control" placeholder="0.00" min="25"
                                            step="0.01" max="12450">
                                        <div class="form-text">Minimum withdrawal: $25</div>
                                    </div>

                                    <div class="fee-info">
                                        <div class="fw-bold">Important Information:</div>
                                        <ul class="mt-2 mb-0">
                                            <li>Minimum withdrawal: $25</li>
                                            <li>No fees for standard ACH transfers</li>
                                            <li>Funds may take 1-3 business days to arrive</li>
                                            <li>Withdrawals are processed on business days only</li>
                                        </ul>
                                    </div>

                                    <div class="processing-time">
                                        <i class="fas fa-clock"></i>
                                        <span>Processing time: 1-3 business days</span>
                                    </div>

                                    <button type="submit" class="btn-withdraw">Request Withdrawal</button>
                                </div>

                                <!-- Wire Transfer -->
                                <div id="wire-form" class="withdrawal-form" style="display: none;">
                                    <div class="mb-3">
                                        <label class="form-label">Account Type</label>
                                        <select class="form-select">
                                            <option value="domestic">Domestic Wire Transfer</option>
                                            <option value="international">International Wire Transfer</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Withdrawal Amount (USD)</label>
                                        <input type="number" class="form-control" placeholder="0.00" min="100"
                                            step="0.01" max="12450">
                                        <div class="form-text">Minimum withdrawal: $100</div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Bank Account Details</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control mb-2"
                                                    placeholder="Account Holder Name">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control mb-2"
                                                    placeholder="Account Number">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control mb-2"
                                                    placeholder="Routing Number">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control mb-2" placeholder="Bank Name">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="fee-info">
                                        <div class="fw-bold">Important Information:</div>
                                        <ul class="mt-2 mb-0">
                                            <li>Minimum withdrawal: $100</li>
                                            <li>Domestic wire fee: $15 (deducted from withdrawal)</li>
                                            <li>International wire fee: $25 (deducted from withdrawal)</li>
                                            <li>Funds are typically available within 1 business day</li>
                                        </ul>
                                    </div>

                                    <div class="processing-time">
                                        <i class="fas fa-clock"></i>
                                        <span>Processing time: 1 business day</span>
                                    </div>

                                    <button type="submit" class="btn-withdraw">Request Withdrawal</button>
                                </div>

                                <!-- Cash App -->
                                <div id="cashapp-form" class="withdrawal-form" style="display: none;">
                                    <div class="mb-3">
                                        <label class="form-label">Cash App Username</label>
                                        <input type="text" class="form-control" placeholder="Your Cash App $username"
                                            value="$johndoe123">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Withdrawal Amount (USD)</label>
                                        <input type="number" class="form-control" placeholder="0.00" min="10"
                                            step="0.01" max="12450">
                                        <div class="form-text">Minimum withdrawal: $10</div>
                                    </div>

                                    <div class="fee-info">
                                        <div class="fw-bold">Important Information:</div>
                                        <ul class="mt-2 mb-0">
                                            <li>Minimum withdrawal: $10</li>
                                            <li>No fees for standard transfers</li>
                                            <li>Funds are typically available instantly</li>
                                            <li>Make sure your Cash App account is verified</li>
                                        </ul>
                                    </div>

                                    <div class="processing-time">
                                        <i class="fas fa-clock"></i>
                                        <span>Processing time: Instant</span>
                                    </div>

                                    <button type="submit" class="btn-withdraw">Request Withdrawal</button>
                                </div>
                            </form>

                            <!-- Security Verification -->
                            <div class="security-verification">
                                <h6><i class="fas fa-shield-alt me-2"></i>Security Verification Required</h6>
                                <p class="mb-3">To complete your withdrawal, please verify your identity:</p>

                                <div class="verification-step">
                                    <div class="step-number">1</div>
                                    <div>
                                        <div class="fw-bold">Email Verification</div>
                                        <small>We've sent a code to joh***@email.com</small>
                                        <div class="mt-2">
                                            <input type="text" class="form-control"
                                                placeholder="Enter verification code" style="max-width: 200px;">
                                            <button class="btn btn-sm btn-outline-primary mt-1">Resend Code</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="verification-step">
                                    <div class="step-number">2</div>
                                    <div>
                                        <div class="fw-bold">Two-Factor Authentication</div>
                                        <small>Enter the code from your authenticator app</small>
                                        <div class="mt-2">
                                            <input type="text" class="form-control" placeholder="6-digit code"
                                                style="max-width: 200px;">
                                        </div>
                                    </div>
                                </div>

                                <div class="verification-step">
                                    <div class="step-number">3</div>
                                    <div>
                                        <div class="fw-bold">Withdrawal Confirmation</div>
                                        <small>Review and confirm your withdrawal details</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Withdrawals -->
                    <div class="col-lg-4">
                        <div class="dashboard-card">
                            <div class="card-title">Recent Withdrawals</div>
                            <div class="activity-list">
                                <div class="activity-item">
                                    <div class="activity-icon activity-bank">
                                        <i class="fas fa-university"></i>
                                    </div>
                                    <div class="activity-details">
                                        <div class="fw-bold">Bank Transfer</div>
                                        <small>Chase Bank • 2 days ago</small>
                                    </div>
                                    <div class="activity-amount">-$3,000</div>
                                    <div class="status-completed"><i class="fas fa-check-circle"></i></div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon activity-crypto">
                                        <i class="fab fa-bitcoin"></i>
                                    </div>
                                    <div class="activity-details">
                                        <div class="fw-bold">Bitcoin Withdrawal</div>
                                        <small>0.05 BTC • 5 days ago</small>
                                    </div>
                                    <div class="activity-amount">-$2,500</div>
                                    <div class="status-completed"><i class="fas fa-check-circle"></i></div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon activity-cashapp">
                                        <i class="fas fa-mobile-alt"></i>
                                    </div>
                                    <div class="activity-details">
                                        <div class="fw-bold">Cash App</div>
                                        <small>Instant Transfer • 1 week ago</small>
                                    </div>
                                    <div class="activity-amount">-$500</div>
                                    <div class="status-completed"><i class="fas fa-check-circle"></i></div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon activity-wire">
                                        <i class="fas fa-exchange-alt"></i>
                                    </div>
                                    <div class="activity-details">
                                        <div class="fw-bold">Wire Transfer</div>
                                        <small>International • 2 weeks ago</small>
                                    </div>
                                    <div class="activity-amount">-$5,000</div>
                                    <div class="status-completed"><i class="fas fa-check-circle"></i></div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon activity-bank">
                                        <i class="fas fa-university"></i>
                                    </div>
                                    <div class="activity-details">
                                        <div class="fw-bold">Bank Transfer</div>
                                        <small>Bank of America • 3 weeks ago</small>
                                    </div>
                                    <div class="activity-amount">-$1,500</div>
                                    <div class="status-completed"><i class="fas fa-check-circle"></i></div>
                                </div>
                            </div>
                        </div>

                        <!-- Limits Card -->
                        <div class="dashboard-card">
                            <div class="card-title">Withdrawal Limits</div>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between">
                                    <span>Daily Limit</span>
                                    <span class="fw-bold">$10,000</span>
                                </div>
                                <div class="progress mt-1" style="height: 6px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small class="text-muted">$2,500 used today</small>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between">
                                    <span>Monthly Limit</span>
                                    <span class="fw-bold">$50,000</span>
                                </div>
                                <div class="progress mt-1" style="height: 6px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 60%"
                                        aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small class="text-muted">$30,000 used this month</small>
                            </div>
                            <div>
                                <div class="d-flex justify-content-between">
                                    <span>Single Transaction</span>
                                    <span class="fw-bold">$25,000</span>
                                </div>
                            </div>
                        </div>

                        <!-- Help Card -->
                        <div class="dashboard-card">
                            <div class="card-title">Need Help?</div>
                            <p>If you have any questions about withdrawing funds, please contact our support team.</p>
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
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Withdrawal method selection
            const withdrawalOptions = document.querySelectorAll('.withdrawal-option');
            const withdrawalForms = {
                crypto: document.getElementById('crypto-form'),
                bank: document.getElementById('bank-form'),
                wire: document.getElementById('wire-form'),
                cashapp: document.getElementById('cashapp-form')
            };
            
            // Handle withdrawal method selection
            withdrawalOptions.forEach(option => {
                option.addEventListener('click', function() {
                    const method = this.getAttribute('data-method');
                    
                    // Update active state
                    withdrawalOptions.forEach(opt => opt.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Show corresponding form
                    Object.values(withdrawalForms).forEach(form => {
                        form.style.display = 'none';
                    });
                    
                    if (withdrawalForms[method]) {
                        withdrawalForms[method].style.display = 'block';
                    }
                });
            });
            
            // Handle crypto withdrawal submission
            const cryptoSubmit = document.getElementById('cryptoSubmit');
            cryptoSubmit.addEventListener('click', function() {
                const amount = document.getElementById('cryptoAmount').value;
                const walletAddress = document.getElementById('walletAddress').value;
                
                if (!amount || amount < 50) {
                    alert('Please enter a valid amount (minimum $50)');
                    return;
                }
                
                if (!walletAddress) {
                    alert('Please enter a valid wallet address');
                    return;
                }
                
                // In a real application, this would submit the withdrawal request
                // For demo purposes, we'll just show a success message
                const currency = document.getElementById('cryptoCurrency').value;
                alert(`Withdrawal request submitted for $${amount} in ${currency.toUpperCase()} to address: ${walletAddress}. Your withdrawal is being processed.`);
                
                // Reset form
                document.getElementById('cryptoAmount').value = '';
                document.getElementById('walletAddress').value = '';
            });
            
            // Form submission handlers
            const withdrawalForm = document.getElementById('withdrawalForm');
            withdrawalForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Get active method
                const activeMethod = document.querySelector('.withdrawal-option.active').getAttribute('data-method');
                const amountInput = withdrawalForms[activeMethod].querySelector('input[type="number"]');
                const amount = amountInput ? amountInput.value : null;
                
                if (!amount) {
                    alert('Please enter a withdrawal amount');
                    return;
                }
                
                // In a real application, this would submit the form to the server
                // For demo purposes, we'll just show a success message
                alert(`Your ${activeMethod} withdrawal of $${amount} has been requested! You will receive a confirmation email shortly.`);
                
                // Reset form
                withdrawalForm.reset();
            });
            
            // Amount validation
            const amountInputs = document.querySelectorAll('input[type="number"]');
            amountInputs.forEach(input => {
                input.addEventListener('input', function() {
                    const maxAmount = 12450; // Available balance
                    if (parseFloat(this.value) > maxAmount) {
                        this.value = maxAmount;
                        alert(`Withdrawal amount cannot exceed your available balance of $${maxAmount}`);
                    }
                });
            });
        });
    </script>
</body>

</html>
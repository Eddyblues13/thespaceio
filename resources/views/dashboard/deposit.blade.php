<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenex - Deposit Funds</title>
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
            display: none;
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
            display: none;
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
            .sidebar {
                min-height: auto;
                width: 100%;
            }

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

            .top-bar {
                padding: 10px 15px;
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
                    <h4 class="mb-0">Deposit Funds</h4>
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
                            <div class="card-title">Cash Balance</div>
                            <div class="card-value">$12,450</div>
                            <div class="card-change">Available to invest</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="dashboard-card">
                            <div class="card-title">Pending Deposits</div>
                            <div class="card-value">$2,500</div>
                            <div class="card-change">2 transactions</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="dashboard-card">
                            <div class="card-title">Last Deposit</div>
                            <div class="card-value">$5,000</div>
                            <div class="card-change positive">Completed 2 days ago</div>
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
                            <form id="depositForm">
                                <!-- Crypto Deposit -->
                                <div id="crypto-form" class="deposit-form">
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
                                        <label class="form-label">Deposit Amount (USD)</label>
                                        <input type="number" class="form-control" id="cryptoAmount" placeholder="0.00"
                                            min="10" step="0.01">
                                    </div>

                                    <div class="crypto-address" id="btc-address">
                                        <div class="fw-bold mb-2">Send Bitcoin to this address:</div>
                                        <div class="address-text">bc1qxy2kgdygjrsqtzq2n0yrf2493p83kkfjhx0wlh</div>
                                        <button type="button" class="copy-btn"
                                            data-address="bc1qxy2kgdygjrsqtzq2n0yrf2493p83kkfjhx0wlh">
                                            <i class="fas fa-copy me-1"></i> Copy Address
                                        </button>

                                        <div class="qr-code">
                                            <div class="fw-bold mb-2">Or scan this QR code:</div>
                                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=bc1qxy2kgdygjrsqtzq2n0yrf2493p83kkfjhx0wlh"
                                                alt="Bitcoin QR Code">
                                        </div>
                                    </div>

                                    <div class="crypto-address" id="eth-address">
                                        <div class="fw-bold mb-2">Send Ethereum to this address:</div>
                                        <div class="address-text">0x71C7656EC7ab88b098defB751B7401B5f6d8976F</div>
                                        <button type="button" class="copy-btn"
                                            data-address="0x71C7656EC7ab88b098defB751B7401B5f6d8976F">
                                            <i class="fas fa-copy me-1"></i> Copy Address
                                        </button>

                                        <div class="qr-code">
                                            <div class="fw-bold mb-2">Or scan this QR code:</div>
                                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=0x71C7656EC7ab88b098defB751B7401B5f6d8976F"
                                                alt="Ethereum QR Code">
                                        </div>
                                    </div>

                                    <div class="fee-info">
                                        <div class="fw-bold">Important Information:</div>
                                        <ul class="mt-2 mb-0">
                                            <li>Minimum deposit: $10</li>
                                            <li>Network fees may apply</li>
                                            <li>Funds will be credited after 3 network confirmations</li>
                                            <li>Only send the selected cryptocurrency to this address</li>
                                        </ul>
                                    </div>

                                    <div class="processing-time">
                                        <i class="fas fa-clock"></i>
                                        <span>Processing time: 10-30 minutes</span>
                                    </div>

                                    <button type="button" class="btn-deposit" id="cryptoSubmit">Generate Deposit
                                        Address</button>
                                </div>

                                <!-- Bank Transfer -->
                                <div id="bank-form" class="deposit-form" style="display: none;">
                                    <div class="mb-3">
                                        <label class="form-label">Linked Bank Account</label>
                                        <select class="form-select">
                                            <option value="chase">Chase Bank •••• 4512</option>
                                            <option value="boa">Bank of America •••• 7834</option>
                                            <option value="wells">Wells Fargo •••• 2398</option>
                                            <option value="new">Link New Bank Account</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Deposit Amount (USD)</label>
                                        <input type="number" class="form-control" placeholder="0.00" min="10"
                                            step="0.01">
                                    </div>

                                    <div class="fee-info">
                                        <div class="fw-bold">Important Information:</div>
                                        <ul class="mt-2 mb-0">
                                            <li>Minimum deposit: $10</li>
                                            <li>No fees for ACH transfers</li>
                                            <li>Funds may take 1-3 business days to clear</li>
                                            <li>Transfers are processed on business days only</li>
                                        </ul>
                                    </div>

                                    <div class="processing-time">
                                        <i class="fas fa-clock"></i>
                                        <span>Processing time: 1-3 business days</span>
                                    </div>

                                    <button type="submit" class="btn-deposit">Initiate Bank Transfer</button>
                                </div>

                                <!-- Wire Transfer -->
                                <div id="wire-form" class="deposit-form" style="display: none;">
                                    <div class="mb-3">
                                        <label class="form-label">Account Type</label>
                                        <select class="form-select">
                                            <option value="domestic">Domestic Wire Transfer</option>
                                            <option value="international">International Wire Transfer</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Deposit Amount (USD)</label>
                                        <input type="number" class="form-control" placeholder="0.00" min="100"
                                            step="0.01">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Reference/Notes</label>
                                        <input type="text" class="form-control" placeholder="Your name or account ID">
                                    </div>

                                    <div class="fw-bold mb-2">Wire Transfer Instructions:</div>
                                    <div class="bg-dark p-3 rounded mb-3">
                                        <div class="mb-2"><strong>Beneficiary:</strong> Tenex Investments LLC</div>
                                        <div class="mb-2"><strong>Account Number:</strong> 780124589</div>
                                        <div class="mb-2"><strong>Routing Number:</strong> 021000021</div>
                                        <div class="mb-2"><strong>Bank:</strong> JPMorgan Chase Bank, N.A.</div>
                                        <div class="mb-2"><strong>Address:</strong> 383 Madison Avenue, New York, NY
                                            10179</div>
                                        <div class="mb-0"><strong>Reference:</strong> [Your Account ID]</div>
                                    </div>

                                    <div class="fee-info">
                                        <div class="fw-bold">Important Information:</div>
                                        <ul class="mt-2 mb-0">
                                            <li>Minimum deposit: $100</li>
                                            <li>Domestic wire fee: $15 (deducted from transfer)</li>
                                            <li>International wire fee: $25 (deducted from transfer)</li>
                                            <li>Funds are typically available within 1 business day</li>
                                        </ul>
                                    </div>

                                    <div class="processing-time">
                                        <i class="fas fa-clock"></i>
                                        <span>Processing time: 1 business day</span>
                                    </div>

                                    <button type="submit" class="btn-deposit">Confirm Wire Transfer</button>
                                </div>

                                <!-- Cash App -->
                                <div id="cashapp-form" class="deposit-form" style="display: none;">
                                    <div class="mb-3">
                                        <label class="form-label">Cash App Username</label>
                                        <input type="text" class="form-control" placeholder="Your Cash App $username">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Deposit Amount (USD)</label>
                                        <input type="number" class="form-control" placeholder="0.00" min="10"
                                            step="0.01">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Tenex Cash Tag</label>
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="text" class="form-control" value="TenexInvest" readonly>
                                            <button type="button" class="btn btn-outline-secondary copy-btn"
                                                data-address="TenexInvest">
                                                <i class="fas fa-copy"></i>
                                            </button>
                                        </div>
                                        <div class="form-text">Send funds to this Cash Tag from your Cash App</div>
                                    </div>

                                    <div class="fee-info">
                                        <div class="fw-bold">Important Information:</div>
                                        <ul class="mt-2 mb-0">
                                            <li>Minimum deposit: $10</li>
                                            <li>No fees for standard transfers</li>
                                            <li>Funds are typically available instantly</li>
                                            <li>Include your account ID in the payment note</li>
                                        </ul>
                                    </div>

                                    <div class="processing-time">
                                        <i class="fas fa-clock"></i>
                                        <span>Processing time: Instant</span>
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
                                <div class="activity-item">
                                    <div class="activity-icon activity-crypto">
                                        <i class="fab fa-bitcoin"></i>
                                    </div>
                                    <div class="activity-details">
                                        <div class="fw-bold">Bitcoin Deposit</div>
                                        <small>0.125 BTC • 2 hours ago</small>
                                    </div>
                                    <div class="activity-amount">+$5,000</div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon activity-bank">
                                        <i class="fas fa-university"></i>
                                    </div>
                                    <div class="activity-details">
                                        <div class="fw-bold">Bank Transfer</div>
                                        <small>Chase Bank • 1 day ago</small>
                                    </div>
                                    <div class="activity-amount">+$2,500</div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon activity-wire">
                                        <i class="fas fa-exchange-alt"></i>
                                    </div>
                                    <div class="activity-details">
                                        <div class="fw-bold">Wire Transfer</div>
                                        <small>International • 3 days ago</small>
                                    </div>
                                    <div class="activity-amount">+$10,000</div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon activity-cashapp">
                                        <i class="fas fa-mobile-alt"></i>
                                    </div>
                                    <div class="activity-details">
                                        <div class="fw-bold">Cash App</div>
                                        <small>Instant Transfer • 5 days ago</small>
                                    </div>
                                    <div class="activity-amount">+$500</div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon activity-bank">
                                        <i class="fas fa-university"></i>
                                    </div>
                                    <div class="activity-details">
                                        <div class="fw-bold">Bank Transfer</div>
                                        <small>Bank of America • 1 week ago</small>
                                    </div>
                                    <div class="activity-amount">+$3,000</div>
                                </div>
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
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Deposit method selection
            const depositOptions = document.querySelectorAll('.deposit-option');
            const depositForms = {
                crypto: document.getElementById('crypto-form'),
                bank: document.getElementById('bank-form'),
                wire: document.getElementById('wire-form'),
                cashapp: document.getElementById('cashapp-form')
            };
            
            // Show crypto addresses based on selection
            const cryptoCurrency = document.getElementById('cryptoCurrency');
            const cryptoAddresses = {
                bitcoin: document.getElementById('btc-address'),
                ethereum: document.getElementById('eth-address'),
                usdt: document.getElementById('eth-address'), // Using same address for demo
                usdc: document.getElementById('eth-address')  // Using same address for demo
            };
            
            // Initialize with Bitcoin selected
            cryptoAddresses.bitcoin.style.display = 'block';
            
            // Handle cryptocurrency selection change
            cryptoCurrency.addEventListener('change', function() {
                // Hide all addresses
                Object.values(cryptoAddresses).forEach(address => {
                    if (address) address.style.display = 'none';
                });
                
                // Show selected address
                const selectedCrypto = this.value;
                if (cryptoAddresses[selectedCrypto]) {
                    cryptoAddresses[selectedCrypto].style.display = 'block';
                }
            });
            
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
                    }
                });
            });
            
            // Copy address functionality
            const copyButtons = document.querySelectorAll('.copy-btn');
            copyButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const address = this.getAttribute('data-address');
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
            
            // Handle crypto deposit submission
            const cryptoSubmit = document.getElementById('cryptoSubmit');
            cryptoSubmit.addEventListener('click', function() {
                const amount = document.getElementById('cryptoAmount').value;
                const currency = document.getElementById('cryptoCurrency').value;
                
                if (!amount || amount < 10) {
                    alert('Please enter a valid amount (minimum $10)');
                    return;
                }
                
                // In a real application, this would generate a unique deposit address
                // For demo purposes, we'll just show a success message
                alert(`Deposit address generated for $${amount} in ${currency.toUpperCase()}. Please send funds to the address displayed.`);
                
                // Show QR code
                const selectedCrypto = cryptoCurrency.value;
                if (cryptoAddresses[selectedCrypto]) {
                    const qrCode = cryptoAddresses[selectedCrypto].querySelector('.qr-code');
                    if (qrCode) qrCode.style.display = 'block';
                }
            });
            
            // Form submission handlers
            const depositForm = document.getElementById('depositForm');
            depositForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Get active method
                const activeMethod = document.querySelector('.deposit-option.active').getAttribute('data-method');
                const amountInput = depositForms[activeMethod].querySelector('input[type="number"]');
                const amount = amountInput ? amountInput.value : null;
                
                if (!amount) {
                    alert('Please enter a deposit amount');
                    return;
                }
                
                // In a real application, this would submit the form to the server
                // For demo purposes, we'll just show a success message
                alert(`Your ${activeMethod} deposit of $${amount} has been initiated!`);
                
                // Reset form
                depositForm.reset();
                
                // Reset crypto display
                Object.values(cryptoAddresses).forEach(address => {
                    if (address) {
                        address.style.display = 'none';
                        const qrCode = address.querySelector('.qr-code');
                        if (qrCode) qrCode.style.display = 'none';
                    }
                });
                cryptoAddresses.bitcoin.style.display = 'block';
            });
        });
    </script>
</body>

</html>
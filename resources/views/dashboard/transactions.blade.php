<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheSpace - Transaction History</title>
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
        
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
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
        
        /* Transaction Cards */
        .transaction-card {
            background-color: var(--light-blue);
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            border-left: 4px solid var(--accent-blue);
            transition: all 0.3s;
        }
        
        .transaction-card:hover {
            transform: translateX(5px);
        }
        
        .transaction-card.deposit {
            border-left-color: var(--success-green);
            background-color: rgba(0, 200, 83, 0.1);
        }
        
        .transaction-card.withdrawal {
            border-left-color: var(--danger-red);
            background-color: rgba(244, 67, 54, 0.1);
        }
        
        .transaction-card.investment {
            border-left-color: var(--accent-blue);
            background-color: rgba(0, 82, 163, 0.1);
        }
        
        .transaction-card.dividend {
            border-left-color: var(--warning-orange);
            background-color: rgba(255, 152, 0, 0.1);
        }
        
        .transaction-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 10px;
        }
        
        .transaction-title {
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 5px;
        }
        
        .transaction-date {
            font-size: 0.8rem;
            color: #a8c6e5;
        }
        
        .transaction-content {
            font-size: 0.9rem;
            color: #a8c6e5;
            margin-bottom: 10px;
        }
        
        .transaction-amount {
            font-size: 1.1rem;
            font-weight: 700;
        }
        
        /* Transaction Filters */
        .transaction-filters {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        
        .filter-btn {
            background-color: var(--light-blue);
            border: 1px solid var(--border-color);
            color: var(--text-color);
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .filter-btn.active {
            background-color: var(--accent-blue);
            color: white;
        }
        
        /* Date Range Selector */
        .date-range-selector {
            background-color: var(--light-blue);
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid var(--border-color);
        }
        
        .date-inputs {
            display: flex;
            gap: 15px;
            align-items: center;
        }
        
        .date-input-group {
            flex: 1;
        }
        
        .form-label {
            color: var(--accent-blue);
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }
        
        .form-control {
            background: rgba(10, 25, 41, 0.7);
            border: 1px solid rgba(58, 123, 213, 0.3);
            color: var(--text-color);
            border-radius: 6px;
            padding: 10px 12px;
            font-size: 0.95rem;
        }
        
        .form-control:focus {
            background: rgba(10, 25, 41, 0.9);
            border-color: var(--accent-blue);
            box-shadow: 0 0 0 0.2rem rgba(58, 123, 213, 0.25);
            color: var(--text-color);
        }
        
        .btn-primary {
            background-color: var(--accent-blue);
            border: none;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 6px;
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            background-color: #5dade2;
            transform: translateY(-2px);
        }
        
        /* Transaction Summary */
        .transaction-summary {
            background-color: var(--primary-blue);
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 25px;
            border: 1px solid var(--border-color);
        }
        
        .summary-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        
        .summary-item {
            text-align: center;
            padding: 15px;
            background-color: var(--light-blue);
            border-radius: 8px;
        }
        
        .summary-value {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .summary-label {
            font-size: 0.9rem;
            color: #a8c6e5;
        }
        
        /* Quick Actions */
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }
        
        .action-btn {
            background-color: var(--light-blue);
            border: 1px solid var(--border-color);
            color: var(--text-color);
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            transition: all 0.3s;
            text-decoration: none;
            display: block;
        }
        
        .action-btn:hover {
            background-color: var(--accent-blue);
            color: white;
            transform: translateY(-2px);
        }
        
        .action-btn i {
            font-size: 1.5rem;
            margin-bottom: 8px;
            display: block;
        }
        
        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #a8c6e5;
        }
        
        .empty-state i {
            font-size: 3rem;
            margin-bottom: 15px;
            color: var(--accent-blue);
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .sidebar {
                min-height: auto;
                width: 100%;
            }
            
            .transaction-filters {
                flex-direction: column;
            }
            
            .filter-btn {
                width: 100%;
                text-align: center;
            }
            
            .date-inputs {
                flex-direction: column;
            }
            
            .summary-grid {
                grid-template-columns: 1fr 1fr;
            }
            
            .quick-actions {
                grid-template-columns: repeat(2, 1fr);
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
            
            .transaction-summary {
                padding: 20px 15px;
            }
            
            .summary-grid {
                grid-template-columns: 1fr;
            }
            
            .quick-actions {
                grid-template-columns: 1fr;
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
                    <a class="navbar-brand" href="index.html">
                        <i class="fas fa-robot me-2"></i>TheSpace
                    </a>
                    <ul class="nav flex-column">
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
                            <a class="nav-link" href="investment">
                                <i class="fas fa-wallet"></i> Investments
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="transactions.html">
                                <i class="fas fa-exchange-alt"></i> Transactions
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="insurance">
                                <i class="fas fa-file-invoice-dollar"></i> Insurance
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="settings.html">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                        </li>
                        <li class="nav-item mt-4">
                            <a class="nav-link" href="index.html">
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
                    <h4 class="mb-0">Transaction History</h4>
                    <div class="user-info">
                        <div class="user-avatar">JD</div>
                        <div>
                            <div class="fw-bold">John Doe</div>
                            <small class="text-muted">Growth Tier Investor</small>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Actions -->
                <div class="dashboard-card">
                    <div class="card-title">Quick Actions</div>
                    <div class="quick-actions">
                        <a href="#" class="action-btn" data-bs-toggle="modal" data-bs-target="#depositModal">
                            <i class="fas fa-plus-circle"></i>
                            Deposit Funds
                        </a>
                        <a href="#" class="action-btn" data-bs-toggle="modal" data-bs-target="#withdrawalModal">
                            <i class="fas fa-minus-circle"></i>
                            Withdraw Funds
                        </a>
                        <a href="#" class="action-btn">
                            <i class="fas fa-download"></i>
                            Export Statement
                        </a>
                        <a href="#" class="action-btn">
                            <i class="fas fa-print"></i>
                            Print Statement
                        </a>
                        <a href="#" class="action-btn">
                            <i class="fas fa-sync-alt"></i>
                            Refresh
                        </a>
                    </div>
                </div>
                
                <!-- Account Summary -->
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-title">Available Balance</div>
                            <div class="card-value">$12,450.75</div>
                            <div class="card-change">
                                As of today
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-title">Total Deposits</div>
                            <div class="card-value">$85,200.00</div>
                            <div class="card-change positive">
                                <i class="fas fa-arrow-up"></i> All time
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-title">Total Withdrawals</div>
                            <div class="card-value">$15,750.25</div>
                            <div class="card-change">
                                All time
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-title">Pending Transactions</div>
                            <div class="card-value">2</div>
                            <div class="card-change">
                                $5,000.00 total
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Transaction Summary -->
                <div class="transaction-summary">
                    <h5 class="mb-4" style="color: var(--accent-blue);">Transaction Summary</h5>
                    <div class="summary-grid">
                        <div class="summary-item">
                            <div class="summary-value positive">$12,450</div>
                            <div class="summary-label">This Month Deposits</div>
                        </div>
                        <div class="summary-item">
                            <div class="summary-value">$3,250</div>
                            <div class="summary-label">This Month Withdrawals</div>
                        </div>
                        <div class="summary-item">
                            <div class="summary-value positive">$9,200</div>
                            <div class="summary-label">Net Cash Flow</div>
                        </div>
                        <div class="summary-item">
                            <div class="summary-value">24</div>
                            <div class="summary-label">Total Transactions</div>
                        </div>
                    </div>
                </div>
                
                <!-- Date Range Selector -->
                <div class="date-range-selector">
                    <h6 class="mb-3" style="color: var(--accent-blue);">Filter by Date Range</h6>
                    <div class="date-inputs">
                        <div class="date-input-group">
                            <label class="form-label">From Date</label>
                            <input type="date" class="form-control" id="fromDate">
                        </div>
                        <div class="date-input-group">
                            <label class="form-label">To Date</label>
                            <input type="date" class="form-control" id="toDate">
                        </div>
                        <div class="date-input-group">
                            <label class="form-label">&nbsp;</label>
                            <button class="btn btn-primary w-100" id="applyDateFilter">
                                <i class="fas fa-filter me-2"></i> Apply Filter
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Transaction Filters -->
                <div class="transaction-filters">
                    <button class="filter-btn active" data-filter="all">All Transactions</button>
                    <button class="filter-btn" data-filter="deposit">Deposits</button>
                    <button class="filter-btn" data-filter="withdrawal">Withdrawals</button>
                    <button class="filter-btn" data-filter="investment">Investments</button>
                    <button class="filter-btn" data-filter="dividend">Dividends</button>
                    <button class="filter-btn" data-filter="pending">Pending</button>
                    <button class="filter-btn" data-filter="completed">Completed</button>
                </div>
                
                <!-- Transaction History -->
                <div class="dashboard-card">
                    <div class="card-title d-flex justify-content-between align-items-center">
                        <span>Transaction History</span>
                        <div>
                            <button class="btn btn-sm btn-outline-primary me-2" id="exportTransactions">
                                <i class="fas fa-download me-1"></i> Export
                            </button>
                            <button class="btn btn-sm btn-primary" id="refreshTransactions">
                                <i class="fas fa-sync-alt me-1"></i> Refresh
                            </button>
                        </div>
                    </div>
                    
                    <div id="transactionsContainer">
                        <!-- Transactions will be dynamically inserted here -->
                    </div>
                    
                    <!-- Empty State (initially hidden) -->
                    <div class="empty-state" id="emptyState" style="display: none;">
                        <i class="fas fa-exchange-alt"></i>
                        <h5>No Transactions Found</h5>
                        <p>You don't have any transactions matching your current filters.</p>
                        <button class="btn btn-primary mt-2" id="makeFirstTransaction">
                            <i class="fas fa-plus me-2"></i> Make Your First Transaction
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Deposit Modal -->
    <div class="modal fade" id="depositModal" tabindex="-1" aria-labelledby="depositModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: var(--primary-blue); color: var(--text-color);">
                <div class="modal-header">
                    <h5 class="modal-title" id="depositModalLabel">Deposit Funds</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="depositAmount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="depositAmount" placeholder="Enter amount">
                    </div>
                    <div class="mb-3">
                        <label for="depositMethod" class="form-label">Payment Method</label>
                        <select class="form-control" id="depositMethod">
                            <option value="bank">Bank Transfer</option>
                            <option value="card">Credit/Debit Card</option>
                            <option value="crypto">Cryptocurrency</option>
                            <option value="wire">Wire Transfer</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="depositNotes" class="form-label">Notes (Optional)</label>
                        <textarea class="form-control" id="depositNotes" rows="3" placeholder="Add any notes about this deposit"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="confirmDeposit">Confirm Deposit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Withdrawal Modal -->
    <div class="modal fade" id="withdrawalModal" tabindex="-1" aria-labelledby="withdrawalModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: var(--primary-blue); color: var(--text-color);">
                <div class="modal-header">
                    <h5 class="modal-title" id="withdrawalModalLabel">Withdraw Funds</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="withdrawalAmount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="withdrawalAmount" placeholder="Enter amount">
                    </div>
                    <div class="mb-3">
                        <label for="withdrawalMethod" class="form-label">Withdrawal Method</label>
                        <select class="form-control" id="withdrawalMethod">
                            <option value="bank">Bank Transfer</option>
                            <option value="crypto">Cryptocurrency</option>
                            <option value="check">Check</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="withdrawalNotes" class="form-label">Notes (Optional)</label>
                        <textarea class="form-control" id="withdrawalNotes" rows="3" placeholder="Add any notes about this withdrawal"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="confirmWithdrawal">Confirm Withdrawal</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Sample transaction data
        const sampleTransactions = [
            {
                id: 1,
                type: 'deposit',
                title: 'Bank Transfer Deposit',
                content: 'Funds deposited from Chase Bank ending in 4589',
                amount: 5000.00,
                date: '2023-11-15',
                status: 'completed'
            },
            {
                id: 2,
                type: 'investment',
                title: 'NVDA Stock Purchase',
                content: 'Purchased 10 shares of NVIDIA at $480.25',
                amount: -4802.50,
                date: '2023-11-14',
                status: 'completed'
            },
            {
                id: 3,
                type: 'dividend',
                title: 'MSFT Dividend Payment',
                content: 'Quarterly dividend from Microsoft shares',
                amount: 45.60,
                date: '2023-11-12',
                status: 'completed'
            },
            {
                id: 4,
                type: 'withdrawal',
                title: 'Bank Transfer Withdrawal',
                content: 'Withdrawal to Bank of America ending in 1234',
                amount: -1500.00,
                date: '2023-11-10',
                status: 'completed'
            },
            {
                id: 5,
                type: 'investment',
                title: 'AI Growth Fund Investment',
                content: 'Allocated funds to TheSpace AI Growth Fund',
                amount: -10000.00,
                date: '2023-11-08',
                status: 'completed'
            },
            {
                id: 6,
                type: 'dividend',
                title: 'TSLA Special Dividend',
                content: 'Special dividend payment from Tesla',
                amount: 120.75,
                date: '2023-11-05',
                status: 'completed'
            },
            {
                id: 7,
                type: 'deposit',
                title: 'Crypto Deposit',
                content: 'Bitcoin deposit from Coinbase wallet',
                amount: 2500.00,
                date: '2023-11-02',
                status: 'completed'
            },
            {
                id: 8,
                type: 'withdrawal',
                title: 'Crypto Withdrawal',
                content: 'Ethereum withdrawal to external wallet',
                amount: -750.25,
                date: '2023-10-28',
                status: 'completed'
            },
            {
                id: 9,
                type: 'deposit',
                title: 'Wire Transfer Deposit',
                content: 'International wire transfer from HSBC',
                amount: 10000.00,
                date: '2023-10-25',
                status: 'completed'
            },
            {
                id: 10,
                type: 'withdrawal',
                title: 'Pending Withdrawal',
                content: 'Withdrawal request to Chase Bank - Processing',
                amount: -2000.00,
                date: '2023-11-16',
                status: 'pending'
            }
        ];

        // Initialize the page
        document.addEventListener('DOMContentLoaded', function() {
            const transactionsContainer = document.getElementById('transactionsContainer');
            const emptyState = document.getElementById('emptyState');
            const filterButtons = document.querySelectorAll('.filter-btn');
            const applyDateFilterBtn = document.getElementById('applyDateFilter');
            const refreshTransactionsBtn = document.getElementById('refreshTransactions');
            const exportTransactionsBtn = document.getElementById('exportTransactions');
            const makeFirstTransactionBtn = document.getElementById('makeFirstTransaction');
            const confirmDepositBtn = document.getElementById('confirmDeposit');
            const confirmWithdrawalBtn = document.getElementById('confirmWithdrawal');
            
            let currentTransactions = [...sampleTransactions];
            let currentFilter = 'all';
            let fromDate = '';
            let toDate = '';
            
            // Format currency
            function formatCurrency(amount) {
                return new Intl.NumberFormat('en-US', {
                    style: 'currency',
                    currency: 'USD'
                }).format(amount);
            }
            
            // Format date
            function formatDate(dateString) {
                const options = { year: 'numeric', month: 'short', day: 'numeric' };
                return new Date(dateString).toLocaleDateString('en-US', options);
            }
            
            // Render transactions based on current filter and date range
            function renderTransactions() {
                transactionsContainer.innerHTML = '';
                
                const filteredTransactions = currentTransactions.filter(transaction => {
                    // Apply type filter
                    if (currentFilter !== 'all' && transaction.type !== currentFilter && 
                        transaction.status !== currentFilter) {
                        return false;
                    }
                    
                    // Apply date filter
                    if (fromDate && transaction.date < fromDate) return false;
                    if (toDate && transaction.date > toDate) return false;
                    
                    return true;
                });
                
                if (filteredTransactions.length === 0) {
                    emptyState.style.display = 'block';
                    return;
                }
                
                emptyState.style.display = 'none';
                
                // Sort transactions by date (newest first)
                filteredTransactions.sort((a, b) => new Date(b.date) - new Date(a.date));
                
                filteredTransactions.forEach(transaction => {
                    const transactionElement = document.createElement('div');
                    transactionElement.className = `transaction-card ${transaction.type} ${transaction.status === 'pending' ? 'pending' : ''}`;
                    
                    const isPositive = transaction.amount > 0;
                    const amountClass = isPositive ? 'positive' : 'negative';
                    const amountPrefix = isPositive ? '+' : '';
                    
                    transactionElement.innerHTML = `
                        <div class="transaction-header">
                            <div>
                                <div class="transaction-title">${transaction.title}</div>
                                <div class="transaction-date">${formatDate(transaction.date)}</div>
                            </div>
                            <div class="transaction-amount ${amountClass}">
                                ${amountPrefix}${formatCurrency(Math.abs(transaction.amount))}
                            </div>
                        </div>
                        <div class="transaction-content">${transaction.content}</div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge ${transaction.status === 'completed' ? 'bg-success' : 'bg-warning'}">
                                ${transaction.status === 'completed' ? 'Completed' : 'Pending'}
                            </span>
                            <small class="text-muted">Transaction ID: #TX-${transaction.id.toString().padStart(4, '0')}</small>
                        </div>
                    `;
                    
                    transactionsContainer.appendChild(transactionElement);
                });
            }
            
            // Filter transactions
            filterButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    filterButtons.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    currentFilter = this.getAttribute('data-filter');
                    renderTransactions();
                });
            });
            
            // Apply date filter
            applyDateFilterBtn.addEventListener('click', function() {
                fromDate = document.getElementById('fromDate').value;
                toDate = document.getElementById('toDate').value;
                renderTransactions();
            });
            
            // Refresh transactions
            refreshTransactionsBtn.addEventListener('click', function() {
                // In a real app, this would fetch updated data from the server
                renderTransactions();
                alert('Transactions refreshed!');
            });
            
            // Export transactions
            exportTransactionsBtn.addEventListener('click', function() {
                // In a real app, this would generate and download a CSV file
                alert('Export functionality would be implemented here');
            });
            
            // Make first transaction
            makeFirstTransactionBtn.addEventListener('click', function() {
                // Show deposit modal
                const depositModal = new bootstrap.Modal(document.getElementById('depositModal'));
                depositModal.show();
            });
            
            // Confirm deposit
            confirmDepositBtn.addEventListener('click', function() {
                const amount = parseFloat(document.getElementById('depositAmount').value);
                const method = document.getElementById('depositMethod').value;
                const notes = document.getElementById('depositNotes').value;
                
                if (!amount || amount <= 0) {
                    alert('Please enter a valid deposit amount');
                    return;
                }
                
                // Create new deposit transaction
                const newTransaction = {
                    id: currentTransactions.length + 1,
                    type: 'deposit',
                    title: `${method.charAt(0).toUpperCase() + method.slice(1)} Deposit`,
                    content: notes || `Funds deposited via ${method}`,
                    amount: amount,
                    date: new Date().toISOString().split('T')[0],
                    status: 'pending'
                };
                
                currentTransactions.unshift(newTransaction);
                renderTransactions();
                
                // Close modal and reset form
                bootstrap.Modal.getInstance(document.getElementById('depositModal')).hide();
                document.getElementById('depositAmount').value = '';
                document.getElementById('depositNotes').value = '';
                
                alert(`Deposit of ${formatCurrency(amount)} submitted successfully!`);
            });
            
            // Confirm withdrawal
            confirmWithdrawalBtn.addEventListener('click', function() {
                const amount = parseFloat(document.getElementById('withdrawalAmount').value);
                const method = document.getElementById('withdrawalMethod').value;
                const notes = document.getElementById('withdrawalNotes').value;
                
                if (!amount || amount <= 0) {
                    alert('Please enter a valid withdrawal amount');
                    return;
                }
                
                // Create new withdrawal transaction
                const newTransaction = {
                    id: currentTransactions.length + 1,
                    type: 'withdrawal',
                    title: `${method.charAt(0).toUpperCase() + method.slice(1)} Withdrawal`,
                    content: notes || `Funds withdrawn via ${method}`,
                    amount: -amount,
                    date: new Date().toISOString().split('T')[0],
                    status: 'pending'
                };
                
                currentTransactions.unshift(newTransaction);
                renderTransactions();
                
                // Close modal and reset form
                bootstrap.Modal.getInstance(document.getElementById('withdrawalModal')).hide();
                document.getElementById('withdrawalAmount').value = '';
                document.getElementById('withdrawalNotes').value = '';
                
                alert(`Withdrawal of ${formatCurrency(amount)} submitted successfully!`);
            });
            
            // Set default date values (last 30 days)
            const today = new Date();
            const thirtyDaysAgo = new Date();
            thirtyDaysAgo.setDate(today.getDate() - 30);
            
            document.getElementById('fromDate').value = thirtyDaysAgo.toISOString().split('T')[0];
            document.getElementById('toDate').value = today.toISOString().split('T')[0];
            
            // Initial render
            renderTransactions();
        });
    </script>
</body>
</html>
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
            padding-top: 70px;
            /* Added for fixed navbar */
        }

        /* Enhanced Navigation */
        .navbar {
            background-color: var(--primary-blue) !important;
            border-bottom: 1px solid var(--border-color);
            padding: 0.5rem 0;
            height: 70px;
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            background-color: var(--dark-blue) !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .navbar-brand {
            color: white !important;
            font-weight: bold;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
        }

        .navbar-brand i {
            margin-right: 8px;
            font-size: 1.8rem;
        }

        .nav-link {
            font-weight: 500;
            color: #a8c6e5 !important;
            padding: 0.5rem 1rem !important;
            margin: 0 0.2rem;
            border-radius: 6px;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-link:hover,
        .nav-link.active {
            background-color: var(--light-blue);
            color: white !important;
            transform: translateY(-1px);
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 30px;
            height: 3px;
            background: var(--accent-blue);
            border-radius: 2px;
        }

        .navbar-toggler {
            border: 1px solid var(--border-color);
            padding: 0.25rem 0.5rem;
            font-size: 1.2rem;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28168, 198, 229, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* Mobile menu adjustments */
        @media (max-width: 991.98px) {
            .navbar-collapse {
                background-color: var(--primary-blue);
                margin-top: 10px;
                border-radius: 10px;
                border: 1px solid var(--border-color);
                padding: 15px;
            }

            .nav-link {
                margin: 0.2rem 0;
                padding: 0.8rem 1rem !important;
            }

            .nav-link.active::after {
                display: none;
            }
        }

        /* Compact navbar for very small screens */
        @media (max-width: 576px) {
            .navbar-brand span {
                display: none;
            }

            .navbar-brand i {
                margin-right: 0;
                font-size: 2rem;
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
    <!-- Enhanced Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-robot"></i>
                <span>TheSpace</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <i class="fas fa-tachometer-alt me-1"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.portfolio') }}">
                            <i class="fas fa-chart-line me-1"></i> Portfolio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.investments') }}">
                            <i class="fas fa-wallet me-1"></i> Investments
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('dashboard.transactions') }}">
                            <i class="fas fa-exchange-alt me-1"></i> Transactions
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.insurance') }}">
                            <i class="fas fa-file-invoice-dollar me-1"></i> Insurance
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.settings') }}">
                            <i class="fas fa-cog me-1"></i> Settings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">
                            <i class="fas fa-arrow-left me-1"></i> Main Site
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 main-content">
                <!-- Top Bar -->
                <div class="top-bar d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Transaction History</h4>
                    <div class="user-info">
                        <div class="user-avatar">{{ strtoupper(substr($user->first_name ?? $user->name ?? 'U', 0, 1)) }}{{ strtoupper(substr($user->last_name ?? '', 0, 1)) }}</div>
                        <div>
                            <div class="fw-bold">{{ $user->first_name ?? $user->name ?? 'User' }} {{ $user->last_name ?? '' }}</div>
                            <small class="text-muted">{{ $user->tier ?? 'Investor' }}</small>
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
                        <a href="#" class="action-btn" id="refreshTransactions">
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
                            <div class="card-value">${{ number_format(max(0, $user->cash_balance), 2) }}</div>
                            <div class="card-change">
                                As of today
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-title">Total Deposits</div>
                            <div class="card-value">${{ number_format(max(0, $summary['total_deposits']), 2) }}</div>
                            <div class="card-change positive">
                                <i class="fas fa-arrow-up"></i> All time
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-title">Total Withdrawals</div>
                            <div class="card-value">${{ number_format(max(0, $summary['total_withdrawals']), 2) }}</div>
                            <div class="card-change">
                                All time
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-title">Pending Transactions</div>
                            <div class="card-value">{{ $summary['pending_transactions'] }}</div>
                            <div class="card-change">
                                ${{ number_format(max(0, $summary['pending_amount'] ?? 0), 2) }} total
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Transaction Summary -->
                <div class="transaction-summary">
                    <h5 class="mb-4" style="color: var(--accent-blue);">Transaction Summary</h5>
                    <div class="summary-grid">
                        <div class="summary-item">
                            <div class="summary-value positive">${{ number_format(max(0, $summary['monthly_deposits']), 2) }}
                            </div>
                            <div class="summary-label">This Month Deposits</div>
                        </div>
                        <div class="summary-item">
                            <div class="summary-value">${{ number_format(max(0, $summary['monthly_withdrawals']), 2) }}</div>
                            <div class="summary-label">This Month Withdrawals</div>
                        </div>
                        <div class="summary-item">
                            <div class="summary-value {{ ($summary['monthly_deposits'] - $summary['monthly_withdrawals']) >= 0 ? 'positive' : 'negative' }}">${{ number_format($summary['monthly_deposits'] - $summary['monthly_withdrawals'], 2) }}</div>
                            <div class="summary-label">Net Cash Flow</div>
                        </div>
                        <div class="summary-item">
                            <div class="summary-value">{{ $transactions->total() }}</div>
                            <div class="summary-label">Total Transactions</div>
                        </div>
                    </div>
                </div>

                <!-- Date Range Selector -->
                <div class="date-range-selector">
                    <h6 class="mb-3" style="color: var(--accent-blue);">Filter by Date Range</h6>
                    <form method="GET" action="{{ route('dashboard.transactions') }}">
                        <div class="date-inputs">
                            <div class="date-input-group">
                                <label class="form-label">From Date</label>
                                <input type="date" class="form-control" name="from_date"
                                    value="{{ request('from_date') }}">
                            </div>
                            <div class="date-input-group">
                                <label class="form-label">To Date</label>
                                <input type="date" class="form-control" name="to_date" value="{{ request('to_date') }}">
                            </div>
                            <div class="date-input-group">
                                <label class="form-label">&nbsp;</label>
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-filter me-2"></i> Apply Filter
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Transaction Filters -->
                <div class="transaction-filters">
                    <a href="{{ route('dashboard.transactions') }}"
                        class="filter-btn {{ !request('type') ? 'active' : '' }}">All
                        Transactions</a>
                    <a href="{{ route('dashboard.transactions', ['type' => 'deposit']) }}"
                        class="filter-btn {{ request('type') == 'deposit' ? 'active' : '' }}">Deposits</a>
                    <a href="{{ route('dashboard.transactions', ['type' => 'withdrawal']) }}"
                        class="filter-btn {{ request('type') == 'withdrawal' ? 'active' : '' }}">Withdrawals</a>
                    <a href="{{ route('dashboard.transactions', ['type' => 'investment']) }}"
                        class="filter-btn {{ request('type') == 'investment' ? 'active' : '' }}">Investments</a>
                    <a href="{{ route('dashboard.transactions', ['type' => 'dividend']) }}"
                        class="filter-btn {{ request('type') == 'dividend' ? 'active' : '' }}">Dividends</a>
                    <a href="{{ route('dashboard.transactions', ['status' => 'pending']) }}"
                        class="filter-btn {{ request('status') == 'pending' ? 'active' : '' }}">Pending</a>
                    <a href="{{ route('dashboard.transactions', ['status' => 'completed']) }}"
                        class="filter-btn {{ request('status') == 'completed' ? 'active' : '' }}">Completed</a>
                </div>

                <!-- Transaction History -->
                <div class="dashboard-card">
                    <div class="card-title d-flex justify-content-between align-items-center">
                        <span>Transaction History</span>
                        <div>
                            <a href="{{ route('dashboard.transactions', array_merge(request()->all(), ['export' => 'csv'])) }}"
                                class="btn btn-sm btn-outline-primary me-2">
                                <i class="fas fa-download me-1"></i> Export
                            </a>
                            <a href="{{ route('dashboard.transactions') }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-sync-alt me-1"></i> Refresh
                            </a>
                        </div>
                    </div>

                    @if($transactions->count() > 0)
                    @foreach($transactions as $transaction)
                    <div class="transaction-card {{ $transaction->type }} {{ $transaction->status }}">
                        <div class="transaction-header">
                            <div>
                                <div class="transaction-title">{{ $transaction->title }}</div>
                                <div class="transaction-date">{{ $transaction->created_at->format('M d, Y \a\t g:i A')
                                    }}</div>
                            </div>
                            <div class="transaction-amount {{ $transaction->amount > 0 ? 'positive' : 'negative' }}">
                                {{ $transaction->amount > 0 ? '+' : '' }}${{ number_format(abs($transaction->amount), 2)
                                }}
                            </div>
                        </div>
                        <div class="transaction-content">{{ $transaction->description }}</div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge {{ $transaction->status == 'completed' ? 'bg-success' : 'bg-warning' }}">
                                {{ ucfirst($transaction->status) }}
                            </span>
                            <small class="text-muted">Transaction ID: #TX-{{ str_pad($transaction->id, 4, '0',
                                STR_PAD_LEFT) }}</small>
                        </div>
                    </div>
                    @endforeach

                    <!-- Pagination -->
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div class="text-muted">
                            Showing {{ $transactions->firstItem() }} to {{ $transactions->lastItem() }} of {{
                            $transactions->total() }} transactions
                        </div>
                        <nav>
                            <ul class="pagination">
                                <li class="page-item {{ $transactions->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $transactions->previousPageUrl() }}">Previous</a>
                                </li>
                                @foreach(range(1, $transactions->lastPage()) as $page)
                                <li class="page-item {{ $transactions->currentPage() == $page ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $transactions->url($page) }}">{{ $page }}</a>
                                </li>
                                @endforeach
                                <li class="page-item {{ $transactions->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $transactions->nextPageUrl() }}">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    @else
                    <!-- Empty State -->
                    <div class="empty-state">
                        <i class="fas fa-exchange-alt"></i>
                        <h5>No Transactions Found</h5>
                        <p>You don't have any transactions matching your current filters.</p>
                        <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#depositModal">
                            <i class="fas fa-plus me-2"></i> Make Your First Transaction
                        </button>
                    </div>
                    @endif
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
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('transactions.deposit.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="depositAmount" class="form-label">Amount</label>
                            <input type="number" class="form-control" id="depositAmount" name="amount"
                                placeholder="Enter amount" min="1" step="0.01" required>
                        </div>
                        <div class="mb-3">
                            <label for="depositMethod" class="form-label">Payment Method</label>
                            <select class="form-control" id="depositMethod" name="method" required>
                                <option value="bank">Bank Transfer</option>
                                <option value="card">Credit/Debit Card</option>
                                <option value="crypto">Cryptocurrency</option>
                                <option value="wire">Wire Transfer</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="depositNotes" class="form-label">Notes (Optional)</label>
                            <textarea class="form-control" id="depositNotes" name="notes" rows="3"
                                placeholder="Add any notes about this deposit"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Confirm Deposit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Withdrawal Modal -->
    <div class="modal fade" id="withdrawalModal" tabindex="-1" aria-labelledby="withdrawalModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: var(--primary-blue); color: var(--text-color);">
                <div class="modal-header">
                    <h5 class="modal-title" id="withdrawalModalLabel">Withdraw Funds</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('withdrawal.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="withdrawalAmount" class="form-label">Amount</label>
                            <input type="number" class="form-control" id="withdrawalAmount" name="amount"
                                placeholder="Enter amount" min="1" step="0.01" max="{{ max(0, $user->cash_balance) }}" required>
                            <div class="form-text">Available balance: ${{ number_format(max(0, $user->cash_balance), 2) }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="withdrawalMethod" class="form-label">Withdrawal Method</label>
                            <select class="form-control" id="withdrawalMethod" name="method" required>
                                <option value="bank">Bank Transfer</option>
                                <option value="crypto">Cryptocurrency</option>
                                <option value="check">Check</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="withdrawalNotes" class="form-label">Notes (Optional)</label>
                            <textarea class="form-control" id="withdrawalNotes" name="notes" rows="3"
                                placeholder="Add any notes about this withdrawal"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Confirm Withdrawal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Navbar scroll effect
            window.addEventListener('scroll', function() {
                const navbar = document.querySelector('.navbar');
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });

            // Refresh transactions
            document.getElementById('refreshTransactions').addEventListener('click', function() {
                window.location.reload();
            });

            // Set max date for date inputs to today
            const today = new Date().toISOString().split('T')[0];
            document.querySelector('input[name="to_date"]').max = today;
            
            // If from_date is set, ensure to_date is not before it
            const fromDateInput = document.querySelector('input[name="from_date"]');
            const toDateInput = document.querySelector('input[name="to_date"]');
            
            fromDateInput.addEventListener('change', function() {
                toDateInput.min = this.value;
            });

            // Success messages
            @if(session('success'))
                alert('{{ session('success') }}');
            @endif

            @if($errors->any())
                alert('{{ $errors->first() }}');
            @endif
        });
    </script>
</body>

</html>
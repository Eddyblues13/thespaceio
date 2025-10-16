<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenex - Transactions</title>
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
            --admin-purple: #6f42c1;
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

        .admin-badge {
            background-color: var(--admin-purple);
            color: white;
            font-size: 0.7rem;
            padding: 2px 8px;
            border-radius: 10px;
            margin-left: 5px;
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
            background-color: var(--admin-purple);
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

        /* Transactions Table */
        .transactions-table {
            background-color: var(--primary-blue);
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid var(--border-color);
        }

        .transactions-table table {
            margin-bottom: 0;
            color: var(--text-color);
        }

        .transactions-table thead {
            background-color: var(--admin-purple);
            color: white;
        }

        .transactions-table th {
            padding: 15px;
            font-weight: 600;
            border: none;
        }

        .transactions-table td {
            padding: 15px;
            border-color: var(--border-color);
        }

        .transactions-table tbody tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.05);
        }

        .transactions-table tbody tr:hover {
            background-color: rgba(0, 82, 163, 0.1);
        }

        .transaction-actions {
            display: flex;
            gap: 5px;
        }

        .btn-action {
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 0.8rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-action:hover {
            transform: scale(1.05);
        }

        .btn-view {
            background-color: var(--accent-blue);
            color: white;
        }

        .btn-edit {
            background-color: var(--warning-orange);
            color: white;
        }

        .btn-reverse {
            background-color: var(--danger-red);
            color: white;
        }

        .btn-export {
            background-color: var(--success-green);
            color: white;
        }

        /* Status badges */
        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .status-completed {
            background-color: rgba(0, 200, 83, 0.2);
            color: var(--success-green);
        }

        .status-pending {
            background-color: rgba(255, 152, 0, 0.2);
            color: var(--warning-orange);
        }

        .status-failed {
            background-color: rgba(244, 67, 54, 0.2);
            color: var(--danger-red);
        }

        .status-reversed {
            background-color: rgba(108, 117, 125, 0.2);
            color: #6c757d;
        }

        /* Type badges */
        .type-badge {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .type-deposit {
            background-color: rgba(0, 200, 83, 0.2);
            color: var(--success-green);
        }

        .type-withdrawal {
            background-color: rgba(255, 152, 0, 0.2);
            color: var(--warning-orange);
        }

        .type-profit {
            background-color: rgba(0, 82, 163, 0.2);
            color: var(--accent-blue);
        }

        .type-fee {
            background-color: rgba(108, 117, 125, 0.2);
            color: #6c757d;
        }

        .type-transfer {
            background-color: rgba(111, 66, 193, 0.2);
            color: var(--admin-purple);
        }

        /* Method badges */
        .method-badge {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .method-bank {
            background-color: rgba(0, 82, 163, 0.2);
            color: var(--accent-blue);
        }

        .method-crypto {
            background-color: rgba(247, 147, 26, 0.2);
            color: #f7931a;
        }

        .method-wire {
            background-color: rgba(0, 200, 83, 0.2);
            color: var(--success-green);
        }

        .method-cashapp {
            background-color: rgba(0, 207, 93, 0.2);
            color: #00cf5d;
        }

        .method-manual {
            background-color: rgba(111, 66, 193, 0.2);
            color: var(--admin-purple);
        }

        /* Amount styling */
        .amount-positive {
            color: var(--success-green);
            font-weight: 600;
        }

        .amount-negative {
            color: var(--danger-red);
            font-weight: 600;
        }

        .amount-neutral {
            color: var(--warning-orange);
            font-weight: 600;
        }

        /* Filters and Search */
        .filters-section {
            background-color: var(--primary-blue);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid var(--border-color);
        }

        .filter-group {
            margin-bottom: 15px;
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

        .btn-admin {
            background-color: var(--admin-purple);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 600;
            transition: background-color 0.3s;
        }

        .btn-admin:hover {
            background-color: #5a359d;
        }

        /* Charts */
        .chart-container {
            height: 300px;
            position: relative;
        }

        /* Pagination */
        .pagination-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .pagination .page-link {
            background-color: var(--primary-blue);
            border-color: var(--border-color);
            color: var(--text-color);
        }

        .pagination .page-item.active .page-link {
            background-color: var(--admin-purple);
            border-color: var(--admin-purple);
        }

        .pagination .page-link:hover {
            background-color: var(--light-blue);
            border-color: var(--accent-blue);
        }

        /* Modal */
        .modal-content {
            background-color: var(--primary-blue);
            color: var(--text-color);
            border: 1px solid var(--border-color);
        }

        .modal-header {
            border-bottom: 1px solid var(--border-color);
        }

        .modal-footer {
            border-top: 1px solid var(--border-color);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .sidebar {
                min-height: auto;
                width: 100%;
            }

            .card-value {
                font-size: 1.5rem;
            }

            .transactions-table {
                overflow-x: auto;
            }

            .transaction-actions {
                flex-direction: column;
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

            .filters-section .row>div {
                margin-bottom: 15px;
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
                        <i class="fas fa-robot me-2"></i>Tenex <span class="admin-badge">ADMIN</span>
                    </a>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="admin-dashboard">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin-users">
                                <i class="fas fa-users"></i> User Management
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="admin-transactions">
                                <i class="fas fa-exchange-alt"></i> Transactions
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin-deposits">
                                <i class="fas fa-plus-circle"></i> Deposit Control
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin-withdrawals">
                                <i class="fas fa-minus-circle"></i> Withdrawal Control
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin-reports">
                                <i class="fas fa-chart-bar"></i> Reports & Analytics
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin-settings">
                                <i class="fas fa-cogs"></i> System Settings
                            </a>
                        </li>
                        <li class="nav-item mt-4">
                            <a class="nav-link" href="dashboard">
                                <i class="fas fa-arrow-left"></i> User Dashboard
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 main-content">
                <!-- Top Bar -->
                <div class="top-bar d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Transaction Management</h4>
                    <div class="user-info">
                        <div class="user-avatar">AD</div>
                        <div>
                            <div class="fw-bold">Admin User</div>
                            <small class="text-muted">Super Administrator</small>
                        </div>
                    </div>
                </div>

                <!-- Transaction Stats -->
                <div class="row mb-4">
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-title">Total Transactions</div>
                            <div class="card-value">12,847</div>
                            <div class="card-change positive">
                                <i class="fas fa-arrow-up"></i> +8.2% (972)
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-title">Transaction Volume</div>
                            <div class="card-value">$8.42M</div>
                            <div class="card-change positive">
                                <i class="fas fa-arrow-up"></i> +15.7% ($1.14M)
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-title">Success Rate</div>
                            <div class="card-value">98.3%</div>
                            <div class="card-change positive">
                                <i class="fas fa-arrow-up"></i> +1.2% from last month
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-title">Avg. Transaction</div>
                            <div class="card-value">$655</div>
                            <div class="card-change negative">
                                <i class="fas fa-arrow-down"></i> -3.5% from last month
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Transaction Charts -->
                <div class="row mb-4">
                    <div class="col-md-8">
                        <div class="dashboard-card">
                            <div class="card-title">Transaction Volume by Type</div>
                            <div class="chart-container">
                                <canvas id="transactionVolumeChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="dashboard-card">
                            <div class="card-title">Transaction Distribution</div>
                            <div class="chart-container">
                                <canvas id="transactionDistributionChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filters and Search -->
                <div class="filters-section">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="filter-group">
                                <label class="form-label">Search Transactions</label>
                                <input type="text" class="form-control" id="transactionSearch"
                                    placeholder="User, reference, or ID">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="filter-group">
                                <label class="form-label">Type</label>
                                <select class="form-select" id="typeFilter">
                                    <option value="">All Types</option>
                                    <option value="deposit">Deposit</option>
                                    <option value="withdrawal">Withdrawal</option>
                                    <option value="profit">Profit</option>
                                    <option value="fee">Fee</option>
                                    <option value="transfer">Transfer</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="filter-group">
                                <label class="form-label">Status</label>
                                <select class="form-select" id="statusFilter">
                                    <option value="">All Statuses</option>
                                    <option value="completed">Completed</option>
                                    <option value="pending">Pending</option>
                                    <option value="failed">Failed</option>
                                    <option value="reversed">Reversed</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="filter-group">
                                <label class="form-label">Method</label>
                                <select class="form-select" id="methodFilter">
                                    <option value="">All Methods</option>
                                    <option value="bank">Bank Transfer</option>
                                    <option value="crypto">Cryptocurrency</option>
                                    <option value="wire">Wire Transfer</option>
                                    <option value="cashapp">Cash App</option>
                                    <option value="manual">Manual</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-items-end">
                            <div class="filter-group w-100">
                                <div class="d-flex gap-2">
                                    <button class="btn btn-admin w-50" id="applyFiltersBtn">
                                        <i class="fas fa-filter me-2"></i> Apply
                                    </button>
                                    <button class="btn btn-outline-secondary w-50" id="exportBtn">
                                        <i class="fas fa-download me-2"></i> Export
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="filter-group">
                                <label class="form-label">Date Range</label>
                                <div class="d-flex gap-2">
                                    <input type="date" class="form-control" id="startDate">
                                    <span class="d-flex align-items-center">to</span>
                                    <input type="date" class="form-control" id="endDate">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="filter-group">
                                <label class="form-label">Amount Range</label>
                                <div class="d-flex gap-2">
                                    <input type="number" class="form-control" placeholder="Min" id="minAmount">
                                    <input type="number" class="form-control" placeholder="Max" id="maxAmount">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-items-end">
                            <div class="filter-group w-100">
                                <button class="btn btn-outline-primary w-100" id="resetFiltersBtn">
                                    <i class="fas fa-redo me-2"></i> Reset Filters
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Transactions Table -->
                <div class="dashboard-card">
                    <div class="card-title d-flex justify-content-between align-items-center">
                        <span>All Transactions (12,847)</span>
                        <div class="d-flex align-items-center">
                            <span class="me-2">Show:</span>
                            <select class="form-select form-select-sm" style="width: auto;">
                                <option>25</option>
                                <option selected>50</option>
                                <option>100</option>
                                <option>250</option>
                            </select>
                        </div>
                    </div>
                    <div class="transactions-table">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="5%">ID</th>
                                    <th>User</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Method</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Reference</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="fw-bold">#TXN-9874</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="user-avatar me-2"
                                                style="width: 35px; height: 35px; font-size: 0.8rem;">JD</div>
                                            <div>
                                                <div class="fw-bold">John Doe</div>
                                                <small class="text-muted">JD-1245</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="type-badge type-deposit">Deposit</span></td>
                                    <td class="amount-positive">+$2,500.00</td>
                                    <td><span class="method-badge method-bank">Bank Transfer</span></td>
                                    <td><span class="status-badge status-completed">Completed</span></td>
                                    <td>Oct 15, 2023<br><small class="text-muted">10:23 AM</small></td>
                                    <td>Manual adjustment</td>
                                    <td>
                                        <div class="transaction-actions">
                                            <button class="btn-action btn-view" data-transaction="TXN-9874"
                                                title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn-action btn-reverse" data-transaction="TXN-9874"
                                                title="Reverse Transaction">
                                                <i class="fas fa-undo"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">#TXN-9873</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="user-avatar me-2"
                                                style="width: 35px; height: 35px; font-size: 0.8rem; background-color: var(--success-green);">
                                                SJ</div>
                                            <div>
                                                <div class="fw-bold">Sarah Johnson</div>
                                                <small class="text-muted">SJ-3678</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="type-badge type-withdrawal">Withdrawal</span></td>
                                    <td class="amount-negative">-$1,200.00</td>
                                    <td><span class="method-badge method-crypto">Cryptocurrency</span></td>
                                    <td><span class="status-badge status-pending">Pending</span></td>
                                    <td>Oct 15, 2023<br><small class="text-muted">09:45 AM</small></td>
                                    <td>BTC withdrawal</td>
                                    <td>
                                        <div class="transaction-actions">
                                            <button class="btn-action btn-view" data-transaction="TXN-9873"
                                                title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn-action btn-edit" data-transaction="TXN-9873"
                                                title="Edit Transaction">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn-action btn-reverse" data-transaction="TXN-9873"
                                                title="Reverse Transaction">
                                                <i class="fas fa-undo"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">#TXN-9872</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="user-avatar me-2"
                                                style="width: 35px; height: 35px; font-size: 0.8rem; background-color: var(--warning-orange);">
                                                MB</div>
                                            <div>
                                                <div class="fw-bold">Michael Brown</div>
                                                <small class="text-muted">MB-5891</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="type-badge type-profit">Profit</span></td>
                                    <td class="amount-positive">+$350.00</td>
                                    <td><span class="method-badge method-manual">Manual</span></td>
                                    <td><span class="status-badge status-completed">Completed</span></td>
                                    <td>Oct 14, 2023<br><small class="text-muted">03:12 PM</small></td>
                                    <td>AI Growth Fund</td>
                                    <td>
                                        <div class="transaction-actions">
                                            <button class="btn-action btn-view" data-transaction="TXN-9872"
                                                title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">#TXN-9871</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="user-avatar me-2"
                                                style="width: 35px; height: 35px; font-size: 0.8rem; background-color: var(--accent-blue);">
                                                ED</div>
                                            <div>
                                                <div class="fw-bold">Emily Davis</div>
                                                <small class="text-muted">ED-7123</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="type-badge type-fee">Fee</span></td>
                                    <td class="amount-negative">-$15.00</td>
                                    <td><span class="method-badge method-wire">Wire Transfer</span></td>
                                    <td><span class="status-badge status-completed">Completed</span></td>
                                    <td>Oct 14, 2023<br><small class="text-muted">11:30 AM</small></td>
                                    <td>Wire transfer fee</td>
                                    <td>
                                        <div class="transaction-actions">
                                            <button class="btn-action btn-view" data-transaction="TXN-9871"
                                                title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">#TXN-9870</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="user-avatar me-2"
                                                style="width: 35px; height: 35px; font-size: 0.8rem; background-color: var(--danger-red);">
                                                TW</div>
                                            <div>
                                                <div class="fw-bold">Thomas Wilson</div>
                                                <small class="text-muted">TW-9456</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="type-badge type-withdrawal">Withdrawal</span></td>
                                    <td class="amount-negative">-$3,200.00</td>
                                    <td><span class="method-badge method-bank">Bank Transfer</span></td>
                                    <td><span class="status-badge status-failed">Failed</span></td>
                                    <td>Oct 13, 2023<br><small class="text-muted">04:45 PM</small></td>
                                    <td>Insufficient funds</td>
                                    <td>
                                        <div class="transaction-actions">
                                            <button class="btn-action btn-view" data-transaction="TXN-9870"
                                                title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn-action btn-edit" data-transaction="TXN-9870"
                                                title="Edit Transaction">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="pagination-container">
                        <div class="text-muted">Showing 1 to 5 of 12,847 entries</div>
                        <nav aria-label="Transaction pagination">
                            <ul class="pagination mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize charts
            const volumeCtx = document.getElementById('transactionVolumeChart').getContext('2d');
            const volumeChart = new Chart(volumeCtx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
                    datasets: [{
                        label: 'Deposits',
                        data: [450000, 520000, 610000, 730000, 820000, 950000, 880000, 920000, 870000, 780000],
                        backgroundColor: 'rgba(0, 200, 83, 0.7)',
                        borderColor: 'rgba(0, 200, 83, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Withdrawals',
                        data: [320000, 380000, 420000, 510000, 590000, 680000, 720000, 650000, 610000, 530000],
                        backgroundColor: 'rgba(255, 152, 0, 0.7)',
                        borderColor: 'rgba(255, 152, 0, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Profits',
                        data: [120000, 150000, 180000, 210000, 240000, 280000, 250000, 270000, 290000, 310000],
                        backgroundColor: 'rgba(0, 82, 163, 0.7)',
                        borderColor: 'rgba(0, 82, 163, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            },
                            ticks: {
                                color: '#a8c6e5',
                                callback: function(value) {
                                    return '$' + (value / 1000) + 'K';
                                }
                            }
                        },
                        x: {
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            },
                            ticks: {
                                color: '#a8c6e5'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: '#a8c6e5'
                            }
                        }
                    }
                }
            });
            
            const distributionCtx = document.getElementById('transactionDistributionChart').getContext('2d');
            const distributionChart = new Chart(distributionCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Deposits', 'Withdrawals', 'Profits', 'Fees', 'Transfers'],
                    datasets: [{
                        data: [45, 32, 15, 5, 3],
                        backgroundColor: [
                            'rgba(0, 200, 83, 0.7)',
                            'rgba(255, 152, 0, 0.7)',
                            'rgba(0, 82, 163, 0.7)',
                            'rgba(108, 117, 125, 0.7)',
                            'rgba(111, 66, 193, 0.7)'
                        ],
                        borderColor: [
                            'rgba(0, 200, 83, 1)',
                            'rgba(255, 152, 0, 1)',
                            'rgba(0, 82, 163, 1)',
                            'rgba(108, 117, 125, 1)',
                            'rgba(111, 66, 193, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                color: '#a8c6e5',
                                padding: 20
                            }
                        }
                    }
                }
            });
            
            // Transaction action buttons
            document.querySelectorAll('.btn-view').forEach(button => {
                button.addEventListener('click', function() {
                    const transactionId = this.getAttribute('data-transaction');
                    alert(`Viewing details for transaction: ${transactionId}`);
                    // In a real app, this would open a modal with transaction details
                });
            });
            
            document.querySelectorAll('.btn-edit').forEach(button => {
                button.addEventListener('click', function() {
                    const transactionId = this.getAttribute('data-transaction');
                    alert(`Editing transaction: ${transactionId}`);
                    // In a real app, this would open an edit modal
                });
            });
            
            document.querySelectorAll('.btn-reverse').forEach(button => {
                button.addEventListener('click', function() {
                    const transactionId = this.getAttribute('data-transaction');
                    const reason = prompt('Please enter reversal reason:');
                    if (reason) {
                        alert(`Transaction ${transactionId} reversed. Reason: ${reason}`);
                        // In a real app, this would reverse the transaction via API
                    }
                });
            });
            
            // Apply filters button
            document.getElementById('applyFiltersBtn').addEventListener('click', function() {
                const search = document.getElementById('transactionSearch').value;
                const type = document.getElementById('typeFilter').value;
                const status = document.getElementById('statusFilter').value;
                const method = document.getElementById('methodFilter').value;
                const startDate = document.getElementById('startDate').value;
                const endDate = document.getElementById('endDate').value;
                const minAmount = document.getElementById('minAmount').value;
                const maxAmount = document.getElementById('maxAmount').value;
                
                // In a real app, this would filter the transactions table
                console.log(`Applying filters - Search: ${search}, Type: ${type}, Status: ${status}, Method: ${method}, Date: ${startDate} to ${endDate}, Amount: ${minAmount} to ${maxAmount}`);
                alert('Filters applied successfully');
            });
            
            // Export button
            document.getElementById('exportBtn').addEventListener('click', function() {
                alert('Exporting transaction data...');
                // In a real app, this would trigger a CSV/Excel download
            });
            
            // Reset filters button
            document.getElementById('resetFiltersBtn').addEventListener('click', function() {
                document.getElementById('transactionSearch').value = '';
                document.getElementById('typeFilter').value = '';
                document.getElementById('statusFilter').value = '';
                document.getElementById('methodFilter').value = '';
                document.getElementById('startDate').value = '';
                document.getElementById('endDate').value = '';
                document.getElementById('minAmount').value = '';
                document.getElementById('maxAmount').value = '';
                alert('Filters reset');
            });
            
            // Search functionality
            document.getElementById('transactionSearch').addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                // In a real app, this would filter the transactions table in real-time
                console.log(`Searching for: ${searchTerm}`);
            });
        });
    </script>
</body>

</html>
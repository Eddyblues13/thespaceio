<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenex - Withdrawal Control</title>
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

        /* Admin Actions */
        .admin-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 30px;
        }

        .admin-action {
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

        .admin-action:hover {
            background-color: var(--accent-blue);
            transform: translateY(-3px);
        }

        .admin-action.active {
            border-color: var(--success-green);
            background-color: var(--light-blue);
        }

        .action-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        /* Forms */
        .admin-form {
            background-color: var(--primary-blue);
            border-radius: 10px;
            padding: 25px;
            border: 1px solid var(--border-color);
            margin-bottom: 20px;
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

        .btn-success {
            background-color: var(--success-green);
            border-color: var(--success-green);
        }

        .btn-warning {
            background-color: var(--warning-orange);
            border-color: var(--warning-orange);
        }

        /* Withdrawals Table */
        .withdrawals-table {
            background-color: var(--primary-blue);
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid var(--border-color);
        }

        .withdrawals-table table {
            margin-bottom: 0;
            color: var(--text-color);
        }

        .withdrawals-table thead {
            background-color: var(--admin-purple);
            color: white;
        }

        .withdrawals-table th {
            padding: 15px;
            font-weight: 600;
            border: none;
        }

        .withdrawals-table td {
            padding: 15px;
            border-color: var(--border-color);
        }

        .withdrawals-table tbody tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.05);
        }

        .withdrawals-table tbody tr:hover {
            background-color: rgba(0, 82, 163, 0.1);
        }

        .withdrawal-actions {
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

        .btn-approve {
            background-color: var(--success-green);
            color: white;
        }

        .btn-reject {
            background-color: var(--danger-red);
            color: white;
        }

        .btn-hold {
            background-color: var(--warning-orange);
            color: white;
        }

        .btn-view {
            background-color: var(--accent-blue);
            color: white;
        }

        .btn-process {
            background-color: var(--admin-purple);
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

        .status-rejected {
            background-color: rgba(244, 67, 54, 0.2);
            color: var(--danger-red);
        }

        .status-processing {
            background-color: rgba(111, 66, 193, 0.2);
            color: var(--admin-purple);
        }

        .status-onhold {
            background-color: rgba(108, 117, 125, 0.2);
            color: #6c757d;
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

        /* Priority indicators */
        .priority-high {
            color: var(--danger-red);
        }

        .priority-medium {
            color: var(--warning-orange);
        }

        .priority-low {
            color: var(--success-green);
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

            .admin-action {
                min-width: 150px;
            }

            .card-value {
                font-size: 1.5rem;
            }

            .withdrawals-table {
                overflow-x: auto;
            }

            .withdrawal-actions {
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

            .admin-actions {
                flex-direction: column;
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
                            <a class="nav-link" href="admin-transactions">
                                <i class="fas fa-exchange-alt"></i> Transactions
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin-deposits">
                                <i class="fas fa-plus-circle"></i> Deposit Control
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="admin-withdrawals">
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
                    <h4 class="mb-0">Withdrawal Control</h4>
                    <div class="user-info">
                        <div class="user-avatar">AD</div>
                        <div>
                            <div class="fw-bold">Admin User</div>
                            <small class="text-muted">Super Administrator</small>
                        </div>
                    </div>
                </div>

                <!-- Withdrawal Stats -->
                <div class="row mb-4">
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-title">Pending Withdrawals</div>
                            <div class="card-value">$187,250</div>
                            <div class="card-change negative">
                                <i class="fas fa-exclamation-circle"></i> 42 requests
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-title">Processed Today</div>
                            <div class="card-value">$56,800</div>
                            <div class="card-change positive">
                                <i class="fas fa-check-circle"></i> 18 withdrawals
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-title">Avg. Processing Time</div>
                            <div class="card-value">4.2h</div>
                            <div class="card-change positive">
                                <i class="fas fa-arrow-down"></i> -12% from last week
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-title">Rejection Rate</div>
                            <div class="card-value">3.2%</div>
                            <div class="card-change negative">
                                <i class="fas fa-arrow-up"></i> +0.8% this month
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <div class="card-title">Quick Actions</div>
                            <div class="admin-actions">
                                <div class="admin-action" data-action="process-withdrawal">
                                    <div class="action-icon">
                                        <i class="fas fa-hand-holding-usd"></i>
                                    </div>
                                    <div class="fw-bold">Process Withdrawal</div>
                                    <small>Manual processing</small>
                                </div>
                                <div class="admin-action" data-action="approve-all">
                                    <div class="action-icon">
                                        <i class="fas fa-check-double"></i>
                                    </div>
                                    <div class="fw-bold">Approve All Verified</div>
                                    <small>Batch approval</small>
                                </div>
                                <div class="admin-action" data-action="export-withdrawals">
                                    <div class="action-icon">
                                        <i class="fas fa-file-export"></i>
                                    </div>
                                    <div class="fw-bold">Export Withdrawals</div>
                                    <small>CSV, Excel, PDF</small>
                                </div>
                                <div class="admin-action" data-action="withdrawal-settings">
                                    <div class="action-icon">
                                        <i class="fas fa-cog"></i>
                                    </div>
                                    <div class="fw-bold">Withdrawal Settings</div>
                                    <small>Limits & methods</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Process Withdrawal Form -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="admin-form" id="process-withdrawal-form">
                            <div class="card-title">Process Manual Withdrawal</div>
                            <form id="withdrawalForm">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Select User</label>
                                            <select class="form-select" id="withdrawalUser" required>
                                                <option value="">Select a user...</option>
                                                <option value="JD-1245">John Doe (JD-1245) - Balance: $12,450</option>
                                                <option value="SJ-3678">Sarah Johnson (SJ-3678) - Balance: $8,720
                                                </option>
                                                <option value="MB-5891">Michael Brown (MB-5891) - Balance: $23,150
                                                </option>
                                                <option value="ED-7123">Emily Davis (ED-7123) - Balance: $5,430</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Withdrawal Amount (USD)</label>
                                            <input type="number" class="form-control" id="withdrawalAmount"
                                                placeholder="0.00" min="1" step="0.01" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Withdrawal Method</label>
                                            <select class="form-select" id="withdrawalMethod" required>
                                                <option value="bank">Bank Transfer</option>
                                                <option value="crypto">Cryptocurrency</option>
                                                <option value="wire">Wire Transfer</option>
                                                <option value="cashapp">Cash App</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Priority</label>
                                            <select class="form-select" id="withdrawalPriority">
                                                <option value="low">Low</option>
                                                <option value="medium" selected>Medium</option>
                                                <option value="high">High</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Destination Details</label>
                                    <textarea class="form-control" id="withdrawalDetails" rows="2"
                                        placeholder="Bank account, wallet address, or other destination details..."
                                        required></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Admin Notes</label>
                                    <textarea class="form-control" id="withdrawalNotes" rows="2"
                                        placeholder="Internal notes for this withdrawal..."></textarea>
                                </div>

                                <div class="d-flex justify-content-end gap-2">
                                    <button type="reset" class="btn btn-outline-secondary">Clear Form</button>
                                    <button type="submit" class="btn btn-admin">Process Withdrawal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Filters and Search -->
                <div class="filters-section">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="filter-group">
                                <label class="form-label">Search Withdrawals</label>
                                <input type="text" class="form-control" id="withdrawalSearch"
                                    placeholder="User, reference, or ID">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="filter-group">
                                <label class="form-label">Status</label>
                                <select class="form-select" id="statusFilter">
                                    <option value="">All Statuses</option>
                                    <option value="pending">Pending</option>
                                    <option value="processing">Processing</option>
                                    <option value="completed">Completed</option>
                                    <option value="rejected">Rejected</option>
                                    <option value="onhold">On Hold</option>
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
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="filter-group">
                                <label class="form-label">Priority</label>
                                <select class="form-select" id="priorityFilter">
                                    <option value="">All Priorities</option>
                                    <option value="high">High</option>
                                    <option value="medium">Medium</option>
                                    <option value="low">Low</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-items-end">
                            <div class="filter-group w-100">
                                <button class="btn btn-admin w-100" id="applyFiltersBtn">
                                    <i class="fas fa-filter me-2"></i> Apply Filters
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Withdrawals Table -->
                <div class="dashboard-card">
                    <div class="card-title d-flex justify-content-between align-items-center">
                        <span>All Withdrawals (842)</span>
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
                    <div class="withdrawals-table">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="5%">ID</th>
                                    <th>User</th>
                                    <th>Amount</th>
                                    <th>Method</th>
                                    <th>Status</th>
                                    <th>Priority</th>
                                    <th>Request Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="fw-bold">#WD-4587</td>
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
                                    <td>$2,500.00</td>
                                    <td><span class="method-badge method-bank">Bank Transfer</span></td>
                                    <td><span class="status-badge status-pending">Pending</span></td>
                                    <td><i class="fas fa-flag priority-medium"></i> Medium</td>
                                    <td>Oct 15, 2023<br><small class="text-muted">10:23 AM</small></td>
                                    <td>
                                        <div class="withdrawal-actions">
                                            <button class="btn-action btn-approve" data-withdrawal="WD-4587"
                                                title="Approve">
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button class="btn-action btn-reject" data-withdrawal="WD-4587"
                                                title="Reject">
                                                <i class="fas fa-times"></i>
                                            </button>
                                            <button class="btn-action btn-hold" data-withdrawal="WD-4587"
                                                title="Put on Hold">
                                                <i class="fas fa-pause"></i>
                                            </button>
                                            <button class="btn-action btn-view" data-withdrawal="WD-4587"
                                                title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">#WD-4586</td>
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
                                    <td>$1,200.00</td>
                                    <td><span class="method-badge method-crypto">Cryptocurrency</span></td>
                                    <td><span class="status-badge status-processing">Processing</span></td>
                                    <td><i class="fas fa-flag priority-high"></i> High</td>
                                    <td>Oct 15, 2023<br><small class="text-muted">09:45 AM</small></td>
                                    <td>
                                        <div class="withdrawal-actions">
                                            <button class="btn-action btn-process" data-withdrawal="WD-4586"
                                                title="Mark as Completed">
                                                <i class="fas fa-check-double"></i>
                                            </button>
                                            <button class="btn-action btn-hold" data-withdrawal="WD-4586"
                                                title="Put on Hold">
                                                <i class="fas fa-pause"></i>
                                            </button>
                                            <button class="btn-action btn-view" data-withdrawal="WD-4586"
                                                title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">#WD-4585</td>
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
                                    <td>$5,000.00</td>
                                    <td><span class="method-badge method-wire">Wire Transfer</span></td>
                                    <td><span class="status-badge status-onhold">On Hold</span></td>
                                    <td><i class="fas fa-flag priority-high"></i> High</td>
                                    <td>Oct 14, 2023<br><small class="text-muted">03:12 PM</small></td>
                                    <td>
                                        <div class="withdrawal-actions">
                                            <button class="btn-action btn-approve" data-withdrawal="WD-4585"
                                                title="Approve">
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button class="btn-action btn-reject" data-withdrawal="WD-4585"
                                                title="Reject">
                                                <i class="fas fa-times"></i>
                                            </button>
                                            <button class="btn-action btn-view" data-withdrawal="WD-4585"
                                                title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">#WD-4584</td>
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
                                    <td>$750.00</td>
                                    <td><span class="method-badge method-cashapp">Cash App</span></td>
                                    <td><span class="status-badge status-completed">Completed</span></td>
                                    <td><i class="fas fa-flag priority-low"></i> Low</td>
                                    <td>Oct 14, 2023<br><small class="text-muted">11:30 AM</small></td>
                                    <td>
                                        <div class="withdrawal-actions">
                                            <button class="btn-action btn-view" data-withdrawal="WD-4584"
                                                title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">#WD-4583</td>
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
                                    <td>$3,200.00</td>
                                    <td><span class="method-badge method-bank">Bank Transfer</span></td>
                                    <td><span class="status-badge status-rejected">Rejected</span></td>
                                    <td><i class="fas fa-flag priority-medium"></i> Medium</td>
                                    <td>Oct 13, 2023<br><small class="text-muted">04:45 PM</small></td>
                                    <td>
                                        <div class="withdrawal-actions">
                                            <button class="btn-action btn-view" data-withdrawal="WD-4583"
                                                title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="pagination-container">
                        <div class="text-muted">Showing 1 to 5 of 842 entries</div>
                        <nav aria-label="Withdrawal pagination">
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
            // Admin action buttons
            document.querySelectorAll('.admin-action').forEach(action => {
                action.addEventListener('click', function() {
                    const actionType = this.getAttribute('data-action');
                    
                    switch(actionType) {
                        case 'process-withdrawal':
                            document.getElementById('process-withdrawal-form').scrollIntoView({ behavior: 'smooth' });
                            break;
                        case 'approve-all':
                            if (confirm('Are you sure you want to approve all verified withdrawals?')) {
                                alert('All verified withdrawals have been approved');
                                // In a real app, this would make an API call
                            }
                            break;
                        case 'export-withdrawals':
                            alert('Exporting withdrawal data...');
                            // In a real app, this would trigger a download
                            break;
                        case 'withdrawal-settings':
                            alert('Opening withdrawal settings...');
                            // In a real app, this would open a settings modal
                            break;
                    }
                });
            });
            
            // Withdrawal form submission
            document.getElementById('withdrawalForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const user = document.getElementById('withdrawalUser').value;
                const amount = document.getElementById('withdrawalAmount').value;
                const method = document.getElementById('withdrawalMethod').value;
                const priority = document.getElementById('withdrawalPriority').value;
                const details = document.getElementById('withdrawalDetails').value;
                const notes = document.getElementById('withdrawalNotes').value;
                
                if (!user || !amount || !details) {
                    alert('Please fill in all required fields');
                    return;
                }
                
                // In a real application, this would send the data to the server
                alert(`Manual withdrawal of $${amount} processed for user via ${method} (Priority: ${priority})`);
                this.reset();
            });
            
            // Withdrawal action buttons
            document.querySelectorAll('.btn-approve').forEach(button => {
                button.addEventListener('click', function() {
                    const withdrawalId = this.getAttribute('data-withdrawal');
                    if (confirm(`Approve withdrawal ${withdrawalId}?`)) {
                        alert(`Withdrawal ${withdrawalId} approved successfully`);
                        // In a real app, this would update the status via API
                    }
                });
            });
            
            document.querySelectorAll('.btn-reject').forEach(button => {
                button.addEventListener('click', function() {
                    const withdrawalId = this.getAttribute('data-withdrawal');
                    const reason = prompt('Please enter rejection reason:');
                    if (reason) {
                        alert(`Withdrawal ${withdrawalId} rejected. Reason: ${reason}`);
                        // In a real app, this would update the status via API
                    }
                });
            });
            
            document.querySelectorAll('.btn-hold').forEach(button => {
                button.addEventListener('click', function() {
                    const withdrawalId = this.getAttribute('data-withdrawal');
                    const reason = prompt('Please enter hold reason:');
                    if (reason) {
                        alert(`Withdrawal ${withdrawalId} put on hold. Reason: ${reason}`);
                        // In a real app, this would update the status via API
                    }
                });
            });
            
            document.querySelectorAll('.btn-process').forEach(button => {
                button.addEventListener('click', function() {
                    const withdrawalId = this.getAttribute('data-withdrawal');
                    if (confirm(`Mark withdrawal ${withdrawalId} as completed?`)) {
                        alert(`Withdrawal ${withdrawalId} marked as completed`);
                        // In a real app, this would update the status via API
                    }
                });
            });
            
            document.querySelectorAll('.btn-view').forEach(button => {
                button.addEventListener('click', function() {
                    const withdrawalId = this.getAttribute('data-withdrawal');
                    alert(`Viewing details for withdrawal: ${withdrawalId}`);
                    // In a real app, this would open a modal with withdrawal details
                });
            });
            
            // Apply filters button
            document.getElementById('applyFiltersBtn').addEventListener('click', function() {
                const search = document.getElementById('withdrawalSearch').value;
                const status = document.getElementById('statusFilter').value;
                const method = document.getElementById('methodFilter').value;
                const priority = document.getElementById('priorityFilter').value;
                
                // In a real app, this would filter the withdrawals table
                console.log(`Applying filters - Search: ${search}, Status: ${status}, Method: ${method}, Priority: ${priority}`);
                alert('Filters applied successfully');
            });
            
            // Search functionality
            document.getElementById('withdrawalSearch').addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                // In a real app, this would filter the withdrawals table in real-time
                console.log(`Searching for: ${searchTerm}`);
            });
        });
    </script>
</body>

</html>
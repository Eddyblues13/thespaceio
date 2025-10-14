<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenex - Deposit Control</title>
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
        
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
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
        
        .form-control, .form-select {
            background-color: var(--dark-blue);
            border: 1px solid var(--border-color);
            color: var(--text-color);
            padding: 10px 15px;
        }
        
        .form-control:focus, .form-select:focus {
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
        
        /* Deposits Table */
        .deposits-table {
            background-color: var(--primary-blue);
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid var(--border-color);
        }
        
        .deposits-table table {
            margin-bottom: 0;
            color: var(--text-color);
        }
        
        .deposits-table thead {
            background-color: var(--admin-purple);
            color: white;
        }
        
        .deposits-table th {
            padding: 15px;
            font-weight: 600;
            border: none;
        }
        
        .deposits-table td {
            padding: 15px;
            border-color: var(--border-color);
        }
        
        .deposits-table tbody tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.05);
        }
        
        .deposits-table tbody tr:hover {
            background-color: rgba(0, 82, 163, 0.1);
        }
        
        .deposit-actions {
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
            
            .deposits-table {
                overflow-x: auto;
            }
            
            .deposit-actions {
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
            
            .filters-section .row > div {
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
                    <a class="navbar-brand" href="index.html">
                        <i class="fas fa-robot me-2"></i>Tenex <span class="admin-badge">ADMIN</span>
                    </a>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="admin-dashboard.html">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin-users.html">
                                <i class="fas fa-users"></i> User Management
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin-transactions.html">
                                <i class="fas fa-exchange-alt"></i> Transactions
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="admin-deposits.html">
                                <i class="fas fa-plus-circle"></i> Deposit Control
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin-withdrawals.html">
                                <i class="fas fa-minus-circle"></i> Withdrawal Control
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin-reports.html">
                                <i class="fas fa-chart-bar"></i> Reports & Analytics
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin-settings.html">
                                <i class="fas fa-cogs"></i> System Settings
                            </a>
                        </li>
                        <li class="nav-item mt-4">
                            <a class="nav-link" href="dashboard.html">
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
                    <h4 class="mb-0">Deposit Control</h4>
                    <div class="user-info">
                        <div class="user-avatar">AD</div>
                        <div>
                            <div class="fw-bold">Admin User</div>
                            <small class="text-muted">Super Administrator</small>
                        </div>
                    </div>
                </div>
                
                <!-- Deposit Stats -->
                <div class="row mb-4">
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-title">Total Deposits</div>
                            <div class="card-value">$4.82M</div>
                            <div class="card-change positive">
                                <i class="fas fa-arrow-up"></i> +12.7% ($542K)
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-title">Pending Deposits</div>
                            <div class="card-value">$124,500</div>
                            <div class="card-change negative">
                                <i class="fas fa-exclamation-circle"></i> 23 deposits
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-title">Today's Deposits</div>
                            <div class="card-value">$42,800</div>
                            <div class="card-change positive">
                                <i class="fas fa-arrow-up"></i> +8.3% ($3,280)
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-title">Avg. Deposit</div>
                            <div class="card-value">$3,865</div>
                            <div class="card-change">
                                <i class="fas fa-chart-line"></i> +5.2% from last month
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
                                <div class="admin-action" data-action="add-deposit">
                                    <div class="action-icon">
                                        <i class="fas fa-money-bill-wave"></i>
                                    </div>
                                    <div class="fw-bold">Add Manual Deposit</div>
                                    <small>Credit user account</small>
                                </div>
                                <div class="admin-action" data-action="approve-all">
                                    <div class="action-icon">
                                        <i class="fas fa-check-double"></i>
                                    </div>
                                    <div class="fw-bold">Approve All Pending</div>
                                    <small>Batch approval</small>
                                </div>
                                <div class="admin-action" data-action="export-deposits">
                                    <div class="action-icon">
                                        <i class="fas fa-file-export"></i>
                                    </div>
                                    <div class="fw-bold">Export Deposits</div>
                                    <small>CSV, Excel, PDF</small>
                                </div>
                                <div class="admin-action" data-action="deposit-settings">
                                    <div class="action-icon">
                                        <i class="fas fa-cog"></i>
                                    </div>
                                    <div class="fw-bold">Deposit Settings</div>
                                    <small>Limits & methods</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Add Deposit Form -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="admin-form" id="add-deposit-form">
                            <div class="card-title">Add Manual Deposit</div>
                            <form id="depositForm">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Select User</label>
                                            <select class="form-select" id="depositUser" required>
                                                <option value="">Select a user...</option>
                                                <option value="JD-1245">John Doe (JD-1245) - Balance: $12,450</option>
                                                <option value="SJ-3678">Sarah Johnson (SJ-3678) - Balance: $8,720</option>
                                                <option value="MB-5891">Michael Brown (MB-5891) - Balance: $23,150</option>
                                                <option value="ED-7123">Emily Davis (ED-7123) - Balance: $5,430</option>
                                            </select>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label">Deposit Amount (USD)</label>
                                            <input type="number" class="form-control" id="depositAmount" placeholder="0.00" min="1" step="0.01" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Deposit Method</label>
                                            <select class="form-select" id="depositMethod" required>
                                                <option value="bank">Bank Transfer</option>
                                                <option value="crypto">Cryptocurrency</option>
                                                <option value="wire">Wire Transfer</option>
                                                <option value="cashapp">Cash App</option>
                                                <option value="manual">Manual Adjustment</option>
                                            </select>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label">Reference/Notes</label>
                                            <textarea class="form-control" id="depositNotes" rows="2" placeholder="Add any reference or notes..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="d-flex justify-content-end gap-2">
                                    <button type="reset" class="btn btn-outline-secondary">Clear Form</button>
                                    <button type="submit" class="btn btn-admin">Process Deposit</button>
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
                                <label class="form-label">Search Deposits</label>
                                <input type="text" class="form-control" id="depositSearch" placeholder="User, reference, or ID">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="filter-group">
                                <label class="form-label">Status</label>
                                <select class="form-select" id="statusFilter">
                                    <option value="">All Statuses</option>
                                    <option value="completed">Completed</option>
                                    <option value="pending">Pending</option>
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
                                    <option value="manual">Manual</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="filter-group">
                                <label class="form-label">Date Range</label>
                                <select class="form-select" id="dateFilter">
                                    <option value="">All Time</option>
                                    <option value="today">Today</option>
                                    <option value="week">This Week</option>
                                    <option value="month">This Month</option>
                                    <option value="quarter">This Quarter</option>
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
                
                <!-- Deposits Table -->
                <div class="dashboard-card">
                    <div class="card-title d-flex justify-content-between align-items-center">
                        <span>All Deposits (1,247)</span>
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
                    <div class="deposits-table">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="5%">ID</th>
                                    <th>User</th>
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
                                    <td class="fw-bold">#DEP-7845</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="user-avatar me-2" style="width: 35px; height: 35px; font-size: 0.8rem;">JD</div>
                                            <div>
                                                <div class="fw-bold">John Doe</div>
                                                <small class="text-muted">JD-1245</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$2,500.00</td>
                                    <td><span class="method-badge method-bank">Bank Transfer</span></td>
                                    <td><span class="status-badge status-completed">Completed</span></td>
                                    <td>Oct 15, 2023<br><small class="text-muted">10:23 AM</small></td>
                                    <td>Manual adjustment</td>
                                    <td>
                                        <div class="deposit-actions">
                                            <button class="btn-action btn-view" data-deposit="DEP-7845" title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">#DEP-7844</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="user-avatar me-2" style="width: 35px; height: 35px; font-size: 0.8rem; background-color: var(--success-green);">SJ</div>
                                            <div>
                                                <div class="fw-bold">Sarah Johnson</div>
                                                <small class="text-muted">SJ-3678</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$1,200.00</td>
                                    <td><span class="method-badge method-crypto">Cryptocurrency</span></td>
                                    <td><span class="status-badge status-pending">Pending</span></td>
                                    <td>Oct 15, 2023<br><small class="text-muted">09:45 AM</small></td>
                                    <td>BTC deposit - 3 confirmations</td>
                                    <td>
                                        <div class="deposit-actions">
                                            <button class="btn-action btn-approve" data-deposit="DEP-7844" title="Approve">
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button class="btn-action btn-reject" data-deposit="DEP-7844" title="Reject">
                                                <i class="fas fa-times"></i>
                                            </button>
                                            <button class="btn-action btn-hold" data-deposit="DEP-7844" title="Put on Hold">
                                                <i class="fas fa-pause"></i>
                                            </button>
                                            <button class="btn-action btn-view" data-deposit="DEP-7844" title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">#DEP-7843</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="user-avatar me-2" style="width: 35px; height: 35px; font-size: 0.8rem; background-color: var(--warning-orange);">MB</div>
                                            <div>
                                                <div class="fw-bold">Michael Brown</div>
                                                <small class="text-muted">MB-5891</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$5,000.00</td>
                                    <td><span class="method-badge method-wire">Wire Transfer</span></td>
                                    <td><span class="status-badge status-onhold">On Hold</span></td>
                                    <td>Oct 14, 2023<br><small class="text-muted">03:12 PM</small></td>
                                    <td>International wire - verification needed</td>
                                    <td>
                                        <div class="deposit-actions">
                                            <button class="btn-action btn-approve" data-deposit="DEP-7843" title="Approve">
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button class="btn-action btn-reject" data-deposit="DEP-7843" title="Reject">
                                                <i class="fas fa-times"></i>
                                            </button>
                                            <button class="btn-action btn-view" data-deposit="DEP-7843" title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">#DEP-7842</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="user-avatar me-2" style="width: 35px; height: 35px; font-size: 0.8rem; background-color: var(--accent-blue);">ED</div>
                                            <div>
                                                <div class="fw-bold">Emily Davis</div>
                                                <small class="text-muted">ED-7123</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$750.00</td>
                                    <td><span class="method-badge method-cashapp">Cash App</span></td>
                                    <td><span class="status-badge status-completed">Completed</span></td>
                                    <td>Oct 14, 2023<br><small class="text-muted">11:30 AM</small></td>
                                    <td>Instant transfer</td>
                                    <td>
                                        <div class="deposit-actions">
                                            <button class="btn-action btn-view" data-deposit="DEP-7842" title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">#DEP-7841</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="user-avatar me-2" style="width: 35px; height: 35px; font-size: 0.8rem; background-color: var(--danger-red);">TW</div>
                                            <div>
                                                <div class="fw-bold">Thomas Wilson</div>
                                                <small class="text-muted">TW-9456</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$3,200.00</td>
                                    <td><span class="method-badge method-bank">Bank Transfer</span></td>
                                    <td><span class="status-badge status-rejected">Rejected</span></td>
                                    <td>Oct 13, 2023<br><small class="text-muted">04:45 PM</small></td>
                                    <td>Insufficient funds</td>
                                    <td>
                                        <div class="deposit-actions">
                                            <button class="btn-action btn-view" data-deposit="DEP-7841" title="View Details">
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
                        <div class="text-muted">Showing 1 to 5 of 1,247 entries</div>
                        <nav aria-label="Deposit pagination">
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
                        case 'add-deposit':
                            document.getElementById('add-deposit-form').scrollIntoView({ behavior: 'smooth' });
                            break;
                        case 'approve-all':
                            if (confirm('Are you sure you want to approve all pending deposits?')) {
                                alert('All pending deposits have been approved');
                                // In a real app, this would make an API call
                            }
                            break;
                        case 'export-deposits':
                            alert('Exporting deposit data...');
                            // In a real app, this would trigger a download
                            break;
                        case 'deposit-settings':
                            alert('Opening deposit settings...');
                            // In a real app, this would open a settings modal
                            break;
                    }
                });
            });
            
            // Deposit form submission
            document.getElementById('depositForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const user = document.getElementById('depositUser').value;
                const amount = document.getElementById('depositAmount').value;
                const method = document.getElementById('depositMethod').value;
                const notes = document.getElementById('depositNotes').value;
                
                if (!user || !amount) {
                    alert('Please select a user and enter an amount');
                    return;
                }
                
                // In a real application, this would send the data to the server
                alert(`Manual deposit of $${amount} added to user account via ${method}`);
                this.reset();
            });
            
            // Deposit action buttons
            document.querySelectorAll('.btn-approve').forEach(button => {
                button.addEventListener('click', function() {
                    const depositId = this.getAttribute('data-deposit');
                    if (confirm(`Approve deposit ${depositId}?`)) {
                        alert(`Deposit ${depositId} approved successfully`);
                        // In a real app, this would update the status via API
                    }
                });
            });
            
            document.querySelectorAll('.btn-reject').forEach(button => {
                button.addEventListener('click', function() {
                    const depositId = this.getAttribute('data-deposit');
                    const reason = prompt('Please enter rejection reason:');
                    if (reason) {
                        alert(`Deposit ${depositId} rejected. Reason: ${reason}`);
                        // In a real app, this would update the status via API
                    }
                });
            });
            
            document.querySelectorAll('.btn-hold').forEach(button => {
                button.addEventListener('click', function() {
                    const depositId = this.getAttribute('data-deposit');
                    const reason = prompt('Please enter hold reason:');
                    if (reason) {
                        alert(`Deposit ${depositId} put on hold. Reason: ${reason}`);
                        // In a real app, this would update the status via API
                    }
                });
            });
            
            document.querySelectorAll('.btn-view').forEach(button => {
                button.addEventListener('click', function() {
                    const depositId = this.getAttribute('data-deposit');
                    alert(`Viewing details for deposit: ${depositId}`);
                    // In a real app, this would open a modal with deposit details
                });
            });
            
            // Apply filters button
            document.getElementById('applyFiltersBtn').addEventListener('click', function() {
                const search = document.getElementById('depositSearch').value;
                const status = document.getElementById('statusFilter').value;
                const method = document.getElementById('methodFilter').value;
                const dateRange = document.getElementById('dateFilter').value;
                
                // In a real app, this would filter the deposits table
                console.log(`Applying filters - Search: ${search}, Status: ${status}, Method: ${method}, Date: ${dateRange}`);
                alert('Filters applied successfully');
            });
            
            // Search functionality
            document.getElementById('depositSearch').addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                // In a real app, this would filter the deposits table in real-time
                console.log(`Searching for: ${searchTerm}`);
            });
        });
    </script>
</body>
</html>
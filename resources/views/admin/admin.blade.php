<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenex - Admin Dashboard</title>
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

        /* Users Table */
        .users-table {
            background-color: var(--primary-blue);
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid var(--border-color);
        }

        .users-table table {
            margin-bottom: 0;
            color: var(--text-color);
        }

        .users-table thead {
            background-color: var(--admin-purple);
            color: white;
        }

        .users-table th {
            padding: 15px;
            font-weight: 600;
            border: none;
        }

        .users-table td {
            padding: 15px;
            border-color: var(--border-color);
        }

        .users-table tbody tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.05);
        }

        .users-table tbody tr:hover {
            background-color: rgba(0, 82, 163, 0.1);
        }

        .user-actions {
            display: flex;
            gap: 5px;
        }

        .btn-action {
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 0.8rem;
            border: none;
            cursor: pointer;
        }

        .btn-deposit {
            background-color: var(--success-green);
            color: white;
        }

        .btn-withdraw {
            background-color: var(--warning-orange);
            color: white;
        }

        .btn-edit {
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

        .status-active {
            background-color: rgba(0, 200, 83, 0.2);
            color: var(--success-green);
        }

        .status-pending {
            background-color: rgba(255, 152, 0, 0.2);
            color: var(--warning-orange);
        }

        .status-suspended {
            background-color: rgba(244, 67, 54, 0.2);
            color: var(--danger-red);
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

        /* Charts */
        .chart-container {
            height: 300px;
            position: relative;
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

            .users-table {
                overflow-x: auto;
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
                            <a class="nav-link active" href="admin-dashboard">
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
                    <h4 class="mb-0">Admin Dashboard</h4>
                    <div class="user-info">
                        <div class="user-avatar">AD</div>
                        <div>
                            <div class="fw-bold">Admin User</div>
                            <small class="text-muted">Super Administrator</small>
                        </div>
                    </div>
                </div>

                <!-- Stats Overview -->
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-title">Total Users</div>
                            <div class="card-value">1,247</div>
                            <div class="card-change positive">
                                <i class="fas fa-arrow-up"></i> +5.2% (62)
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-title">Active Users</div>
                            <div class="card-value">984</div>
                            <div class="card-change positive">
                                <i class="fas fa-arrow-up"></i> +3.1% (29)
                            </div>
                        </div>
                    </div>
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
                            <div class="card-title">Pending Actions</div>
                            <div class="card-value">23</div>
                            <div class="card-change negative">
                                <i class="fas fa-exclamation-circle"></i> Requires attention
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
                                    <div class="fw-bold">Add Deposit</div>
                                    <small>Credit user account</small>
                                </div>
                                <div class="admin-action" data-action="add-profit">
                                    <div class="action-icon">
                                        <i class="fas fa-chart-line"></i>
                                    </div>
                                    <div class="fw-bold">Add Profit</div>
                                    <small>Credit investment returns</small>
                                </div>
                                <div class="admin-action" data-action="process-withdrawal">
                                    <div class="action-icon">
                                        <i class="fas fa-hand-holding-usd"></i>
                                    </div>
                                    <div class="fw-bold">Process Withdrawal</div>
                                    <small>Approve/Reject requests</small>
                                </div>
                                <div class="admin-action" data-action="manage-user">
                                    <div class="action-icon">
                                        <i class="fas fa-user-cog"></i>
                                    </div>
                                    <div class="fw-bold">Manage User</div>
                                    <small>Edit user details</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Forms and User Management -->
                <div class="row">
                    <!-- Action Forms -->
                    <div class="col-lg-5">
                        <!-- Add Deposit Form -->
                        <div class="admin-form" id="add-deposit-form">
                            <div class="card-title">Add Deposit to User Account</div>
                            <form id="depositForm">
                                <div class="mb-3">
                                    <label class="form-label">Select User</label>
                                    <select class="form-select" id="depositUser">
                                        <option value="">Select a user...</option>
                                        <option value="user1">John Doe (JD-1245)</option>
                                        <option value="user2">Sarah Johnson (SJ-3678)</option>
                                        <option value="user3">Michael Brown (MB-5891)</option>
                                        <option value="user4">Emily Davis (ED-7123)</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Deposit Amount (USD)</label>
                                    <input type="number" class="form-control" id="depositAmount" placeholder="0.00"
                                        min="1" step="0.01">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Deposit Method</label>
                                    <select class="form-select" id="depositMethod">
                                        <option value="bank">Bank Transfer</option>
                                        <option value="crypto">Cryptocurrency</option>
                                        <option value="wire">Wire Transfer</option>
                                        <option value="manual">Manual Adjustment</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Reference/Notes</label>
                                    <textarea class="form-control" id="depositNotes" rows="2"
                                        placeholder="Add any reference or notes..."></textarea>
                                </div>

                                <button type="submit" class="btn btn-admin w-100">Process Deposit</button>
                            </form>
                        </div>

                        <!-- Add Profit Form -->
                        <div class="admin-form" id="add-profit-form" style="display: none;">
                            <div class="card-title">Add Investment Profit</div>
                            <form id="profitForm">
                                <div class="mb-3">
                                    <label class="form-label">Select User</label>
                                    <select class="form-select" id="profitUser">
                                        <option value="">Select a user...</option>
                                        <option value="user1">John Doe (JD-1245)</option>
                                        <option value="user2">Sarah Johnson (SJ-3678)</option>
                                        <option value="user3">Michael Brown (MB-5891)</option>
                                        <option value="user4">Emily Davis (ED-7123)</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Profit Amount (USD)</label>
                                    <input type="number" class="form-control" id="profitAmount" placeholder="0.00"
                                        min="0.01" step="0.01">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Investment Plan</label>
                                    <select class="form-select" id="profitPlan">
                                        <option value="ai-fund">AI Growth Fund</option>
                                        <option value="tech-etf">Technology ETF</option>
                                        <option value="crypto-portfolio">Crypto Portfolio</option>
                                        <option value="manual">Manual Profit</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" id="profitDescription" rows="2"
                                        placeholder="Describe the profit source..."></textarea>
                                </div>

                                <button type="submit" class="btn btn-admin w-100">Add Profit</button>
                            </form>
                        </div>

                        <!-- Process Withdrawal Form -->
                        <div class="admin-form" id="process-withdrawal-form" style="display: none;">
                            <div class="card-title">Process Withdrawal Request</div>
                            <div class="mb-3">
                                <label class="form-label">Pending Withdrawals</label>
                                <select class="form-select" id="pendingWithdrawals">
                                    <option value="">Select a withdrawal to process...</option>
                                    <option value="withdrawal1">John Doe - $2,500 (Bank Transfer)</option>
                                    <option value="withdrawal2">Sarah Johnson - $1,200 (Crypto)</option>
                                    <option value="withdrawal3">Michael Brown - $5,000 (Wire)</option>
                                    <option value="withdrawal4">Emily Davis - $750 (Cash App)</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Action</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="withdrawalAction"
                                            id="approveWithdrawal" value="approve" checked>
                                        <label class="form-check-label" for="approveWithdrawal">Approve</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="withdrawalAction"
                                            id="rejectWithdrawal" value="reject">
                                        <label class="form-check-label" for="rejectWithdrawal">Reject</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="withdrawalAction"
                                            id="holdWithdrawal" value="hold">
                                        <label class="form-check-label" for="holdWithdrawal">Put on Hold</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Admin Notes</label>
                                <textarea class="form-control" id="withdrawalNotes" rows="2"
                                    placeholder="Add notes for this action..."></textarea>
                            </div>

                            <button type="button" class="btn btn-admin w-100" id="processWithdrawalBtn">Process
                                Withdrawal</button>
                        </div>
                    </div>

                    <!-- User Management -->
                    <div class="col-lg-7">
                        <div class="dashboard-card">
                            <div class="card-title d-flex justify-content-between align-items-center">
                                <span>User Management</span>
                                <div>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Search users..." style="display: inline-block; width: auto;">
                                    <button class="btn btn-admin btn-sm ms-2">
                                        <i class="fas fa-plus"></i> Add User
                                    </button>
                                </div>
                            </div>
                            <div class="users-table">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Balance</th>
                                            <th>Status</th>
                                            <th>Last Activity</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
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
                                            <td>$12,450</td>
                                            <td><span class="status-badge status-active">Active</span></td>
                                            <td>2 hours ago</td>
                                            <td>
                                                <div class="user-actions">
                                                    <button class="btn-action btn-deposit" data-user="JD-1245">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                    <button class="btn-action btn-withdraw" data-user="JD-1245">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                    <button class="btn-action btn-edit" data-user="JD-1245">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
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
                                            <td>$8,720</td>
                                            <td><span class="status-badge status-active">Active</span></td>
                                            <td>1 day ago</td>
                                            <td>
                                                <div class="user-actions">
                                                    <button class="btn-action btn-deposit" data-user="SJ-3678">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                    <button class="btn-action btn-withdraw" data-user="SJ-3678">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                    <button class="btn-action btn-edit" data-user="SJ-3678">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
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
                                            <td>$23,150</td>
                                            <td><span class="status-badge status-pending">Verification</span></td>
                                            <td>3 days ago</td>
                                            <td>
                                                <div class="user-actions">
                                                    <button class="btn-action btn-deposit" data-user="MB-5891">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                    <button class="btn-action btn-withdraw" data-user="MB-5891">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                    <button class="btn-action btn-edit" data-user="MB-5891">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
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
                                            <td>$5,430</td>
                                            <td><span class="status-badge status-active">Active</span></td>
                                            <td>5 days ago</td>
                                            <td>
                                                <div class="user-actions">
                                                    <button class="btn-action btn-deposit" data-user="ED-7123">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                    <button class="btn-action btn-withdraw" data-user="ED-7123">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                    <button class="btn-action btn-edit" data-user="ED-7123">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="user-avatar me-2"
                                                        style="width: 35px; height: 35px; font-size: 0.8rem; background-color: var(--danger-red);">
                                                        TR</div>
                                                    <div>
                                                        <div class="fw-bold">Thomas Wilson</div>
                                                        <small class="text-muted">TW-9456</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>$0</td>
                                            <td><span class="status-badge status-suspended">Suspended</span></td>
                                            <td>2 weeks ago</td>
                                            <td>
                                                <div class="user-actions">
                                                    <button class="btn-action btn-deposit" data-user="TW-9456">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                    <button class="btn-action btn-withdraw" data-user="TW-9456">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                    <button class="btn-action btn-edit" data-user="TW-9456">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity and Charts -->
                <div class="row">
                    <!-- Recent Activity -->
                    <div class="col-lg-6">
                        <div class="dashboard-card">
                            <div class="card-title">Recent Admin Actions</div>
                            <div class="activity-list">
                                <div class="activity-item">
                                    <div class="activity-icon"
                                        style="background-color: rgba(0, 200, 83, 0.2); color: var(--success-green);">
                                        <i class="fas fa-money-bill-wave"></i>
                                    </div>
                                    <div class="activity-details">
                                        <div class="fw-bold">Deposit Added</div>
                                        <small>John Doe - $2,500 • Manual Adjustment</small>
                                    </div>
                                    <div class="text-muted">2 hours ago</div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon"
                                        style="background-color: rgba(0, 82, 163, 0.2); color: var(--accent-blue);">
                                        <i class="fas fa-chart-line"></i>
                                    </div>
                                    <div class="activity-details">
                                        <div class="fw-bold">Profit Added</div>
                                        <small>Sarah Johnson - $350 • AI Growth Fund</small>
                                    </div>
                                    <div class="text-muted">5 hours ago</div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon"
                                        style="background-color: rgba(111, 66, 193, 0.2); color: var(--admin-purple);">
                                        <i class="fas fa-user-edit"></i>
                                    </div>
                                    <div class="activity-details">
                                        <div class="fw-bold">User Updated</div>
                                        <small>Michael Brown - Tier upgraded to Premium</small>
                                    </div>
                                    <div class="text-muted">1 day ago</div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon"
                                        style="background-color: rgba(255, 152, 0, 0.2); color: var(--warning-orange);">
                                        <i class="fas fa-hand-holding-usd"></i>
                                    </div>
                                    <div class="activity-details">
                                        <div class="fw-bold">Withdrawal Processed</div>
                                        <small>Emily Davis - $1,000 • Approved</small>
                                    </div>
                                    <div class="text-muted">2 days ago</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Performance Chart -->
                    <div class="col-lg-6">
                        <div class="dashboard-card">
                            <div class="card-title">Platform Performance</div>
                            <div class="chart-container">
                                <canvas id="performanceChart"></canvas>
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
            // Initialize charts
            const performanceCtx = document.getElementById('performanceChart').getContext('2d');
            const performanceChart = new Chart(performanceCtx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'New Users',
                        data: [120, 150, 180, 200, 240, 280],
                        backgroundColor: 'rgba(0, 82, 163, 0.7)',
                        borderColor: 'rgba(0, 82, 163, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Total Deposits ($K)',
                        data: [450, 520, 610, 730, 820, 950],
                        backgroundColor: 'rgba(0, 200, 83, 0.7)',
                        borderColor: 'rgba(0, 200, 83, 1)',
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
                                color: '#a8c6e5'
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
            
            // Admin action selection
            const adminActions = document.querySelectorAll('.admin-action');
            const actionForms = {
                'add-deposit': document.getElementById('add-deposit-form'),
                'add-profit': document.getElementById('add-profit-form'),
                'process-withdrawal': document.getElementById('process-withdrawal-form')
            };
            
            adminActions.forEach(action => {
                action.addEventListener('click', function() {
                    const actionType = this.getAttribute('data-action');
                    
                    // Hide all forms first
                    Object.values(actionForms).forEach(form => {
                        if (form) form.style.display = 'none';
                    });
                    
                    // Show selected form
                    if (actionForms[actionType]) {
                        actionForms[actionType].style.display = 'block';
                    }
                });
            });
            
            // Form submissions
            document.getElementById('depositForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const user = document.getElementById('depositUser').value;
                const amount = document.getElementById('depositAmount').value;
                const method = document.getElementById('depositMethod').value;
                
                if (!user || !amount) {
                    alert('Please select a user and enter an amount');
                    return;
                }
                
                // In a real application, this would send the data to the server
                alert(`Deposit of $${amount} added to user account via ${method}`);
                this.reset();
            });
            
            document.getElementById('profitForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const user = document.getElementById('profitUser').value;
                const amount = document.getElementById('profitAmount').value;
                const plan = document.getElementById('profitPlan').value;
                
                if (!user || !amount) {
                    alert('Please select a user and enter an amount');
                    return;
                }
                
                // In a real application, this would send the data to the server
                alert(`Profit of $${amount} added to user account from ${plan}`);
                this.reset();
            });
            
            document.getElementById('processWithdrawalBtn').addEventListener('click', function() {
                const withdrawal = document.getElementById('pendingWithdrawals').value;
                const action = document.querySelector('input[name="withdrawalAction"]:checked').value;
                
                if (!withdrawal) {
                    alert('Please select a withdrawal to process');
                    return;
                }
                
                // In a real application, this would send the data to the server
                alert(`Withdrawal ${action}d successfully`);
                document.getElementById('pendingWithdrawals').value = '';
                document.getElementById('withdrawalNotes').value = '';
            });
            
            // User action buttons
            document.querySelectorAll('.btn-deposit').forEach(button => {
                button.addEventListener('click', function() {
                    const userId = this.getAttribute('data-user');
                    // In a real app, this would open a modal or form for this specific user
                    alert(`Add deposit for user: ${userId}`);
                });
            });
            
            document.querySelectorAll('.btn-withdraw').forEach(button => {
                button.addEventListener('click', function() {
                    const userId = this.getAttribute('data-user');
                    // In a real app, this would open a modal or form for this specific user
                    alert(`Process withdrawal for user: ${userId}`);
                });
            });
            
            document.querySelectorAll('.btn-edit').forEach(button => {
                button.addEventListener('click', function() {
                    const userId = this.getAttribute('data-user');
                    // In a real app, this would open a user edit modal
                    alert(`Edit user: ${userId}`);
                });
            });
        });
    </script>
</body>

</html>
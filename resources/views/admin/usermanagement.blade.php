<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheSpace - User Management</title>
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
            transition: all 0.3s;
        }

        .btn-action:hover {
            transform: scale(1.05);
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

        .btn-suspend {
            background-color: var(--danger-red);
            color: white;
        }

        .btn-view {
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

        .status-inactive {
            background-color: rgba(108, 117, 125, 0.2);
            color: #6c757d;
        }

        /* Tier badges */
        .tier-badge {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .tier-basic {
            background-color: rgba(108, 117, 125, 0.2);
            color: #6c757d;
        }

        .tier-premium {
            background-color: rgba(0, 82, 163, 0.2);
            color: var(--accent-blue);
        }

        .tier-vip {
            background-color: rgba(111, 66, 193, 0.2);
            color: var(--admin-purple);
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

            .users-table {
                overflow-x: auto;
            }

            .user-actions {
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
                        <i class="fas fa-robot me-2"></i>TheSpace <span class="admin-badge">ADMIN</span>
                    </a>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="admin-dashboard">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="admin-users">
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
                            <a class="nav-link" href="{{route('dashboard')}}">
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
                    <h4 class="mb-0">User Management</h4>
                    <div class="user-info">
                        <div class="user-avatar">AD</div>
                        <div>
                            <div class="fw-bold">Admin User</div>
                            <small class="text-muted">Super Administrator</small>
                        </div>
                    </div>
                </div>

                <!-- User Stats -->
                <div class="row mb-4">
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
                            <div class="card-title">Pending Verification</div>
                            <div class="card-value">42</div>
                            <div class="card-change negative">
                                <i class="fas fa-exclamation-circle"></i> Requires attention
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-title">Suspended Accounts</div>
                            <div class="card-value">18</div>
                            <div class="card-change">
                                <i class="fas fa-ban"></i> No change
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filters and Search -->
                <div class="filters-section">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="filter-group">
                                <label class="form-label">Search Users</label>
                                <input type="text" class="form-control" id="userSearch"
                                    placeholder="Name, email, or user ID">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="filter-group">
                                <label class="form-label">Status</label>
                                <select class="form-select" id="statusFilter">
                                    <option value="">All Statuses</option>
                                    <option value="active">Active</option>
                                    <option value="pending">Pending</option>
                                    <option value="suspended">Suspended</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="filter-group">
                                <label class="form-label">Tier</label>
                                <select class="form-select" id="tierFilter">
                                    <option value="">All Tiers</option>
                                    <option value="basic">Basic</option>
                                    <option value="premium">Premium</option>
                                    <option value="vip">VIP</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="filter-group">
                                <label class="form-label">Registration Date</label>
                                <select class="form-select" id="dateFilter">
                                    <option value="">Any Time</option>
                                    <option value="today">Today</option>
                                    <option value="week">This Week</option>
                                    <option value="month">This Month</option>
                                    <option value="quarter">This Quarter</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-items-end">
                            <div class="filter-group w-100">
                                <button class="btn btn-admin w-100" id="addUserBtn">
                                    <i class="fas fa-user-plus me-2"></i> Add New User
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12 d-flex justify-content-between">
                            <div>
                                <button class="btn btn-outline-primary btn-sm" id="exportUsersBtn">
                                    <i class="fas fa-download me-1"></i> Export Users
                                </button>
                                <button class="btn btn-outline-primary btn-sm ms-2" id="bulkActionsBtn">
                                    <i class="fas fa-cog me-1"></i> Bulk Actions
                                </button>
                            </div>
                            <div>
                                <button class="btn btn-outline-secondary btn-sm" id="resetFiltersBtn">
                                    <i class="fas fa-redo me-1"></i> Reset Filters
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Users Table -->
                <div class="dashboard-card">
                    <div class="card-title d-flex justify-content-between align-items-center">
                        <span>All Users (1,247)</span>
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
                    <div class="users-table">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="5%">
                                        <input type="checkbox" class="form-check-input" id="selectAll">
                                    </th>
                                    <th>User</th>
                                    <th>Contact</th>
                                    <th>Balance</th>
                                    <th>Tier</th>
                                    <th>Status</th>
                                    <th>Registration</th>
                                    <th>Last Activity</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input user-checkbox"
                                            data-user="JD-1245">
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="user-avatar me-2"
                                                style="width: 35px; height: 35px; font-size: 0.8rem;"> {{
                                                strtoupper(substr(Auth::user()->first_name ?? Auth::user()->name, 0, 1))
                                                }}
                                                {{ strtoupper(substr(Auth::user()->last_name ?? '', 0, 1)) }}</div>
                                            <div>
                                                <div class="fw-bold"> {{ Auth::user()->first_name ?? Auth::user()->name
                                                    }}{{ Auth::user()->last_name
                                                    ?? '' }}</div>
                                                <small class="text-muted">JD-1245</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>john.doe@email.com</div>
                                        <small class="text-muted">+1 (555) 123-4567</small>
                                    </td>
                                    <td>$12,450</td>
                                    <td><span class="tier-badge tier-premium">Premium</span></td>
                                    <td><span class="status-badge status-active">Active</span></td>
                                    <td>Jan 15, 2023</td>
                                    <td>2 hours ago</td>
                                    <td>
                                        <div class="user-actions">
                                            <button class="btn-action btn-view" data-user="JD-1245"
                                                title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn-action btn-edit" data-user="JD-1245" title="Edit User">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn-action btn-deposit" data-user="JD-1245"
                                                title="Add Deposit">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                            <button class="btn-action btn-withdraw" data-user="JD-1245"
                                                title="Process Withdrawal">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input user-checkbox"
                                            data-user="SJ-3678">
                                    </td>
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
                                    <td>
                                        <div>sarah.j@email.com</div>
                                        <small class="text-muted">+1 (555) 987-6543</small>
                                    </td>
                                    <td>$8,720</td>
                                    <td><span class="tier-badge tier-basic">Basic</span></td>
                                    <td><span class="status-badge status-active">Active</span></td>
                                    <td>Mar 22, 2023</td>
                                    <td>1 day ago</td>
                                    <td>
                                        <div class="user-actions">
                                            <button class="btn-action btn-view" data-user="SJ-3678"
                                                title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn-action btn-edit" data-user="SJ-3678" title="Edit User">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn-action btn-deposit" data-user="SJ-3678"
                                                title="Add Deposit">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                            <button class="btn-action btn-withdraw" data-user="SJ-3678"
                                                title="Process Withdrawal">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input user-checkbox"
                                            data-user="MB-5891">
                                    </td>
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
                                    <td>
                                        <div>michael.b@email.com</div>
                                        <small class="text-muted">+1 (555) 456-7890</small>
                                    </td>
                                    <td>$23,150</td>
                                    <td><span class="tier-badge tier-vip">VIP</span></td>
                                    <td><span class="status-badge status-pending">Verification</span></td>
                                    <td>Feb 5, 2023</td>
                                    <td>3 days ago</td>
                                    <td>
                                        <div class="user-actions">
                                            <button class="btn-action btn-view" data-user="MB-5891"
                                                title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn-action btn-edit" data-user="MB-5891" title="Edit User">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn-action btn-deposit" data-user="MB-5891"
                                                title="Add Deposit">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                            <button class="btn-action btn-withdraw" data-user="MB-5891"
                                                title="Process Withdrawal">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input user-checkbox"
                                            data-user="ED-7123">
                                    </td>
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
                                    <td>
                                        <div>emily.d@email.com</div>
                                        <small class="text-muted">+1 (555) 234-5678</small>
                                    </td>
                                    <td>$5,430</td>
                                    <td><span class="tier-badge tier-basic">Basic</span></td>
                                    <td><span class="status-badge status-active">Active</span></td>
                                    <td>Apr 10, 2023</td>
                                    <td>5 days ago</td>
                                    <td>
                                        <div class="user-actions">
                                            <button class="btn-action btn-view" data-user="ED-7123"
                                                title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn-action btn-edit" data-user="ED-7123" title="Edit User">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn-action btn-deposit" data-user="ED-7123"
                                                title="Add Deposit">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                            <button class="btn-action btn-withdraw" data-user="ED-7123"
                                                title="Process Withdrawal">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input user-checkbox"
                                            data-user="TW-9456">
                                    </td>
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
                                    <td>
                                        <div>thomas.w@email.com</div>
                                        <small class="text-muted">+1 (555) 345-6789</small>
                                    </td>
                                    <td>$0</td>
                                    <td><span class="tier-badge tier-basic">Basic</span></td>
                                    <td><span class="status-badge status-suspended">Suspended</span></td>
                                    <td>Dec 18, 2022</td>
                                    <td>2 weeks ago</td>
                                    <td>
                                        <div class="user-actions">
                                            <button class="btn-action btn-view" data-user="TW-9456"
                                                title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn-action btn-edit" data-user="TW-9456" title="Edit User">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn-action btn-deposit" data-user="TW-9456"
                                                title="Add Deposit">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                            <button class="btn-action btn-suspend" data-user="TW-9456"
                                                title="Reactivate">
                                                <i class="fas fa-play"></i>
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
                        <nav aria-label="User pagination">
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
            // Select All functionality
            document.getElementById('selectAll').addEventListener('change', function() {
                const checkboxes = document.querySelectorAll('.user-checkbox');
                checkboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
            });
            
            // User action buttons
            document.querySelectorAll('.btn-view').forEach(button => {
                button.addEventListener('click', function() {
                    const userId = this.getAttribute('data-user');
                    alert(`View user details: ${userId}`);
                    // In a real app, this would open a modal with user details
                });
            });
            
            document.querySelectorAll('.btn-edit').forEach(button => {
                button.addEventListener('click', function() {
                    const userId = this.getAttribute('data-user');
                    alert(`Edit user: ${userId}`);
                    // In a real app, this would open an edit user modal
                });
            });
            
            document.querySelectorAll('.btn-deposit').forEach(button => {
                button.addEventListener('click', function() {
                    const userId = this.getAttribute('data-user');
                    alert(`Add deposit for user: ${userId}`);
                    // In a real app, this would open a deposit form for this user
                });
            });
            
            document.querySelectorAll('.btn-withdraw').forEach(button => {
                button.addEventListener('click', function() {
                    const userId = this.getAttribute('data-user');
                    alert(`Process withdrawal for user: ${userId}`);
                    // In a real app, this would open a withdrawal form for this user
                });
            });
            
            document.querySelectorAll('.btn-suspend').forEach(button => {
                button.addEventListener('click', function() {
                    const userId = this.getAttribute('data-user');
                    alert(`Reactivate user: ${userId}`);
                    // In a real app, this would toggle user status
                });
            });
            
            // Add User button
            document.getElementById('addUserBtn').addEventListener('click', function() {
                alert('Open add user form');
                // In a real app, this would open a modal to add a new user
            });
            
            // Export Users button
            document.getElementById('exportUsersBtn').addEventListener('click', function() {
                alert('Exporting user data...');
                // In a real app, this would trigger a CSV/Excel download
            });
            
            // Bulk Actions button
            document.getElementById('bulkActionsBtn').addEventListener('click', function() {
                const selectedUsers = Array.from(document.querySelectorAll('.user-checkbox:checked'))
                    .map(checkbox => checkbox.getAttribute('data-user'));
                
                if (selectedUsers.length === 0) {
                    alert('Please select at least one user');
                    return;
                }
                
                alert(`Bulk actions for users: ${selectedUsers.join(', ')}`);
                // In a real app, this would open a modal with bulk action options
            });
            
            // Reset Filters button
            document.getElementById('resetFiltersBtn').addEventListener('click', function() {
                document.getElementById('userSearch').value = '';
                document.getElementById('statusFilter').value = '';
                document.getElementById('tierFilter').value = '';
                document.getElementById('dateFilter').value = '';
                alert('Filters reset');
            });
            
            // Search functionality
            document.getElementById('userSearch').addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                // In a real app, this would filter the user table
                console.log(`Searching for: ${searchTerm}`);
            });
            
            // Filter functionality
            document.getElementById('statusFilter').addEventListener('change', function() {
                const status = this.value;
                // In a real app, this would filter the user table by status
                console.log(`Filter by status: ${status}`);
            });
            
            document.getElementById('tierFilter').addEventListener('change', function() {
                const tier = this.value;
                // In a real app, this would filter the user table by tier
                console.log(`Filter by tier: ${tier}`);
            });
            
            document.getElementById('dateFilter').addEventListener('change', function() {
                const dateRange = this.value;
                // In a real app, this would filter the user table by registration date
                console.log(`Filter by date: ${dateRange}`);
            });
        });
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenex - Reports Dashboard</title>
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

        /* Report Cards */
        .report-card {
            background-color: var(--primary-blue);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid var(--border-color);
            transition: all 0.3s;
        }

        .report-card:hover {
            border-color: var(--accent-blue);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .report-icon {
            font-size: 2rem;
            color: var(--accent-blue);
            margin-bottom: 15px;
        }

        .report-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 10px;
            color: white;
        }

        .report-description {
            font-size: 0.9rem;
            color: #a8c6e5;
            margin-bottom: 15px;
        }

        /* Charts */
        .chart-container {
            height: 300px;
            position: relative;
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

        /* Report List */
        .report-list {
            background-color: var(--primary-blue);
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid var(--border-color);
        }

        .report-list table {
            margin-bottom: 0;
            color: var(--text-color);
        }

        .report-list thead {
            background-color: var(--accent-blue);
            color: white;
        }

        .report-list th {
            padding: 15px;
            font-weight: 600;
            border: none;
        }

        .report-list td {
            padding: 15px;
            border-color: var(--border-color);
        }

        .report-list tbody tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.05);
        }

        .report-status {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
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

        .status-processing {
            background-color: rgba(0, 82, 163, 0.2);
            color: var(--accent-blue);
        }

        /* Performance Metrics */
        .metrics-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .metric-card {
            background-color: var(--light-blue);
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            border: 1px solid var(--border-color);
        }

        .metric-value {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .metric-label {
            font-size: 0.9rem;
            color: #a8c6e5;
        }

        /* Report Filters */
        .filter-section {
            background-color: var(--light-blue);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid var(--border-color);
        }

        .filter-group {
            margin-bottom: 15px;
        }

        .filter-label {
            font-size: 0.9rem;
            color: #a8c6e5;
            margin-bottom: 5px;
            display: block;
        }

        /* Report Preview */
        .report-preview {
            background-color: var(--light-blue);
            border-radius: 8px;
            padding: 25px;
            margin-bottom: 20px;
            border: 1px solid var(--border-color);
        }

        .preview-header {
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .preview-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .preview-subtitle {
            font-size: 1rem;
            color: #a8c6e5;
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

            .report-list {
                overflow-x: auto;
            }

            .metrics-grid {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
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

            .metrics-grid {
                grid-template-columns: 1fr 1fr;
            }

            .quick-actions {
                grid-template-columns: 1fr;
            }

            .report-list td,
            .report-list th {
                padding: 10px;
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
                            <a class="nav-link active" href="reports">
                                <i class="fas fa-file-invoice-dollar"></i> Reports
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
                    <h4 class="mb-0">Reports Dashboard</h4>
                    <div class="user-info">
                        <div class="user-avatar">JD</div>
                        <div>
                            <div class="fw-bold">John Doe</div>
                            <small class="text-muted">Tier 2 Investor</small>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="dashboard-card">
                    <div class="card-title">Quick Actions</div>
                    <div class="quick-actions">
                        <a href="#" class="action-btn">
                            <i class="fas fa-plus-circle"></i>
                            New Report
                        </a>
                        <a href="#" class="action-btn">
                            <i class="fas fa-download"></i>
                            Export All
                        </a>
                        <a href="#" class="action-btn">
                            <i class="fas fa-calendar"></i>
                            Schedule
                        </a>
                        <a href="#" class="action-btn">
                            <i class="fas fa-cog"></i>
                            Templates
                        </a>
                        <a href="#" class="action-btn">
                            <i class="fas fa-history"></i>
                            Archive
                        </a>
                        <a href="#" class="action-btn">
                            <i class="fas fa-question-circle"></i>
                            Help
                        </a>
                    </div>
                </div>

                <!-- Report Overview -->
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-title">Total Reports</div>
                            <div class="card-value">47</div>
                            <div class="card-change">
                                This quarter
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-title">Scheduled</div>
                            <div class="card-value">12</div>
                            <div class="card-change">
                                Active schedules
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-title">This Month</div>
                            <div class="card-value">8</div>
                            <div class="card-change positive">
                                <i class="fas fa-arrow-up"></i> +2 from last month
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-title">Storage Used</div>
                            <div class="card-value">1.2 GB</div>
                            <div class="card-change">
                                of 5 GB available
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Report Performance Metrics -->
                <div class="dashboard-card">
                    <div class="card-title">Report Performance Metrics</div>
                    <div class="metrics-grid">
                        <div class="metric-card">
                            <div class="metric-value positive">94.7%</div>
                            <div class="metric-label">Report Accuracy</div>
                        </div>
                        <div class="metric-card">
                            <div class="metric-value">2.3 min</div>
                            <div class="metric-label">Avg Generation Time</div>
                        </div>
                        <div class="metric-card">
                            <div class="metric-value positive">98.2%</div>
                            <div class="metric-label">Success Rate</div>
                        </div>
                        <div class="metric-card">
                            <div class="metric-value">12</div>
                            <div class="metric-label">Custom Templates</div>
                        </div>
                        <div class="metric-card">
                            <div class="metric-value positive">28</div>
                            <div class="metric-label">Auto-Generated</div>
                        </div>
                        <div class="metric-card">
                            <div class="metric-value">5</div>
                            <div class="metric-label">Shared Reports</div>
                        </div>
                    </div>
                </div>

                <!-- Report Generation Chart -->
                <div class="dashboard-card">
                    <div class="card-title">Report Generation Activity</div>
                    <div class="chart-container">
                        <canvas id="reportChart"></canvas>
                    </div>
                </div>

                <!-- Report Templates -->
                <div class="dashboard-card">
                    <div class="card-title d-flex justify-content-between align-items-center">
                        <span>Report Templates</span>
                        <a href="#" class="btn btn-sm btn-outline-primary">Create Template</a>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="report-card">
                                <div class="report-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div class="report-title">Portfolio Performance</div>
                                <div class="report-description">
                                    Comprehensive analysis of portfolio performance, returns, and risk metrics.
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">Last used: 2 days ago</small>
                                    <button class="btn btn-sm btn-primary">Generate</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="report-card">
                                <div class="report-icon">
                                    <i class="fas fa-exchange-alt"></i>
                                </div>
                                <div class="report-title">Transaction History</div>
                                <div class="report-description">
                                    Detailed transaction log with filters for date range and asset types.
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">Last used: 1 week ago</small>
                                    <button class="btn btn-sm btn-primary">Generate</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="report-card">
                                <div class="report-icon">
                                    <i class="fas fa-file-invoice-dollar"></i>
                                </div>
                                <div class="report-title">Tax Report</div>
                                <div class="report-description">
                                    Tax-ready report with capital gains, dividends, and income statements.
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">Last used: 1 month ago</small>
                                    <button class="btn btn-sm btn-primary">Generate</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="report-card">
                                <div class="report-icon">
                                    <i class="fas fa-balance-scale"></i>
                                </div>
                                <div class="report-title">Risk Analysis</div>
                                <div class="report-description">
                                    Portfolio risk assessment with volatility, beta, and stress testing.
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">Last used: 3 days ago</small>
                                    <button class="btn btn-sm btn-primary">Generate</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="report-card">
                                <div class="report-icon">
                                    <i class="fas fa-chart-pie"></i>
                                </div>
                                <div class="report-title">Asset Allocation</div>
                                <div class="report-description">
                                    Visual breakdown of portfolio allocation across sectors and asset classes.
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">Last used: 5 days ago</small>
                                    <button class="btn btn-sm btn-primary">Generate</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="report-card">
                                <div class="report-icon">
                                    <i class="fas fa-project-diagram"></i>
                                </div>
                                <div class="report-title">AI Insights</div>
                                <div class="report-description">
                                    AI-powered investment insights and market trend analysis.
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">Last used: Yesterday</small>
                                    <button class="btn btn-sm btn-primary">Generate</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filters Section -->
                <div class="filter-section">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="filter-group">
                                <label class="filter-label">Report Type</label>
                                <select class="form-select bg-dark text-light border-secondary">
                                    <option>All Reports</option>
                                    <option>Performance</option>
                                    <option>Transactions</option>
                                    <option>Tax</option>
                                    <option>Risk Analysis</option>
                                    <option>Custom</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="filter-group">
                                <label class="filter-label">Date Range</label>
                                <select class="form-select bg-dark text-light border-secondary">
                                    <option>Last 30 Days</option>
                                    <option>Last 7 Days</option>
                                    <option>Last 90 Days</option>
                                    <option>Year to Date</option>
                                    <option>Custom Range</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="filter-group">
                                <label class="filter-label">Status</label>
                                <select class="form-select bg-dark text-light border-secondary">
                                    <option>All Statuses</option>
                                    <option>Completed</option>
                                    <option>Processing</option>
                                    <option>Scheduled</option>
                                    <option>Failed</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="filter-group">
                                <label class="filter-label">Sort By</label>
                                <select class="form-select bg-dark text-light border-secondary">
                                    <option>Date (Newest First)</option>
                                    <option>Date (Oldest First)</option>
                                    <option>Report Name</option>
                                    <option>File Size</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <button class="btn btn-primary me-2">
                                <i class="fas fa-filter me-1"></i> Apply Filters
                            </button>
                            <button class="btn btn-outline-secondary">
                                <i class="fas fa-redo me-1"></i> Reset
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Recent Reports -->
                <div class="dashboard-card">
                    <div class="card-title d-flex justify-content-between align-items-center">
                        <span>Recent Reports</span>
                        <div>
                            <button class="btn btn-sm btn-outline-primary me-2">
                                <i class="fas fa-download me-1"></i> Export All
                            </button>
                            <button class="btn btn-sm btn-primary">
                                <i class="fas fa-plus me-1"></i> New Report
                            </button>
                        </div>
                    </div>
                    <div class="report-list">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Report Name</th>
                                    <th>Type</th>
                                    <th>Generated</th>
                                    <th>File Size</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="fw-bold">Q4 2023 Performance Report</div>
                                        <small class="text-muted">Includes all portfolio assets</small>
                                    </td>
                                    <td>Performance</td>
                                    <td>15 Nov 2023</td>
                                    <td>2.4 MB</td>
                                    <td><span class="report-status status-completed">Completed</span></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-download"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary">
                                                <i class="fas fa-share"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="fw-bold">November Transaction Summary</div>
                                        <small class="text-muted">All transactions for November</small>
                                    </td>
                                    <td>Transactions</td>
                                    <td>14 Nov 2023</td>
                                    <td>1.8 MB</td>
                                    <td><span class="report-status status-completed">Completed</span></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-download"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary">
                                                <i class="fas fa-share"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="fw-bold">AI Investment Insights</div>
                                        <small class="text-muted">Market trends and opportunities</small>
                                    </td>
                                    <td>AI Analysis</td>
                                    <td>12 Nov 2023</td>
                                    <td>3.2 MB</td>
                                    <td><span class="report-status status-completed">Completed</span></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-download"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary">
                                                <i class="fas fa-share"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="fw-bold">Risk Assessment Q4</div>
                                        <small class="text-muted">Portfolio risk analysis</small>
                                    </td>
                                    <td>Risk Analysis</td>
                                    <td>10 Nov 2023</td>
                                    <td>2.1 MB</td>
                                    <td><span class="report-status status-completed">Completed</span></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-download"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary">
                                                <i class="fas fa-share"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="fw-bold">Year-End Tax Preparation</div>
                                        <small class="text-muted">Tax document compilation</small>
                                    </td>
                                    <td>Tax Report</td>
                                    <td>08 Nov 2023</td>
                                    <td>4.5 MB</td>
                                    <td><span class="report-status status-processing">Processing</span></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-outline-primary" disabled>
                                                <i class="fas fa-download"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary" disabled>
                                                <i class="fas fa-share"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="fw-bold">Weekly Portfolio Update</div>
                                        <small class="text-muted">Automated weekly report</small>
                                    </td>
                                    <td>Performance</td>
                                    <td>05 Nov 2023</td>
                                    <td>1.2 MB</td>
                                    <td><span class="report-status status-completed">Completed</span></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-download"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary">
                                                <i class="fas fa-share"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Report Preview Section -->
                <div class="dashboard-card">
                    <div class="card-title">Report Preview</div>
                    <div class="report-preview">
                        <div class="preview-header">
                            <div class="preview-title">Q4 2023 Performance Report</div>
                            <div class="preview-subtitle">Generated on November 15, 2023 • 24 pages</div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Executive Summary</h6>
                                <p class="text-muted">
                                    Your portfolio achieved a 23.9% return year-to-date, outperforming the S&P 500 by
                                    8.2%.
                                    The AI Growth Fund was the top performer with 28.7% returns.
                                </p>
                                <h6 class="mt-3">Key Metrics</h6>
                                <ul class="text-muted">
                                    <li>Total Portfolio Value: $247,850</li>
                                    <li>YTD Return: 23.9%</li>
                                    <li>Best Performer: AI Growth Fund (+28.7%)</li>
                                    <li>Dividends Received: $2,450 YTD</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6>Portfolio Allocation</h6>
                                <div class="chart-container" style="height: 200px;">
                                    <canvas id="previewChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 text-center">
                            <button class="btn btn-primary me-2">
                                <i class="fas fa-download me-1"></i> Download Full Report
                            </button>
                            <button class="btn btn-outline-primary">
                                <i class="fas fa-print me-1"></i> Print Report
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Initialize charts when the page loads
        document.addEventListener('DOMContentLoaded', function() {
            // Report Generation Chart
            const reportCtx = document.getElementById('reportChart').getContext('2d');
            const reportChart = new Chart(reportCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov'],
                    datasets: [
                        {
                            label: 'Performance Reports',
                            data: [3, 5, 4, 6, 5, 7, 8, 6, 9, 8, 7],
                            borderColor: '#0052a3',
                            backgroundColor: 'rgba(0, 82, 163, 0.1)',
                            borderWidth: 2,
                            fill: true,
                            tension: 0.4
                        },
                        {
                            label: 'Transaction Reports',
                            data: [2, 3, 4, 3, 5, 4, 6, 5, 4, 5, 6],
                            borderColor: '#00c853',
                            backgroundColor: 'rgba(0, 200, 83, 0.1)',
                            borderWidth: 2,
                            fill: true,
                            tension: 0.4
                        },
                        {
                            label: 'Tax Reports',
                            data: [1, 1, 2, 1, 1, 2, 1, 2, 3, 2, 4],
                            borderColor: '#ff9800',
                            backgroundColor: 'rgba(255, 152, 0, 0.1)',
                            borderWidth: 2,
                            fill: true,
                            tension: 0.4
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                color: '#a8c6e5'
                            }
                        }
                    },
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
                    }
                }
            });
            
            // Preview Chart
            const previewCtx = document.getElementById('previewChart').getContext('2d');
            const previewChart = new Chart(previewCtx, {
                type: 'doughnut',
                data: {
                    labels: ['AI ETF', 'Growth Fund', 'Infrastructure', 'Cash'],
                    datasets: [{
                        data: [42, 35, 18, 5],
                        backgroundColor: [
                            '#3b82f6',
                            '#10b981',
                            '#f59e0b',
                            '#ef4444'
                        ],
                        borderWidth: 0
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
                    },
                    cutout: '60%'
                }
            });
        });
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenex - Investment Dashboard</title>
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
        
        /* Investment Cards */
        .investment-card {
            background-color: var(--primary-blue);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid var(--border-color);
            transition: all 0.3s;
        }
        
        .investment-card:hover {
            border-color: var(--accent-blue);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        .investment-icon {
            font-size: 2rem;
            color: var(--accent-blue);
            margin-bottom: 15px;
        }
        
        .investment-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 10px;
            color: white;
        }
        
        .investment-amount {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        /* Performance Chart */
        .chart-container {
            height: 300px;
            position: relative;
        }
        
        /* Allocation */
        .allocation-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid var(--border-color);
        }
        
        .allocation-item:last-child {
            border-bottom: none;
        }
        
        .allocation-name {
            display: flex;
            align-items: center;
        }
        
        .allocation-color {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin-right: 10px;
        }
        
        .allocation-percent {
            font-weight: 600;
        }
        
        /* Investment Opportunities */
        .opportunity-card {
            background-color: var(--light-blue);
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid var(--border-color);
            transition: all 0.3s;
        }
        
        .opportunity-card:hover {
            border-color: var(--accent-blue);
            transform: translateX(5px);
        }
        
        .opportunity-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 5px;
            color: white;
        }
        
        .opportunity-metric {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
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
        
        /* Holdings Table */
        .holdings-table {
            background-color: var(--primary-blue);
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid var(--border-color);
        }
        
        .holdings-table table {
            margin-bottom: 0;
            color: var(--text-color);
        }
        
        .holdings-table thead {
            background-color: var(--accent-blue);
            color: white;
        }
        
        .holdings-table th {
            padding: 15px;
            font-weight: 600;
            border: none;
        }
        
        .holdings-table td {
            padding: 15px;
            border-color: var(--border-color);
        }
        
        .holdings-table tbody tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.05);
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
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .sidebar {
                min-height: auto;
                width: 100%;
            }
            
            .card-value {
                font-size: 1.5rem;
            }
            
            .holdings-table {
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
                        <i class="fas fa-robot me-2"></i>Tenex
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
                            <a class="nav-link active" href="investment">
                                <i class="fas fa-wallet"></i> Investments
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="transactions.html">
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
                    <h4 class="mb-0">Investment Dashboard</h4>
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
                        <a href="directdeposit.html" class="action-btn">
                            <i class="fas fa-plus-circle"></i>
                            Add Funds
                        </a>
                        <a href="insurance" class="action-btn">
                            <i class="fas fa-search-dollar"></i>
                            Find Opportunities
                        </a>
                        <a href="reports.html" class="action-btn">
                            <i class="fas fa-download"></i>
                            Export Report
                        </a>
                        <a href="alert.html" class="action-btn">
                            <i class="fas fa-bell"></i>
                            Set Alerts
                        </a>
                        <a href="accountmanager3.html" class="action-btn">
                            <i class="fas fa-question-circle"></i>
                            Get Support
                        </a>
                    </div>
                </div>
                
                <!-- Investment Overview -->
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-title">Total Investment</div>
                            <div class="card-value">$247,850</div>
                            <div class="card-change positive">
                                <i class="fas fa-arrow-up"></i> +2.34% ($5,670)
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-title">Available Cash</div>
                            <div class="card-value">$12,450</div>
                            <div class="card-change">
                                Ready to invest
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-title">Monthly Return</div>
                            <div class="card-value positive">+$3,245</div>
                            <div class="card-change positive">
                                <i class="fas fa-arrow-up"></i> +1.33%
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-title">Total Return</div>
                            <div class="card-value positive">+$47,850</div>
                            <div class="card-change positive">
                                <i class="fas fa-arrow-up"></i> +23.9%
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Performance Metrics -->
                <div class="dashboard-card">
                    <div class="card-title">Investment Performance Metrics</div>
                    <div class="metrics-grid">
                        <div class="metric-card">
                            <div class="metric-value positive">18.7%</div>
                            <div class="metric-label">YTD Return</div>
                        </div>
                        <div class="metric-card">
                            <div class="metric-value positive">24.3%</div>
                            <div class="metric-label">1-Year Return</div>
                        </div>
                        <div class="metric-card">
                            <div class="metric-value">1.12</div>
                            <div class="metric-label">Sharpe Ratio</div>
                        </div>
                        <div class="metric-card">
                            <div class="metric-value">14.2%</div>
                            <div class="metric-label">Volatility</div>
                        </div>
                        <div class="metric-card">
                            <div class="metric-value">0.94</div>
                            <div class="metric-label">Beta</div>
                        </div>
                        <div class="metric-card">
                            <div class="metric-value">$2,450</div>
                            <div class="metric-label">Dividends YTD</div>
                        </div>
                    </div>
                </div>
                
                <!-- Investment Performance & Allocation -->
                <div class="row">
                    <!-- Performance Chart -->
                    <div class="col-lg-8">
                        <div class="dashboard-card">
                            <div class="card-title">Investment Performance</div>
                            <div class="chart-container">
                                <canvas id="performanceChart"></canvas>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Portfolio Allocation -->
                    <div class="col-lg-4">
                        <div class="dashboard-card">
                            <div class="card-title">Investment Allocation</div>
                            <div class="chart-container">
                                <canvas id="allocationChart"></canvas>
                            </div>
                            <div class="mt-3">
                                <div class="allocation-item">
                                    <div class="allocation-name">
                                        <div class="allocation-color" style="background-color: #3b82f6;"></div>
                                        <span>AI ETF</span>
                                    </div>
                                    <div class="allocation-percent">42%</div>
                                </div>
                                <div class="allocation-item">
                                    <div class="allocation-name">
                                        <div class="allocation-color" style="background-color: #10b981;"></div>
                                        <span>Growth Fund</span>
                                    </div>
                                    <div class="allocation-percent">35%</div>
                                </div>
                                <div class="allocation-item">
                                    <div class="allocation-name">
                                        <div class="allocation-color" style="background-color: #f59e0b;"></div>
                                        <span>Infrastructure</span>
                                    </div>
                                    <div class="allocation-percent">18%</div>
                                </div>
                                <div class="allocation-item">
                                    <div class="allocation-name">
                                        <div class="allocation-color" style="background-color: #ef4444;"></div>
                                        <span>Cash</span>
                                    </div>
                                    <div class="allocation-percent">5%</div>
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
            // Performance Chart
            const performanceCtx = document.getElementById('performanceChart').getContext('2d');
            const performanceChart = new Chart(performanceCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Investment Value',
                        data: [200000, 205000, 210500, 215200, 218000, 222500, 225800, 230200, 235600, 240300, 245100, 247850],
                        borderColor: '#0052a3',
                        backgroundColor: 'rgba(0, 82, 163, 0.1)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: false,
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            },
                            ticks: {
                                color: '#a8c6e5',
                                callback: function(value) {
                                    return '$' + (value / 1000) + 'k';
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
                    }
                }
            });
            
            // Allocation Chart
            const allocationCtx = document.getElementById('allocationChart').getContext('2d');
            const allocationChart = new Chart(allocationCtx, {
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
                            display: false
                        }
                    },
                    cutout: '70%'
                }
            });
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheSpace - Portfolio Dashboard</title>
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
        
        /* Portfolio Allocation */
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
        
        /* Performance Chart */
        .chart-container {
            height: 300px;
            position: relative;
        }
        
        /* Recent Activity */
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
        
        .activity-buy {
            background-color: rgba(0, 200, 83, 0.2);
            color: var(--success-green);
        }
        
        .activity-sell {
            background-color: rgba(244, 67, 54, 0.2);
            color: var(--danger-red);
        }
        
        .activity-dividend {
            background-color: rgba(0, 82, 163, 0.2);
            color: var(--accent-blue);
        }
        
        .activity-details {
            flex-grow: 1;
        }
        
        .activity-amount {
            font-weight: 600;
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
                        <i class="fas fa-robot me-2"></i>TheSpace
                    </a>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.html">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="portfolio.html">
                                <i class="fas fa-chart-line"></i> Portfolio
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="investment">
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
                    <h4 class="mb-0">Portfolio Dashboard</h4>
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
                        <a href="reports.html" class="action-btn">
                            <i class="fas fa-download"></i>
                            Export Report
                        </a>
                        <a href="transactions.html" class="action-btn">
                            <i class="fas fa-history"></i>
                            Transaction History
                        </a>
                        <a href="alert.html" class="action-btn">
                            <i class="fas fa-bell"></i>
                            Alerts
                        </a>
                        <a href="accountmanager3.html" class="action-btn">
                            <i class="fas fa-question-circle"></i>
                            Support
                        </a>
                    </div>
                </div>
                
                <!-- Portfolio Overview -->
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-title">Portfolio Value</div>
                            <div class="card-value" id="portfolioValue">$0.00</div>
                            <div class="card-change" id="portfolioChange">
                                <i class="fas fa-minus"></i> 0.00% ($0.00)
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-title">Today's Gain</div>
                            <div class="card-value" id="todaysGain">$0.00</div>
                            <div class="card-change" id="todaysGainChange">
                                <i class="fas fa-minus"></i> 0.00%
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-title">Total Profit</div>
                            <div class="card-value" id="totalProfit">$0.00</div>
                            <div class="card-change" id="totalProfitChange">
                                <i class="fas fa-minus"></i> 0.00%
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-title">Withdrawal Bonus</div>
                            <div class="card-value" id="withdrawalBonus">$0.00</div>
                            <div class="card-change">
                                Available to invest
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Charts and Portfolio -->
                <div class="row">
                    <!-- Performance Chart -->
                    <div class="col-lg-8">
                        <div class="dashboard-card">
                            <div class="card-title">Portfolio Performance</div>
                            <div class="chart-container">
                                <canvas id="performanceChart"></canvas>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Portfolio Allocation -->
                    <div class="col-lg-4">
                        <div class="dashboard-card">
                            <div class="card-title">Portfolio Allocation</div>
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
                
                <!-- Holdings and Activity -->
                <div class="row">
                    <!-- Recent Activity -->
                    <div class="col-lg-4">
                        <div class="dashboard-card">
                            <div class="card-title">Recent Activity</div>
                            <div class="activity-list">
                                <div class="activity-item">
                                    <div class="activity-icon activity-buy">
                                        <i class="fas fa-arrow-down"></i>
                                    </div>
                                    <div class="activity-details">
                                        <div class="fw-bold">Buy Order</div>
                                        <small>10 shares of NVDA @ $480.25</small>
                                    </div>
                                    <div class="activity-amount negative">-$4,802.50</div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon activity-dividend">
                                        <i class="fas fa-money-bill-wave"></i>
                                    </div>
                                    <div class="activity-details">
                                        <div class="fw-bold">Dividend Received</div>
                                        <small>MSFT Quarterly Dividend</small>
                                    </div>
                                    <div class="activity-amount positive">+$45.60</div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon activity-sell">
                                        <i class="fas fa-arrow-up"></i>
                                    </div>
                                    <div class="activity-details">
                                        <div class="fw-bold">Sell Order</div>
                                        <small>5 shares of META @ $315.40</small>
                                    </div>
                                    <div class="activity-amount positive">+$1,577.00</div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon activity-buy">
                                        <i class="fas fa-arrow-down"></i>
                                    </div>
                                    <div class="activity-details">
                                        <div class="fw-bold">Buy Order</div>
                                        <small>AI Growth Fund Allocation</small>
                                    </div>
                                    <div class="activity-amount negative">-$10,000.00</div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon activity-dividend">
                                        <i class="fas fa-money-bill-wave"></i>
                                    </div>
                                    <div class="activity-details">
                                        <div class="fw-bold">Dividend Received</div>
                                        <small>TSLA Special Dividend</small>
                                    </div>
                                    <div class="activity-amount positive">+$120.75</div>
                                </div>
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
        // Initialize charts when the page loads
        document.addEventListener('DOMContentLoaded', function() {
            // Performance Chart
            const performanceCtx = document.getElementById('performanceChart').getContext('2d');
            const performanceChart = new Chart(performanceCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Portfolio Value',
                        data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
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
                            beginAtZero: true,
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
            
            // Initialize portfolio values
            let portfolioValue = 0;
            let todaysGain = 0;
            let totalProfit = 0;
            let withdrawalBonus = 0;
            
            // Get references to the DOM elements
            const portfolioValueElement = document.getElementById('portfolioValue');
            const portfolioChangeElement = document.getElementById('portfolioChange');
            const todaysGainElement = document.getElementById('todaysGain');
            const todaysGainChangeElement = document.getElementById('todaysGainChange');
            const totalProfitElement = document.getElementById('totalProfit');
            const totalProfitChangeElement = document.getElementById('totalProfitChange');
            const withdrawalBonusElement = document.getElementById('withdrawalBonus');
            
            // Function to format currency
            function formatCurrency(value) {
                return '$' + value.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            }
            
            // Function to update the display
            function updateDisplay() {
                portfolioValueElement.textContent = formatCurrency(portfolioValue);
                todaysGainElement.textContent = formatCurrency(todaysGain);
                totalProfitElement.textContent = formatCurrency(totalProfit);
                withdrawalBonusElement.textContent = formatCurrency(withdrawalBonus);
                
                // Update change indicators
                const portfolioChangePercent = portfolioValue > 0 ? (todaysGain / (portfolioValue - todaysGain)) * 100 : 0;
                portfolioChangeElement.innerHTML = portfolioChangePercent > 0 ? 
                    `<i class="fas fa-arrow-up"></i> +${portfolioChangePercent.toFixed(2)}% (${formatCurrency(todaysGain)})` : 
                    `<i class="fas fa-minus"></i> 0.00% (${formatCurrency(0)})`;
                
                const todaysGainPercent = portfolioValue > 0 ? (todaysGain / portfolioValue) * 100 : 0;
                todaysGainChangeElement.innerHTML = todaysGainPercent > 0 ? 
                    `<i class="fas fa-arrow-up"></i> +${todaysGainPercent.toFixed(2)}%` : 
                    `<i class="fas fa-minus"></i> 0.00%`;
                
                const totalProfitPercent = portfolioValue > 0 ? (totalProfit / portfolioValue) * 100 : 0;
                totalProfitChangeElement.innerHTML = totalProfitPercent > 0 ? 
                    `<i class="fas fa-arrow-up"></i> +${totalProfitPercent.toFixed(2)}%` : 
                    `<i class="fas fa-minus"></i> 0.00%`;
                
                // Update chart data
                const currentMonth = new Date().getMonth();
                performanceChart.data.datasets[0].data[currentMonth] = portfolioValue;
                performanceChart.update();
            }
            
            // Function to simulate gradual growth
            function simulateGrowth() {
                // Simulate growth based on time since registration
                // For demonstration, we'll use a simple time-based growth model
                const growthRate = 0.0001; // 0.01% per interval
                const interval = 1000; // Update every second (for demo purposes)
                
                setInterval(() => {
                    // Calculate small increments
                    const portfolioIncrement = portfolioValue * growthRate;
                    const todaysGainIncrement = todaysGain * growthRate;
                    const totalProfitIncrement = totalProfit * growthRate;
                    const withdrawalBonusIncrement = withdrawalBonus * growthRate;
                    
                    // Update values
                    portfolioValue += portfolioIncrement;
                    todaysGain += todaysGainIncrement;
                    totalProfit += totalProfitIncrement;
                    withdrawalBonus += withdrawalBonusIncrement;
                    
                    // Update display
                    updateDisplay();
                }, interval);
            }
            
            // Function to initialize with initial investment
            function initializePortfolio() {
                // For demonstration, we'll start with a small initial investment
                // In a real application, this would come from user registration data
                const initialInvestment = 1000; // $1000 initial investment
                
                portfolioValue = initialInvestment;
                todaysGain = initialInvestment * 0.01; // 1% gain
                totalProfit = initialInvestment * 0.05; // 5% total profit
                withdrawalBonus = initialInvestment * 0.02; // 2% bonus
                
                updateDisplay();
                simulateGrowth();
            }
            
            // Initialize the portfolio after a short delay to simulate registration
            setTimeout(initializePortfolio, 2000);
        });
    </script>
</body>
</html>
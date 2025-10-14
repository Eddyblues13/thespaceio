<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheSpace - Investor Dashboard</title>
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
        
        /* Welcome Notification */
        .welcome-notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: var(--primary-blue);
            border: 1px solid var(--accent-blue);
            border-radius: 8px;
            padding: 20px;
            max-width: 350px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            z-index: 1050;
            transform: translateX(400px);
            transition: transform 0.4s ease-in-out;
            opacity: 0;
        }
        
        .welcome-notification.show {
            transform: translateX(0);
            opacity: 1;
        }
        
        .notification-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        
        .notification-title {
            font-weight: 600;
            font-size: 1.1rem;
            color: var(--text-color);
            margin: 0;
        }
        
        .notification-close {
            background: none;
            border: none;
            color: var(--text-color);
            font-size: 1.2rem;
            cursor: pointer;
            opacity: 0.7;
            transition: opacity 0.2s;
        }
        
        .notification-close:hover {
            opacity: 1;
        }
        
        .notification-content {
            font-size: 0.95rem;
            color: #a8c6e5;
            margin-bottom: 15px;
        }
        
        .notification-actions {
            display: flex;
            gap: 10px;
        }
        
        .notification-btn {
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            border: none;
        }
        
        .notification-btn-primary {
            background-color: var(--accent-blue);
            color: white;
        }
        
        .notification-btn-secondary {
            background-color: transparent;
            color: var(--text-color);
            border: 1px solid var(--border-color);
        }
        
        .notification-btn:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }
        
        /* Deposit Guidelines Section */
        .deposit-guidelines {
            margin-bottom: 30px;
        }
        
        .guidelines-card {
            background-color: var(--primary-blue);
            border-radius: 10px;
            padding: 25px;
            border: 1px solid var(--border-color);
            transition: all 0.3s;
        }
        
        .guidelines-card:hover {
            border-color: var(--accent-blue);
        }
        
        .guidelines-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border-color);
        }
        
        .guidelines-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--text-color);
            margin: 0;
        }
        
        .guidelines-toggle {
            background: none;
            border: none;
            color: var(--accent-blue);
            font-size: 0.9rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: all 0.2s;
        }
        
        .guidelines-toggle:hover {
            opacity: 0.8;
        }
        
        .guidelines-content {
            display: block;
        }
        
        .guidelines-content.collapsed {
            display: none;
        }
        
        .guideline-item {
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--border-color);
        }
        
        .guideline-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        
        .guideline-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
            background-color: var(--accent-blue);
            color: white;
            border-radius: 50%;
            font-weight: 600;
            margin-right: 10px;
        }
        
        .guideline-heading {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--text-color);
        }
        
        .guideline-text {
            color: #a8c6e5;
            margin-bottom: 15px;
            line-height: 1.6;
        }
        
        .deposit-methods {
            display: flex;
            gap: 20px;
            margin-top: 15px;
        }
        
        .method-card {
            flex: 1;
            background-color: var(--light-blue);
            border-radius: 8px;
            padding: 20px;
            border: 1px solid var(--border-color);
            transition: all 0.3s;
        }
        
        .method-card:hover {
            border-color: var(--accent-blue);
            transform: translateY(-3px);
        }
        
        .method-title {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--text-color);
        }
        
        .method-description {
            color: #a8c6e5;
            font-size: 0.9rem;
            line-height: 1.5;
        }
        
        .key-terms {
            background-color: var(--light-blue);
            border-radius: 8px;
            padding: 15px;
            margin-top: 15px;
            border-left: 4px solid var(--accent-blue);
        }
        
        .key-terms-title {
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--text-color);
        }
        
        .key-terms-list {
            color: #a8c6e5;
            padding-left: 20px;
            margin: 0;
        }
        
        .key-terms-list li {
            margin-bottom: 8px;
        }
        
        /* Action Buttons Section */
        .action-buttons-section {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid var(--border-color);
        }
        
        .action-buttons-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--text-color);
            text-align: center;
        }
        
        .action-buttons-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
            align-items: center;
        }
        
        .top-button {
            width: 100%;
            max-width: 400px;
        }
        
        .bottom-buttons {
            display: flex;
            gap: 15px;
            width: 100%;
            max-width: 400px;
        }
        
        .action-button {
            padding: 14px 20px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-decoration: none;
            text-align: center;
            min-height: 60px;
            flex: 1;
        }
        
        .action-button:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }
        
        .action-button i {
            font-size: 1.2rem;
        }
        
        .manager-button {
            background-color: var(--accent-blue);
            color: white;
        }
        
        .direct-deposit-button {
            background-color: var(--success-green);
            color: white;
        }
        
        .installment-button {
            background-color: var(--warning-orange);
            color: white;
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
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .sidebar {
                min-height: auto;
                width: 100%;
            }
            
            .welcome-notification {
                top: 10px;
                right: 10px;
                left: 10px;
                max-width: none;
            }
            
            .deposit-methods {
                flex-direction: column;
            }
            
            .method-card {
                width: 100%;
            }
            
            .card-value {
                font-size: 1.5rem;
            }
            
            .holdings-table {
                overflow-x: auto;
            }
            
            .bottom-buttons {
                flex-direction: column;
            }
            
            .action-button {
                min-height: 55px;
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
            
            .guidelines-card {
                padding: 20px 15px;
            }
            
            .guidelines-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            
            .guidelines-toggle {
                align-self: flex-end;
            }
            
            .action-button {
                padding: 12px 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Welcome Notification -->
    <div class="welcome-notification" id="welcomeNotification">
        <div class="notification-header">
            <h3 class="notification-title">Welcome Back, John!</h3>
            <button class="notification-close" id="notificationClose">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="notification-content">
            Your portfolio is up <span class="positive">+2.34%</span> since your last visit. Check out your latest gains and recent activity.
        </div>
        <div class="notification-actions">
            <button class="notification-btn notification-btn-primary" id="viewPortfolioBtn">
                View Portfolio
            </button>
            <button class="notification-btn notification-btn-secondary" id="dismissBtn">
                Dismiss
            </button>
        </div>
    </div>
    
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
                            <a class="nav-link active" href="dashboard.html">
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
                    <h4 class="mb-0">Investor Dashboard</h4>
                    <div class="user-info">
                        <div class="user-avatar">JD</div>
                        <div>
                            <div class="fw-bold">John Doe</div>
                            <small class="text-muted">Tier 2 Investor</small>
                        </div>
                    </div>
                </div>
                
                <!-- Deposit Guidelines Section -->
                <div class="deposit-guidelines">
                    <div class="guidelines-card">
                        <div class="guidelines-header">
                            <h2 class="guidelines-title">Deposit Guidelines</h2>
                            <button class="guidelines-toggle" id="guidelinesToggle">
                                <span>Collapse</span>
                                <i class="fas fa-chevron-up"></i>
                            </button>
                        </div>
                        <div class="guidelines-content" id="guidelinesContent">
                            <!-- Guideline 1 -->
                            <div class="guideline-item">
                                <h3 class="guideline-heading">
                                    <span class="guideline-number">1</span>
                                    Requesting an Account Manager
                                </h3>
                                <p class="guideline-text">
                                    Prior to initiating any deposit, it is strongly advised that you request the assistance of an Account Manager if you don't have one.
                                    Your assigned Account Manager will provide personalized guidance throughout the deposit and investment process, ensuring compliance with all necessary procedures.
                                </p>
                            </div>
                            
                            <!-- Guideline 2 -->
                            <div class="guideline-item">
                                <h3 class="guideline-heading">
                                    <span class="guideline-number">2</span>
                                    Deposit Methods
                                </h3>
                                <p class="guideline-text">
                                    We offer two convenient deposit methods to accommodate different investor preferences: Direct Deposit and Installment Payment.
                                </p>
                                
                                <div class="deposit-methods">
                                    <!-- Direct Deposit Method -->
                                    <div class="method-card">
                                        <h4 class="method-title">Direct Deposit</h4>
                                        <p class="method-description">
                                            A Direct Deposit involves transferring the entire investment amount in a single transaction.
                                            Once the deposit is confirmed, your investment will be activated immediately, and returns will commence according to the terms of your selected investment plan.
                                        </p>
                                    </div>
                                    
                                    <!-- Installment Payment Method -->
                                    <div class="method-card">
                                        <h4 class="method-title">Installment Payment</h4>
                                        <p class="method-description">
                                            The Installment Payment option is designed for investors who intend to begin with a specific investment amount but do not currently have the full capital available.
                                            For example, if you plan to start with $50,000 but do not have the complete funds at the moment, you may choose to make payments in smaller portions until the full amount is reached.
                                        </p>
                                    </div>
                                </div>
                                
                                <div class="key-terms">
                                    <h4 class="key-terms-title">Key Terms:</h4>
                                    <ul class="key-terms-list">
                                        <li>You may complete your installment payments in up to four (3) transactions.</li>
                                        <li>Your investment will officially commence after the total target amount has been fully deposited.</li>
                                        <li>Following your first installment, you will begin receiving company bonuses, which are withdrawable to your registered bank wallet or wallet.</li>
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- Action Buttons Section -->
                            <div class="action-buttons-section">
                                <h3 class="action-buttons-title">Take Action</h3>
                                <div class="action-buttons-container">
                                    <button class="action-button manager-button top-button" id="requestManagerBtn">
                                        <i class="fas fa-user-tie"></i>
                                       <a href="accountmanager3.html"> Request Account Manager</a>
                                    </button>
                                    <div class="bottom-buttons">
                                        <a href="directdeposit.html" class="action-button direct-deposit-button">
                                            <i class="fas fa-money-bill-wave"></i>
                                            Direct Deposit
                                        </a>
                                        <button class="action-button installment-button" id="installmentBtn">
                                            <i class="fas fa-calendar-alt"></i>
                                            <a href="installmentalpayment.html">Installment Payment</a>
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
            // Performance Chart
            const performanceCtx = document.getElementById('performanceChart').getContext('2d');
            const performanceChart = new Chart(performanceCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Portfolio Value',
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
            
            // Welcome Notification Logic
            const welcomeNotification = document.getElementById('welcomeNotification');
            const notificationClose = document.getElementById('notificationClose');
            const dismissBtn = document.getElementById('dismissBtn');
            const viewPortfolioBtn = document.getElementById('viewPortfolioBtn');
            
            // Show notification after a short delay
            setTimeout(() => {
                welcomeNotification.classList.add('show');
            }, 800);
            
            // Close notification when X button is clicked
            notificationClose.addEventListener('click', () => {
                welcomeNotification.classList.remove('show');
            });
            
            // Close notification when dismiss button is clicked
            dismissBtn.addEventListener('click', () => {
                welcomeNotification.classList.remove('show');
            });
            
            // Navigate to portfolio when view portfolio button is clicked
            viewPortfolioBtn.addEventListener('click', () => {
                // In a real application, this would navigate to the portfolio page
                alert('Navigating to Portfolio page...');
                welcomeNotification.classList.remove('show');
            });
            
            // Auto-hide notification after 8 seconds
            setTimeout(() => {
                if (welcomeNotification.classList.contains('show')) {
                    welcomeNotification.classList.remove('show');
                }
            }, 8000);
            
            // Deposit Guidelines Logic
            const guidelinesToggle = document.getElementById('guidelinesToggle');
            const guidelinesContent = document.getElementById('guidelinesContent');
            const requestManagerBtn = document.getElementById('requestManagerBtn');
            const installmentBtn = document.getElementById('installmentBtn');
            
            // Toggle guidelines content
            guidelinesToggle.addEventListener('click', () => {
                guidelinesContent.classList.toggle('collapsed');
                
                if (guidelinesContent.classList.contains('collapsed')) {
                    guidelinesToggle.innerHTML = '<span>Expand</span> <i class="fas fa-chevron-down"></i>';
                } else {
                    guidelinesToggle.innerHTML = '<span>Collapse</span> <i class="fas fa-chevron-up"></i>';
                }
            });
            
            // Request Account Manager button
            requestManagerBtn.addEventListener('click', () => {
                // In a real application, this would trigger a request process
                alert('Account Manager request submitted! A representative will contact you shortly.');
                
                // Optional: Change button state after click
                requestManagerBtn.innerHTML = '<i class="fas fa-check"></i> Request Submitted';
                requestManagerBtn.disabled = true;
                requestManagerBtn.style.backgroundColor = 'var(--success-green)';
            });
            
            // Installment Payment button
            installmentBtn.addEventListener('click', () => {
                // In a real application, this would navigate to the installment payment page
                alert('Redirecting to Installment Payment page...');
            });
        });
    </script>
</body>
</html>
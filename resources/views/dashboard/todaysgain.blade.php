<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheSpace - Today's Gain</title>
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

        /* Tier Cards */
        .tier-card {
            background-color: var(--primary-blue);
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 25px;
            border: 1px solid var(--border-color);
            transition: all 0.3s;
            height: 100%;
        }

        .tier-card:hover {
            border-color: var(--accent-blue);
            transform: translateY(-5px);
        }

        .tier-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border-color);
        }

        .tier-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--text-color);
            margin: 0;
        }

        .tier-badge {
            background-color: var(--accent-blue);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .tier-range {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--text-color);
        }

        .gain-range {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: var(--success-green);
        }

        .tier-features {
            list-style: none;
            padding: 0;
            margin-bottom: 20px;
        }

        .tier-features li {
            padding: 8px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            color: #a8c6e5;
        }

        .tier-features li:last-child {
            border-bottom: none;
        }

        .tier-features li i {
            color: var(--accent-blue);
            margin-right: 10px;
        }

        /* Performance Chart */
        .chart-container {
            height: 300px;
            position: relative;
        }

        /* Insights Section */
        .insights-card {
            background-color: var(--primary-blue);
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 25px;
            border: 1px solid var(--border-color);
        }

        .insights-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border-color);
        }

        .insights-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--text-color);
            margin: 0;
        }

        .insights-content {
            color: #a8c6e5;
            line-height: 1.7;
        }

        .insights-list {
            padding-left: 20px;
            margin-top: 15px;
        }

        .insights-list li {
            margin-bottom: 10px;
        }

        /* Performance Sources */
        .sources-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 20px;
        }

        .source-item {
            flex: 1;
            min-width: 150px;
            background-color: var(--light-blue);
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            border: 1px solid var(--border-color);
        }

        .source-percent {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--accent-blue);
            margin-bottom: 5px;
        }

        .source-label {
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

            .source-item {
                min-width: 120px;
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

            .tier-card {
                padding: 20px 15px;
            }

            .tier-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .sources-container {
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
                        <i class="fas fa-robot me-2"></i>TheSpace
                    </a>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('dashboard')}}">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('dashboard.todaysgain')}}">
                                <i class="fas fa-chart-line"></i> Today's Gain
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('dashboard.portfolio')}}">
                                <i class="fas fa-wallet"></i> Portfolio
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('dashboard.investments')}}">
                                <i class="fas fa-money-bill-wave"></i> Investments
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('dashboard.transactions')}}">
                                <i class="fas fa-exchange-alt"></i> Transactions
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('dashboard.insurance')}}">
                                <i class="fas fa-file-invoice-dollar"></i> Insurance
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="c">
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
                    <h4 class="mb-0">Today's Gain Analysis</h4>
                    <div class="user-info">
                        <div class="user-avatar"> {{ strtoupper(substr(Auth::user()->first_name ?? Auth::user()->name,
                            0, 1)) }}
                            {{ strtoupper(substr(Auth::user()->last_name ?? '', 0, 1)) }}</div>
                        <div>
                            <div class="fw-bold"> {{ Auth::user()->first_name ?? Auth::user()->name }}{{
                                Auth::user()->last_name
                                ?? '' }}</div>
                            <small class="text-muted">Growth Tier Investor</small>
                        </div>
                    </div>
                </div>

                <!-- Today's Gain Summary -->
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="dashboard-card">
                            <div class="card-title">Today's Gain</div>
                            <div class="card-value positive">+$3,240.85</div>
                            <div class="card-change positive">
                                <i class="fas fa-arrow-up"></i> +1.52%
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="dashboard-card">
                            <div class="card-title">Portfolio Value</div>
                            <div class="card-value">$213,400.00</div>
                            <div class="card-change positive">
                                <i class="fas fa-arrow-up"></i> +2.34% ($4,870)
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="dashboard-card">
                            <div class="card-title">AI Index Trend</div>
                            <div class="card-value">Stable Growth</div>
                            <div class="card-change positive">
                                <i class="fas fa-chart-line"></i> 📈
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Performance Sources -->
                <div class="dashboard-card">
                    <div class="card-title">Performance Source</div>
                    <div class="sources-container">
                        <div class="source-item">
                            <div class="source-percent">60%</div>
                            <div class="source-label">Public AI Stocks</div>
                        </div>
                        <div class="source-item">
                            <div class="source-percent">25%</div>
                            <div class="source-label">Startup Growth</div>
                        </div>
                        <div class="source-item">
                            <div class="source-percent">15%</div>
                            <div class="source-label">AI ETF</div>
                        </div>
                    </div>
                </div>

                <!-- Performance Chart -->
                <div class="dashboard-card">
                    <div class="card-title">Daily Gain Trend (Last 30 Days)</div>
                    <div class="chart-container">
                        <canvas id="gainChart"></canvas>
                    </div>
                </div>

                <!-- Investment Tiers -->
                <div class="row">
                    <div class="col-12">
                        <h3 class="mb-4" style="color: var(--accent-blue);">TheSpace Investor Portfolio — Today's Gain
                            Range</h3>
                    </div>

                    <!-- Starter Tier -->
                    <div class="col-lg-6">
                        <div class="tier-card">
                            <div class="tier-header">
                                <h3 class="tier-title">Starter Tier</h3>
                                <span class="tier-badge">Entry Level</span>
                            </div>
                            <div class="tier-range">$10,000 – $49,999</div>
                            <div class="gain-range">$150 – $600/day</div>
                            <ul class="tier-features">
                                <li><i class="fas fa-check"></i> Diversified AI stock growth</li>
                                <li><i class="fas fa-check"></i> Minor startup returns</li>
                                <li><i class="fas fa-check"></i> Basic portfolio optimization</li>
                                <li><i class="fas fa-check"></i> Standard market analytics</li>
                            </ul>
                            <div class="text-center">
                                <button class="btn btn-outline-primary">View Details</button>
                            </div>
                        </div>
                    </div>

                    <!-- Growth Tier -->
                    <div class="col-lg-6">
                        <div class="tier-card">
                            <div class="tier-header">
                                <h3 class="tier-title">Growth Tier</h3>
                                <span class="tier-badge">Popular</span>
                            </div>
                            <div class="tier-range">$50,000 – $249,999</div>
                            <div class="gain-range">$700 – $3,500/day</div>
                            <ul class="tier-features">
                                <li><i class="fas fa-check"></i> Exposure to major AI firms</li>
                                <li><i class="fas fa-check"></i> Nvidia, Microsoft, Tesla holdings</li>
                                <li><i class="fas fa-check"></i> Enhanced portfolio optimization</li>
                                <li><i class="fas fa-check"></i> Advanced market analytics</li>
                            </ul>
                            <div class="text-center">
                                <button class="btn btn-primary">Current Tier</button>
                            </div>
                        </div>
                    </div>

                    <!-- Elite Tier -->
                    <div class="col-lg-6">
                        <div class="tier-card">
                            <div class="tier-header">
                                <h3 class="tier-title">Elite Tier</h3>
                                <span class="tier-badge">Premium</span>
                            </div>
                            <div class="tier-range">$250,000 – $999,999</div>
                            <div class="gain-range">$4,000 – $18,000/day</div>
                            <ul class="tier-features">
                                <li><i class="fas fa-check"></i> Public AI stock performance</li>
                                <li><i class="fas fa-check"></i> Early-stage startup growth</li>
                                <li><i class="fas fa-check"></i> Priority access to new opportunities</li>
                                <li><i class="fas fa-check"></i> Dedicated portfolio manager</li>
                            </ul>
                            <div class="text-center">
                                <button class="btn btn-outline-primary">Upgrade Now</button>
                            </div>
                        </div>
                    </div>

                    <!-- Enterprise Tier -->
                    <div class="col-lg-6">
                        <div class="tier-card">
                            <div class="tier-header">
                                <h3 class="tier-title">Enterprise Tier</h3>
                                <span class="tier-badge">Exclusive</span>
                            </div>
                            <div class="tier-range">$1M – $4.9M</div>
                            <div class="gain-range">$20,000 – $70,000/day</div>
                            <ul class="tier-features">
                                <li><i class="fas fa-check"></i> Partnership-level profit shares</li>
                                <li><i class="fas fa-check"></i> Private AI fund participation</li>
                                <li><i class="fas fa-check"></i> Direct investment opportunities</li>
                                <li><i class="fas fa-check"></i> Executive portfolio management</li>
                            </ul>
                            <div class="text-center">
                                <button class="btn btn-outline-primary">Contact Sales</button>
                            </div>
                        </div>
                    </div>

                    <!-- Institutional Tier -->
                    <div class="col-lg-12">
                        <div class="tier-card">
                            <div class="tier-header">
                                <h3 class="tier-title">Institutional Tier</h3>
                                <span class="tier-badge">Maximum</span>
                            </div>
                            <div class="tier-range">$5M+</div>
                            <div class="gain-range">$80,000 – $250,000/day</div>
                            <ul class="tier-features">
                                <li><i class="fas fa-check"></i> Full profit participation in TheSpace AI ETF</li>
                                <li><i class="fas fa-check"></i> Complete startup ecosystem access</li>
                                <li><i class="fas fa-check"></i> Co-investment rights</li>
                                <li><i class="fas fa-check"></i> Custom portfolio structuring</li>
                            </ul>
                            <div class="text-center">
                                <button class="btn btn-outline-primary">Schedule Consultation</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Insights -->
                <div class="insights-card">
                    <div class="insights-header">
                        <h3 class="insights-title">📊 Additional Insights</h3>
                    </div>
                    <div class="insights-content">
                        <p>TheSpace uses AI market analytics to rebalance portfolios daily, optimizing for the best
                            performance across its investments.</p>

                        <p>Daily gain fluctuations depend on:</p>
                        <ul class="insights-list">
                            <li><strong>Market movement of AI giants</strong> (Nvidia, Microsoft, Amazon, etc.)</li>
                            <li><strong>Valuation changes in TheSpace's private AI startup holdings</strong></li>
                            <li><strong>Performance of TheSpace's own ETF and AI fund</strong></li>
                        </ul>

                        <p>Our proprietary algorithms continuously analyze market conditions, company performance
                            metrics, and macroeconomic indicators to maximize returns while managing risk exposure.</p>
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
            // Gain Chart
            const gainCtx = document.getElementById('gainChart').getContext('2d');
            const gainChart = new Chart(gainCtx, {
                type: 'line',
                data: {
                    labels: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7', 'Day 8', 'Day 9', 'Day 10', 
                            'Day 11', 'Day 12', 'Day 13', 'Day 14', 'Day 15', 'Day 16', 'Day 17', 'Day 18', 'Day 19', 'Day 20',
                            'Day 21', 'Day 22', 'Day 23', 'Day 24', 'Day 25', 'Day 26', 'Day 27', 'Day 28', 'Day 29', 'Today'],
                    datasets: [{
                        label: 'Daily Gain ($)',
                        data: [2450, 2780, 3120, 2950, 2670, 2890, 3010, 3240, 2980, 3150, 
                               3320, 3080, 2870, 3010, 3190, 2950, 2780, 3020, 3240, 2980,
                               3120, 2890, 3010, 3240, 2950, 2780, 3120, 3010, 3240, 3240.85],
                        borderColor: '#00c853',
                        backgroundColor: 'rgba(0, 200, 83, 0.1)',
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
                            labels: {
                                color: '#a8c6e5'
                            }
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
                                    return '$' + value.toLocaleString();
                                }
                            }
                        },
                        x: {
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            },
                            ticks: {
                                color: '#a8c6e5',
                                maxTicksLimit: 10
                            }
                        }
                    }
                }
            });
            
            // Add animation to tier cards on scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);
            
            // Apply animation to tier cards
            document.querySelectorAll('.tier-card').forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                observer.observe(card);
            });
        });
    </script>
</body>

</html>
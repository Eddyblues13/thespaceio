<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheSpace - Investment Dashboard</title>
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
            padding-top: 70px;
            /* Account for fixed navbar */
        }

        /* Navigation Bar */
        .navbar-TheSpace {
            background-color: var(--primary-blue);
            border-bottom: 1px solid var(--border-color);
            padding: 0.5rem 1rem;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
        }

        .navbar-brand {
            color: white;
            font-weight: bold;
        }

        .navbar-brand i {
            margin-right: 8px;
        }

        .navbar-nav .nav-link {
            color: #a8c6e5;
            padding: 10px 15px;
            transition: all 0.3s;
            border-radius: 5px;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            background-color: var(--light-blue);
            color: white;
        }

        .navbar-nav .nav-link i {
            width: 20px;
            text-align: center;
            margin-right: 8px;
        }

        .navbar-toggler {
            border: 1px solid var(--border-color);
            padding: 0.25rem 0.5rem;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* User Info in Navbar */
        .user-info {
            display: flex;
            align-items: center;
        }

        .user-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background-color: var(--accent-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            margin-right: 10px;
        }

        /* Main Content */
        .main-content {
            padding: 20px;
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

            .dashboard-card {
                padding: 15px;
            }

            .metrics-grid {
                grid-template-columns: 1fr 1fr;
            }

            .quick-actions {
                grid-template-columns: 1fr;
            }

            .navbar-nav .nav-link {
                padding: 8px 12px;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-TheSpace">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-robot"></i>TheSpace
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.portfolio') }}">
                            <i class="fas fa-chart-line"></i> Portfolio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('dashboard.investments') }}">
                            <i class="fas fa-wallet"></i> Investments
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.transactions') }}">
                            <i class="fas fa-exchange-alt"></i> Transactions
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.insurance') }}">
                            <i class="fas fa-file-invoice-dollar"></i> Insurance
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.settings') }}">
                            <i class="fas fa-cog"></i> Settings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">
                            <i class="fas fa-arrow-left"></i> Back to Main Site
                        </a>
                    </li>
                </ul>
                <div class="user-info">
                    <div class="user-avatar">{{ strtoupper(substr($user->name, 0, 2)) }}</div>
                    <div>
                        <div class="fw-bold">{{ $user->name }}</div>
                        <small class="text-muted">{{ $user->investor_tier }}</small>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid main-content">
        <!-- Quick Actions -->
        <div class="dashboard-card">
            <div class="card-title">Quick Actions</div>
            <div class="quick-actions">
                <a href="{{ route('dashboard.directdeposit') }}" class="action-btn">
                    <i class="fas fa-plus-circle"></i>
                    Add Funds
                </a>
                <a href="{{ route('dashboard.insurance') }}" class="action-btn">
                    <i class="fas fa-search-dollar"></i>
                    Find Opportunities
                </a>
                
                <a href="{{ route('dashboard') }}" class="action-btn">
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
                    <div class="card-value">${{ number_format($investmentData['total_investment'], 2) }}</div>
                    <div class="card-change positive">
                        <i class="fas fa-arrow-up"></i> +{{ number_format($investmentData['return_percentage'], 2) }}%
                        (${{ number_format($investmentData['total_returns'], 2) }})
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="dashboard-card">
                    <div class="card-title">Available Cash</div>
                    <div class="card-value">${{ number_format($user->cash_balance, 2) }}</div>
                    <div class="card-change">
                        Ready to invest
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="dashboard-card">
                    <div class="card-title">Monthly Return</div>
                    <div class="card-value positive">+${{ number_format($investmentData['monthly_return'], 2) }}</div>
                    <div class="card-change positive">
                        <i class="fas fa-arrow-up"></i> +{{ number_format($investmentData['monthly_return_percentage'],
                        2) }}%
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="dashboard-card">
                    <div class="card-title">Total Return</div>
                    <div class="card-value positive">+${{ number_format($investmentData['total_returns'], 2) }}</div>
                    <div class="card-change positive">
                        <i class="fas fa-arrow-up"></i> +{{ number_format($investmentData['return_percentage'], 2) }}%
                    </div>
                </div>
            </div>
        </div>

        <!-- Performance Metrics -->
        <div class="dashboard-card">
            <div class="card-title">Investment Performance Metrics</div>
            <div class="metrics-grid">
                <div class="metric-card">
                    <div class="metric-value positive">{{ $performanceData['ytd_return'] }}%</div>
                    <div class="metric-label">YTD Return</div>
                </div>
                <div class="metric-card">
                    <div class="metric-value positive">{{ $performanceData['one_year_return'] }}%</div>
                    <div class="metric-label">1-Year Return</div>
                </div>
                <div class="metric-card">
                    <div class="metric-value">{{ $performanceData['sharpe_ratio'] }}</div>
                    <div class="metric-label">Sharpe Ratio</div>
                </div>
                <div class="metric-card">
                    <div class="metric-value">{{ $performanceData['volatility'] }}%</div>
                    <div class="metric-label">Volatility</div>
                </div>
                <div class="metric-card">
                    <div class="metric-value">{{ $performanceData['beta'] }}</div>
                    <div class="metric-label">Beta</div>
                </div>
                <div class="metric-card">
                    <div class="metric-value">${{ number_format($performanceData['dividends_ytd'], 2) }}</div>
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
                        @foreach($allocationData as $allocation)
                        <div class="allocation-item">
                            <div class="allocation-name">
                                <div class="allocation-color" style="background-color: {{ $allocation['color'] }};">
                                </div>
                                <span>{{ $allocation['name'] }}</span>
                            </div>
                            <div class="allocation-percent">{{ number_format($allocation['percentage'], 1) }}%</div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Investments List -->
        <div class="dashboard-card">
            <div class="card-title">Your Investments</div>
            <div class="holdings-table">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Investment</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Current Value</th>
                            <th>Returns</th>
                            <th>Performance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($investments as $investment)
                        <tr>
                            <td>
                                <div class="fw-bold">{{ $investment->name }}</div>
                                <small class="text-muted">Added {{ $investment->created_at->format('M d, Y') }}</small>
                            </td>
                            <td>
                                <span class="badge bg-primary">{{ ucfirst($investment->type) }}</span>
                            </td>
                            <td>${{ number_format($investment->amount, 2) }}</td>
                            <td>${{ number_format($investment->current_value, 2) }}</td>
                            <td class="{{ $investment->returns >= 0 ? 'positive' : 'negative' }}">
                                ${{ number_format($investment->returns, 2) }}
                            </td>
                            <td class="{{ $investment->return_percentage >= 0 ? 'positive' : 'negative' }}">
                                {{ $investment->return_percentage >= 0 ? '+' : '' }}{{
                                number_format($investment->return_percentage, 2) }}%
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
                        data: [200000, 205000, 210500, 215200, 218000, 222500, 225800, 230200, 235600, 240300, 245100, {{ $investmentData['total_investment'] }}],
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
                    labels: {!! json_encode(collect($allocationData)->pluck('name')->toArray()) !!},
                    datasets: [{
                        data: {!! json_encode(collect($allocationData)->pluck('percentage')->toArray()) !!},
                        backgroundColor: {!! json_encode(collect($allocationData)->pluck('color')->toArray()) !!},
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
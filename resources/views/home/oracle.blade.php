<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oracle Investment Analysis - AI Investment Platform</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --dark-green: #0a2e1a;
            --medium-green: #1a4d2e;
            --light-green: #2e8b57;
            --accent-green: #3cb371;
            --text-color: #e8f5e9;
            --oracle-red: #e82127;
        }

        body {
            background-color: var(--dark-green);
            color: var(--text-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        /* Floating code numbers background */
        #code-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.3;
        }

        .code-number {
            position: absolute;
            color: var(--accent-green);
            font-family: monospace;
            font-size: 14px;
            opacity: 0;
            animation: float 15s infinite linear;
        }

        @keyframes float {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }

            10% {
                opacity: 0.7;
            }

            90% {
                opacity: 0.7;
            }

            100% {
                transform: translateY(-100px) rotate(360deg);
                opacity: 0;
            }
        }

        /* Navigation */
        .navbar {
            background-color: rgba(10, 46, 26, 0.9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--accent-green);
        }

        .navbar-brand {
            font-weight: bold;
            color: var(--accent-green) !important;
            font-size: 1.5rem;
        }

        .nav-link {
            color: var(--text-color) !important;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: var(--accent-green) !important;
        }

        /* Hero Section */
        .company-hero {
            padding: 150px 0 100px;
            background: linear-gradient(135deg, var(--dark-green) 0%, var(--medium-green) 100%);
            position: relative;
            overflow: hidden;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 900;
            /* Increased from 700 to 900 for thickness */
            margin-bottom: 1.5rem;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.5);
            /* Added shadow effect */
            letter-spacing: 0.5px;
            /* Slightly increased letter spacing for better readability */
        }

        .hero-subtitle {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .oracle-red {
            color: var(--oracle-red);
        }

        /* Content Sections */
        .content-section {
            padding: 80px 0;
        }

        .section-header {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
        }

        .section-header h2 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: var(--accent-green);
        }

        .section-header::after {
            content: '';
            display: block;
            width: 100px;
            height: 3px;
            background: var(--accent-green);
            margin: 0 auto;
            margin-top: 15px;
        }

        /* Stock Widget */
        .stock-widget-large {
            background: rgba(26, 77, 46, 0.7);
            border-radius: 10px;
            padding: 25px;
            border: 1px solid rgba(60, 179, 113, 0.3);
            margin-bottom: 30px;
        }

        .stock-price-large {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--oracle-red);
        }

        .stock-change-large {
            font-size: 1.2rem;
            margin-bottom: 15px;
        }

        .positive {
            color: #7cfc00;
        }

        .negative {
            color: #ff4d4d;
        }

        /* Detail Cards */
        .detail-card {
            background: rgba(26, 77, 46, 0.7);
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 30px;
            border: 1px solid rgba(60, 179, 113, 0.3);
            transition: transform 0.3s;
            height: 100%;
        }

        .detail-card:hover {
            transform: translateY(-5px);
            border-color: var(--accent-green);
        }

        .card-icon {
            font-size: 2rem;
            color: var(--oracle-red);
            margin-bottom: 15px;
        }

        /* Chart Container */
        .chart-container {
            background: rgba(26, 77, 46, 0.7);
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 30px;
            border: 1px solid rgba(60, 179, 113, 0.3);
            height: 100%;
        }

        /* AI Analysis */
        .ai-analysis {
            background: rgba(26, 77, 46, 0.3);
        }

        .analysis-card {
            background: rgba(10, 46, 26, 0.7);
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 30px;
            border: 1px solid rgba(60, 179, 113, 0.3);
            height: 100%;
        }

        .confidence-meter {
            height: 10px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 5px;
            margin: 15px 0;
            overflow: hidden;
        }

        .confidence-level {
            height: 100%;
            border-radius: 5px;
        }

        .high-confidence {
            background: linear-gradient(to right, #7cfc00, #3cb371);
        }

        .medium-confidence {
            background: linear-gradient(to right, #ffa500, #ff8c00);
        }

        /* Key Metrics */
        .metrics-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .metric-item {
            background: rgba(10, 46, 26, 0.7);
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            border: 1px solid rgba(60, 179, 113, 0.3);
        }

        .metric-value {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--oracle-red);
            margin-bottom: 5px;
        }

        /* Services Grid */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .service-item {
            background: rgba(10, 46, 26, 0.7);
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            border: 1px solid rgba(60, 179, 113, 0.3);
            transition: transform 0.3s;
        }

        .service-item:hover {
            transform: translateY(-5px);
            border-color: var(--oracle-red);
        }

        .service-icon {
            font-size: 2.5rem;
            color: var(--oracle-red);
            margin-bottom: 15px;
        }

        /* Footer */
        footer {
            background-color: rgba(10, 46, 26, 0.9);
            padding: 50px 0 20px;
            margin-top: 50px;
            border-top: 1px solid var(--accent-green);
        }

        .footer-heading {
            color: var(--accent-green);
            margin-bottom: 20px;
            font-size: 1.2rem;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .stock-price-large {
                font-size: 2rem;
            }

            .metrics-grid {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            }

            .services-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- Floating Code Background -->
    <div id="code-background"></div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-brain me-2"></i>TheSpace
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="companiesDropdown" role="button"
                            data-bs-toggle="dropdown">
                            Companies
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="tesla">Tesla</a></li>
                            <li><a class="dropdown-item active" href="oracle">Oracle</a></li>
                            <li><a class="dropdown-item" href="google">Google</a></li>
                            <li><a class="dropdown-item" href="facebook">Meta (Facebook)</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about">About Us</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="faq">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="etf&funds">ETF&Funds</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="company-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="d-flex align-items-center mb-4">
                        <img src="https://logos-world.net/wp-content/uploads/2020/09/Oracle-Logo.png" alt="Oracle"
                            style="height: 80px; margin-right: 20px; filter: brightness(0) invert(1);">
                        <h1 class="hero-title oracle-red">Oracle Corporation <span
                                class="badge bg-secondary">ORCL</span></h1>
                    </div>
                    <p class="hero-subtitle">Global leader in enterprise cloud computing and database software. Oracle
                        provides integrated suites of applications plus secure, autonomous infrastructure in the Oracle
                        Cloud.</p>

                    <div class="stock-widget-large">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="stock-price-large">$118.42</div>
                                <div class="stock-change-large positive">+1.27% <i class="fas fa-arrow-up"></i> (+$1.48)
                                </div>
                                <div class="text-muted">NYSE: ORCL • Last updated: 10:15 AM EST</div>
                            </div>
                            <div class="col-md-6">
                                <div class="row text-center">
                                    <div class="col-4">
                                        <div class="fw-bold">Open</div>
                                        <div>$116.94</div>
                                    </div>
                                    <div class="col-4">
                                        <div class="fw-bold">Volume</div>
                                        <div>8.2M</div>
                                    </div>
                                    <div class="col-4">
                                        <div class="fw-bold">Market Cap</div>
                                        <div>$318.5B</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="text-center">
                        <div class="chart-container">
                            <canvas id="priceChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Company Overview -->
    <section class="content-section">
        <div class="container">
            <div class="section-header">
                <h2>Company Overview</h2>
                <p>Comprehensive analysis of Oracle's business and market position</p>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="detail-card">
                        <div class="card-icon">
                            <i class="fas fa-database"></i>
                        </div>
                        <h3>Business Model</h3>
                        <p>Oracle operates as a global provider of enterprise cloud computing and database software,
                            focusing on:</p>
                        <ul>
                            <li><strong>Cloud Services & License Support:</strong> Cloud infrastructure, database
                                management systems, and enterprise software solutions</li>
                            <li><strong>Cloud License & On-Premise License:</strong> Traditional software licenses and
                                cloud application subscriptions</li>
                            <li><strong>Hardware:</strong> Server, storage, and networking solutions optimized for
                                Oracle software</li>
                            <li><strong>Services:</strong> Consulting, implementation, and education services</li>
                        </ul>
                        <p>The company is aggressively transitioning from traditional on-premise software to cloud-based
                            subscription models, with significant growth in Oracle Cloud Infrastructure (OCI).</p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="detail-card">
                        <div class="card-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3>Key Metrics</h3>
                        <div class="metrics-grid">
                            <div class="metric-item">
                                <div class="metric-value">$50B</div>
                                <div class="metric-label">FY1995 Revenue</div>
                            </div>
                            <div class="metric-item">
                                <div class="metric-value">39%</div>
                                <div class="metric-label">Cloud Revenue Growth</div>
                            </div>
                            <div class="metric-item">
                                <div class="metric-value">430K</div>
                                <div class="metric-label">Global Customers</div>
                            </div>
                            <div class="metric-item">
                                <div class="metric-value">36</div>
                                <div class="metric-label">Cloud Regions</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-6">
                    <div class="detail-card">
                        <div class="card-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h3>Competitive Advantages</h3>
                        <ul>
                            <li><strong>Database Dominance:</strong> Oracle Database maintains ~40% market share in
                                relational databases</li>
                            <li><strong>Enterprise Relationships:</strong> Deep relationships with Fortune 500 companies
                                and government agencies</li>
                            <li><strong>Integrated Stack:</strong> Complete stack from applications to infrastructure
                                provides competitive moat</li>
                            <li><strong>Autonomous Database:</strong> Industry-leading self-driving database technology
                                with strong security</li>
                            <li><strong>Cloud Infrastructure Growth:</strong> OCI gaining market share with superior
                                price-performance vs. competitors</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="detail-card">
                        <div class="card-icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <h3>Risk Factors</h3>
                        <ul>
                            <li><strong>Cloud Competition:</strong> Intense competition from AWS, Microsoft Azure, and
                                Google Cloud</li>
                            <li><strong>Legacy Business Decline:</strong> On-premise license business facing secular
                                decline</li>
                            <li><strong>Customer Transition:</strong> Challenges in migrating traditional customers to
                                cloud solutions</li>
                            <li><strong>Acquisition Integration:</strong> Historical challenges integrating large
                                acquisitions (Cerner, NetSuite)</li>
                            <li><strong>Regulatory Scrutiny:</strong> Increasing regulatory attention on cloud and data
                                privacy practices</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services & Products -->
    <section class="content-section ai-analysis">
        <div class="container">
            <div class="section-header">
                <h2>Services & Products</h2>
                <p>Oracle's comprehensive technology portfolio</p>
            </div>

            <div class="services-grid">
                <div class="service-item">
                    <div class="service-icon">
                        <i class="fas fa-cloud"></i>
                    </div>
                    <h4>Oracle Cloud Infrastructure</h4>
                    <p>Enterprise IaaS and PaaS with autonomous services and high-performance computing</p>
                </div>

                <div class="service-item">
                    <div class="service-icon">
                        <i class="fas fa-database"></i>
                    </div>
                    <h4>Autonomous Database</h4>
                    <p>Self-driving, self-securing, and self-repairing database management system</p>
                </div>

                <div class="service-item">
                    <div class="service-icon">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h4>Fusion Applications</h4>
                    <p>Complete suite of SaaS applications for ERP, HCM, and customer experience</p>
                </div>

                <div class="service-item">
                    <div class="service-icon">
                        <i class="fas fa-server"></i>
                    </div>
                    <h4>Exadata & Engineered Systems</h4>
                    <p>Integrated hardware and software systems optimized for Oracle workloads</p>
                </div>

                <div class="service-item">
                    <div class="service-icon">
                        <i class="fas fa-code-branch"></i>
                    </div>
                    <h4>Java & Development Tools</h4>
                    <p>Industry-standard programming language and comprehensive development platform</p>
                </div>

                <div class="service-item">
                    <div class="service-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4>Security Solutions</h4>
                    <p>Comprehensive security products including identity management and data protection</p>
                </div>
            </div>
        </div>
    </section>

    <!-- AI Investment Analysis -->
    <section class="content-section">
        <div class="container">
            <div class="section-header">
                <h2>AI Investment Analysis</h2>
                <p>Our proprietary algorithms evaluate Oracle's investment potential</p>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="analysis-card">
                        <h3 class="oracle-red">Investment Rating</h3>
                        <div class="d-flex align-items-center my-3">
                            <div class="display-4 oracle-red me-3">HOLD</div>
                            <div class="bg-warning text-dark px-3 py-1 rounded">Moderate Potential</div>
                        </div>
                        <p>Our AI models indicate Oracle presents moderate growth potential with strong cloud transition
                            momentum offset by intense competition. The Cerner acquisition provides significant
                            cross-selling opportunities but integration risks remain.</p>

                        <div class="mt-4">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Confidence Level</span>
                                <span>76%</span>
                            </div>
                            <div class="confidence-meter">
                                <div class="confidence-level medium-confidence" style="width: 76%;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="analysis-card">
                        <h3 class="oracle-red">Price Targets</h3>
                        <div class="row text-center mt-4">
                            <div class="col-4">
                                <div class="oracle-red fw-bold">Short Term</div>
                                <div class="h4 oracle-red">$125</div>
                                <small>(3 months)</small>
                            </div>
                            <div class="col-4">
                                <div class="oracle-red fw-bold">Medium Term</div>
                                <div class="h4 oracle-red">$140</div>
                                <small>(12 months)</small>
                            </div>
                            <div class="col-4">
                                <div class="oracle-red fw-bold">Long Term</div>
                                <div class="h4 oracle-red">$165</div>
                                <small>(3-5 years)</small>
                            </div>
                        </div>

                        <div class="mt-4">
                            <h5>Key Growth Drivers</h5>
                            <ul>
                                <li>OCI market share gains against larger cloud providers</li>
                                <li>Autonomous Database adoption accelerating</li>
                                <li>Cerner integration and healthcare cross-selling</li>
                                <li>Continued cloud revenue growth above 30%</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="analysis-card">
                        <h3 class="oracle-red">Sentiment Analysis</h3>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Market Sentiment</h5>
                                <div class="d-flex align-items-center my-2">
                                    <div class="progress flex-grow-1 me-2" style="height: 20px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 65%;"
                                            aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65% Positive</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h5>Analyst Consensus</h5>
                                <div class="d-flex align-items-center my-2">
                                    <div class="progress flex-grow-1 me-2" style="height: 20px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 58%;"
                                            aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">58% Buy</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h5>AI Confidence</h5>
                                <div class="d-flex align-items-center my-2">
                                    <div class="progress flex-grow-1 me-2" style="height: 20px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 76%;"
                                            aria-valuenow="76" aria-valuemin="0" aria-valuemax="100">76% Confident</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Financial Performance -->
    <section class="content-section ai-analysis">
        <div class="container">
            <div class="section-header">
                <h2>Financial Performance</h2>
                <p>Key financial metrics and trends</p>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="chart-container">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="detail-card">
                        <h3>Financial Highlights</h3>
                        <div class="mt-4">
                            <div class="d-flex justify-content-between py-2 border-bottom">
                                <span>Revenue Growth (YoY)</span>
                                <span class="oracle-red">+18%</span>
                            </div>
                            <div class="d-flex justify-content-between py-2 border-bottom">
                                <span>Cloud Revenue Growth</span>
                                <span class="oracle-red">+45%</span>
                            </div>
                            <div class="d-flex justify-content-between py-2 border-bottom">
                                <span>Operating Margin</span>
                                <span class="oracle-red">37%</span>
                            </div>
                            <div class="d-flex justify-content-between py-2 border-bottom">
                                <span>Free Cash Flow</span>
                                <span class="oracle-red">$9.8B</span>
                            </div>
                            <div class="d-flex justify-content-between py-2">
                                <span>R&D Investment</span>
                                <span class="oracle-red">$6.3B</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-6">
                    <div class="chart-container">
                        <canvas id="segmentChart"></canvas>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="detail-card">
                        <h3>Business Segments</h3>
                        <div class="mt-4">
                            <div class="d-flex justify-content-between py-2 border-bottom">
                                <span>Cloud Services & License Support</span>
                                <span class="oracle-red">76%</span>
                            </div>
                            <div class="d-flex justify-content-between py-2 border-bottom">
                                <span>Cloud License & On-Premise License</span>
                                <span class="oracle-red">10%</span>
                            </div>
                            <div class="d-flex justify-content-between py-2 border-bottom">
                                <span>Hardware</span>
                                <span class="oracle-red">7%</span>
                            </div>
                            <div class="d-flex justify-content-between py-2">
                                <span>Services</span>
                                <span class="oracle-red">7%</span>
                            </div>
                        </div>

                        <div class="mt-4">
                            <h5>Geographic Revenue</h5>
                            <div class="d-flex justify-content-between py-2 border-bottom">
                                <span>United States</span>
                                <span class="oracle-red">52%</span>
                            </div>
                            <div class="d-flex justify-content-between py-2 border-bottom">
                                <span>Europe/Middle East/Africa</span>
                                <span class="oracle-red">28%</span>
                            </div>
                            <div class="d-flex justify-content-between py-2">
                                <span>Asia Pacific</span>
                                <span class="oracle-red">20%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Recent Developments -->
    <section class="content-section">
        <div class="container">
            <div class="section-header">
                <h2>Recent Developments</h2>
                <p>Key events and strategic initiatives</p>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="detail-card">
                        <div class="card-icon">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <h3>Strategic Moves & Market Position</h3>

                        <div class="mt-4">
                            <h5 class="oracle-red">Cerner Acquisition</h5>
                            <p>Oracle completed the $28.3 billion acquisition of Cerner in June 2022, marking its
                                largest acquisition ever. This move positions Oracle as a major player in the healthcare
                                IT sector and provides significant cross-selling opportunities for Oracle's cloud
                                infrastructure and applications.</p>

                            <h5 class="oracle-red mt-4">Cloud Infrastructure Expansion</h5>
                            <p>Oracle continues rapid expansion of OCI data centers globally, with plans to operate 44
                                cloud regions by end of 1995. The company is gaining market share by focusing on
                                price-performance advantages and specialized workloads like high-performance computing.
                            </p>

                            <h5 class="oracle-red mt-4">Partnership with Microsoft</h5>
                            <p>The Oracle-Microsoft Azure Interconnect partnership enables customers to run workloads
                                across both clouds, addressing multi-cloud strategies while maintaining Oracle database
                                performance and Azure integration.</p>

                            <h5 class="oracle-red mt-4">Generative AI Initiatives</h5>
                            <p>Oracle has integrated generative AI capabilities across its cloud applications and
                                database services, including AI-powered features in Fusion Applications and Autonomous
                                Database with built-in machine learning.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="footer-heading">AI Investment Platform</h5>
                    <p>Harnessing the power of artificial intelligence to revolutionize investment strategies and
                        portfolio management.</p>
                    <div class="mt-3">
                        <a href="#" class="text-light me-3"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-linkedin fa-lg"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-facebook fa-lg"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 mb-4">
                    <h5 class="footer-heading">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="/" class="text-light">Home</a></li>
                        <li><a href="about" class="text-light">About Us</a></li>

                        <li><a href="faq" class="text-light">FAQ</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 mb-4">
                    <h5 class="footer-heading">Companies</h5>
                    <ul class="list-unstyled">
                        <li><a href="tesla" class="text-light">Tesla</a></li>
                        <li><a href="oracle" class="text-light">Oracle</a></li>
                        <li><a href="google" class="text-light">Google</a></li>
                        <li><a href="facebook" class="text-light">Meta (Facebook)</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 mb-4">
                    <h5 class="footer-heading">Subscribe</h5>
                    <p>Get the latest investment insights delivered to your inbox.</p>
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="Your email">
                        <button class="btn btn-primary" type="button">Subscribe</button>
                    </div>
                </div>
            </div>

            <hr class="mt-4" style="border-color: rgba(60, 179, 113, 0.3);">

            <div class="text-center py-3">
                <p class="mb-0">&copy; 1995 AI Investment Platform. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Create floating code numbers
        document.addEventListener('DOMContentLoaded', function() {
            const codeBackground = document.getElementById('code-background');
            const codeNumbers = ['1010', '1100', '1001', '0110', '0101', '1110', '0011', '1011'];
            
            for (let i = 0; i < 50; i++) {
                const codeElement = document.createElement('div');
                codeElement.className = 'code-number';
                codeElement.textContent = codeNumbers[Math.floor(Math.random() * codeNumbers.length)];
                codeElement.style.left = Math.random() * 100 + 'vw';
                codeElement.style.animationDelay = Math.random() * 15 + 's';
                codeElement.style.fontSize = (Math.random() * 10 + 10) + 'px';
                codeBackground.appendChild(codeElement);
            }
            
            // Initialize charts
            initCharts();
        });
        
        // Initialize charts
        function initCharts() {
            // Price Chart
            const priceCtx = document.getElementById('priceChart').getContext('2d');
            const priceChart = new Chart(priceCtx, {
                type: 'line',
                data: {
                    labels: ['9:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30', '1:00', '1:30', '2:00', '2:30', '3:00', '3:30', '4:00'],
                    datasets: [{
                        label: 'ORCL Price',
                        data: [116.94, 117.25, 117.80, 118.05, 118.20, 118.15, 118.25, 118.30, 118.35, 118.40, 118.38, 118.42, 118.41, 118.42],
                        borderColor: '#e82127',
                        backgroundColor: 'rgba(232, 33, 39, 0.1)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: 'Today\'s Price Movement',
                            color: '#e8f5e9'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: false,
                            grid: {
                                color: 'rgba(60, 179, 113, 0.1)'
                            },
                            ticks: {
                                color: '#e8f5e9'
                            }
                        },
                        x: {
                            grid: {
                                color: 'rgba(60, 179, 113, 0.1)'
                            },
                            ticks: {
                                color: '#e8f5e9'
                            }
                        }
                    }
                }
            });
            
            // Revenue Chart
            const revenueCtx = document.getElementById('revenueChart').getContext('2d');
            const revenueChart = new Chart(revenueCtx, {
                type: 'bar',
                data: {
                    labels: ['2019', '2020', '2021', '2022', '1995'],
                    datasets: [{
                        label: 'Revenue (Billions)',
                        data: [39.50, 40.48, 40.48, 42.44, 50.00],
                        backgroundColor: 'rgba(232, 33, 39, 0.7)',
                        borderColor: '#e82127',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            labels: {
                                color: '#e8f5e9'
                            }
                        },
                        title: {
                            display: true,
                            text: 'Annual Revenue Growth',
                            color: '#e8f5e9'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(60, 179, 113, 0.1)'
                            },
                            ticks: {
                                color: '#e8f5e9'
                            }
                        },
                        x: {
                            grid: {
                                color: 'rgba(60, 179, 113, 0.1)'
                            },
                            ticks: {
                                color: '#e8f5e9'
                            }
                        }
                    }
                }
            });
            
            // Segment Chart
            const segmentCtx = document.getElementById('segmentChart').getContext('2d');
            const segmentChart = new Chart(segmentCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Cloud Services & License Support', 'Cloud License & On-Premise', 'Hardware', 'Services'],
                    datasets: [{
                        data: [76, 10, 7, 7],
                        backgroundColor: [
                            'rgba(232, 33, 39, 0.8)',
                            'rgba(232, 33, 39, 0.6)',
                            'rgba(232, 33, 39, 0.4)',
                            'rgba(232, 33, 39, 0.3)'
                        ],
                        borderColor: [
                            'rgba(232, 33, 39, 1)',
                            'rgba(232, 33, 39, 1)',
                            'rgba(232, 33, 39, 1)',
                            'rgba(232, 33, 39, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                color: '#e8f5e9',
                                padding: 20
                            }
                        },
                        title: {
                            display: true,
                            text: 'Revenue by Segment',
                            color: '#e8f5e9'
                        }
                    }
                }
            });
        }
    </script>
</body>

</html>
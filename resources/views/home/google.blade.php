<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Investment Analysis - AI Investment Platform</title>
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
            --google-blue: #4285f4;
            --google-red: #ea4335;
            --google-yellow: #fbbc05;
            --google-green: #34a853;
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
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .google-blue {
            color: var(--google-blue);
        }

        .google-red {
            color: var(--google-red);
        }

        .google-yellow {
            color: var(--google-yellow);
        }

        .google-green {
            color: var(--google-green);
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
            color: var(--google-blue);
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
            color: var(--google-blue);
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
            color: var(--google-blue);
            margin-bottom: 5px;
        }

        /* Business Segments */
        .segments-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .segment-item {
            background: rgba(10, 46, 26, 0.7);
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            border: 1px solid rgba(60, 179, 113, 0.3);
            transition: transform 0.3s;
        }

        .segment-item:hover {
            transform: translateY(-5px);
        }

        .segment-google-services {
            border-color: var(--google-blue);
        }

        .segment-google-cloud {
            border-color: var(--google-green);
        }

        .segment-other-bets {
            border-color: var(--google-yellow);
        }

        .segment-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        /* Product Grid */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }

        .product-item {
            background: rgba(10, 46, 26, 0.7);
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            border: 1px solid rgba(60, 179, 113, 0.3);
            transition: transform 0.3s;
        }

        .product-item:hover {
            transform: translateY(-3px);
            border-color: var(--google-blue);
        }

        .product-icon {
            font-size: 1.8rem;
            margin-bottom: 10px;
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

            .segments-grid {
                grid-template-columns: 1fr;
            }

            .products-grid {
                grid-template-columns: repeat(3, 1fr);
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
            <a class="navbar-brand" href="index.html">
                <i class="fas fa-brain me-2"></i>THE-SPACE
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="companiesDropdown" role="button"
                            data-bs-toggle="dropdown">
                            Companies
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="tesla">Tesla</a></li>
                            <li><a class="dropdown-item" href="oracle">Oracle</a></li>
                            <li><a class="dropdown-item active" href="google">Google</a></li>
                            <li><a class="dropdown-item" href="facebook">Meta (Facebook)</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact">Contact</a>
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
                        <div class="google-colors me-3">
                            <span class="google-blue">G</span>
                            <span class="google-red">o</span>
                            <span class="google-yellow">o</span>
                            <span class="google-blue">g</span>
                            <span class="google-green">l</span>
                            <span class="google-red">e</span>
                        </div>
                        <h1 class="hero-title">Alphabet Inc. <span class="badge bg-secondary">GOOGL</span></h1>
                    </div>
                    <p class="hero-subtitle">A global technology leader focused on organizing the world's information
                        and making it universally accessible and useful. Alphabet's main business is Google, along with
                        growing businesses in cloud computing, hardware, and other bets.</p>

                    <div class="stock-widget-large">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="stock-price-large">$142.65</div>
                                <div class="stock-change-large negative">-0.85% <i class="fas fa-arrow-down"></i>
                                    (-$1.22)</div>
                                <div class="text-muted">NASDAQ: GOOGL • Last updated: 10:15 AM EST</div>
                            </div>
                            <div class="col-md-6">
                                <div class="row text-center">
                                    <div class="col-4">
                                        <div class="fw-bold">Open</div>
                                        <div>$143.87</div>
                                    </div>
                                    <div class="col-4">
                                        <div class="fw-bold">Volume</div>
                                        <div>24.3M</div>
                                    </div>
                                    <div class="col-4">
                                        <div class="fw-bold">Market Cap</div>
                                        <div>$1.78T</div>
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
                <p>Comprehensive analysis of Alphabet's business and market position</p>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="detail-card">
                        <div class="card-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h3>Business Model</h3>
                        <p>Alphabet operates through three main segments with diverse revenue streams:</p>
                        <ul>
                            <li><strong>Google Services:</strong> Search, advertising, Android, Chrome, Google Maps,
                                Google Play, YouTube, and hardware products</li>
                            <li><strong>Google Cloud:</strong> Infrastructure and data analytics platforms,
                                collaboration tools, and other enterprise services</li>
                            <li><strong>Other Bets:</strong> Early-stage businesses including Waymo (autonomous
                                vehicles), Verily (life sciences), and more</li>
                        </ul>
                        <p>The company generates the majority of its revenue from advertising across its platforms,
                            while strategically investing in cloud computing and moonshot projects for long-term growth.
                        </p>
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
                                <div class="metric-value">$283B</div>
                                <div class="metric-label">2022 Revenue</div>
                            </div>
                            <div class="metric-item">
                                <div class="metric-value">91%</div>
                                <div class="metric-label">Advertising Revenue</div>
                            </div>
                            <div class="metric-item">
                                <div class="metric-value">4.3B+</div>
                                <div class="metric-label">Android Users</div>
                            </div>
                            <div class="metric-item">
                                <div class="metric-value">37%</div>
                                <div class="metric-label">Cloud Growth Rate</div>
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
                            <li><strong>Search Dominance:</strong> ~92% global search engine market share</li>
                            <li><strong>Data Network Effects:</strong> Vast user data improves AI and targeting
                                capabilities</li>
                            <li><strong>Ecosystem Lock-in:</strong> Android, Chrome, Gmail, and YouTube create powerful
                                ecosystem</li>
                            <li><strong>AI Leadership:</strong> Industry-leading AI research and implementation across
                                products</li>
                            <li><strong>Scale & Infrastructure:</strong> Global data center network and technical
                                infrastructure</li>
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
                            <li><strong>Regulatory Pressure:</strong> Multiple antitrust investigations globally</li>
                            <li><strong>Advertising Concentration:</strong> Heavy reliance on advertising revenue</li>
                            <li><strong>AI Competition:</strong> Increasing competition from Microsoft/OpenAI and others
                            </li>
                            <li><strong>Privacy Changes:</strong> Browser and mobile OS privacy features impact ad
                                targeting</li>
                            <li><strong>Cloud Competition:</strong> Trailing AWS and Azure in cloud market share</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Business Segments -->
    <section class="content-section ai-analysis">
        <div class="container">
            <div class="section-header">
                <h2>Business Segments</h2>
                <p>Alphabet's diversified business portfolio</p>
            </div>

            <div class="segments-grid">
                <div class="segment-item segment-google-services">
                    <div class="segment-icon google-blue">
                        <i class="fab fa-google"></i>
                    </div>
                    <h4>Google Services</h4>
                    <p class="mb-3">Core advertising and consumer products generating majority of revenue</p>
                    <div class="metric-value google-blue">$259B</div>
                    <div class="text-muted">2022 Revenue</div>
                    <div class="mt-2">91.5% of Total Revenue</div>
                </div>

                <div class="segment-item segment-google-cloud">
                    <div class="segment-icon google-green">
                        <i class="fas fa-cloud"></i>
                    </div>
                    <h4>Google Cloud</h4>
                    <p class="mb-3">Enterprise cloud infrastructure and productivity tools</p>
                    <div class="metric-value google-green">$26B</div>
                    <div class="text-muted">2022 Revenue</div>
                    <div class="mt-2">37% YoY Growth</div>
                </div>

                <div class="segment-item segment-other-bets">
                    <div class="segment-icon google-yellow">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h4>Other Bets</h4>
                    <p class="mb-3">Early-stage businesses and moonshot projects</p>
                    <div class="metric-value google-yellow">$1.1B</div>
                    <div class="text-muted">2022 Revenue</div>
                    <div class="mt-2">-$6.2B Operating Loss</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Ecosystem -->
    <section class="content-section">
        <div class="container">
            <div class="section-header">
                <h2>Product Ecosystem</h2>
                <p>Google's extensive portfolio of products and services</p>
            </div>

            <div class="detail-card">
                <div class="card-icon">
                    <i class="fas fa-boxes"></i>
                </div>
                <h3>Major Products & Services</h3>

                <div class="products-grid">
                    <div class="product-item">
                        <div class="product-icon google-blue">
                            <i class="fas fa-search"></i>
                        </div>
                        <div>Google Search</div>
                    </div>

                    <div class="product-item">
                        <div class="product-icon google-red">
                            <i class="fab fa-youtube"></i>
                        </div>
                        <div>YouTube</div>
                    </div>

                    <div class="product-item">
                        <div class="product-icon google-green">
                            <i class="fab fa-android"></i>
                        </div>
                        <div>Android</div>
                    </div>

                    <div class="product-item">
                        <div class="product-icon google-blue">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>Google Maps</div>
                    </div>

                    <div class="product-item">
                        <div class="product-icon google-yellow">
                            <i class="fas fa-chrome"></i>
                        </div>
                        <div>Chrome</div>
                    </div>

                    <div class="product-item">
                        <div class="product-icon google-blue">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>Gmail</div>
                    </div>

                    <div class="product-item">
                        <div class="product-icon google-green">
                            <i class="fas fa-photo-video"></i>
                        </div>
                        <div>Google Photos</div>
                    </div>

                    <div class="product-item">
                        <div class="product-icon google-blue">
                            <i class="fas fa-play"></i>
                        </div>
                        <div>Google Play</div>
                    </div>

                    <div class="product-item">
                        <div class="product-icon google-red">
                            <i class="fas fa-drive"></i>
                        </div>
                        <div>Google Drive</div>
                    </div>

                    <div class="product-item">
                        <div class="product-icon google-yellow">
                            <i class="fas fa-assistive-listening-systems"></i>
                        </div>
                        <div>Google Assistant</div>
                    </div>

                    <div class="product-item">
                        <div class="product-icon google-blue">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div>Google Calendar</div>
                    </div>

                    <div class="product-item">
                        <div class="product-icon google-green">
                            <i class="fas fa-meetup"></i>
                        </div>
                        <div>Google Meet</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- AI Investment Analysis -->
    <section class="content-section ai-analysis">
        <div class="container">
            <div class="section-header">
                <h2>AI Investment Analysis</h2>
                <p>Our proprietary algorithms evaluate Alphabet's investment potential</p>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="analysis-card">
                        <h3 class="google-blue">Investment Rating</h3>
                        <div class="d-flex align-items-center my-3">
                            <div class="display-4 google-blue me-3">BUY</div>
                            <div class="bg-success text-white px-3 py-1 rounded">Strong Positive</div>
                        </div>
                        <p>Our AI models indicate Alphabet presents strong long-term growth potential despite near-term
                            headwinds. The company's AI leadership, diversified revenue streams, and massive cash flow
                            generation support a BUY recommendation.</p>

                        <div class="mt-4">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Confidence Level</span>
                                <span>89%</span>
                            </div>
                            <div class="confidence-meter">
                                <div class="confidence-level high-confidence" style="width: 89%;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="analysis-card">
                        <h3 class="google-blue">Price Targets</h3>
                        <div class="row text-center mt-4">
                            <div class="col-4">
                                <div class="google-blue fw-bold">Short Term</div>
                                <div class="h4 google-blue">$155</div>
                                <small>(3 months)</small>
                            </div>
                            <div class="col-4">
                                <div class="google-blue fw-bold">Medium Term</div>
                                <div class="h4 google-blue">$175</div>
                                <small>(12 months)</small>
                            </div>
                            <div class="col-4">
                                <div class="google-blue fw-bold">Long Term</div>
                                <div class="h4 google-blue">$220</div>
                                <small>(3-5 years)</small>
                            </div>
                        </div>

                        <div class="mt-4">
                            <h5>Key Growth Drivers</h5>
                            <ul>
                                <li>YouTube and Cloud continuing strong growth trajectories</li>
                                <li>AI integration across all products enhancing user experience</li>
                                <li>Monetization improvements in Search and advertising</li>
                                <li>Other Bets potentially reaching commercialization</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="analysis-card">
                        <h3 class="google-blue">Sentiment Analysis</h3>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Market Sentiment</h5>
                                <div class="d-flex align-items-center my-2">
                                    <div class="progress flex-grow-1 me-2" style="height: 20px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 82%;"
                                            aria-valuenow="82" aria-valuemin="0" aria-valuemax="100">82% Positive</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h5>Analyst Consensus</h5>
                                <div class="d-flex align-items-center my-2">
                                    <div class="progress flex-grow-1 me-2" style="height: 20px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 85%;"
                                            aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85% Buy</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h5>AI Confidence</h5>
                                <div class="d-flex align-items-center my-2">
                                    <div class="progress flex-grow-1 me-2" style="height: 20px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 89%;"
                                            aria-valuenow="89" aria-valuemin="0" aria-valuemax="100">89% Confident</div>
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
    <section class="content-section">
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
                                <span class="google-blue">+10%</span>
                            </div>
                            <div class="d-flex justify-content-between py-2 border-bottom">
                                <span>Operating Margin</span>
                                <span class="google-blue">24%</span>
                            </div>
                            <div class="d-flex justify-content-between py-2 border-bottom">
                                <span>Free Cash Flow</span>
                                <span class="google-blue">$60.0B</span>
                            </div>
                            <div class="d-flex justify-content-between py-2 border-bottom">
                                <span>R&D Investment</span>
                                <span class="google-blue">$39.5B</span>
                            </div>
                            <div class="d-flex justify-content-between py-2">
                                <span>Cash & Equivalents</span>
                                <span class="google-blue">$113.8B</span>
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
                        <h3>Revenue Breakdown</h3>
                        <div class="mt-4">
                            <div class="d-flex justify-content-between py-2 border-bottom">
                                <span>Google Search & other</span>
                                <span class="google-blue">57%</span>
                            </div>
                            <div class="d-flex justify-content-between py-2 border-bottom">
                                <span>YouTube ads</span>
                                <span class="google-red">10%</span>
                            </div>
                            <div class="d-flex justify-content-between py-2 border-bottom">
                                <span>Google Network</span>
                                <span class="google-yellow">11%</span>
                            </div>
                            <div class="d-flex justify-content-between py-2 border-bottom">
                                <span>Google Cloud</span>
                                <span class="google-green">9%</span>
                            </div>
                            <div class="d-flex justify-content-between py-2">
                                <span>Other Google services</span>
                                <span class="google-blue">13%</span>
                            </div>
                        </div>

                        <div class="mt-4">
                            <h5>Geographic Revenue</h5>
                            <div class="d-flex justify-content-between py-2 border-bottom">
                                <span>United States</span>
                                <span class="google-blue">46%</span>
                            </div>
                            <div class="d-flex justify-content-between py-2 border-bottom">
                                <span>Europe/Middle East/Africa</span>
                                <span class="google-blue">30%</span>
                            </div>
                            <div class="d-flex justify-content-between py-2">
                                <span>Asia Pacific & Other</span>
                                <span class="google-blue">24%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Recent Developments -->
    <section class="content-section ai-analysis">
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
                            <h5 class="google-blue">AI Integration & Bard Launch</h5>
                            <p>Google has aggressively integrated AI across its product portfolio and launched Bard, its
                                conversational AI service, to compete with ChatGPT. The company is leveraging its vast
                                data and AI research capabilities to maintain leadership in generative AI.</p>

                            <h5 class="google-blue mt-4">Antitrust Litigation</h5>
                            <p>Google faces multiple antitrust lawsuits globally, including the U.S. Department of
                                Justice case focusing on search dominance and advertising practices. Outcomes could
                                significantly impact business practices and market position.</p>

                            <h5 class="google-blue mt-4">Cloud Growth Acceleration</h5>
                            <p>Google Cloud continues to gain market share, reporting 37% year-over-year growth. The
                                division is focusing on AI-powered solutions and industry-specific offerings to
                                differentiate from AWS and Azure.</p>

                            <h5 class="google-blue mt-4">Cost Optimization Initiatives</h5>
                            <p>Alphabet announced workforce reductions and cost optimization measures in 2023,
                                reflecting a shift toward greater efficiency while maintaining strategic investments in
                                AI and cloud computing.</p>
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
                        <li><a href="index.html" class="text-light">Home</a></li>
                        <li><a href="about" class="text-light">About Us</a></li>
                        <li><a href="contact" class="text-light">Contact</a></li>
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
                <p class="mb-0">&copy; 2023 AI Investment Platform. All rights reserved.</p>
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
                        label: 'GOOGL Price',
                        data: [143.87, 143.25, 142.80, 142.65, 142.70, 142.55, 142.60, 142.65, 142.60, 142.55, 142.60, 142.63, 142.64, 142.65],
                        borderColor: '#4285f4',
                        backgroundColor: 'rgba(66, 133, 244, 0.1)',
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
                    labels: ['2018', '2019', '2020', '2021', '2022'],
                    datasets: [{
                        label: 'Revenue (Billions)',
                        data: [136.82, 161.86, 182.53, 257.64, 282.83],
                        backgroundColor: 'rgba(66, 133, 244, 0.7)',
                        borderColor: '#4285f4',
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
                    labels: ['Google Services', 'Google Cloud', 'Other Bets'],
                    datasets: [{
                        data: [91.5, 9.2, 0.3],
                        backgroundColor: [
                            'rgba(66, 133, 244, 0.8)',
                            'rgba(52, 168, 83, 0.8)',
                            'rgba(251, 188, 5, 0.8)'
                        ],
                        borderColor: [
                            'rgba(66, 133, 244, 1)',
                            'rgba(52, 168, 83, 1)',
                            'rgba(251, 188, 5, 1)'
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
                            text: 'Revenue by Segment (%)',
                            color: '#e8f5e9'
                        }
                    }
                }
            });
        }
    </script>
</body>

</html>
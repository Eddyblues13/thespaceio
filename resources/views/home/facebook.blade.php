<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meta Investment Analysis - AI Investment Platform</title>
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
            --meta-blue: #1877f2;
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

        .meta-blue {
            color: var(--meta-blue);
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
            color: var(--meta-blue);
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
            color: var(--meta-blue);
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
            color: var(--meta-blue);
            margin-bottom: 5px;
        }

        /* Platform Grid */
        .platforms-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .platform-item {
            background: rgba(10, 46, 26, 0.7);
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            border: 1px solid rgba(60, 179, 113, 0.3);
            transition: transform 0.3s;
        }

        .platform-item:hover {
            transform: translateY(-5px);
            border-color: var(--meta-blue);
        }

        .platform-icon {
            font-size: 2.5rem;
            color: var(--meta-blue);
            margin-bottom: 15px;
        }

        /* User Metrics */
        .user-metrics {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }

        .user-metric {
            background: rgba(10, 46, 26, 0.9);
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            border: 1px solid rgba(60, 179, 113, 0.3);
        }

        .user-metric-value {
            font-size: 1.3rem;
            font-weight: bold;
            color: var(--meta-blue);
            margin-bottom: 5px;
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

            .platforms-grid {
                grid-template-columns: 1fr;
            }

            .user-metrics {
                grid-template-columns: repeat(2, 1fr);
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
                            <li><a class="dropdown-item" href="oracle">Oracle</a></li>
                            <li><a class="dropdown-item" href="google">Google</a></li>
                            <li><a class="dropdown-item active" href="facebook">Meta (Facebook)</a></li>
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
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7b/Meta_Platforms_Inc._logo.svg/1200px-Meta_Platforms_Inc._logo.svg.png"
                            alt="Meta" style="height: 80px; margin-right: 20px;">
                        <h1 class="hero-title meta-blue">Meta Platforms, Inc. <span
                                class="badge bg-secondary">META</span></h1>
                    </div>
                    <p class="hero-subtitle">Building technologies that help people connect, find communities, and grow
                        businesses. Meta's family of apps includes Facebook, Instagram, WhatsApp, Messenger, and the
                        metaverse vision through Reality Labs.</p>

                    <div class="stock-widget-large">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="stock-price-large">$318.25</div>
                                <div class="stock-change-large positive">+3.12% <i class="fas fa-arrow-up"></i> (+$9.62)
                                </div>
                                <div class="text-muted">NASDAQ: META • Last updated: 10:15 AM EST</div>
                            </div>
                            <div class="col-md-6">
                                <div class="row text-center">
                                    <div class="col-4">
                                        <div class="fw-bold">Open</div>
                                        <div>$308.63</div>
                                    </div>
                                    <div class="col-4">
                                        <div class="fw-bold">Volume</div>
                                        <div>18.7M</div>
                                    </div>
                                    <div class="col-4">
                                        <div class="fw-bold">Market Cap</div>
                                        <div>$815.3B</div>
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
                <p>Comprehensive analysis of Meta's business and market position</p>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="detail-card">
                        <div class="card-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>Business Model</h3>
                        <p>Meta operates as a social technology company with two main segments:</p>
                        <ul>
                            <li><strong>Family of Apps:</strong> Facebook, Instagram, WhatsApp, and Messenger generating
                                revenue primarily through advertising</li>
                            <li><strong>Reality Labs:</strong> Augmented and virtual reality products, consumer
                                hardware, and software for the metaverse vision</li>
                        </ul>
                        <p>The company's core advertising business leverages its massive user base and sophisticated
                            targeting capabilities, while Reality Labs represents the long-term bet on the next
                            computing platform.</p>
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
                                <div class="metric-value">3.96B</div>
                                <div class="metric-label">Monthly Users</div>
                            </div>
                            <div class="metric-item">
                                <div class="metric-value">$116.6B</div>
                                <div class="metric-label">2022 Revenue</div>
                            </div>
                            <div class="metric-item">
                                <div class="metric-value">$23.2B</div>
                                <div class="metric-label">Reality Labs Investment</div>
                            </div>
                            <div class="metric-item">
                                <div class="metric-value">98%</div>
                                <div class="metric-label">Ad Revenue Share</div>
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
                            <li><strong>Network Effects:</strong> Unprecedented global user base creates powerful moat
                            </li>
                            <li><strong>Data Advantage:</strong> Vast amounts of user data enable superior ad targeting
                            </li>
                            <li><strong>Platform Ecosystem:</strong> Interconnected apps create stickiness and
                                cross-platform engagement</li>
                            <li><strong>AI & Machine Learning:</strong> Industry-leading algorithms for content delivery
                                and ad optimization</li>
                            <li><strong>Strategic Acquisitions:</strong> Successful integration of Instagram and
                                WhatsApp</li>
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
                            <li><strong>Regulatory Pressure:</strong> Increasing global scrutiny on privacy, antitrust,
                                and content moderation</li>
                            <li><strong>Apple iOS Changes:</strong> App Tracking Transparency significantly impacted ad
                                targeting capabilities</li>
                            <li><strong>TikTok Competition:</strong> Rising competition for user attention, especially
                                among younger demographics</li>
                            <li><strong>Reality Labs Losses:</strong> Significant ongoing investments in metaverse with
                                uncertain ROI timeline</li>
                            <li><strong>Economic Sensitivity:</strong> Advertising revenue vulnerable to economic
                                downturns</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Platform Ecosystem -->
    <section class="content-section ai-analysis">
        <div class="container">
            <div class="section-header">
                <h2>Platform Ecosystem</h2>
                <p>Meta's family of apps and services</p>
            </div>

            <div class="platforms-grid">
                <div class="platform-item">
                    <div class="platform-icon">
                        <i class="fab fa-facebook"></i>
                    </div>
                    <h4>Facebook</h4>
                    <p>World's largest social network with 2.9+ billion monthly active users</p>
                    <div class="user-metrics">
                        <div class="user-metric">
                            <div class="user-metric-value">2.96B</div>
                            <small>Monthly Users</small>
                        </div>
                        <div class="user-metric">
                            <div class="user-metric-value">2.0B</div>
                            <small>Daily Users</small>
                        </div>
                    </div>
                </div>

                <div class="platform-item">
                    <div class="platform-icon">
                        <i class="fab fa-instagram"></i>
                    </div>
                    <h4>Instagram</h4>
                    <p>Photo and video sharing platform with strong influencer marketing ecosystem</p>
                    <div class="user-metrics">
                        <div class="user-metric">
                            <div class="user-metric-value">2.0B</div>
                            <small>Monthly Users</small>
                        </div>
                        <div class="user-metric">
                            <div class="user-metric-value">500M</div>
                            <small>Daily Stories</small>
                        </div>
                    </div>
                </div>

                <div class="platform-item">
                    <div class="platform-icon">
                        <i class="fab fa-whatsapp"></i>
                    </div>
                    <h4>WhatsApp</h4>
                    <p>Leading global messaging platform with end-to-end encryption</p>
                    <div class="user-metrics">
                        <div class="user-metric">
                            <div class="user-metric-value">2.0B</div>
                            <small>Monthly Users</small>
                        </div>
                        <div class="user-metric">
                            <div class="user-metric-value">100B</div>
                            <small>Daily Messages</small>
                        </div>
                    </div>
                </div>

                <div class="platform-item">
                    <div class="platform-icon">
                        <i class="fas fa-vr-cardboard"></i>
                    </div>
                    <h4>Reality Labs</h4>
                    <p>Metaverse division developing VR/AR hardware and software platforms</p>
                    <div class="user-metrics">
                        <div class="user-metric">
                            <div class="user-metric-value">$13.7B</div>
                            <small>2022 Revenue</small>
                        </div>
                        <div class="user-metric">
                            <div class="user-metric-value">-$13.7B</div>
                            <small>2022 Operating Loss</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- AI Investment Analysis -->
    <section class="content-section">
        <div class="container">
            <div class="section-header">
                <h2>AI Investment Analysis</h2>
                <p>Our proprietary algorithms evaluate Meta's investment potential</p>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="analysis-card">
                        <h3 class="meta-blue">Investment Rating</h3>
                        <div class="d-flex align-items-center my-3">
                            <div class="display-4 meta-blue me-3">BUY</div>
                            <div class="bg-success text-white px-3 py-1 rounded">Strong Positive</div>
                        </div>
                        <p>Our AI models indicate Meta presents strong recovery potential following 2022 challenges.
                            Cost discipline initiatives and AI-driven efficiency improvements position the company for
                            renewed growth despite Reality Labs losses.</p>

                        <div class="mt-4">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Confidence Level</span>
                                <span>84%</span>
                            </div>
                            <div class="confidence-meter">
                                <div class="confidence-level high-confidence" style="width: 84%;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="analysis-card">
                        <h3 class="meta-blue">Price Targets</h3>
                        <div class="row text-center mt-4">
                            <div class="col-4">
                                <div class="meta-blue fw-bold">Short Term</div>
                                <div class="h4 meta-blue">$340</div>
                                <small>(3 months)</small>
                            </div>
                            <div class="col-4">
                                <div class="meta-blue fw-bold">Medium Term</div>
                                <div class="h4 meta-blue">$380</div>
                                <small>(12 months)</small>
                            </div>
                            <div class="col-4">
                                <div class="meta-blue fw-bold">Long Term</div>
                                <div class="h4 meta-blue">$450</div>
                                <small>(3-5 years)</small>
                            </div>
                        </div>

                        <div class="mt-4">
                            <h5>Key Growth Drivers</h5>
                            <ul>
                                <li>Reels monetization catching up to TikTok</li>
                                <li>AI-powered ad targeting improvements</li>
                                <li>WhatsApp Business monetization</li>
                                <li>Cost efficiency initiatives ("Year of Efficiency")</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="analysis-card">
                        <h3 class="meta-blue">Sentiment Analysis</h3>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Market Sentiment</h5>
                                <div class="d-flex align-items-center my-2">
                                    <div class="progress flex-grow-1 me-2" style="height: 20px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 78%;"
                                            aria-valuenow="78" aria-valuemin="0" aria-valuemax="100">78% Positive</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h5>Analyst Consensus</h5>
                                <div class="d-flex align-items-center my-2">
                                    <div class="progress flex-grow-1 me-2" style="height: 20px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 72%;"
                                            aria-valuenow="72" aria-valuemin="0" aria-valuemax="100">72% Buy</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h5>AI Confidence</h5>
                                <div class="d-flex align-items-center my-2">
                                    <div class="progress flex-grow-1 me-2" style="height: 20px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 84%;"
                                            aria-valuenow="84" aria-valuemin="0" aria-valuemax="100">84% Confident</div>
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
                                <span class="meta-blue">-1%</span>
                            </div>
                            <div class="d-flex justify-content-between py-2 border-bottom">
                                <span>Operating Margin</span>
                                <span class="meta-blue">25%</span>
                            </div>
                            <div class="d-flex justify-content-between py-2 border-bottom">
                                <span>Free Cash Flow</span>
                                <span class="meta-blue">$18.4B</span>
                            </div>
                            <div class="d-flex justify-content-between py-2 border-bottom">
                                <span>R&D Investment</span>
                                <span class="meta-blue">$35.3B</span>
                            </div>
                            <div class="d-flex justify-content-between py-2">
                                <span>Share Buybacks</span>
                                <span class="meta-blue">$10.9B</span>
                            </div>
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
                        label: 'META Price',
                        data: [308.63, 310.25, 312.80, 314.25, 315.10, 316.75, 317.50, 317.20, 317.60, 317.90, 318.10, 318.15, 318.20, 318.25],
                        borderColor: '#1877f2',
                        backgroundColor: 'rgba(24, 119, 242, 0.1)',
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
                        data: [55.84, 70.70, 85.97, 117.93, 116.61],
                        backgroundColor: 'rgba(24, 119, 242, 0.7)',
                        borderColor: '#1877f2',
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
        }
    </script>
</body>

</html>
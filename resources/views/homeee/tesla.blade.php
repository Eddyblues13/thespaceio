<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tesla Investment Analysis - AI Investment Platform</title>
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
            --tesla-red: #e82127;
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

        .tesla-red {
            color: var(--tesla-red);
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
            color: var(--tesla-red);
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
            color: var(--tesla-red);
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
            color: var(--tesla-red);
            margin-bottom: 5px;
        }

        /* Product Showcase */
        .product-showcase {
            background: rgba(26, 77, 46, 0.3);
        }

        .product-card {
            background: rgba(10, 46, 26, 0.7);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
            border: 1px solid rgba(60, 179, 113, 0.3);
            transition: transform 0.3s;
            height: 100%;
            text-align: center;
        }

        .product-card:hover {
            transform: translateY(-10px);
            border-color: var(--tesla-red);
        }

        .product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            margin-bottom: 15px;
            border-radius: 8px;
        }

        .product-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--tesla-red);
            margin: 10px 0;
        }

        /* Projects Grid */
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .project-card {
            background: rgba(10, 46, 26, 0.7);
            border-radius: 10px;
            padding: 20px;
            border: 1px solid rgba(60, 179, 113, 0.3);
            transition: transform 0.3s;
        }

        .project-card:hover {
            transform: translateY(-5px);
            border-color: var(--tesla-red);
        }

        .project-icon {
            font-size: 2.5rem;
            color: var(--tesla-red);
            margin-bottom: 15px;
        }

        .project-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        /* Image Placeholder Styling */
        .image-placeholder {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, rgba(232, 33, 39, 0.2), rgba(10, 46, 26, 0.7));
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            color: var(--tesla-red);
            font-size: 3rem;
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

            .projects-grid {
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
            <a class="navbar-brand" href="{{url('/')}}">
                <i class="fas fa-brain me-2"></i>TheSpace
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="companiesDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Companies
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="companiesDropdown">
                            <li><a class="dropdown-item" href="nvidia">Nvidia</a></li>
                            <li><a class="dropdown-item" href="openai">OpenAI</a></li>
                            <li><a class="dropdown-item" href="tesla">Tesla</a></li>
                            <li><a class="dropdown-item" href="oracle">Oracle</a></li>
                            <li><a class="dropdown-item" href="google">Google</a></li>
                            <li><a class="dropdown-item" href="facebook">Facebook</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="anthropic">Anthropic</a></li>
                            <li><a class="dropdown-item" href="stability">Stability AI</a></li>
                            <li><a class="dropdown-item" href="cohere">Cohere</a></li>
                            <li><a class="dropdown-item" href="huggingface">Hugging Face</a></li>
                            <li><a class="dropdown-item" href="scale">Scale AI</a></li>
                            <li><a class="dropdown-item" href="runway.html">Runway AI</a></li>
                            <li><a class="dropdown-item" href="character">Character.AI</a></li>
                            <li><a class="dropdown-item" href="inflection">Inflection AI</a></li>
                            <li><a class="dropdown-item" href="mistral">Mistral AI</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="investment">Investment Tiers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="insurance">Insurance</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="etf&funds">Etf&Funds</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="faq">Faq</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about">About</a>
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
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/bb/Tesla_T_symbol.svg/1200px-Tesla_T_symbol.svg.png"
                            alt="Tesla" style="height: 80px; margin-right: 20px;">
                        <h1 class="hero-title tesla-red">Tesla Inc. <span class="badge bg-secondary">TSLA</span></h1>
                    </div>
                    <p class="hero-subtitle">Revolutionizing sustainable energy and transportation with cutting-edge AI
                        and automation. Tesla's mission is to accelerate the world's transition to sustainable energy.
                    </p>

                    <div class="stock-widget-large">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="stock-price-large">$245.78</div>
                                <div class="stock-change-large positive">+2.34% <i class="fas fa-arrow-up"></i> (+$5.62)
                                </div>
                                <div class="text-muted">NASDAQ: TSLA • Last updated: 10:15 AM EST</div>
                            </div>
                            <div class="col-md-6">
                                <div class="row text-center">
                                    <div class="col-4">
                                        <div class="fw-bold">Open</div>
                                        <div>$240.16</div>
                                    </div>
                                    <div class="col-4">
                                        <div class="fw-bold">Volume</div>
                                        <div>28.4M</div>
                                    </div>
                                    <div class="col-4">
                                        <div class="fw-bold">Market Cap</div>
                                        <div>$778.2B</div>
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
                <p>Comprehensive analysis of Tesla's business and market position</p>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="detail-card">
                        <div class="card-icon">
                            <i class="fas fa-industry"></i>
                        </div>
                        <h3>Business Model</h3>
                        <p>Tesla operates as a vertically integrated sustainable energy company, focusing on:</p>
                        <ul>
                            <li><strong>Electric Vehicles:</strong> Design, manufacturing, and sale of premium electric
                                vehicles (Model S, 3, X, Y, Cybertruck)</li>
                            <li><strong>Energy Generation & Storage:</strong> Solar panels, Solar Roof, and battery
                                storage solutions (Powerwall, Megapack)</li>
                            <li><strong>Services & Software:</strong> Autonomous driving technology, supercharging
                                network, and vehicle services</li>
                            <li><strong>AI & Robotics:</strong> Tesla Bot (Optimus) and AI training supercomputer (Dojo)
                            </li>
                        </ul>
                        <p>The company's unique approach combines hardware, software, and energy infrastructure to
                            create a comprehensive ecosystem.</p>
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
                                <div class="metric-value">1.31M</div>
                                <div class="metric-label">2022 Deliveries</div>
                            </div>
                            <div class="metric-item">
                                <div class="metric-value">$81.5B</div>
                                <div class="metric-label">2022 Revenue</div>
                            </div>
                            <div class="metric-item">
                                <div class="metric-value">45K+</div>
                                <div class="metric-label">Superchargers</div>
                            </div>
                            <div class="metric-item">
                                <div class="metric-value">7</div>
                                <div class="metric-label">Gigafactories</div>
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
                            <li><strong>Technology Leadership:</strong> Industry-leading battery technology and
                                autonomous driving capabilities</li>
                            <li><strong>Brand Power:</strong> Strong brand recognition and customer loyalty</li>
                            <li><strong>Vertical Integration:</strong> Control over entire supply chain from raw
                                materials to sales</li>
                            <li><strong>Software Expertise:</strong> Over-the-air updates continuously improve vehicle
                                performance</li>
                            <li><strong>Charging Infrastructure:</strong> Global Supercharger network provides
                                competitive moat</li>
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
                            <li><strong>Regulatory Challenges:</strong> Changing government policies and subsidies for
                                EVs</li>
                            <li><strong>Competition:</strong> Increasing competition from traditional automakers and new
                                EV companies</li>
                            <li><strong>Production Scaling:</strong> Challenges in ramping up production to meet demand
                            </li>
                            <li><strong>Supply Chain:</strong> Dependence on battery materials and potential shortages
                            </li>
                            <li><strong>Valuation Concerns:</strong> High P/E ratio compared to traditional automakers
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tesla Products Showcase -->
    <section class="content-section product-showcase">
        <div class="container">
            <div class="section-header">
                <h2>Tesla Product Portfolio</h2>
                <p>Revolutionary products driving Tesla's growth</p>
            </div>

            <div class="row">
                <!-- Tesla Bot -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="product-card">
                        <h4>Tesla Bot (Optimus)</h4>
                        <div class="image-placeholder">
                            <img src="img/optimus.jpeg" alt="">
                        </div>
                        <p>General-purpose humanoid robot designed to perform unsafe, repetitive, or boring tasks.</p>
                        <div class="product-price">Expected: $20,000</div>
                        <small>Targeting 2025 production</small>
                    </div>
                </div>

                <!-- Model S -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="product-card">
                        <h4>Model S</h4>
                        <img src="img/model s.jpeg" class="product-image">
                        <p>Luxury all-electric sedan with up to 405 miles of range and 0-60 mph in 1.99 seconds.</p>
                        <div class="product-price">From $88,490</div>
                        <small>Plaid: $108,490</small>
                    </div>
                </div>

                <!-- Cybertruck -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="product-card">
                        <h4>Cybertruck</h4>
                        <img src="img/cybertruck.jpeg" alt="Tesla Cybertruck" class="product-image">
                        <p>All-electric pickup truck with exoskeleton design and ultra-hard stainless steel.</p>
                        <div class="product-price">From $39,900</div>
                        <small>Tri Motor: $69,900</small>
                    </div>
                </div>

                <!-- Model 3 -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="product-card">
                        <h4>Model 3</h4>
                        <img src="img/model 3.jpeg">
                        <p>Compact premium sedan with up to 358 miles of range and 0-60 mph in 3.1 seconds.</p>
                        <div class="product-price">From $40,240</div>
                        <small>Performance: $53,240</small>
                    </div>
                </div>

                <!-- Model Y -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="product-card">
                        <h4>Model Y</h4>
                        <img src="img/model y.jpeg">
                        <p>Compact SUV with up to 330 miles of range and seating for up to seven adults.</p>
                        <div class="product-price">From $47,740</div>
                        <small>Performance: $54,740</small>
                    </div>
                </div>

                <!-- Model X -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="product-card">
                        <h4>Model X</h4>
                        <img src="img/model x.jpeg">
                        <p>Mid-size SUV with Falcon Wing doors and up to 348 miles of range.</p>
                        <div class="product-price">From $98,490</div>
                        <small>Plaid: $108,490</small>
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
                <p>Our proprietary algorithms evaluate Tesla's investment potential</p>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="analysis-card">
                        <h3 class="tesla-red">Investment Rating</h3>
                        <div class="d-flex align-items-center my-3">
                            <div class="display-4 tesla-red me-3">BUY</div>
                            <div class="bg-success text-white px-3 py-1 rounded">Strong Positive</div>
                        </div>
                        <p>Our AI models indicate Tesla maintains strong growth potential despite recent market
                            volatility. The company's technological lead and expanding market share justify a BUY
                            recommendation.</p>

                        <div class="mt-4">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Confidence Level</span>
                                <span>87%</span>
                            </div>
                            <div class="confidence-meter">
                                <div class="confidence-level high-confidence" style="width: 87%;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="analysis-card">
                        <h3 class="tesla-red">Price Targets</h3>
                        <div class="row text-center mt-4">
                            <div class="col-4">
                                <div class="tesla-red fw-bold">Short Term</div>
                                <div class="h4 tesla-red">$275</div>
                                <small>(3 months)</small>
                            </div>
                            <div class="col-4">
                                <div class="tesla-red fw-bold">Medium Term</div>
                                <div class="h4 tesla-red">$350</div>
                                <small>(12 months)</small>
                            </div>
                            <div class="col-4">
                                <div class="tesla-red fw-bold">Long Term</div>
                                <div class="h4 tesla-red">$500</div>
                                <small>(3-5 years)</small>
                            </div>
                        </div>

                        <div class="mt-4">
                            <h5>Key Growth Drivers</h5>
                            <ul>
                                <li>Cybertruck production ramp-up</li>
                                <li>Full Self-Driving (FSD) software revenue</li>
                                <li>Energy storage business expansion</li>
                                <li>International market penetration</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="analysis-card">
                        <h3 class="tesla-red">Sentiment Analysis</h3>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Market Sentiment</h5>
                                <div class="d-flex align-items-center my-2">
                                    <div class="progress flex-grow-1 me-2" style="height: 20px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 72%;"
                                            aria-valuenow="72" aria-valuemin="0" aria-valuemax="100">72% Positive</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h5>Analyst Consensus</h5>
                                <div class="d-flex align-items-center my-2">
                                    <div class="progress flex-grow-1 me-2" style="height: 20px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 65%;"
                                            aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65% Buy</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h5>AI Confidence</h5>
                                <div class="d-flex align-items-center my-2">
                                    <div class="progress flex-grow-1 me-2" style="height: 20px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 87%;"
                                            aria-valuenow="87" aria-valuemin="0" aria-valuemax="100">87% Confident</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tesla Investment Projects -->
    <section class="content-section">
        <div class="container">
            <div class="section-header">
                <h2>Strategic Investment Projects</h2>
                <p>Key initiatives driving Tesla's future growth</p>
            </div>

            <div class="projects-grid">
                <div class="project-card">
                    <div class="image-placeholder">
                        <i class="fas fa-server"></i>
                    </div>
                    <h4>Dojo Supercomputer</h4>
                    <p>Custom AI training supercomputer designed to process vast amounts of video data for autonomous
                        driving.</p>
                    <div class="mt-3">
                        <span class="badge bg-primary">AI Infrastructure</span>
                        <span class="badge bg-warning">Development</span>
                    </div>
                    <div class="mt-2">
                        <small><strong>Investment:</strong> $1B+</small><br>
                        <small><strong>Timeline:</strong> Operational 1995</small>
                    </div>
                </div>

                <div class="project-card">
                    <div class="image-placeholder">
                        <i class="fas fa-car"></i>
                    </div>
                    <h4>Full Self-Driving (FSD)</h4>
                    <p>Advanced autonomous driving system with neural network training and real-world AI deployment.</p>
                    <div class="mt-3">
                        <span class="badge bg-primary">Autonomous Driving</span>
                        <span class="badge bg-info">Beta Testing</span>
                    </div>
                    <div class="mt-2">
                        <small><strong>Investment:</strong> $2B+ annually</small><br>
                        <small><strong>Timeline:</strong> Continuous development</small>
                    </div>
                </div>

                <div class="project-card">
                    <div class="image-placeholder">
                        <i class="fas fa-battery-full"></i>
                    </div>
                    <h4>4680 Battery Cells</h4>
                    <p>Next-generation battery technology with improved energy density and reduced manufacturing costs.
                    </p>
                    <div class="mt-3">
                        <span class="badge bg-primary">Energy Storage</span>
                        <span class="badge bg-success">Production Ramping</span>
                    </div>
                    <div class="mt-2">
                        <small><strong>Investment:</strong> $6B+</small><br>
                        <small><strong>Timeline:</strong> Mass production 2024</small>
                    </div>
                </div>

                <div class="project-card">
                    <div class="image-placeholder">
                        <i class="fas fa-industry"></i>
                    </div>
                    <h4>Gigafactory Expansion</h4>
                    <p>Global manufacturing expansion including Texas, Berlin, and potential new locations in Asia.</p>
                    <div class="mt-3">
                        <span class="badge bg-primary">Manufacturing</span>
                        <span class="badge bg-warning">Construction</span>
                    </div>
                    <div class="mt-2">
                        <small><strong>Investment:</strong> $5B+ per factory</small><br>
                        <small><strong>Timeline:</strong> 1995-2025</small>
                    </div>
                </div>

                <div class="project-card">
                    <div class="image-placeholder">
                        <i class="fas fa-charging-station"></i>
                    </div>
                    <h4>Supercharger Network</h4>
                    <p>Global expansion of fast-charging infrastructure and opening to non-Tesla vehicles.</p>
                    <div class="mt-3">
                        <span class="badge bg-primary">Charging Infrastructure</span>
                        <span class="badge bg-info">Rapid Expansion</span>
                    </div>
                    <div class="mt-2">
                        <small><strong>Investment:</strong> $1B+ annually</small><br>
                        <small><strong>Timeline:</strong> Ongoing</small>
                    </div>
                </div>

                <div class="project-card">
                    <div class="image-placeholder">
                        <i class="fas fa-solar-panel"></i>
                    </div>
                    <h4>Solar Roof & Energy</h4>
                    <p>Integrated solar energy generation and storage solutions for residential and commercial use.</p>
                    <div class="mt-3">
                        <span class="badge bg-primary">Renewable Energy</span>
                        <span class="badge bg-success">Growth Phase</span>
                    </div>
                    <div class="mt-2">
                        <small><strong>Investment:</strong> $500M+ annually</small><br>
                        <small><strong>Timeline:</strong> Ongoing expansion</small>
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
                                <span class="tesla-red">+51%</span>
                            </div>
                            <div class="d-flex justify-content-between py-2 border-bottom">
                                <span>Gross Margin</span>
                                <span class="tesla-red">25.6%</span>
                            </div>
                            <div class="d-flex justify-content-between py-2 border-bottom">
                                <span>Operating Margin</span>
                                <span class="tesla-red">16.8%</span>
                            </div>
                            <div class="d-flex justify-content-between py-2 border-bottom">
                                <span>Free Cash Flow</span>
                                <span class="tesla-red">$7.6B</span>
                            </div>
                            <div class="d-flex justify-content-between py-2">
                                <span>R&D Investment</span>
                                <span class="tesla-red">$3.1B</span>
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
                        <li><a href="{{url('/')}}" class="text-light">Home</a></li>
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
                        label: 'TSLA Price',
                        data: [240.16, 241.50, 242.80, 243.25, 244.10, 243.75, 244.50, 245.20, 245.60, 245.30, 245.75, 245.50, 245.65, 245.78],
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
                    labels: ['2018', '2019', '2020', '2021', '2022'],
                    datasets: [{
                        label: 'Revenue (Billions)',
                        data: [21.46, 24.58, 31.54, 53.82, 81.46],
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
        }
    </script>
</body>

</html>
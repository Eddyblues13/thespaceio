<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheSpace AI ETF & Funds</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
        }

        body {
            background-color: var(--dark-blue);
            color: var(--text-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
        }

        /* Navigation */
        .navbar {
            background-color: var(--primary-blue);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            border-bottom: 1px solid var(--border-color);
        }

        .navbar-brand {
            font-weight: bold;
            color: white !important;
            font-size: 1.5rem;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.85) !important;
            transition: color 0.3s;
        }

        .nav-link:hover,
        .nav-link.active {
            color: white !important;
        }

        /* Hero Section */
        .funds-hero {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--accent-blue) 100%);
            color: white;
            padding: 120px 0 80px;
            text-align: center;
            border-bottom: 1px solid var(--border-color);
        }

        .hero-title {
            font-size: 3.2rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .hero-subtitle {
            font-size: 1.3rem;
            max-width: 800px;
            margin: 0 auto;
            opacity: 0.9;
        }

        .hero-quote {
            font-style: italic;
            font-size: 1.1rem;
            margin-top: 2rem;
            opacity: 0.8;
        }

        /* Content Sections */
        .content-section {
            padding: 80px 0;
        }

        .section-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-header h2 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: var(--text-color);
        }

        .section-header p {
            font-size: 1.1rem;
            max-width: 700px;
            margin: 0 auto;
            color: #a8c6e5;
        }

        /* Fund Cards */
        .fund-card {
            background-color: var(--primary-blue);
            border-radius: 10px;
            padding: 30px;
            margin-bottom: 30px;
            border: 1px solid var(--border-color);
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
        }

        .fund-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            border-color: var(--accent-blue);
        }

        .fund-icon {
            font-size: 2.5rem;
            color: var(--accent-blue);
            margin-bottom: 20px;
        }

        .fund-title {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: white;
        }

        .fund-subtitle {
            font-size: 1rem;
            color: #a8c6e5;
            margin-bottom: 20px;
            font-style: italic;
        }

        .fund-advantage {
            background-color: rgba(0, 200, 83, 0.1);
            border-left: 4px solid var(--success-green);
            padding: 15px;
            margin: 20px 0;
            border-radius: 0 5px 5px 0;
        }

        .fund-advantage h5 {
            color: var(--success-green);
            margin-bottom: 10px;
        }

        .company-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 10px;
            margin-top: 15px;
        }

        .company-item {
            background-color: rgba(255, 255, 255, 0.05);
            padding: 8px 12px;
            border-radius: 4px;
            text-align: center;
            font-size: 0.9rem;
        }

        /* Tiers Table */
        .tiers-table {
            background-color: var(--primary-blue);
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid var(--border-color);
            margin: 30px 0;
        }

        .tiers-table table {
            margin-bottom: 0;
            color: var(--text-color);
        }

        .tiers-table thead {
            background-color: var(--accent-blue);
            color: white;
        }

        .tiers-table th {
            padding: 15px;
            font-weight: 600;
            border: none;
        }

        .tiers-table td {
            padding: 15px;
            border-color: var(--border-color);
        }

        .tiers-table tbody tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.05);
        }

        /* Profit Streams */
        .profit-streams {
            background-color: var(--light-blue);
            border-radius: 10px;
            padding: 30px;
            margin: 40px 0;
            border: 1px solid var(--border-color);
        }

        .profit-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .profit-number {
            background-color: var(--accent-blue);
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-right: 15px;
            flex-shrink: 0;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--accent-blue) 100%);
            color: white;
            padding: 80px 0;
            text-align: center;
            border-top: 1px solid var(--border-color);
        }

        .cta-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .cta-subtitle {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 2rem;
            opacity: 0.9;
        }

        .btn-cta {
            background-color: white;
            color: var(--accent-blue);
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 30px;
            transition: all 0.3s;
            border: none;
        }

        .btn-cta:hover {
            background-color: #e6f2ff;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        /* Footer */
        footer {
            background-color: var(--primary-blue);
            color: #a8c6e5;
            padding: 50px 0 20px;
            border-top: 1px solid var(--border-color);
        }

        .footer-heading {
            color: white;
            margin-bottom: 20px;
            font-size: 1.2rem;
        }

        .footer-links a {
            color: #a8c6e5;
            text-decoration: none;
            transition: color 0.3s;
            display: block;
            margin-bottom: 8px;
        }

        .footer-links a:hover {
            color: white;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .section-header h2 {
                font-size: 2rem;
            }

            .cta-title {
                font-size: 2rem;
            }

            .tiers-table {
                overflow-x: auto;
            }

            .company-grid {
                grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            }
        }

        @media (max-width: 576px) {
            .funds-hero {
                padding: 100px 0 60px;
            }

            .content-section {
                padding: 60px 0;
            }

            .hero-title {
                font-size: 2rem;
            }

            .section-header h2 {
                font-size: 1.8rem;
            }

            .fund-card {
                padding: 20px;
            }

            .company-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>

<body>
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
                            <li><a class="dropdown-item" href="runway">Runway AI</a></li>
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
    <section class="funds-hero">
        <div class="container">
            <h1 class="hero-title">TheSpace AI ETF & Funds</h1>
            <p class="hero-subtitle">Invest in the Intelligence That's Building Tomorrow</p>
            <p class="hero-subtitle"></p>The Future Is Intelligent Capital</p>
        </div>
    </section>

    <!-- Overview Section -->
    <section class="content-section">
        <div class="container">
            <div class="section-header">
                <h2>Overview</h2>
                <p>Diversified exposure to the rapidly expanding artificial intelligence ecosystem</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="fund-card">
                        <p>The TheSpace AI ETF & Funds are designed to give investors broad, diversified, and
                            intelligent exposure to the rapidly expanding artificial intelligence ecosystem.</p>
                        <p>Through a combination of public market ETFs, private equity funds, and venture allocations,
                            TheSpace empowers investors to participate in the full growth cycle of AI — from early
                            innovation to global adoption.</p>
                        <p>Whether you are an individual investor, a corporate entity, or an institutional fund,
                            TheSpace makes it possible to own a stake in the world's most advanced AI-driven
                            enterprises.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TheSpace AI ETF Section -->
    <section class="content-section" style="background-color: var(--light-gray);">
        <div class="container">
            <div class="section-header">
                <h2>The TheSpace AI ETF</h2>
                <p>Public Market Portfolio</p>
            </div>

            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="fund-card">
                        <div class="fund-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3 class="fund-title">TheSpace Artificial Intelligence Exchange-Traded Fund (AIETF)</h3>
                        <p class="fund-subtitle">Tracks and invests in leading publicly traded companies driving the AI
                            revolution</p>

                        <p>The TheSpace Artificial Intelligence Exchange-Traded Fund (AIETF) tracks and invests in
                            leading publicly traded companies driving the AI revolution across technology, data,
                            automation, and robotics.</p>

                        <h5>Core Holdings include:</h5>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <h6>Technology & Cloud AI</h6>
                                <div class="company-grid">
                                    <div class="company-item">Microsoft</div>
                                    <div class="company-item">Amazon</div>
                                    <div class="company-item">Google</div>
                                    <div class="company-item">Oracle</div>
                                    <div class="company-item">IBM</div>
                                </div>

                                <h6 class="mt-3">AI Hardware & Chips</h6>
                                <div class="company-grid">
                                    <div class="company-item">Nvidia</div>
                                    <div class="company-item">AMD</div>
                                    <div class="company-item">Intel</div>
                                    <div class="company-item">Qualcomm</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6>Autonomous & Robotics</h6>
                                <div class="company-grid">
                                    <div class="company-item">Tesla</div>
                                    <div class="company-item">Boston Dynamics</div>
                                    <div class="company-item">ABB Robotics</div>
                                </div>

                                <h6 class="mt-3">AI Software & Platforms</h6>
                                <div class="company-grid">
                                    <div class="company-item">Adobe</div>
                                    <div class="company-item">Salesforce</div>
                                    <div class="company-item">Palantir</div>
                                    <div class="company-item">Meta</div>
                                </div>

                                <h6 class="mt-3">AI Infrastructure & Security</h6>
                                <div class="company-grid">
                                    <div class="company-item">Cisco</div>
                                    <div class="company-item">CrowdStrike</div>
                                    <div class="company-item">Snowflake</div>
                                </div>
                            </div>
                        </div>

                        <p class="mt-4">Each company in the ETF represents a different dimension of the AI economy —
                            ensuring investors benefit from both growth and stability.</p>

                        <div class="fund-advantage">
                            <h5>ETF Advantage</h5>
                            <ul class="mb-0">
                                <li>Liquidity & transparency</li>
                                <li>Lower investment threshold</li>
                                <li>Real-time market exposure</li>
                                <li>Monthly performance reports</li>
                                <li>Managed risk diversification</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TheSpace AI Growth Fund Section -->
    <section class="content-section">
        <div class="container">
            <div class="section-header">
                <h2>The TheSpace AI Growth Fund</h2>
                <p>Private Market Access</p>
            </div>

            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="fund-card">
                        <div class="fund-icon">
                            <i class="fas fa-seedling"></i>
                        </div>
                        <h3 class="fund-title">TheSpace AI Growth Fund (AIGF)</h3>
                        <p class="fund-subtitle">Access to private and pre-IPO AI startups shaping the next decade of
                            innovation</p>

                        <p>The TheSpace AI Growth Fund (AIGF) gives investors access to the private and pre-IPO AI
                            startups that are shaping the next decade of innovation.</p>

                        <h5>Current private allocations include:</h5>
                        <div class="company-grid mt-3">
                            <div class="company-item">OpenAI</div>
                            <div class="company-item">Anthropic</div>
                            <div class="company-item">Stability AI</div>
                            <div class="company-item">Hugging Face</div>
                            <div class="company-item">Runway AI</div>
                            <div class="company-item">Scale AI</div>
                            <div class="company-item">Perplexity AI</div>
                        </div>

                        <p class="mt-4">The AIGF identifies startups before they reach mass adoption — offering
                            early-stage exposure with exponential upside potential.</p>

                        <div class="fund-advantage">
                            <h5>Fund Advantage</h5>
                            <ul class="mb-0">
                                <li>Exclusive private access (normally closed to individuals)</li>
                                <li>Potential for 10×–100× growth returns</li>
                                <li>Professional due diligence & startup evaluation</li>
                                <li>Portfolio rebalancing for risk control</li>
                                <li>Annual performance distribution</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Infrastructure Fund Section -->
    <section class="content-section" style="background-color: var(--light-gray);">
        <div class="container">
            <div class="section-header">
                <h2>Global AI Infrastructure Fund</h2>
                <p>Institutional & Corporate Investors</p>
            </div>

            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="fund-card">
                        <div class="fund-icon">
                            <i class="fas fa-server"></i>
                        </div>
                        <h3 class="fund-title">TheSpace Global AI Infrastructure Fund</h3>
                        <p class="fund-subtitle">Targeting the core infrastructure that enables AI to scale</p>

                        <p>This specialized fund targets the core infrastructure that enables AI to scale — including
                            data centers, semiconductor manufacturing, AI energy systems, and neural computing networks.
                        </p>

                        <p>It is built for large investors seeking long-term stability with exposure to the "picks and
                            shovels" of the AI revolution.</p>

                        <h5>Investments include:</h5>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <ul>
                                    <li>Semiconductor fabrication (TSMC, Samsung)</li>
                                    <li>Quantum computing (D-Wave, Rigetti)</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul>
                                    <li>AI data center REITs (Equinix, Digital Realty)</li>
                                    <li>Energy-efficient server technologies</li>
                                    <li>Neural cloud & distributed compute infrastructure</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Multi-Asset Portfolio Section -->
    <section class="content-section">
        <div class="container">
            <div class="section-header">
                <h2>Multi-Asset AI Portfolio (MAAP)</h2>
                <p>Single-Entry Solution for Balanced Growth</p>
            </div>

            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="fund-card">
                        <div class="fund-icon">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <h3 class="fund-title">TheSpace Multi-Asset AI Portfolio (MAAP)</h3>

                        <p>For investors seeking a single-entry solution, TheSpace offers the Multi-Asset AI Portfolio,
                            combining:</p>

                        <div class="row text-center mt-4">
                            <div class="col-md-4 mb-3">
                                <div class="display-6 text-primary">40%</div>
                                <div>Public AI ETF</div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="display-6 text-primary">35%</div>
                                <div>Private Growth Fund</div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="display-6 text-primary">25%</div>
                                <div>Infrastructure Fund</div>
                            </div>
                        </div>

                        <p class="mt-4">This creates a balanced, high-growth, low-volatility structure designed for
                            long-term wealth building and compounding returns.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Investment Tiers Section -->
    <section class="content-section" style="background-color: var(--light-gray);">
        <div class="container">
            <div class="section-header">
                <h2>Investment Tiers</h2>
                <p>Scalable entry points for every investor</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="tiers-table">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Tier</th>
                                    <th>Investor Type</th>
                                    <th>Minimum Investment</th>
                                    <th>Access</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tier 1</td>
                                    <td>Individual</td>
                                    <td>$10,000</td>
                                    <td>TheSpace AI ETF</td>
                                </tr>
                                <tr>
                                    <td>Tier 2</td>
                                    <td>Accredited Investor</td>
                                    <td>$100,000</td>
                                    <td>AI ETF + Growth Fund</td>
                                </tr>
                                <tr>
                                    <td>Tier 3</td>
                                    <td>Institutional</td>
                                    <td>$1,000,000+</td>
                                    <td>All Funds + Custom Allocation</td>
                                </tr>
                                <tr>
                                    <td>Tier 4</td>
                                    <td>Strategic Partner / Corporation</td>
                                    <td>$10M+</td>
                                    <td>Co-investment & AI Infrastructure Access</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Profit Streams Section -->
    <section class="content-section">
        <div class="container">
            <div class="section-header">
                <h2>Profit Streams & Cash Flow Model</h2>
                <p>Multiple avenues for generating returns</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="profit-streams">
                        <p>TheSpace AI ETF & Funds generate returns through:</p>

                        <div class="profit-item">
                            <div class="profit-number">1</div>
                            <div>
                                <h5>Capital Appreciation</h5>
                                <p class="mb-0">Rising share and company values.</p>
                            </div>
                        </div>

                        <div class="profit-item">
                            <div class="profit-number">2</div>
                            <div>
                                <h5>Dividends & Revenue Sharing</h5>
                                <p class="mb-0">Profit payouts from holdings.</p>
                            </div>
                        </div>

                        <div class="profit-item">
                            <div class="profit-number">3</div>
                            <div>
                                <h5>Fund Performance Bonuses</h5>
                                <p class="mb-0">Based on benchmark-beating performance.</p>
                            </div>
                        </div>

                        <div class="profit-item">
                            <div class="profit-number">4</div>
                            <div>
                                <h5>Private Exit Multipliers</h5>
                                <p class="mb-0">When private startups IPO or get acquired.</p>
                            </div>
                        </div>

                        <div class="profit-item">
                            <div class="profit-number">5</div>
                            <div>
                                <h5>Infrastructure Yield</h5>
                                <p class="mb-0">Rental and operational income from data centers and cloud systems.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Invest Section -->
    <section class="content-section" style="background-color: var(--light-gray);">
        <div class="container">
            <div class="section-header">
                <h2>Why Invest Through TheSpace?</h2>
                <p>Engineering the AI revolution, not just watching it</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="fund-card text-center">
                        <div class="fund-icon">
                            <i class="fas fa-brain"></i>
                        </div>
                        <p>Because TheSpace isn't just watching the AI revolution — we're engineering it.</p>
                        <p>We combine the power of financial strategy, data analysis, and AI forecasting models to
                            maximize profitability and minimize risk.</p>
                        <p>Our team continuously monitors market trends, startup valuations, and technological shifts to
                            ensure investors are always ahead of the curve.</p>

                        <div class="mt-4 p-4" style="background-color: rgba(0, 82, 163, 0.1); border-radius: 10px;">
                            <h4 class="mb-3">"The Future Is Intelligent Capital."</h4>
                            <p class="mb-2">TheSpace bridges innovation and investment — allowing you to profit from
                                every layer of the AI transformation.</p>
                            <p class="mb-2">When AI builds, you own.</p>
                            <p class="mb-2">When AI earns, you gain.</p>
                            <p class="mb-0">When AI evolves, your portfolio evolves with it.</p>
                            <h5 class="mt-3">TheSpace AI ETF & Funds — The Smartest Way to Invest in the Future.</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2 class="cta-title">Ready to Invest in AI Intelligence?</h2>
            <p class="cta-subtitle">Join the revolution and position your portfolio for the AI-driven future with
                TheSpace's diversified funds.</p>
            <a href="contact" class="btn btn-cta btn-lg">Start Investing Today</a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="footer-heading">TheSpace AI Investments</h5>
                    <p>Building the world's most trusted AI investment ecosystem — connecting investors, innovators, and
                        industries under one intelligent financial network.</p>
                    <div class="mt-3">
                        <a href="#" class="text-light me-3"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-linkedin fa-lg"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-facebook fa-lg"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 mb-4">
                    <h5 class="footer-heading">Quick Links</h5>
                    <div class="footer-links">
                        <a href="{{url('/')}}">Home</a>
                        <a href="about">About Us</a>
                        <a href="contact">Contact</a>
                        <a href="faq">FAQ</a>
                    </div>
                </div>

                <div class="col-lg-3 mb-4">
                    <h5 class="footer-heading">Companies</h5>
                    <div class="footer-links">
                        <a href="tesla">Tesla</a>
                        <a href="oracle">Oracle</a>
                        <a href="google">Google</a>
                        <a href="facebook">Meta (Facebook)</a>
                    </div>
                </div>

                <div class="col-lg-3 mb-4">
                    <h5 class="footer-heading">Contact Info</h5>
                    <div class="footer-links">
                        <a href="mailto:invest@TheSpace.ai"><i class="fas fa-envelope me-2"></i>invest@TheSpace.ai</a>
                        <a href="https://www.TheSpace.ai" target="_blank"><i
                                class="fas fa-globe me-2"></i>www.TheSpace.ai</a>
                    </div>
                </div>
            </div>

            <hr class="mt-4" style="border-color: rgba(255, 255, 255, 0.1);">

            <div class="text-center py-3">
                <p class="mb-0">&copy; 1995 TheSpace AI Investments. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
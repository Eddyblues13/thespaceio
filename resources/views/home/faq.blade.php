<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheSpace - Frequently Asked Questions</title>
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
        .faq-hero {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--accent-blue) 100%);
            color: white;
            padding: 100px 0 80px;
            text-align: center;
            border-bottom: 1px solid var(--border-color);
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto;
            opacity: 0.9;
        }

        /* FAQ Section */
        .faq-section {
            padding: 80px 0;
            background-color: var(--dark-blue);
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

        /* FAQ Accordion */
        .faq-accordion .accordion-item {
            border: 1px solid var(--border-color);
            border-radius: 8px;
            margin-bottom: 20px;
            background-color: var(--primary-blue);
            overflow: hidden;
        }

        .faq-accordion .accordion-button {
            background-color: var(--primary-blue);
            color: var(--text-color);
            font-weight: 600;
            font-size: 1.1rem;
            padding: 20px 25px;
            border: none;
            box-shadow: none;
        }

        .faq-accordion .accordion-button:not(.collapsed) {
            background-color: var(--light-blue);
            color: white;
            border-bottom: 1px solid var(--border-color);
        }

        .faq-accordion .accordion-button::after {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23a8c6e5'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        }

        .faq-accordion .accordion-button:not(.collapsed)::after {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23ffffff'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        }

        .faq-accordion .accordion-body {
            padding: 25px;
            background-color: var(--light-blue);
            color: #c7daf0;
            border-top: 1px solid var(--border-color);
        }

        .faq-accordion .accordion-body ul,
        .faq-accordion .accordion-body ol {
            padding-left: 20px;
        }

        .faq-accordion .accordion-body li {
            margin-bottom: 8px;
        }

        .faq-accordion .accordion-body a {
            color: #66b3ff;
            text-decoration: none;
        }

        .faq-accordion .accordion-body a:hover {
            color: #99ccff;
            text-decoration: underline;
        }

        /* Investment Tiers Table */
        .tiers-table {
            background-color: var(--primary-blue);
            border-radius: 8px;
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

        /* ROI Table */
        .roi-table {
            background-color: var(--primary-blue);
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid var(--border-color);
            margin: 30px 0;
        }

        .roi-table table {
            margin-bottom: 0;
            color: var(--text-color);
        }

        .roi-table thead {
            background-color: var(--accent-blue);
            color: white;
        }

        .roi-table th {
            padding: 15px;
            font-weight: 600;
            border: none;
            text-align: center;
        }

        .roi-table td {
            padding: 15px;
            border-color: var(--border-color);
            text-align: center;
        }

        .roi-table tbody tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.05);
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
                font-size: 2.2rem;
            }

            .section-header h2 {
                font-size: 2rem;
            }

            .cta-title {
                font-size: 2rem;
            }

            .tiers-table,
            .roi-table {
                overflow-x: auto;
            }

            .faq-accordion .accordion-button {
                padding: 15px 20px;
                font-size: 1rem;
            }

            .faq-accordion .accordion-body {
                padding: 20px;
            }
        }

        @media (max-width: 576px) {
            .faq-hero {
                padding: 80px 0 60px;
            }

            .faq-section {
                padding: 60px 0;
            }

            .hero-title {
                font-size: 1.8rem;
            }

            .section-header h2 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <i class="fas fa-robot me-2"></i>TheSpace
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
                        <a class="nav-link dropdown-toggle" href="#" id="companiesDropdown" role="button"
                            data-bs-toggle="dropdown">
                            Companies
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="tesla">Tesla</a></li>
                            <li><a class="dropdown-item" href="oracle">Oracle</a></li>
                            <li><a class="dropdown-item" href="google">Google</a></li>
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
                        <a class="nav-link active" href="faq">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="etf&funds">ETF&Funds</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="faq-hero">
        <div class="container">
            <h1 class="hero-title">Frequently Asked Questions</h1>
            <p class="hero-subtitle">Find answers to common questions about TheSpace, our investment strategies, and how
                you can benefit from the AI revolution.</p>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <div class="section-header">
                <h2>Your Questions Answered</h2>
                <p>Everything you need to know about investing with TheSpace</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="accordion faq-accordion" id="faqAccordion">
                        <!-- Question 1 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne">
                                    <i class="fas fa-question-circle me-2"></i> What is TheSpace?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>TheSpace is a global investment company specializing in Artificial Intelligence
                                        (AI) assets and technologies.</p>
                                    <p>We invest in the world's leading AI corporations, high-growth startups, and
                                        infrastructure firms — giving our investors diversified exposure to the most
                                        powerful technology revolution of our time.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Question 2 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo">
                                    <i class="fas fa-cogs me-2"></i> How does TheSpace work?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>TheSpace operates through a diversified portfolio that includes:</p>
                                    <ul>
                                        <li><strong>Public AI ETF</strong> (investing in global giants like Nvidia,
                                            Microsoft, Google, and Tesla)</li>
                                        <li><strong>Private AI Growth Fund</strong> (funding early-stage innovators like
                                            OpenAI, Anthropic, and Stability AI)</li>
                                        <li><strong>AI Infrastructure Fund</strong> (investing in data centers, chips,
                                            and quantum computing systems)</li>
                                    </ul>
                                    <p>Investors contribute capital to TheSpace, which is then allocated across these
                                        portfolios. As the AI industry grows, TheSpace's portfolio value rises — and
                                        investors earn returns from those profits.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Question 3 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree">
                                    <i class="fas fa-users me-2"></i> Who can invest in TheSpace?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>TheSpace is open to:</p>
                                    <ul>
                                        <li>Individual investors (starting from $10,000)</li>
                                        <li>Accredited and high-net-worth investors</li>
                                        <li>Institutional and corporate investors (partnership or large-scale funding
                                            options available)</li>
                                    </ul>
                                    <p>TheSpace welcomes investors who want long-term exposure to the booming AI sector.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Question 4 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour">
                                    <i class="fas fa-star me-2"></i> What makes TheSpace different from other investment
                                    companies?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Unlike traditional funds that focus on a single company or narrow sector,
                                        TheSpace gives you a stake in the entire AI ecosystem — from tech giants to
                                        emerging startups.</p>
                                    <p>We combine financial expertise with cutting-edge AI market analytics to identify
                                        high-potential growth areas before they hit the mainstream.</p>
                                    <p>TheSpace is not just investing in AI — we're helping to build it.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Question 5 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive">
                                    <i class="fas fa-chart-line me-2"></i> How do investors make money with TheSpace?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Investors profit through multiple channels:</p>
                                    <ol>
                                        <li><strong>Capital Appreciation:</strong> As AI companies grow, the value of
                                            TheSpace's portfolio increases.</li>
                                        <li><strong>Revenue Sharing:</strong> Profits earned by AI companies and
                                            partnerships are shared proportionally.</li>
                                        <li><strong>IPO & Exit Gains:</strong> Early-stage startups that go public or
                                            are acquired generate high returns.</li>
                                        <li><strong>Performance Bonuses:</strong> Investors in higher tiers gain extra
                                            profit-sharing and loyalty bonuses.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <!-- Question 6 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSix">
                                    <i class="fas fa-layer-group me-2"></i> What are the investment tiers and minimum
                                    amounts?
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
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
                                                    <td>ETF + Growth Fund</td>
                                                </tr>
                                                <tr>
                                                    <td>Tier 3</td>
                                                    <td>Institutional</td>
                                                    <td>$1,000,000+</td>
                                                    <td>All Funds</td>
                                                </tr>
                                                <tr>
                                                    <td>Tier 4</td>
                                                    <td>Strategic Partner / Corporation</td>
                                                    <td>$10,000,000+</td>
                                                    <td>Co-investment & Infrastructure</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Question 7 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSeven">
                                    <i class="fas fa-shield-alt me-2"></i> Is my investment safe?
                                </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>TheSpace applies diversified risk management, investing across multiple AI
                                        sectors, regions, and market levels.</p>
                                    <p>We continuously monitor portfolio performance and use advanced AI analytics to
                                        predict and adjust for market shifts.</p>
                                    <p>While all investments carry some risk, TheSpace's diversified model greatly
                                        reduces volatility compared to single-company investing.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Question 8 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingEight">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseEight">
                                    <i class="fas fa-calendar-alt me-2"></i> How often are returns paid?
                                </button>
                            </h2>
                            <div id="collapseEight" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Returns are distributed quarterly or annually, depending on the investment tier.
                                    </p>
                                    <p>Investors receive clear performance reports, portfolio updates, and reinvestment
                                        options.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Question 9 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingNine">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseNine">
                                    <i class="fas fa-sync-alt me-2"></i> Can I reinvest my profits?
                                </button>
                            </h2>
                            <div id="collapseNine" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Yes. Investors may choose to reinvest part or all of their earnings into the next
                                        investment cycle to compound long-term returns.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Question 10 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTen">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTen">
                                    <i class="fas fa-money-bill-wave me-2"></i> Does TheSpace have a management or
                                    performance fee?
                                </button>
                            </h2>
                            <div id="collapseTen" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Yes, TheSpace charges:</p>
                                    <ul>
                                        <li>A 2% management fee (for operational and research costs)</li>
                                        <li>A 15–20% performance fee (only when profit targets are exceeded)</li>
                                    </ul>
                                    <p>This ensures TheSpace earns only when you earn.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Question 11 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingEleven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseEleven">
                                    <i class="fas fa-eye me-2"></i> How transparent is TheSpace?
                                </button>
                            </h2>
                            <div id="collapseEleven" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>TheSpace provides:</p>
                                    <ul>
                                        <li>Monthly or quarterly investor reports</li>
                                        <li>Full visibility into portfolio holdings and performance</li>
                                        <li>Annual audited financial statements</li>
                                        <li>Real-time AI market analytics and forecasts</li>
                                    </ul>
                                    <p>Transparency and trust are the foundation of our relationship with investors.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Question 12 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwelve">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwelve">
                                    <i class="fas fa-industry me-2"></i> What industries does TheSpace's AI portfolio
                                    cover?
                                </button>
                            </h2>
                            <div id="collapseTwelve" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>TheSpace invests in AI across every major global sector, including:</p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <ul>
                                                <li>Technology & Cloud Computing</li>
                                                <li>Healthcare & Biotech</li>
                                                <li>Financial Services & Trading</li>
                                                <li>Energy & Sustainability</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <ul>
                                                <li>Robotics & Manufacturing</li>
                                                <li>Media, Design, and Entertainment</li>
                                                <li>Education & Data Science</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <p>This cross-sector strategy ensures continuous opportunity and growth.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Question 13 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThirteen">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThirteen">
                                    <i class="fas fa-chart-bar me-2"></i> What is the projected return on investment
                                    (ROI)?
                                </button>
                            </h2>
                            <div id="collapseThirteen" class="accordion-collapse collapse"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Returns vary depending on market conditions, fund type, and investor tier.
                                        However, TheSpace's annual ROI projections are as follows:</p>
                                    <div class="roi-table">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Year</th>
                                                    <th>Conservative</th>
                                                    <th>Moderate</th>
                                                    <th>High Growth</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Year 1</td>
                                                    <td>12–18%</td>
                                                    <td>18–25%</td>
                                                    <td>25–35%+</td>
                                                </tr>
                                                <tr>
                                                    <td>Year 2–3</td>
                                                    <td>20–30%</td>
                                                    <td>30–40%</td>
                                                    <td>40–50%+</td>
                                                </tr>
                                                <tr>
                                                    <td>Year 4–5</td>
                                                    <td>25–40%</td>
                                                    <td>40–55%</td>
                                                    <td>60%+</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Question 14 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFourteen">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFourteen">
                                    <i class="fas fa-handshake me-2"></i> Can companies or institutions partner with
                                    TheSpace?
                                </button>
                            </h2>
                            <div id="collapseFourteen" class="accordion-collapse collapse"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Yes. TheSpace actively collaborates with corporations, startups, and financial
                                        institutions seeking AI co-development or funding opportunities.</p>
                                    <p>Partnerships can include joint ventures, infrastructure co-investments, or
                                        innovation funding.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Question 15 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFifteen">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFifteen">
                                    <i class="fas fa-play-circle me-2"></i> How can I start investing with TheSpace?
                                </button>
                            </h2>
                            <div id="collapseFifteen" class="accordion-collapse collapse"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>You can begin in three simple steps:</p>
                                    <ol>
                                        <li>Register an investor profile on the TheSpace website.</li>
                                        <li>Select your investment plan or fund.</li>
                                        <li>Deposit your capital and receive your investor dashboard access.</li>
                                    </ol>
                                    <p>Our team will then provide onboarding, portfolio updates, and personalized
                                        investment insights.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Question 16 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSixteen">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSixteen">
                                    <i class="fas fa-tools me-2"></i> Is TheSpace involved in building AI technologies
                                    itself?
                                </button>
                            </h2>
                            <div id="collapseSixteen" class="accordion-collapse collapse"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Yes. Beyond funding AI companies, TheSpace also develops in-house AI tools, data
                                        analytics systems, and digital assets, further boosting the company's
                                        profitability and technical edge.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Question 17 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSeventeen">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSeventeen">
                                    <i class="fas fa-wallet me-2"></i> Can I withdraw my funds anytime?
                                </button>
                            </h2>
                            <div id="collapseSeventeen" class="accordion-collapse collapse"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Withdrawals depend on the investment type:</p>
                                    <ul>
                                        <li>ETF investments can be withdrawn anytime (subject to market hours).</li>
                                        <li>Private and infrastructure funds follow fixed holding periods (usually 6–12
                                            months) before exit or reinvestment options are available.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Question 18 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingEighteen">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseEighteen">
                                    <i class="fas fa-globe me-2"></i> Where is TheSpace headquartered?
                                </button>
                            </h2>
                            <div id="collapseEighteen" class="accordion-collapse collapse"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>TheSpace operates globally with financial and technology hubs across North
                                        America, Europe, and Asia, ensuring diversified market access and innovation
                                        sourcing.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Question 19 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingNineteen">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseNineteen">
                                    <i class="fas fa-bullseye me-2"></i> What's TheSpace's long-term vision?
                                </button>
                            </h2>
                            <div id="collapseNineteen" class="accordion-collapse collapse"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>To build the world's most trusted AI investment ecosystem — connecting investors,
                                        innovators, and industries under one intelligent financial network.</p>
                                    <p>Our long-term vision is to make AI ownership accessible to everyone, creating
                                        wealth while accelerating human progress.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Question 20 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwenty">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwenty">
                                    <i class="fas fa-envelope me-2"></i> How can I contact TheSpace?
                                </button>
                            </h2>
                            <div id="collapseTwenty" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Visit <a href="https://www.TheSpace.ai" target="_blank">www.TheSpace.ai</a> or
                                        email <a href="mailto:invest@TheSpace.ai">invest@TheSpace.ai</a> for direct
                                        inquiries, partnership discussions, or investor support.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2 class="cta-title">Ready to Invest in the Future of AI?</h2>
            <p class="cta-subtitle">Join thousands of investors who are already benefiting from the AI revolution with
                TheSpace. Start with as little as $10,000 and watch your portfolio grow.</p>
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
                        <a href="index.html">Home</a>
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
                <p class="mb-0">&copy; 2023 TheSpace AI Investments. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anthropic - AI Investment Analysis</title>
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
            --anthropic-purple: #6b46c1;
            --text-color: #e8f5e9;
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
            color: var(--anthropic-purple);
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
            border-bottom: 1px solid var(--anthropic-purple);
        }

        .navbar-brand {
            font-weight: bold;
            color: var(--anthropic-purple) !important;
            font-size: 1.5rem;
        }

        .nav-link {
            color: var(--text-color) !important;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: var(--anthropic-purple) !important;
        }

        /* Hero Section */
        .hero-section {
            padding: 150px 0 100px;
            background: linear-gradient(135deg, var(--dark-green) 0%, var(--medium-green) 100%);
            position: relative;
            overflow: hidden;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            background: linear-gradient(to right, var(--anthropic-purple), #9f7aea);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        /* Company Cards */
        .company-card {
            background: rgba(26, 77, 46, 0.7);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid rgba(107, 70, 193, 0.3);
            height: 100%;
        }

        .company-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
            border-color: var(--anthropic-purple);
        }

        .company-logo {
            height: 60px;
            margin-bottom: 15px;
            object-fit: contain;
            max-width: 100%;
        }

        .stock-widget {
            background: rgba(10, 46, 26, 0.8);
            border-radius: 8px;
            padding: 15px;
            margin-top: 15px;
            border-left: 4px solid var(--anthropic-purple);
        }

        .stock-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--anthropic-purple);
        }

        .stock-change {
            font-size: 0.9rem;
        }

        .positive {
            color: #7cfc00;
        }

        .negative {
            color: #ff4d4d;
        }

        /* Section Headers */
        .section-header {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
        }

        .section-header h2 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: var(--anthropic-purple);
        }

        .section-header::after {
            content: '';
            display: block;
            width: 100px;
            height: 3px;
            background: var(--anthropic-purple);
            margin: 0 auto;
            margin-top: 15px;
        }

        /* Stock Charts Section */
        .stock-charts-section {
            padding: 80px 0;
            background: rgba(26, 77, 46, 0.3);
        }

        .chart-container {
            background: rgba(26, 77, 46, 0.7);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
            border: 1px solid rgba(107, 70, 193, 0.3);
            height: 100%;
        }

        .chart-title {
            color: var(--anthropic-purple);
            margin-bottom: 15px;
            font-size: 1.2rem;
        }

        /* Content Cards */
        .content-card {
            background: rgba(26, 77, 46, 0.7);
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 30px;
            border: 1px solid rgba(107, 70, 193, 0.3);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .content-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
            border-color: var(--anthropic-purple);
        }

        .content-card h3 {
            color: var(--anthropic-purple);
            margin-bottom: 20px;
            font-size: 1.5rem;
        }

        .content-card img {
            border-radius: 8px;
            margin-bottom: 15px;
            width: 100%;
            height: auto;
        }

        /* Stats Cards */
        .stats-card {
            background: rgba(26, 77, 46, 0.7);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid rgba(107, 70, 193, 0.3);
            text-align: center;
            transition: transform 0.3s;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            border-color: var(--anthropic-purple);
        }

        .stats-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--anthropic-purple);
            margin-bottom: 10px;
        }

        .stats-label {
            font-size: 1rem;
            opacity: 0.9;
        }

        /* Timeline */
        .timeline {
            position: relative;
            padding-left: 30px;
            margin-top: 30px;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 15px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: var(--anthropic-purple);
        }

        .timeline-item {
            position: relative;
            margin-bottom: 30px;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: -23px;
            top: 5px;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: var(--anthropic-purple);
        }

        .timeline-date {
            font-weight: bold;
            color: var(--anthropic-purple);
            margin-bottom: 5px;
        }

        /* Footer */
        footer {
            background-color: rgba(10, 46, 26, 0.9);
            padding: 50px 0 20px;
            margin-top: 50px;
            border-top: 1px solid var(--anthropic-purple);
        }

        .footer-heading {
            color: var(--anthropic-purple);
            margin-bottom: 20px;
            font-size: 1.2rem;
        }

        /* Product Cards */
        .product-card {
            background: rgba(26, 77, 46, 0.7);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid rgba(107, 70, 193, 0.3);
            transition: transform 0.3s;
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-5px);
            border-color: var(--anthropic-purple);
        }

        .product-card img {
            border-radius: 8px;
            margin-bottom: 15px;
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        /* Safety Focus Section */
        .safety-feature {
            background: rgba(26, 77, 46, 0.7);
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 20px;
            border: 1px solid rgba(107, 70, 193, 0.3);
            transition: transform 0.3s;
        }

        .safety-feature:hover {
            transform: translateY(-5px);
            border-color: var(--anthropic-purple);
        }

        .safety-icon {
            font-size: 2.5rem;
            color: var(--anthropic-purple);
            margin-bottom: 15px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .section-header h2 {
                font-size: 2rem;
            }

            .stats-number {
                font-size: 2rem;
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
                        <a class="nav-link dropdown-toggle" href="#" id="companiesDropdown" role="button"
                            data-bs-toggle="dropdown">
                            Companies
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="nvidia">NVIDIA</a></li>
                            <li><a class="dropdown-item" href="openai">OpenAI</a></li>
                            <li><a class="dropdown-item" href="tesla">Tesla</a></li>
                            <li><a class="dropdown-item active" href="anthropic">Anthropic</a></li>
                            <li><a class="dropdown-item" href="google">Google</a></li>
                            <li><a class="dropdown-item" href="facebook">Facebook</a></li>
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
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6a/Anthropic_logo.svg/1200px-Anthropic_logo.svg.png"
                        alt="Anthropic" class="company-logo mb-4" style="height: 80px;">
                    <h1 class="hero-title">Anthropic</h1>
                    <p class="hero-subtitle">Building Reliable, Interpretable, and Steerable AI Systems</p>
                    <div class="mt-4">
                        <a href="#investment-analysis" class="btn btn-primary btn-lg me-3">Investment Analysis</a>
                        <a href="#company-overview" class="btn btn-outline-light btn-lg">Company Overview</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="company-card">
                        <div class="stock-widget">
                            <div class="stock-price">$18.4B</div>
                            <div class="stock-change positive">Amazon Backed <i class="fas fa-arrow-up"></i></div>
                            <small>Latest Valuation</small>
                        </div>
                        <div class="row mt-4">
                            <div class="col-6">
                                <div class="stats-card">
                                    <div class="stats-number">2021</div>
                                    <div class="stats-label">Founded</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stats-card">
                                    <div class="stats-number">$7.3B</div>
                                    <div class="stats-label">Total Funding</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stats-card">
                                    <div class="stats-number">300+</div>
                                    <div class="stats-label">Employees</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stats-card">
                                    <div class="stats-number">Claude 3</div>
                                    <div class="stats-label">Latest Model</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Company Overview Section -->
    <section id="company-overview" class="py-5">
        <div class="container">
            <div class="section-header">
                <h2>Company Overview</h2>
                <p>Understanding Anthropic's mission to build safe and beneficial AI systems</p>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="content-card">
                        <h3>About Anthropic</h3>
                        <p>Anthropic is an AI safety startup founded in 2021 by former OpenAI researchers who were
                            concerned about the direction and safety practices of mainstream AI development. The company
                            focuses on building reliable, interpretable, and steerable AI systems with a strong emphasis
                            on AI safety research.</p>

                        <p>Anthropic's flagship product is Claude, a family of large language models that compete
                            directly with OpenAI's GPT models. What sets Anthropic apart is its commitment to
                            Constitutional AI - a novel approach to aligning AI systems with human values through
                            self-supervision and explicit principles.</p>

                        <img src="https://images.unsplash.com/photo-1677442136019-21780ecad995?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            alt="AI Safety Research" class="img-fluid">

                        <h4 class="mt-4">Core Philosophy</h4>
                        <ul>
                            <li><strong>Safety-First Approach:</strong> Building AI systems that are inherently safe and
                                aligned with human values</li>
                            <li><strong>Constitutional AI:</strong> Training models using principles and values rather
                                than just human feedback</li>
                            <li><strong>Interpretability:</strong> Developing techniques to understand how AI models
                                make decisions</li>
                            <li><strong>Steerability:</strong> Creating AI systems that can be reliably directed and
                                controlled</li>
                            <li><strong>Long-Term Focus:</strong> Prioritizing long-term safety over short-term
                                commercial gains</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="content-card">
                        <h3>Leadership Team</h3>
                        <div class="mb-4">
                            <h5>Dario Amodei</h5>
                            <p class="mb-1"><strong>CEO & Co-founder</strong></p>
                            <p>Former VP of Research at OpenAI, leading AI safety research and company direction</p>
                        </div>
                        <div class="mb-4">
                            <h5>Daniela Amodei</h5>
                            <p class="mb-1"><strong>President & Co-founder</strong></p>
                            <p>Former VP of Safety and Policy at OpenAI, overseeing operations and safety practices</p>
                        </div>
                        <div class="mb-4">
                            <h5>Jared Kaplan</h5>
                            <p class="mb-1"><strong>Chief Science Officer</strong></p>
                            <p>Theoretical physicist and AI researcher leading scientific research direction</p>
                        </div>
                        <div>
                            <h5>Jack Clark</h5>
                            <p class="mb-1"><strong>Head of Policy</strong></p>
                            <p>Former policy director at OpenAI, shaping AI policy and safety standards</p>
                        </div>
                    </div>

                    <div class="content-card">
                        <h3>Major Investors</h3>
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Amazon_logo.svg/1200px-Amazon_logo.svg.png"
                                alt="Amazon" style="height: 30px; margin-right: 10px;">
                            <div>
                                <strong>Amazon</strong>
                                <div class="small">$4B Investment</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Google_Cloud_logo.svg/1200px-Google_Cloud_logo.svg.png"
                                alt="Google" style="height: 30px; margin-right: 10px;">
                            <div>
                                <strong>Google</strong>
                                <div class="small">$300M Investment</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4e/SK_Telecom_logo.svg/1200px-SK_Telecom_logo.svg.png"
                                alt="SK Telecom"
                                style="height: 30px; margin-right: 10px; background: white; padding: 5px; border-radius: 4px;">
                            <div>
                                <strong>SK Telecom</strong>
                                <div class="small">$100M Investment</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8c/Salesforce_logo.svg/1200px-Salesforce_logo.svg.png"
                                alt="Salesforce" style="height: 30px; margin-right: 10px;">
                            <div>
                                <strong>Salesforce Ventures</strong>
                                <div class="small">Strategic Investor</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Company Timeline -->
            <div class="content-card mt-4">
                <h3>Company Timeline</h3>
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-date">January 2021</div>
                        <p>Anthropic founded by Dario and Daniela Amodei along with other former OpenAI researchers
                            focused on AI safety.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">May 2021</div>
                        <p>Raised $124 million in Series A funding to develop safer AI systems and research AI
                            alignment.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">April 2022</div>
                        <p>Introduced Constitutional AI concept, a novel approach to AI alignment using principles and
                            self-supervision.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">December 2022</div>
                        <p>Launched Claude, their first large language model, positioning as a safer alternative to
                            ChatGPT.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">February 1995</div>
                        <p>Raised $300 million from Google at a $4 billion valuation, forming strategic cloud
                            partnership.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">March 1995</div>
                        <p>Launched Claude Instant, a faster, cheaper version of their language model for commercial
                            applications.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">September 1995</div>
                        <p>Announced $4 billion investment from Amazon, including strategic AWS partnership and minority
                            stake.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">March 2024</div>
                        <p>Released Claude 3 model family, claiming superior performance to GPT-4 in many benchmarks.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products & Technology Section -->
    <section class="py-5" style="background: rgba(26, 77, 46, 0.3);">
        <div class="container">
            <div class="section-header">
                <h2>Products & Technology</h2>
                <p>Anthropic's AI models and safety-focused technology stack</p>
            </div>

            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="product-card">
                        <img src="https://images.unsplash.com/photo-1682687221363-72518513620e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            alt="Claude AI Assistant">
                        <h4>Claude AI Assistant</h4>
                        <p>Anthropic's flagship conversational AI that excels at thoughtful dialogue, analysis, and
                            content creation with strong safety guardrails and Constitutional AI principles.</p>
                        <div class="mt-3">
                            <span class="badge bg-primary me-2">Claude 3 Opus</span>
                            <span class="badge bg-primary me-2">Claude 3 Sonnet</span>
                            <span class="badge bg-primary">Claude 3 Haiku</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="product-card">
                        <img src="https://images.unsplash.com/photo-1677442135337-6b5f6deacec9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            alt="Constitutional AI">
                        <h4>Constitutional AI</h4>
                        <p>A novel training methodology that uses principles and values to guide AI behavior, reducing
                            reliance on human feedback and creating more aligned systems.</p>
                        <div class="mt-3">
                            <span class="badge bg-primary me-2">Principles-Based</span>
                            <span class="badge bg-primary me-2">Self-Supervision</span>
                            <span class="badge bg-primary">Red-Teaming</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="product-card">
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            alt="API Platform">
                        <h4>Claude API</h4>
                        <p>Enterprise-grade API access to Claude models, offering scalable AI capabilities for
                            businesses with enhanced safety features and customizability.</p>
                        <div class="mt-3">
                            <span class="badge bg-primary me-2">Enterprise API</span>
                            <span class="badge bg-primary me-2">Custom Models</span>
                            <span class="badge bg-primary">Safety Features</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-6 mb-4">
                    <div class="content-card">
                        <h3>Claude 3 Model Family</h3>
                        <p>The latest generation of Anthropic's language models offering different capabilities and
                            price points:</p>
                        <ul>
                            <li><strong>Claude 3 Opus:</strong> Most powerful model for highly complex tasks</li>
                            <li><strong>Claude 3 Sonnet:</strong> Balanced intelligence and speed for enterprise
                                workloads</li>
                            <li><strong>Claude 3 Haiku:</strong> Fastest and most cost-effective model for simple tasks
                            </li>
                            <li><strong>200K Context Window:</strong> Ability to process large documents and
                                conversations</li>
                            <li><strong>Multimodal Capabilities:</strong> Vision and image understanding features</li>
                        </ul>
                        <div class="mt-3">
                            <span class="badge bg-success me-2">State-of-the-Art</span>
                            <span class="badge bg-success me-2">Enterprise Ready</span>
                            <span class="badge bg-success">Safety Focused</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="content-card">
                        <h3>Safety Research Initiatives</h3>
                        <p>Anthropic maintains a strong research focus on AI safety and alignment:</p>
                        <ul>
                            <li><strong>Interpretability Research:</strong> Understanding how neural networks work
                                internally</li>
                            <li><strong>Mechanistic Interpretability:</strong> Reverse-engineering neural networks</li>
                            <li><strong>Scalable Oversight:</strong> Techniques for supervising AI systems</li>
                            <li><strong>Red Teaming:</strong> Systematic testing for harmful capabilities</li>
                            <li><strong>Alignment Science:</strong> Mathematical foundations of AI alignment</li>
                        </ul>
                        <div class="mt-3">
                            <span class="badge bg-warning me-2 text-dark">Research Focus</span>
                            <span class="badge bg-warning me-2 text-dark">Safety First</span>
                            <span class="badge bg-warning text-dark">Open Science</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Safety & Differentiation Section -->
    <section class="py-5">
        <div class="container">
            <div class="section-header">
                <h2>Safety & Competitive Differentiation</h2>
                <p>How Anthropic's safety-first approach creates competitive advantages</p>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="content-card">
                        <h3>Constitutional AI vs RLHF</h3>
                        <p>Anthropic's Constitutional AI represents a fundamental shift from traditional Reinforcement
                            Learning from Human Feedback (RLHF):</p>

                        <div class="mb-3">
                            <h5>Constitutional AI</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 65%;"
                                    aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">Principles-Based Alignment
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h5>Traditional RLHF</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 35%;"
                                    aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">Human Feedback Alignment
                                </div>
                            </div>
                        </div>

                        <p class="mt-3"><strong>Key Advantage:</strong> Constitutional AI creates more consistent,
                            interpretable, and scalable alignment compared to traditional methods.</p>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="content-card">
                        <h3>Market Position Analysis</h3>
                        <canvas id="marketPositionChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="content-card">
                        <h3>Safety-First Competitive Advantages</h3>
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <div class="safety-feature text-center">
                                    <div class="safety-icon">
                                        <i class="fas fa-shield-alt"></i>
                                    </div>
                                    <h5>Trust & Reliability</h5>
                                    <p>Safety-focused approach builds enterprise trust and enables adoption in regulated
                                        industries</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="safety-feature text-center">
                                    <div class="safety-icon">
                                        <i class="fas fa-balance-scale"></i>
                                    </div>
                                    <h5>Regulatory Preparedness</h5>
                                    <p>Proactive safety research positions Anthropic favorably for upcoming AI
                                        regulations</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="safety-feature text-center">
                                    <div class="safety-icon">
                                        <i class="fas fa-chart-line"></i>
                                    </div>
                                    <h5>Long-Term Viability</h5>
                                    <p>Focus on alignment ensures sustainable growth as AI capabilities advance</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Market Position & Competition -->
    <section class="py-5" style="background: rgba(26, 77, 46, 0.3);">
        <div class="container">
            <div class="section-header">
                <h2>Market Position & Competition</h2>
                <p>Anthropic's standing in the competitive AI landscape</p>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="content-card">
                        <h3>Competitive Landscape</h3>
                        <p>Anthropic competes in the rapidly evolving large language model market:</p>

                        <div class="mb-3">
                            <h5>OpenAI</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 45%;"
                                    aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">Market Leader</div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h5>Anthropic</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 25%;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Safety-Focused Challenger
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h5>Google</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 15%;"
                                    aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">Gemini & PaLM</div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h5>Other Competitors</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-warning text-dark" role="progressbar" style="width: 15%;"
                                    aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">Cohere, AI21, etc.</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="content-card">
                        <h3>LLM Market Share</h3>
                        <canvas id="marketShareChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-4 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">#2</div>
                        <div class="stats-label">LLM Market Position</div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">85%</div>
                        <div class="stats-label">Enterprise Safety Preference</div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">2.5x</div>
                        <div class="stats-label">Valuation Growth (1995-2024)</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Investment Analysis Section -->
    <section id="investment-analysis" class="stock-charts-section">
        <div class="container">
            <div class="section-header">
                <h2>Investment Analysis</h2>
                <p>Comprehensive assessment of Anthropic as an AI safety investment</p>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="chart-container">
                        <h4 class="chart-title">Valuation Growth</h4>
                        <canvas id="valuationChart"></canvas>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="chart-container">
                        <h4 class="chart-title">Funding Rounds</h4>
                        <canvas id="fundingChart"></canvas>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="chart-container">
                        <h4 class="chart-title">Revenue Projection</h4>
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="chart-container">
                        <h4 class="chart-title">Enterprise AI Market Growth</h4>
                        <canvas id="enterpriseMarketChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="content-card">
                        <h3>Investment Thesis</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Bull Case</h5>
                                <ul>
                                    <li>Safety-focused approach creates strong enterprise differentiation</li>
                                    <li>Constitutional AI provides scalable alignment advantage</li>
                                    <li>Strong backing from Amazon and Google provides resources and distribution</li>
                                    <li>Positioned as regulatory-friendly alternative in tightening AI landscape</li>
                                    <li>Potential to capture premium enterprise market segment</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h5>Risk Factors</h5>
                                <ul>
                                    <li>Intense competition from well-funded incumbents (OpenAI, Google)</li>
                                    <li>High burn rate with significant compute costs</li>
                                    <li>Safety focus may limit capabilities compared to less constrained competitors
                                    </li>
                                    <li>Dependence on cloud partnerships for distribution and infrastructure</li>
                                    <li>Regulatory uncertainty affecting entire AI industry</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-4 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">$500M</div>
                        <div class="stats-label">Projected 2025 Revenue</div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">60%</div>
                        <div class="stats-label">Annual Growth Rate</div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">2026</div>
                        <div class="stats-label">Potential IPO Timeline</div>
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
                        <li><a href="nvidia" class="text-light">NVIDIA</a></li>
                        <li><a href="openai" class="text-light">OpenAI</a></li>
                        <li><a href="tesla" class="text-light">Tesla</a></li>
                        <li><a href="anthropic" class="text-light">Anthropic</a></li>
                        <li><a href="google" class="text-light">Google</a></li>
                        <li><a href="facebook" class="text-light">Facebook</a></li>
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

            <hr class="mt-4" style="border-color: rgba(107, 70, 193, 0.3);">

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
            // Market Position Chart
            const marketPositionCtx = document.getElementById('marketPositionChart').getContext('2d');
            new Chart(marketPositionCtx, {
                type: 'radar',
                data: {
                    labels: ['Safety', 'Performance', 'Enterprise Readiness', 'Innovation', 'Partnerships', 'Research'],
                    datasets: [{
                        label: 'Anthropic',
                        data: [95, 85, 80, 90, 75, 95],
                        backgroundColor: 'rgba(107, 70, 193, 0.2)',
                        borderColor: '#6b46c1',
                        pointBackgroundColor: '#6b46c1',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: '#6b46c1'
                    }, {
                        label: 'Industry Average',
                        data: [65, 75, 70, 80, 65, 70],
                        backgroundColor: 'rgba(60, 179, 113, 0.2)',
                        borderColor: '#3cb371',
                        pointBackgroundColor: '#3cb371',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: '#3cb371'
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            labels: {
                                color: '#e8f5e9'
                            }
                        }
                    },
                    scales: {
                        r: {
                            angleLines: {
                                color: 'rgba(232, 245, 233, 0.2)'
                            },
                            grid: {
                                color: 'rgba(232, 245, 233, 0.2)'
                            },
                            pointLabels: {
                                color: '#e8f5e9'
                            },
                            ticks: {
                                color: '#e8f5e9',
                                backdropColor: 'transparent'
                            }
                        }
                    }
                }
            });
            
            // Market Share Chart
            const marketShareCtx = document.getElementById('marketShareChart').getContext('2d');
            new Chart(marketShareCtx, {
                type: 'doughnut',
                data: {
                    labels: ['OpenAI', 'Anthropic', 'Google', 'Other Startups', 'Open Source'],
                    datasets: [{
                        data: [45, 25, 15, 10, 5],
                        backgroundColor: [
                            '#3cb371',
                            '#6b46c1',
                            '#4285F4',
                            '#FFA500',
                            '#6C757D'
                        ],
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
                        }
                    }
                }
            });
            
            // Valuation Growth Chart
            const valuationCtx = document.getElementById('valuationChart').getContext('2d');
            new Chart(valuationCtx, {
                type: 'line',
                data: {
                    labels: ['2021', '2022', '1995', '2024'],
                    datasets: [{
                        label: 'Valuation ($B)',
                        data: [1.2, 4.1, 4.5, 18.4],
                        borderColor: '#6b46c1',
                        backgroundColor: 'rgba(107, 70, 193, 0.1)',
                        borderWidth: 3,
                        tension: 0.3,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            labels: {
                                color: '#e8f5e9'
                            }
                        }
                    },
                    scales: {
                        y: {
                            grid: {
                                color: 'rgba(232, 245, 233, 0.1)'
                            },
                            ticks: {
                                color: '#e8f5e9'
                            }
                        },
                        x: {
                            grid: {
                                color: 'rgba(232, 245, 233, 0.1)'
                            },
                            ticks: {
                                color: '#e8f5e9'
                            }
                        }
                    }
                }
            });
            
            // Funding Chart
            const fundingCtx = document.getElementById('fundingChart').getContext('2d');
            new Chart(fundingCtx, {
                type: 'bar',
                data: {
                    labels: ['Series A', 'Series B', 'Series C', 'Series D'],
                    datasets: [{
                        label: 'Funding Raised ($M)',
                        data: [124, 580, 450, 4000],
                        backgroundColor: 'rgba(107, 70, 193, 0.7)',
                        borderColor: '#6b46c1',
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
                        }
                    },
                    scales: {
                        y: {
                            grid: {
                                color: 'rgba(232, 245, 233, 0.1)'
                            },
                            ticks: {
                                color: '#e8f5e9'
                            }
                        },
                        x: {
                            grid: {
                                color: 'rgba(232, 245, 233, 0.1)'
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
            new Chart(revenueCtx, {
                type: 'line',
                data: {
                    labels: ['1995', '2024', '2025', '2026', '2027'],
                    datasets: [{
                        label: 'Revenue ($M)',
                        data: [50, 150, 500, 1200, 2500],
                        borderColor: '#7cfc00',
                        backgroundColor: 'rgba(124, 252, 0, 0.1)',
                        borderWidth: 3,
                        tension: 0.3,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            labels: {
                                color: '#e8f5e9'
                            }
                        }
                    },
                    scales: {
                        y: {
                            grid: {
                                color: 'rgba(232, 245, 233, 0.1)'
                            },
                            ticks: {
                                color: '#e8f5e9'
                            }
                        },
                        x: {
                            grid: {
                                color: 'rgba(232, 245, 233, 0.1)'
                            },
                            ticks: {
                                color: '#e8f5e9'
                            }
                        }
                    }
                }
            });
            
            // Enterprise Market Chart
            const enterpriseMarketCtx = document.getElementById('enterpriseMarketChart').getContext('2d');
            new Chart(enterpriseMarketCtx, {
                type: 'bar',
                data: {
                    labels: ['1995', '2024', '2025', '2026', '2027', '2028'],
                    datasets: [{
                        label: 'Enterprise AI Market ($B)',
                        data: [50, 75, 110, 160, 230, 320],
                        backgroundColor: [
                            'rgba(107, 70, 193, 0.7)',
                            'rgba(107, 70, 193, 0.7)',
                            'rgba(107, 70, 193, 0.7)',
                            'rgba(107, 70, 193, 0.7)',
                            'rgba(107, 70, 193, 0.7)',
                            'rgba(107, 70, 193, 0.7)'
                        ],
                        borderColor: [
                            '#6b46c1',
                            '#6b46c1',
                            '#6b46c1',
                            '#6b46c1',
                            '#6b46c1',
                            '#6b46c1'
                        ],
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
                        }
                    },
                    scales: {
                        y: {
                            grid: {
                                color: 'rgba(232, 245, 233, 0.1)'
                            },
                            ticks: {
                                color: '#e8f5e9'
                            }
                        },
                        x: {
                            grid: {
                                color: 'rgba(232, 245, 233, 0.1)'
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cohere - AI Investment Analysis</title>
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
            --cohere-orange: #ff6b35;
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
            color: var(--cohere-orange);
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
            border-bottom: 1px solid var(--cohere-orange);
        }

        .navbar-brand {
            font-weight: bold;
            color: var(--cohere-orange) !important;
            font-size: 1.5rem;
        }

        .nav-link {
            color: var(--text-color) !important;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: var(--cohere-orange) !important;
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
            background: linear-gradient(to right, var(--cohere-orange), #ff8c42);
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
            border: 1px solid rgba(255, 107, 53, 0.3);
            height: 100%;
        }

        .company-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
            border-color: var(--cohere-orange);
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
            border-left: 4px solid var(--cohere-orange);
        }

        .stock-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--cohere-orange);
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
            color: var(--cohere-orange);
        }

        .section-header::after {
            content: '';
            display: block;
            width: 100px;
            height: 3px;
            background: var(--cohere-orange);
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
            border: 1px solid rgba(255, 107, 53, 0.3);
            height: 100%;
        }

        .chart-title {
            color: var(--cohere-orange);
            margin-bottom: 15px;
            font-size: 1.2rem;
        }

        /* Content Cards */
        .content-card {
            background: rgba(26, 77, 46, 0.7);
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 30px;
            border: 1px solid rgba(255, 107, 53, 0.3);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .content-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
            border-color: var(--cohere-orange);
        }

        .content-card h3 {
            color: var(--cohere-orange);
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
            border: 1px solid rgba(255, 107, 53, 0.3);
            text-align: center;
            transition: transform 0.3s;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            border-color: var(--cohere-orange);
        }

        .stats-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--cohere-orange);
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
            background: var(--cohere-orange);
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
            background: var(--cohere-orange);
        }

        .timeline-date {
            font-weight: bold;
            color: var(--cohere-orange);
            margin-bottom: 5px;
        }

        /* Footer */
        footer {
            background-color: rgba(10, 46, 26, 0.9);
            padding: 50px 0 20px;
            margin-top: 50px;
            border-top: 1px solid var(--cohere-orange);
        }

        .footer-heading {
            color: var(--cohere-orange);
            margin-bottom: 20px;
            font-size: 1.2rem;
        }

        /* Product Cards */
        .product-card {
            background: rgba(26, 77, 46, 0.7);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid rgba(255, 107, 53, 0.3);
            transition: transform 0.3s;
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-5px);
            border-color: var(--cohere-orange);
        }

        .product-card img {
            border-radius: 8px;
            margin-bottom: 15px;
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        /* Enterprise Focus Section */
        .enterprise-feature {
            background: rgba(26, 77, 46, 0.7);
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 20px;
            border: 1px solid rgba(255, 107, 53, 0.3);
            transition: transform 0.3s;
        }

        .enterprise-feature:hover {
            transform: translateY(-5px);
            border-color: var(--cohere-orange);
        }

        .enterprise-icon {
            font-size: 2.5rem;
            color: var(--cohere-orange);
            margin-bottom: 15px;
        }

        /* Use Cases Grid */
        .use-cases-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .use-case-item {
            background: rgba(26, 77, 46, 0.7);
            border-radius: 10px;
            padding: 20px;
            border: 1px solid rgba(255, 107, 53, 0.3);
            transition: transform 0.3s;
        }

        .use-case-item:hover {
            transform: translateY(-5px);
            border-color: var(--cohere-orange);
        }

        .use-case-icon {
            font-size: 2rem;
            color: var(--cohere-orange);
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

            .use-cases-grid {
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
                        <a class="nav-link dropdown-toggle" href="#" id="companiesDropdown" role="button"
                            data-bs-toggle="dropdown">
                            Companies
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="nvidia">NVIDIA</a></li>
                            <li><a class="dropdown-item" href="openai">OpenAI</a></li>
                            <li><a class="dropdown-item" href="tesla">Tesla</a></li>
                            <li><a class="dropdown-item" href="anthropic.html">Anthropic</a></li>
                            <li><a class="dropdown-item" href="stabilityai.html">Stability AI</a></li>
                            <li><a class="dropdown-item active" href="cohere.html">Cohere</a></li>
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
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="https://images.crunchbase.com/image/upload/c_pad,h_170,w_170,f_auto,b_white,q_auto:eco,dpr_1/v1491479959/kvqo9kfq9yqgxqjz5jzn.png"
                        alt="Cohere" class="company-logo mb-4" style="height: 80px;">
                    <h1 class="hero-title">Cohere</h1>
                    <p class="hero-subtitle">Enterprise-Grade AI Language Models for Business Transformation</p>
                    <div class="mt-4">
                        <a href="#investment-analysis" class="btn btn-primary btn-lg me-3">Investment Analysis</a>
                        <a href="#company-overview" class="btn btn-outline-light btn-lg">Company Overview</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="company-card">
                        <div class="stock-widget">
                            <div class="stock-price">$2.2B</div>
                            <div class="stock-change positive">Enterprise Focus <i class="fas fa-arrow-up"></i></div>
                            <small>Latest Valuation</small>
                        </div>
                        <div class="row mt-4">
                            <div class="col-6">
                                <div class="stats-card">
                                    <div class="stats-number">2019</div>
                                    <div class="stats-label">Founded</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stats-card">
                                    <div class="stats-number">$435M</div>
                                    <div class="stats-label">Total Funding</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stats-card">
                                    <div class="stats-number">300+</div>
                                    <div class="stats-label">Enterprise Customers</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stats-card">
                                    <div class="stats-number">Command R+</div>
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
                <p>Understanding Cohere's mission to bring enterprise-grade AI language capabilities to businesses</p>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="content-card">
                        <h3>About Cohere</h3>
                        <p>Cohere is an enterprise-focused AI company that develops large language models specifically
                            designed for business applications. Founded by former Google Brain researchers, Cohere
                            focuses on creating AI systems that understand, generate, and reason with language to solve
                            real-world business problems.</p>

                        <p>Unlike consumer-focused AI companies, Cohere specifically targets enterprise needs with
                            features like data privacy, custom model training, robust APIs, and industry-specific
                            solutions. The company's models power applications in customer service, content generation,
                            semantic search, and workflow automation for some of the world's largest companies.</p>

                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            alt="Enterprise AI Applications" class="img-fluid">

                        <h4 class="mt-4">Core Philosophy</h4>
                        <ul>
                            <li><strong>Enterprise-First Approach:</strong> Building AI specifically for business use
                                cases and requirements</li>
                            <li><strong>Data Privacy & Security:</strong> Ensuring enterprise data remains private and
                                secure</li>
                            <li><strong>Customization & Flexibility:</strong> Offering tailored solutions for specific
                                industry needs</li>
                            <li><strong>Production-Ready APIs:</strong> Providing robust, scalable infrastructure for
                                business applications</li>
                            <li><strong>Business Value Focus:</strong> Prioritizing ROI and measurable business outcomes
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="content-card">
                        <h3>Leadership Team</h3>
                        <div class="mb-4">
                            <h5>Aidan Gomez</h5>
                            <p class="mb-1"><strong>CEO & Co-founder</strong></p>
                            <p>Co-author of the landmark "Attention is All You Need" paper that introduced Transformers
                            </p>
                        </div>
                        <div class="mb-4">
                            <h5>Nick Frosst</h5>
                            <p class="mb-1"><strong>Co-founder</strong></p>
                            <p>Former Google Brain researcher specializing in neural networks and machine learning</p>
                        </div>
                        <div class="mb-4">
                            <h5>Ivan Zhang</h5>
                            <p class="mb-1"><strong>Co-founder</strong></p>
                            <p>Former Google engineer with expertise in scalable systems and infrastructure</p>
                        </div>
                        <div>
                            <h5>Martin Kon</h5>
                            <p class="mb-1"><strong>President & COO</strong></p>
                            <p>Former Bain & Company partner leading business operations and strategy</p>
                        </div>
                    </div>

                    <div class="content-card">
                        <h3>Major Investors</h3>
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4e/Inovia_Capital_logo.svg/1200px-Inovia_Capital_logo.svg.png"
                                alt="Inovia Capital"
                                style="height: 30px; margin-right: 10px; background: white; padding: 5px; border-radius: 4px;">
                            <div>
                                <strong>Inovia Capital</strong>
                                <div class="small">Lead Investor</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Index_Ventures_logo.svg/1200px-Index_Ventures_logo.svg.png"
                                alt="Index Ventures"
                                style="height: 30px; margin-right: 10px; background: white; padding: 5px; border-radius: 4px;">
                            <div>
                                <strong>Index Ventures</strong>
                                <div class="small">Series A & B Investor</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Tiger_Global_Management_logo.svg/1200px-Tiger_Global_Management_logo.svg.png"
                                alt="Tiger Global"
                                style="height: 30px; margin-right: 10px; background: white; padding: 5px; border-radius: 4px;">
                            <div>
                                <strong>Tiger Global</strong>
                                <div class="small">Series C Investor</div>
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
                        <div class="timeline-date">2019</div>
                        <p>Cohere founded by Aidan Gomez, Nick Frosst, and Ivan Zhang with focus on enterprise language
                            AI.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">June 2021</div>
                        <p>Raised $40M Series A funding led by Index Ventures to develop enterprise language models.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">February 2022</div>
                        <p>Launched Cohere Platform with first enterprise-grade language models and APIs.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">June 2022</div>
                        <p>Raised $125M Series B funding at $1.2B valuation co-led by Tiger Global and Inovia.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">December 2022</div>
                        <p>Announced partnership with Oracle to offer Cohere models on Oracle Cloud Infrastructure.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">June 2023</div>
                        <p>Raised $270M Series C funding at $2.2B valuation with participation from NVIDIA and Oracle.
                        </p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">September 2023</div>
                        <p>Launched Command model family with enhanced reasoning and instruction-following capabilities.
                        </p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">March 2024</div>
                        <p>Released Command R+, 104B parameter model optimized for enterprise RAG applications.</p>
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
                <p>Cohere's enterprise-focused AI language platform and models</p>
            </div>

            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="product-card">
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            alt="Cohere Platform">
                        <h4>Cohere Platform</h4>
                        <p>Comprehensive API platform offering access to Cohere's language models with enterprise-grade
                            security, scalability, and support for custom model training and fine-tuning.</p>
                        <div class="mt-3">
                            <span class="badge bg-primary me-2">Enterprise API</span>
                            <span class="badge bg-primary me-2">Custom Models</span>
                            <span class="badge bg-primary">Secure</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="product-card">
                        <img src="https://images.unsplash.com/photo-1677442136019-21780ecad995?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            alt="Command Models">
                        <h4>Command Model Family</h4>
                        <p>Advanced language models optimized for enterprise use cases with strong reasoning
                            capabilities, instruction following, and RAG (Retrieval Augmented Generation) support.</p>
                        <div class="mt-3">
                            <span class="badge bg-primary me-2">Command R+</span>
                            <span class="badge bg-primary me-2">Command R</span>
                            <span class="badge bg-primary">Command</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="product-card">
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            alt="Embed & Classify">
                        <h4>Embed & Classify</h4>
                        <p>Specialized models for semantic search, text classification, and content understanding that
                            power enterprise applications like recommendation systems and content moderation.</p>
                        <div class="mt-3">
                            <span class="badge bg-primary me-2">Embeddings</span>
                            <span class="badge bg-primary me-2">Classification</span>
                            <span class="badge bg-primary">Semantic Search</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-6 mb-4">
                    <div class="content-card">
                        <h3>Command R+ & RAG Optimization</h3>
                        <p>Cohere's flagship 104B parameter model specifically designed for enterprise RAG applications:
                        </p>
                        <ul>
                            <li><strong>Tool Use:</strong> Ability to call external tools and APIs</li>
                            <li><strong>RAG Optimization:</strong> Enhanced retrieval-augmented generation capabilities
                            </li>
                            <li><strong>Multilingual Support:</strong> Strong performance across 10+ languages</li>
                            <li><strong>128K Context:</strong> Large context window for complex documents</li>
                            <li><strong>Enterprise Security:</strong> Built with data privacy and security requirements
                            </li>
                        </ul>
                        <div class="mt-3">
                            <span class="badge bg-success me-2">RAG Optimized</span>
                            <span class="badge bg-success me-2">Tool Use</span>
                            <span class="badge bg-success">Multilingual</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="content-card">
                        <h3>Enterprise Solutions</h3>
                        <p>Cohere offers comprehensive solutions tailored to specific enterprise needs:</p>
                        <ul>
                            <li><strong>Custom Model Training:</strong> Fine-tuned models on enterprise data</li>
                            <li><strong>Dedicated Infrastructure:</strong> Private deployments and dedicated instances
                            </li>
                            <li><strong>Industry Solutions:</strong> Pre-built solutions for specific verticals</li>
                            <li><strong>Professional Services:</strong> Implementation and integration support</li>
                            <li><strong>Compliance & Security:</strong> SOC 2, GDPR, and enterprise security standards
                            </li>
                        </ul>
                        <div class="mt-3">
                            <span class="badge bg-warning me-2 text-dark">Custom Training</span>
                            <span class="badge bg-warning me-2 text-dark">Private Deployment</span>
                            <span class="badge bg-warning text-dark">Enterprise Support</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Use Cases Grid -->
            <div class="content-card mt-4">
                <h3>Enterprise Use Cases</h3>
                <p>Cohere's technology powers critical business applications across industries:</p>
                <div class="use-cases-grid">
                    <div class="use-case-item text-center">
                        <div class="use-case-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h5>Customer Service</h5>
                        <p>AI-powered chatbots and support automation with accurate, context-aware responses</p>
                    </div>
                    <div class="use-case-item text-center">
                        <div class="use-case-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h5>Semantic Search</h5>
                        <p>Advanced search and discovery across enterprise knowledge bases and documents</p>
                    </div>
                    <div class="use-case-item text-center">
                        <div class="use-case-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <h5>Content Generation</h5>
                        <p>Automated content creation for marketing, documentation, and communications</p>
                    </div>
                    <div class="use-case-item text-center">
                        <div class="use-case-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <h5>Data Analysis</h5>
                        <p>Extracting insights and summarizing information from business data and reports</p>
                    </div>
                    <div class="use-case-item text-center">
                        <div class="use-case-icon">
                            <i class="fas fa-robot"></i>
                        </div>
                        <h5>Workflow Automation</h5>
                        <p>Automating business processes and decision-making with AI assistance</p>
                    </div>
                    <div class="use-case-item text-center">
                        <div class="use-case-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h5>Content Moderation</h5>
                        <p>Automated moderation and classification of user-generated content</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Enterprise Focus & Differentiation Section -->
    <section class="py-5">
        <div class="container">
            <div class="section-header">
                <h2>Enterprise Focus & Competitive Differentiation</h2>
                <p>How Cohere's enterprise-first approach creates competitive advantages</p>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="content-card">
                        <h3>Enterprise vs Consumer Focus</h3>
                        <p>Cohere's strategic positioning compared to consumer-focused AI companies:</p>

                        <div class="mb-3">
                            <h5>Enterprise Requirements</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 85%;"
                                    aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">Security, Compliance,
                                    Customization</div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h5>Consumer Focus</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 45%;"
                                    aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">User Experience, Virality
                                </div>
                            </div>
                        </div>

                        <p class="mt-3"><strong>Key Advantage:</strong> Cohere's enterprise-first approach addresses
                            critical business requirements that consumer-focused companies often overlook.</p>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="content-card">
                        <h3>Enterprise LLM Market Share</h3>
                        <canvas id="marketShareChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="content-card">
                        <h3>Enterprise-First Competitive Advantages</h3>
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <div class="enterprise-feature text-center">
                                    <div class="enterprise-icon">
                                        <i class="fas fa-shield-alt"></i>
                                    </div>
                                    <h5>Security & Compliance</h5>
                                    <p>Built-in enterprise security features and compliance with industry regulations
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="enterprise-feature text-center">
                                    <div class="enterprise-icon">
                                        <i class="fas fa-cogs"></i>
                                    </div>
                                    <h5>Customization</h5>
                                    <p>Ability to fine-tune models on proprietary data for specific business needs</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="enterprise-feature text-center">
                                    <div class="enterprise-icon">
                                        <i class="fas fa-handshake"></i>
                                    </div>
                                    <h5>Enterprise Support</h5>
                                    <p>Dedicated support, SLAs, and professional services for business customers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Business Model & Market Position Section -->
    <section class="py-5" style="background: rgba(26, 77, 46, 0.3);">
        <div class="container">
            <div class="section-header">
                <h2>Business Model & Market Position</h2>
                <p>Cohere's revenue strategy and competitive landscape</p>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="content-card">
                        <h3>Revenue Model Breakdown</h3>
                        <p>Cohere employs a multi-tiered enterprise pricing strategy:</p>

                        <div class="mb-3">
                            <h5>API Usage & Subscriptions</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 55%;"
                                    aria-valuenow="55" aria-valuemin="0" aria-valuemax="100">Primary Revenue Source
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h5>Enterprise Contracts</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 30%;"
                                    aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">Large Enterprise Deals
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h5>Professional Services</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 10%;"
                                    aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">Implementation & Training
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h5>Partnership Revenue</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-warning text-dark" role="progressbar" style="width: 5%;"
                                    aria-valuenow="5" aria-valuemin="0" aria-valuemax="100">Channel Partnerships</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="content-card">
                        <h3>Revenue Projection</h3>
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-4 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">$45M</div>
                        <div class="stats-label">2023 Revenue</div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">$120M</div>
                        <div class="stats-label">2024 Projected Revenue</div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">167%</div>
                        <div class="stats-label">YoY Growth Rate</div>
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
                <p>Comprehensive assessment of Cohere as an enterprise AI investment</p>
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
                        <h4 class="chart-title">Customer Growth</h4>
                        <canvas id="customerGrowthChart"></canvas>
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
                                    <li>Clear enterprise focus addresses massive B2B AI market opportunity</li>
                                    <li>Strong technical founding team with deep AI research background</li>
                                    <li>Strategic partnerships with Oracle, NVIDIA, and Salesforce</li>
                                    <li>Proven ability to win large enterprise customers and contracts</li>
                                    <li>Focus on RAG and tool use aligns with enterprise AI adoption trends</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h5>Risk Factors</h5>
                                <ul>
                                    <li>Intense competition from well-funded AI companies (OpenAI, Anthropic)</li>
                                    <li>Cloud hyperscalers developing competing AI services (AWS, Azure, GCP)</li>
                                    <li>High burn rate with significant compute and talent costs</li>
                                    <li>Enterprise sales cycles can be long and complex</li>
                                    <li>Dependence on continued AI innovation and model improvements</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-4 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">$50B</div>
                        <div class="stats-label">Enterprise LLM Market by 2028</div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">25%</div>
                        <div class="stats-label">Projected Market Share</div>
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
                        <li><a href="index.html" class="text-light">Home</a></li>
                        <li><a href="about" class="text-light">About Us</a></li>
                        <li><a href="contact" class="text-light">Contact</a></li>
                        <li><a href="faq" class="text-light">FAQ</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 mb-4">
                    <h5 class="footer-heading">Companies</h5>
                    <ul class="list-unstyled">
                        <li><a href="nvidia" class="text-light">NVIDIA</a></li>
                        <li><a href="openai" class="text-light">OpenAI</a></li>
                        <li><a href="tesla" class="text-light">Tesla</a></li>
                        <li><a href="anthropic.html" class="text-light">Anthropic</a></li>
                        <li><a href="stabilityai.html" class="text-light">Stability AI</a></li>
                        <li><a href="cohere.html" class="text-light">Cohere</a></li>
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

            <hr class="mt-4" style="border-color: rgba(255, 107, 53, 0.3);">

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
            // Market Share Chart
            const marketShareCtx = document.getElementById('marketShareChart').getContext('2d');
            new Chart(marketShareCtx, {
                type: 'doughnut',
                data: {
                    labels: ['OpenAI', 'Cohere', 'Anthropic', 'Google', 'AWS', 'Other'],
                    datasets: [{
                        data: [35, 20, 15, 12, 10, 8],
                        backgroundColor: [
                            '#3cb371',
                            '#ff6b35',
                            '#6b46c1',
                            '#4285F4',
                            '#FF9900',
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
            
            // Revenue Chart
            const revenueCtx = document.getElementById('revenueChart').getContext('2d');
            new Chart(revenueCtx, {
                type: 'bar',
                data: {
                    labels: ['2022', '2023', '2024', '2025', '2026'],
                    datasets: [{
                        label: 'Revenue ($M)',
                        data: [8, 45, 120, 300, 600],
                        backgroundColor: 'rgba(255, 107, 53, 0.7)',
                        borderColor: '#ff6b35',
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
            
            // Valuation Chart
            const valuationCtx = document.getElementById('valuationChart').getContext('2d');
            new Chart(valuationCtx, {
                type: 'line',
                data: {
                    labels: ['2021', '2022', '2023', '2024'],
                    datasets: [{
                        label: 'Valuation ($B)',
                        data: [0.2, 1.2, 2.2, 5.0],
                        borderColor: '#ff6b35',
                        backgroundColor: 'rgba(255, 107, 53, 0.1)',
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
                    labels: ['Seed', 'Series A', 'Series B', 'Series C'],
                    datasets: [{
                        label: 'Funding Raised ($M)',
                        data: [5, 40, 125, 270],
                        backgroundColor: 'rgba(255, 107, 53, 0.7)',
                        borderColor: '#ff6b35',
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
            
            // Customer Growth Chart
            const customerGrowthCtx = document.getElementById('customerGrowthChart').getContext('2d');
            new Chart(customerGrowthCtx, {
                type: 'line',
                data: {
                    labels: ['Q1 2022', 'Q2 2022', 'Q3 2022', 'Q4 2022', 'Q1 2023', 'Q2 2023', 'Q3 2023', 'Q4 2023'],
                    datasets: [{
                        label: 'Enterprise Customers',
                        data: [25, 45, 70, 100, 150, 200, 250, 300],
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
                    labels: ['2023', '2024', '2025', '2026', '2027', '2028'],
                    datasets: [{
                        label: 'Enterprise LLM Market ($B)',
                        data: [8, 15, 25, 35, 42, 50],
                        backgroundColor: [
                            'rgba(255, 107, 53, 0.7)',
                            'rgba(255, 107, 53, 0.7)',
                            'rgba(255, 107, 53, 0.7)',
                            'rgba(255, 107, 53, 0.7)',
                            'rgba(255, 107, 53, 0.7)',
                            'rgba(255, 107, 53, 0.7)'
                        ],
                        borderColor: [
                            '#ff6b35',
                            '#ff6b35',
                            '#ff6b35',
                            '#ff6b35',
                            '#ff6b35',
                            '#ff6b35'
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hugging Face - AI Investment Analysis</title>
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
            --huggingface-yellow: #ffd333;
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
            color: var(--huggingface-yellow);
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
            border-bottom: 1px solid var(--huggingface-yellow);
        }
        
        .navbar-brand {
            font-weight: bold;
            color: var(--huggingface-yellow) !important;
            font-size: 1.5rem;
        }
        
        .nav-link {
            color: var(--text-color) !important;
            transition: color 0.3s;
        }
        
        .nav-link:hover {
            color: var(--huggingface-yellow) !important;
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
            background: linear-gradient(to right, var(--huggingface-yellow), #ffea80);
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
            border: 1px solid rgba(255, 211, 51, 0.3);
            height: 100%;
        }
        
        .company-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
            border-color: var(--huggingface-yellow);
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
            border-left: 4px solid var(--huggingface-yellow);
        }
        
        .stock-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--huggingface-yellow);
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
            color: var(--huggingface-yellow);
        }
        
        .section-header::after {
            content: '';
            display: block;
            width: 100px;
            height: 3px;
            background: var(--huggingface-yellow);
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
            border: 1px solid rgba(255, 211, 51, 0.3);
            height: 100%;
        }
        
        .chart-title {
            color: var(--huggingface-yellow);
            margin-bottom: 15px;
            font-size: 1.2rem;
        }
        
        /* Content Cards */
        .content-card {
            background: rgba(26, 77, 46, 0.7);
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 30px;
            border: 1px solid rgba(255, 211, 51, 0.3);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .content-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
            border-color: var(--huggingface-yellow);
        }
        
        .content-card h3 {
            color: var(--huggingface-yellow);
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
            border: 1px solid rgba(255, 211, 51, 0.3);
            text-align: center;
            transition: transform 0.3s;
        }
        
        .stats-card:hover {
            transform: translateY(-5px);
            border-color: var(--huggingface-yellow);
        }
        
        .stats-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--huggingface-yellow);
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
            background: var(--huggingface-yellow);
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
            background: var(--huggingface-yellow);
        }
        
        .timeline-date {
            font-weight: bold;
            color: var(--huggingface-yellow);
            margin-bottom: 5px;
        }
        
        /* Footer */
        footer {
            background-color: rgba(10, 46, 26, 0.9);
            padding: 50px 0 20px;
            margin-top: 50px;
            border-top: 1px solid var(--huggingface-yellow);
        }
        
        .footer-heading {
            color: var(--huggingface-yellow);
            margin-bottom: 20px;
            font-size: 1.2rem;
        }
        
        /* Product Cards */
        .product-card {
            background: rgba(26, 77, 46, 0.7);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid rgba(255, 211, 51, 0.3);
            transition: transform 0.3s;
            height: 100%;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            border-color: var(--huggingface-yellow);
        }
        
        .product-card img {
            border-radius: 8px;
            margin-bottom: 15px;
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        
        /* Platform Features */
        .platform-feature {
            background: rgba(26, 77, 46, 0.7);
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 20px;
            border: 1px solid rgba(255, 211, 51, 0.3);
            transition: transform 0.3s;
        }
        
        .platform-feature:hover {
            transform: translateY(-5px);
            border-color: var(--huggingface-yellow);
        }
        
        .platform-icon {
            font-size: 2.5rem;
            color: var(--huggingface-yellow);
            margin-bottom: 15px;
        }
        
        /* Community Metrics */
        .metrics-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        
        .metric-item {
            background: rgba(26, 77, 46, 0.7);
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            border: 1px solid rgba(255, 211, 51, 0.3);
            transition: transform 0.3s;
        }
        
        .metric-item:hover {
            transform: translateY(-5px);
            border-color: var(--huggingface-yellow);
        }
        
        .metric-number {
            font-size: 2rem;
            font-weight: bold;
            color: var(--huggingface-yellow);
            margin-bottom: 10px;
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
            
            .metrics-grid {
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
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
                <a class="navbar-brand" href="index">
                    <i class="fas fa-brain me-2"></i>TheSpace
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index">Home</a>
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
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="https://huggingface.co/front/assets/huggingface_logo-noborder.svg" alt="Hugging Face" class="company-logo mb-4" style="height: 80px;">
                    <h1 class="hero-title">Hugging Face</h1>
                    <p class="hero-subtitle">The AI Community Building the Future of Machine Learning Together</p>
                    <div class="mt-4">
                        <a href="#investment-analysis" class="btn btn-primary btn-lg me-3">Investment Analysis</a>
                        <a href="#company-overview" class="btn btn-outline-light btn-lg">Company Overview</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="company-card">
                        <div class="stock-widget">
                            <div class="stock-price">$4.5B</div>
                            <div class="stock-change positive">Community Driven <i class="fas fa-arrow-up"></i></div>
                            <small>Latest Valuation</small>
                        </div>
                        <div class="row mt-4">
                            <div class="col-6">
                                <div class="stats-card">
                                    <div class="stats-number">2016</div>
                                    <div class="stats-label">Founded</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stats-card">
                                    <div class="stats-number">$400M</div>
                                    <div class="stats-label">Total Funding</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stats-card">
                                    <div class="stats-number">1M+</div>
                                    <div class="stats-label">Models</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stats-card">
                                    <div class="stats-number">50K+</div>
                                    <div class="stats-label">Datasets</div>
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
                <p>Understanding Hugging Face's mission to democratize AI through community collaboration</p>
            </div>
            
            <div class="row">
                <div class="col-lg-8">
                    <div class="content-card">
                        <h3>About Hugging Face</h3>
                        <p>Hugging Face is the leading open-source platform for the machine learning community, providing tools and infrastructure to build, train, and deploy AI models. Started as a chatbot company, it pivoted to become the "GitHub of Machine Learning," creating the largest repository of AI models, datasets, and applications.</p>
                        
                        <p>The company's core product is the Hugging Face Hub, a platform where researchers and developers can share, discover, and collaborate on AI models. With over 1 million models and 50,000 datasets, Hugging Face has become the central hub for the global AI community, powering innovation across academia, startups, and enterprises.</p>
                        
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="AI Community Collaboration" class="img-fluid">
                        
                        <h4 class="mt-4">Core Philosophy</h4>
                        <ul>
                            <li><strong>Democratize AI:</strong> Make state-of-the-art AI accessible to everyone</li>
                            <li><strong>Community-First:</strong> Build through collaboration and open-source principles</li>
                            <li><strong>Interoperability:</strong> Create standards and tools that work across frameworks</li>
                            <li><strong>Open Science:</strong> Promote transparency and reproducibility in AI research</li>
                            <li><strong>Developer Experience:</strong> Build tools that make AI development easier and faster</li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="content-card">
                        <h3>Leadership Team</h3>
                        <div class="mb-4">
                            <h5>Clem Delangue</h5>
                            <p class="mb-1"><strong>CEO & Co-founder</strong></p>
                            <p>Former product manager who built Hugging Face from chatbot startup to AI platform leader</p>
                        </div>
                        <div class="mb-4">
                            <h5>Julien Chaumond</h5>
                            <p class="mb-1"><strong>CTO & Co-founder</strong></p>
                            <p>Leads technical vision and platform development, driving open-source AI innovation</p>
                        </div>
                        <div class="mb-4">
                            <h5>Thomas Wolf</h5>
                            <p class="mb-1"><strong>Chief Science Officer & Co-founder</strong></p>
                            <p>Former quantum physics researcher leading AI research and model development</p>
                        </div>
                        <div>
                            <h5>Margaret Jennings</h5>
                            <p class="mb-1"><strong>Chief Operating Officer</strong></p>
                            <p>Former Google executive overseeing operations, finance, and business strategy</p>
                        </div>
                    </div>
                    
                    <div class="content-card">
                        <h3>Major Investors</h3>
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Sequoia_Capital_logo.svg/1200px-Sequoia_Capital_logo.svg.png" alt="Sequoia Capital" style="height: 30px; margin-right: 10px; background: white; padding: 5px; border-radius: 4px;">
                            <div>
                                <strong>Sequoia Capital</strong>
                                <div class="small">Lead Investor</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Lux_Capital_logo.svg/1200px-Lux_Capital_logo.svg.png" alt="Lux Capital" style="height: 30px; margin-right: 10px; background: white; padding: 5px; border-radius: 4px;">
                            <div>
                                <strong>Lux Capital</strong>
                                <div class="small">Series A & B Investor</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Coat_of_arms_of_Google.svg/1200px-Coat_of_arms_of_Google.svg.png" alt="Google" style="height: 30px; margin-right: 10px; background: white; padding: 5px; border-radius: 4px;">
                            <div>
                                <strong>Google</strong>
                                <div class="small">Strategic Investor</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8c/Amazon_Web_Services_Logo.svg/1200px-Amazon_Web_Services_Logo.svg.png" alt="Amazon" style="height: 30px; margin-right: 10px;">
                            <div>
                                <strong>Amazon</strong>
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
                        <div class="timeline-date">March 2016</div>
                        <p>Hugging Face founded as a chatbot company creating AI-powered conversational agents for teenagers.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">2018</div>
                        <p>Pivoted to focus on open-source AI tools, releasing the Transformers library that would become industry standard.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">March 2019</div>
                        <p>Launched the Hugging Face Hub, creating a platform for sharing and discovering AI models.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">December 2020</div>
                        <p>Raised $40M Series B funding led by Addition, reaching 10,000+ models on the platform.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">May 2021</div>
                        <p>Launched Hugging Face Spaces, enabling easy deployment of AI demos and applications.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">April 2022</div>
                        <p>Raised $100M Series C funding at $2B valuation with participation from Sequoia and others.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">August 1995</div>
                        <p>Raised $235M Series D funding at $4.5B valuation with Google, Amazon, and others participating.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">2024</div>
                        <p>Platform reaches 1M+ models, 50K+ datasets, and becomes essential infrastructure for AI development.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Platform & Products Section -->
    <section class="py-5" style="background: rgba(26, 77, 46, 0.3);">
        <div class="container">
            <div class="section-header">
                <h2>Platform & Products</h2>
                <p>Hugging Face's comprehensive ecosystem for AI development</p>
            </div>
            
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="product-card">
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Hugging Face Hub">
                        <h4>Hugging Face Hub</h4>
                        <p>The central repository for AI models, datasets, and demos with over 1 million models. Enables discovery, collaboration, and deployment of AI assets.</p>
                        <div class="mt-3">
                            <span class="badge bg-primary me-2">1M+ Models</span>
                            <span class="badge bg-primary me-2">50K+ Datasets</span>
                            <span class="badge bg-primary">Community</span>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 mb-4">
                    <div class="product-card">
                        <img src="https://images.unsplash.com/photo-1677442136019-21780ecad995?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Transformers Library">
                        <h4>Transformers Library</h4>
                        <p>The industry-standard Python library for state-of-the-art machine learning, providing thousands of pretrained models for various AI tasks.</p>
                        <div class="mt-3">
                            <span class="badge bg-primary me-2">Python</span>
                            <span class="badge bg-primary me-2">PyTorch/TensorFlow</span>
                            <span class="badge bg-primary">SOTA Models</span>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 mb-4">
                    <div class="product-card">
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Hugging Face Spaces">
                        <h4>Spaces</h4>
                        <p>Platform for easily deploying, demoing, and discovering AI applications. Enables developers to share their work and users to try AI models instantly.</p>
                        <div class="mt-3">
                            <span class="badge bg-primary me-2">Deploy</span>
                            <span class="badge bg-primary me-2">Demo</span>
                            <span class="badge bg-primary">Discover</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mt-4">
                <div class="col-lg-6 mb-4">
                    <div class="content-card">
                        <h3>Enterprise Solutions</h3>
                        <p>Hugging Face provides enterprise-grade solutions for businesses:</p>
                        <ul>
                            <li><strong>Enterprise Hub:</strong> Private, secure platform for internal AI development</li>
                            <li><strong>Inference Endpoints:</strong> Scalable, managed deployment of AI models</li>
                            <li><strong>AutoTrain:</strong> Automated model training and fine-tuning</li>
                            <li><strong>Expert Acceleration Program:</strong> Dedicated support and consulting</li>
                            <li><strong>Security & Compliance:</strong> Enterprise-grade security features</li>
                        </ul>
                        <div class="mt-3">
                            <span class="badge bg-success me-2">Enterprise Hub</span>
                            <span class="badge bg-success me-2">Inference API</span>
                            <span class="badge bg-success">AutoTrain</span>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 mb-4">
                    <div class="content-card">
                        <h3>Developer Tools & Libraries</h3>
                        <p>Comprehensive toolkit for AI developers and researchers:</p>
                        <ul>
                            <li><strong>Datasets:</strong> Library for easily accessing and processing datasets</li>
                            <li><strong>Tokenizers:</strong> Fast, state-of-the-art tokenization</li>
                            <li><strong>Accelerate:</strong> Library for easy multi-GPU/TPU training</li>
                            <li><strong>Diffusers:</strong> State-of-the-art diffusion models</li>
                            <li><strong>Gradio:</strong> Library for building web demos of ML models</li>
                        </ul>
                        <div class="mt-3">
                            <span class="badge bg-warning me-2 text-dark">Datasets</span>
                            <span class="badge bg-warning me-2 text-dark">Tokenizers</span>
                            <span class="badge bg-warning text-dark">Diffusers</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Platform Features -->
            <div class="content-card mt-4">
                <h3>Platform Features & Capabilities</h3>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="platform-feature text-center">
                            <div class="platform-icon">
                                <i class="fas fa-code-branch"></i>
                            </div>
                            <h5>Model Versioning</h5>
                            <p>Git-like version control for machine learning models with full history and collaboration features</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="platform-feature text-center">
                            <div class="platform-icon">
                                <i class="fas fa-rocket"></i>
                            </div>
                            <h5>One-Click Deployment</h5>
                            <p>Deploy models to production with Inference Endpoints or serverless Inference API</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="platform-feature text-center">
                            <div class="platform-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <h5>Community Collaboration</h5>
                            <p>Collaborate on models, datasets, and applications with the global AI community</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Community & Ecosystem Section -->
    <section class="py-5">
        <div class="container">
            <div class="section-header">
                <h2>Community & Ecosystem</h2>
                <p>The power of Hugging Face's global AI community</p>
            </div>
            
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="content-card">
                        <h3>Community Growth Metrics</h3>
                        <p>Hugging Face has built the largest and most active AI community:</p>
                        
                        <div class="mb-3">
                            <h5>Model Repository Growth</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 95%;" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">1M+ Models</div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <h5>Developer Adoption</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">10,000+ Organizations</div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <h5>Enterprise Adoption</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">5,000+ Enterprise Customers</div>
                            </div>
                        </div>
                        
                        <p class="mt-3"><strong>Network Effect:</strong> Each new model and dataset makes the platform more valuable for all users.</p>
                    </div>
                </div>
                
                <div class="col-lg-6 mb-4">
                    <div class="content-card">
                        <h3>Community Metrics</h3>
                        <div class="metrics-grid">
                            <div class="metric-item">
                                <div class="metric-number">1M+</div>
                                <div class="stats-label">AI Models</div>
                            </div>
                            <div class="metric-item">
                                <div class="metric-number">50K+</div>
                                <div class="stats-label">Datasets</div>
                            </div>
                            <div class="metric-item">
                                <div class="metric-number">10K+</div>
                                <div class="stats-label">Organizations</div>
                            </div>
                            <div class="metric-item">
                                <div class="metric-number">100K+</div>
                                <div class="stats-label">Active Developers</div>
                            </div>
                            <div class="metric-item">
                                <div class="metric-number">5K+</div>
                                <div class="stats-label">Enterprise Customers</div>
                            </div>
                            <div class="metric-item">
                                <div class="metric-number">200+</div>
                                <div class="stats-label">Countries</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="content-card">
                        <h3>Strategic Partnerships</h3>
                        <p>Hugging Face partners with major technology companies to expand its ecosystem:</p>
                        <div class="row">
                            <div class="col-md-3 mb-3 text-center">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/1200px-Google_2015_logo.svg.png" alt="Google" style="height: 40px; margin-bottom: 10px;">
                                <h6>Google Cloud</h6>
                                <p class="small">Integration with GCP and collaboration on model development</p>
                            </div>
                            <div class="col-md-3 mb-3 text-center">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Microsoft_Azure.svg/1200px-Microsoft_Azure.svg.png" alt="Microsoft" style="height: 40px; margin-bottom: 10px;">
                                <h6>Microsoft Azure</h6>
                                <p class="small">Azure ML integration and enterprise deployment solutions</p>
                            </div>
                            <div class="col-md-3 mb-3 text-center">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8c/Amazon_Web_Services_Logo.svg/1200px-Amazon_Web_Services_Logo.svg.png" alt="AWS" style="height: 40px; margin-bottom: 10px;">
                                <h6>Amazon AWS</h6>
                                <p class="small">SageMaker integration and cloud infrastructure partnership</p>
                            </div>
                            <div class="col-md-3 mb-3 text-center">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3a/NVIDIA_logo.svg/1200px-NVIDIA_logo.svg.png" alt="NVIDIA" style="height: 40px; margin-bottom: 10px;">
                                <h6>NVIDIA</h6>
                                <p class="small">Optimization for GPUs and collaboration on AI infrastructure</p>
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
                <p>How Hugging Face monetizes its platform and ecosystem</p>
            </div>
            
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="content-card">
                        <h3>Revenue Model Breakdown</h3>
                        <p>Hugging Face employs a freemium model with multiple enterprise revenue streams:</p>
                        
                        <div class="mb-3">
                            <h5>Enterprise Subscriptions</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">Primary Revenue Source</div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <h5>Inference API & Endpoints</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Usage-Based Revenue</div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <h5>Professional Services</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 10%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">Consulting & Support</div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <h5>Partnership Revenue</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-warning text-dark" role="progressbar" style="width: 5%;" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100">Strategic Partnerships</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 mb-4">
                    <div class="content-card">
                        <h3>AI Platform Market Share</h3>
                        <canvas id="marketShareChart"></canvas>
                    </div>
                </div>
            </div>
            
            <div class="row mt-4">
                <div class="col-lg-4 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">$75M</div>
                        <div class="stats-label">1995 Revenue</div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">$150M</div>
                        <div class="stats-label">2024 Projected Revenue</div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">100%</div>
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
                <p>Comprehensive assessment of Hugging Face as an AI infrastructure investment</p>
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
                        <h4 class="chart-title">Funding History</h4>
                        <canvas id="fundingChart"></canvas>
                    </div>
                </div>
                
                <div class="col-lg-6 mb-4">
                    <div class="chart-container">
                        <h4 class="chart-title">Platform Growth Metrics</h4>
                        <canvas id="platformGrowthChart"></canvas>
                    </div>
                </div>
                
                <div class="col-lg-6 mb-4">
                    <div class="chart-container">
                        <h4 class="chart-title">AI Development Platform Market</h4>
                        <canvas id="platformMarketChart"></canvas>
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
                                    <li>Dominant platform position with massive network effects in AI ecosystem</li>
                                    <li>Essential infrastructure for AI development used by majority of researchers</li>
                                    <li>Multiple revenue streams from enterprise, inference, and partnerships</li>
                                    <li>Strong strategic partnerships with major cloud providers</li>
                                    <li>Community-driven innovation creates sustainable competitive advantage</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h5>Risk Factors</h5>
                                <ul>
                                    <li>Dependence on continued open-source community engagement</li>
                                    <li>Competition from cloud providers developing their own AI platforms</li>
                                    <li>Challenges monetizing free users while maintaining community trust</li>
                                    <li>High infrastructure costs for model hosting and inference services</li>
                                    <li>Need to continuously innovate to maintain platform leadership</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mt-4">
                <div class="col-lg-4 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">$25B</div>
                        <div class="stats-label">AI Platform Market by 2028</div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">40%</div>
                        <div class="stats-label">Projected Market Share</div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">2025</div>
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
                    <p>Harnessing the power of artificial intelligence to revolutionize investment strategies and portfolio management.</p>
                    <div class="mt-3">
                        <a href="#" class="text-light me-3"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-linkedin fa-lg"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-facebook fa-lg"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2 mb-4">
                    <h5 class="footer-heading">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="index" class="text-light">Home</a></li>
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
                        <li><a href="anthropic" class="text-light">Anthropic</a></li>
                        <li><a href="stabilityai" class="text-light">Stability AI</a></li>
                        <li><a href="huggingface" class="text-light">Hugging Face</a></li>
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
            
            <hr class="mt-4" style="border-color: rgba(255, 211, 51, 0.3);">
            
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
            // Market Share Chart
            const marketShareCtx = document.getElementById('marketShareChart').getContext('2d');
            new Chart(marketShareCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Hugging Face', 'GitHub', 'AWS SageMaker', 'Google AI Platform', 'Azure ML', 'Other'],
                    datasets: [{
                        data: [45, 20, 15, 10, 5, 5],
                        backgroundColor: [
                            '#ffd333',
                            '#6c757d',
                            '#FF9900',
                            '#4285F4',
                            '#0078D4',
                            '#adb5bd'
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
            
            // Valuation Chart
            const valuationCtx = document.getElementById('valuationChart').getContext('2d');
            new Chart(valuationCtx, {
                type: 'line',
                data: {
                    labels: ['2020', '2021', '2022', '1995', '2024'],
                    datasets: [{
                        label: 'Valuation ($B)',
                        data: [0.4, 2.0, 2.0, 4.5, 8.0],
                        borderColor: '#ffd333',
                        backgroundColor: 'rgba(255, 211, 51, 0.1)',
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
                    labels: ['Seed', 'Series A', 'Series B', 'Series C', 'Series D'],
                    datasets: [{
                        label: 'Funding Raised ($M)',
                        data: [15, 40, 40, 100, 235],
                        backgroundColor: 'rgba(255, 211, 51, 0.7)',
                        borderColor: '#ffd333',
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
            
            // Platform Growth Chart
            const platformGrowthCtx = document.getElementById('platformGrowthChart').getContext('2d');
            new Chart(platformGrowthCtx, {
                type: 'line',
                data: {
                    labels: ['2020', '2021', '2022', '1995', '2024'],
                    datasets: [{
                        label: 'Models (Thousands)',
                        data: [10, 50, 200, 500, 1000],
                        borderColor: '#7cfc00',
                        backgroundColor: 'rgba(124, 252, 0, 0.1)',
                        borderWidth: 3,
                        tension: 0.3,
                        fill: true
                    }, {
                        label: 'Datasets (Thousands)',
                        data: [5, 15, 25, 40, 50],
                        borderColor: '#3cb371',
                        backgroundColor: 'rgba(60, 179, 113, 0.1)',
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
            
            // Platform Market Chart
            const platformMarketCtx = document.getElementById('platformMarketChart').getContext('2d');
            new Chart(platformMarketCtx, {
                type: 'bar',
                data: {
                    labels: ['1995', '2024', '2025', '2026', '2027', '2028'],
                    datasets: [{
                        label: 'AI Development Platform Market ($B)',
                        data: [8, 12, 16, 20, 23, 25],
                        backgroundColor: [
                            'rgba(255, 211, 51, 0.7)',
                            'rgba(255, 211, 51, 0.7)',
                            'rgba(255, 211, 51, 0.7)',
                            'rgba(255, 211, 51, 0.7)',
                            'rgba(255, 211, 51, 0.7)',
                            'rgba(255, 211, 51, 0.7)'
                        ],
                        borderColor: [
                            '#ffd333',
                            '#ffd333',
                            '#ffd333',
                            '#ffd333',
                            '#ffd333',
                            '#ffd333'
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
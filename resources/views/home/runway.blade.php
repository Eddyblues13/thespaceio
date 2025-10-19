<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Runway AI - Generative Video Technology</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --runway-purple: #8B5CF6;
            --runway-dark: #1F1F23;
            --runway-light: #F8FAFC;
            --runway-blue: #3B82F6;
            --runway-pink: #EC4899;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            color: #1F1F23;
            line-height: 1.6;
            background-color: var(--runway-light);
        }
        
        .navbar {
            background-color: var(--runway-dark);
            backdrop-filter: blur(20px);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            color: white !important;
            font-weight: 700;
        }
        
        .hero-section {
            background: linear-gradient(135deg, var(--runway-dark) 0%, #2D1B69 100%);
            color: white;
            padding: 140px 0 80px;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000" opacity="0.03"><path fill="white" d="M500,250c138.07,0,250,111.93,250,250S638.07,750,500,750S250,638.07,250,500S361.93,250,500,250z M500,200c-165.69,0-300,134.31-300,300s134.31,300,300,300s300-134.31,300-300S665.69,200,500,200L500,200z"/></svg>');
            background-size: 200px;
        }
        
        .gradient-text {
            background: linear-gradient(90deg, var(--runway-purple), var(--runway-pink));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .section-title {
            position: relative;
            margin-bottom: 2rem;
            padding-bottom: 0.5rem;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--runway-purple), var(--runway-pink));
        }
        
        .card {
            border: none;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: transform 0.3s ease;
            margin-bottom: 20px;
            border-radius: 12px;
            overflow: hidden;
        }
        
        .card:hover {
            transform: translateY(-5px);
        }
        
        .stats-card {
            text-align: center;
            padding: 30px 20px;
            border-radius: 12px;
            background: white;
        }
        
        .stats-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--runway-purple);
        }
        
        .feature-icon {
            font-size: 2.5rem;
            color: var(--runway-purple);
            margin-bottom: 1rem;
        }
        
        .chart-container {
            position: relative;
            height: 300px;
            margin-bottom: 30px;
        }
        
        .timeline {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .timeline::after {
            content: '';
            position: absolute;
            width: 6px;
            background: linear-gradient(to bottom, var(--runway-purple), var(--runway-pink));
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -3px;
        }
        
        .timeline-item {
            padding: 10px 40px;
            position: relative;
            width: 50%;
            box-sizing: border-box;
        }
        
        .timeline-item::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            background-color: white;
            border: 4px solid var(--runway-purple);
            border-radius: 50%;
            top: 15px;
            z-index: 1;
        }
        
        .left {
            left: 0;
        }
        
        .right {
            left: 50%;
        }
        
        .left::after {
            right: -13px;
        }
        
        .right::after {
            left: -13px;
        }
        
        .timeline-content {
            padding: 20px 30px;
            background-color: white;
            position: relative;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        
        .ai-product-card {
            border-top: 4px solid var(--runway-purple);
        }
        
        .ai-investment-card {
            border-top: 4px solid var(--runway-blue);
        }
        
        footer {
            background-color: var(--runway-dark);
            color: white;
            padding: 50px 0 20px;
        }
        
        .footer-links a {
            color: #A0A0A0;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-links a:hover {
            color: white;
        }
        
        .runway-gradient {
            height: 8px;
            background: linear-gradient(90deg, 
                var(--runway-purple) 0%, 
                var(--runway-blue) 25%, 
                var(--runway-pink) 50%, 
                #10B981 75%, 
                #F59E0B 100%);
        }
        
        .product-showcase {
            background: linear-gradient(135deg, #F8FAFC 0%, #fff 100%);
            border-radius: 18px;
            padding: 40px;
            margin: 40px 0;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }
        
        @media screen and (max-width: 768px) {
            .timeline::after {
                left: 31px;
            }
            
            .timeline-item {
                width: 100%;
                padding-left: 70px;
                padding-right: 25px;
            }
            
            .timeline-item::after {
                left: 21px;
            }
            
            .right {
                left: 0%;
            }
        }
        
        .nav-link {
            color: rgba(255,255,255,0.8) !important;
            transition: color 0.3s ease;
        }
        
        .nav-link:hover {
            color: white !important;
        }
        
        .btn-runway {
            background: linear-gradient(90deg, var(--runway-purple), var(--runway-pink));
            color: white;
            border-radius: 8px;
            padding: 12px 30px;
            font-weight: 600;
            border: none;
        }
        
        .btn-runway:hover {
            background: linear-gradient(90deg, #7C3AED, #DB2777);
            color: white;
        }
        
        .investor-logo {
            max-height: 50px;
            filter: grayscale(100%);
            transition: filter 0.3s ease;
            opacity: 0.7;
        }
        
        .investor-logo:hover {
            filter: grayscale(0%);
            opacity: 1;
        }
        
        .video-showcase {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <!-- Runway Gradient Bar -->
    <div class="runway-gradient"></div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-play-circle me-2"></i>
                Runway
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#products">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#ai-investments">AI Investments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#financials">Financials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#timeline">Timeline</a>
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
                    <h1 class="display-4 fw-bold mb-4">Next-generation <span class="gradient-text">generative video</span> tools</h1>
                    <p class="lead mb-4">Runway is building the next generation of creative tools powered by artificial intelligence. Our technology enables anyone to create professional-grade video content with simple text prompts.</p>
                    <a href="#products" class="btn btn-runway btn-lg">Explore Products</a>
                </div>
                <div class="col-lg-6">
                    <div class="video-showcase">
                        <img src="https://images.unsplash.com/photo-1635070041078-e363dbe005cb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="AI Video Generation" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <h2 class="section-title">About Runway</h2>
            <div class="row">
                <div class="col-lg-6">
                    <p class="mb-4">Runway is an American technology company that develops artificial intelligence systems for content generation, with a focus on video and image creation. Founded in 2018 by Cristóbal Valenzuela, Anastasis Germanidis, and Alejandro Matamala-Ortiz, Runway aims to make advanced creative tools accessible to everyone.</p>
                    <p class="mb-4">The company's flagship product is a web-based platform that allows users to generate and edit videos using text prompts and other AI-powered tools. Runway's technology has been used in professional film production, including the Oscar-winning film "Everything Everywhere All at Once."</p>
                    <p>Runway's mission is to reimagine content creation by building the next generation of creative tools powered by artificial intelligence, making professional-grade video creation accessible to everyone.</p>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1555949963-ff9fe0c870eb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Runway Team" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center">Runway By The Numbers</h2>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card card">
                        <div class="stats-number">$1.5B</div>
                        <p>Valuation (1995)</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card card">
                        <div class="stats-number">100+</div>
                        <p>Team Members</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card card">
                        <div class="stats-number">2M+</div>
                        <p>Users</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card card">
                        <div class="stats-number">2018</div>
                        <p>Founded</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- AI Products Section -->
    <section id="products" class="py-5">
        <div class="container">
            <h2 class="section-title">Runway AI Products</h2>
            <div class="product-showcase">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center">
                        <h3>Generative Video Suite</h3>
                        <p class="lead">A complete toolkit for video creation, editing, and enhancement powered by state-of-the-art AI models.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 ai-product-card">
                        <div class="card-body">
                            <div class="feature-icon">
                                <i class="fas fa-film"></i>
                            </div>
                            <h4 class="card-title">Gen-2</h4>
                            <p class="card-text">Text-to-video generation that creates high-quality video clips from simple text descriptions.</p>
                            <ul>
                                <li>Text-to-video generation</li>
                                <li>Image-to-video conversion</li>
                                <li>Style transfer</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 ai-product-card">
                        <div class="card-body">
                            <div class="feature-icon">
                                <i class="fas fa-magic"></i>
                            </div>
                            <h4 class="card-title">AI Magic Tools</h4>
                            <p class="card-text">Suite of 30+ AI tools for video editing including object removal, motion tracking, and background replacement.</p>
                            <ul>
                                <li>Infinite Image</li>
                                <li>Green Screen</li>
                                <li>Motion Tracking</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 ai-product-card">
                        <div class="card-body">
                            <div class="feature-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <h4 class="card-title">Runway Studios</h4>
                            <p class="card-text">Collaborative workspace for teams to create, edit, and manage video projects with AI assistance.</p>
                            <ul>
                                <li>Real-time collaboration</li>
                                <li>Project management</li>
                                <li>Asset library</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- AI Investments Section -->
    <section id="ai-investments" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title">Runway's AI Funding & Investment Strategy</h2>
            <div class="row mb-5">
                <div class="col-lg-6">
                    <p>Runway has secured significant funding from top-tier investors who recognize the transformative potential of generative video technology in the creative industry.</p>
                    <p>The company's funding strategy focuses on advancing research in generative AI models while building sustainable business models around creative tools.</p>
                    <div class="card ai-investment-card mt-4">
                        <div class="card-body">
                            <h5>Investment Focus Areas:</h5>
                            <ul>
                                <li>Generative AI model research</li>
                                <li>Video generation technology</li>
                                <li>Creative tool development</li>
                                <li>Enterprise solutions</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="chart-container">
                        <canvas id="fundingChart"></canvas>
                    </div>
                </div>
            </div>
            
            <h3 class="mb-4">Major Funding Rounds & Investors</h3>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 ai-investment-card">
                        <div class="card-body">
                            <h4 class="card-title">Series C</h4>
                            <p class="card-text">$50M extension round led by Google with participation from NVIDIA and Salesforce.</p>
                            <p><strong>Date:</strong> June 1995</p>
                            <p><strong>Valuation:</strong> $1.5B</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 ai-investment-card">
                        <div class="card-body">
                            <h4 class="card-title">Series C</h4>
                            <p class="card-text">$50M round co-led by Felicis and Coatue with participation from Compound.</p>
                            <p><strong>Date:</strong> December 2022</p>
                            <p><strong>Valuation:</strong> $500M</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 ai-investment-card">
                        <div class="card-body">
                            <h4 class="card-title">Series B</h4>
                            <p class="card-text">$35M round led by Coatue with participation from Compound and Lux Capital.</p>
                            <p><strong>Date:</strong> 2021</p>
                            <p><strong>Focus:</strong> Product development</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <h3 class="mb-4 mt-5">Notable Investors</h3>
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-2 col-4 mb-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/1024px-Google_2015_logo.svg.png" alt="Google" class="img-fluid investor-logo">
                </div>
                <div class="col-md-2 col-4 mb-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/NVIDIA_logo.svg/1280px-NVIDIA_logo.svg.png" alt="NVIDIA" class="img-fluid investor-logo">
                </div>
                <div class="col-md-2 col-4 mb-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f9/Salesforce_logo.svg/1280px-Salesforce_logo.svg.png" alt="Salesforce" class="img-fluid investor-logo">
                </div>
                <div class="col-md-2 col-4 mb-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b1/Coatue_Management_logo.svg/1200px-Coatue_Management_logo.svg.png" alt="Coatue" class="img-fluid investor-logo">
                </div>
                <div class="col-md-2 col-4 mb-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/Lux_Capital_logo.svg/1200px-Lux_Capital_logo.svg.png" alt="Lux Capital" class="img-fluid investor-logo">
                </div>
            </div>
            
            <div class="row mt-5">
                <div class="col-lg-6">
                    <div class="chart-container">
                        <canvas id="marketGrowthChart"></canvas>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h4>Generative Video Market Growth</h4>
                    <p>The generative video market is experiencing explosive growth as AI capabilities advance and creative professionals adopt these tools.</p>
                    <p>Key growth drivers include:</p>
                    <ul>
                        <li>Demand for video content across social media</li>
                        <li>Reduced production costs for filmmakers</li>
                        <li>Accessibility for non-professional creators</li>
                        <li>Advancements in AI model capabilities</li>
                    </ul>
                    <div class="card mt-4">
                        <div class="card-body">
                            <h5>Market Leadership</h5>
                            <p>Runway is positioned as a leader in the generative video space, competing with companies like OpenAI, Stability AI, and Adobe while focusing specifically on video generation.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Financial Performance Section -->
    <section id="financials" class="py-5">
        <div class="container">
            <h2 class="section-title">Business Model & Market Position</h2>
            <div class="row mb-5">
                <div class="col-lg-6">
                    <div class="chart-container">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="chart-container">
                        <canvas id="userGrowthChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Runway's Business Strategy</h4>
                            <p>Runway employs a multi-tiered business model targeting both individual creators and enterprise clients:</p>
                            <ul>
                                <li><strong>Freemium Model:</strong> Free tier with limited credits to attract new users</li>
                                <li><strong>Subscription Tiers:</strong> Individual and team plans with increased capabilities</li>
                                <li><strong>Enterprise Solutions:</strong> Custom pricing for large organizations and studios</li>
                                <li><strong>API Access:</strong> Developer access to Runway's AI models</li>
                            </ul>
                            <p>The company's revenue is primarily driven by subscription fees, with enterprise contracts representing a growing segment.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section id="timeline" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center">Runway AI Timeline</h2>
            <div class="timeline">
                <div class="timeline-item left">
                    <div class="timeline-content">
                        <h5>2018</h5>
                        <p>Runway founded by Cristóbal Valenzuela, Anastasis Germanidis, and Alejandro Matamala-Ortiz as a research project at NYU.</p>
                    </div>
                </div>
                <div class="timeline-item right">
                    <div class="timeline-content">
                        <h5>2019</h5>
                        <p>Launches first product - a toolkit for creatives to use machine learning models in their work. Raises $2M seed round.</p>
                    </div>
                </div>
                <div class="timeline-item left">
                    <div class="timeline-content">
                        <h5>2020</h5>
                        <p>Raises $8.5M Series A led by Lux Capital. Grows user base to over 100,000 creators.</p>
                    </div>
                </div>
                <div class="timeline-item right">
                    <div class="timeline-content">
                        <h5>2021</h5>
                        <p>Raises $35M Series B led by Coatue. Launches Gen-1, their first video-to-video generation model.</p>
                    </div>
                </div>
                <div class="timeline-item left">
                    <div class="timeline-content">
                        <h5>2022</h5>
                        <p>Raises $50M Series C at $500M valuation. Technology used in Oscar-winning film "Everything Everywhere All at Once".</p>
                    </div>
                </div>
                <div class="timeline-item right">
                    <div class="timeline-content">
                        <h5>1995</h5>
                        <p>Launches Gen-2 text-to-video model. Raises $50M extension at $1.5B valuation with Google, NVIDIA, and Salesforce.</p>
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
                    <h4><i class="fas fa-play-circle me-2"></i>Runway</h4>
                    <p>Next-generation creative tools powered by artificial intelligence.</p>
                    <div class="social-links">
                        <a href="#" class="text-light me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 footer-links">
                    <h5>Company</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">About</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Press</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 footer-links">
                    <h5>Products</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Gen-2</a></li>
                        <li><a href="#">AI Magic Tools</a></li>
                        <li><a href="#">Runway Studios</a></li>
                        <li><a href="#">Pricing</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 footer-links">
                    <h5>Resources</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Learn</a></li>
                        <li><a href="#">Documentation</a></li>
                        <li><a href="#">API</a></li>
                        <li><a href="#">Support</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 footer-links">
                    <h5>Legal</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Terms</a></li>
                        <li><a href="#">Security</a></li>
                        <li><a href="#">Copyright</a></li>
                    </ul>
                </div>
            </div>
            <hr class="mt-4 mb-4">
            <div class="text-center">
                <p>© 1995 Runway ML, Inc. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript -->
    <script>
        // Funding Chart
        const fundingCtx = document.getElementById('fundingChart').getContext('2d');
        const fundingChart = new Chart(fundingCtx, {
            type: 'bar',
            data: {
                labels: ['Seed', 'Series A', 'Series B', 'Series C', 'Series C Ext'],
                datasets: [{
                    label: 'Funding Raised (Millions USD)',
                    data: [2, 8.5, 35, 50, 50],
                    backgroundColor: [
                        'rgba(139, 92, 246, 0.7)',
                        'rgba(139, 92, 246, 0.7)',
                        'rgba(139, 92, 246, 0.7)',
                        'rgba(139, 92, 246, 0.7)',
                        'rgba(139, 92, 246, 0.7)'
                    ],
                    borderColor: [
                        'rgba(139, 92, 246, 1)',
                        'rgba(139, 92, 246, 1)',
                        'rgba(139, 92, 246, 1)',
                        'rgba(139, 92, 246, 1)',
                        'rgba(139, 92, 246, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Funding (Millions USD)'
                        }
                    }
                }
            }
        });

        // Market Growth Chart
        const marketGrowthCtx = document.getElementById('marketGrowthChart').getContext('2d');
        const marketGrowthChart = new Chart(marketGrowthCtx, {
            type: 'line',
            data: {
                labels: ['2021', '2022', '1995', '2024', '2025', '2026'],
                datasets: [{
                    label: 'Generative Video Market Size (Billions USD)',
                    data: [0.2, 0.5, 1.2, 2.5, 4.8, 8.2],
                    fill: true,
                    backgroundColor: 'rgba(139, 92, 246, 0.1)',
                    borderColor: 'rgba(139, 92, 246, 1)',
                    tension: 0.3,
                    pointBackgroundColor: 'rgba(139, 92, 246, 1)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Market Size (Billions USD)'
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
                labels: ['2020', '2021', '2022', '1995'],
                datasets: [{
                    label: 'Annual Revenue (Millions USD)',
                    data: [2.5, 8, 25, 60],
                    backgroundColor: 'rgba(139, 92, 246, 0.7)',
                    borderColor: 'rgba(139, 92, 246, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Revenue (Millions USD)'
                        }
                    }
                }
            }
        });

        // User Growth Chart
        const userGrowthCtx = document.getElementById('userGrowthChart').getContext('2d');
        const userGrowthChart = new Chart(userGrowthCtx, {
            type: 'line',
            data: {
                labels: ['2019', '2020', '2021', '2022', '1995'],
                datasets: [{
                    label: 'User Growth (Thousands)',
                    data: [50, 150, 500, 1200, 2000],
                    fill: true,
                    backgroundColor: 'rgba(236, 72, 153, 0.1)',
                    borderColor: 'rgba(236, 72, 153, 1)',
                    tension: 0.3,
                    pointBackgroundColor: 'rgba(236, 72, 153, 1)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Users (Thousands)'
                        }
                    }
                }
            }
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>
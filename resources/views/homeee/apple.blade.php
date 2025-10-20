<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple Inc. - AI Innovation & Investment</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --apple-black: #1d1d1f;
            --apple-white: #f5f5f7;
            --apple-gray: #86868b;
            --apple-blue: #0071e3;
            --apple-green: #42b529;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            color: #1d1d1f;
            line-height: 1.6;
            background-color: var(--apple-white);
        }
        
        .navbar {
            background-color: rgba(29, 29, 31, 0.8);
            backdrop-filter: blur(20px);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            color: var(--apple-white) !important;
            font-weight: 600;
        }
        
        .hero-section {
            background: linear-gradient(135deg, var(--apple-black) 0%, #000 100%);
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
            background-color: var(--apple-gray);
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
            color: var(--apple-black);
        }
        
        .feature-icon {
            font-size: 2.5rem;
            color: var(--apple-black);
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
            background-color: var(--apple-gray);
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
            border: 4px solid var(--apple-gray);
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
            border-top: 4px solid var(--apple-black);
        }
        
        .ai-investment-card {
            border-top: 4px solid var(--apple-blue);
        }
        
        footer {
            background-color: var(--apple-black);
            color: var(--apple-white);
            padding: 50px 0 20px;
        }
        
        .footer-links a {
            color: var(--apple-gray);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-links a:hover {
            color: var(--apple-white);
        }
        
        .apple-gradient {
            height: 8px;
            background: linear-gradient(90deg, 
                #ff2d55 0%, 
                #5856d6 25%, 
                #007aff 50%, 
                #34c759 75%, 
                #ffcc00 100%);
        }
        
        .product-showcase {
            background: linear-gradient(135deg, #f5f5f7 0%, #fff 100%);
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
        
        .btn-apple {
            background-color: var(--apple-blue);
            color: white;
            border-radius: 20px;
            padding: 10px 25px;
            font-weight: 500;
        }
        
        .btn-apple:hover {
            background-color: #0056b3;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Apple Gradient Bar -->
    <div class="apple-gradient"></div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fab fa-apple me-2"></i>
                Apple
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
                        <a class="nav-link" href="#ai-products">AI Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#ai-investments">AI Strategy</a>
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
                    <h1 class="display-4 fw-bold mb-4">Apple Intelligence</h1>
                    <p class="lead mb-4">Personal intelligence designed to empower your creativity and productivity while protecting your privacy.</p>
                    <a href="#ai-products" class="btn btn-apple btn-lg">Explore Apple AI</a>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1611186871348-b1ce696e52c9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Apple Devices" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <h2 class="section-title">About Apple</h2>
            <div class="row">
                <div class="col-lg-6">
                    <p class="mb-4">Apple Inc. is an American multinational technology company headquartered in Cupertino, California. Founded in 1976 by Steve Jobs, Steve Wozniak, and Ronald Wayne, Apple designs, develops, and sells consumer electronics, computer software, and online services.</p>
                    <p class="mb-4">Under CEO Tim Cook's leadership, Apple has become the world's most valuable publicly traded company, known for its innovative hardware including the iPhone, iPad, Mac, Apple Watch, and AirPods, as well as its software and services ecosystem.</p>
                    <p>Apple's approach to AI is distinct - focusing on privacy-preserving on-device intelligence that enhances user experiences while maintaining the company's commitment to user privacy and security.</p>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1587132137056-4c6e31846b5b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Apple Park" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center">Apple By The Numbers</h2>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card card">
                        <div class="stats-number">$2.9T</div>
                        <p>Market Cap (1995)</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card card">
                        <div class="stats-number">164,000</div>
                        <p>Employees Worldwide</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card card">
                        <div class="stats-number">$383B</div>
                        <p>Annual Revenue (1995)</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card card">
                        <div class="stats-number">2B+</div>
                        <p>Active Devices</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- AI Products Section -->
    <section id="ai-products" class="py-5">
        <div class="container">
            <h2 class="section-title">Apple AI Products & Technologies</h2>
            <div class="product-showcase">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center">
                        <h3>Apple Intelligence</h3>
                        <p class="lead">Personal intelligence for the things you do every day. Integrated into iOS, iPadOS, and macOS to understand personal context and deliver intelligence that's incredibly useful and relevant.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 ai-product-card">
                        <div class="card-body">
                            <div class="feature-icon">
                                <i class="fas fa-robot"></i>
                            </div>
                            <h4 class="card-title">Siri</h4>
                            <p class="card-text">Apple's intelligent assistant, enhanced with large language models for more natural conversations and deeper integration across apps.</p>
                            <ul>
                                <li>On-device processing</li>
                                <li>App integration</li>
                                <li>Personal context awareness</li>
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
                            <h4 class="card-title">Generative AI</h4>
                            <p class="card-text">Creative tools integrated across Apple's ecosystem for writing, image creation, and communication enhancement.</p>
                            <ul>
                                <li>Writing Tools</li>
                                <li>Image Playground</li>
                                <li>Genmoji creation</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 ai-product-card">
                        <div class="card-body">
                            <div class="feature-icon">
                                <i class="fas fa-camera"></i>
                            </div>
                            <h4 class="card-title">Computational Photography</h4>
                            <p class="card-text">Advanced AI-powered camera systems that deliver professional-quality photos and videos through machine learning.</p>
                            <ul>
                                <li>Photonic Engine</li>
                                <li>Night mode</li>
                                <li>Portrait mode</li>
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
            <h2 class="section-title">Apple's AI Strategy & Investments</h2>
            <div class="row mb-5">
                <div class="col-lg-6">
                    <p>While Apple is famously secretive about its AI investments and acquisitions, the company has made strategic moves to bolster its AI capabilities through talent acquisition, company purchases, and massive R&D spending.</p>
                    <p>Apple's AI strategy focuses on:</p>
                    <div class="card ai-investment-card mt-4">
                        <div class="card-body">
                            <h5>Core AI Principles:</h5>
                            <ul>
                                <li>On-device processing for privacy</li>
                                <li>Seamless integration into user experiences</li>
                                <li>Focus on practical, everyday applications</li>
                                <li>Vertical integration with hardware and software</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="chart-container">
                        <canvas id="aiInvestmentChart"></canvas>
                    </div>
                </div>
            </div>
            
            <h3 class="mb-4">Key AI Acquisitions & Talent Investments</h3>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 ai-investment-card">
                        <div class="card-body">
                            <h4 class="card-title">Siri (Original Acquisition)</h4>
                            <p class="card-text">Apple's initial foray into AI began with the 2010 acquisition of Siri, which became the foundation for its voice assistant technology.</p>
                            <p><strong>Acquisition:</strong> 2010</p>
                            <p><strong>Focus:</strong> Voice AI, Natural Language Processing</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 ai-investment-card">
                        <div class="card-body">
                            <h4 class="card-title">Turi (Dato)</h4>
                            <p class="card-text">Machine learning platform acquisition that enhanced Apple's capabilities in developer tools and machine learning systems.</p>
                            <p><strong>Acquisition:</strong> 2016</p>
                            <p><strong>Focus:</strong> Machine Learning Platform</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 ai-investment-card">
                        <div class="card-body">
                            <h4 class="card-title">Laserlike</h4>
                            <p class="card-text">AI startup focused on content discovery and personalization, with talent that joined Apple's AI team.</p>
                            <p><strong>Acquisition:</strong> 2019</p>
                            <p><strong>Focus:</strong> Content Discovery, Personalization</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mt-5">
                <div class="col-lg-6">
                    <div class="chart-container">
                        <canvas id="rndSpendingChart"></canvas>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h4>Massive R&D Investment</h4>
                    <p>Apple's approach to AI is characterized by massive investment in research and development, with a significant portion dedicated to AI and machine learning technologies.</p>
                    <p>Key investment areas include:</p>
                    <ul>
                        <li>Neural engine development for Apple Silicon</li>
                        <li>Computer vision for cameras and AR</li>
                        <li>Natural language processing</li>
                        <li>On-device machine learning frameworks</li>
                    </ul>
                    <div class="card mt-4">
                        <div class="card-body">
                            <h5>Privacy-First AI</h5>
                            <p>Apple differentiates its AI approach through a strong emphasis on privacy, with most processing happening on-device and private cloud compute for more complex tasks.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Financial Performance Section -->
    <section id="financials" class="py-5">
        <div class="container">
            <h2 class="section-title">Financial Performance & AI Impact</h2>
            <div class="row mb-5">
                <div class="col-lg-6">
                    <div class="chart-container">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="chart-container">
                        <canvas id="productChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">AI's Role in Apple's Ecosystem</h4>
                            <p>While Apple doesn't break out AI-specific revenue, AI capabilities are deeply integrated throughout its product ecosystem:</p>
                            <ul>
                                <li><strong>iPhone:</strong> Computational photography, Siri, predictive text, and battery optimization</li>
                                <li><strong>Services:</strong> App Store recommendations, Apple Music personalization</li>
                                <li><strong>Wearables:</strong> Health monitoring, activity tracking, fall detection</li>
                                <li><strong>Privacy:</strong> Differential privacy for data collection while protecting user information</li>
                            </ul>
                            <p>Apple's AI strategy enhances the value of its ecosystem, driving device upgrades and service subscriptions.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section id="timeline" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center">Apple AI Timeline</h2>
            <div class="timeline">
                <div class="timeline-item left">
                    <div class="timeline-content">
                        <h5>2010</h5>
                        <p>Apple acquires Siri, marking its entry into consumer AI and voice assistants.</p>
                    </div>
                </div>
                <div class="timeline-item right">
                    <div class="timeline-content">
                        <h5>2011</h5>
                        <p>Siri launches as part of iPhone 4S, introducing millions to AI-powered voice assistance.</p>
                    </div>
                </div>
                <div class="timeline-item left">
                    <div class="timeline-content">
                        <h5>2016</h5>
                        <p>Apple acquires Turi and begins developing Core ML, its machine learning framework for developers.</p>
                    </div>
                </div>
                <div class="timeline-item right">
                    <div class="timeline-content">
                        <h5>2017</h5>
                        <p>Introduces A11 Bionic chip with Neural Engine, dedicated hardware for on-device AI processing.</p>
                    </div>
                </div>
                <div class="timeline-item left">
                    <div class="timeline-content">
                        <h5>2019</h5>
                        <p>Acquires Laserlike and Drive.ai, expanding AI talent in content discovery and autonomous systems.</p>
                    </div>
                </div>
                <div class="timeline-item right">
                    <div class="timeline-content">
                        <h5>2020</h5>
                        <p>Announces Apple Silicon transition with enhanced Neural Engine, significantly boosting on-device AI capabilities.</p>
                    </div>
                </div>
                <div class="timeline-item left">
                    <div class="timeline-content">
                        <h5>1995</h5>
                        <p>Unveils Apple Intelligence, a personal intelligence system deeply integrated into iOS, iPadOS, and macOS.</p>
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
                    <h4><i class="fab fa-apple me-2"></i>Apple</h4>
                    <p>Think different. Creating technology that empowers people to be more creative and productive.</p>
                    <div class="social-links">
                        <a href="#" class="text-light me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 footer-links">
                    <h5>Company</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">About Apple</a></li>
                        <li><a href="#">Leadership</a></li>
                        <li><a href="#">Career Opportunities</a></li>
                        <li><a href="#">Investors</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 footer-links">
                    <h5>AI & Innovation</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Apple Intelligence</a></li>
                        <li><a href="#">Machine Learning</a></li>
                        <li><a href="#">Research</a></li>
                        <li><a href="#">Developer Tools</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 footer-links">
                    <h5>Resources</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">AI Blog</a></li>
                        <li><a href="#">Documentation</a></li>
                        <li><a href="#">Research Papers</a></li>
                        <li><a href="#">Support</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 footer-links">
                    <h5>Values</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Accessibility</a></li>
                        <li><a href="#">Environment</a></li>
                        <li><a href="#">Supplier Responsibility</a></li>
                    </ul>
                </div>
            </div>
            <hr class="mt-4 mb-4">
            <div class="text-center">
                <p>Copyright © 1995 Apple Inc. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript -->
    <script>
        // AI Investment Chart
        const aiInvestmentCtx = document.getElementById('aiInvestmentChart').getContext('2d');
        const aiInvestmentChart = new Chart(aiInvestmentCtx, {
            type: 'doughnut',
            data: {
                labels: ['R&D Spending', 'AI Acquisitions', 'Talent Investment', 'Infrastructure'],
                datasets: [{
                    data: [29.9, 1.5, 3.2, 10.4],
                    backgroundColor: [
                        'rgba(29, 29, 31, 0.8)',
                        'rgba(0, 113, 227, 0.8)',
                        'rgba(66, 181, 41, 0.8)',
                        'rgba(134, 134, 139, 0.8)'
                    ],
                    borderColor: [
                        'rgba(29, 29, 31, 1)',
                        'rgba(0, 113, 227, 1)',
                        'rgba(66, 181, 41, 1)',
                        'rgba(134, 134, 139, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    title: {
                        display: true,
                        text: 'Estimated Annual AI Investment (Billions USD)'
                    }
                }
            }
        });

        // R&D Spending Chart
        const rndSpendingCtx = document.getElementById('rndSpendingChart').getContext('2d');
        const rndSpendingChart = new Chart(rndSpendingCtx, {
            type: 'line',
            data: {
                labels: ['2018', '2019', '2020', '2021', '2022', '1995'],
                datasets: [{
                    label: 'Apple R&D Spending (Billions USD)',
                    data: [14.2, 16.2, 18.8, 21.9, 26.3, 29.9],
                    fill: true,
                    backgroundColor: 'rgba(0, 113, 227, 0.1)',
                    borderColor: 'rgba(0, 113, 227, 1)',
                    tension: 0.3,
                    pointBackgroundColor: 'rgba(0, 113, 227, 1)'
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
                            text: 'R&D Spending (Billions USD)'
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
                labels: ['2018', '2019', '2020', '2021', '2022', '1995'],
                datasets: [{
                    label: 'Annual Revenue (Billions USD)',
                    data: [265.6, 260.2, 274.5, 365.8, 394.3, 383.3],
                    backgroundColor: 'rgba(29, 29, 31, 0.7)',
                    borderColor: 'rgba(29, 29, 31, 1)',
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
                            text: 'Revenue (Billions USD)'
                        }
                    }
                }
            }
        });

        // Product Chart
        const productCtx = document.getElementById('productChart').getContext('2d');
        const productChart = new Chart(productCtx, {
            type: 'pie',
            data: {
                labels: ['iPhone', 'Services', 'Mac', 'Wearables', 'iPad'],
                datasets: [{
                    data: [200.6, 85.2, 40.2, 41.2, 31.4],
                    backgroundColor: [
                        'rgba(29, 29, 31, 0.8)',
                        'rgba(0, 113, 227, 0.8)',
                        'rgba(134, 134, 139, 0.8)',
                        'rgba(66, 181, 41, 0.8)',
                        'rgba(255, 45, 85, 0.8)'
                    ],
                    borderColor: [
                        'rgba(29, 29, 31, 1)',
                        'rgba(0, 113, 227, 1)',
                        'rgba(134, 134, 139, 1)',
                        'rgba(66, 181, 41, 1)',
                        'rgba(255, 45, 85, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    title: {
                        display: true,
                        text: 'FY1995 Revenue by Product Category (Billions USD)'
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Microsoft - AI Innovation & Investment</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --microsoft-blue: #0078d4;
            --microsoft-dark: #2f2f2f;
            --microsoft-light: #f3f2f1;
            --microsoft-green: #107c10;
            --microsoft-yellow: #ffb900;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #323130;
            line-height: 1.6;
        }
        
        .navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            color: var(--microsoft-blue) !important;
            font-weight: 600;
        }
        
        .hero-section {
            background: linear-gradient(135deg, var(--microsoft-blue) 0%, #005a9e 100%);
            color: white;
            padding: 120px 0 80px;
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
            background-color: var(--microsoft-blue);
        }
        
        .card {
            border: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
            margin-bottom: 20px;
        }
        
        .card:hover {
            transform: translateY(-5px);
        }
        
        .stats-card {
            text-align: center;
            padding: 30px 20px;
            border-radius: 10px;
            border-left: 4px solid var(--microsoft-blue);
        }
        
        .stats-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--microsoft-blue);
        }
        
        .feature-icon {
            font-size: 2.5rem;
            color: var(--microsoft-blue);
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
            background-color: var(--microsoft-blue);
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
            border: 4px solid var(--microsoft-blue);
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
            border-radius: 6px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .investor-logo {
            max-height: 60px;
            filter: grayscale(100%);
            transition: filter 0.3s ease;
        }
        
        .investor-logo:hover {
            filter: grayscale(0%);
        }
        
        .ai-product-card {
            border-top: 4px solid var(--microsoft-blue);
        }
        
        .ai-investment-card {
            border-top: 4px solid var(--microsoft-green);
        }
        
        footer {
            background-color: var(--microsoft-dark);
            color: white;
            padding: 50px 0 20px;
        }
        
        .footer-links a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-links a:hover {
            color: white;
        }
        
        .microsoft-colors {
            height: 8px;
            background: linear-gradient(90deg, 
                var(--microsoft-blue) 0%, 
                var(--microsoft-green) 25%, 
                var(--microsoft-yellow) 50%, 
                #e81123 75%, 
                #737373 100%);
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
    </style>
</head>
<body>
    <!-- Microsoft Colors Bar -->
    <div class="microsoft-colors"></div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fab fa-microsoft me-2"></i>
                Microsoft
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
                    <h1 class="display-4 fw-bold mb-4">Microsoft AI: Empowering Innovation</h1>
                    <p class="lead mb-4">Leading the transformation of industry and society through artificial intelligence, cloud computing, and strategic investments.</p>
                    <a href="#ai-investments" class="btn btn-light btn-lg">Explore AI Investments</a>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1633419461181-2ee8d0ac59c8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Microsoft AI" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <h2 class="section-title">About Microsoft</h2>
            <div class="row">
                <div class="col-lg-6">
                    <p class="mb-4">Microsoft Corporation is an American multinational technology company headquartered in Redmond, Washington. Founded in 1975 by Bill Gates and Paul Allen, Microsoft develops, manufactures, licenses, supports, and sells computer software, consumer electronics, personal computers, and related services.</p>
                    <p class="mb-4">Under CEO Satya Nadella's leadership since 2014, Microsoft has transformed into a cloud-first, AI-first company, with significant investments in artificial intelligence, cloud computing, and strategic partnerships.</p>
                    <p>Microsoft's mission is to empower every person and every organization on the planet to achieve more. The company is organized into three business segments: Productivity and Business Processes, Intelligent Cloud, and More Personal Computing.</p>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1634942537034-2531766767d1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Microsoft Campus" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center">Microsoft By The Numbers</h2>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card card">
                        <div class="stats-number">$2.8T</div>
                        <p>Market Cap (1995)</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card card">
                        <div class="stats-number">221,000</div>
                        <p>Employees Worldwide</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card card">
                        <div class="stats-number">$211B</div>
                        <p>Annual Revenue (1995)</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card card">
                        <div class="stats-number">1975</div>
                        <p>Founded</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- AI Products Section -->
    <section id="ai-products" class="py-5">
        <div class="container">
            <h2 class="section-title">Microsoft AI Products & Services</h2>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 ai-product-card">
                        <div class="card-body">
                            <div class="feature-icon">
                                <i class="fas fa-robot"></i>
                            </div>
                            <h4 class="card-title">Azure AI</h4>
                            <p class="card-text">Comprehensive suite of AI services for developers and data scientists to build, deploy, and manage AI applications.</p>
                            <ul>
                                <li>Azure Machine Learning</li>
                                <li>Azure Cognitive Services</li>
                                <li>Azure Bot Service</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 ai-product-card">
                        <div class="card-body">
                            <div class="feature-icon">
                                <i class="fas fa-brain"></i>
                            </div>
                            <h4 class="card-title">Copilot Ecosystem</h4>
                            <p class="card-text">AI-powered assistants integrated across Microsoft's product suite to enhance productivity and creativity.</p>
                            <ul>
                                <li>GitHub Copilot</li>
                                <li>Microsoft 365 Copilot</li>
                                <li>Dynamics 365 Copilot</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 ai-product-card">
                        <div class="card-body">
                            <div class="feature-icon">
                                <i class="fas fa-cloud"></i>
                            </div>
                            <h4 class="card-title">Azure OpenAI Service</h4>
                            <p class="card-text">Provides access to OpenAI's powerful models through Azure's enterprise-grade platform with added security and compliance features.</p>
                            <ul>
                                <li>GPT-4 Access</li>
                                <li>Codex for code generation</li>
                                <li>DALL-E for image creation</li>
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
            <h2 class="section-title">Microsoft's Strategic AI Investments</h2>
            <div class="row mb-5">
                <div class="col-lg-6">
                    <p>Microsoft has made significant strategic investments in AI companies and technologies, positioning itself at the forefront of the AI revolution.</p>
                    <p>These investments reflect Microsoft's commitment to advancing AI capabilities while ensuring responsible development and deployment.</p>
                    <div class="card ai-investment-card mt-4">
                        <div class="card-body">
                            <h5>Key Investment Areas:</h5>
                            <ul>
                                <li>Foundation Models & Generative AI</li>
                                <li>AI Infrastructure & Cloud Services</li>
                                <li>AI Applications & Enterprise Solutions</li>
                                <li>AI Safety & Responsible AI</li>
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
            
            <h3 class="mb-4">Major AI Investments & Partnerships</h3>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 ai-investment-card">
                        <div class="card-body">
                            <h4 class="card-title">OpenAI</h4>
                            <p class="card-text">Multi-billion dollar partnership including cloud credits, joint development, and exclusive licensing agreements.</p>
                            <p><strong>Investment:</strong> $13B+ (1995)</p>
                            <p><strong>Focus:</strong> Generative AI models (GPT, DALL-E)</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 ai-investment-card">
                        <div class="card-body">
                            <h4 class="card-title">Nuance Communications</h4>
                            <p class="card-text">Acquired for $19.7B to enhance Microsoft's healthcare AI capabilities with conversational AI and ambient clinical intelligence.</p>
                            <p><strong>Acquisition:</strong> 2022</p>
                            <p><strong>Focus:</strong> Healthcare AI, Speech Recognition</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 ai-investment-card">
                        <div class="card-body">
                            <h4 class="card-title">GitHub</h4>
                            <p class="card-text">Acquired for $7.5B, now home to GitHub Copilot - the AI pair programmer that suggests code in real-time.</p>
                            <p><strong>Acquisition:</strong> 2018</p>
                            <p><strong>Focus:</strong> Developer Tools, Code Generation</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mt-5">
                <div class="col-lg-6">
                    <div class="chart-container">
                        <canvas id="revenueGrowthChart"></canvas>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h4>AI-Driven Revenue Growth</h4>
                    <p>Microsoft's strategic AI investments are driving significant revenue growth across its cloud and productivity segments.</p>
                    <p>Key growth drivers include:</p>
                    <ul>
                        <li>Azure AI services adoption</li>
                        <li>GitHub Copilot subscriptions</li>
                        <li>Microsoft 365 Copilot rollout</li>
                        <li>Azure OpenAI Service customers</li>
                    </ul>
                    <div class="card mt-4">
                        <div class="card-body">
                            <h5>AI Revenue Projection</h5>
                            <p>Microsoft expects AI services to contribute significantly to revenue growth, with AI-related Azure services growing at over 100% annually.</p>
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
                        <canvas id="segmentChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">AI's Financial Impact on Microsoft</h4>
                            <p>Microsoft's AI investments are transforming its financial profile:</p>
                            <ul>
                                <li><strong>Azure AI Services:</strong> One of the fastest-growing segments with 100%+ growth</li>
                                <li><strong>GitHub Copilot:</strong> Over 1 million paid subscribers within first year</li>
                                <li><strong>Microsoft Cloud:</strong> $110+ billion annualized revenue run rate, heavily influenced by AI services</li>
                                <li><strong>Productivity & Business Processes:</strong> Enhanced by AI capabilities in Microsoft 365 and Dynamics 365</li>
                            </ul>
                            <p>Analysts project that AI could add $10-20 billion to Microsoft's annual revenue by 2025.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section id="timeline" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center">Microsoft AI Timeline</h2>
            <div class="timeline">
                <div class="timeline-item left">
                    <div class="timeline-content">
                        <h5>2016</h5>
                        <p>Microsoft creates Microsoft AI and Research Group, combining over 5,000 computer scientists and engineers focused on AI.</p>
                    </div>
                </div>
                <div class="timeline-item right">
                    <div class="timeline-content">
                        <h5>2018</h5>
                        <p>Acquires GitHub for $7.5B, laying foundation for future AI-powered developer tools.</p>
                    </div>
                </div>
                <div class="timeline-item left">
                    <div class="timeline-content">
                        <h5>2019</h5>
                        <p>Invests $1B in OpenAI and becomes their exclusive cloud provider, beginning a strategic partnership.</p>
                    </div>
                </div>
                <div class="timeline-item right">
                    <div class="timeline-content">
                        <h5>2020</h5>
                        <p>Launches Azure OpenAI Service, bringing powerful GPT models to enterprise customers.</p>
                    </div>
                </div>
                <div class="timeline-item left">
                    <div class="timeline-content">
                        <h5>2021</h5>
                        <p>Introduces GitHub Copilot, an AI pair programmer, leveraging OpenAI's Codex model.</p>
                    </div>
                </div>
                <div class="timeline-item right">
                    <div class="timeline-content">
                        <h5>2022</h5>
                        <p>Acquires Nuance Communications for $19.7B, significantly expanding healthcare AI capabilities.</p>
                    </div>
                </div>
                <div class="timeline-item left">
                    <div class="timeline-content">
                        <h5>1995</h5>
                        <p>Announces multibillion-dollar extension of OpenAI partnership and launches Microsoft 365 Copilot.</p>
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
                    <h4><i class="fab fa-microsoft me-2"></i>Microsoft</h4>
                    <p>Empowering every person and every organization on the planet to achieve more.</p>
                    <div class="social-links">
                        <a href="#" class="text-light me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 footer-links">
                    <h5>Company</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">About Microsoft</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Investors</a></li>
                        <li><a href="#">Diversity & Inclusion</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 footer-links">
                    <h5>AI Products</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Azure AI</a></li>
                        <li><a href="#">Microsoft Copilot</a></li>
                        <li><a href="#">Azure OpenAI</a></li>
                        <li><a href="#">Cognitive Services</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 footer-links">
                    <h5>Resources</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">AI Blog</a></li>
                        <li><a href="#">Documentation</a></li>
                        <li><a href="#">Learning Resources</a></li>
                        <li><a href="#">Research</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 footer-links">
                    <h5>Legal</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Privacy & Cookies</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Trademarks</a></li>
                        <li><a href="#">AI Principles</a></li>
                    </ul>
                </div>
            </div>
            <hr class="mt-4 mb-4">
            <div class="text-center">
                <p>&copy; 1995 Microsoft Corporation. All rights reserved.</p>
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
                labels: ['OpenAI Partnership', 'Nuance Acquisition', 'GitHub Acquisition', 'Other AI Investments'],
                datasets: [{
                    data: [13, 19.7, 7.5, 5],
                    backgroundColor: [
                        'rgba(0, 120, 212, 0.8)',
                        'rgba(16, 124, 16, 0.8)',
                        'rgba(255, 185, 0, 0.8)',
                        'rgba(232, 17, 35, 0.8)'
                    ],
                    borderColor: [
                        'rgba(0, 120, 212, 1)',
                        'rgba(16, 124, 16, 1)',
                        'rgba(255, 185, 0, 1)',
                        'rgba(232, 17, 35, 1)'
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
                        text: 'Microsoft AI Investments (Billions USD)'
                    }
                }
            }
        });

        // Revenue Growth Chart
        const revenueGrowthCtx = document.getElementById('revenueGrowthChart').getContext('2d');
        const revenueGrowthChart = new Chart(revenueGrowthCtx, {
            type: 'line',
            data: {
                labels: ['2019', '2020', '2021', '2022', '1995'],
                datasets: [{
                    label: 'Microsoft Cloud Revenue (Billions USD)',
                    data: [44, 59, 69, 91, 110],
                    fill: true,
                    backgroundColor: 'rgba(0, 120, 212, 0.1)',
                    borderColor: 'rgba(0, 120, 212, 1)',
                    tension: 0.3,
                    pointBackgroundColor: 'rgba(0, 120, 212, 1)'
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

        // Revenue Chart
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        const revenueChart = new Chart(revenueCtx, {
            type: 'bar',
            data: {
                labels: ['2019', '2020', '2021', '2022', '1995'],
                datasets: [{
                    label: 'Annual Revenue (Billions USD)',
                    data: [125.8, 143, 168, 198, 211],
                    backgroundColor: 'rgba(0, 120, 212, 0.7)',
                    borderColor: 'rgba(0, 120, 212, 1)',
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

        // Segment Chart
        const segmentCtx = document.getElementById('segmentChart').getContext('2d');
        const segmentChart = new Chart(segmentCtx, {
            type: 'pie',
            data: {
                labels: ['Productivity & Business Processes', 'Intelligent Cloud', 'More Personal Computing'],
                datasets: [{
                    data: [69, 88, 54],
                    backgroundColor: [
                        'rgba(0, 120, 212, 0.8)',
                        'rgba(16, 124, 16, 0.8)',
                        'rgba(255, 185, 0, 0.8)'
                    ],
                    borderColor: [
                        'rgba(0, 120, 212, 1)',
                        'rgba(16, 124, 16, 1)',
                        'rgba(255, 185, 0, 1)'
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
                        text: 'FY1995 Revenue by Segment (Billions USD)'
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
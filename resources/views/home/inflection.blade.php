<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inflection AI - Personal AI Assistant</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --inflection-blue: #2563EB;
            --inflection-dark: #1E293B;
            --inflection-light: #F8FAFC;
            --inflection-teal: #0D9488;
            --inflection-purple: #7C3AED;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            color: #334155;
            line-height: 1.6;
            background-color: var(--inflection-light);
        }
        
        .navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            color: var(--inflection-blue) !important;
            font-weight: 700;
        }
        
        .hero-section {
            background: linear-gradient(135deg, var(--inflection-blue) 0%, #1D4ED8 100%);
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
            background: linear-gradient(90deg, var(--inflection-blue), var(--inflection-teal));
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
            background: linear-gradient(90deg, var(--inflection-blue), var(--inflection-teal));
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
            color: var(--inflection-blue);
        }
        
        .feature-icon {
            font-size: 2.5rem;
            color: var(--inflection-blue);
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
            background: linear-gradient(to bottom, var(--inflection-blue), var(--inflection-teal));
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
            border: 4px solid var(--inflection-blue);
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
            border-top: 4px solid var(--inflection-blue);
        }
        
        .ai-investment-card {
            border-top: 4px solid var(--inflection-teal);
        }
        
        footer {
            background-color: var(--inflection-dark);
            color: white;
            padding: 50px 0 20px;
        }
        
        .footer-links a {
            color: #94A3B8;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-links a:hover {
            color: white;
        }
        
        .inflection-gradient {
            height: 8px;
            background: linear-gradient(90deg, 
                var(--inflection-blue) 0%, 
                var(--inflection-teal) 25%, 
                var(--inflection-purple) 50%, 
                #DC2626 75%, 
                #D97706 100%);
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
            color: #475569 !important;
            transition: color 0.3s ease;
        }
        
        .nav-link:hover {
            color: var(--inflection-blue) !important;
        }
        
        .btn-inflection {
            background: linear-gradient(90deg, var(--inflection-blue), var(--inflection-teal));
            color: white;
            border-radius: 8px;
            padding: 12px 30px;
            font-weight: 600;
            border: none;
        }
        
        .btn-inflection:hover {
            background: linear-gradient(90deg, #1D4ED8, #0F766E);
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
        
        .assistant-showcase {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            background: white;
        }
        
        .chat-bubble {
            background: #F1F5F9;
            border-radius: 18px;
            padding: 12px 18px;
            margin: 10px 0;
            max-width: 80%;
        }
        
        .chat-bubble.user {
            background: var(--inflection-blue);
            color: white;
            margin-left: auto;
        }
        
        .pi-demo {
            background: linear-gradient(135deg, #E0F2FE 0%, #F0FDFA 100%);
            border-radius: 12px;
            padding: 20px;
            border-left: 4px solid var(--inflection-blue);
        }
    </style>
</head>
<body>
    <!-- Inflection AI Gradient Bar -->
    <div class="inflection-gradient"></div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-brain me-2"></i>
                Inflection AI
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
                        <a class="nav-link" href="#pi">Pi Assistant</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#ai-investments">AI Investments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#technology">Technology</a>
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
                    <h1 class="display-4 fw-bold mb-4">Your <span class="gradient-text">Personal AI</span></h1>
                    <p class="lead mb-4">Inflection AI is creating personal AI that helps you accomplish tasks, provides information, and offers supportive conversation through our flagship product, Pi.</p>
                    <a href="#pi" class="btn btn-light btn-lg">Meet Pi</a>
                </div>
                <div class="col-lg-6">
                    <div class="assistant-showcase p-4">
                        <div class="pi-demo mb-4">
                            <h5><i class="fas fa-robot me-2"></i>Pi, your personal AI</h5>
                            <p class="mb-0">"Hi there! I'm Pi, your personal AI assistant. I'm here to help you with information, tasks, or just have a friendly conversation. What's on your mind today?"</p>
                        </div>
                        <div class="chat-bubble user">
                            Can you help me plan a weekend trip?
                        </div>
                        <div class="chat-bubble">
                            <strong>Pi:</strong> Absolutely! I'd love to help you plan a weekend getaway. Where are you thinking of going, and what's your budget?
                        </div>
                        <div class="text-center mt-3">
                            <small class="text-muted">Powered by Inflection AI's proprietary models</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <h2 class="section-title">About Inflection AI</h2>
            <div class="row">
                <div class="col-lg-6">
                    <p class="mb-4">Inflection AI is an American artificial intelligence company founded in 2022 by LinkedIn co-founder Reid Hoffman, DeepMind co-founder Mustafa Suleyman, and Karén Simonyan. The company is focused on developing personal AI assistants that are helpful, harmless, and honest.</p>
                    <p class="mb-4">The company's mission is to make AI more personal and accessible, creating AI that can understand and adapt to individual users' needs, preferences, and communication styles.</p>
                    <p>Inflection AI has assembled one of the largest AI clusters in the world and is building some of the most capable AI models ever created, with a specific focus on conversational AI and personal assistance.</p>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h5>Founders:</h5>
                            <ul>
                                <li>Reid Hoffman (LinkedIn)</li>
                                <li>Mustafa Suleyman (DeepMind)</li>
                                <li>Karén Simonyan (DeepMind)</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h5>Headquarters:</h5>
                            <p>Palo Alto, California</p>
                            <h5>Employees:</h5>
                            <p>35+ AI researchers and engineers</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1677442136019-21780ecad995?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="AI Technology" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center">Inflection AI By The Numbers</h2>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card card">
                        <div class="stats-number">$1.5B</div>
                        <p>Total Funding</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card card">
                        <div class="stats-number">$4B</div>
                        <p>Valuation</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card card">
                        <div class="stats-number">22,000</div>
                        <p>H100 GPUs</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card card">
                        <div class="stats-number">2022</div>
                        <p>Founded</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pi Assistant Section -->
    <section id="pi" class="py-5">
        <div class="container">
            <h2 class="section-title">Pi - Your Personal AI</h2>
            <div class="product-showcase">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center">
                        <h3>Meet Pi, Your Personal AI</h3>
                        <p class="lead">Pi is Inflection AI's flagship product - a kind and supportive AI designed to be your personal assistant, conversation partner, and creative collaborator.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 ai-product-card">
                        <div class="card-body">
                            <div class="feature-icon">
                                <i class="fas fa-comments"></i>
                            </div>
                            <h4 class="card-title">Conversational Intelligence</h4>
                            <p class="card-text">Pi engages in natural, flowing conversations while remembering context and your preferences.</p>
                            <ul>
                                <li>Contextual memory</li>
                                <li>Personalized responses</li>
                                <li>Emotional intelligence</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 ai-product-card">
                        <div class="card-body">
                            <div class="feature-icon">
                                <i class="fas fa-tasks"></i>
                            </div>
                            <h4 class="card-title">Task Assistance</h4>
                            <p class="card-text">Get help with planning, research, writing, and problem-solving across various domains.</p>
                            <ul>
                                <li>Planning and organization</li>
                                <li>Research and information</li>
                                <li>Creative collaboration</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 ai-product-card">
                        <div class="card-body">
                            <div class="feature-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <h4 class="card-title">Safety & Ethics</h4>
                            <p class="card-text">Built with robust safety measures and ethical guidelines to ensure helpful, harmless interactions.</p>
                            <ul>
                                <li>Content filtering</li>
                                <li>Bias mitigation</li>
                                <li>Privacy protection</li>
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
            <h2 class="section-title">Inflection AI Funding & Investment Strategy</h2>
            <div class="row mb-5">
                <div class="col-lg-6">
                    <p>Inflection AI has secured one of the largest funding rounds in AI history, backed by major technology investors who recognize the potential of personal AI assistants.</p>
                    <p>The company's investment strategy focuses on building massive computational infrastructure and attracting top AI research talent to develop cutting-edge models.</p>
                    <div class="card ai-investment-card mt-4">
                        <div class="card-body">
                            <h5>Investment Focus Areas:</h5>
                            <ul>
                                <li>AI model research and development</li>
                                <li>Computational infrastructure</li>
                                <li>AI safety and alignment research</li>
                                <li>Product development and user experience</li>
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
            
            <h3 class="mb-4">Major Funding Rounds</h3>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 ai-investment-card">
                        <div class="card-body">
                            <h4 class="card-title">Series B</h4>
                            <p class="card-text">$1.3B round led by Microsoft, Reid Hoffman, Bill Gates, Eric Schmidt, and new investors.</p>
                            <p><strong>Date:</strong> June 1995</p>
                            <p><strong>Valuation:</strong> $4B</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 ai-investment-card">
                        <div class="card-body">
                            <h4 class="card-title">Series A</h4>
                            <p class="card-text">Initial funding round from prominent investors including Greylock and others.</p>
                            <p><strong>Date:</strong> 2022</p>
                            <p><strong>Amount:</strong> $225M</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 ai-investment-card">
                        <div class="card-body">
                            <h4 class="card-title">Infrastructure Investment</h4>
                            <p class="card-text">Massive compute investment including 22,000 H100 GPUs - one of the largest AI clusters.</p>
                            <p><strong>Compute Power:</strong> 22,000 H100s</p>
                            <p><strong>Partnership:</strong> CoreWeave and NVIDIA</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <h3 class="mb-4 mt-5">Notable Investors</h3>
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-2 col-4 mb-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/96/Microsoft_logo_%282012%29.svg/1024px-Microsoft_logo_%282012%29.svg.png" alt="Microsoft" class="img-fluid investor-logo">
                </div>
                <div class="col-md-2 col-4 mb-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/1024px-Google_2015_logo.svg.png" alt="Google" class="img-fluid investor-logo">
                </div>
                <div class="col-md-2 col-4 mb-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/Greylock_logo.svg/1200px-Greylock_logo.svg.png" alt="Greylock" class="img-fluid investor-logo">
                </div>
                <div class="col-md-2 col-4 mb-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/NVIDIA_logo.svg/1280px-NVIDIA_logo.svg.png" alt="NVIDIA" class="img-fluid investor-logo">
                </div>
                <div class="col-md-2 col-4 mb-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/LinkedIn_logo_initials.png/800px-LinkedIn_logo_initials.png" alt="LinkedIn" class="img-fluid investor-logo">
                </div>
            </div>
            
            <div class="row mt-5">
                <div class="col-lg-6">
                    <div class="chart-container">
                        <canvas id="computeChart"></canvas>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h4>Massive Compute Investment</h4>
                    <p>Inflection AI has made one of the largest infrastructure investments in AI, securing 22,000 H100 GPUs to train and run their models.</p>
                    <p>This computational power positions them to:</p>
                    <ul>
                        <li>Train larger, more capable models</li>
                        <li>Serve millions of users simultaneously</li>
                        <li>Advance AI safety research</li>
                        <li>Maintain competitive advantage</li>
                    </ul>
                    <div class="card mt-4">
                        <div class="card-body">
                            <h5>Strategic Advantage</h5>
                            <p>With this level of compute resources, Inflection AI can train models that compete with the largest AI systems while focusing specifically on personal AI applications.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Technology Section -->
    <section id="technology" class="py-5">
        <div class="container">
            <h2 class="section-title">Technology & Infrastructure</h2>
            <div class="row mb-5">
                <div class="col-lg-6">
                    <div class="chart-container">
                        <canvas id="infrastructureChart"></canvas>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="chart-container">
                        <canvas id="modelSizeChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Inflection AI's Technical Approach</h4>
                            <p>Inflection AI is building some of the largest and most sophisticated AI models with a specific focus on conversational ability and personalization:</p>
                            <ul>
                                <li><strong>Proprietary Models:</strong> Developing custom large language models optimized for conversation</li>
                                <li><strong>Massive Scale:</strong> Training on one of the world's largest AI compute clusters</li>
                                <li><strong>Safety First:</strong> Implementing robust safety measures and alignment techniques</li>
                                <li><strong>Personalization:</strong> Creating AI that adapts to individual users over time</li>
                            </ul>
                            <p>The company's technical leadership includes Karén Simonyan as Chief Scientist, bringing DeepMind's cutting-edge research expertise to personal AI development.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section id="timeline" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center">Inflection AI Timeline</h2>
            <div class="timeline">
                <div class="timeline-item left">
                    <div class="timeline-content">
                        <h5>March 2022</h5>
                        <p>Inflection AI founded by Reid Hoffman, Mustafa Suleyman, and Karén Simonyan with a vision for personal AI assistants.</p>
                    </div>
                </div>
                <div class="timeline-item right">
                    <div class="timeline-content">
                        <h5>May 2022</h5>
                        <p>Raises $225M in Series A funding from Greylock and other investors. Begins assembling AI research team.</p>
                    </div>
                </div>
                <div class="timeline-item left">
                    <div class="timeline-content">
                        <h5>Early 1995</h5>
                        <p>Announces development of one of the world's largest AI compute clusters with 22,000 H100 GPUs.</p>
                    </div>
                </div>
                <div class="timeline-item right">
                    <div class="timeline-content">
                        <h5>May 1995</h5>
                        <p>Launches Pi, their personal AI assistant, in beta. Focuses on kind, supportive conversation and practical assistance.</p>
                    </div>
                </div>
                <div class="timeline-item left">
                    <div class="timeline-content">
                        <h5>June 1995</h5>
                        <p>Raises $1.3B in Series B funding led by Microsoft, valuing the company at $4 billion.</p>
                    </div>
                </div>
                <div class="timeline-item right">
                    <div class="timeline-content">
                        <h5>Late 1995</h5>
                        <p>Expands Pi's capabilities and begins developing next-generation models with enhanced reasoning and personalization.</p>
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
                    <h4><i class="fas fa-brain me-2"></i>Inflection AI</h4>
                    <p>Creating personal AI that is helpful, harmless, and honest.</p>
                    <div class="social-links">
                        <a href="#" class="text-light me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-github"></i></a>
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
                        <li><a href="#">Pi Assistant</a></li>
                        <li><a href="#">API</a></li>
                        <li><a href="#">Research</a></li>
                        <li><a href="#">Safety</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 footer-links">
                    <h5>Resources</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Documentation</a></li>
                        <li><a href="#">Research Papers</a></li>
                        <li><a href="#">Community</a></li>
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
                <p>© 1995 Inflection AI. All rights reserved.</p>
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
                labels: ['Series A', 'Series B'],
                datasets: [{
                    label: 'Funding Raised (Billions USD)',
                    data: [0.225, 1.3],
                    backgroundColor: [
                        'rgba(37, 99, 235, 0.7)',
                        'rgba(37, 99, 235, 0.7)'
                    ],
                    borderColor: [
                        'rgba(37, 99, 235, 1)',
                        'rgba(37, 99, 235, 1)'
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
                            text: 'Funding (Billions USD)'
                        }
                    }
                }
            }
        });

        // Compute Chart
        const computeCtx = document.getElementById('computeChart').getContext('2d');
        const computeChart = new Chart(computeCtx, {
            type: 'doughnut',
            data: {
                labels: ['H100 GPUs', 'Other Infrastructure', 'Research & Development', 'Operations'],
                datasets: [{
                    data: [65, 15, 15, 5],
                    backgroundColor: [
                        'rgba(37, 99, 235, 0.8)',
                        'rgba(13, 148, 136, 0.8)',
                        'rgba(124, 58, 237, 0.8)',
                        'rgba(220, 38, 38, 0.8)'
                    ],
                    borderColor: [
                        'rgba(37, 99, 235, 1)',
                        'rgba(13, 148, 136, 1)',
                        'rgba(124, 58, 237, 1)',
                        'rgba(220, 38, 38, 1)'
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
                        text: 'Capital Allocation (%)'
                    }
                }
            }
        });

        // Infrastructure Chart
        const infrastructureCtx = document.getElementById('infrastructureChart').getContext('2d');
        const infrastructureChart = new Chart(infrastructureCtx, {
            type: 'bar',
            data: {
                labels: ['Inflection AI', 'OpenAI', 'Google', 'Anthropic'],
                datasets: [{
                    label: 'Compute Power (H100 Equivalent GPUs)',
                    data: [22000, 15000, 25000, 8000],
                    backgroundColor: 'rgba(37, 99, 235, 0.7)',
                    borderColor: 'rgba(37, 99, 235, 1)',
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
                            text: 'H100 Equivalent GPUs'
                        }
                    }
                }
            }
        });

        // Model Size Chart
        const modelSizeCtx = document.getElementById('modelSizeChart').getContext('2d');
        const modelSizeChart = new Chart(modelSizeCtx, {
            type: 'line',
            data: {
                labels: ['2022', '1995', '2024', '2025'],
                datasets: [{
                    label: 'Model Parameters (Trillions)',
                    data: [0.5, 1.2, 2.8, 5.5],
                    fill: true,
                    backgroundColor: 'rgba(13, 148, 136, 0.1)',
                    borderColor: 'rgba(13, 148, 136, 1)',
                    tension: 0.3,
                    pointBackgroundColor: 'rgba(13, 148, 136, 1)'
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
                            text: 'Parameters (Trillions)'
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stability AI - AI Investment Analysis</title>
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
            --stability-blue: #0066cc;
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
            color: var(--stability-blue);
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
            border-bottom: 1px solid var(--stability-blue);
        }
        
        .navbar-brand {
            font-weight: bold;
            color: var(--stability-blue) !important;
            font-size: 1.5rem;
        }
        
        .nav-link {
            color: var(--text-color) !important;
            transition: color 0.3s;
        }
        
        .nav-link:hover {
            color: var(--stability-blue) !important;
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
            background: linear-gradient(to right, var(--stability-blue), #4dabf7);
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
            border: 1px solid rgba(0, 102, 204, 0.3);
            height: 100%;
        }
        
        .company-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
            border-color: var(--stability-blue);
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
            border-left: 4px solid var(--stability-blue);
        }
        
        .stock-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--stability-blue);
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
            color: var(--stability-blue);
        }
        
        .section-header::after {
            content: '';
            display: block;
            width: 100px;
            height: 3px;
            background: var(--stability-blue);
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
            border: 1px solid rgba(0, 102, 204, 0.3);
            height: 100%;
        }
        
        .chart-title {
            color: var(--stability-blue);
            margin-bottom: 15px;
            font-size: 1.2rem;
        }
        
        /* Content Cards */
        .content-card {
            background: rgba(26, 77, 46, 0.7);
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 30px;
            border: 1px solid rgba(0, 102, 204, 0.3);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .content-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
            border-color: var(--stability-blue);
        }
        
        .content-card h3 {
            color: var(--stability-blue);
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
            border: 1px solid rgba(0, 102, 204, 0.3);
            text-align: center;
            transition: transform 0.3s;
        }
        
        .stats-card:hover {
            transform: translateY(-5px);
            border-color: var(--stability-blue);
        }
        
        .stats-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--stability-blue);
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
            background: var(--stability-blue);
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
            background: var(--stability-blue);
        }
        
        .timeline-date {
            font-weight: bold;
            color: var(--stability-blue);
            margin-bottom: 5px;
        }
        
        /* Footer */
        footer {
            background-color: rgba(10, 46, 26, 0.9);
            padding: 50px 0 20px;
            margin-top: 50px;
            border-top: 1px solid var(--stability-blue);
        }
        
        .footer-heading {
            color: var(--stability-blue);
            margin-bottom: 20px;
            font-size: 1.2rem;
        }
        
        /* Product Cards */
        .product-card {
            background: rgba(26, 77, 46, 0.7);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid rgba(0, 102, 204, 0.3);
            transition: transform 0.3s;
            height: 100%;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            border-color: var(--stability-blue);
        }
        
        .product-card img {
            border-radius: 8px;
            margin-bottom: 15px;
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        
        /* Open Source Focus Section */
        .opensource-feature {
            background: rgba(26, 77, 46, 0.7);
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 20px;
            border: 1px solid rgba(0, 102, 204, 0.3);
            transition: transform 0.3s;
        }
        
        .opensource-feature:hover {
            transform: translateY(-5px);
            border-color: var(--stability-blue);
        }
        
        .opensource-icon {
            font-size: 2.5rem;
            color: var(--stability-blue);
            margin-bottom: 15px;
        }
        
        /* Generated Art Gallery */
        .art-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        
        .art-item {
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s;
        }
        
        .art-item:hover {
            transform: scale(1.05);
        }
        
        .art-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
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
            
            .art-gallery {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
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
                    <img src="img/stability.jpeg" alt="Stability AI" class="company-logo mb-4" style="height: 80px;">
                    <h1 class="hero-title">Stability AI</h1>
                    <p class="hero-subtitle">Democratizing AI through Open-Source Generative Models</p>
                    <div class="mt-4">
                        <a href="#investment-analysis" class="btn btn-primary btn-lg me-3">Investment Analysis</a>
                        <a href="#company-overview" class="btn btn-outline-light btn-lg">Company Overview</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="company-card">
                        <div class="stock-widget">
                            <div class="stock-price">$1B+</div>
                            <div class="stock-change positive">Open Source Focus <i class="fas fa-arrow-up"></i></div>
                            <small>Latest Valuation</small>
                        </div>
                        <div class="row mt-4">
                            <div class="col-6">
                                <div class="stats-card">
                                    <div class="stats-number">2020</div>
                                    <div class="stats-label">Founded</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stats-card">
                                    <div class="stats-number">$101M</div>
                                    <div class="stats-label">Total Funding</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stats-card">
                                    <div class="stats-number">10M+</div>
                                    <div class="stats-label">Daily Users</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stats-card">
                                    <div class="stats-number">200+</div>
                                    <div class="stats-label">Employees</div>
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
                <p>Understanding Stability AI's mission to make AI accessible through open-source innovation</p>
            </div>
            
            <div class="row">
                <div class="col-lg-8">
                    <div class="content-card">
                        <h3>About Stability AI</h3>
                        <p>Stability AI is a pioneering artificial intelligence company focused on developing and releasing open-source generative AI models. The company is best known for Stable Diffusion, the groundbreaking text-to-image model that revolutionized AI image generation and made advanced AI capabilities accessible to millions worldwide.</p>
                        
                        <p>Unlike many AI companies that keep their models proprietary, Stability AI embraces an open-source philosophy, believing that democratizing access to AI technology will lead to more innovation, transparency, and equitable distribution of AI benefits. The company develops multimodal AI tools for various creative applications including image, video, audio, and 3D generation.</p>
                        
                        <img src="https://images.unsplash.com/photo-1677442136019-21780ecad995?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="AI Image Generation" class="img-fluid">
                        
                        <h4 class="mt-4">Core Philosophy</h4>
                        <ul>
                            <li><strong>Open Source Commitment:</strong> Releasing models publicly to foster innovation and transparency</li>
                            <li><strong>Democratization of AI:</strong> Making advanced AI tools accessible to everyone, not just large corporations</li>
                            <li><strong>Multimodal AI Development:</strong> Creating tools for various creative domains (images, video, audio, 3D)</li>
                            <li><strong>Community-Driven Innovation:</strong> Leveraging global developer community for rapid improvement</li>
                            <li><strong>Ethical AI Development:</strong> Implementing safety measures and responsible AI practices</li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="content-card">
                        <h3>Leadership Team</h3>
                        <div class="mb-4">
                            <h5>Emad Mostaque</h5>
                            <p class="mb-1"><strong>CEO & Founder</strong></p>
                            <p>Former hedge fund manager and AI researcher who founded Stability AI to democratize AI technology</p>
                        </div>
                        <div class="mb-4">
                            <h5>Scott Draves</h5>
                            <p class="mb-1"><strong>Head of Research</strong></p>
                            <p>Computer scientist and artist leading research on generative models and creative AI applications</p>
                        </div>
                        <div class="mb-4">
                            <h5>Christian Cantrell</h5>
                            <p class="mb-1"><strong>VP of Product</strong></p>
                            <p>Former Adobe product manager leading product development and user experience</p>
                        </div>
                        <div>
                            <h5>Joe Penna</h5>
                            <p class="mb-1"><strong>Creative Director</strong></p>
                            <p>Filmmaker and musician guiding creative applications of AI technology</p>
                        </div>
                    </div>
                    
                    <div class="content-card">
                        <h3>Major Investors</h3>
                        <div class="d-flex align-items-center mb-3">
                            <img src="data:image/png;base64,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" alt="Lightspeed" style="height: 30px; margin-right: 10px; width: 70px;">
                            <div>
                                <strong>Lightspeed Venture Partners</strong>
                                <div class="small">Lead Investor</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <img src="data:image/png;base64,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" alt="O'Reilly" style="height: 30px; margin-right: 10px; width: 70px;">
                            <div>
                                <strong>O'Reilly AlphaTech Ventures</strong>
                                <div class="small">Early Stage Investor</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <img src="data:image/jpeg;base64,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" alt="Intel" style="height: 30px; margin-right: 10px; width: 70px;">
                            <div>
                                <strong>Intel Capital</strong>
                                <div class="small">Strategic Investor</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSu0dVMiMTmtZMrvfdG_GZaJtRZa_Gar_AUMA&s" alt="Salesforce" style="height: 30px; margin-right: 10px; width: 70px;">
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
                        <div class="timeline-date">2020</div>
                        <p>Stability AI founded by Emad Mostaque with vision to democratize AI through open-source models.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">August 2022</div>
                        <p>Released Stable Diffusion 1.0, revolutionizing AI image generation and making it accessible to millions.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">October 2022</div>
                        <p>Raised $101 million in seed funding at over $1 billion valuation led by Lightspeed Venture Partners.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">November 2022</div>
                        <p>Launched DreamStudio, web-based interface for Stable Diffusion with commercial API access.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">December 2022</div>
                        <p>Released Stable Diffusion 2.0 with improved image quality and new capabilities.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">March 1995</div>
                        <p>Announced StableLM, open-source language model family to compete with proprietary LLMs.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">June 1995</div>
                        <p>Launched Stable Audio for AI music generation and Stable Video for video generation.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">September 1995</div>
                        <p>Released SDXL 1.0, next-generation image model with significantly improved quality.</p>
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
                <p>Stability AI's comprehensive suite of generative AI tools</p>
            </div>
            
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="product-card">
                        <img src="https://images.unsplash.com/photo-1682687221363-72518513620e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Stable Diffusion">
                        <h4>Stable Diffusion</h4>
                        <p>The revolutionary text-to-image model that democratized AI art generation. Available as open-source with commercial licensing options for enterprises.</p>
                        <div class="mt-3">
                            <span class="badge bg-primary me-2">SDXL 1.0</span>
                            <span class="badge bg-primary me-2">Open Source</span>
                            <span class="badge bg-primary">Multi-modal</span>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 mb-4">
                    <div class="product-card">
                        <img src="https://images.unsplash.com/photo-1574269909862-7e1d70bb8078?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1476&q=80" alt="DreamStudio">
                        <h4>DreamStudio</h4>
                        <p>Web-based platform providing easy access to Stable Diffusion with advanced controls, custom models, and commercial API for developers and businesses.</p>
                        <div class="mt-3">
                            <span class="badge bg-primary me-2">Web Platform</span>
                            <span class="badge bg-primary me-2">API Access</span>
                            <span class="badge bg-primary">Enterprise</span>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 mb-4">
                    <div class="product-card">
                        <img src="https://images.unsplash.com/photo-1511379938547-c1f69419868d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Stable Audio">
                        <h4>Stable Audio & Video</h4>
                        <p>AI tools for music generation and video creation, expanding beyond images into full multimedia content creation pipelines.</p>
                        <div class="mt-3">
                            <span class="badge bg-primary me-2">Audio Generation</span>
                            <span class="badge bg-primary me-2">Video Generation</span>
                            <span class="badge bg-primary">Creative Tools</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mt-4">
                <div class="col-lg-6 mb-4">
                    <div class="content-card">
                        <h3>StableLM Language Models</h3>
                        <p>Stability AI's open-source language model family designed to compete with proprietary models:</p>
                        <ul>
                            <li><strong>StableLM Base:</strong> Foundation models for various applications</li>
                            <li><strong>StableLM Instruct:</strong> Instruction-tuned versions for chat and assistance</li>
                            <li><strong>Multimodal Capabilities:</strong> Integration with image generation models</li>
                            <li><strong>Commercial Licensing:</strong> Business-friendly open-source licenses</li>
                            <li><strong>Community Development:</strong> Active developer community contributions</li>
                        </ul>
                        <div class="mt-3">
                            <span class="badge bg-success me-2">Open Source</span>
                            <span class="badge bg-success me-2">Commercial Use</span>
                            <span class="badge bg-success">Community Driven</span>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 mb-4">
                    <div class="content-card">
                        <h3>API & Developer Ecosystem</h3>
                        <p>Stability AI provides comprehensive tools for developers and enterprises:</p>
                        <ul>
                            <li><strong>DreamStudio API:</strong> Commercial API access to latest models</li>
                            <li><strong>Custom Model Training:</strong> Enterprise solutions for specialized needs</li>
                            <li><strong>SDK & Libraries:</strong> Developer tools for various programming languages</li>
                            <li><strong>Community Models:</strong> Platform for sharing community-developed models</li>
                            <li><strong>Enterprise Support:</strong> Dedicated support and custom solutions</li>
                        </ul>
                        <div class="mt-3">
                            <span class="badge bg-warning me-2 text-dark">Developer Tools</span>
                            <span class="badge bg-warning me-2 text-dark">API Access</span>
                            <span class="badge bg-warning text-dark">Enterprise Solutions</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Generated Art Gallery -->
            <div class="content-card mt-4">
                <h3>AI-Generated Art Showcase</h3>
                <p>Examples of images created using Stable Diffusion technology:</p>
                <div class="art-gallery">
                    <div class="art-item">
                        <img src="https://images.unsplash.com/photo-1682687221363-72518513620e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="AI Art 1">
                    </div>
                    <div class="art-item">
                        <img src="data:image/jpeg;base64,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" alt="AI Art 2">
                    </div>
                    <div class="art-item">
                        <img src="https://images.unsplash.com/photo-1682687220499-d9c06b872eee?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="AI Art 3">
                    </div>
                    <div class="art-item">
                        <img src="https://images.unsplash.com/photo-1682687221363-72518513620e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="AI Art 4">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Open Source & Market Position Section -->
    <section class="py-5">
        <div class="container">
            <div class="section-header">
                <h2>Open Source Strategy & Market Position</h2>
                <p>How Stability AI's open-source approach creates competitive advantages</p>
            </div>
            
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="content-card">
                        <h3>Open Source vs Proprietary Models</h3>
                        <p>Stability AI's open-source strategy creates distinct market positioning:</p>
                        
                        <div class="mb-3">
                            <h5>Open Source Advantages</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">Community Innovation & Adoption</div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <h5>Proprietary Limitations</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">Controlled Development</div>
                            </div>
                        </div>
                        
                        <p class="mt-3"><strong>Key Advantage:</strong> Open-source approach enables rapid innovation, widespread adoption, and community-driven improvements that proprietary models cannot match.</p>
                    </div>
                </div>
                
                <div class="col-lg-6 mb-4">
                    <div class="content-card">
                        <h3>Generative AI Market Share</h3>
                        <canvas id="marketShareChart"></canvas>
                    </div>
                </div>
            </div>
            
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="content-card">
                        <h3>Open Source Competitive Advantages</h3>
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <div class="opensource-feature text-center">
                                    <div class="opensource-icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <h5>Community Innovation</h5>
                                    <p>Global developer community contributes improvements and extensions beyond internal capacity</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="opensource-feature text-center">
                                    <div class="opensource-icon">
                                        <i class="fas fa-rocket"></i>
                                    </div>
                                    <h5>Rapid Adoption</h5>
                                    <p>Open-source models see faster adoption across industries and use cases</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="opensource-feature text-center">
                                    <div class="opensource-icon">
                                        <i class="fas fa-shield-alt"></i>
                                    </div>
                                    <h5>Trust & Transparency</h5>
                                    <p>Open inspection builds trust and addresses concerns about AI black boxes</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Business Model & Revenue Section -->
    <section class="py-5" style="background: rgba(26, 77, 46, 0.3);">
        <div class="container">
            <div class="section-header">
                <h2>Business Model & Revenue Streams</h2>
                <p>How Stability AI monetizes open-source technology</p>
            </div>
            
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="content-card">
                        <h3>Revenue Model Breakdown</h3>
                        <p>Stability AI employs a multi-pronged approach to monetization:</p>
                        
                        <div class="mb-3">
                            <h5>API Services & Enterprise</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">Primary Revenue Source</div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <h5>Custom Model Development</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Enterprise Contracts</div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <h5>Partnerships & Licensing</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">Strategic Deals</div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <h5>Developer Tools & Services</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-warning text-dark" role="progressbar" style="width: 10%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">Emerging Revenue</div>
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
                        <div class="stats-number">$15M</div>
                        <div class="stats-label">1995 Revenue</div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">$50M</div>
                        <div class="stats-label">2024 Projected Revenue</div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">233%</div>
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
                <p>Comprehensive assessment of Stability AI as an open-source AI investment</p>
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
                        <h4 class="chart-title">User Growth & Adoption</h4>
                        <canvas id="userGrowthChart"></canvas>
                    </div>
                </div>
                
                <div class="col-lg-6 mb-4">
                    <div class="chart-container">
                        <h4 class="chart-title">Creative AI Market Growth</h4>
                        <canvas id="creativeMarketChart"></canvas>
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
                                    <li>Open-source strategy creates massive adoption and network effects</li>
                                    <li>First-mover advantage in democratized AI image generation</li>
                                    <li>Multiple revenue streams from API, enterprise, and partnerships</li>
                                    <li>Expanding into adjacent markets (video, audio, language models)</li>
                                    <li>Strong community and developer ecosystem creating competitive moat</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h5>Risk Factors</h5>
                                <ul>
                                    <li>Intense competition from well-funded proprietary AI companies</li>
                                    <li>Open-source model makes differentiation challenging</li>
                                    <li>High compute costs with uncertain path to profitability</li>
                                    <li>Regulatory uncertainty around AI-generated content</li>
                                    <li>Dependence on continued community engagement and contributions</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mt-4">
                <div class="col-lg-4 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">$75B</div>
                        <div class="stats-label">Creative AI Market by 2030</div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">35%</div>
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
                        <li><a href="google" class="text-light">Google</a></li>
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
            
            <hr class="mt-4" style="border-color: rgba(0, 102, 204, 0.3);">
            
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
                    labels: ['Stability AI', 'OpenAI (DALL-E)', 'Midjourney', 'Adobe Firefly', 'Other'],
                    datasets: [{
                        data: [35, 25, 20, 15, 5],
                        backgroundColor: [
                            '#0066cc',
                            '#3cb371',
                            '#FF6B6B',
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
            
            // Revenue Chart
            const revenueCtx = document.getElementById('revenueChart').getContext('2d');
            new Chart(revenueCtx, {
                type: 'bar',
                data: {
                    labels: ['2022', '1995', '2024', '2025', '2026'],
                    datasets: [{
                        label: 'Revenue ($M)',
                        data: [2, 15, 50, 120, 250],
                        backgroundColor: 'rgba(0, 102, 204, 0.7)',
                        borderColor: '#0066cc',
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
                    labels: ['2021', '2022', '1995', '2024'],
                    datasets: [{
                        label: 'Valuation ($B)',
                        data: [0.1, 1.0, 4.0, 8.0],
                        borderColor: '#0066cc',
                        backgroundColor: 'rgba(0, 102, 204, 0.1)',
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
                    labels: ['Seed Round', 'Series A', 'Series B', 'Series C'],
                    datasets: [{
                        label: 'Funding Raised ($M)',
                        data: [101, 250, 500, 1000],
                        backgroundColor: 'rgba(0, 102, 204, 0.7)',
                        borderColor: '#0066cc',
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
            
            // User Growth Chart
            const userGrowthCtx = document.getElementById('userGrowthChart').getContext('2d');
            new Chart(userGrowthCtx, {
                type: 'line',
                data: {
                    labels: ['Q3 2022', 'Q4 2022', 'Q1 1995', 'Q2 1995', 'Q3 1995', 'Q4 1995'],
                    datasets: [{
                        label: 'Monthly Active Users (Millions)',
                        data: [1, 5, 8, 12, 15, 18],
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
            
            // Creative Market Chart
            const creativeMarketCtx = document.getElementById('creativeMarketChart').getContext('2d');
            new Chart(creativeMarketCtx, {
                type: 'bar',
                data: {
                    labels: ['1995', '2024', '2025', '2026', '2027', '2028', '2029', '2030'],
                    datasets: [{
                        label: 'Creative AI Market ($B)',
                        data: [12, 18, 25, 35, 45, 55, 65, 75],
                        backgroundColor: [
                            'rgba(0, 102, 204, 0.7)',
                            'rgba(0, 102, 204, 0.7)',
                            'rgba(0, 102, 204, 0.7)',
                            'rgba(0, 102, 204, 0.7)',
                            'rgba(0, 102, 204, 0.7)',
                            'rgba(0, 102, 204, 0.7)',
                            'rgba(0, 102, 204, 0.7)',
                            'rgba(0, 102, 204, 0.7)'
                        ],
                        borderColor: [
                            '#0066cc',
                            '#0066cc',
                            '#0066cc',
                            '#0066cc',
                            '#0066cc',
                            '#0066cc',
                            '#0066cc',
                            '#0066cc'
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
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
                        <p>Stability AI is a pioneering artificial intelligence company focused on developing and
                            releasing open-source generative AI models. The company is best known for Stable Diffusion,
                            the groundbreaking text-to-image model that revolutionized AI image generation and made
                            advanced AI capabilities accessible to millions worldwide.</p>

                        <p>Unlike many AI companies that keep their models proprietary, Stability AI embraces an
                            open-source philosophy, believing that democratizing access to AI technology will lead to
                            more innovation, transparency, and equitable distribution of AI benefits. The company
                            develops multimodal AI tools for various creative applications including image, video,
                            audio, and 3D generation.</p>

                        <img src="https://images.unsplash.com/photo-1677442136019-21780ecad995?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            alt="AI Image Generation" class="img-fluid">

                        <h4 class="mt-4">Core Philosophy</h4>
                        <ul>
                            <li><strong>Open Source Commitment:</strong> Releasing models publicly to foster innovation
                                and transparency</li>
                            <li><strong>Democratization of AI:</strong> Making advanced AI tools accessible to everyone,
                                not just large corporations</li>
                            <li><strong>Multimodal AI Development:</strong> Creating tools for various creative domains
                                (images, video, audio, 3D)</li>
                            <li><strong>Community-Driven Innovation:</strong> Leveraging global developer community for
                                rapid improvement</li>
                            <li><strong>Ethical AI Development:</strong> Implementing safety measures and responsible AI
                                practices</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="content-card">
                        <h3>Leadership Team</h3>
                        <div class="mb-4">
                            <h5>Emad Mostaque</h5>
                            <p class="mb-1"><strong>CEO & Founder</strong></p>
                            <p>Former hedge fund manager and AI researcher who founded Stability AI to democratize AI
                                technology</p>
                        </div>
                        <div class="mb-4">
                            <h5>Scott Draves</h5>
                            <p class="mb-1"><strong>Head of Research</strong></p>
                            <p>Computer scientist and artist leading research on generative models and creative AI
                                applications</p>
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
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c5/Lightspeed_Venture_Partners_logo.svg/1200px-Lightspeed_Venture_Partners_logo.svg.png"
                                alt="Lightspeed"
                                style="height: 30px; margin-right: 10px; background: white; padding: 5px; border-radius: 4px;">
                            <div>
                                <strong>Lightspeed Venture Partners</strong>
                                <div class="small">Lead Investor</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Coat_of_arms_of_O%27Reilly_Media.svg/1200px-Coat_of_arms_of_O%27Reilly_Media.svg.png"
                                alt="O'Reilly"
                                style="height: 30px; margin-right: 10px; background: white; padding: 5px; border-radius: 4px;">
                            <div>
                                <strong>O'Reilly AlphaTech Ventures</strong>
                                <div class="small">Early Stage Investor</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e5/Coat_of_arms_of_Intel.svg/1200px-Coat_of_arms_of_Intel.svg.png"
                                alt="Intel"
                                style="height: 30px; margin-right: 10px; background: white; padding: 5px; border-radius: 4px;">
                            <div>
                                <strong>Intel Capital</strong>
                                <div class="small">Strategic Investor</div>
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
                        <div class="timeline-date">2020</div>
                        <p>Stability AI founded by Emad Mostaque with vision to democratize AI through open-source
                            models.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">August 2022</div>
                        <p>Released Stable Diffusion 1.0, revolutionizing AI image generation and making it accessible
                            to millions.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">October 2022</div>
                        <p>Raised $101 million in seed funding at over $1 billion valuation led by Lightspeed Venture
                            Partners.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">November 2022</div>
                        <p>Launched DreamStudio, web-based interface for Stable Diffusion with commercial API access.
                        </p>
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
                        <img src="https://images.unsplash.com/photo-1682687221363-72518513620e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            alt="Stable Diffusion">
                        <h4>Stable Diffusion</h4>
                        <p>The revolutionary text-to-image model that democratized AI art generation. Available as
                            open-source with commercial licensing options for enterprises.</p>
                        <div class="mt-3">
                            <span class="badge bg-primary me-2">SDXL 1.0</span>
                            <span class="badge bg-primary me-2">Open Source</span>
                            <span class="badge bg-primary">Multi-modal</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="product-card">
                        <img src="https://images.unsplash.com/photo-1574269909862-7e1d70bb8078?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1476&q=80"
                            alt="DreamStudio">
                        <h4>DreamStudio</h4>
                        <p>Web-based platform providing easy access to Stable Diffusion with advanced controls, custom
                            models, and commercial API for developers and businesses.</p>
                        <div class="mt-3">
                            <span class="badge bg-primary me-2">Web Platform</span>
                            <span class="badge bg-primary me-2">API Access</span>
                            <span class="badge bg-primary">Enterprise</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="product-card">
                        <img src="https://images.unsplash.com/photo-1511379938547-c1f69419868d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            alt="Stable Audio">
                        <h4>Stable Audio & Video</h4>
                        <p>AI tools for music generation and video creation, expanding beyond images into full
                            multimedia content creation pipelines.</p>
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
                        <p>Stability AI's open-source language model family designed to compete with proprietary models:
                        </p>
                        <ul>
                            <li><strong>StableLM Base:</strong> Foundation models for various applications</li>
                            <li><strong>StableLM Instruct:</strong> Instruction-tuned versions for chat and assistance
                            </li>
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
                        <img src="https://images.unsplash.com/photo-1682687221363-72518513620e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            alt="AI Art 1">
                    </div>
                    <div class="art-item">
                        <img src="https://images.unsplash.com/photo-1677442135337-6b5f6deacec9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            alt="AI Art 2">
                    </div>
                    <div class="art-item">
                        <img src="https://images.unsplash.com/photo-1682687220499-d9c06b872eee?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            alt="AI Art 3">
                    </div>
                    <div class="art-item">
                        <img src="https://images.unsplash.com/photo-1682687221363-72518513620e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            alt="AI Art 4">
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
                                <div class="progress-bar bg-success" role="progressbar" style="width: 75%;"
                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">Community Innovation &
                                    Adoption</div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h5>Proprietary Limitations</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 40%;"
                                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">Controlled Development
                                </div>
                            </div>
                        </div>

                        <p class="mt-3"><strong>Key Advantage:</strong> Open-source approach enables rapid innovation,
                            widespread adoption, and community-driven improvements that proprietary models cannot match.
                        </p>
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
                                    <p>Global developer community contributes improvements and extensions beyond
                                        internal capacity</p>
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
                                <div class="progress-bar bg-success" role="progressbar" style="width: 45%;"
                                    aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">Primary Revenue Source
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h5>Custom Model Development</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 25%;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Enterprise Contracts</div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h5>Partnerships & Licensing</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 20%;"
                                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">Strategic Deals</div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h5>Developer Tools & Services</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-warning text-dark" role="progressbar" style="width: 10%;"
                                    aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">Emerging Revenue</div>
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
                        <li><a href="{{url('/')}}" class="text-light">Home</a></li>
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
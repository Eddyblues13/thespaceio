<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NVIDIA - AI Investment Analysis</title>
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
            --nvidia-green: #76b900;
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
            color: var(--nvidia-green);
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
            border-bottom: 1px solid var(--nvidia-green);
        }

        .navbar-brand {
            font-weight: bold;
            color: var(--nvidia-green) !important;
            font-size: 1.5rem;
        }

        .nav-link {
            color: var(--text-color) !important;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: var(--nvidia-green) !important;
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
            font-weight: 900;
            /* Increased from 700 to 900 for thickness */
            margin-bottom: 1.5rem;
            background: linear-gradient(to right, var(--nvidia-green), #7cfc00);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.5);
            /* Added shadow effect */
            letter-spacing: 0.5px;
            /* Slightly increased letter spacing for better readability */
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
            border: 1px solid rgba(118, 185, 0, 0.3);
            height: 100%;
        }

        .company-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
            border-color: var(--nvidia-green);
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
            border-left: 4px solid var(--nvidia-green);
        }

        .stock-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--nvidia-green);
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
            color: var(--nvidia-green);
        }

        .section-header::after {
            content: '';
            display: block;
            width: 100px;
            height: 3px;
            background: var(--nvidia-green);
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
            border: 1px solid rgba(118, 185, 0, 0.3);
            height: 100%;
        }

        .chart-title {
            color: var(--nvidia-green);
            margin-bottom: 15px;
            font-size: 1.2rem;
        }

        /* Content Cards */
        .content-card {
            background: rgba(26, 77, 46, 0.7);
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 30px;
            border: 1px solid rgba(118, 185, 0, 0.3);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .content-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
            border-color: var(--nvidia-green);
        }

        .content-card h3 {
            color: var(--nvidia-green);
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
            border: 1px solid rgba(118, 185, 0, 0.3);
            text-align: center;
            transition: transform 0.3s;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            border-color: var(--nvidia-green);
        }

        .stats-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--nvidia-green);
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
            background: var(--nvidia-green);
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
            background: var(--nvidia-green);
        }

        .timeline-date {
            font-weight: bold;
            color: var(--nvidia-green);
            margin-bottom: 5px;
        }

        /* Footer */
        footer {
            background-color: rgba(10, 46, 26, 0.9);
            padding: 50px 0 20px;
            margin-top: 50px;
            border-top: 1px solid var(--nvidia-green);
        }

        .footer-heading {
            color: var(--nvidia-green);
            margin-bottom: 20px;
            font-size: 1.2rem;
        }

        /* Product Cards */
        .product-card {
            background: rgba(26, 77, 46, 0.7);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid rgba(118, 185, 0, 0.3);
            transition: transform 0.3s;
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-5px);
            border-color: var(--nvidia-green);
        }

        .product-card img {
            border-radius: 8px;
            margin-bottom: 15px;
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
                            <li><a class="dropdown-item" href="runway">Runway AI</a></li>
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
                    <img src="img/nvidia.png" alt="NVIDIA" class="company-logo mb-4" style="height: 80px;">
                    <h1 class="hero-title">NVIDIA Corporation</h1>
                    <p class="hero-subtitle">The Pioneer of GPU Computing and AI Infrastructure</p>
                    <div class="mt-4">
                        <a href="#investment-analysis" class="btn btn-primary btn-lg me-3">Investment Analysis</a>
                        <br><br>
                        <a href="#company-overview" class="btn btn-outline-light btn-lg">Company Overview</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="company-card">
                        <div class="stock-widget">
                            <div class="stock-price">$950.02</div>
                            <div class="stock-change positive">+5.12% <i class="fas fa-arrow-up"></i></div>
                            <small>Last updated: 10:15 AM EST</small>
                        </div>
                        <div class="row mt-4">
                            <div class="col-6">
                                <div class="stats-card">
                                    <div class="stats-number">1993</div>
                                    <div class="stats-label">Founded</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stats-card">
                                    <div class="stats-number">$2.7T</div>
                                    <div class="stats-label">Market Cap</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stats-card">
                                    <div class="stats-number">95%</div>
                                    <div class="stats-label">AI GPU Market Share</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stats-card">
                                    <div class="stats-number">26,196</div>
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
                <p>Understanding NVIDIA's transformation from graphics company to AI computing leader</p>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="content-card">
                        <h3>About NVIDIA</h3>
                        <p>NVIDIA Corporation is an American multinational technology company incorporated in Delaware
                            and based in Santa Clara, California. Founded in 1993, NVIDIA is a global leader in
                            artificial intelligence computing and is known for inventing the GPU which sparked the
                            growth of the PC gaming market.</p>

                        <p>The company has successfully transformed from a graphics chip company into a computing
                            platform company focused on four markets: Gaming, Data Center, Professional Visualization,
                            and Automotive. NVIDIA's GPUs are now the gold standard for AI training and inference,
                            powering everything from autonomous vehicles to large language models like ChatGPT.</p>

                        <img src="https://images.unsplash.com/photo-1620712943543-bcc4688e7485?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1465&q=80"
                            alt="NVIDIA GPU Technology" class="img-fluid">

                        <h4 class="mt-4">Strategic Focus Areas</h4>
                        <ul>
                            <li><strong>AI Computing:</strong> Providing the hardware infrastructure for training and
                                running AI models</li>
                            <li><strong>Data Center Solutions:</strong> Enterprise-grade AI systems and supercomputing
                                platforms</li>
                            <li><strong>Autonomous Vehicles:</strong> DRIVE platform for self-driving cars and robotics
                            </li>
                            <li><strong>Omniverse:</strong> Real-time 3D design collaboration and simulation platform
                            </li>
                            <li><strong>Gaming & Graphics:</strong> Continued leadership in consumer and professional
                                graphics</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="content-card">
                        <h3>Leadership Team</h3>
                        <div class="mb-4">
                            <h5>Jensen Huang</h5>
                            <p class="mb-1"><strong>Founder & CEO</strong></p>
                            <p>Visionary leader who has guided NVIDIA's transformation into an AI computing powerhouse
                            </p>
                        </div>
                        <div class="mb-4">
                            <h5>Colette Kress</h5>
                            <p class="mb-1"><strong>Executive VP & CFO</strong></p>
                            <p>Leading financial strategy and operations during period of massive growth</p>
                        </div>
                        <div class="mb-4">
                            <h5>Jay Puri</h5>
                            <p class="mb-1"><strong>Executive VP, Worldwide Field Operations</strong></p>
                            <p>Overseeing global sales and business development</p>
                        </div>
                        <div>
                            <h5>Tim Teter</h5>
                            <p class="mb-1"><strong>Executive VP, General Counsel</strong></p>
                            <p>Leading legal, regulatory, and compliance functions</p>
                        </div>
                    </div>

                    <div class="content-card">
                        <h3>Major Partnerships</h3>
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Microsoft_logo.svg/1200px-Microsoft_logo.svg.png"
                                alt="Microsoft" style="height: 35px; width: 70px; margin-right: 10px;">
                            <div>
                                <strong>Microsoft Azure</strong>
                                <div class="small">Cloud AI Infrastructure</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/1200px-Google_2015_logo.svg.png"
                                alt="Google" style="height: 35px; width: 70px; margin-right: 10px;">
                            <div>
                                <strong>Google Cloud</strong>
                                <div class="small">TPU & GPU Integration</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Apple_logo_black.svg/1200px-Apple_logo_black.svg.png"
                                alt="Apple" style="height: 35px; width: 70px; margin-right: 10px;">
                            <div>
                                <strong>Apple</strong>
                                <div class="small">Graphics Technology</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/bb/Tesla_T_symbol.svg/1200px-Tesla_T_symbol.svg.png"
                                alt="Tesla" style="height: 35px; width: 70px; margin-right: 10px;">
                            <div>
                                <strong>Tesla</strong>
                                <div class="small">Autonomous Driving</div>
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
                        <div class="timeline-date">April 1993</div>
                        <p>NVIDIA founded by Jensen Huang, Chris Malachowsky, and Curtis Priem with focus on graphics
                            processing for gaming and multimedia.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">1999</div>
                        <p>Introduction of GeForce 256, marketed as "the world's first GPU," defining the graphics
                            processing unit category.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">2006</div>
                        <p>Launch of CUDA (Compute Unified Device Architecture), enabling general-purpose computing on
                            GPUs and laying foundation for AI revolution.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">2012</div>
                        <p>AlexNet deep learning model trained on NVIDIA GPUs wins ImageNet competition, demonstrating
                            GPU superiority for AI training.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">2016</div>
                        <p>Introduction of DGX-1, the world's first deep learning supercomputer in a box, priced at
                            $129,000.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">2020</div>
                        <p>Announcement of planned acquisition of ARM for $40 billion (later terminated due to
                            regulatory challenges).</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">2022</div>
                        <p>Launch of H100 Tensor Core GPU, specifically designed for large-scale AI and HPC workloads.
                        </p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">1995</div>
                        <p>NVIDIA becomes first chip company to reach $1 trillion market capitalization, driven by AI
                            boom.</p>
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
                <p>NVIDIA's comprehensive AI computing ecosystem</p>
            </div>

            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="product-card">
                        <img src="https://images.unsplash.com/photo-1591799264318-7e6ef8ddb7ea?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80"
                            alt="NVIDIA GPU">
                        <h4>Data Center GPUs</h4>
                        <p>H100, A100, and V100 Tensor Core GPUs designed for AI training and inference at scale. These
                            processors are essential for training large language models and running AI applications.</p>
                        <div class="mt-3">
                            <span class="badge bg-primary me-2">H100</span>
                            <span class="badge bg-primary me-2">A100</span>
                            <span class="badge bg-primary">V100</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="product-card">
                        <img src="https://images.unsplash.com/photo-1587199572634-32705e3bf49c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            alt="NVIDIA DGX System">
                        <h4>DGX Systems</h4>
                        <p>AI supercomputers that integrate multiple GPUs with optimized software stack. DGX systems are
                            used by leading AI research organizations and enterprises for cutting-edge AI development.
                        </p>
                        <div class="mt-3">
                            <span class="badge bg-primary me-2">DGX H100</span>
                            <span class="badge bg-primary me-2">DGX A100</span>
                            <span class="badge bg-primary">DGX Station</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="product-card">
                        <img src="https://images.unsplash.com/photo-1591799934706-8665913c46c2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80"
                            alt="NVIDIA DRIVE Platform">
                        <h4>DRIVE Platform</h4>
                        <p>End-to-end platform for autonomous vehicles, combining hardware, software, and AI
                            capabilities. Used by automotive manufacturers for developing self-driving technology.</p>
                        <div class="mt-3">
                            <span class="badge bg-primary me-2">DRIVE Orin</span>
                            <span class="badge bg-primary me-2">DRIVE Atlan</span>
                            <span class="badge bg-primary">DRIVE Hyperion</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-6 mb-4">
                    <div class="content-card">
                        <h3>CUDA & Software Ecosystem</h3>
                        <p>NVIDIA's software platform is as important as its hardware, enabling developers to harness
                            the full power of GPUs for diverse computing tasks:</p>
                        <ul>
                            <li><strong>CUDA:</strong> Parallel computing platform and programming model</li>
                            <li><strong>cuDNN:</strong> Deep neural network library</li>
                            <li><strong>TensorRT:</strong> High-performance deep learning inference optimizer</li>
                            <li><strong>RAPIDS:</strong> Suite of open-source software libraries for data science</li>
                            <li><strong>Omniverse:</strong> Platform for 3D simulation and design collaboration</li>
                        </ul>
                        <div class="mt-3">
                            <span class="badge bg-success me-2">CUDA</span>
                            <span class="badge bg-success me-2">TensorRT</span>
                            <span class="badge bg-success">RAPIDS</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="content-card">
                        <h3>AI Platforms & Solutions</h3>
                        <p>NVIDIA offers comprehensive AI solutions across multiple domains and industries:</p>
                        <ul>
                            <li><strong>NVIDIA AI Enterprise:</strong> End-to-end cloud-native AI software platform</li>
                            <li><strong>Clara Healthcare:</strong> AI platform for medical imaging, genomics, and drug
                                discovery</li>
                            <li><strong>Metropolis:</strong> Video analytics platform for smart cities and spaces</li>
                            <li><strong>Isaac Robotics:</strong> Platform for developing and deploying AI-powered robots
                            </li>
                            <li><strong>Merlin:</strong> Framework for building large-scale recommender systems</li>
                        </ul>
                        <div class="mt-3">
                            <span class="badge bg-warning me-2 text-dark">AI Enterprise</span>
                            <span class="badge bg-warning me-2 text-dark">Clara</span>
                            <span class="badge bg-warning text-dark">Metropolis</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Market Position & Competition -->
    <section class="py-5">
        <div class="container">
            <div class="section-header">
                <h2>Market Position & Competition</h2>
                <p>NVIDIA's dominant position in the AI hardware ecosystem</p>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="content-card">
                        <h3>Competitive Landscape</h3>
                        <p>NVIDIA faces competition in various segments of the AI computing market:</p>

                        <div class="mb-3">
                            <h5>AMD</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 15%;"
                                    aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">Instinct GPUs</div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h5>Intel</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 10%;"
                                    aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">Habana, Gaudi</div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h5>Google</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 8%;"
                                    aria-valuenow="8" aria-valuemin="0" aria-valuemax="100">TPU</div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h5>Amazon</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-warning text-dark" role="progressbar" style="width: 5%;"
                                    aria-valuenow="5" aria-valuemin="0" aria-valuemax="100">Inferentia, Trainium</div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h5>Other Competitors</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 2%;"
                                    aria-valuenow="2" aria-valuemin="0" aria-valuemax="100">Startups</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="content-card">
                        <h3>AI GPU Market Share</h3>
                        <canvas id="marketShareChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="content-card">
                        <h3>Strategic Advantages</h3>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="text-center">
                                    <i class="fas fa-microchip fa-2x mb-3" style="color: var(--nvidia-green);"></i>
                                    <h5>Hardware Dominance</h5>
                                    <p>Industry-leading GPU architecture and performance for AI workloads</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="text-center">
                                    <i class="fas fa-code fa-2x mb-3" style="color: var(--nvidia-green);"></i>
                                    <h5>Software Ecosystem</h5>
                                    <p>Comprehensive CUDA platform with 20+ years of developer adoption</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="text-center">
                                    <i class="fas fa-network-wired fa-2x mb-3" style="color: var(--nvidia-green);"></i>
                                    <h5>Full Stack Approach</h5>
                                    <p>Hardware, software, systems, and platforms addressing entire AI workflow</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Financial Performance Section -->
    <section class="py-5" style="background: rgba(26, 77, 46, 0.3);">
        <div class="container">
            <div class="section-header">
                <h2>Financial Performance</h2>
                <p>NVIDIA's remarkable financial growth driven by AI adoption</p>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">$60.9B</div>
                        <div class="stats-label">FY2024 Revenue</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">$29.8B</div>
                        <div class="stats-label">Data Center Revenue</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">126%</div>
                        <div class="stats-label">Data Center YoY Growth</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">$32.3B</div>
                        <div class="stats-label">Net Income (TTM)</div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-6 mb-4">
                    <div class="chart-container">
                        <h4 class="chart-title">Revenue by Segment (FY2024)</h4>
                        <canvas id="revenueSegmentChart"></canvas>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="chart-container">
                        <h4 class="chart-title">Quarterly Revenue Growth</h4>
                        <canvas id="quarterlyRevenueChart"></canvas>
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
                <p>Comprehensive assessment of NVIDIA as an AI infrastructure investment</p>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="chart-container">
                        <h4 class="chart-title">Stock Performance (5 Years)</h4>
                        <canvas id="stockPerformanceChart"></canvas>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="chart-container">
                        <h4 class="chart-title">Market Capitalization Growth</h4>
                        <canvas id="marketCapChart"></canvas>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="chart-container">
                        <h4 class="chart-title">AI Market Opportunity</h4>
                        <canvas id="aiMarketChart"></canvas>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="chart-container">
                        <h4 class="chart-title">Data Center GPU Demand Forecast</h4>
                        <canvas id="gpuDemandChart"></canvas>
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
                                    <li>Dominant position in AI infrastructure with 95% market share in training chips
                                    </li>
                                    <li>Massive TAM expansion as AI becomes pervasive across industries</li>
                                    <li>Strong competitive moat with full-stack hardware/software approach</li>
                                    <li>Multiple growth vectors beyond data center (automotive, Omniverse, robotics)
                                    </li>
                                    <li>Continuous innovation with annual architectural improvements</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h5>Risk Factors</h5>
                                <ul>
                                    <li>Geopolitical risks and export restrictions affecting China market</li>
                                    <li>Increasing competition from custom silicon and alternative architectures</li>
                                    <li>Cyclical nature of semiconductor industry</li>
                                    <li>High valuation multiples requiring continued hypergrowth</li>
                                    <li>Dependence on TSMC for advanced manufacturing</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-4 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">$1T+</div>
                        <div class="stats-label">AI Chip Market by 2030</div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">40%</div>
                        <div class="stats-label">Projected CAGR (2024-2030)</div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">$300B</div>
                        <div class="stats-label">Potential Revenue by 2030</div>
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
                        <li><a href="oracle" class="text-light">Oracle</a></li>
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

            <hr class="mt-4" style="border-color: rgba(118, 185, 0, 0.3);">

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
                    labels: ['NVIDIA', 'AMD', 'Intel', 'Google', 'Amazon', 'Others'],
                    datasets: [{
                        data: [95, 3, 1, 0.5, 0.3, 0.2],
                        backgroundColor: [
                            '#76b900',
                            '#ED1C24',
                            '#0071C5',
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
            
            // Revenue Segment Chart
            const revenueSegmentCtx = document.getElementById('revenueSegmentChart').getContext('2d');
            new Chart(revenueSegmentCtx, {
                type: 'pie',
                data: {
                    labels: ['Data Center', 'Gaming', 'Professional Visualization', 'Automotive', 'OEM & Other'],
                    datasets: [{
                        data: [49, 35, 8, 5, 3],
                        backgroundColor: [
                            '#76b900',
                            '#2e8b57',
                            '#3cb371',
                            '#7cfc00',
                            '#66cdaa'
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
            
            // Quarterly Revenue Chart
            const quarterlyRevenueCtx = document.getElementById('quarterlyRevenueChart').getContext('2d');
            new Chart(quarterlyRevenueCtx, {
                type: 'bar',
                data: {
                    labels: ['Q1 FY23', 'Q2 FY23', 'Q3 FY23', 'Q4 FY23', 'Q1 FY24', 'Q2 FY24', 'Q3 FY24', 'Q4 FY24'],
                    datasets: [{
                        label: 'Revenue ($B)',
                        data: [8.29, 6.70, 6.05, 7.19, 7.19, 13.51, 18.12, 22.10],
                        backgroundColor: 'rgba(118, 185, 0, 0.7)',
                        borderColor: '#76b900',
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
            
            // Stock Performance Chart
            const stockPerformanceCtx = document.getElementById('stockPerformanceChart').getContext('2d');
            new Chart(stockPerformanceCtx, {
                type: 'line',
                data: {
                    labels: ['2019', '2020', '2021', '2022', '1995', '2024'],
                    datasets: [{
                        label: 'NVDA Stock Price ($)',
                        data: [50, 135, 330, 180, 480, 950],
                        borderColor: '#76b900',
                        backgroundColor: 'rgba(118, 185, 0, 0.1)',
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
            
            // Market Cap Chart
            const marketCapCtx = document.getElementById('marketCapChart').getContext('2d');
            new Chart(marketCapCtx, {
                type: 'line',
                data: {
                    labels: ['2018', '2019', '2020', '2021', '2022', '1995', '2024'],
                    datasets: [{
                        label: 'Market Cap ($B)',
                        data: [100, 150, 350, 800, 400, 1200, 2700],
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
            
            // AI Market Chart
            const aiMarketCtx = document.getElementById('aiMarketChart').getContext('2d');
            new Chart(aiMarketCtx, {
                type: 'bar',
                data: {
                    labels: ['AI Training', 'AI Inference', 'Autonomous Vehicles', 'Robotics', 'Healthcare AI'],
                    datasets: [{
                        label: 'Market Size by 2030 ($B)',
                        data: [300, 250, 200, 150, 100],
                        backgroundColor: [
                            'rgba(118, 185, 0, 0.7)',
                            'rgba(46, 139, 87, 0.7)',
                            'rgba(60, 179, 113, 0.7)',
                            'rgba(124, 252, 0, 0.7)',
                            'rgba(102, 205, 170, 0.7)'
                        ],
                        borderColor: [
                            '#76b900',
                            '#2e8b57',
                            '#3cb371',
                            '#7cfc00',
                            '#66cdaa'
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
            
            // GPU Demand Chart
            const gpuDemandCtx = document.getElementById('gpuDemandChart').getContext('2d');
            new Chart(gpuDemandCtx, {
                type: 'line',
                data: {
                    labels: ['2022', '1995', '2024', '2025', '2026', '2027', '2028', '2029', '2030'],
                    datasets: [{
                        label: 'Data Center GPU Units (Millions)',
                        data: [0.5, 1.2, 2.5, 4.0, 6.5, 10.0, 15.0, 22.0, 30.0],
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
        }
    </script>
</body>

</html>
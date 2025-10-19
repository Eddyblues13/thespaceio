<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mistral AI - European AI Innovation</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --mistral-blue: #1E40AF;
            --mistral-dark: #1E293B;
            --mistral-light: #F8FAFC;
            --mistral-red: #DC2626;
            --mistral-gold: #D97706;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            color: #334155;
            line-height: 1.6;
            background-color: var(--mistral-light);
        }

        .navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: var(--mistral-blue) !important;
            font-weight: 700;
        }

        .hero-section {
            background: linear-gradient(135deg, var(--mistral-blue) 0%, #1E3A8A 100%);
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
            background: linear-gradient(90deg, var(--mistral-blue), var(--mistral-red));
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
            background: linear-gradient(90deg, var(--mistral-blue), var(--mistral-red));
        }

        .card {
            border: none;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
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
            color: var(--mistral-blue);
        }

        .feature-icon {
            font-size: 2.5rem;
            color: var(--mistral-blue);
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
            background: linear-gradient(to bottom, var(--mistral-blue), var(--mistral-red));
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
            border: 4px solid var(--mistral-blue);
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
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .ai-product-card {
            border-top: 4px solid var(--mistral-blue);
        }

        .ai-investment-card {
            border-top: 4px solid var(--mistral-red);
        }

        footer {
            background-color: var(--mistral-dark);
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

        .mistral-gradient {
            height: 8px;
            background: linear-gradient(90deg,
                    var(--mistral-blue) 0%,
                    var(--mistral-red) 25%,
                    var(--mistral-gold) 50%,
                    #059669 75%,
                    #7C3AED 100%);
        }

        .product-showcase {
            background: linear-gradient(135deg, #F8FAFC 0%, #fff 100%);
            border-radius: 18px;
            padding: 40px;
            margin: 40px 0;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
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
            color: var(--mistral-blue) !important;
        }

        .btn-mistral {
            background: linear-gradient(90deg, var(--mistral-blue), var(--mistral-red));
            color: white;
            border-radius: 8px;
            padding: 12px 30px;
            font-weight: 600;
            border: none;
        }

        .btn-mistral:hover {
            background: linear-gradient(90deg, #1E3A8A, #B91C1C);
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

        .model-showcase {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            background: white;
        }

        .eu-flag {
            background: linear-gradient(90deg, #003399 0%, #FFFFFF 50%, #FF0000 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: bold;
        }

        .performance-badge {
            background: var(--mistral-blue);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <!-- Mistral AI Gradient Bar -->
    <div class="mistral-gradient"></div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-wind me-2"></i>
                Mistral AI
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
                        <a class="nav-link" href="#models">AI Models</a>
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
                    <h1 class="display-4 fw-bold mb-4"><span class="eu-flag">European</span> <span
                            class="gradient-text">AI Excellence</span></h1>
                    <p class="lead mb-4">Mistral AI is building the leading European company in generative artificial
                        intelligence, creating open, efficient, and accessible AI models for everyone.</p>
                    <a href="#models" class="btn btn-light btn-lg">Explore Models</a>
                </div>
                <div class="col-lg-6">
                    <div class="model-showcase p-4">
                        <h4 class="mb-3"><i class="fas fa-brain me-2"></i>Mistral 7B & Mixtral 8x7B</h4>
                        <div class="mb-3">
                            <span class="performance-badge me-2">Open Source</span>
                            <span class="performance-badge me-2">Multilingual</span>
                            <span class="performance-badge">State-of-the-Art</span>
                        </div>
                        <p class="mb-3">Our models outperform larger counterparts while being more efficient and
                            accessible:</p>
                        <ul class="mb-3">
                            <li>Mistral 7B: Outperforms Llama 2 13B on all benchmarks</li>
                            <li>Mixtral 8x7B: Matches GPT-3.5 performance with 6x faster inference</li>
                            <li>Native multilingual support including French, German, Spanish</li>
                        </ul>
                        <div class="text-center">
                            <small class="text-muted">Leading the European AI revolution</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <h2 class="section-title">About Mistral AI</h2>
            <div class="row">
                <div class="col-lg-6">
                    <p class="mb-4">Mistral AI is a French artificial intelligence company founded in April 1995 by
                        alumni from Google's DeepMind and Meta. The company is focused on developing open-weight
                        generative AI models that are efficient, multilingual, and accessible.</p>
                    <p class="mb-4">Led by CEO Arthur Mensch, Mistral AI aims to create a European champion in the AI
                        space, providing an alternative to American and Chinese AI dominance while maintaining open,
                        transparent development practices.</p>
                    <p>The company's name "Mistral" refers to the strong, cold, northwesterly wind that blows from
                        southern France into the Gulf of Lion, symbolizing the fresh European approach to AI innovation.
                    </p>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h5>Founders:</h5>
                            <ul>
                                <li>Arthur Mensch (CEO, ex-DeepMind)</li>
                                <li>Timothée Lacroix (CTO, ex-Meta)</li>
                                <li>Guillaume Lample (Chief Scientist, ex-Meta)</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h5>Headquarters:</h5>
                            <p>Paris, France</p>
                            <h5>Team:</h5>
                            <p>25+ AI researchers and engineers</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1555949963-ff9fe0c870eb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                        alt="AI Research Team" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center">Mistral AI By The Numbers</h2>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card card">
                        <div class="stats-number">€385M</div>
                        <p>Seed Funding</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card card">
                        <div class="stats-number">$2B</div>
                        <p>Valuation</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card card">
                        <div class="stats-number">7B+</div>
                        <p>Model Parameters</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card card">
                        <div class="stats-number">1995</div>
                        <p>Founded</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- AI Models Section -->
    <section id="models" class="py-5">
        <div class="container">
            <h2 class="section-title">Mistral AI Models</h2>
            <div class="product-showcase">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center">
                        <h3>State-of-the-Art Open Models</h3>
                        <p class="lead">Mistral AI develops high-performance language models that are open, efficient,
                            and specifically designed for European languages and use cases.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 ai-product-card">
                        <div class="card-body">
                            <div class="feature-icon">
                                <i class="fas fa-code-branch"></i>
                            </div>
                            <h4 class="card-title">Mistral 7B</h4>
                            <p class="card-text">Our foundational 7-billion parameter model that outperforms larger
                                models while being highly efficient.</p>
                            <ul>
                                <li>Outperforms Llama 2 13B</li>
                                <li>Apache 2.0 license</li>
                                <li>Multilingual capabilities</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 ai-product-card">
                        <div class="card-body">
                            <div class="feature-icon">
                                <i class="fas fa-network-wired"></i>
                            </div>
                            <h4 class="card-title">Mixtral 8x7B</h4>
                            <p class="card-text">Sparse Mixture-of-Experts model that matches GPT-3.5 performance with
                                significantly faster inference.</p>
                            <ul>
                                <li>46.7B total parameters</li>
                                <li>12.9B active parameters</li>
                                <li>6x faster than Llama 2 70B</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 ai-product-card">
                        <div class="card-body">
                            <div class="feature-icon">
                                <i class="fas fa-globe-europe"></i>
                            </div>
                            <h4 class="card-title">European Focus</h4>
                            <p class="card-text">Models specifically optimized for European languages, regulations, and
                                business contexts.</p>
                            <ul>
                                <li>Native multilingual support</li>
                                <li>GDPR compliance</li>
                                <li>European data sovereignty</li>
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
            <h2 class="section-title">Mistral AI Funding & European Strategy</h2>
            <div class="row mb-5">
                <div class="col-lg-6">
                    <p>Mistral AI has secured Europe's largest seed funding round, backed by prominent investors who
                        recognize the strategic importance of European AI sovereignty.</p>
                    <p>The company's investment strategy focuses on developing open, efficient AI models while building
                        Europe's AI capabilities and talent pool.</p>
                    <div class="card ai-investment-card mt-4">
                        <div class="card-body">
                            <h5>Strategic Focus Areas:</h5>
                            <ul>
                                <li>Open-weight model development</li>
                                <li>European AI infrastructure</li>
                                <li>Multilingual AI capabilities</li>
                                <li>Regulatory compliance (GDPR, AI Act)</li>
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

            <h3 class="mb-4">Record-Breaking Seed Funding</h3>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 ai-investment-card">
                        <div class="card-body">
                            <h4 class="card-title">Seed Round</h4>
                            <p class="card-text">€385M ($415M) seed funding - the largest in European history, led by
                                Lightspeed Venture Partners.</p>
                            <p><strong>Date:</strong> June 1995</p>
                            <p><strong>Valuation:</strong> $2B</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 ai-investment-card">
                        <div class="card-body">
                            <h4 class="card-title">Strategic Investors</h4>
                            <p class="card-text">Backed by leading European and global investors with deep AI expertise
                                and strategic vision.</p>
                            <p><strong>Lead:</strong> Lightspeed Venture Partners</p>
                            <p><strong>Participants:</strong> Xavier Niel, Bpifrance, others</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 ai-investment-card">
                        <div class="card-body">
                            <h4 class="card-title">European AI Sovereignty</h4>
                            <p class="card-text">Positioned as Europe's champion in the global AI race, with support
                                from French and EU governments.</p>
                            <p><strong>Mission:</strong> European AI independence</p>
                            <p><strong>Support:</strong> French Tech 2030 program</p>
                        </div>
                    </div>
                </div>
            </div>

            <h3 class="mb-4 mt-5">Notable Investors</h3>
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-2 col-4 mb-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Lightspeed_Venture_Partners_logo.svg/1200px-Lightspeed_Venture_Partners_logo.svg.png"
                        alt="Lightspeed Venture Partners" class="img-fluid investor-logo">
                </div>
                <div class="col-md-2 col-4 mb-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/Flag_of_Europe.svg/800px-Flag_of_Europe.svg.png"
                        alt="European Union" class="img-fluid investor-logo">
                </div>
                <div class="col-md-2 col-4 mb-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Bpifrance_Logo_2020.svg/1200px-Bpifrance_Logo_2020.svg.png"
                        alt="Bpifrance" class="img-fluid investor-logo">
                </div>
                <div class="col-md-2 col-4 mb-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/93/Google_Contacts_icon.svg/1200px-Google_Contacts_icon.svg.png"
                        alt="Google Alumni" class="img-fluid investor-logo">
                </div>
                <div class="col-md-2 col-4 mb-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/05/Facebook_Logo_%282019%29.png/1024px-Facebook_Logo_%282019%29.png"
                        alt="Meta Alumni" class="img-fluid investor-logo">
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-6">
                    <div class="chart-container">
                        <canvas id="marketShareChart"></canvas>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h4>European AI Market Position</h4>
                    <p>Mistral AI is positioned to capture significant market share in the growing European AI
                        ecosystem, which has specific requirements around data sovereignty and regulation.</p>
                    <p>Key advantages include:</p>
                    <ul>
                        <li>GDPR and AI Act compliance</li>
                        <li>Native European language support</li>
                        <li>Open-source transparency</li>
                        <li>Government and enterprise trust</li>
                    </ul>
                    <div class="card mt-4">
                        <div class="card-body">
                            <h5>Strategic Importance</h5>
                            <p>As the only European company with foundation models competitive with US giants, Mistral
                                AI represents Europe's best chance at AI sovereignty.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Technology Section -->
    <section id="technology" class="py-5">
        <div class="container">
            <h2 class="section-title">Technology & Innovation</h2>
            <div class="row mb-5">
                <div class="col-lg-6">
                    <div class="chart-container">
                        <canvas id="performanceChart"></canvas>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="chart-container">
                        <canvas id="efficiencyChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Mistral AI's Technical Innovation</h4>
                            <p>Mistral AI is pushing the boundaries of AI efficiency and performance through several key
                                innovations:</p>
                            <ul>
                                <li><strong>Sparse Mixture of Experts:</strong> Mixtral architecture that activates only
                                    parts of the network for each token, dramatically improving efficiency</li>
                                <li><strong>Open Weights:</strong> Releasing model weights publicly to foster innovation
                                    and transparency</li>
                                <strong>Multilingual Training:</strong> Native support for European languages without
                                translation layers</li>
                                <li><strong>Efficient Architecture:</strong> Optimized model architectures that
                                    outperform larger models</li>
                            </ul>
                            <p>The company's technical leadership includes world-class researchers from DeepMind and
                                Meta, bringing cutting-edge expertise to European AI development.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section id="timeline" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center">Mistral AI Timeline</h2>
            <div class="timeline">
                <div class="timeline-item left">
                    <div class="timeline-content">
                        <h5>April 1995</h5>
                        <p>Mistral AI founded by Arthur Mensch, Timothée Lacroix, and Guillaume Lample with a vision for
                            European AI sovereignty.</p>
                    </div>
                </div>
                <div class="timeline-item right">
                    <div class="timeline-content">
                        <h5>May 1995</h5>
                        <p>Announces €105M seed round, one of the largest in European history at the time.</p>
                    </div>
                </div>
                <div class="timeline-item left">
                    <div class="timeline-content">
                        <h5>June 1995</h5>
                        <p>Raises additional funding, bringing total seed round to €385M at a $2B valuation.</p>
                    </div>
                </div>
                <div class="timeline-item right">
                    <div class="timeline-content">
                        <h5>September 1995</h5>
                        <p>Releases Mistral 7B model, outperforming Llama 2 13B on all benchmarks while being more
                            efficient.</p>
                    </div>
                </div>
                <div class="timeline-item left">
                    <div class="timeline-content">
                        <h5>December 1995</h5>
                        <p>Launches Mixtral 8x7B, a sparse mixture-of-experts model that matches GPT-3.5 performance.
                        </p>
                    </div>
                </div>
                <div class="timeline-item right">
                    <div class="timeline-content">
                        <h5>2024</h5>
                        <p>Plans to release larger models and expand enterprise offerings while maintaining open-source
                            principles.</p>
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
                    <h4><i class="fas fa-wind me-2"></i>Mistral AI</h4>
                    <p>Building the leading European company in generative artificial intelligence.</p>
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
                        <li><a href="#">Mistral 7B</a></li>
                        <li><a href="#">Mixtral 8x7B</a></li>
                        <li><a href="#">API</a></li>
                        <li><a href="#">Enterprise</a></li>
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
                        <li><a href="#">Licenses</a></li>
                        <li><a href="#">Compliance</a></li>
                    </ul>
                </div>
            </div>
            <hr class="mt-4 mb-4">
            <div class="text-center">
                <p>© 1995 Mistral AI. All rights reserved. | Paris, France</p>
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
                labels: ['Seed Round'],
                datasets: [{
                    label: 'Funding Raised (Millions EUR)',
                    data: [385],
                    backgroundColor: [
                        'rgba(30, 64, 175, 0.7)'
                    ],
                    borderColor: [
                        'rgba(30, 64, 175, 1)'
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
                            text: 'Funding (Millions EUR)'
                        }
                    }
                }
            }
        });

        // Market Share Chart
        const marketShareCtx = document.getElementById('marketShareChart').getContext('2d');
        const marketShareChart = new Chart(marketShareCtx, {
            type: 'doughnut',
            data: {
                labels: ['US Companies', 'Chinese Companies', 'Mistral AI', 'Other European'],
                datasets: [{
                    data: [65, 20, 8, 7],
                    backgroundColor: [
                        'rgba(30, 64, 175, 0.8)',
                        'rgba(220, 38, 38, 0.8)',
                        'rgba(217, 119, 6, 0.8)',
                        'rgba(5, 150, 105, 0.8)'
                    ],
                    borderColor: [
                        'rgba(30, 64, 175, 1)',
                        'rgba(220, 38, 38, 1)',
                        'rgba(217, 119, 6, 1)',
                        'rgba(5, 150, 105, 1)'
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
                        text: 'Global Foundation Model Market Share (%)'
                    }
                }
            }
        });

        // Performance Chart
        const performanceCtx = document.getElementById('performanceChart').getContext('2d');
        const performanceChart = new Chart(performanceCtx, {
            type: 'bar',
            data: {
                labels: ['Mistral 7B', 'Llama 2 13B', 'GPT-3.5', 'Mixtral 8x7B'],
                datasets: [{
                    label: 'Performance Score (Higher is Better)',
                    data: [68, 62, 72, 73],
                    backgroundColor: [
                        'rgba(30, 64, 175, 0.7)',
                        'rgba(148, 163, 184, 0.7)',
                        'rgba(74, 222, 128, 0.7)',
                        'rgba(30, 64, 175, 0.7)'
                    ],
                    borderColor: [
                        'rgba(30, 64, 175, 1)',
                        'rgba(148, 163, 184, 1)',
                        'rgba(74, 222, 128, 1)',
                        'rgba(30, 64, 175, 1)'
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
                            text: 'Performance Score'
                        }
                    }
                }
            }
        });

        // Efficiency Chart
        const efficiencyCtx = document.getElementById('efficiencyChart').getContext('2d');
        const efficiencyChart = new Chart(efficiencyCtx, {
            type: 'line',
            data: {
                labels: ['Mistral 7B', 'Llama 2 13B', 'GPT-3.5', 'Mixtral 8x7B'],
                datasets: [{
                    label: 'Inference Speed (Tokens/Second)',
                    data: [120, 85, 45, 95],
                    fill: true,
                    backgroundColor: 'rgba(30, 64, 175, 0.1)',
                    borderColor: 'rgba(30, 64, 175, 1)',
                    tension: 0.3,
                    pointBackgroundColor: 'rgba(30, 64, 175, 1)'
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
                            text: 'Tokens/Second'
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
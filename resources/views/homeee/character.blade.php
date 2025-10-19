<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Character.ai - Conversational AI Platform</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --character-purple: #6B46C1;
            --character-dark: #1A202C;
            --character-light: #F7FAFC;
            --character-blue: #4299E1;
            --character-pink: #ED64A6;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            color: #2D3748;
            line-height: 1.6;
            background-color: var(--character-light);
        }

        .navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: var(--character-purple) !important;
            font-weight: 700;
        }

        .hero-section {
            background: linear-gradient(135deg, var(--character-purple) 0%, #553C9A 100%);
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
            background: linear-gradient(90deg, var(--character-purple), var(--character-pink));
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
            background: linear-gradient(90deg, var(--character-purple), var(--character-pink));
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
            color: var(--character-purple);
        }

        .feature-icon {
            font-size: 2.5rem;
            color: var(--character-purple);
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
            background: linear-gradient(to bottom, var(--character-purple), var(--character-pink));
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
            border: 4px solid var(--character-purple);
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
            border-top: 4px solid var(--character-purple);
        }

        .ai-investment-card {
            border-top: 4px solid var(--character-blue);
        }

        footer {
            background-color: var(--character-dark);
            color: white;
            padding: 50px 0 20px;
        }

        .footer-links a {
            color: #A0AEC0;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: white;
        }

        .character-gradient {
            height: 8px;
            background: linear-gradient(90deg,
                    var(--character-purple) 0%,
                    var(--character-blue) 25%,
                    var(--character-pink) 50%,
                    #48BB78 75%,
                    #ECC94B 100%);
        }

        .product-showcase {
            background: linear-gradient(135deg, #F7FAFC 0%, #fff 100%);
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
            color: #4A5568 !important;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: var(--character-purple) !important;
        }

        .btn-character {
            background: linear-gradient(90deg, var(--character-purple), var(--character-pink));
            color: white;
            border-radius: 8px;
            padding: 12px 30px;
            font-weight: 600;
            border: none;
        }

        .btn-character:hover {
            background: linear-gradient(90deg, #5A36B2, #D53F8C);
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

        .character-showcase {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .chat-bubble {
            background: #EDF2F7;
            border-radius: 18px;
            padding: 12px 18px;
            margin: 10px 0;
            max-width: 80%;
        }

        .chat-bubble.user {
            background: var(--character-purple);
            color: white;
            margin-left: auto;
        }
    </style>
</head>

<body>
    <!-- Character.ai Gradient Bar -->
    <div class="character-gradient"></div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-robot me-2"></i>
                Character.ai
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
                    <h1 class="display-4 fw-bold mb-4">Talk to <span class="gradient-text">AI Characters</span></h1>
                    <p class="lead mb-4">Character.ai lets you create characters and talk to them. Our advanced neural
                        language model can generate human-like text responses and participate in contextual
                        conversation.</p>
                    <a href="#products" class="btn btn-light btn-lg">Explore Characters</a>
                </div>
                <div class="col-lg-6">
                    <div class="character-showcase bg-white p-4 rounded">
                        <div class="chat-bubble">
                            <strong>Albert Einstein:</strong> Hello! I understand you're interested in physics. What
                            would you like to discuss today?
                        </div>
                        <div class="chat-bubble user">
                            Can you explain the theory of relativity in simple terms?
                        </div>
                        <div class="chat-bubble">
                            <strong>Albert Einstein:</strong> Of course! Imagine space and time are like a stretchy
                            fabric. Heavy objects like stars make dents in this fabric, and other objects move along the
                            curves. That's gravity!
                        </div>
                        <div class="text-center mt-3">
                            <small class="text-muted">Powered by Character.ai's neural language models</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <h2 class="section-title">About Character.ai</h2>
            <div class="row">
                <div class="col-lg-6">
                    <p class="mb-4">Character.ai is a neural language model chatbot service that can generate human-like
                        text responses and participate in contextual conversation. Founded in 2021 by Noam Shazeer and
                        Daniel De Freitas, both former lead developers of Google's LaMDA.</p>
                    <p class="mb-4">The platform allows users to create custom AI characters with distinct personalities
                        and engage in conversations with them. Characters can range from historical figures to fictional
                        personas, or completely original creations.</p>
                    <p>Unlike many AI chatbots, Character.ai emphasizes open-ended conversation and character
                        consistency, allowing for more immersive and engaging interactions. The company's technology
                        represents some of the most advanced conversational AI available to the public.</p>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1677442136019-21780ecad995?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                        alt="AI Conversation" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center">Character.ai By The Numbers</h2>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card card">
                        <div class="stats-number">$1B</div>
                        <p>Valuation (1995)</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card card">
                        <div class="stats-number">20M+</div>
                        <p>Monthly Users</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card card">
                        <div class="stats-number">10M+</div>
                        <p>Characters Created</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card card">
                        <div class="stats-number">2021</div>
                        <p>Founded</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- AI Products Section -->
    <section id="products" class="py-5">
        <div class="container">
            <h2 class="section-title">Character.ai Products & Features</h2>
            <div class="product-showcase">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center">
                        <h3>Create, Share, and Chat with AI Characters</h3>
                        <p class="lead">Our platform enables anyone to create custom AI characters and engage in
                            meaningful conversations with them.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 ai-product-card">
                        <div class="card-body">
                            <div class="feature-icon">
                                <i class="fas fa-plus-circle"></i>
                            </div>
                            <h4 class="card-title">Character Creation</h4>
                            <p class="card-text">Create custom AI characters with unique personalities, backstories, and
                                conversation styles.</p>
                            <ul>
                                <li>Define personality traits</li>
                                <li>Set conversation examples</li>
                                <li>Upload character images</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 ai-product-card">
                        <div class="card-body">
                            <div class="feature-icon">
                                <i class="fas fa-comments"></i>
                            </div>
                            <h4 class="card-title">Group Chat</h4>
                            <p class="card-text">Host conversations with multiple AI characters simultaneously, creating
                                dynamic interactions.</p>
                            <ul>
                                <li>Multi-character conversations</li>
                                <li>Character-to-character interaction</li>
                                <li>Room creation and management</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 ai-product-card">
                        <div class="card-body">
                            <div class="feature-icon">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <h4 class="card-title">Mobile Apps</h4>
                            <p class="card-text">Native iOS and Android applications for chatting with characters on the
                                go.</p>
                            <ul>
                                <li>Full conversation capabilities</li>
                                <li>Push notifications</li>
                                <li>Offline access to chats</li>
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
            <h2 class="section-title">Character.ai Funding & Investment Strategy</h2>
            <div class="row mb-5">
                <div class="col-lg-6">
                    <p>Character.ai has raised significant funding from top-tier venture capital firms, recognizing the
                        potential of conversational AI and personalized digital companions.</p>
                    <p>The company's investment strategy focuses on advancing neural language model capabilities while
                        building a sustainable platform for AI character creation and interaction.</p>
                    <div class="card ai-investment-card mt-4">
                        <div class="card-body">
                            <h5>Investment Focus Areas:</h5>
                            <ul>
                                <li>Neural language model research</li>
                                <li>Character consistency algorithms</li>
                                <li>Mobile and web platform development</li>
                                <li>Monetization and business models</li>
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
                            <h4 class="card-title">Series A</h4>
                            <p class="card-text">$150M round led by Andreessen Horowitz with participation from SV Angel
                                and Nat Friedman.</p>
                            <p><strong>Date:</strong> March 1995</p>
                            <p><strong>Valuation:</strong> $1B</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 ai-investment-card">
                        <div class="card-body">
                            <h4 class="card-title">Seed Round</h4>
                            <p class="card-text">Initial funding round from prominent angel investors and venture
                                capital firms.</p>
                            <p><strong>Date:</strong> 2021</p>
                            <p><strong>Amount:</strong> Undisclosed</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 ai-investment-card">
                        <div class="card-body">
                            <h4 class="card-title">Google LaMDA Alumni</h4>
                            <p class="card-text">Founders previously led Google's LaMDA project, bringing extensive
                                experience in conversational AI.</p>
                            <p><strong>Background:</strong> Google Brain</p>
                            <p><strong>Expertise:</strong> Neural Language Models</p>
                        </div>
                    </div>
                </div>
            </div>

            <h3 class="mb-4 mt-5">Notable Investors</h3>
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-2 col-4 mb-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/Andreessen_Horowitz_Logo_2022.svg/1200px-Andreessen_Horowitz_Logo_2022.svg.png"
                        alt="Andreessen Horowitz" class="img-fluid investor-logo">
                </div>
                <div class="col-md-2 col-4 mb-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/SV_Angel_logo.svg/1200px-SV_Angel_logo.svg.png"
                        alt="SV Angel" class="img-fluid investor-logo">
                </div>
                <div class="col-md-2 col-4 mb-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/1024px-Google_2015_logo.svg.png"
                        alt="Google" class="img-fluid investor-logo">
                </div>
                <div class="col-md-2 col-4 mb-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/GitHub_logo_2013.svg/1024px-GitHub_logo_2013.svg.png"
                        alt="GitHub" class="img-fluid investor-logo">
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-6">
                    <div class="chart-container">
                        <canvas id="marketGrowthChart"></canvas>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h4>Conversational AI Market Growth</h4>
                    <p>The conversational AI market is experiencing rapid growth as users seek more engaging and
                        personalized digital interactions.</p>
                    <p>Key growth drivers include:</p>
                    <ul>
                        <li>Demand for personalized digital companions</li>
                        <li>Advancements in neural language models</li>
                        <li>Entertainment and creative applications</li>
                        <li>Educational and therapeutic use cases</li>
                    </ul>
                    <div class="card mt-4">
                        <div class="card-body">
                            <h5>Market Position</h5>
                            <p>Character.ai is positioned as a leader in open-ended conversational AI, differentiating
                                from task-oriented chatbots with its focus on character consistency and creative
                                expression.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Financial Performance Section -->
    <section id="financials" class="py-5">
        <div class="container">
            <h2 class="section-title">Business Model & User Growth</h2>
            <div class="row mb-5">
                <div class="col-lg-6">
                    <div class="chart-container">
                        <canvas id="userGrowthChart"></canvas>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="chart-container">
                        <canvas id="engagementChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Character.ai's Business Strategy</h4>
                            <p>Character.ai is exploring multiple monetization strategies while maintaining a focus on
                                user growth and platform development:</p>
                            <ul>
                                <li><strong>Premium Subscriptions:</strong> Enhanced features, faster response times,
                                    and priority access</li>
                                <li><strong>Enterprise Solutions:</strong> Custom character development for businesses
                                    and education</li>
                                <li><strong>API Access:</strong> Developer access to Character.ai's conversational
                                    models</li>
                                <li><strong>Creator Economy:</strong> Potential for character creators to monetize their
                                    creations</li>
                            </ul>
                            <p>The company's current focus is on scaling its user base and refining its AI models, with
                                monetization expected to follow significant market adoption.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section id="timeline" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center">Character.ai Timeline</h2>
            <div class="timeline">
                <div class="timeline-item left">
                    <div class="timeline-content">
                        <h5>2021</h5>
                        <p>Character.ai founded by Noam Shazeer and Daniel De Freitas, former lead developers of
                            Google's LaMDA conversational AI.</p>
                    </div>
                </div>
                <div class="timeline-item right">
                    <div class="timeline-content">
                        <h5>2022</h5>
                        <p>Beta launch of Character.ai platform, allowing users to create and chat with AI characters.
                            Rapid user growth begins.</p>
                    </div>
                </div>
                <div class="timeline-item left">
                    <div class="timeline-content">
                        <h5>Early 1995</h5>
                        <p>Reaches 1 million users within weeks of public beta launch. Mobile apps released for iOS and
                            Android.</p>
                    </div>
                </div>
                <div class="timeline-item right">
                    <div class="timeline-content">
                        <h5>March 1995</h5>
                        <p>Raises $150M Series A funding led by Andreessen Horowitz at $1B valuation.</p>
                    </div>
                </div>
                <div class="timeline-item left">
                    <div class="timeline-content">
                        <h5>Mid 1995</h5>
                        <p>Surpasses 20 million monthly active users. Introduces group chat feature allowing multiple AI
                            characters to converse.</p>
                    </div>
                </div>
                <div class="timeline-item right">
                    <div class="timeline-content">
                        <h5>Late 1995</h5>
                        <p>Announces plans for premium subscription model and explores enterprise applications.</p>
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
                    <h4><i class="fas fa-robot me-2"></i>Character.ai</h4>
                    <p>Creating the future of conversational AI through advanced neural language models.</p>
                    <div class="social-links">
                        <a href="#" class="text-light me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-discord"></i></a>
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
                        <li><a href="#">Web App</a></li>
                        <li><a href="#">Mobile Apps</a></li>
                        <li><a href="#">Character Creation</a></li>
                        <li><a href="#">Group Chat</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 footer-links">
                    <h5>Resources</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Community</a></li>
                        <li><a href="#">API</a></li>
                        <li><a href="#">Status</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 footer-links">
                    <h5>Legal</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Terms</a></li>
                        <li><a href="#">Guidelines</a></li>
                        <li><a href="#">Copyright</a></li>
                    </ul>
                </div>
            </div>
            <hr class="mt-4 mb-4">
            <div class="text-center">
                <p>© 1995 Character.ai. All rights reserved.</p>
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
                labels: ['Seed', 'Series A'],
                datasets: [{
                    label: 'Funding Raised (Millions USD)',
                    data: [50, 150],
                    backgroundColor: [
                        'rgba(107, 70, 193, 0.7)',
                        'rgba(107, 70, 193, 0.7)'
                    ],
                    borderColor: [
                        'rgba(107, 70, 193, 1)',
                        'rgba(107, 70, 193, 1)'
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
                    label: 'Conversational AI Market (Billions USD)',
                    data: [5.2, 7.6, 10.5, 15.2, 22.8, 32.4],
                    fill: true,
                    backgroundColor: 'rgba(107, 70, 193, 0.1)',
                    borderColor: 'rgba(107, 70, 193, 1)',
                    tension: 0.3,
                    pointBackgroundColor: 'rgba(107, 70, 193, 1)'
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

        // User Growth Chart
        const userGrowthCtx = document.getElementById('userGrowthChart').getContext('2d');
        const userGrowthChart = new Chart(userGrowthCtx, {
            type: 'line',
            data: {
                labels: ['Jan 2022', 'Apr 2022', 'Jul 2022', 'Oct 2022', 'Jan 1995', 'Apr 1995', 'Jul 1995'],
                datasets: [{
                    label: 'Monthly Active Users (Millions)',
                    data: [0.1, 0.5, 2, 5, 10, 15, 20],
                    fill: true,
                    backgroundColor: 'rgba(107, 70, 193, 0.1)',
                    borderColor: 'rgba(107, 70, 193, 1)',
                    tension: 0.3,
                    pointBackgroundColor: 'rgba(107, 70, 193, 1)'
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
                            text: 'Users (Millions)'
                        }
                    }
                }
            }
        });

        // Engagement Chart
        const engagementCtx = document.getElementById('engagementChart').getContext('2d');
        const engagementChart = new Chart(engagementCtx, {
            type: 'doughnut',
            data: {
                labels: ['Daily Active Users', 'Weekly Active Users', 'Monthly Active Users'],
                datasets: [{
                    data: [4, 8, 20],
                    backgroundColor: [
                        'rgba(107, 70, 193, 0.8)',
                        'rgba(66, 153, 225, 0.8)',
                        'rgba(237, 100, 166, 0.8)'
                    ],
                    borderColor: [
                        'rgba(107, 70, 193, 1)',
                        'rgba(66, 153, 225, 1)',
                        'rgba(237, 100, 166, 1)'
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
                        text: 'User Engagement (Millions)'
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
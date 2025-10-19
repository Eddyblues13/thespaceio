<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Investment Platform</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Three.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <style>
        :root {
            --dark-bg: #0a1929;
            --medium-bg: #1a2f4d;
            --light-bg: #2e4b6b;
            --accent-color: #3a7bd5;
            --text-color: #e8f5e9;
        }

        body {
            background-color: var(--dark-bg);
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
            color: var(--accent-color);
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
            background-color: rgba(10, 25, 41, 0.9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--accent-color);
        }

        .navbar-brand {
            font-weight: bold;
            color: var(--accent-color) !important;
            font-size: 1.5rem;
        }

        .nav-link {
            color: var(--text-color) !important;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: var(--accent-color) !important;
        }

        /* Hero Section */
        .hero-section {
            padding: 150px 0 100px;
            background: linear-gradient(135deg, var(--dark-bg) 0%, var(--medium-bg) 100%);
            position: relative;
            overflow: hidden;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            background: linear-gradient(to right, var(--accent-color), #5dade2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        /* 3D Container */
        #ai-model-container {
            width: 100%;
            height: 400px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        /* Company Cards */
        .company-card {
            background: rgba(26, 47, 77, 0.7);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid rgba(58, 123, 213, 0.3);
            height: 100%;
        }

        .company-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
            border-color: var(--accent-color);
        }

        .company-logo {
            height: 60px;
            margin-bottom: 15px;
        }

        .stock-widget {
            background: rgba(10, 25, 41, 0.8);
            border-radius: 8px;
            padding: 15px;
            margin-top: 15px;
            border-left: 4px solid var(--accent-color);
        }

        .stock-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--accent-color);
        }

        .stock-change {
            font-size: 0.9rem;
        }

        .positive {
            color: #5dade2;
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
            color: var(--accent-color);
        }

        .section-header::after {
            content: '';
            display: block;
            width: 100px;
            height: 3px;
            background: var(--accent-color);
            margin: 0 auto;
            margin-top: 15px;
        }

        /* Footer */
        footer {
            background-color: rgba(10, 25, 41, 0.9);
            padding: 50px 0 20px;
            margin-top: 50px;
            border-top: 1px solid var(--accent-color);
        }

        .footer-heading {
            color: var(--accent-color);
            margin-bottom: 20px;
            font-size: 1.2rem;
        }

        /* Company Pages */
        .company-hero {
            padding: 150px 0 80px;
            background: linear-gradient(135deg, var(--dark-bg) 0%, var(--medium-bg) 100%);
        }

        .company-details {
            padding: 80px 0;
        }

        .detail-card {
            background: rgba(26, 47, 77, 0.7);
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 30px;
            border: 1px solid rgba(58, 123, 213, 0.3);
        }

        /* FAQ Section */
        .faq-section {
            padding: 80px 0;
        }

        .accordion-button {
            background-color: rgba(26, 47, 77, 0.7);
            color: var(--text-color);
            border: 1px solid rgba(58, 123, 213, 0.3);
        }

        .accordion-button:not(.collapsed) {
            background-color: rgba(58, 123, 213, 0.2);
            color: var(--accent-color);
        }

        .accordion-body {
            background-color: rgba(10, 25, 41, 0.7);
            color: var(--text-color);
        }

        /* Contact Form */
        .contact-form {
            background: rgba(26, 47, 77, 0.7);
            border-radius: 10px;
            padding: 30px;
            border: 1px solid rgba(58, 123, 213, 0.3);
        }

        .form-control {
            background-color: rgba(10, 25, 41, 0.7);
            border: 1px solid rgba(58, 123, 213, 0.3);
            color: var(--text-color);
        }

        .form-control:focus {
            background-color: rgba(10, 25, 41, 0.9);
            border-color: var(--accent-color);
            color: var(--text-color);
            box-shadow: 0 0 0 0.25rem rgba(58, 123, 213, 0.25);
        }

        .btn-primary {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            color: var(--dark-bg);
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #2e6bb5;
            border-color: #2e6bb5;
        }

        /* TheSpace Section Styles */
        .TheSpace-section {
            padding: 100px 0;
            background: var(--dark-bg);
            /* Updated to match FAQ page background */
        }

        .TheSpace-logo {
            font-size: 3rem;
            color: var(--accent-color);
            margin-bottom: 20px;
        }

        .TheSpace-header {
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 30px;
            color: var(--accent-color);
            text-align: center;
        }

        .TheSpace-subheader {
            font-size: 1.5rem;
            margin-bottom: 50px;
            text-align: center;
            opacity: 0.9;
        }

        .TheSpace-card {
            background: rgba(26, 47, 77, 0.7);
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            transition: all 0.3s ease;
            border: 1px solid rgba(58, 123, 213, 0.3);
            height: 100%;
        }

        .TheSpace-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            border-color: var(--accent-color);
        }

        .TheSpace-card h3 {
            color: var(--accent-color);
            margin-bottom: 20px;
            font-size: 1.8rem;
            position: relative;
            padding-bottom: 10px;
        }

        .TheSpace-card h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--accent-color);
        }

        .TheSpace-icon {
            font-size: 2.5rem;
            color: var(--accent-color);
            margin-bottom: 20px;
        }

        .TheSpace-highlight {
            color: var(--accent-color);
            font-weight: 600;
        }

        .TheSpace-list {
            list-style-type: none;
            padding-left: 0;
        }

        .TheSpace-list li {
            margin-bottom: 10px;
            padding-left: 25px;
            position: relative;
        }

        .TheSpace-list li::before {
            content: '▸';
            position: absolute;
            left: 0;
            color: var(--accent-color);
        }

        .TheSpace-cta {
            background: rgba(58, 123, 213, 0.2);
            border-radius: 15px;
            padding: 40px;
            text-align: center;
            margin-top: 50px;
            border: 2px solid var(--accent-color);
        }

        .TheSpace-cta h3 {
            color: var(--accent-color);
            margin-bottom: 20px;
            font-size: 2rem;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            #ai-model-container {
                height: 300px;
            }

            .TheSpace-header {
                font-size: 2.2rem;
            }

            .TheSpace-subheader {
                font-size: 1.2rem;
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
            <a class="navbar-brand" href="/">
                <i class="fas fa-brain me-2"></i>TheSpace
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="companiesDropdown" role="button"
                            data-bs-toggle="dropdown">
                            Companies
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="tesla">Tesla</a></li>
                            <li><a class="dropdown-item" href="oracle">Oracle</a></li>
                            <li><a class="dropdown-item" href="google">Google</a></li>
                            <li><a class="dropdown-item" href="facebook">Facebook</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about">About Us</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="faq">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="etf&funds">ETF&Funds</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- TheSpace Section -->
    <section id="TheSpace" class="TheSpace-section">
        <div class="container">
            <div class="section-header">
                <h2>🌍 About TheSpace</h2>
                <p>Architects of the Future in AI Investment</p>
            </div>

            <div class="row mb-5">
                <div class="col-lg-12">
                    <div class="TheSpace-card">
                        <h3>Who We Are</h3>
                        <p>At TheSpace, we are more than an investment company — we are architects of the future. Our
                            vision is to connect investors of every scale to the most transformative force of our
                            generation: <span class="TheSpace-highlight">Artificial Intelligence</span>.</p>
                        <p>The world is shifting at lightning speed. AI is no longer a distant promise; it is the core
                            driver of global innovation. From business operations and healthcare to finance,
                            transportation, and creativity, AI is creating unprecedented opportunities and trillions in
                            new market value.</p>
                        <p>TheSpace exists to give investors direct access to this revolution. We combine the stability
                            of established leaders with the explosive growth potential of startups to create one
                            powerful, diversified AI portfolio.</p>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-lg-4 mb-4">
                    <div class="TheSpace-card text-center">
                        <div class="TheSpace-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h3>Our Mission</h3>
                        <p>To democratize access to the AI revolution — making it possible for individuals,
                            institutions, and corporations alike to invest directly in the intelligence economy and
                            share in the extraordinary growth it generates.</p>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="TheSpace-card text-center">
                        <div class="TheSpace-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h3>Our Vision</h3>
                        <p>To make TheSpace the world's most trusted gateway into Artificial Intelligence investments —
                            a bridge that connects today's investors to tomorrow's digital economy.</p>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="TheSpace-card text-center">
                        <div class="TheSpace-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h3>The TheSpace Promise</h3>
                        <p>At TheSpace, we believe: When AI grows, you grow. When AI profits, you profit. When AI
                            becomes the fabric of life itself, you own a share of it.</p>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-lg-12">
                    <div class="TheSpace-card">
                        <h3>What We Do</h3>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <h4 class="TheSpace-highlight">Invest in AI Giants</h4>
                                <p>We allocate capital into global leaders such as Microsoft, Nvidia, Google, Amazon,
                                    and Tesla — companies already shaping AI's present and future.</p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h4 class="TheSpace-highlight">Partner with Breakthrough Innovators</h4>
                                <p>We gain exposure to high-growth private startups like OpenAI, Anthropic, Stability
                                    AI, and Hugging Face, ensuring our investors benefit from the breakthroughs before
                                    they reach public markets.</p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h4 class="TheSpace-highlight">Accelerate Emerging Startups</h4>
                                <p>We identify and support the next wave of innovators — from generative AI to robotics,
                                    healthcare AI, fintech, and creative tools — fueling their growth while securing
                                    long-term value for our investors.</p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h4 class="TheSpace-highlight">Build a Diversified AI Portfolio</h4>
                                <p>With TheSpace, investors don't have to choose one company or one sector. They gain
                                    access to the entire AI ecosystem, spreading risk while maximizing growth potential.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-lg-12">
                    <div class="TheSpace-card">
                        <h3>Why AI? Why Now?</h3>
                        <p>Artificial Intelligence is projected to add trillions of dollars to the global economy in the
                            next decade. It is not just reshaping industries; it is becoming the infrastructure of the
                            modern world.</p>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <ul class="TheSpace-list">
                                    <li><span class="TheSpace-highlight">In business:</span> AI drives strategy,
                                        operations, and efficiency.</li>
                                    <li><span class="TheSpace-highlight">In healthcare:</span> AI improves diagnosis,
                                        drug discovery, and patient care.</li>
                                    <li><span class="TheSpace-highlight">In finance:</span> AI powers trading, fraud
                                        detection, and risk management.</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="TheSpace-list">
                                    <li><span class="TheSpace-highlight">In creativity:</span> AI produces art, music,
                                        design, and video at scale.</li>
                                    <li><span class="TheSpace-highlight">In daily life:</span> AI is the invisible
                                        engine in our phones, cars, and homes.</li>
                                </ul>
                            </div>
                        </div>

                        <p class="mt-4">By investing in TheSpace, you don't just buy into a single trend — you secure a
                            stake in the foundation of the new digital economy.</p>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-lg-12">
                    <div class="TheSpace-card">
                        <h3>Our Advantage</h3>
                        <p>What sets TheSpace apart?</p>

                        <div class="row mt-4">
                            <div class="col-md-6 mb-4">
                                <h4 class="TheSpace-highlight">Breadth & Depth</h4>
                                <p>Exposure to both established giants and emerging startups.</p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h4 class="TheSpace-highlight">Early Access</h4>
                                <p>Entry into exclusive private AI deals not available to the public.</p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h4 class="TheSpace-highlight">Diversification</h4>
                                <p>Risk is spread across multiple companies and sectors.</p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h4 class="TheSpace-highlight">Growth Potential</h4>
                                <p>AI adoption is compounding, and so are investor returns.</p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h4 class="TheSpace-highlight">Trust & Transparency</h4>
                                <p>We provide clear reporting, updates, and insights to keep our investors informed
                                    every step of the way.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="TheSpace-card">
                        <h3>Our Investors</h3>
                        <p>TheSpace is built for everyone with vision:</p>

                        <div class="row mt-4">
                            <div class="col-md-4 mb-4 text-center">
                                <div class="TheSpace-icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <h4 class="TheSpace-highlight">Ambitious Individuals</h4>
                                <p>Starting with as little as $10,000.</p>
                            </div>
                            <div class="col-md-4 mb-4 text-center">
                                <div class="TheSpace-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <h4 class="TheSpace-highlight">High-Net-Worth Investors</h4>
                                <p>Seeking to diversify into the fastest-growing sector.</p>
                            </div>
                            <div class="col-md-4 mb-4 text-center">
                                <div class="TheSpace-icon">
                                    <i class="fas fa-building"></i>
                                </div>
                                <h4 class="TheSpace-highlight">Institutions & Corporations</h4>
                                <p>Building AI-powered futures at scale.</p>
                            </div>
                        </div>

                        <p class="mt-4">Whether you are investing to secure your family's future, expand your portfolio,
                            or build a generational legacy, TheSpace is your partner in the intelligence economy.</p>
                    </div>
                </div>
            </div>

            <div class="TheSpace-cta">
                <h3>✨ TheSpace is not just an investment. It is ownership of the future.</h3>
                <p class="mb-4">Join us. Invest in intelligence. Invest in TheSpace.</p>
                <a href="" class="btn btn-primary btn-lg">Get Started Today</a>
            </div>
        </div>
    </section>

    <!-- AI Technology Section -->
    <section id="ai-technology" class="py-5" style="background: rgba(26, 47, 77, 0.3);">
        <div class="container">
            <div class="section-header">
                <h2>Our AI Technology</h2>
                <p>How our advanced algorithms analyze market data</p>
            </div>

            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="text-center">
                        <div class="mb-3">
                            <i class="fas fa-chart-line fa-3x" style="color: var(--accent-color);"></i>
                        </div>
                        <h4>Predictive Analytics</h4>
                        <p>Our AI models analyze historical data and market patterns to forecast stock performance with
                            remarkable accuracy.</p>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="text-center">
                        <div class="mb-3">
                            <i class="fas fa-robot fa-3x" style="color: var(--accent-color);"></i>
                        </div>
                        <h4>Machine Learning</h4>
                        <p>Continuous learning algorithms adapt to market changes, improving predictions over time
                            without human intervention.</p>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="text-center">
                        <div class="mb-3">
                            <i class="fas fa-database fa-3x" style="color: var(--accent-color);"></i>
                        </div>
                        <h4>Big Data Processing</h4>
                        <p>We process millions of data points daily from diverse sources to generate comprehensive
                            investment insights.</p>
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
                        <li><a href="/" class="text-light">Home</a></li>
                        <li><a href="about" class="text-light">About Us</a></li>

                        <li><a href="faq" class="text-light">FAQ</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 mb-4">
                    <h5 class="footer-heading">Companies</h5>
                    <ul class="list-unstyled">
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

            <hr class="mt-4" style="border-color: rgba(58, 123, 213, 0.3);">

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
            
            // Initialize 3D scene
            init3DScene();
        });
        
        // Simple 3D scene with Three.js
        function init3DScene() {
            const container = document.getElementById('ai-model-container');
            const width = container.clientWidth;
            const height = container.clientHeight;
            
            // Create scene
            const scene = new THREE.Scene();
            
            // Create camera
            const camera = new THREE.PerspectiveCamera(75, width / height, 0.1, 1000);
            camera.position.z = 5;
            
            // Create renderer
            const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
            renderer.setSize(width, height);
            container.appendChild(renderer.domElement);
            
            // Create geometry - a complex shape representing AI
            const geometry = new THREE.IcosahedronGeometry(2, 1);
            
            // Create material with blue color
            const material = new THREE.MeshPhongMaterial({ 
                color: 0x3a7bd5,
                shininess: 100,
                transparent: true,
                opacity: 0.8
            });
            
            // Create mesh
            const mesh = new THREE.Mesh(geometry, material);
            scene.add(mesh);
            
            // Add lights
            const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
            scene.add(ambientLight);
            
            const directionalLight = new THREE.DirectionalLight(0x5dade2, 0.8);
            directionalLight.position.set(5, 5, 5);
            scene.add(directionalLight);
            
            // Animation
            function animate() {
                requestAnimationFrame(animate);
                
                mesh.rotation.x += 0.005;
                mesh.rotation.y += 0.01;
                
                renderer.render(scene, camera);
            }
            
            animate();
            
            // Handle window resize
            window.addEventListener('resize', function() {
                const newWidth = container.clientWidth;
                const newHeight = container.clientHeight;
                
                camera.aspect = newWidth / newHeight;
                camera.updateProjectionMatrix();
                
                renderer.setSize(newWidth, newHeight);
            });
        }
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investment Tiers - AI Investment Platform</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --dark-bg: #0a1929;
            --medium-bg: #1a2f4d;
            --light-bg: #2e4b6b;
            --accent-color: #3a7bd5;
            --text-color: #e8f5e9;
            --white-bg: #ffffff;
            --dark-text: #333333;
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
        .investment-hero {
            padding: 150px 0 80px;
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

        /* Investment Tiers Section - WHITE BACKGROUND */
        .investment-section {
            padding: 80px 0;
            background: var(--white-bg);
            color: var(--dark-text);
        }

        .section-header {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
        }

        .investment-section .section-header h2 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: var(--accent-color);
        }

        .investment-section .section-header p {
            font-size: 1.1rem;
            opacity: 0.8;
            max-width: 600px;
            margin: 0 auto;
            color: var(--dark-text);
        }

        .investment-section .section-header::after {
            content: '';
            display: block;
            width: 100px;
            height: 3px;
            background: var(--accent-color);
            margin: 0 auto;
            margin-top: 15px;
        }

        /* Investment Tier Cards */
        .tier-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 10px;
            padding: 30px;
            margin-bottom: 30px;
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid rgba(58, 123, 213, 0.3);
            height: 100%;
            position: relative;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .tier-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
            border-color: var(--accent-color);
        }

        .tier-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: var(--accent-color);
            color: var(--white-bg);
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 0.9rem;
        }

        .tier-icon {
            font-size: 3rem;
            color: var(--accent-color);
            margin-bottom: 20px;
        }

        .tier-title {
            font-size: 1.8rem;
            margin-bottom: 10px;
            color: var(--accent-color);
        }

        .tier-range {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: var(--dark-text);
        }

        .tier-features {
            list-style: none;
            padding: 0;
            margin-bottom: 25px;
        }

        .tier-features li {
            padding: 8px 0;
            border-bottom: 1px solid rgba(58, 123, 213, 0.2);
            color: var(--dark-text);
        }

        .tier-features li:last-child {
            border-bottom: none;
        }

        .tier-features li i {
            color: var(--accent-color);
            margin-right: 10px;
        }

        .btn-tier {
            background: var(--accent-color);
            color: var(--white-bg);
            border: none;
            font-weight: bold;
            padding: 10px 25px;
            border-radius: 5px;
            transition: all 0.3s;
        }

        .btn-tier:hover {
            background: #2e6bb5;
            transform: translateY(-2px);
            color: var(--white-bg);
        }

        .btn-primary {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            color: var(--white-bg);
            font-weight: bold;
            padding: 12px 30px;
            font-size: 1.1rem;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: #2e6bb5;
            border-color: #2e6bb5;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            color: var(--white-bg);
        }

        /* Investment Process Section */
        .process-section {
            padding: 80px 0;
            background: rgba(26, 47, 77, 0.3);
        }

        .process-step {
            text-align: center;
            padding: 20px;
        }

        .process-icon {
            font-size: 3rem;
            color: var(--accent-color);
            margin-bottom: 20px;
        }

        .process-number {
            display: inline-block;
            width: 40px;
            height: 40px;
            background: var(--accent-color);
            color: var(--white-bg);
            border-radius: 50%;
            line-height: 40px;
            font-weight: bold;
            margin-bottom: 15px;
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

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .investment-hero {
                padding: 130px 0 60px;
            }

            .investment-section {
                padding: 60px 0;
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
    <section class="investment-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="hero-title">Investment Opportunities</h1>
                    <p class="hero-subtitle">Discover our tiered investment approach designed to match your financial
                        goals with the transformative power of AI technology.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Investment Tiers Section - WHITE BACKGROUND -->
    <section id="investment" class="investment-section">
        <div class="container">
            <div class="section-header">
                <h2>Investment Tiers</h2>
                <p>Choose the investment level that matches your financial goals</p>
            </div>

            <div class="row">
                <!-- Tier 1: Visionary Entry -->
                <div class="col-md-6 col-lg-3">
                    <div class="tier-card">
                        <div class="tier-badge">Tier 1</div>
                        <div class="tier-icon">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <h3 class="tier-title">Visionary Entry</h3>
                        <div class="tier-range">$10,000 - $99,000</div>
                        <ul class="tier-features">
                            <li><i class="fas fa-check"></i> Access to AI Market Analysis</li>
                            <li><i class="fas fa-check"></i> Basic Portfolio Management</li>
                            <li><i class="fas fa-check"></i> Quarterly Performance Reports</li>
                            <li><i class="fas fa-check"></i> Entry to AI Investment Webinars</li>
                            <li><i class="fas fa-check"></i> Dedicated Support Specialist</li>
                        </ul>
                        <a href="{{ route('register') }}" class="btn btn-tier w-100">Get Started</a>
                    </div>
                </div>

                <!-- Tier 2: Growth Partner -->
                <div class="col-md-6 col-lg-3">
                    <div class="tier-card">
                        <div class="tier-badge">Tier 2</div>
                        <div class="tier-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3 class="tier-title">Growth Partner</h3>
                        <div class="tier-range">$100,000 - $999,000</div>
                        <ul class="tier-features">
                            <li><i class="fas fa-check"></i> All Tier 1 Benefits</li>
                            <li><i class="fas fa-check"></i> Advanced AI Predictive Models</li>
                            <li><i class="fas fa-check"></i> Custom Portfolio Strategy</li>
                            <li><i class="fas fa-check"></i> Monthly Performance Reviews</li>
                            <li><i class="fas fa-check"></i> Access to Private AI Events</li>
                            <li><i class="fas fa-check"></i> Priority Support</li>
                        </ul>
                        <a href="{{ route('register') }}" class="btn btn-tier w-100">Become a Partner</a>
                    </div>
                </div>

                <!-- Tier 3: Legacy Builder -->
                <div class="col-md-6 col-lg-3">
                    <div class="tier-card">
                        <div class="tier-badge">Tier 3</div>
                        <div class="tier-icon">
                            <i class="fas fa-crown"></i>
                        </div>
                        <h3 class="tier-title">Legacy Builder</h3>
                        <div class="tier-range">$1M - $50M</div>
                        <ul class="tier-features">
                            <li><i class="fas fa-check"></i> All Tier 2 Benefits</li>
                            <li><i class="fas fa-check"></i> Exclusive AI Investment Opportunities</li>
                            <li><i class="fas fa-check"></i> Direct Access to AI Company Executives</li>
                            <li><i class="fas fa-check"></i> Bespoke Portfolio Construction</li>
                            <li><i class="fas fa-check"></i> Weekly Performance Updates</li>
                            <li><i class="fas fa-check"></i> Personal Investment Advisor</li>
                        </ul>
                        <a href="{{ route('register') }}" class="btn btn-tier w-100">Build Your Legacy</a>
                    </div>
                </div>

                <!-- Tier 4: Institutional & Corporate Alliances -->
                <div class="col-md-6 col-lg-3">
                    <div class="tier-card">
                        <div class="tier-badge">Tier 4</div>
                        <div class="tier-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h3 class="tier-title">Institutional & Corporate Alliances</h3>
                        <div class="tier-range">$50M - $500M</div>
                        <ul class="tier-features">
                            <li><i class="fas fa-check"></i> All Tier 3 Benefits</li>
                            <li><i class="fas fa-check"></i> Co-investment in AI Startups</li>
                            <li><i class="fas fa-check"></i> Board Representation Opportunities</li>
                            <li><i class="fas fa-check"></i> Custom AI Research & Development</li>
                            <li><i class="fas fa-check"></i> Strategic Partnership Agreements</li>
                            <li><i class="fas fa-check"></i> 24/7 Executive Support Team</li>
                        </ul>
                        <a href="{{ route('register') }}" class="btn btn-tier w-100">Form Alliance</a>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-12">
                    <div class="text-center">
                        <h3 class="mb-4" style="color: var(--accent-color);">Ready to Invest in the AI Revolution?</h3>
                        <p class="mb-4" style="color: var(--dark-text);">Contact our investment specialists to discuss
                            which tier is right for you</p>
                        <a href="contact" class="btn btn-primary btn-lg">Contact Us Today</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Investment Process Section -->
    <section class="process-section">
        <div class="container">
            <div class="section-header">
                <h2>Our Investment Process</h2>
                <p>How we help you navigate the AI investment landscape</p>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="process-step">
                        <div class="process-number">1</div>
                        <i class="fas fa-search process-icon"></i>
                        <h4>Discovery & Analysis</h4>
                        <p>We analyze your financial goals and risk tolerance to create a personalized investment
                            strategy.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="process-step">
                        <div class="process-number">2</div>
                        <i class="fas fa-robot process-icon"></i>
                        <h4>AI Portfolio Construction</h4>
                        <p>Our algorithms build a diversified portfolio across the AI ecosystem based on your selected
                            tier.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="process-step">
                        <div class="process-number">3</div>
                        <i class="fas fa-chart-line process-icon"></i>
                        <h4>Continuous Monitoring</h4>
                        <p>We continuously monitor and adjust your portfolio based on market conditions and AI trends.
                        </p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="process-step">
                        <div class="process-number">4</div>
                        <i class="fas fa-sync-alt process-icon"></i>
                        <h4>Performance Optimization</h4>
                        <p>Regular performance reviews and strategic adjustments to maximize your returns.</p>
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
                        <li><a href="investment" class="text-light">Investment</a></li>
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
        });
    </script>
</body>

</html>
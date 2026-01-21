<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheSpace Assurance - Intelligent Protection for the Future</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c5aa0;
            --secondary-color: #3a7bd5;
            --accent-color: #5dade2;
            --light-color: #e8f5e9;
            --dark-color: #0a1929;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            line-height: 1.6;
            overflow-x: hidden;
        }

        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 150px 0 100px;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="0.1" d="M0,160L48,176C96,192,192,224,288,213.3C384,203,480,149,576,138.7C672,128,768,160,864,170.7C960,181,1056,171,1152,149.3C1248,128,1344,96,1392,80L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
            background-size: cover;
            background-position: center bottom;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .hero-subtitle {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--primary-color);
            position: relative;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background: var(--accent-color);
            margin-top: 10px;
        }

        .section-subtitle {
            font-size: 1.2rem;
            color: #666;
            margin-bottom: 3rem;
        }

        .insurance-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 30px;
            height: 100%;
            transition: transform 0.3s, box-shadow 0.3s;
            border-top: 4px solid var(--primary-color);
        }

        .insurance-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .insurance-icon {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        .insurance-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--primary-color);
        }

        .insurance-quote {
            font-style: italic;
            color: var(--secondary-color);
            border-left: 3px solid var(--accent-color);
            padding-left: 15px;
            margin: 20px 0;
        }

        .feature-list {
            list-style: none;
            padding: 0;
            margin: 20px 0;
        }

        .feature-list li {
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }

        .feature-list li:last-child {
            border-bottom: none;
        }

        .feature-list li i {
            color: var(--success-color);
            margin-right: 10px;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 10px 25px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            transform: translateY(-2px);
        }

        .ai-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 100px 0;
        }

        .ai-feature {
            text-align: center;
            padding: 20px;
        }

        .ai-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .promise-section {
            background: var(--primary-color);
            color: white;
            padding: 80px 0;
        }

        .promise-item {
            text-align: center;
            padding: 20px;
        }

        .promise-icon {
            font-size: 2.5rem;
            color: var(--accent-color);
            margin-bottom: 15px;
        }

        .cta-section {
            background: linear-gradient(135deg, var(--secondary-color) 0%, var(--accent-color) 100%);
            color: white;
            padding: 100px 0;
            text-align: center;
        }

        .cta-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .calculator-section {
            background: #f8f9fa;
            padding: 80px 0;
        }

        .calculator-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .form-label {
            font-weight: 600;
            color: var(--primary-color);
        }

        .form-control {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px 15px;
        }

        .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.2rem rgba(58, 123, 213, 0.25);
        }

        .result-box {
            background: var(--light-color);
            border-radius: 5px;
            padding: 20px;
            margin-top: 20px;
            border-left: 4px solid var(--success-color);
        }

        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--primary-color) !important;
        }

        .nav-link {
            font-weight: 500;
            color: #333 !important;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
        }

        footer {
            background: var(--dark-color);
            color: white;
            padding: 60px 0 20px;
        }

        .footer-heading {
            color: var(--accent-color);
            margin-bottom: 20px;
            font-size: 1.2rem;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .section-title {
                font-size: 2rem;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-shield-alt me-2"></i>TheSpace Assurance
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#insurance">Insurance Plans</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#ai">AI Technology</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#calculator">Premium Calculator</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary ms-2" href="#calculator">Get a Quote</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <h1 class="hero-title">TheSpace Assurance</h1>
                    <p class="hero-subtitle">Intelligent Protection for the Future</p>
                    <p class="mb-4">At TheSpace, we don't just help you build wealth — we help you protect it.
                        Introducing TheSpace Assurance, a next-generation insurance platform built on trust, innovation,
                        and artificial intelligence.</p>
                    <div class="mt-4">
                        <a href="#insurance" class="btn btn-light btn-lg me-3">Explore Plans</a>
                        <a href="#calculator" class="btn btn-outline-light btn-lg">Get a Quote</a>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="Insurance Protection" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center" data-aos="fade-up">
                    <h2 class="section-title">Our Mission</h2>
                    <p class="section-subtitle">To safeguard every part of your life — your home, your health, your
                        family, your car, your business, and your future.</p>
                    <p class="lead">TheSpace Assurance combines AI-driven analytics, smart policy customization, and
                        real-time risk prediction to deliver coverage that adapts to your lifestyle and needs —
                        automatically.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Insurance Plans Section -->
    <section id="insurance" class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Our Insurance Plans</h2>
                    <p class="section-subtitle">Comprehensive protection powered by AI intelligence</p>
                </div>
            </div>

            <div class="row">
                <!-- HomeShield -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="insurance-card">
                        <div class="insurance-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <h3 class="insurance-title">TheSpace HomeShield</h3>
                        <p>Protect your property, assets, and investments with AI-assisted home insurance that predicts
                            risks before they occur.</p>

                        <ul class="feature-list">
                            <li><i class="fas fa-check"></i> Coverage for fire, flood, theft, and structural damage</li>
                            <li><i class="fas fa-check"></i> Real-time smart monitoring integration with IoT devices
                            </li>
                            <li><i class="fas fa-check"></i> Instant claim processing and payout automation</li>
                            <li><i class="fas fa-check"></i> Premium discounts for energy-efficient and smart homes</li>
                        </ul>

                        <div class="insurance-quote">
                            "Because your home isn't just property — it's your foundation."
                        </div>

                        <button class="btn btn-primary w-100" data-bs-toggle="modal"
                            data-bs-target="#homeShieldModal">Learn More</button>
                    </div>
                </div>

                <!-- AutoGuard -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="insurance-card">
                        <div class="insurance-icon">
                            <i class="fas fa-car"></i>
                        </div>
                        <h3 class="insurance-title">TheSpace AutoGuard</h3>
                        <p>Drive with confidence under AI protection. Our algorithms analyze real-time road data,
                            driving behavior, and environmental conditions.</p>

                        <ul class="feature-list">
                            <li><i class="fas fa-check"></i> Full coverage for accidents, damage, and theft</li>
                            <li><i class="fas fa-check"></i> Usage-based premiums that reward safe driving</li>
                            <li><i class="fas fa-check"></i> 24-hour claim support powered by intelligent automation
                            </li>
                            <li><i class="fas fa-check"></i> Coverage extends to electric and autonomous vehicles</li>
                        </ul>

                        <div class="insurance-quote">
                            "Your car learns to protect you — now your insurance does too."
                        </div>

                        <button class="btn btn-primary w-100" data-bs-toggle="modal"
                            data-bs-target="#autoGuardModal">Learn More</button>
                    </div>
                </div>

                <!-- HealthSecure -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="insurance-card">
                        <div class="insurance-icon">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                        <h3 class="insurance-title">TheSpace HealthSecure</h3>
                        <p>Where healthcare meets intelligence. TheSpace HealthSecure uses predictive AI to track health
                            trends and detect early warning signs.</p>

                        <ul class="feature-list">
                            <li><i class="fas fa-check"></i> Comprehensive medical, dental, and emergency coverage</li>
                            <li><i class="fas fa-check"></i> Preventive care and AI-driven wellness programs</li>
                            <li><i class="fas fa-check"></i> Integration with wearables for personalized health data
                            </li>
                            <li><i class="fas fa-check"></i> Cashless hospital and telehealth access globally</li>
                        </ul>

                        <div class="insurance-quote">
                            "Stay covered. Stay healthy. Stay ahead."
                        </div>

                        <button class="btn btn-primary w-100" data-bs-toggle="modal"
                            data-bs-target="#healthSecureModal">Learn More</button>
                    </div>
                </div>

                <!-- FamilyShield -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="insurance-card">
                        <div class="insurance-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="insurance-title">TheSpace FamilyShield</h3>
                        <p>Your family's future deserves intelligent protection with flexible family plans and lifetime
                            benefits.</p>

                        <ul class="feature-list">
                            <li><i class="fas fa-check"></i> Flexible family plans with lifetime benefits</li>
                            <li><i class="fas fa-check"></i> Education and legacy funds for children</li>
                            <li><i class="fas fa-check"></i> AI-driven policy adjustments based on life events</li>
                            <li><i class="fas fa-check"></i> Quick, compassionate claim settlement process</li>
                        </ul>

                        <div class="insurance-quote">
                            "Protect what matters most — today and for generations."
                        </div>

                        <button class="btn btn-primary w-100" data-bs-toggle="modal"
                            data-bs-target="#familyShieldModal">Learn More</button>
                    </div>
                </div>

                <!-- CorporateSure -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="insurance-card">
                        <div class="insurance-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <h3 class="insurance-title">TheSpace CorporateSure</h3>
                        <p>For businesses that think beyond risk — TheSpace protects your people, assets, and data with
                            AI-powered risk analysis.</p>

                        <ul class="feature-list">
                            <li><i class="fas fa-check"></i> AI-powered risk analysis and business continuity coverage
                            </li>
                            <li><i class="fas fa-check"></i> Employee group insurance and benefits</li>
                            <li><i class="fas fa-check"></i> Cybersecurity, data loss, and intellectual property
                                protection</li>
                            <li><i class="fas fa-check"></i> Tailored coverage for tech, finance, and industrial sectors
                            </li>
                        </ul>

                        <div class="insurance-quote">
                            "When innovation meets intelligence, security follows."
                        </div>

                        <button class="btn btn-primary w-100" data-bs-toggle="modal"
                            data-bs-target="#corporateSureModal">Learn More</button>
                    </div>
                </div>

                <!-- Global Protection -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="insurance-card">
                        <div class="insurance-icon">
                            <i class="fas fa-globe-americas"></i>
                        </div>
                        <h3 class="insurance-title">TheSpace Global Protection</h3>
                        <p>For elite investors and travelers with global coverage that knows no borders.</p>

                        <ul class="feature-list">
                            <li><i class="fas fa-check"></i> Global travel insurance (flight, luggage, emergency)</li>
                            <li><i class="fas fa-check"></i> Expat health coverage and relocation support</li>
                            <li><i class="fas fa-check"></i> International property and offshore asset protection</li>
                            <li><i class="fas fa-check"></i> Executive life & lifestyle assurance programs</li>
                        </ul>

                        <div class="insurance-quote">
                            "Because your world has no borders — and neither should your protection."
                        </div>

                        <button class="btn btn-primary w-100" data-bs-toggle="modal"
                            data-bs-target="#globalProtectionModal">Learn More</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- AI Technology Section -->
    <section id="ai" class="ai-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">AI at the Core</h2>
                    <p class="section-subtitle">Every TheSpace Assurance plan is powered by the TheSpace Intelligence
                        Engine</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="ai-feature">
                        <div class="ai-icon">
                            <i class="fas fa-brain"></i>
                        </div>
                        <h4>Predicts Risk</h4>
                        <p>Our AI continuously analyzes data to predict potential risks before they occur.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="ai-feature">
                        <div class="ai-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h4>Adjusts Policy Rates</h4>
                        <p>Dynamic pricing based on real-time risk assessment and customer behavior.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="ai-feature">
                        <div class="ai-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4>Detects Fraud</h4>
                        <p>Advanced algorithms identify and prevent fraudulent claims automatically.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="ai-feature">
                        <div class="ai-icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <h4>Ensures Faster Payouts</h4>
                        <p>Automated claim processing ensures faster, fairer payouts to our customers.</p>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-8 mx-auto text-center" data-aos="fade-up">
                    <p class="lead">With TheSpace, you don't just get insurance — you get intelligent assurance.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Premium Calculator Section -->
    <section id="calculator" class="calculator-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Insurance Premium Calculator</h2>
                    <p class="section-subtitle">Get an instant estimate for your personalized insurance plan</p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8" data-aos="fade-up">
                    <div class="calculator-card">
                        <form id="premiumCalculator">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="insuranceType" class="form-label">Insurance Type</label>
                                    <select class="form-select" id="insuranceType" required>
                                        <option value="" selected disabled>Select Insurance Type</option>
                                        <option value="home">HomeShield - Housing Insurance</option>
                                        <option value="auto">AutoGuard - Vehicle Insurance</option>
                                        <option value="health">HealthSecure - Health Insurance</option>
                                        <option value="family">FamilyShield - Life Insurance</option>
                                        <option value="business">CorporateSure - Business Insurance</option>
                                        <option value="global">Global Protection Suite</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="coverageAmount" class="form-label">Coverage Amount ($)</label>
                                    <input type="number" class="form-control" id="coverageAmount" min="1000"
                                        max="10000000" step="1000" placeholder="e.g., 500000" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="age" class="form-label">Age</label>
                                    <input type="number" class="form-control" id="age" min="18" max="100"
                                        placeholder="Your age" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="location" class="form-label">Location</label>
                                    <select class="form-select" id="location" required>
                                        <option value="" selected disabled>Select Location</option>
                                        <option value="low">Low Risk Area</option>
                                        <option value="medium">Medium Risk Area</option>
                                        <option value="high">High Risk Area</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="deductible" class="form-label">Deductible Amount ($)</label>
                                    <input type="number" class="form-control" id="deductible" min="100" max="10000"
                                        step="100" placeholder="e.g., 1000" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="paymentFrequency" class="form-label">Payment Frequency</label>
                                    <select class="form-select" id="paymentFrequency" required>
                                        <option value="monthly">Monthly</option>
                                        <option value="quarterly">Quarterly</option>
                                        <option value="yearly" selected>Yearly</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">Calculate Premium</button>
                            </div>
                        </form>

                        <div id="premiumResult" class="result-box" style="display: none;">
                            <h4>Your Estimated Premium</h4>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <p><strong>Insurance Type:</strong> <span id="resultType"></span></p>
                                    <p><strong>Coverage Amount:</strong> $<span id="resultCoverage"></span></p>
                                    <p><strong>Deductible:</strong> $<span id="resultDeductible"></span></p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Payment Frequency:</strong> <span id="resultFrequency"></span></p>
                                    <p><strong>Estimated Premium:</strong> <span id="resultPremium"
                                            class="fs-4 text-success"></span></p>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-success me-2"><a href="accountmanager">Apply Now</a></button>
                                <button class="btn btn-outline-primary" id="resetCalculator">Calculate Again</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Promise Section -->
    <section class="promise-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="text-white">Our Promise</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="promise-item">
                        <div class="promise-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h4>Transparent Terms</h4>
                        <p>Clear, understandable policies with no hidden clauses.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="promise-item">
                        <div class="promise-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h4>Instant Digital Access</h4>
                        <p>All your policies accessible anytime, anywhere.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="promise-item">
                        <div class="promise-icon">
                            <i class="fas fa-robot"></i>
                        </div>
                        <h4>AI-Driven Claim Settlement</h4>
                        <p>Fast, fair claim processing powered by AI.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="promise-item">
                        <div class="promise-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h4>24/7 Global Support</h4>
                        <p>Round-the-clock assistance whenever you need it.</p>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-8 mx-auto text-center" data-aos="fade-up">
                    <h3 class="mb-3">TheSpace Assurance — Where protection meets innovation.</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center" data-aos="fade-up">
                    <h2 class="cta-title">Ready to Protect Your Future?</h2>
                    <p class="mb-4">Join thousands of satisfied customers who trust TheSpace Assurance for their
                        protection needs.</p>
                    <a href="#calculator" class="btn btn-light btn-lg me-3">Get a Quote</a>
                    <a href="#contact" class="btn btn-outline-light btn-lg">Contact Us</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Contact Us</h2>
                    <p class="section-subtitle">Get in touch with our insurance experts</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 mx-auto" data-aos="fade-up">
                    <div class="row">
                        <div class="col-md-4 mb-4 text-center">
                            <div class="promise-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <h4>Call Us</h4>
                            <p>+1 (800) TheSpace-00</p>
                        </div>

                        <div class="col-md-4 mb-4 text-center">
                            <div class="promise-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <h4>Email Us</h4>
                            <p>info@TheSpaceassurance.com</p>
                        </div>

                        <div class="col-md-4 mb-4 text-center">
                            <div class="promise-icon">
                                <i class="fas fa-comments"></i>
                            </div>
                            <h4>Live Chat</h4>
                            <p>Available 24/7 on our website</p>
                        </div>
                    </div>

                    <form class="mt-4">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="email" class="form-control" placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Subject" required>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" rows="5" placeholder="Your Message" required></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h4 class="footer-heading">TheSpace Assurance</h4>
                    <p>Intelligent Protection for the Future. Combining AI-driven analytics with comprehensive insurance
                        coverage to safeguard what matters most.</p>
                </div>
                <div class="col-lg-2 mb-4">
                    <h4 class="footer-heading">Quick Links</h4>
                    <ul class="list-unstyled">
                        <li><a href="#home" class="text-light">Home</a></li>
                        <li><a href="#insurance" class="text-light">Insurance Plans</a></li>
                        <li><a href="#ai" class="text-light">AI Technology</a></li>
                        <li><a href="#calculator" class="text-light">Premium Calculator</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-4">
                    <h4 class="footer-heading">Insurance Plans</h4>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light">HomeShield</a></li>
                        <li><a href="#" class="text-light">AutoGuard</a></li>
                        <li><a href="#" class="text-light">HealthSecure</a></li>
                        <li><a href="#" class="text-light">FamilyShield</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-4">
                    <h4 class="footer-heading">Contact Info</h4>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt me-2"></i> 123 Assurance Ave, Tech City</li>
                        <li><i class="fas fa-phone me-2"></i> +1 (800) TheSpace-00</li>
                        <li><i class="fas fa-envelope me-2"></i> info@TheSpaceassurance.com</li>
                    </ul>
                </div>
            </div>
            <div class="text-center pt-3 border-top border-secondary">
                <p>&copy; 2023 TheSpace Assurance. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });
        
        // Premium Calculator Functionality
        document.getElementById('premiumCalculator').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form values
            const insuranceType = document.getElementById('insuranceType').value;
            const coverageAmount = parseInt(document.getElementById('coverageAmount').value);
            const age = parseInt(document.getElementById('age').value);
            const location = document.getElementById('location').value;
            const deductible = parseInt(document.getElementById('deductible').value);
            const paymentFrequency = document.getElementById('paymentFrequency').value;
            
            // Calculate base premium (simplified calculation)
            let basePremium = coverageAmount * 0.01; // 1% of coverage amount
            
            // Adjust based on insurance type
            const typeMultipliers = {
                'home': 1.2,
                'auto': 1.0,
                'health': 1.5,
                'family': 0.8,
                'business': 2.0,
                'global': 1.8
            };
            
            basePremium *= typeMultipliers[insuranceType];
            
            // Adjust based on age
            if (age < 25) basePremium *= 1.3;
            else if (age > 60) basePremium *= 1.5;
            
            // Adjust based on location risk
            const locationMultipliers = {
                'low': 0.8,
                'medium': 1.0,
                'high': 1.5
            };
            
            basePremium *= locationMultipliers[location];
            
            // Adjust based on deductible
            basePremium *= (1 - (deductible / 10000) * 0.5);
            
            // Adjust for payment frequency
            if (paymentFrequency === 'monthly') basePremium /= 12;
            else if (paymentFrequency === 'quarterly') basePremium /= 4;
            
            // Format the premium
            const formattedPremium = '$' + Math.round(basePremium).toLocaleString();
            
            // Display results
            document.getElementById('resultType').textContent = document.getElementById('insuranceType').options[document.getElementById('insuranceType').selectedIndex].text;
            document.getElementById('resultCoverage').textContent = coverageAmount.toLocaleString();
            document.getElementById('resultDeductible').textContent = deductible.toLocaleString();
            document.getElementById('resultFrequency').textContent = paymentFrequency.charAt(0).toUpperCase() + paymentFrequency.slice(1);
            document.getElementById('resultPremium').textContent = formattedPremium + (paymentFrequency !== 'yearly' ? ' per ' + paymentFrequency.slice(0, -2) : ' per year');
            
            // Show result box
            document.getElementById('premiumResult').style.display = 'block';
            
            // Scroll to results
            document.getElementById('premiumResult').scrollIntoView({ behavior: 'smooth', block: 'center' });
        });
        
        // Reset calculator
        document.getElementById('resetCalculator').addEventListener('click', function() {
            document.getElementById('premiumCalculator').reset();
            document.getElementById('premiumResult').style.display = 'none';
        });
        
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>

</html>
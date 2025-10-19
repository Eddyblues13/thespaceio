<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - AI Investment Platform</title>
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
        .contact-hero {
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

        /* Contact Section */
        .contact-section {
            padding: 80px 0;
            background: var(--dark-bg);
            /* Updated to match FAQ page */
        }

        .contact-form {
            background: rgba(26, 47, 77, 0.7);
            border-radius: 10px;
            padding: 30px;
            border: 1px solid rgba(58, 123, 213, 0.3);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .form-control {
            background-color: rgba(10, 25, 41, 0.7);
            border: 1px solid rgba(58, 123, 213, 0.3);
            color: var(--text-color);
            padding: 12px 15px;
            margin-bottom: 20px;
        }

        .form-control:focus {
            background-color: rgba(10, 25, 41, 0.9);
            border-color: var(--accent-color);
            color: var(--text-color);
            box-shadow: 0 0 0 0.25rem rgba(58, 123, 213, 0.25);
        }

        .form-label {
            color: var(--accent-color);
            font-weight: 600;
            margin-bottom: 8px;
        }

        .btn-primary {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            color: var(--dark-bg);
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
        }

        /* Contact Info Cards */
        .contact-info-card {
            background: rgba(26, 47, 77, 0.7);
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 30px;
            border: 1px solid rgba(58, 123, 213, 0.3);
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
        }

        .contact-info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            border-color: var(--accent-color);
        }

        .contact-icon {
            font-size: 2.5rem;
            color: var(--accent-color);
            margin-bottom: 15px;
        }

        .contact-detail {
            margin-bottom: 5px;
        }

        .contact-link {
            color: var(--text-color);
            text-decoration: none;
            transition: color 0.3s;
        }

        .contact-link:hover {
            color: var(--accent-color);
        }

        /* Map Section */
        .map-section {
            padding: 50px 0;
            background: rgba(26, 47, 77, 0.3);
        }

        .map-container {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            height: 400px;
            background: rgba(26, 47, 77, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(58, 123, 213, 0.3);
        }

        .map-placeholder {
            text-align: center;
            padding: 20px;
        }

        .map-placeholder i {
            font-size: 4rem;
            color: var(--accent-color);
            margin-bottom: 20px;
        }

        /* FAQ Section */
        .faq-section {
            padding: 80px 0;
            background: var(--dark-bg);
            /* Updated to match FAQ page */
        }

        .accordion-button {
            background-color: rgba(26, 47, 77, 0.7);
            color: var(--text-color);
            border: 1px solid rgba(58, 123, 213, 0.3);
            padding: 15px 20px;
            font-weight: 600;
        }

        .accordion-button:not(.collapsed) {
            background-color: rgba(58, 123, 213, 0.2);
            color: var(--accent-color);
            box-shadow: none;
        }

        .accordion-button:focus {
            box-shadow: 0 0 0 0.25rem rgba(58, 123, 213, 0.25);
            border-color: var(--accent-color);
        }

        .accordion-body {
            background-color: rgba(10, 25, 41, 0.7);
            color: var(--text-color);
            padding: 20px;
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

        .section-header p {
            font-size: 1.1rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
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

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .contact-hero {
                padding: 130px 0 60px;
            }

            .contact-section {
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
            <a class="navbar-brand" href="/">
                <i class="fas fa-brain me-2"></i>THE-SPACE
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
                        <a class="nav-link active" href="contact">Contact</a>
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

    <!-- Hero Section -->
    <section class="contact-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="hero-title">Get In Touch</h1>
                    <p class="hero-subtitle">Have questions about our AI investment platform? Our team is here to help
                        you make informed decisions with cutting-edge technology.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="contact-form">
                        <h3 class="mb-4" style="color: var(--accent-color);">Send Us a Message</h3>
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="firstName" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="firstName" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="lastName" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lastName" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <select class="form-control" id="subject" required>
                                    <option value="" selected disabled>Select a subject</option>
                                    <option value="general">General Inquiry</option>
                                    <option value="investment">Investment Advice</option>
                                    <option value="technical">Technical Support</option>
                                    <option value="partnership">Partnership Opportunity</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" rows="5" required></textarea>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="consent" required>
                                <label class="form-check-label" for="consent">I agree to the processing of my personal
                                    data in accordance with the Privacy Policy</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="contact-info-card">
                        <div class="text-center">
                            <i class="fas fa-map-marker-alt contact-icon"></i>
                            <h4>Our Office</h4>
                            <p class="contact-detail">123 AI Boulevard</p>
                            <p class="contact-detail">Tech Valley, CA 94025</p>
                            <p class="contact-detail">United States</p>
                        </div>
                    </div>

                    <div class="contact-info-card">
                        <div class="text-center">
                            <i class="fas fa-phone contact-icon"></i>
                            <h4>Phone & Email</h4>
                            <p class="contact-detail">
                                <a href="tel:+11234567890" class="contact-link">
                                    <i class="fas fa-phone me-2"></i>+1 (123) 456-7890
                                </a>
                            </p>
                            <p class="contact-detail">
                                <a href="mailto:info@aiinvest.com" class="contact-link">
                                    <i class="fas fa-envelope me-2"></i>info@aiinvest.com
                                </a>
                            </p>
                        </div>
                    </div>

                    <div class="contact-info-card">
                        <div class="text-center">
                            <i class="fas fa-clock contact-icon"></i>
                            <h4>Business Hours</h4>
                            <p class="contact-detail">Monday - Friday: 9:00 AM - 6:00 PM</p>
                            <p class="contact-detail">Saturday: 10:00 AM - 4:00 PM</p>
                            <p class="contact-detail">Sunday: Closed</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <div class="container">
            <div class="section-header">
                <h2>Find Us</h2>
                <p>Visit our headquarters or connect with us remotely</p>
            </div>

            <div class="map-container">
                <div class="map-placeholder">
                    <i class="fas fa-map-marked-alt"></i>
                    <h4>Interactive Map</h4>
                    <p>Our office location would be displayed here</p>
                    <p><small>123 AI Boulevard, Tech Valley, CA 94025</small></p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <div class="section-header">
                <h2>Frequently Asked Questions</h2>
                <p>Quick answers to common questions about our platform</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne">
                                    How does your AI investment platform work?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Our platform uses advanced machine learning algorithms to analyze market data,
                                    identify patterns, and generate investment insights. The AI continuously learns from
                                    new data to improve its predictions and adapt to changing market conditions.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo">
                                    Is my financial data secure with your platform?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes, we employ bank-level encryption and security protocols to protect all user
                                    data. We never share your personal or financial information with third parties
                                    without your explicit consent.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree">
                                    What kind of support do you offer to investors?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    We provide comprehensive support including personalized investment recommendations,
                                    market analysis reports, portfolio tracking tools, and access to our team of
                                    financial experts for more complex inquiries.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour">
                                    Can I try your platform before committing?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Absolutely! We offer a 14-day free trial that gives you access to all our basic
                                    features. During this period, you can explore our platform's capabilities without
                                    any financial commitment.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-5">
                        <p>Didn't find the answer you were looking for? <a href="faq"
                                style="color: var(--accent-color);">Visit our full FAQ page</a> or <a
                                href="#contactForm" style="color: var(--accent-color);">contact us directly</a>.</p>
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
                <p class="mb-0">&copy; 2023 AI Investment Platform. All rights reserved.</p>
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
            
            // Form submission handler
            const contactForm = document.getElementById('contactForm');
            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    // Get form values
                    const firstName = document.getElementById('firstName').value;
                    const email = document.getElementById('email').value;
                    
                    // In a real application, you would send this data to a server
                    // For this example, we'll just show an alert
                    alert(`Thank you ${firstName}! Your message has been received. We'll contact you at ${email} soon.`);
                    
                    // Reset form
                    contactForm.reset();
                });
            }
        });
    </script>
</body>

</html>
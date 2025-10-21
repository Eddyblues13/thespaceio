<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Investment Platform - KYC Verification</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            margin: 0;
            padding: 0;
        }

        /* KYC Modal Overlay */
        #kyc-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(10, 25, 41, 0.95);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(5px);
            padding: 20px;
            box-sizing: border-box;
        }

        .kyc-modal {
            background: rgba(26, 47, 77, 0.95);
            border-radius: 15px;
            padding: 25px;
            max-width: 480px;
            width: 100%;
            max-height: 90vh;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.5);
            border: 2px solid var(--accent-color);
            text-align: center;
            position: relative;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .kyc-header {
            margin-bottom: 20px;
            flex-shrink: 0;
        }

        .kyc-icon {
            font-size: 3rem;
            color: var(--accent-color);
            margin-bottom: 10px;
        }

        .kyc-title {
            font-size: 1.8rem;
            color: var(--accent-color);
            margin-bottom: 8px;
        }

        .kyc-subtitle {
            font-size: 1rem;
            opacity: 0.9;
            margin-bottom: 20px;
        }

        .kyc-content {
            flex: 1;
            overflow-y: auto;
            padding-right: 5px;
            margin-bottom: 15px;
        }

        /* Custom scrollbar */
        .kyc-content::-webkit-scrollbar {
            width: 6px;
        }

        .kyc-content::-webkit-scrollbar-track {
            background: rgba(10, 25, 41, 0.5);
            border-radius: 10px;
        }

        .kyc-content::-webkit-scrollbar-thumb {
            background: var(--accent-color);
            border-radius: 10px;
        }

        .kyc-form {
            text-align: left;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            color: var(--accent-color);
            font-weight: 600;
            margin-bottom: 6px;
            font-size: 0.95rem;
        }

        .form-control {
            background: rgba(10, 25, 41, 0.7);
            border: 1px solid rgba(58, 123, 213, 0.3);
            color: var(--text-color);
            border-radius: 6px;
            padding: 10px 12px;
            font-size: 0.95rem;
        }

        .form-control:focus {
            background: rgba(10, 25, 41, 0.9);
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.2rem rgba(58, 123, 213, 0.25);
            color: var(--text-color);
        }

        .form-control::placeholder {
            color: rgba(232, 245, 233, 0.6);
        }

        .captcha-container {
            background: rgba(10, 25, 41, 0.7);
            border-radius: 6px;
            padding: 15px;
            margin: 15px 0;
            border: 1px solid rgba(58, 123, 213, 0.3);
        }

        .captcha-text {
            font-family: 'Courier New', monospace;
            font-size: 1.3rem;
            font-weight: bold;
            letter-spacing: 2px;
            background: linear-gradient(45deg, var(--accent-color), #5dade2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
            user-select: none;
        }

        .captcha-input {
            text-align: center;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .btn-kyc {
            background: var(--accent-color);
            color: var(--dark-bg);
            border: none;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 6px;
            transition: all 0.3s;
            width: 100%;
            margin-top: 5px;
            font-size: 0.95rem;
        }

        .btn-kyc:hover {
            background: #5dade2;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-enter {
            background: linear-gradient(45deg, var(--accent-color), #5dade2);
            color: var(--dark-bg);
            border: none;
            font-weight: bold;
            padding: 12px 30px;
            border-radius: 8px;
            transition: all 0.3s;
            font-size: 1.1rem;
            margin-top: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            width: 100%;
        }

        .btn-enter:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        }

        .btn-enter:disabled {
            background: rgba(58, 123, 213, 0.5);
            transform: none;
            box-shadow: none;
            cursor: not-allowed;
        }

        .kyc-footer {
            margin-top: 15px;
            font-size: 0.85rem;
            opacity: 0.8;
            flex-shrink: 0;
        }

        .kyc-footer a {
            color: var(--accent-color);
            text-decoration: none;
        }

        .kyc-footer a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: #ff6b6b;
            font-size: 0.85rem;
            margin-top: 4px;
            display: none;
        }

        .success-message {
            color: var(--accent-color);
            font-size: 0.95rem;
            margin-top: 8px;
            display: none;
        }

        /* Homepage Content - Initially Hidden */
        #homepage-content {
            display: none;
        }

        /* Responsive adjustments for KYC modal */
        @media (max-width: 768px) {
            .kyc-modal {
                padding: 20px;
                max-height: 85vh;
                margin: 10px;
            }

            .kyc-title {
                font-size: 1.6rem;
            }

            .kyc-icon {
                font-size: 2.5rem;
            }

            .kyc-subtitle {
                font-size: 0.9rem;
            }

            .form-control {
                padding: 12px 15px;
                font-size: 16px;
                /* Prevents zoom on iOS */
            }

            .captcha-text {
                font-size: 1.1rem;
            }
        }

        @media (max-width: 576px) {
            .kyc-modal {
                padding: 15px;
                max-height: 90vh;
            }

            .kyc-title {
                font-size: 1.4rem;
            }

            .kyc-icon {
                font-size: 2rem;
            }

            .form-group {
                margin-bottom: 12px;
            }

            .btn-kyc,
            .btn-enter {
                padding: 12px 20px;
                font-size: 1rem;
            }
        }

        @media (max-height: 700px) {
            .kyc-modal {
                max-height: 95vh;
            }

            .kyc-header {
                margin-bottom: 15px;
            }

            .form-group {
                margin-bottom: 12px;
            }
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

        /* Dropdown Menu Fix */
        .navbar-nav .dropdown-menu {
            background: rgba(26, 47, 77, 0.95);
            border: 1px solid var(--accent-color);
            backdrop-filter: blur(10px);
        }

        .navbar-nav .dropdown-item {
            color: var(--text-color);
            transition: all 0.3s;
        }

        .navbar-nav .dropdown-item:hover {
            background: var(--accent-color);
            color: var(--dark-bg);
        }

        .dropdown-divider {
            border-color: rgba(58, 123, 213, 0.3);
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

        /* Investment Tiers Section */
        .investment-section {
            padding: 80px 0;
            background: rgba(26, 47, 77, 0.3);
        }

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

        /* Investment Tier Cards */
        .tier-card {
            background: rgba(26, 47, 77, 0.7);
            border-radius: 10px;
            padding: 30px;
            margin-bottom: 30px;
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid rgba(58, 123, 213, 0.3);
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .tier-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
            border-color: var(--accent-color);
        }

        .tier-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: var(--accent-color);
            color: var(--dark-bg);
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
            color: var(--text-color);
        }

        .tier-features {
            list-style: none;
            padding: 0;
            margin-bottom: 25px;
        }

        .tier-features li {
            padding: 8px 0;
            border-bottom: 1px solid rgba(58, 123, 213, 0.2);
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
            color: var(--dark-bg);
            border: none;
            font-weight: bold;
            padding: 10px 25px;
            border-radius: 5px;
            transition: all 0.3s;
        }

        .btn-tier:hover {
            background: #5dade2;
            transform: translateY(-2px);
        }

        /* 3D Container */
        #ai-model-container {
            width: 100%;
            height: 400px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            position: relative;
        }

        .ai-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 5rem;
            font-weight: 900;
            color: rgba(58, 123, 213, 0.7);
            text-shadow: 0 0 20px rgba(93, 173, 226, 0.5);
            z-index: 10;
            pointer-events: none;
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
            object-fit: contain;
            max-width: 100%;
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

        /* Stock Charts Section */
        .stock-charts-section {
            padding: 80px 0;
            background: rgba(26, 47, 77, 0.3);
        }

        .chart-container {
            background: rgba(26, 47, 77, 0.7);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
            border: 1px solid rgba(58, 123, 213, 0.3);
            height: 100%;
        }

        .chart-title {
            color: var(--accent-color);
            margin-bottom: 15px;
            font-size: 1.2rem;
        }

        /* Major Stocks Section */
        .major-stocks-section {
            padding: 80px 0;
        }

        .stock-card {
            background: rgba(26, 47, 77, 0.7);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid rgba(58, 123, 213, 0.3);
            transition: transform 0.3s;
        }

        .stock-card:hover {
            transform: translateY(-5px);
            border-color: var(--accent-color);
        }

        .stock-symbol {
            font-weight: bold;
            font-size: 1.2rem;
            color: var(--accent-color);
        }

        .stock-name {
            font-size: 0.9rem;
            opacity: 0.8;
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

        /* Startup Cards */
        .startup-card {
            background: rgba(26, 47, 77, 0.7);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid rgba(58, 123, 213, 0.3);
            height: 100%;
        }

        .startup-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
            border-color: var(--accent-color);
        }

        .startup-logo {
            height: 60px;
            margin-bottom: 15px;
            object-fit: contain;
            max-width: 100%;
        }

        .valuation-widget {
            background: rgba(10, 25, 41, 0.8);
            border-radius: 8px;
            padding: 15px;
            margin-top: 15px;
            border-left: 4px solid var(--accent-color);
        }

        .valuation-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--accent-color);
        }

        /* Minor Companies Widget */
        .minor-companies-widget {
            background: rgba(26, 47, 77, 0.7);
            border-radius: 10px;
            padding: 30px;
            margin-top: 30px;
            border: 1px solid rgba(58, 123, 213, 0.3);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .minor-company-logo {
            height: 40px;
            margin: 10px;
            object-fit: contain;
            opacity: 0.8;
            transition: opacity 0.3s, transform 0.3s;
        }

        .minor-company-logo:hover {
            opacity: 1;
            transform: scale(1.1);
        }

        /* Enhanced Companies Carousel */
        .companies-carousel-container {
            position: relative;
            overflow: hidden;
            padding: 20px 0;
        }

        .companies-carousel {
            display: flex;
            transition: transform 0.5s ease;
            gap: 20px;
        }

        .company-logo-item {
            flex: 0 0 auto;
            width: 120px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(10, 25, 41, 0.6);
            border-radius: 8px;
            padding: 10px;
            border: 1px solid rgba(58, 123, 213, 0.3);
            transition: all 0.3s ease;
        }

        .company-logo-item:hover {
            transform: translateY(-5px);
            border-color: var(--accent-color);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .company-logo-item img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .carousel-control {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(10, 25, 41, 0.8);
            border: 1px solid var(--accent-color);
            color: var(--accent-color);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
            transition: all 0.3s ease;
        }

        .carousel-control:hover {
            background: var(--accent-color);
            color: var(--dark-bg);
        }

        .carousel-control.prev {
            left: 10px;
        }

        .carousel-control.next {
            right: 10px;
        }

        .carousel-dots {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            gap: 10px;
        }

        .carousel-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(58, 123, 213, 0.3);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .carousel-dot.active {
            background: var(--accent-color);
            transform: scale(1.2);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;

            }

            #ai-model-container {
                height: 300px;
            }

            .ai-text {
                font-size: 3rem;
            }

            .minor-company-logo {
                height: 30px;
                margin: 5px;
            }

            .company-logo-item {
                width: 100px;
                height: 70px;
            }

            .carousel-control {
                width: 35px;
                height: 35px;
            }
        }
    </style>

    <!-- Smartsupp Live Chat script -->
    <script type="text/javascript">
        var _smartsupp = _smartsupp || {};
_smartsupp.key = 'f6a3d316c4b17c246e490d79381c7db5c5e2f484';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
    </script>
    <noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>

</head>

<body>
    <!-- KYC Verification Modal -->
    <div id="kyc-overlay">
        <div class="kyc-modal">
            <div class="kyc-header">
                <div class="kyc-icon">
                    <i class="fas fa-user-shield"></i>
                </div>
                <h2 class="kyc-title">Identity Verification</h2>
                <p class="kyc-subtitle">Please complete this quick verification to access our AI Investment Platform</p>
            </div>

            <div class="kyc-content">
                <form id="kyc-form" class="kyc-form">
                    <div class="form-group">
                        <label for="fullName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullName" placeholder="Enter your full name"
                            required>
                        <div class="error-message" id="nameError">Please enter your full name</div>
                    </div>

                    <div class="form-group">
                        <label for="country" class="form-label">Country of Residence</label>
                        <select class="form-control" id="country" required>
                            <option value="" disabled selected>Select your country</option>
                            <option value="US">United States</option>
                            <option value="UK">United Kingdom</option>
                            <option value="CA">Canada</option>
                            <option value="AU">Australia</option>
                            <option value="DE">Germany</option>
                            <option value="FR">France</option>
                            <option value="JP">Japan</option>
                            <option value="SG">Singapore</option>
                            <option value="other">Other</option>
                        </select>
                        <div class="error-message" id="countryError">Please select your country</div>
                    </div>

                    <div class="captcha-container">
                        <p class="form-label">Human Verification</p>
                        <div class="captcha-text" id="captchaText">A1B2C3</div>
                        <input type="text" class="form-control captcha-input" id="captchaInput"
                            placeholder="Enter the code above" maxlength="6" required>
                        <div class="error-message" id="captchaError">Incorrect verification code</div>
                        <button type="button" class="btn btn-outline-light btn-sm mt-2" id="refreshCaptcha">
                            <i class="fas fa-redo-alt me-1"></i> Refresh Code
                        </button>
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="termsCheck" required>
                        <label class="form-check-label" for="termsCheck">
                            I agree to the <a href="#" target="_blank">Terms of Service</a> and <a href="#"
                                target="_blank">Privacy Policy</a>
                        </label>
                        <div class="error-message" id="termsError">You must agree to the terms</div>
                    </div>

                    <button type="submit" class="btn btn-kyc" id="verifyBtn">
                        <i class="fas fa-check-circle me-2"></i> Verify Identity
                    </button>

                    <div class="success-message" id="successMessage">
                        <i class="fas fa-check-circle me-2"></i> Verification successful!
                    </div>
                </form>

                <!-- Enter Button -->
                <div id="enter-section" style="display: none;">
                    <div class="mt-3 pt-3 border-top border-secondary">
                        <p class="mb-3">You are now verified. Click the button below to enter the platform:</p>
                        <button class="btn btn-enter" id="enterBtn">
                            <i class="fas fa-arrow-right me-2"></i> Enter AI Investment Platform
                        </button>
                    </div>
                </div>
            </div>

            <div class="kyc-footer">
                <p>This verification helps us maintain a secure environment for all investors.</p>
            </div>
        </div>
    </div>

    <!-- Main Content (Initially Hidden) -->
    <div id="homepage-content">
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
                        <h1 class="hero-title">THE SPACE AI REVOLUTION</h1>
                        <p class="hero-subtitle">Where all Ai assets are united, this is the future and we bring the
                            future to you</p>
                        <div class="mt-4">
                            <a href="#companies" class="btn btn-primary btn-lg me-3">Explore Companies</a>
                            <br><br>
                            <a href="{{route('login')}}" class="btn btn-outline-light btn-lg">Create Account</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div id="ai-model-container">
                            <div class="ai-text">AI</div>
                            <!-- 3D AI Model will be rendered here -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Companies Section -->
        <section id="companies" class="py-5">
            <div class="container">
                <div class="section-header">
                    <h2>Featured Companies</h2>
                    <p>Explore our AI-driven analysis of top tech companies</p>
                </div>

                <div class="row">
                    <!-- Nvidia Card -->
                    <div class="col-md-6 col-lg-3">
                        <div class="company-card">
                            <img src="img/nvidia.png" alt="Nvidia" class="company-logo">
                            <h4>Nvidia</h4>
                            <p>Leading semiconductor company powering the AI revolution with GPUs and AI computing
                                platforms.</p>

                            <div class="stock-widget">
                                <div class="stock-price">$950.02</div>
                                <div class="stock-change positive">+5.12% <i class="fas fa-arrow-up"></i></div>
                                <small>Last updated: 10:15 AM EST</small>
                            </div>

                            <a href="nvidia" class="btn btn-outline-light mt-3">View Analysis</a>
                        </div>
                    </div>

                    <!-- OpenAI Card -->
                    <div class="col-md-6 col-lg-3">
                        <div class="company-card">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4d/OpenAI_Logo.svg/1200px-OpenAI_Logo.svg.png"
                                alt="OpenAI" class="company-logo">
                            <h4>OpenAI</h4>
                            <p>Creator of ChatGPT and leading AI research company focused on developing safe artificial
                                general intelligence.</p>

                            <div class="stock-widget">
                                <div class="stock-price">$86B</div>
                                <div class="stock-change positive">Microsoft Backed <i class="fas fa-arrow-up"></i>
                                </div>
                                <small>Latest Valuation</small>
                            </div>

                            <a href="openai" class="btn btn-outline-light mt-3">View Analysis</a>
                        </div>
                    </div>

                    <!-- Tesla Card -->
                    <div class="col-md-6 col-lg-3">
                        <div class="company-card">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/bb/Tesla_T_symbol.svg/1200px-Tesla_T_symbol.svg.png"
                                alt="Tesla" class="company-logo">
                            <h4>Tesla Inc.</h4>
                            <p>Revolutionizing sustainable energy and transportation with cutting-edge AI and
                                automation.</p>

                            <div class="stock-widget">
                                <div class="stock-price">$245.78</div>
                                <div class="stock-change positive">+2.34% <i class="fas fa-arrow-up"></i></div>
                                <small>Last updated: 10:15 AM EST</small>
                            </div>

                            <a href="tesla" class="btn btn-outline-light mt-3">View Analysis</a>
                        </div>
                    </div>

                    <!-- Oracle Card -->
                    <div class="col-md-6 col-lg-3">
                        <div class="company-card">
                            <img src="https://logos-world.net/wp-content/uploads/2020/09/Oracle-Logo.png" alt="Oracle"
                                class="company-logo" style="filter: brightness(0) invert(1);">
                            <h4>Oracle Corp.</h4>
                            <p>Leading provider of enterprise cloud computing and database solutions powered by AI.</p>

                            <div class="stock-widget">
                                <div class="stock-price">$118.42</div>
                                <div class="stock-change positive">+1.27% <i class="fas fa-arrow-up"></i></div>
                                <small>Last updated: 10:15 AM EST</small>
                            </div>

                            <a href="oracle" class="btn btn-outline-light mt-3">View Analysis</a>
                        </div>
                    </div>
                </div>

                <!-- Second Row of Featured Companies -->
                <div class="row mt-4">
                    <!-- Google Card -->
                    <div class="col-md-6 col-lg-3">
                        <div class="company-card">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/1200px-Google_2015_logo.svg.png"
                                alt="Google" class="company-logo">
                            <h4>Alphabet (Google)</h4>
                            <p>Global technology leader in search, AI research, cloud computing, and digital
                                advertising.</p>

                            <div class="stock-widget">
                                <div class="stock-price">$142.65</div>
                                <div class="stock-change negative">-0.85% <i class="fas fa-arrow-down"></i></div>
                                <small>Last updated: 10:15 AM EST</small>
                            </div>

                            <a href="google" class="btn btn-outline-light mt-3">View Analysis</a>
                        </div>
                    </div>

                    <!-- Facebook Card -->
                    <div class="col-md-6 col-lg-3">
                        <div class="company-card">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Facebook_f_logo_%282019%29.svg/1200px-Facebook_f_logo_%282019%29.svg.png"
                                alt="Facebook" class="company-logo">
                            <h4>Meta (Facebook)</h4>
                            <p>Pioneering social connectivity and building the next evolution of digital interaction.
                            </p>

                            <div class="stock-widget">
                                <div class="stock-price">$318.25</div>
                                <div class="stock-change positive">+3.12% <i class="fas fa-arrow-up"></i></div>
                                <small>Last updated: 10:15 AM EST</small>
                            </div>

                            <a href="facebook" class="btn btn-outline-light mt-3">View Analysis</a>
                        </div>
                    </div>

                    <!-- Microsoft Card -->
                    <div class="col-md-6 col-lg-3">
                        <div class="company-card">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Microsoft_logo.svg/1200px-Microsoft_logo.svg.png"
                                alt="Microsoft" class="company-logo">
                            <h4>Microsoft</h4>
                            <p>Leading provider of cloud services, enterprise software, and AI solutions through Azure
                                and Copilot.</p>

                            <div class="stock-widget">
                                <div class="stock-price">$378.85</div>
                                <div class="stock-change positive">+0.89% <i class="fas fa-arrow-up"></i></div>
                                <small>Last updated: 10:15 AM EST</small>
                            </div>

                            <a href="microsoft" class="btn btn-outline-light mt-3">View Analysis</a>
                        </div>
                    </div>

                    <!-- Apple Card -->
                    <div class="col-md-6 col-lg-3">
                        <div class="company-card">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Apple_logo_black.svg/1200px-Apple_logo_black.svg.png"
                                alt="Apple" class="company-logo">
                            <h4>Apple Inc.</h4>
                            <p>Integrating AI across its ecosystem with Siri, Core ML, and on-device machine learning
                                capabilities.</p>

                            <div class="stock-widget">
                                <div class="stock-price">$189.25</div>
                                <div class="stock-change positive">+1.24% <i class="fas fa-arrow-up"></i></div>
                                <small>Last updated: 10:15 AM EST</small>
                            </div>

                            <a href="apple" class="btn btn-outline-light mt-3">View Analysis</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- AI Startups Section -->
        <section class="py-5" style="background: rgba(26, 47, 77, 0.3);">
            <div class="container">
                <div class="section-header">
                    <h2>AI Startups (High Growth Potential)</h2>
                    <p>Rapidly growing private companies at the forefront of AI innovation</p>
                </div>

                <div class="row">
                    <!-- Anthropic Card -->
                    <div class="col-md-6 col-lg-4">
                        <div class="startup-card">
                            <img src="img/anthropic.png" alt="Anthropic" class="startup-logo">
                            <h4>Anthropic</h4>
                            <p>Safety-focused AI company developing Claude chatbot and constitutional AI to ensure
                                beneficial outcomes.</p>

                            <div class="valuation-widget">
                                <div class="valuation-price">$18.4B</div>
                                <div class="stock-change positive">Amazon Backed <i class="fas fa-arrow-up"></i></div>
                                <small>Latest Valuation</small>
                            </div>

                            <a href="anthropic" class="btn btn-outline-light mt-3">View Analysis</a>
                        </div>
                    </div>

                    <!-- Stability AI Card -->
                    <div class="col-md-6 col-lg-4">
                        <div class="startup-card">
                            <img src="img/stability.jpeg" alt="Stability AI" class="startup-logo">
                            <h4>Stability AI</h4>
                            <p>Creator of Stable Diffusion, leading open-source AI image generation and multimodal AI
                                models.</p>

                            <div class="valuation-widget">
                                <div class="valuation-price">$1B</div>
                                <div class="stock-change positive">Open Source Focus <i class="fas fa-arrow-up"></i>
                                </div>
                                <small>Latest Valuation</small>
                            </div>

                            <a href="stability" class="btn btn-outline-light mt-3">View Analysis</a>
                        </div>
                    </div>

                    <!-- Cohere Card -->
                    <div class="col-md-6 col-lg-4">
                        <div class="startup-card">
                            <img src="img/cohere.jpeg" alt="Cohere" class="startup-logo">
                            <h4>Cohere</h4>
                            <p>Enterprise-focused AI company providing natural language models for businesses to build
                                AI applications.</p>

                            <div class="valuation-widget">
                                <div class="valuation-price">$2.2B</div>
                                <div class="stock-change positive">Enterprise Focus <i class="fas fa-arrow-up"></i>
                                </div>
                                <small>Latest Valuation</small>
                            </div>

                            <a href="cohere" class="btn btn-outline-light mt-3">View Analysis</a>
                        </div>
                    </div>

                    <!-- Hugging Face Card -->
                    <div class="col-md-6 col-lg-4">
                        <div class="startup-card">
                            <img src="https://huggingface.co/front/assets/huggingface_logo-noborder.svg"
                                alt="Hugging Face" class="startup-logo">
                            <h4>Hugging Face</h4>
                            <p>Open-source AI community and platform hosting thousands of models, datasets, and AI
                                applications.</p>

                            <div class="valuation-widget">
                                <div class="valuation-price">$4.5B</div>
                                <div class="stock-change positive">Community Driven <i class="fas fa-arrow-up"></i>
                                </div>
                                <small>Latest Valuation</small>
                            </div>

                            <a href="huggingface" class="btn btn-outline-light mt-3">View Analysis</a>
                        </div>
                    </div>

                    <!-- Scale AI Card -->
                    <div class="col-md-6 col-lg-4">
                        <div class="startup-card">
                            <img src="img/scale.jpeg" alt="Scale AI" class="startup-logo">
                            <h4>Scale AI</h4>
                            <p>Data labeling and infrastructure platform for AI training, working with companies like
                                OpenAI and Microsoft.</p>

                            <div class="valuation-widget">
                                <div class="valuation-price">$7.3B</div>
                                <div class="stock-change positive">Infrastructure Focus <i class="fas fa-arrow-up"></i>
                                </div>
                                <small>Latest Valuation</small>
                            </div>

                            <a href="scale" class="btn btn-outline-light mt-3">View Analysis</a>
                        </div>
                    </div>

                    <!-- Runway AI Card -->
                    <div class="col-md-6 col-lg-4">
                        <div class="startup-card">
                            <img src="img/runway.png" alt="Runway AI" class="startup-logo">
                            <h4>Runway AI</h4>
                            <p>AI video and image editing tools used by creative professionals and Hollywood studios for
                                content creation.</p>

                            <div class="valuation-widget">
                                <div class="valuation-price">$1.5B</div>
                                <div class="stock-change positive">Creative Focus <i class="fas fa-arrow-up"></i></div>
                                <small>Latest Valuation</small>
                            </div>

                            <a href="runway" class="btn btn-outline-light mt-3">View Analysis</a>
                        </div>
                    </div>

                    <!-- Character.AI Card -->
                    <div class="col-md-6 col-lg-4">
                        <div class="startup-card">
                            <img src="img/character.jpeg" alt="Character.AI" class="startup-logo">
                            <h4>Character.AI</h4>
                            <p>Interactive chatbot platform with AI personalities for entertainment, education, and
                                social interaction.</p>

                            <div class="valuation-widget">
                                <div class="valuation-price">$1B</div>
                                <div class="stock-change positive">Entertainment Focus <i class="fas fa-arrow-up"></i>
                                </div>
                                <small>Latest Valuation</small>
                            </div>

                            <a href="character" class="btn btn-outline-light mt-3">View Analysis</a>
                        </div>
                    </div>

                    <!-- Inflection AI Card -->
                    <div class="col-md-6 col-lg-4">
                        <div class="startup-card">
                            <img src="img/inflection.jpeg" alt="Inflection AI" class="startup-logo">
                            <h4>Inflection AI</h4>
                            <p>Developing personal AI assistants to help people accomplish tasks and access information
                                more effectively.</p>

                            <div class="valuation-widget">
                                <div class="valuation-price">$4B</div>
                                <div class="stock-change positive">Personal AI Focus <i class="fas fa-arrow-up"></i>
                                </div>
                                <small>Latest Valuation</small>
                            </div>

                            <a href="inflection" class="btn btn-outline-light mt-3">View Analysis</a>
                        </div>
                    </div>

                    <!-- Mistral AI Card -->
                    <div class="col-md-6 col-lg-4">
                        <div class="startup-card">
                            <img src="img/mistral.png" alt="Mistral AI" class="startup-logo">
                            <h4>Mistral AI</h4>
                            <p>European open-source AI company developing efficient language models with strong
                                performance.</p>

                            <div class="valuation-widget">
                                <div class="valuation-price">$2B</div>
                                <div class="stock-change positive">European Focus <i class="fas fa-arrow-up"></i></div>
                                <small>Latest Valuation</small>
                            </div>

                            <a href="mistral" class="btn btn-outline-light mt-3">View Analysis</a>
                        </div>
                    </div>
                </div>

                <!-- Enhanced Companies Carousel -->
                <div class="minor-companies-widget">
                    <div class="section-header">
                        <h3>Other Companies Using AI</h3>
                        <p>Additional established companies integrating AI into their products and services</p>
                    </div>

                    <div class="companies-carousel-container">
                        <div class="carousel-control prev">
                            <i class="fas fa-chevron-left"></i>
                        </div>
                        <div class="companies-carousel" id="companiesCarousel">
                            <!-- Company logos will be added here by JavaScript -->
                        </div>
                        <div class="carousel-control next">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                        <div class="carousel-dots" id="carouselDots">
                            <!-- Dots will be added here by JavaScript -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Major Stocks Widgets Section -->
        <section class="major-stocks-section">
            <div class="container">
                <div class="section-header">
                    <h2>Major Stock Markets</h2>
                    <p>Real-time performance of global markets and major companies</p>
                </div>

                <div class="row">
                    <!-- US Market Indices -->
                    <div class="col-lg-4 mb-4">
                        <h4 class="mb-3" style="color: var(--accent-color);">US Market Indices</h4>

                        <div class="stock-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="stock-symbol">S&P 500</div>
                                    <div class="stock-name">S&P 500 Index</div>
                                </div>
                                <div class="text-end">
                                    <div class="stock-price">4,567.25</div>
                                    <div class="stock-change positive">+0.68% <i class="fas fa-arrow-up"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="stock-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="stock-symbol">DOW</div>
                                    <div class="stock-name">Dow Jones Industrial</div>
                                </div>
                                <div class="text-end">
                                    <div class="stock-price">35,654.29</div>
                                    <div class="stock-change positive">+0.42% <i class="fas fa-arrow-up"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="stock-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="stock-symbol">NASDAQ</div>
                                    <div class="stock-name">NASDAQ Composite</div>
                                </div>
                                <div class="text-end">
                                    <div class="stock-price">14,316.66</div>
                                    <div class="stock-change negative">-0.12% <i class="fas fa-arrow-down"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tech Stocks -->
                    <div class="col-lg-4 mb-4">
                        <h4 class="mb-3" style="color: var(--accent-color);">Major Tech Stocks</h4>

                        <div class="stock-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="stock-symbol">AAPL</div>
                                    <div class="stock-name">Apple Inc.</div>
                                </div>
                                <div class="text-end">
                                    <div class="stock-price">$189.25</div>
                                    <div class="stock-change positive">+1.24% <i class="fas fa-arrow-up"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="stock-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="stock-symbol">MSFT</div>
                                    <div class="stock-name">Microsoft Corp.</div>
                                </div>
                                <div class="text-end">
                                    <div class="stock-price">$378.85</div>
                                    <div class="stock-change positive">+0.89% <i class="fas fa-arrow-up"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="stock-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="stock-symbol">AMZN</div>
                                    <div class="stock-name">Amazon.com Inc.</div>
                                </div>
                                <div class="text-end">
                                    <div class="stock-price">$145.62</div>
                                    <div class="stock-change negative">-0.35% <i class="fas fa-arrow-down"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Global Markets -->
                    <div class="col-lg-4 mb-4">
                        <h4 class="mb-3" style="color: var(--accent-color);">Global Markets</h4>

                        <div class="stock-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="stock-symbol">FTSE</div>
                                    <div class="stock-name">FTSE 100 (UK)</div>
                                </div>
                                <div class="text-end">
                                    <div class="stock-price">7,654.32</div>
                                    <div class="stock-change positive">+0.56% <i class="fas fa-arrow-up"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="stock-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="stock-symbol">DAX</div>
                                    <div class="stock-name">DAX (Germany)</div>
                                </div>
                                <div class="text-end">
                                    <div class="stock-price">15,987.21</div>
                                    <div class="stock-change positive">+0.78% <i class="fas fa-arrow-up"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="stock-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="stock-symbol">NIKKEI</div>
                                    <div class="stock-name">Nikkei 225 (Japan)</div>
                                </div>
                                <div class="text-end">
                                    <div class="stock-price">33,245.67</div>
                                    <div class="stock-change negative">-0.23% <i class="fas fa-arrow-down"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stock Charts Section -->
        <section class="stock-charts-section">
            <div class="container">
                <div class="section-header">
                    <h2>Market Performance Charts</h2>
                    <p>AI-powered analysis of market trends and performance</p>
                </div>

                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <div class="chart-container">
                            <h4 class="chart-title">S&P 500 Performance (6 Months)</h4>
                            <canvas id="sp500Chart"></canvas>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-4">
                        <div class="chart-container">
                            <h4 class="chart-title">NASDAQ Composite (6 Months)</h4>
                            <canvas id="nasdaqChart"></canvas>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-4">
                        <div class="chart-container">
                            <h4 class="chart-title">Tech Sector Performance</h4>
                            <canvas id="techSectorChart"></canvas>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-4">
                        <div class="chart-container">
                            <h4 class="chart-title">Global Markets Comparison</h4>
                            <canvas id="globalMarketsChart"></canvas>
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
                        <h4 class="footer-heading">AI Investment Platform</h4>
                        <p>Providing cutting-edge AI analysis for investment decisions in the rapidly evolving
                            technology sector.</p>
                        <div class="mt-3">
                            <a href="#" class="text-light me-3"><i class="fab fa-twitter fa-lg"></i></a>
                            <a href="#" class="text-light me-3"><i class="fab fa-linkedin fa-lg"></i></a>
                            <a href="#" class="text-light me-3"><i class="fab fa-facebook fa-lg"></i></a>
                            <a href="#" class="text-light"><i class="fab fa-instagram fa-lg"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-2 mb-4">
                        <h4 class="footer-heading">Quick Links</h4>
                        <ul class="list-unstyled">
                            <li><a href="{{url('/')}}" class="text-light">Home</a></li>
                            <li><a href="about" class="text-light">About Us</a></li>
                            <li><a href="contact" class="text-light">Contact</a></li>
                            <li><a href="faq" class="text-light">FAQ</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 mb-4">
                        <h4 class="footer-heading">Companies</h4>
                        <ul class="list-unstyled">
                            <li><a href="nvidia" class="text-light">Nvidia</a></li>
                            <li><a href="openai" class="text-light">OpenAI</a></li>
                            <li><a href="tesla" class="text-light">Tesla</a></li>
                            <li><a href="google" class="text-light">Google</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 mb-4">
                        <h4 class="footer-heading">Contact Info</h4>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-map-marker-alt me-2"></i> 123 AI Street, TechCity, Qatar.</li>
                            <li><i class="fas fa-phone me-2"></i> +971-3335-5678</li>
                            <li><i class="fas fa-envelope me-2"></i> info@thespace.com</li>
                        </ul>
                    </div>
                </div>
                <div class="text-center pt-3 border-top border-secondary">
                    <p>&copy; 1995 AI Investment Platform. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // KYC Verification Logic with First Visit Detection
        document.addEventListener('DOMContentLoaded', function() {
            // Check if this is the user's first visit to the homepage
            const isFirstHomepageVisit = !localStorage.getItem('homepageVisited');
            
            if (isFirstHomepageVisit) {
                // Show KYC overlay only on first homepage visit
                document.getElementById('kyc-overlay').style.display = 'flex';
                document.body.style.overflow = 'hidden';
                
                // Mark homepage as visited
                localStorage.setItem('homepageVisited', 'true');
            } else {
                // User has visited before, show homepage directly
                document.getElementById('kyc-overlay').style.display = 'none';
                document.getElementById('homepage-content').style.display = 'block';
                document.body.style.overflow = 'auto';
                
                // Initialize homepage features
                initCodeBackground();
                init3DScene();
                initCharts();
                initCompaniesCarousel();
            }
            
            // Generate initial CAPTCHA
            generateCaptcha();
            
            // Refresh CAPTCHA button
            document.getElementById('refreshCaptcha').addEventListener('click', generateCaptcha);
            
            // Form submission
            document.getElementById('kyc-form').addEventListener('submit', function(e) {
                e.preventDefault();
                if (validateForm()) {
                    // Simulate verification process
                    document.getElementById('verifyBtn').disabled = true;
                    document.getElementById('verifyBtn').innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Verifying...';
                    
                    setTimeout(function() {
                        document.getElementById('successMessage').style.display = 'block';
                        document.getElementById('enter-section').style.display = 'block';
                        document.getElementById('kyc-form').style.display = 'none';
                        
                        // Store verification status in localStorage
                        localStorage.setItem('kycVerified', 'true');
                    }, 2000);
                }
            });
            
            // Enter platform button
            document.getElementById('enterBtn').addEventListener('click', function() {
                document.getElementById('kyc-overlay').style.display = 'none';
                document.getElementById('homepage-content').style.display = 'block';
                document.body.style.overflow = 'auto';
                
                // Initialize homepage features
                initCodeBackground();
                init3DScene();
                initCharts();
                initCompaniesCarousel();
            });
            
            // Form validation (email removed)
            function validateForm() {
                let isValid = true;
                
                // Full Name validation
                const fullName = document.getElementById('fullName').value.trim();
                if (fullName === '') {
                    document.getElementById('nameError').style.display = 'block';
                    isValid = false;
                } else {
                    document.getElementById('nameError').style.display = 'none';
                }
                
                // Country validation
                const country = document.getElementById('country').value;
                if (country === '' || country === null) {
                    document.getElementById('countryError').style.display = 'block';
                    isValid = false;
                } else {
                    document.getElementById('countryError').style.display = 'none';
                }
                
                // CAPTCHA validation
                const captchaInput = document.getElementById('captchaInput').value.trim();
                const captchaText = document.getElementById('captchaText').textContent;
                if (captchaInput !== captchaText) {
                    document.getElementById('captchaError').style.display = 'block';
                    isValid = false;
                } else {
                    document.getElementById('captchaError').style.display = 'none';
                }
                
                // Terms validation
                const termsCheck = document.getElementById('termsCheck').checked;
                if (!termsCheck) {
                    document.getElementById('termsError').style.display = 'block';
                    isValid = false;
                } else {
                    document.getElementById('termsError').style.display = 'none';
                }
                
                return isValid;
            }
            
            // CAPTCHA generation
            function generateCaptcha() {
                const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                let captcha = '';
                for (let i = 0; i < 6; i++) {
                    captcha += chars.charAt(Math.floor(Math.random() * chars.length));
                }
                document.getElementById('captchaText').textContent = captcha;
                document.getElementById('captchaInput').value = '';
            }
            
            // Initialize code background animation
            function initCodeBackground() {
                const codeBackground = document.getElementById('code-background');
                const codeNumbers = ['1010', '1100', '1001', '0110', '0101', '1110', '0011', '1011'];
                
                for (let i = 0; i < 50; i++) {
                    const codeNumber = document.createElement('div');
                    codeNumber.className = 'code-number';
                    codeNumber.textContent = codeNumbers[Math.floor(Math.random() * codeNumbers.length)];
                    codeNumber.style.left = Math.random() * 100 + 'vw';
                    codeNumber.style.animationDelay = Math.random() * 15 + 's';
                    codeNumber.style.fontSize = (Math.random() * 10 + 10) + 'px';
                    codeBackground.appendChild(codeNumber);
                }
            }
            
            // Enhanced 3D scene with Saturn-like rings
            function init3DScene() {
                const container = document.getElementById('ai-model-container');
                if (!container) return;
                
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
                const geometry = new THREE.IcosahedronGeometry(1.5, 1);
                
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
                
                // Create Saturn-like rings with code numbers
                const ringGroup = new THREE.Group();
                scene.add(ringGroup);
                
                // Create multiple rings
                const ringCount = 3;
                const codeNumbers = ['1010', '1100', '1001', '0110', '0101', '1110', '0011', '1011'];
                
                for (let r = 0; r < ringCount; r++) {
                    const ringRadius = 2.2 + r * 0.5;
                    const codeCount = 20 + r * 5;
                    
                    for (let i = 0; i < codeCount; i++) {
                        const angle = (i / codeCount) * Math.PI * 2;
                        
                        // Create text sprite for code number
                        const canvas = document.createElement('canvas');
                        const context = canvas.getContext('2d');
                        canvas.width = 64;
                        canvas.height = 32;
                        
                        context.fillStyle = '#3a7bd5';
                        context.font = 'bold 20px monospace';
                        context.textAlign = 'center';
                        context.textBaseline = 'middle';
                        context.fillText(codeNumbers[Math.floor(Math.random() * codeNumbers.length)], 32, 16);
                        
                        const texture = new THREE.CanvasTexture(canvas);
                        const spriteMaterial = new THREE.SpriteMaterial({ 
                            map: texture,
                            transparent: true,
                            opacity: 0.7
                        });
                        
                        const sprite = new THREE.Sprite(spriteMaterial);
                        sprite.position.x = Math.cos(angle) * ringRadius;
                        sprite.position.y = Math.sin(angle) * ringRadius;
                        sprite.scale.set(0.5, 0.25, 1);
                        
                        ringGroup.add(sprite);
                    }
                }
                
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
                    
                    // Rotate the rings like Saturn's rings
                    ringGroup.rotation.z += 0.005;
                    
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
            
            // Initialize stock charts
            function initCharts() {
                // S&P 500 Chart
                const sp500Ctx = document.getElementById('sp500Chart');
                if (sp500Ctx) {
                    new Chart(sp500Ctx.getContext('2d'), {
                        type: 'line',
                        data: {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                            datasets: [{
                                label: 'S&P 500',
                                data: [4100, 4200, 4300, 4400, 4500, 4567],
                                borderColor: '#3a7bd5',
                                backgroundColor: 'rgba(58, 123, 213, 0.1)',
                                borderWidth: 2,
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
                
                // NASDAQ Chart
                const nasdaqCtx = document.getElementById('nasdaqChart');
                if (nasdaqCtx) {
                    new Chart(nasdaqCtx.getContext('2d'), {
                        type: 'line',
                        data: {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                            datasets: [{
                                label: 'NASDAQ',
                                data: [12500, 13000, 13500, 13800, 14200, 14316],
                                borderColor: '#5dade2',
                                backgroundColor: 'rgba(93, 173, 226, 0.1)',
                                borderWidth: 2,
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
                
                // Tech Sector Chart
                const techSectorCtx = document.getElementById('techSectorChart');
                if (techSectorCtx) {
                    new Chart(techSectorCtx.getContext('2d'), {
                        type: 'bar',
                        data: {
                            labels: ['AAPL', 'MSFT', 'GOOGL', 'AMZN', 'TSLA', 'META'],
                            datasets: [{
                                label: 'YTD Performance (%)',
                                data: [45, 38, 42, 52, 65, 48],
                                backgroundColor: [
                                    'rgba(58, 123, 213, 0.7)',
                                    'rgba(93, 173, 226, 0.7)',
                                    'rgba(46, 134, 193, 0.7)',
                                    'rgba(102, 178, 255, 0.7)',
                                    'rgba(143, 188, 219, 0.7)',
                                    'rgba(58, 123, 213, 0.7)'
                                ],
                                borderColor: [
                                    '#3a7bd5',
                                    '#5dade2',
                                    '#2e86c1',
                                    '#66b2ff',
                                    '#8fbcdb',
                                    '#3a7bd5'
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
                
                // Global Markets Chart
                const globalMarketsCtx = document.getElementById('globalMarketsChart');
                if (globalMarketsCtx) {
                    new Chart(globalMarketsCtx.getContext('2d'), {
                        type: 'radar',
                        data: {
                            labels: ['US', 'UK', 'Germany', 'Japan', 'China', 'India'],
                            datasets: [{
                                label: 'Market Performance',
                                data: [85, 72, 78, 65, 58, 68],
                                backgroundColor: 'rgba(58, 123, 213, 0.2)',
                                borderColor: '#3a7bd5',
                                pointBackgroundColor: '#3a7bd5',
                                pointBorderColor: '#fff',
                                pointHoverBackgroundColor: '#fff',
                                pointHoverBorderColor: '#3a7bd5'
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
                                r: {
                                    angleLines: {
                                        color: 'rgba(232, 245, 233, 0.2)'
                                    },
                                    grid: {
                                        color: 'rgba(232, 245, 233, 0.2)'
                                    },
                                    pointLabels: {
                                        color: '#e8f5e9'
                                    },
                                    ticks: {
                                        color: '#e8f5e9',
                                        backdropColor: 'transparent'
                                    }
                                }
                            }
                        }
                    });
                }
            }
            
            // Initialize companies carousel
            function initCompaniesCarousel() {
                const carousel = document.getElementById('companiesCarousel');
                if (!carousel) return;
                
                const dotsContainer = document.getElementById('carouselDots');
                const prevBtn = document.querySelector('.carousel-control.prev');
                const nextBtn = document.querySelector('.carousel-control.next');
                
                // List of 50+ companies with AI integration
                const companies = [
                    { name: 'Spotify', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/Spotify_logo_without_text.svg/1200px-Spotify_logo_without_text.svg.png' },
                    { name: 'Netflix', logo: 'data:image/png;base64,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' },
                    { name: 'Amazon', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Amazon_logo.svg/1200px-Amazon_logo.svg.png' },
                    { name: 'Apple', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Apple_logo_black.svg/1200px-Apple_logo_black.svg.png' },
                    { name: 'Adobe', logo: 'data:image/png;base64,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' },
                    { name: 'Google', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/1200px-Google_2015_logo.svg.png' },
                    { name: 'IBM', logo: 'data:image/png;base64,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' },
                    { name: 'Salesforce', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/96/Salesforce.com_logo.svg/1200px-Salesforce.com_logo.svg.png' },
                    { name: 'Intel', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Intel_logo_1995.svg/1200px-Intel_logo_1995.svg.png' },
                    { name: 'IBM Watson', logo: 'data:image/png;base64,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' },
                    { name: 'Upstart', logo: 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIAJQAmQMBIgACEQEDEQH/xAAbAAEAAwEBAQEAAAAAAAAAAAAAAQYHBQQCA//EADoQAAEEAgECBAIHBwIHAAAAAAEAAgMEBREGEiEHMUFRE2EUIiNxgZGxFTJSYsHR4ULxCCYzQ4Kh0v/EABoBAQACAwEAAAAAAAAAAAAAAAADBAEFBgL/xAAjEQEAAgIBBAIDAQAAAAAAAAAAAQIDEQQFITFBEiJRYoET/9oADAMBAAIRAxEAPwDcUREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBEXxI8MYXOIAHmSUJnT66go62+6z7knMZpZXVsS/oib2dP6vP8vsPmqq63Ze/rdanLvf4h2rFePaY203I61ixXmtY3ptnUE2stwvLL+Pla2zI6zX8i1x24fcf7rSaNyC9XZYqyCSJ42CFHfHNPK5xOdi5UfTz+HqRQPJSo10REQEREBERAREQEREBEXy57WglzgAO5JQHuDGlznaAGyT6LOOXcndfL6VF5FUHT3j/ALv+P1X48z5hFbkfQozarAkSPZ3+J8vu/VVSOzDIQGvG/Y9lbw4oj7Wc51PqFrbxYvHuX7KVCK250XY45np8LZ33fVeftIx+o+a46lebVi0alJhzXxXi9PMNqpW4btZlitIHxPGwQvQFknHM9PhbPrJVf/1Iv6j5rU6VuC5AyetIHxuGwQVQyY5pLsuDzqcqn7e4elFGwpUS+IiICIiAiIgIij0QQ9wY0ucQAO5J9FlHPOaOyLn43FSFtMHUszexmPsP5f1XY8Vc3LWqwYqB5Y6yC+Zw/gHbp/E/ost81Pjx+5abqPMmJnFT+nb07IEUKw0roUrZJEUzu3+lx/quguCBvyVmwuEy93Gm4yo59cd2PLhtw+Q8yF7i8R2lFfjWyd6Rt50T3BBHf1RSbUfAuzxzPTYWx6vqvP2kf9R81xkXm1YtGpS4c18V4vSe7a6NuG7XZYrSNfG8baQvSsz4HlH1coKTnfYWOwBP7r/T81pY8lrslPhbTteDyo5OKL+0oiLwuCIiAiIgKCpUeiDJPFuJ7M/VkO+iStpv3hx3+oVIW3c346M/i+mLpFuAl8LneRPq0/IrGLtSxRsurXInQzt82P8AP/KtYrRMac51DBauWbepedSPuT03sK68K4VNk5WXcpE6Ok3uI3bBm/s39V7taKwq4cF8tvjV88G4a/LvbeyLHNx4O2NI0Zz/APP6rXI2NZG1jWhoaNAAaAHskMTYY2xxtDWtGmtHkAv0VS1ptLpePx64a6jypPMOLmbqv42P7XzliA/f+Y+aoS3Jw2NKlcu4sZy69jYx8Xzkib/r+Y+asYc2u1mn6p0z57y4o7+4UFSjwWPcxwLXNOnAjuEa0ue1gBLnHQA8yre3N/Gd6dLjcbpM/RDN7EoP4Dutgb5KncJ47JS3kLrA2d7emOM+bB6k/M6Vxb5KhntFrdnX9I49sOD7eZ7pREULaiIiAiIgjffWlG1RPGixPV4aZKs8sEn0mIdcUhY7Wz6hWDgsj5eGYSSV7pJH0YnOe87LiWjuSUHbK8tzG0cjH0XqsFho8hIwO0s78eLdqnh8Y6nZnrudZcHOhlcwkdB7HRVvtcnxOBo41uYufAfZiaItxvf1nQ/hB9/VGJiJjUvXU4zg6cnxK2LqRvHk4RDYXVDQFVcr4h8YxF00ruS+3adPbFC+QMPzLQQF38Zk6WWqMuYy1FarP/dkjdsf7/JJnbEVrXxD2IqxnOe8bwVs1MhkmtsNP1o443SFn39IOl6qvL8BbxVnK1spDLSqtL53sBJiH8zddQ/JHp3VGljHC/EZkHJMw/kecmdjXF30IPic4D7Q60Gt2Pq681qdjkWJq4iLLWb8UNCVrXMmk20OB8tA99n2Qei5icfdO7VSGV3u5g3+ainiMfSPVUpwxO/iawb/ADVbj8UOISTfC/a4Z311yQSNZ+Li3QVgymcx2Jxn7Sv2mx0/q/bNaXg9XYa6QSVnco/8se9/GNuiBpFXLHOeOV69CZ+SaW5DRqtbG4ukBOt9Otgb7bICpHitzSxQzWOo4PLSwPrveMhHG0jW+gt3sd+3V5LCRraLh8f5XheRSTR4a99JfAGmQfCezpB3r94D2Pku4gIiICIiDPvG8f8AJDj6C1Fv81YPD57XcHwRadgUYh+IaAV6eV4SPkWBt4uV/wAP4zPqSa30PHdrtffpZXichzzgUBxJ4/Lk6cbnGF0cb5GgE7OnMB0NnyI90YdT/iBcDh8SzY6jZeQP/A/3C53jQxzqPGGN0HmMgEnyOmBfdfA8p8QM/UyHJ6cmNxlVwLYXsLCW7BLQ0/W2dAElft49RB78HENNDi9v3b6QguNDw84xXxIpzYutYe5v2tiVm5Xu9XdXmDvfkqX4ZfFwHiLmuNQyukp9L3DZ8nNLdH7+l2ifkF65eVc+wEAxVjjT8jNGPhw5CFkj2yAdg4hrT31o+YXu8M+JZTHWbvIc+NZW41wZE93doJ6j1a8tkDsPIBBS60jeC5/Knl3G/wBow2pnOZbcwPGi4nbS76p3vuNg9lpHCo+G5jF3xx6rD9GtuH0yq9hB8taLT5D7u3muFLyznGIfNUzXDn5WNznBklJr3NLd9gelrgRrt3AX7eFXHsnTyeUzmSx/7MZdOoaWtFg2T5eg9v0RlWfDPBYjKc05HTyGOrWa8Bf8GKWMObH9s4dh9wC0Hndri+F45FUz9Xro9TRBSib3cWaIAAI0B699aVAZByrg/Ncvbx3HrGUhvPf0Ojie5jmuf1A9TAekjeiCu34kYHO5qpgM9Wx/xbtKPqsUWjZBJa7sPXRbojzRhX83Z43cwMxh8P8AKY3cRdBejqtAY70LiD5e+9qILUtjwNsMmcXCvfbFGfZvW0gf+1Y7vKOXclw1qjR4jboSPgcJ7FkuAA13bG0tBc4+QXHpYDMx+EN7HOxVwXXZEPbX+Cest2zuB7dig6PhfwPHZLC085m2vtTSd60ZkIbCxjiG+Wvbf4rweOGOpwZ3Azw1omTXXy/SXtHeXRiA6vfQJH4rR/DurYpcKxFW5BJBPFXDXxyN6XNOz2IVX8aOP5PKwYvIYmtLZfQfJ1xRN6nad0kENHc6LPIe6C7Yfj2Hwr5JMTja1N0oAkMMYaXAeW/zXVVO4FyDkGddZOcwMmLiiawROkY9hld36uzgCNaHp6q4oyIiICIiCNbRSiCAqnznhTOWS0HvuvrfRHFwDWdXVsj+ytqIPlrdNAPoFOgpRBGgmh7KUQRoJoKUQRoJoKUQFGgVKII0FKIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIiICIiAiIg//2Q==' },
                    { name: 'C3.ai', logo: 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIAJAA4QMBIgACEQEDEQH/xAAcAAEAAwEBAQEBAAAAAAAAAAAABgcIBQQDAgH/xABIEAAABQMABAcNBQUIAwAAAAAAAQIDBAUGEQcSFyETMVFVk5TSGDZBVFZhcXSBkaGy0QgUUlPhIjdzdcEVMkJygrGz8CQzov/EABQBAQAAAAAAAAAAAAAAAAAAAAD/xAAUEQEAAAAAAAAAAAAAAAAAAAAA/9oADAMBAAIRAxEAPwC8QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABBdIGkmJZFQixJVOflHIa4UlNLIsbzLG/wBAnQrrSbo0dvipxJjdVRDKOwbWqpg1637RnnOsQDg7f6VzHN6VIbf6VzHN6VI5fc+yPKRrqZ9sO59keUjXUz7YDqbf6VzHN6VIbf6VzHN6VI5fc+yPKRrqZ9sO59keUjXUz7YDqbf6VzHN6VIbf6VzHN6VI5fc+yPKRrqZ9sO59keUjXUz7YDqbf6VzHN6VIbf6XzHN6VI5fc+yPKRrqZ9sVHcNMOi1yfSzeJ44j62TcJOrrap4zjwANk0qampUuJOQg20yWUPEgzyaSURHj4j1DkWh3qUb1Fn5CHXAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABXekzSWux6lEhppSZpSGTd1jkcHq/tGWP7pixBnz7SffFSfUz+cwHu7oN3yaR14+wHdBu+TSOvH2BHtGOjCNe1CkVF+pPRVNSlMEhDZKIyJKVZ3/5hL+5/gc+yehT9QHh7oN3yaR14+wHdBu+TSOvH2B7u5/gc+yehT9Q7n+Bz7J6FP1AeHug3fJpHXj7Ad0G75NI68fYHu7n+Bz7J6FP1Duf4HPsnoU/UBadsVY67b1Pqps8ActhLvBa2tqZ8GcFkZR0h9/Vf9fe+YxrC3KSmhUKDSm3TdTEZS0TiiwaseEZP0h9/Vf9fe+YwGq7Q71KN6iz8hDrjkWh3qUb1Fn5CHXAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABnz7SffFSfUz+cxoMZ8+0n3xUn1M/nMBLfs4d5U/8Ama/+JofvSXpTm2bcSaXGpkeShUdD2u44ojyZqLG70D8fZw7yp/8AM1/8TQ7V7aLaVeNZTVJ06aw6TKWtRnU1cEZn4SPlAV5t/qnMUPplBt/qnMUPplCR7A7f51qfvb7IbA7f51qfvb7ICObf6pzFD6ZQbf6pzFD6ZQkewO3+dan72+yGwO3+dan72+yAjm3+qcxQ+mUKqr1TXWa1OqbjaWly31PKQk8kk1HnBC+Ngdv861P3t9kUZdFNao1x1KmR1rcaiSVsoWvGsZJPGTwA1xaHepRvUWfkIdcci0O9Sjeos/IQ64DyVWpwaRBcnVOU3GitF+244eCL6n5hU9a0+U2O8bdGpD81JH/7XneBI/QWDP34FfaYryfuW5X4bLqipkBxTTKCPctRHhSzLznxeb0iRWBoW/tqlNVO4pb8VqQklsx4+Cc1T4jUaiMizyYAdSn/AGgW1PpTUbfU20fGtiVrGX+k0ln3i1LWumj3VBOXRpROpSeHGzLVW2fIpJ/78QrC49A8Aqe67btQl/e0JM0tS1JUlfmySSx8RUdq1+oWbcjU1jXQ4w5qSGD3a6c4Ugy/7gwGxRBrs0q2zbUlcR15yZMbPC2YqSVqHyGozIiPzZH60qXQuh2C/UKc5qvTCQzGcLcZa5Z1i85JyYovRdYx31V5JTJLjMKMklyHEb3FKVnBEZ5LJ4M8nyALXp+nW2ZDupLi1CIn8am0rL/5Mz+Asml1KFVoLc2myW5MZ0sodbPJH/3kFI6RtDtNoluyKvQZcrWiJ13WZKkqJSPCZGRFgx4fs7VqUxcsqj66lRJLCndQz3JWnG8uTJGefYA0OAAAAPNUJ8OmxlSahKZjMJ43HlkkveYjDmk+y23ODVXo5nypSoy95FgBMBzLlrDVv0KZVn2lutxW9dSEGWVFnG7PpH8otx0aupUdHqcaWad6ktOEak+kuMfy6YlOnW9Oi1p/gKe43h93XJGqnJb8nxAIjZmlim3bXmqREpsth1xCl67qk6pEks+AxYYrOx7XsClXEzKturlIqKULJDX3xLmUmW/cRcgswAAAABnz7SffFSfUz+cxoMRK8tHtFvGYxKqypJOMN8GgmXCSWM55AGfrJ0lVizaW9T6bGhutOvm+o30qM9Y0pT4DLd+yQkO3i5vEaZ0a+0LA2HWj+KodOX0DYdaP4qh05fQBX+3i5vEaZ0a+0G3i5vEaZ0a+0LA2HWj+KodOX0DYdaP4qh05fQBX+3i5vEaZ0a+0G3i5vEaZ0a+0LA2HWj+KodOX0DYdaP4qh05fQBNbPqj9btemVSUlCX5UdLq0tkZJIz5MjKukPv6r/r73zGNa0WmR6LSYtMhms48Vsm29c8nguUxkrSH39V/1975jAartDvUo3qLPyEPrcss6fbtUmp/vR4brpelKDP8AoPlaHepRvUWfkIeysQyqFJmwlcUmO40f+pJl/UBju24KatcdNhPZUiTKbQ5k95kaiz8MjZyUpQkkoIiSksEReAhi+mSXaDcUaQ6g+FgS0qWguPKFby+BkNmRJLMyK1JjOE4y8gloWniUkyyRgPqOK/aVuSHnHn6HT3HXVGta1R0malGeTM9w7XFxitJumy14k2RGNua4bLimzW22RpVg8ZLfxAJ1UaDSapCZhVCnRpEVkyNplxsjSgyLBYL0GZDmy41HsagVSp0mkx2UNMm861HSTfC6pHgjP2mPNcGkGiW7Dp0mrlKZTUGuEaSlnWMiwR4PB7j3kPXQa7RL8oclcRKpEBalR3m30autuIzIy5MGQCir60wVC56S7SokFECK9gnj4TXWtP4c4LBCX/Z/tSPFRIuFc6JJkOI4FtmO5rGwR7z1+RR4LdyekdHSNortxVtTp9HhpgTIjSnkm0o9VZJLJpMjPG/lFUaHa1KpF+U1uO4omZrpRn287lkrcWS8x4MBq0ADi4wGYdJDN43TdEt92iVhcRl1TURsobmohBHjJbsb8ZMxOadoDpp09o6jVpn3xSCNzgSSSEq5CIyyY5966bprdTfg2tHY4FpZo+9PJNZuGW7KU8RF78jysMaZbiQlXDSokd0skpS24+CPzF+38AFb1BmbZl3Psw5f/lU2ThD7e7WMj/r4S9g0npFkHL0V1OSosG9AS4ZenVMZmuqkSaFcE2mTn0vyWFkTrqTMyUoyIz3nvPjGk73/AHPTP5Y3/skBTWgX940T+A98o0+MwaBf3jRP4D3yjT4AAAACptMl/wBdtCsQI1HXHJp+Obiyda1jzrGQtkRi67DoN2y2ZNaYdddZb4NBoeUgiLOfAAovbbeP5kHq36httvH8yD1b9RbGxiyvEpPWl/UNjFleJSetL+oCp9tt4/mQerfqG228fzIPVv1FsbGLK8Sk9aX9Q2MWV4lJ60v6gKn223j+ZB6t+obbbx/Mg9W/UWxsYsrxKT1pf1DYxZXiUnrS/qAqfbbeP5kHq36iBVaoP1apyqjLNJyJLqnXNUsFrGeTwQ0rsYsrxKT1pf1DYxZXiUnrS/qAllod6lG9RZ+Qh1x8IMVqDCjw45GTMdtLTZGeTJKSwW/2D7gM+6btHsmJUXrko8c3Icg9eW22nJtOHxrx+E/geeURqyNKtdtOImAlDU6An+4y/kjb/wAqi4i8x5GpjIjIyMskfGRiG1rRdZ9ZfVIkUpLLyjypcZams+ki3fABTt06aq9W6c5BhRmKa08k0uuNKNThkfgJW7Huz5xyNFtjSbvrjS3mVlSI6yVJeMsErH+Aj8Jn8C9gu2FodsuK+l06e6/qnkkvSFGn2kRlkTmHEjwYzcaGw2ww2WENtJJKUl5iIBX+m20n7itZt+nN68umqN1DSE5NbeP2kkReHcRkXmwKa0a6QZdiy5DS4xyYMgyN5g1aqkqL/Enz+A/0GqxEri0b2rcMlUqfTEpkqPKno6zbUr043GfnMgFTX3poXXqK9SqNT1xESUmh955ZGrU8JJIuLPKPJoJtCTVLjar0htSKfTzNSFmWCdd4iIuXHGfsFpQtDllxX0unAekGk8kl+Qo0+0ixn2idRo7MRhEeK0hllssIbbSSUpLzEQCi9M96XHQbzOFSKq9FjfdW18GgkmWsecnvLzCb6H6tU7ksWRIq0xcmUuQ60TqyIjItVOOL0iS1izrdrcz75VqTHlSNUkcI4R5wXEXGPdRqNTqFEOJSIjcWOazWbbfFrHjJ/AgGPmkv29cbZTmD4aBKSbrSt2TQrJl7cDQLmnK1EweHQ3PVINOfu/AkRkfJrZx7ciWXJY1t3M6T1Ypjbsgixw6FG2vHnNJln2jwUnRdZtKfS/HozbjqTylUhxTuD9CjMvgAzDctTlVmvTalOa4KRJdNxTeDLVzxFv8ANgaUvVRL0OSlFxHS2jL3JHXqdg2rVZzs6oUWO9JdMjW4o1EasFguI+QiHUdolNdon9iORUqppNEz93NR41C4iznPgLwgM46Bf3jRP4D3yjT4jlFsW2aFPRPpNJajSkEaUuJWszIjLB8ZiRgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD/2Q==' },
                    { name: 'Palantir', logo: 'data:image/png;base64,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' },
                    { name: 'UiPath', logo: 'data:image/png;base64,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' },
                    { name: 'Twilio', logo: 'data:image/png;base64,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' },
                    { name: 'Snowflake', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/ff/Snowflake_Logo.svg/1200px-Snowflake_Logo.svg.png' },
                    { name: 'Datadog', logo: 'data:image/jpeg;base64,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' },
                    { name: 'CrowdStrike', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7c/CrowdStrike_Logo.svg/1200px-CrowdStrike_Logo.svg.png' },
                    { name: 'Zscaler', logo: 'data:image/png;base64,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' },
                    { name: 'ServiceNow', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/ServiceNow_logo.svg/1200px-ServiceNow_logo.svg.png' },
                    { name: 'Workday', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Workday_logo.svg/1200px-Workday_logo.svg.png' },
                    { name: 'Splunk', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4a/Splunk_logo.svg/1200px-Splunk_logo.svg.png' },
                    { name: 'Palo Alto Networks', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/08/Palo_Alto_Networks_logo.svg/1200px-Palo_Alto_Networks_logo.svg.png' },
                    { name: 'Fortinet', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/Fortinet_logo.svg/1200px-Fortinet_logo.svg.png' },
                    { name: 'DocuSign', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2b/DocuSign_logo.svg/1200px-DocuSign_logo.svg.png' },
                    { name: 'Square', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/Square%2C_Inc._logo.svg/1200px-Square%2C_Inc._logo.svg.png' },
                    { name: 'Shopify', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0e/Shopify_logo_2018.svg/1200px-Shopify_logo_2018.svg.png' },
                    { name: 'PayPal', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/PayPal.svg/1200px-PayPal.svg.png' },
                    { name: 'Stripe', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a1/Stripe_Logo%2C_revised_2016.svg/1200px-Stripe_Logo%2C_revised_2016.svg.png' },
                    { name: 'SquareSpace', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4a/Squarespace_logo_and_wordmark_2014.svg/1200px-Squarespace_logo_and_wordmark_2014.svg.png' },
                    { name: 'HubSpot', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5b/HubSpot_Logo.svg/1200px-HubSpot_Logo.svg.png' },
                    { name: 'Zoom', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7b/Zoom_Communications_Logo.svg/1200px-Zoom_Communications_Logo.svg.png' },
                    { name: 'Slack', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/Slack_icon_2019.svg/1200px-Slack_icon_2019.svg.png' },
                    { name: 'Dropbox', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Dropbox_Icon.svg/1200px-Dropbox_Icon.svg.png' },
                    { name: 'Atlassian', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Atlassian-logo-blue.svg/1200px-Atlassian-logo-blue.svg.png' },
                    { name: 'GitHub', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/Octicons-mark-github.svg/1200px-Octicons-mark-github.svg.png' },
                    { name: 'GitLab', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/15/GitLab_logo.svg/1200px-GitLab_logo.svg.png' },
                    { name: 'MongoDB', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/42/MongoDB_Logo.svg/1200px-MongoDB_Logo.svg.png' },
                    { name: 'Elastic', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f4/Elasticsearch_logo.svg/1200px-Elasticsearch_logo.svg.png' },
                    { name: 'Confluent', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Confluent_logo.svg/1200px-Confluent_logo.svg.png' },
                    { name: 'Databricks', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/63/Databricks_Logo.png/1200px-Databricks_Logo.png' },
                    { name: 'Qualcomm', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Qualcomm-Logo.svg/1200px-Qualcomm-Logo.svg.png' },
                    { name: 'AMD', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7c/AMD_logo_2018.svg/1200px-AMD_logo_2018.svg.png' },
                    { name: 'Broadcom', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Broadcom_Inc._Logo.svg/1200px-Broadcom_Inc._Logo.svg.png' },
                    { name: 'Micron', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/34/Micron_Technology_logo_2022.svg/1200px-Micron_Technology_logo_2022.svg.png' },
                    { name: 'Lam Research', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Lam_Research_logo.svg/1200px-Lam_Research_logo.svg.png' },
                    { name: 'Applied Materials', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/Applied_Materials_logo.svg/1200px-Applied_Materials_logo.svg.png' },
                    { name: 'ASML', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9e/ASML_logo.svg/1200px-ASML_logo.svg.png' },
                    { name: 'Synopsys', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4a/Synopsys_Logo_2020.svg/1200px-Synopsys_Logo_2020.svg.png' },
                    { name: 'Cadence', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Cadence_Design_Systems_logo.svg/1200px-Cadence_Design_Systems_logo.svg.png' },
                    { name: 'Ansys', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/61/ANSYS_logo.svg/1200px-ANSYS_logo.svg.png' },
                    { name: 'PTC', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/PTC_Logo.svg/1200px-PTC_Logo.svg.png' },
                    { name: 'Dassault Systèmes', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/75/Dassault_Systemes_logo.svg/1200px-Dassault_Systemes_logo.svg.png' },
                    { name: 'Siemens', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5f/Siemens_AG_logo.svg/1200px-Siemens_AG_logo.svg.png' },
                    { name: 'Rockwell Automation', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Rockwell_Automation_logo.svg/1200px-Rockwell_Automation_logo.svg.png' },
                    { name: 'ABB', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0e/ABB_logo.svg/1200px-ABB_logo.svg.png' },
                    { name: 'Schneider Electric', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5d/Schneider_Electric_2015_logo.svg/1200px-Schneider_Electric_2015_logo.svg.png' }
                ];
                
                // Create company logo items
                companies.forEach(company => {
                    const logoItem = document.createElement('div');
                    logoItem.className = 'company-logo-item';
                    logoItem.innerHTML = `<img src="${company.logo}" alt="${company.name}" title="${company.name}">`;
                    carousel.appendChild(logoItem);
                });
                
                // Carousel functionality
                let currentIndex = 0;
                const itemsPerView = 6;
                const totalItems = companies.length;
                const totalSlides = Math.ceil(totalItems / itemsPerView);
                
                // Create dots
                for (let i = 0; i < totalSlides; i++) {
                    const dot = document.createElement('div');
                    dot.className = 'carousel-dot';
                    if (i === 0) dot.classList.add('active');
                    dot.addEventListener('click', () => goToSlide(i));
                    dotsContainer.appendChild(dot);
                }
                
                // Update carousel position
                function updateCarousel() {
                    const translateX = -currentIndex * (100 / itemsPerView);
                    carousel.style.transform = `translateX(${translateX}%)`;
                    
                    // Update active dot
                    document.querySelectorAll('.carousel-dot').forEach((dot, index) => {
                        dot.classList.toggle('active', index === currentIndex);
                    });
                }
                
                // Go to specific slide
                function goToSlide(index) {
                    currentIndex = index;
                    if (currentIndex >= totalSlides) currentIndex = 0;
                    if (currentIndex < 0) currentIndex = totalSlides - 1;
                    updateCarousel();
                }
                
                // Next slide
                function nextSlide() {
                    currentIndex++;
                    if (currentIndex >= totalSlides) currentIndex = 0;
                    updateCarousel();
                }
                
                // Previous slide
                function prevSlide() {
                    currentIndex--;
                    if (currentIndex < 0) currentIndex = totalSlides - 1;
                    updateCarousel();
                }
                
                // Event listeners
                prevBtn.addEventListener('click', prevSlide);
                nextBtn.addEventListener('click', nextSlide);
                
                // Auto-rotate carousel
                let autoRotate = setInterval(nextSlide, 5000);
                
                // Pause auto-rotation on hover
                carousel.addEventListener('mouseenter', () => {
                    clearInterval(autoRotate);
                });
                
                carousel.addEventListener('mouseleave', () => {
                    autoRotate = setInterval(nextSlide, 5000);
                });
                
                // Initialize carousel
                updateCarousel();
            }
        });
    </script>
</body>

</html>